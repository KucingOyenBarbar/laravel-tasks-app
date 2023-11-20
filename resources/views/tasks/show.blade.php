@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-7">
                <div class="card rounded">
                    <div class="card-body">
                        <a href="{{ route('tasks.index') }}"
                            class="link-offset-2 link-underline link-underline-opacity-0 text-dark text-decoration-none text-start">
                            <i class="fa fa-arrow-left me-1"></i> {{ $page_title }}
                        </a>

                        <div class="d-flex flex-column py-3">
                            <h1 class="text-start text-dark fw-medium fs-3">{{ $tasks->title }}</h1>
                            <div class="text-start mb-3">{{ $tasks->description }}</div>

                            <div class="d-grid gap-2">
                                @if ($tasks->completed)
                                    <form action="{{ route('tasks.undo', $tasks->id) }}" method="POST">
                                        @csrf @method('PUT')
                                        <button type="submit"
                                            class="btn btn-warning btn-md rounded-pill w-100 text-white">Undo
                                            Task</button>
                                    </form>
                                @else
                                    {{-- handle undo task --}}
                                    <form action="{{ route('tasks.completed', $tasks->id) }}" method="POST">
                                        @csrf @method('PUT')
                                        <button type="submit"
                                            class="btn btn-warning btn-md rounded-pill w-100 text-white">Completed
                                            Task</button>
                                    </form>
                                @endif


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
