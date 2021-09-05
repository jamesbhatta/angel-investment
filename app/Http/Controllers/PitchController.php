<?php

namespace App\Http\Controllers;

use App\Models\Pitch;
use App\Models\PitchForm;
use App\Service\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PitchController extends Controller
{
    protected $imageService;
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function createStepOne()
    {
        $userId = auth()->id();

        if ($pitchForm = PitchForm::where('user_id', $userId)->first()) {
            $pitch = $pitchForm->getPitchModel();
        } else {
            $pitch = new Pitch([
                'user_id' => $userId,
                'current_step' => 0
            ]);

            $pitchForm = PitchForm::create([
                'user_id' => $userId,
                'data' => serialize($pitch)
            ]);
        }

        return view('pitch.form-step-one', compact(['pitch', 'pitchForm']));
    }

    public function storeStepOne(Request $request, PitchForm $pitchForm)
    {
        Validator::make($request->all(), [
            'title' => ['required'],
            'website' => ['nullable'],
            'company_country_id' => ['required'],
            'mobile' => ['required'],
            'industry' => ['required'],
            'stage' => ['required'],
            'investor_role' => ['required'],
            'currently_invested' => ['nullable'],
            'max_investment' => ['required'],
            'capital' => ['nullable'],
            'min_investment' => ['required'],
            'tax_relief_type' => ['nullable'],
        ])->validate();

        $pitch = unserialize($pitchForm->data);
        $pitch->title = $request->title;
        $pitch->website = $request->website;
        $pitch->company_country_id = $request->company_country_id;
        $pitch->mobile = $request->mobile;
        $pitch->industry = $request->industry;
        $pitch->stage = $request->stage;
        $pitch->investor_role = $request->investor_role;
        $pitch->currently_invested = $request->currently_invested;
        $pitch->max_investment = $request->max_investment;
        $pitch->capital = $request->capital;
        $pitch->min_investment = $request->min_investment;
        $pitch->tax_relief_type = $request->tax_relief_type;

        $pitchForm->update([
            'data' => serialize($pitch),
            'current_step' => 1
        ]);

        return redirect()->route('pitches.create.step-two', $pitchForm);
    }

    public function createStepTwo(PitchForm $pitchForm)
    {
        $pitch = $pitchForm->getPitchModel();

        return view('pitch.form-step-two', [
            'pitch' => $pitch,
            'pitchForm' => $pitchForm
        ]);
    }

    public function storeStepTwo(Request $request, PitchForm $pitchForm)
    {
        $formData = Validator::make($request->all(), [
            'short_summary' => ['nullable'],
            'the_business' => ['nullable'],
            'the_market' => ['nullable'],
            'progress' => ['nullable'],
            'objectives' => ['nullable'],
        ])->validated();

        $pitch = $pitchForm->getPitchModel();
        $pitch->fill($formData);

        $pitchForm->update([
            'data' => serialize($pitch),
            'current_step' => 2
        ]);

        return redirect()->route('pitches.create.step-three', $pitchForm);
    }

    public function createStepThree(PitchForm $pitchForm)
    {
        $pitch = $pitchForm->getPitchModel();

        return view('pitch.form-step-three', [
            'pitch' => $pitch,
            'pitchForm' => $pitchForm
        ]);
    }

    public function storeStepThree(Request $request, PitchForm $pitchForm)
    {
        $request->validate([
            'cover_image' => 'nullable|image',
            'logo' => 'nullable|image',
        ]);

        $pitch = $pitchForm->getPitchModel();

        if ($request->hasFile('cover_image')) {
            // $pitch->addMediaFromRequest('cover_image')->toMediaCollection('cover_image');
            $pitch->cover_image = $this->imageService->storeImage($request->file('cover_image'));
        }

        if ($request->hasFile('logo')) {
            // $pitch->addMediaFromRequest('logo')->toMediaCollection('logo');
            $pitch->logo = $this->imageService->storeImage($request->file('logo'));
        }

        // save the images

        $pitch->save();
        $pitchForm->delete();

        $this->flash()->success('Pitch submitted successfully. It will be soon reviewed for verification.');
        return redirect()->route('home');
    }
}
