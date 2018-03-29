@extends('layouts._base')

@section('title', 'Reset Password')

@section('content')
    <div class="register-container full-height sm-p-t-30">
        <div class="d-flex justify-content-center flex-column full-height ">
            <img src="/vendor/assets/img/logo.png" alt="logo" data-src="/vendor/assets/img/logo.png" data-src-retina="/vendor/assets/img/logo_2x.png" width="78" height="22">
            <h3>Reset your lost password with new password</h3>
            <form id="form-register" class="p-t-15" role="form" action="{{ route('post.password_reset') }}" method="post">
                @csrf
                <input type="hidden" value="{{ $token }}" name="token">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label>Email</label>
                            <input type="email"
                                   name="email"
                                   placeholder="Enter email"
                                   class="form-control {{ $errors->has('email') ? 'error' : '' }}"
                                   required
                            >
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <label class="error">{{ $errors->first('email') }}</label>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label>Password</label>
                            <input type="password"
                                   name="password"
                                   placeholder="Minimum of 6 Characters"
                                   class="form-control {{ $errors->has('password') ? 'error' : '' }}"
                                   required>
                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <label class="error">{{ $errors->first('password') }}</label>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <label>Password Confirmation</label>
                            <input type="password" name="password_confirmation" placeholder="Re enter password" class="form-control" required>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-cons m-t-10" type="submit">Reset my password</button>
            </form>
        </div>
    </div>
@stop