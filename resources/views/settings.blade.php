@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile Settings') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('settings.get') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- Update profile pic --}}
                        <div class="form-group row mb-3">
                            <div class="col text-center">
                                <img src="{{ asset('storage/profile_images/' . auth()->user()->profile_image) }}" alt="Profile Picture" style="width: 100px; height: 100px;">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="profile_image" class="col-md-4 col-form-label">{{ __('Profile Picture') }}</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" id="profile_image" name="profile_image">
                            </div>
                        </div>

                        {{-- Display validation errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group row mb-3">
                            <label for="firstname" class="col-md-4 col-form-label">{{ __('First Name') }}</label>
                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ Auth::user()->firstname }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="lastname" class="col-md-4 col-form-label">{{ __('Last Name') }}</label>
                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ Auth::user()->lastname }}">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="mobile" class="col-md-4 col-form-label">{{ __('Mobile No.') }}</label>
                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile', auth()->user()->mobile) }}" required autofocus>
                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row ">
                            <div class="col-md-6 offset-md-10">
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </div>
                        </div>
                        
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
