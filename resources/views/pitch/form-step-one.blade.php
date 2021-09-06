@extends('layouts.app')

@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            @php
            $updateMode = isset($updateMode) ? $updateMode : false
            @endphp
            {{-- <pitch-form></pitch-form> --}}
            @include('pitch.wizard-head', ['step' => 1, 'updateMode' => $updateMode])
            <form action="{{ $updateMode ? route('pitches.update.step-one', $pitch) :  route('pitches.store.step-one', $pitchForm) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($updateMode)
                @method('put')
                @endif
                <x-box class="shadow-s p-4" style="background-color: #fbfbfb;">

                    <x-text-field-group name="title" label="Title" value="{{ old('title', $pitch->title) }}"></x-text-field-group>

                    <x-form-group>
                        <label class="form-label">Website (Optional)</label>
                        <div class="input-group">
                            <span class="input-group-text">https://</span>
                            <input type="text" name="website" aria-label="https://" class="form-control {{ invalid_class('website') }}" value="{{ old('website', $pitch->website) }}">
                        </div>
                        <x-invalid-feedback field="website"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <label class="form-label">Where is your company based?</label>
                        <select name="company_country_id" class="form-select {{ invalid_class('company_country_id') }}">
                            <option value="">Please select</option>
                            @foreach (\App\Models\Country::active()->orderBy('name')->get() as $country)
                            <option value="{{ $country->id }}" @if(old('company_country_id', $pitch->company_country_id) == $country->id) selected @endif>{{ $country->name }}</option>
                            @endforeach
                        </select>
                        <x-invalid-feedback field="company_country_id"></x-invalid-feedback>
                    </x-form-group>

                    <x-text-field-group name="mobile" label="Mobile Number" value="{{ old('mobile', $pitch->mobile) }}"></x-text-field-group>

                    <x-form-group>
                        <label class="form-label">Industry</label>
                        <select name="industry" class="form-select {{ invalid_class('industry') }}">
                            <option value="">Please select</option>
                            <option value="Agriculture">Agriculture</option>
                            <option value="Business Services">Business Services</option>
                            <option value="Education & Training">Education & Training</option>
                            <option value="Energy & Natural Resources">Energy & Natural Resources</option>
                            <option value="Entertainment & Leisure">Entertainment & Leisure</option>
                            <option value="Fashion & Beauty">Fashion & Beauty</option>
                            <option value="Finance">Finance</option>
                            <option value="Food & Beverage">Food & Beverage</option>
                            <option value="Hospitality, Restaurants & Bars">Hospitality, Restaurants & Bars</option>
                            <option value="Manufacturing & Engineering">Manufacturing & Engineering</option>
                            <option value="Media">Media</option>
                            <option value="Medical & Sciences">Medical & Sciences</option>
                            <option value="Personal Services">Personal Services</option>
                            <option value="Products & Inventions">Products & Inventions</option>
                            <option value="Property">Property </option>
                            <option value="Retail">Retail</option>
                            <option value="Sales & Marketing">Sales & Marketing</option>
                            <option value="Software">Software</option>
                            <option value="Technology">Technology</option>
                            <option value="Transportation">Transportation</option>
                        </select>
                        <x-invalid-feedback field="industry"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <label class="form-label">Stage</label>
                        <select name="stage" class="form-select {{ invalid_class('stage') }}">
                            <option value="Pre-Startup/R&D">Pre-Startup/R&D</option>
                            <option value="MVP/Finished Product">MVP/Finished Product</option>
                            <option value="Achieving Sales">Achieving Sales</option>
                            <option value="Breaking Even">Breaking Even</option>
                            <option value="Profitable">Profitable</option>
                            <option value="Other">Other</option>
                        </select>
                        <x-invalid-feedback field="stage"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <label class="form-label">Ideal Investor Role</label>
                        <select name="investor_role" class="form-select {{ invalid_class('investor_role') }}">
                            <option value="">Please select</option>
                            <option value="Silent">Silent</option>
                            <option value="Daily Involvement">Daily Involvement</option>
                            <option value="Weekly Involvement">Weekly Involvement</option>
                            <option value="Monthly Involvement">Monthly Involvement</option>
                            <option value="Any">Any</option>
                        </select>
                        <x-invalid-feedback field="investor_role"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <label class="form-label">If you did a pervious round, how much did you raise?</label>
                        <div class="input-group">
                            <span class="input-group-text">{{ priceUnit() }}</span>
                            <input type="number" name="currently_invested" class="form-control {{ invalid_class('currently_invested') }}" value="{{ old('currently_invested', $pitch->currently_invested) }}">
                            <x-invalid-feedback field="currently_invested"></x-invalid-feedback>
                        </div>
                    </x-form-group>


                    <x-form-group>
                        <label class="form-label"> How are you raising in total?</label>
                        <div class="input-group">
                            <span class="input-group-text">{{ priceUnit() }}</span>
                            <input type="number" name="max_investment" class="form-control {{ invalid_class('max_investment') }}" value="{{ old('max_investment', $pitch->max_investment) }}">
                            <x-invalid-feedback field="max_investment"></x-invalid-feedback>
                        </div>
                    </x-form-group>

                    <x-form-group>
                        <label class="form-label">How much of this total have you raised?</label>
                        <div class="input-group">
                            <span class="input-group-text">{{ priceUnit() }}</span>
                            <input type="number" name="capital" class="form-control {{ invalid_class('capital') }}" value="{{ old('capital', $pitch->capital) }}">
                            <x-invalid-feedback field="capital"></x-invalid-feedback>
                        </div>
                    </x-form-group>

                    <x-form-group>
                        <label class="form-label">What is the minimum Investment per investor?</label>
                        <div class="input-group">
                            <span class="input-group-text">{{ priceUnit() }}</span>
                            <input type="number" name="min_investment" class="form-control {{ invalid_class('min_investment') }}" value="{{ old('min_investment', $pitch->min_investment) }}">
                            <x-invalid-feedback field="min_investment"></x-invalid-feedback>
                        </div>
                    </x-form-group>

                    <x-form-group>
                        <label class="form-label">Do you have any tax relief available in this funding round?</label>
                        <select name="tax_relief_type" class="form-select {{ invalid_class('tax_relief_type') }}">
                            <option value="">Please select</option>
                            <option value="SEIS" @if(old('min_investment', $pitch->min_investment) == 'SEIS') selected @endif>SEIS</option>
                            <option value="EIS" @if(old('min_investment', $pitch->min_investment) == 'EIS') selected @endif>EIS</option>
                        </select>
                        <x-invalid-feedback field="tax_relief_type"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <button type="submit" class="btn btn-primary py-3 w-100">Save & Continue</button>
                    </x-form-group>

                </x-box>

            </form>
        </div>
    </div>
</div>

@endsection
