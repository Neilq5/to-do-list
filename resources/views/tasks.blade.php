@extends('layouts.template')

@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <form action="/tasks" method="post">
                        @csrf
                        <input name="name" type="text" class="form-control" placeholder="Insert task name">
                        @error('name')
                            <div class="alert alert-danger">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                        @enderror
                        <button class="submit-btn btn btn-primary btn-block">Add</button>
                    </form>
                </div>
                <div class="col-md-8">
                    <div class="container-fluid bg-white task-list-container">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Task</th>
                                            <th><span class="sr-only">Actions<d/span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tasks as $task)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td @if($task->completed_at) style="text-decoration: line-through;" @endif>{{ $task->name }}</td>
                                                <td>
                                                    @if(!$task->completed_at)
                                                        <div class="row-actions-container">
                                                            <form action="{{ route('tasks.update', $task->id) }}" method="post">
                                                                @csrf
                                                                @method('put')
                                                                <button class="btn btn-success btn-complete-task">
                                                                    <span class="glyphicon glyphicon-ok"></span>
                                                                </button>
                                                            </form>
                                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-danger btn-delete-task">
                                                                    <span class="glyphicon glyphicon-remove"></span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>      
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $tasks->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

 