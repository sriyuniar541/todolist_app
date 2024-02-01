
@extends('index') @section('title', 'Register') @section('content') 
<div class="mt-5 shadow-lg mb-5 bg-body-tertiary rounded p-5">
    <form action="{{ url('user/post_register') }}" method="POST">
        @csrf
        <h2 class="text-secondary text-center pb-5">Register</h2>

        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input
                    type="email"
                    class="form-control"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label"
                >Password</label
            >
            <div class="col-sm-10">
                <input
                    type="password"
                    class="form-control"
                    name="password"
                    id="password"
                    value="{{ old('password') }}"
                />
            </div>
        </div>

        <div class="mb-3 row">
            <label for="username" class="col-sm-2 col-form-label"
                >Username</label
            >
            <div class="col-sm-10">
                <input
                    type="text"
                    class="form-control"
                    name="username"
                    id="username"
                    value="{{ old('username') }}"
                />
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <button class="btn btn-outline-primary">Register</button> 
            <p>Sudah punya akun ?<a href="/user/login">Login</a></p>
         </div>
    </form>
</div>
@endsection