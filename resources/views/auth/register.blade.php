@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center g-3 py-5">
            <div class="col-lg-4">
                <div class="card rounded">
                    <div class="card-body">

                        <h5 class="card-title">Register Account</h5>
                        <hr class="text-secondary" />
                        <div class="d-flex flex-column ">
                            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" placeholder="Full Name" name="name" value="{{ old('name') }}"
                                        autocomplete="name">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }} </div>
                                    @enderror
                                </div>

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

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation" placeholder="Confirm Password"
                                        name="password_confirmation" autocomplete="name">
                                    @error('confirm_password')
                                        <div class="invalid-feedback">{{ $message }} </div>
                                    @enderror
                                </div>

                                <div class="d-grid gap-2 mb-3">
                                    <button type="submit" class="btn btn-dark btn-md rounded-pill w-100">Register</button>
                                    <button onclick="handleClick()" type="reset"
                                        class="btn btn-dark btn-md rounded-pill w-100">Login</button>
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
        const handleClick = () => window.location.href = '/login'
    </script>
@endprepend
