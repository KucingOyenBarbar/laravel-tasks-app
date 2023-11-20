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
                            <form action="{{ route('tasks.update', $tasks->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf @method('PUT')
                                <div class="mb-3">
                                    <label for="title" class="form-label">Task Name</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" placeholder="Task Name" name="title"
                                        value="{{ $tasks->title ? $tasks->title : old('title') }}" autocomplete="name">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Task Description</label>
                                    <textarea style="text-align: left" class="form-control  @error('description') is-invalid @enderror" id="description"
                                        rows="7" name="description" value="{{ $tasks->description ? $tasks->description : old('description') }}"
                                        placeholder="Write Task Description...">
                                    {{ $tasks->description }}</textarea>

                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }} </div>
                                    @enderror
                                </div>

                                <button type="submit"
                                    class="btn btn-dark btn-md rounded-pill w-100">{{ $page_title }}</button>

                            </form>
                            <div class="d-grid gap-2 pt-2">
                                {{-- handle remove task --}}
                                <form action="{{ route('tasks.destroy', $tasks->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-md rounded-pill w-100">Remove
                                        Task</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
