@extends('layouts.materialize.login')
@section('content')
<form role="form" action="{!! URL::to('/login') !!}" method="post" class="login-form" id="reset-password-form" data-submit="noAjax">

    {!! csrf_field() !!}
    <div class="row">
        <div class="input-field col s12 center">

            @if(config('config.logo') && File::exists(config('constant.upload_path.logo').config('config.logo')))
            <div class="logo text-center">
                <img src="/{!! config('constant.upload_path.logo').config('config.logo') !!}" class="circle responsive-img valign profile-image-login" alt="Logo">
            </div>
            @endif
            <p class="center login-form-text">Material Design Admin Template</p>



        </div>
    </div>
    <div class="row margin">
        <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            @if(config('config.login'))
            <input type="text" name="email" id="email">
            <label for="email" class="center-align">{!! trans('messages.email') !!}</label>
            @else
            <input type="text" name="username" id="username">
            <label for="username" class="center-align">{!! trans('messages.username') !!}</label>
            @endif
        </div>
    </div>
    <div class="row margin">
        <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>

            <input type="password" name="password" id="password" >
            <label for="password">{!! trans('messages.password') !!}</label>

        </div>
    </div>
    @if(config('config.enable_remember_me'))
    <div class="row">          
        <div class="input-field col s12">
            <input name="remember" id="remember" type="checkbox" class="checkbox-input" data-size="mini" data-on-text="Yes" data-off-text="No" value="1"> 
            <label for="remember">{!! trans('messages.remember_me') !!}</label>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="input-field col s12">

            <button type="submit" class="btn waves-effect waves-light light-blue darken-4 col s12">{!! trans('messages.login') !!}</button>
        </div>
    </div>


    @if(config('config.enable_user_registration'))
    <div class="row">
        <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"> <a href="/register">{!! trans('messages.create').' '.trans('messages.account') !!}?</a></p>
        </div>

        @endif



        <div class="input-field col s6 m6 l6">
            @if(config('config.enable_forgot_password'))
            <p class="margin medium-small"><a href="/password/reset">{!! trans('messages.forgot').' '.trans('messages.password') !!}?</a></p>
            @endif
        </div>


    </div>

</form>

@if(config('config.enable_social_login'))
<hr class="login-social-or"/>
<div class="text-center">
    {-- <p style="font-weight:bold;">Or</p>--}}
    @foreach(config('constant.social_login_provider') as $provider)
    @if(config('config.enable_'.$provider.'_login'))
    <a class="btn waves-effect waves-light light-blue darken-4 btn-{{$provider.(($provider == 'google') ? '-plus' : '')}}" href="/auth/{{$provider}}">
        <i class="fa fa-{{$provider}}"></i> {{toWord($provider)}}
    </a>
    @endif
    @endforeach
</div>
@endif
@stop
