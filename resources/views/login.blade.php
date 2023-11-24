@extends('layouts.app')
@section('content')
<div class="text-center">

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            @if (Session::has('errors') || Session::has('success'))
                
            <div class="alert alert-{{ Session::has('error')?'danger':'success' }}">{{ Session::has('error')?$errors->first():Session::get('success')}}</div>
            @endif
            <div class="card">
                <div class="card-header">Login Form</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                    
                        <div class="form-group">
                            <input id="email"  class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                    
                        <div class="form-group mt-2">
                            <input id="password" class="form-control" type="password" name="password" required>
                        </div>
                    
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
