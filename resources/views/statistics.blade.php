@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">

            <!-- Tasks -->
            @if (count($assignes) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                    Assignes list with task count statistics (top 10 users with highest tasks count)
                    </div>

                    <div class="panel-body">
                        @foreach ($assignes as $assigne)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Assigne #{{ $assigne->id }}
                                </div>

                                <div class="panel-body">
                                    <div>
                                        <div class="col-sm-2"><div>Assigne:</div></div>
                                        <div class="col-sm-10"><div>{{ $assigne->name }}</div></div>
                                    </div>
                                    <div>
                                        <div class="col-sm-2"><div>Tasks Count:</div></div>
                                        <div class="col-sm-10"><div>{{ $assigne->tasks_count }}</div></div>
                                    </div> 
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            @endif

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6 pull-right">
                    <a href="{{ url('/list') }}" class="btn btn-info">Tasks List</a>
                    <a href="{{ url('/') }}" class="btn btn-success">Add Task</a>
                </div>
            </div>
        </div>
    </div>
@endsection