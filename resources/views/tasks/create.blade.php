@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <div class="row justify-content-center g-3">
            <div class="col-lg-6">
                <div class="card rounded-4">
                    <div class="card-body">

                        <a href="{{ route('tasks.index') }}"
                            class="link-offset-2 link-underline link-underline-opacity-0 text-dark text-decoration-none">
                            <i class="fa fa-arrow-left me-1"></i> {{ $page_title }}
                        </a>

                        <div class="d-flex flex-column py-3">
                            <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Task Name</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" placeholder="Task Name" name="title" value="{{ old('title') }}"
                                        autocomplete="name">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Task Description</label>
                                    <textarea class="form-control  @error('description') is-invalid @enderror" id="description" rows="7"
                                        name="description" placeholder="Write Task Description..."></textarea>

                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }} </div>
                                    @enderror
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit"
                                        class="btn btn-dark btn-md rounded-pill w-100">{{ $page_title }}</button>
                                    <button type="reset"
                                        class="btn btn-outline-dark btn-md rounded-pill w-100">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
