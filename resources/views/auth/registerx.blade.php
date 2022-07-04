@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <img src="data:image/png;base64,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" alt="">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="favoriteColor" class="col-md-4 col-form-label text-md-right">{{ __('Favorite Color') }}</label>

                            <div class="col-md-6">
                                <input id="favoriteColor" type="text" class="form-control @error('favoriteColor') is-invalid @enderror" name="favoriteColor" value="{{ old('favoriteColor') }}" required autocomplete="favoriteColor">

                                @error('favoriteColor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
