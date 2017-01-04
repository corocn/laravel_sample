<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel-body">
            <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
            <form action="{{ url('task') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Task</label>

                    <div class="col-sm-3">
                        <input type="text" name="title" id="task-title" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="body" id="task-body" class="form-control">
                    </div>

                </div>

                <!-- Add Task Button -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i> Add Task
                        </button>
                    </div>
                </div>
            </form>
        </div>
        @if (count($tasks) > 0)
            @foreach ($tasks as $task)
                <div class="col-sm-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            {{ $task->title }}
                        </div>

                        <div class="panel-body">
                            <div>
                                {{ $task->body }}

                            </div>

                            <div>
                                <form action="{{ url('task/'.$task->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
@endsection