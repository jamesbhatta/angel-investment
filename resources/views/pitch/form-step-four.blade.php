@extends('layouts.app')

@section('content')
@php
$updateMode = isset($updateMode) ? $updateMode : false
@endphp
<div class="pitchSlideShow">
    @include('pitch.wizard-head', ['step' => 4])
</div>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="offset-sm-1 offset-1 col-9">


            <form action="{{ $updateMode ? route('pitches.update.step-four', $pitch) : route('pitches.store.step-four', $pitch) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($updateMode)
                @method('put')
                @endif

                <section class="pricing">
                    <div class="container">
                        <h2 class="text-center">Select a Package</h2>
                        @error('package_id')
                        <div class="alert alert-danger">
                            Please select a package.
                        </div>
                        @enderror
                        <div class="snip1404">
                            <div class="row">

                                <div class="col-md-4 col-sm-6 mt-4">
                                    <div class="plan">
                                        <header>
                                            <h4 class="plan-title">Starter Package</h4>
                                            <div class="plan-cost"><span class="plan-price">$100</span><span class="plan-type d-none">/month</span>
                                            </div>
                                        </header>
                                        <ul class="plan-features">
                                            <li class="d-flex"><i class="ion-checkmark"> </i>Displayed to Investors of your
                                                country.
                                            </li>
                                            <li class="d-flex uncheck"><i class="ion-close"> </i> Displayed to International
                                                Investors.</li>
                                            <li class="d-flex uncheck"><i class="ion-close"> </i>Private Email Reachoutwith your
                                                company's pitch to
                                                curated Gabriel Angel Investment's investor database.</li>
                                            <li class="d-flex uncheck"><i class="ion-close"> </i>One on One meeting set up either through video call
                                                or
                                                face to face with curated investor.</li>
                                            <li class="d-flex uncheck"><i class="ion-close"> </i>Pitch Review by Gabriel Angel Investments Team.</li>
                                        </ul>
                                        <div class="text-center my-4">
                                            <button type="submit" name="package_id" value="1" class="btn-select-plan">Select Plan</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 mt-4">
                                    <div class="plan">
                                        <header>
                                            <h4 class="plan-title">Medium Package</h4>
                                            <div class="plan-cost"><span class="plan-price">$200</span><span class="plan-type d-none">/month</span>
                                            </div>
                                        </header>
                                        <ul class="plan-features">
                                            <li class="d-flex"><i class="ion-checkmark"> </i>Displayed to Investors of your country.</li>
                                            <li class="d-flex"><i class="ion-checkmark"> </i>Displayed to International Investors.</li>
                                            <li class="d-flex uncheck"><i class="ion-close"> </i>Private Email Reachoutwith your company's pitch to curated
                                                Gabriel Angel Investment's investor database.</li>
                                            <li class="d-flex uncheck"><i class="ion-close"> </i>One on One meeting set up either through video call or
                                                face to face with curated investor.</li>
                                            <li class="d-flex uncheck"><i class="ion-close"> </i>Pitch Review by Gabriel Angel Investments Team.</li>
                                        </ul>
                                        <div class="text-center my-4">
                                            <button type="submit" name="package_id" value="2" class="btn-select-plan">Select Plan</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 mt-4">
                                    <div class="plan featured">
                                        <header>
                                            <h4 class="plan-title">Executive Package</h4>
                                            <div class="plan-cost"><span class="plan-price">$2000</span><span class="plan-type d-none">/month</span>
                                            </div>
                                        </header>
                                        <ul class="plan-features">
                                            <li class="d-flex"><i class="ion-checkmark"> </i>Displayed to Investors of your country.</li>
                                            <li class="d-flex"><i class="ion-checkmark"> </i>Displayed to International Investors.</li>
                                            <li class="d-flex"><i class="ion-checkmark"> </i> Private Email Reachout with your company's pitch to
                                                curated Gabriel Angel Investment's investor database.</li>
                                            <li class="d-flex"><i class="ion-checkmark"> </i> One on One meeting set up either through video call
                                                or face to face with curated investor.</li>
                                            <li class="d-flex"><i class="ion-checkmark"> </i>Pitch Review by Gabriel Angel Investments Team.</li>
                                        </ul>
                                        <div class="text-center my-4">
                                            <button type="submit" name="package_id" value="3" class="btn-select-plan">Select Plan</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </section>


                {{-- <x-box class="shadow-sm p-4 d-none">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="package_id" id="starter-package-radio" value="1">
                        <label class="form-check-label" for="starter-package-radio">
                          Starter Package
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="package_id" id="medium-package-radio" value="2">
                        <label class="form-check-label" for="medium-package-radio">
                          Medium Package
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="package_id" id="executive-package-radio" value="3">
                        <label class="form-check-label" for="executive-package-radio">
                          Executive Package
                        </label>
                      </div>

                    <x-form-group>
                        <button type="submit" class="btn btn-primary py-3 w-100">Save & Continue</button>
                    </x-form-group>
                </x-box> --}}
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .btn-select-plan {
        border: none;
        background: linear-gradient(90deg, #018ee3 58%, rgba(0, 0, 0, 0.8) 200%);
        color: #ffffff;
        text-decoration: none;
        padding: 12px 20px;
        font-size: 0.75em;
        font-weight: 600;
        border-radius: 2.5rem;
        text-transform: uppercase;
        letter-spacing: 4px;
        display: inline-block;
    }

    .btn-select-plan:hover {
        opacity: .8;
        color: #fff;
    }
</style>
@endpush

