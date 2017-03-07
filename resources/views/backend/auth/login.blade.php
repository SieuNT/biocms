@extends('layouts.auth.backend')

@section('content')

    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.auth.login') }}">
        <h1>Đăng nhập</h1>

        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="@lang('auth.email')" required autofocus>
            @if ($errors->has('email'))
                <span class="help-block text-left">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" type="password" class="form-control" name="password" placeholder="@lang('auth.password')" required>

            @if ($errors->has('password'))
                <span class="help-block text-left">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="clearfix"></div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-6">
                    <div class="checkbox text-left">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> @lang('auth.remember_login')
                        </label>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="text-right">
                        <button type="submit" class="btn btn-success submit">@lang('auth.login')</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="separator">
            <p class="change_link">
                <a class="btn btn-link" href="{{ route('admin.password.request') }}">{{ __('auth.forgot_your_password') }}</a>
            </p>
        </div>
    </form>
@endsection
