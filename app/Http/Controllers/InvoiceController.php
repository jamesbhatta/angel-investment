<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Transaction::where('user_id', auth()->id())->paginate(10);

        return view('invoice.index', compact('invoices'));
    }
}
