@extends('layouts.main')
@section('content')
<div class="auth">
  <div class="auth__header">
    
  </div>
  <div class="auth__body">
    <form class="auth__form" autocomplete="off" action="{{url('user-store')}}" method="post">
      @csrf
      @if(Session::has('success'))
          <div class="alert alert-success">
              {{ Session::get('success') }}
              @php
                  Session::forget('success');
              @endphp
          </div>
      @endif
      <div class="auth__form_body">
        <h3 class="auth__form_title">
        <img src="images/logo.svg" alt="" width="50">
        Peperoni App
        </h3>
        <div>
          <div class="form-group">
            <label class="text-uppercase small">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="email">
            @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group">
            <label class="text-uppercase small">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
            @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group">
            <label class="text-uppercase small">Address</label>
            <textarea name="address"  class="form-control @error('password') is-invalid @enderror" placeholder="Address"></textarea>
            @error('address')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="role" value="">I'm a manager
            </label>
        </div>
        </div>
      </div>
      <div class="auth__form_actions">
        <button class="btn btn-primary btn-lg btn-block">
          NEXT
        </button>
        <div class="mt-2">
          <a href="{{url('/')}}" class="small text-uppercase">
            SIGN IN INSTEAD
          </a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
