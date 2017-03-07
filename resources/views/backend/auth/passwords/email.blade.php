@extends('layouts.auth.backend')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.password.email') }}">
        <h1>@lang('auth.forgot_password')</h1>

        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
             <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="@lang('auth.email')" required>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">@lang('auth.send_password_reset_link')</button>
        </div>
    </form>
@endsection
