@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center g-3 py-5">
            <div class="col-lg-4">
                <div class="card rounded">
                    <div class="card-body">

                        <h5 class="card-title">Forgot Password</h5>
                        <hr class="text-secondary" />

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="d-flex flex-column ">
                            <form action="{{ route('password.email') }}" method="POST" enctype="multipart/form-data">
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


                                <div class="d-grid gap-2 mb-3">
                                    <button type="submit" class="btn btn-dark btn-md rounded-pill w-100">Send Reset
                                        Link</button>
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
