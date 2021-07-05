@extends('admin.partials.login')

@section('content')
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <img src="{{ second_img_me() }}" alt="Logo">
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-2">Log in with your data that you entered during registration.</p>

                    <form action="{{ route('auth.login.send') }}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="email" class="form-control" placeholder="Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        {{-- <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div> --}}
                        {{-- @include('components.errorBags') --}}
                        @if (isset($errors) && !empty($errors) && is_array($errors))
                            @foreach ($errors as $error)
                                <p class="alert alert-danger">{{ $error }}</p>
                            @endforeach
                        @endif
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>

                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right" class="flex">
                    <img src="{{ img_me('gadas.svg') }}" alt="Logo">
                </div>
            </div>
        </div>

    </div>
@endsection
