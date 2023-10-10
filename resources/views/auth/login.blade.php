@extends('layouts.app')

@section('content')
<div class="container-login">
    <h2>Login</h2>
    <form action="/checklogin" method="POST">
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            @if ($errors->has('username'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <input type="submit" value="Login">
        </div>
    </form>
    @if(session('error'))
        <p class="message">{{ session('error') }}</p>
    @endif
</div>
@endsection


