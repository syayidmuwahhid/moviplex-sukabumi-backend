@extends('layouts.app-login')
@section('title', 'Login - Moviplex Sukabumi')
@section('main')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
            <div class="card-body">
                <form method="post" action="{{ url('/login') }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputEmail" type="email" value="{{ old('email') }}" placeholder="name@example.com" name="email" required/>
                        <label for="inputEmail">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password" required />
                        <label for="inputPassword">Password</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center py-3">
                {{-- <div class="small"><a href="register.html">Need an account? Sign up!</a></div> --}}
                @if($errors->has('email'))
                    <div class="alert alert-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection