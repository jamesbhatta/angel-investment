<?php

namespace App\Http\Controllers;

use App\Models\Pitch;
use App\Models\Transaction;
use App\Service\BraintreeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    private $braintreeService;

    public function __construct(BraintreeService $braintreeService)
    {
        $this->braintreeService = $braintreeService;
    }

    public function charge(Request $request, Pitch $pitch)
    {
        // dd($request->payment_method_nonce);
        $request->validate([
            'payment_method_nonce' => ['required'],
        ]);
        
        $nonce = $request->payment_method_nonce;
        $packageId = $pitch->package_id;
        $amount = get_package_price($pitch->package_id);
        
        try {
            DB::beginTransaction();
            
            $result = $this->braintreeService->gateway()->transaction()->sale([
                'amount' => $amount,
                'paymentMethodNonce' => $nonce,
                'options' => [
                    'submitForSettlement' => true,
                ],
            ]);
            
            if ($result->success) {
                $transaction = $result->transaction;
                logger($transaction);
                
                $pitch->update([
                    'payment_completed' => true,
                ]);
                
                $this->storeBraintreeTransaction($pitch, $amount, $transaction);
                DB::commit();
            } else {
                logger('Payment Failed', ['result' => $result]);
                throw new \Exception('Payment Failed.');
            }
        } catch (\Exception $ex) {
            logger($ex->getMessage(), [
                'Exception' => $ex
            ]);

            DB::rollBack();
            return redirect()->back()->withErrors(['payment' => 'Payment failed.']);
        }

        $this->flash()->success('Pitch submitted successfully. It will be soon reviewed for verification.');
        return redirect()->route('home');
    }

    public function chargeBak(Request $request, Pitch $pitch)
    {
        $request->validate([
            'payment_method' => ['required'],
            'package_id' => ['required'],
        ]);

        $paymentMethod = $request->payment_method;
        $packageId = $request->package_id;
        $amount = get_package_price($packageId);
        $billingName = $request->billing_name ?? null;

        if (!$this->validatePackage($pitch, $packageId)) {
            return redirect()->back()->withErrors(['payment' => 'Something went wrong.']);
        }

        try {
            DB::beginTransaction();
            $amount = get_package_price($pitch->package_id);
            $stripePayment = auth()->user()->charge($amount * 100, $paymentMethod);

            if (!$stripePayment->isSucceeded()) {
                return 'Payment not succeed.';
            }

            $pitch->update([
                'payment_completed' => true,
            ]);

            $this->storeTransaction($pitch, $amount, $stripePayment, $billingName);
            DB::commit();
        } catch (\Exception $ex) {
            logger($ex->getMessage(), [
                'Exception' => $ex
            ]);
            DB::rollBack();
            return redirect()->back()->withErrors(['payment' => 'Payment failed.']);
        }

        $this->flash()->success('Pitch submitted successfully. It will be soon reviewed for verification.');

        return redirect()->route('home');
    }

    private function validatePackage(Pitch $pitch, $packageId)
    {
        return $pitch->package_id == $packageId;
    }

    private function storeTransaction($pitch, $amount, $stripePayment, $billingName = null)
    {
        return Transaction::create([
            'user_id' => auth()->id() ?? null,
            'pitch_id' => $pitch->id,
            'title' => $pitch->title,
            'amount' => $amount,
            'charge_key' => null,
            'payment_id' => $stripePayment->id,
            'payment_status' => true,
            'package_name' => get_package_name($pitch->package_id),
            'billing_name' => $billingName,
            'billing_email' => null,
            'billing_city' => null,
            'billing_country' => null,
            'transaction_detail' => serialize($stripePayment)
        ]);
    }

    private function storeBraintreeTransaction($pitch, $amount, $transaction)
    {
        return Transaction::create([
            'user_id' => auth()->id() ?? null,
            'pitch_id' => $pitch->id,
            'title' => $pitch->title,
            'amount' => $amount,
            'charge_key' => null,
            'payment_id' => $transaction->id,
            'payment_status' => true,
            'package_name' => get_package_name($pitch->package_id),
            'billing_name' => null,
            'billing_email' => null,
            'billing_city' => null,
            'billing_country' => null,
            'transaction_detail' => serialize($transaction)
        ]);
    }
}
