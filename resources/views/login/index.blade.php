@extends('layouts.login')
@section('container')

             @if (session()->has('errors'))
              <div id="error" style="visibility: hidden">
                {{ session('errors') }}
              </div>
            @elseif(session()->has('success'))
              <div id="success" style="visibility: hidden">
                {{ session('success') }}
              </div>
            @endif

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <form method="POST" action="/login">
                    @csrf
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autocomplete="username">
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required autocomplete="current-password">
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="3">
                      Login
                    </button>
                  </div>
                </form>

              </div>
            </div>
         

            @endsection