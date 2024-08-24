@extends('manager.layouts.master')
@section('title') Manager Login @endsection

@section('content')

<main>
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login Now</div>
                    <div class="card-body">
                        <form action="{{route('login.post')}}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="auth" class="col-md-4 col-form-label text-md-right">Email Or Phone</label>
                                <div class="col-md-6">
                                    <input type="text" id="auth" class="form-control" name="auth" value="{{old('auth')}}" required autofocus>
                                    @if($errors->has('auth'))
                                        <div class="alert alert-danger"> {{ $errors->first('auth') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember_me" value="1" {{ old('remember_me') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login Now
                                </button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
@endsection
