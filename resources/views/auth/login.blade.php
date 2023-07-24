@extends('layouts.app')

@section('content')
<style>
    body{
        background: url("/front/img/bg1.png") no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        font-family: 'Poppins', sans-serif;
    }
    .container {
        position: relative;
        margin-top: 8%;
        max-width: 350px;
        height: auto;
        background: #fff;
        text-align: center;
        border-radius: 4px;
}
    .container img{
        position: relative;
        width: 180px;
        height: auto;    
        margin-top: 24px;
    }
    .form{
        text-align: left;
        padding: 24px 13px;
    }
  
    .form label {
        font-size: 14px;
        font-weight: bold;
        color: #000;
        margin: 8px 0px;
    }
    input[type="email"] {
        width: 300px;
        height: 40px;
        padding: 12px 12px;
        font-size: 12px;
        outline: none;
        border-radius: 4px;
        border: 1px solid #1e1e1e;
        margin-bottom: 8px;
    }
    input[type="password"] {
        width: 300px;
        height: 40px;
        padding: 12px 12px;
        font-size: 12px;
        outline: none;
        border-radius: 4px;
        border: 1px solid #1e1e1e;
        margin-bottom: 20px;
    }
    .btn{
        background-color: #e78b13;
        color: #fff;
        height: 42px;
        width: 300px;
        font-weight: bold;
        margin-bottom: 14px;
        border-radius: 4px;
        border: none;
        font-size: 14px;
    }
    .btn:hover{
        background-color: #1e1e1e;
        color: #fff;
    }
</style>
    <div class="container">
        <div class="img">
            <img src="{{asset('front/img/bualuvillage.png')}}" alt="" srcset="">
        </div>
        <div class="form">
             <form method="POST" action="{{ route('login') }}">
             @csrf
                <label for="username">Username</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                        @enderror

                <label for="password">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
            
                        <button type="submit" class="btn">
                                    {{ __('Login') }}
                        </button>
      </form>
      
    </div>

@endsection
