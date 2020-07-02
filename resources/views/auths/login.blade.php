@extends('layouts.main')

@yield('content')
<div class="auth">
  <div class="auth__header">
    <div class="auth__logo">
      <img height="90" src="images/logo.svg" alt="">
    </div>
  </div>
  <div class="auth__body">
    <form class="auth__form" autocomplete="off" action="{{ url('login') }}">
      <div class="auth__form_body">
        <h3 class="auth__form_title">Peperoni App</h3>
        <div>
            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                    @php
                        Session::forget('error');
                    @endphp
                </div>
            @endif
          <div class="form-group">
            <label class="text-uppercase small">Email</label>
            <input type="email" class="form-control" placeholder="Enter email" name="email" >
            {!! $errors->first('email', '<small class="text-danger">:message</small>') !!}
          </div>
          <div class="form-group">
            <label class="text-uppercase small">Password</label>
            <input type="password" class="form-control" placeholder="Password" name="password">
            {!! $errors->first('password', '<small class="text-danger">:message</small>') !!}
          </div>
        </div>
      </div>
      <div class="auth__form_actions">
        <button class="btn btn-primary btn-lg btn-block submit">
          NEXT
        </button>
        <div class="mt-2">
          <a href="{{url('user-registration')}}" class="small text-uppercase">
            CREATE ACCOUNT
          </a>
        </div>
      </div>
    </form>
  </div>
</div>
