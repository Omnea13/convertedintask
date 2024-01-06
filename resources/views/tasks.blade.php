@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">

            <!-- Tasks -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                    Tasks List
                    </div>

                    <div class="panel-body">
                        @foreach ($tasks as $task)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Task #{{ $task->id }}
                                </div>

                                <div class="panel-body">
                                    <div>
                                        <div class="col-sm-2">Title:</div>
                                        <div class="col-sm-10">{{ $task->title }}</div>
                                    </div>
                                    <div>
                                        <div class="col-sm-2">Description:</div>
                                        <div class="col-sm-10">{{ $task->description }}</div>
                                    </div>
                                    <div>
                                        <div class="col-sm-2"><div>Admin:</div></div>
                                        <div class="col-sm-10"><div>{{ $task->admin->name }}</div></div>
                                    </div>
                                    <div>
                                        <div class="col-sm-2"><div>Assigne:</div></div>
                                        <div class="col-sm-10"><div>{{ $task->assigne->name }}</div></div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                        {{ $tasks->links() }}
                    </div>
                </div>
            @endif

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6 pull-right">
                    <a href="{{ url('/') }}" class="btn btn-success">Add Task</a>
                    <a href="{{ url('/statistics') }}" class="btn btn-danger">Tasks Statistics</a>
                </div>
            </div>
        </div>
    </div>
@endsection