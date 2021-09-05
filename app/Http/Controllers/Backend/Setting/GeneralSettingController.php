<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\GeneralSettingRequest;
use App\Service\ImageService;

class GeneralSettingController extends Controller
{
    private $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index()
    {
        return view('setting.general', [
            'title' => 'General Settings'
        ]);
    }

    public function store(GeneralSettingRequest $request)
    {
        $validatedSettings = $request->validated();

        if ($request->hasFile('site_logo')) {
            $faviconPath = $this->imageService->swapImage(appSettings()->get('site_logo'), $request->file('site_logo'));
            $validatedSettings['site_logo'] = $faviconPath;
        }

        if ($request->hasFile('favicon')) {
            $faviconPath = $this->imageService->swapImage(appSettings()->get('favicon'), $request->file('favicon'));
            $validatedSettings['favicon'] = $faviconPath;
        }

        appSettings()->set($validatedSettings);

        $this->flash()->success('Settings Saved');
        return redirect()->back()->with('success', 'Settings Saved');
    }
}
