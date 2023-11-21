@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center g-3 py-5">
            <div class="col-lg-4">
                <div class="card rounded">
                    <div class="card-body">

                        <h5 class="card-title">Login Account</h5>
                        <hr class="text-secondary" />
                        <div class="d-flex flex-column ">
                            <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" placeholder="Email Address" name="email"
                                        value="{{ old('email') }}" autocomplete="name">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }} </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" placeholder="Password" name="password" autocomplete="name">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }} </div>
                                    @enderror
                                </div>

                                <div class="d-grid gap-2 mb-3">
                                    <button type="submit" class="btn btn-dark btn-md rounded-pill w-100">Login</button>
                                    <button onclick="handleClick()" type="button"
                                        class="btn btn-dark btn-md rounded-pill w-100">Register</button>

                                    <div class="mx-auto">
                                        <a href="{{ route('password.request') }}"
                                            class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover link-secondary text-decoration-none">Forgot
                                            Your
                                            Password?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@prepend('javascript')
    <script>
        const handleClick = () => window.location.href = '/register'
    </script>
@endprepend
