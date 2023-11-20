@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <div class="row justify-content-center g-2">
            <div class="col-lg-7">
                <div class="card rounded">
                    <div class="card-body">
                        <h5 class="card-title">Tasks List</h5>

                        <a href="{{ route('tasks.create') }}" class="btn btn-dark btn-sm rounded"
                            aria-label="Add New Tasks">Add New Tasks <i class="fa fa-plus">
                            </i></a>

                        <hr class="text-secondary" />

                        <div class="row justify-content-end g-2">
                            <div class="col-lg-5 col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <input type="email" class="form-control rounded-pill" id="exampleInputEmail1"
                                        placeholder="Search tasks...">
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-start g-2">
                            <div class="col">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Tasks Name</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tasks as $task)
                                                <tr>
                                                    <td class="align-middle">
                                                        {{ ($tasks->currentpage() - 1) * $tasks->perpage() + $loop->index + 1 }}
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="{{ route('tasks.show', $task->id) }}"
                                                            class="link-secondary link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover text-decoration-none">{{ $task->title }}</a>
                                                    </td>
                                                    <td class="align-middle">
                                                        @isset($task->completed)
                                                            @if ($task->completed)
                                                                <span class="text-success">Done</span>
                                                            @else
                                                                <span class="text-warning">Not Finished Yet</span>
                                                            @endif
                                                        @endisset
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="hstack gap-2">
                                                            {{-- handle action delete --}}
                                                            <form action="{{ route('tasks.destroy', $task->id) }}"
                                                                method="POST">
                                                                @csrf @method('DELETE')
                                                                <button title="Remove Task" type="submit"
                                                                    class="btn btn-danger btn-sm rounded"><i
                                                                        class="fa fa-trash"></i></button>
                                                            </form>

                                                            {{-- handle edit action --}}
                                                            <button onclick="handleEditClick({{ $task->id }})"
                                                                data-id="{{ $task->id }}" title="Update Task"
                                                                type="button" class="btn btn-danger btn-sm rounded"><i
                                                                    class="fa fa-edit"></i></button>

                                                            @isset($task->completed)
                                                                @if ($task->completed)
                                                                    <form action="{{ route('tasks.undo', $task->id) }}"
                                                                        method="POST">
                                                                        @csrf @method('PUT')
                                                                        <button title="Undo Task" type="submit"
                                                                            class="btn btn-warning btn-sm rounded text-white"><i
                                                                                class="fa fa-undo"></i></button>
                                                                    </form>
                                                                @else
                                                                    {{-- handle undo task --}}
                                                                    <form action="{{ route('tasks.completed', $task->id) }}"
                                                                        method="POST">
                                                                        @csrf @method('PUT')
                                                                        <button title="Completed Task" type="submit"
                                                                            class="btn btn-warning btn-sm rounded text-white"><i
                                                                                class="fa fa-check"></i></button>
                                                                    </form>
                                                                @endif
                                                            @endisset
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {{ $tasks->links('pagination::bootstrap-4') }}
                            </div>
                        </div>



                    </div>

                </div>
            </div>
        </div>
    </div>


    {{-- show modal message success --}}
    @if (Session::has('message'))
        <script>
            swal('Success!', '{{ Session::get('sweetalert') }}', 'success');
        </script>
        <?php Session::forget('message'); ?>
    @endif

    <script>
        const handleEditClick = (id) => {
            return location.href = `/tasks/${id}/edit`
        }
    </script>
@endsection
