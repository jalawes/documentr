@extends('layouts.app')

@section('content')

    <div class="columns is-centered">
        <div class="column is-4">
            <div class="box">
                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    {{-- First name Form Field --}}
                    <div class="field">
                        <label class="label" for="first_name">First name</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" type="text" name="first_name" placeholder="John" required autofocus>
                            <span class="icon is-small is-left"><i class="fa fa-address-card-o"></i></span>
                            @if ($errors->has('first_name'))
                                <span class="icon is-small is-right"><i class="fa fa-warning"></i></span>
                            @endif
                        </div>
                        @if ($errors->has('first_name'))
                            <p class="help is-danger">{{ $errors->first('first_name') }}</p>
                        @endif
                    </div>

                    {{-- Last name Form Field --}}
                    <div class="field">
                        <label class="label" for="last_name">Last name</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" type="text" name="last_name" placeholder="Doe">
                            <span class="icon is-small is-left"><i class="fa fa-address-card-o"></i></span>
                            @if ($errors->has('last_name'))
                                <span class="icon is-small is-right"><i class="fa fa-warning"></i></span>
                            @endif
                        </div>
                        @if ($errors->has('last_name'))
                            <p class="help is-danger">{{ $errors->first('last_name') }}</p>
                        @endif
                    </div>

                    {{-- Email Form Field --}}
                    <div class="field">
                        <label class="label" for="email">Email</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" type="email" name="email" placeholder="johndoe@example.com" required>
                            <span class="icon is-small is-left"><i class="fa fa-envelope"></i></span>
                            @if ($errors->has('email'))
                                <span class="icon is-small is-right"><i class="fa fa-warning"></i></span>
                            @endif
                        </div>
                        @if ($errors->has('email'))
                            <p class="help is-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    {{-- Password Form Field --}}
                    <div class="field">
                        <label class="label" for="password">Password</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" type="password" name="password" placeholder="********" required>
                            <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>
                            @if ($errors->has('password'))
                                <span class="icon is-small is-right"><i class="fa fa-warning"></i></span>
                            @endif
                        </div>
                        @if ($errors->has('password'))
                            <p class="help is-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    {{-- Password confirmation Form Field --}}
                    <div class="field">
                        <label class="label" for="password_confirmation">Password confirmation</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" type="text" name="password_confirmation" placeholder="********" required>
                            <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>
                            @if ($errors->has('password_confirmation'))
                                <span class="icon is-small is-right"><i class="fa fa-warning"></i></span>
                            @endif
                        </div>
                        @if ($errors->has('password_confirmation'))
                            <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
                        @endif
                    </div>

                    <div class="field">
                        <button class="button is-fullwidth is-info">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-8 col-md-offset-2">--}}
    {{--<div class="panel panel-default">--}}
    {{--<div class="panel-heading">Register</div>--}}

    {{--<div class="panel-body">--}}
    {{--<form class="form-horizontal" method="POST" action="{{ route('register') }}">--}}
    {{--{{ csrf_field() }}--}}

    {{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
    {{--<label for="name" class="col-md-4 control-label">Name</label>--}}

    {{--<div class="col-md-6">--}}
    {{--<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>--}}

    {{--@if ($errors->has('name'))--}}
    {{--<span class="help-block">--}}
    {{--<strong>{{ $errors->first('name') }}</strong>--}}
    {{--</span>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
    {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

    {{--<div class="col-md-6">--}}
    {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

    {{--@if ($errors->has('email'))--}}
    {{--<span class="help-block">--}}
    {{--<strong>{{ $errors->first('email') }}</strong>--}}
    {{--</span>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
    {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

    {{--<div class="col-md-6">--}}
    {{--<input id="password" type="password" class="form-control" name="password" required>--}}

    {{--@if ($errors->has('password'))--}}
    {{--<span class="help-block">--}}
    {{--<strong>{{ $errors->first('password') }}</strong>--}}
    {{--</span>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
    {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}

    {{--<div class="col-md-6">--}}
    {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
    {{--<div class="col-md-6 col-md-offset-4">--}}
    {{--<button type="submit" class="btn btn-primary">--}}
    {{--Register--}}
    {{--</button>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
@endsection
