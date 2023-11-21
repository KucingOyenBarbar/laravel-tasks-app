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
                                A fresh verification link has been sent to your email
                            </div>
                        @endif

                        Before proceeding, please check your email for verification or
                        <form class="d-inline px-0 mx-0" method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link text-dark align-baseline">{{ __('click here to request another') }}</button>
                        </form>
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
