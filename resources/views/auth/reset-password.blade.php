@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center g-3 py-5">
            <div class="col-lg-4">
                <div class="card rounded">
                    <div class="card-body">

                        <h5 class="card-title">Reset Password</h5>
                        <hr class="text-secondary" />
                        <div class="d-flex flex-column ">
                            <form action="{{ route('password.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input readonly type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" placeholder="Email Address" name="email"
                                        value="{{ old('email', $request->email) }}" autocomplete="name">
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
                                    <button type="submit" class="btn btn-dark btn-md rounded-pill w-100">Reset
                                        Password</button>

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
