@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:#87CEEB">{{ __('Register') }}</div>

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
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            <div class="small" id="message">
                                                <br>
                                                <p>Password must contain the following:</p>
                                                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                                                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                                <p id="number" class="invalid">A <b>number</b></p>
                                            </div>
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <br>
                                <input type="checkbox" onclick="showPassword()"> Show Password
                                <script>
                                    function showPassword() {
                                        var x = document.getElementById("password");
                                        var y = document.getElementById("password-confirm");
                                        if (x.type === "password") {
                                            x.type = "text";
                                        } else {
                                            x.type = "password";
                                        }
                                        if (y.type === "password") {
                                            y.type = "text";
                                        } else {
                                            y.type = "password";
                                        }
                                    }
                                </script>
                            </div>
                            
                        </div>
                        
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4" style="text-align:center">
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