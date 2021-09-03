@extends('layouts.app')

@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            {{-- <pitch-form></pitch-form> --}}
            @include('pitch.wizard-head', ['step' => 1])
            <form action="{{ route('pitches.store.step-one', $pitchForm) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-box class="shadow-s p-4" style="background-color: #fbfbfb;">

                    <x-text-field-group name="title" label="Title" value="{{ old('title', $pitch->title) }}"></x-text-field-group>

                    <x-form-group>
                        <label class="form-label">Website (Optional)</label>
                        <div class="input-group">
                            <span class="input-group-text">https://</span>
                            <input type="text" name="website" aria-label="https://" class="form-control {{ invalid_class('website') }}"  value="{{ old('website', $pitch->website) }}">
                        </div>
                        <x-invalid-feedback field="website"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <label class="form-label">Where is your company based?</label>
                        <select name="company_country" class="form-select {{ invalid_class('title') }}">
                            <option>Please select</option>
                            <option value="USA">USA</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="4">Quatar</option>
                            <option value="4">UAE</option>
                        </select>
                        <x-invalid-feedback field="name"></x-invalid-feedback>
                    </x-form-group>

                    <x-text-field-group name="mobile" label="Mobile Number"></x-text-field-group>

                    <x-form-group>
                        <label class="form-label">Industry</label>
                        <select name="industry" class="form-select {{ invalid_class('industry') }}">
                            <option>Please select</option>
                            <option value="5">Agriculture</option>
                            <option value="12">Business Services</option>
                            <option value="1">Education &amp; Training</option>
                            <option value="15">Energy &amp; Natural Resources</option>
                            <option value="28">Entertainment &amp; Leisure</option>
                            <option value="21">Fashion &amp; Beauty</option>
                            <option value="13">Finance</option>
                            <option value="23">Food &amp; Beverage</option>
                            <option value="17">Hospitality, Restaurants &amp; Bars</option>
                            <option value="14">Manufacturing &amp; Engineering</option>
                            <option value="11">Media</option>
                            <option value="2">Medical &amp; Sciences</option>
                            <option value="29">Personal Services</option>
                            <option value="18">Products &amp; Inventions</option>
                            <option value="16">Property </option>
                            <option value="19">Retail</option>
                            <option value="20">Sales &amp; Marketing</option>
                            <option value="8">Software</option>
                            <option value="22">Technology</option>
                            <option value="4">Transportation</option>
                        </select>
                        <x-invalid-feedback field="industry"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <label class="form-label">Stage</label>
                        <select name="stage" class="form-select {{ invalid_class('stage') }}">
                            <option>Please select</option>
                            <option value="1">USA</option>
                            <option value="2">India</option>
                            <option value="3">Indoesia</option>
                            <option value="4">Quatar</option>
                            <option value="4">UAE</option>
                        </select>
                        <x-invalid-feedback field="stage"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <label class="form-label">Ideal Investor Role</label>
                        <select name="investor_role" class="form-select {{ invalid_class('investor_role') }}">
                            <option>Please select</option>
                            <option value="1">USA</option>
                            <option value="2">India</option>
                            <option value="3">Indoesia</option>
                            <option value="4">Quatar</option>
                            <option value="4">UAE</option>
                        </select>
                        <x-invalid-feedback field="investor_role"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <label class="form-label">If you did a pervious round, how much did you raise?</label>
                        <select name="currently_invested" class="form-select {{ invalid_class('currently_invested') }}">
                            <option>Please select</option>
                            <option value="1">USA</option>
                            <option value="2">India</option>
                            <option value="3">Indoesia</option>
                            <option value="4">Quatar</option>
                            <option value="4">UAE</option>
                        </select>
                        <x-invalid-feedback field="currently_invested"></x-invalid-feedback>
                    </x-form-group>


                    <x-form-group>
                        <label class="form-label"> How are you raising in total?</label>
                        <select name="max_investment" class="form-select {{ invalid_class('max_investment') }}">
                            <option>Please select</option>
                            <option value="1">USA</option>
                            <option value="2">India</option>
                            <option value="3">Indoesia</option>
                            <option value="4">Quatar</option>
                            <option value="4">UAE</option>
                        </select>
                        <x-invalid-feedback field="max_investment"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <label class="form-label">How much of this total have you raised?</label>
                        <select name="capital" class="form-select {{ invalid_class('capital') }}">
                            <option>Please select</option>
                            <option value="1">USA</option>
                            <option value="2">India</option>
                            <option value="3">Indoesia</option>
                            <option value="4">Quatar</option>
                            <option value="4">UAE</option>
                        </select>
                        <x-invalid-feedback field="capital"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <label class="form-label">What is the minimum Investment per investor?</label>
                        <select name="min_investment" class="form-select {{ invalid_class('min_investment') }}">
                            <option>Please select</option>
                            <option value="1">USA</option>
                            <option value="2">India</option>
                            <option value="3">Indoesia</option>
                            <option value="4">Quatar</option>
                            <option value="4">UAE</option>
                        </select>
                        <x-invalid-feedback field="min_investment"></x-invalid-feedback>
                    </x-form-group>

                    <x-form-group>
                        <label class="form-label">Do you have any tax relief available in this funding round?</label>
                        <select name="tax_relief_type" class="form-select {{ invalid_class('tax_relief_type') }}">
                            <option>Please select</option>
                            <option value="1">USA</option>
                            <option value="2">India</option>
                            <option value="3">Indoesia</option>
                            <option value="4">Quatar</option>
                            <option value="4">UAE</option>
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
