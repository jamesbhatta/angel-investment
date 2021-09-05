@extends('layouts.backend')

@section('content')
<div class="container py-2">

    <h4 class="h4-responsive py-4">{{ $title }}</h4>

    <div class="row">
        <div class="col-md-7">
            <form action="{{ route('backend.settings.general.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card bg-light">
                    <div class="card-body p-4">
                        <x-text-field-group name="site_name" label="Site name" value="{{ old('site_name', appSettings('site_name')) }}"></x-text-field-group>
                        <x-text-field-group name="tagline" label="Tagline" value="{{ old('tagline', appSettings('tagline')) }}"></x-text-field-group>

                        <x-form-group>
                            <label class="form-label">Logo</label>
                            <div class="input-group">
                                @if(appSettings()->get('site_logo'))
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="site-logo-prepend">
                                        <img src="{{ asset('storage/' . appSettings()->get('site_logo')) }}" alt="" style="height:1.5em;">
                                    </span>
                                </div>
                                @endif
                                {{-- <div class="custom-file"> --}}
                                    <input type="file" name="site_logo" class="form-control" id="site-logo-input" aria-describedby="site-logo-prepend">
                                    {{-- <label class="custom-file-label" for="site-logo-input">Choose file</label> --}}
                                {{-- </div> --}}
                            </div>
                        </x-form-group>

                        <x-form-group>
                            <label class="form-label">Favicon</label>
                            <div class="input-group">
                                @if(appSettings()->get('favicon'))
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">
                                        <img src="{{ asset('storage/' . appSettings()->get('favicon')) }}" alt="" style="height:1.5em;">
                                    </span>
                                </div>
                                @endif
                                    <input type="file" name="favicon" class="form-control" id="favicon-input" aria-describedby="inputGroupFileAddon01">
                            </div>
                        </x-form-group>

                        {{-- <div class="form-group">
                <x-form.label>Show Top Bar</x-form.label>
                <select name="show_top_bar" class="custom-select d-block w-25">
                    <option value="yes">Yes</option>
                    <option value="no" @if(old('show_top_bar', appSettings('show_top_bar')=='no' )) selected @endif>No</option>
                </select>
            </div> --}}

                        <x-text-field-group name="mobile" label="Mobile" value="{{ old('mobile', appSettings('mobile')) }}"></x-text-field-group>
                        <x-text-field-group name="email" label="E-mail" value="{{ old('email', appSettings('email')) }}"></x-text-field-group>
                        <x-text-field-group name="address" label="Address" value="{{ old('address', appSettings('address')) }}"></x-text-field-group>
                        <x-text-field-group name="price_unit" label="Currency unit" value="{{ old('price_unit', appSettings('price_unit')) }}"></x-text-field-group>
                        <x-text-field-group name="facebook_url" label="Facebook Page Url" value="{{ old('facebook_url', appSettings('facebook_url')) }}"></x-text-field-group>
                        <x-text-field-group name="twitter_url" label="Twitter Url" value="{{ old('twitter_url', appSettings('twitter_url')) }}"></x-text-field-group>
                        <x-text-field-group name="youtube_url" label="Youtube Url" value="{{ old('youtube_url', appSettings('youtube_url')) }}"></x-text-field-group>
                        <x-text-field-group name="linkedin_url" label="LinedIn Url" value="{{ old('linkedin_url', appSettings('linkedin_url')) }}"></x-text-field-group>
                        <x-text-field-group name="instagram_url" label="Instagram Url" value="{{ old('instagram_url', appSettings('instagram_url')) }}"></x-text-field-group>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary px-4">Save</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
