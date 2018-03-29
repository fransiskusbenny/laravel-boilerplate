@extends('layouts._base')

@section('title', 'Resest Password')

@section('content')
    <div class="lock-container full-height">
        <div class="full-height sm-p-t-50 align-items-center d-md-flex">
            <div class="row full-width">
                <div class="col-md-6">
                    <div class="d-flex justify-content-start align-items-center">
                        <div class="">
                            <div class="thumbnail-wrapper circular d48 m-r-10 ">
                                <img width="43" height="43" data-src-retina="assets/img/profiles/avatar_small2x.jpg" data-src="assets/img/profiles/avatar.jpg" alt="" src="assets/img/profiles/avatar_small2x.jpg">
                            </div>
                        </div>
                        <div class="">
                            <h5 class="logged hint-text no-margin">
                                A message will be sent to that address containing a link to reset your password
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        <button class="close" data-dismiss="alert"></button>
                        {{ session('status') }}
                    </div>
                    @endif
                    <form id="form-lock" role="form" method="post" action="{{ route('post.password_request') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default {{ $errors->has('email') ? 'has-error' : '' }} sm-m-t-30">
                                    <label>Credentials</label>
                                    <div class="controls">
                                        <input type="email" name="email"
                                               placeholder="Your email address"
                                               class="form-control {{ $errors->has('email') ? 'error' : '' }}"
                                               value="{{ old('email') }}"
                                               required
                                        >
                                    </div>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <label class="error">{{ $errors->first('email') }}</label>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 sm-p-l-25">
                                <button type="submit" class="btn btn-primary btn-block">Send Reset Password Link</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
@endsection