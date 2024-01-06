@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ url('add-task')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}


                        <!-- Task admin -->
                        <div class="form-group">
                            <label for="admin" class="col-sm-3 control-label">Admin</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="admin_id">
                                    @if ($admins->count())
                                        @foreach($admins as $admin)
                                        <option class="form-control" value="{{ $admin->id }}" {{ $selectedAdmin == $admin->id ? 'selected="selected"' : '' }}>{{ $admin->name }}</option>
                                        @endForeach

                                    @endif
                                </select>
                            </div>
                        </div>

                        <!-- Task assigne -->
                        <div class="form-group">
                            <label for="assigne" class="col-sm-3 control-label">Assigne</label>
                            <div class="col-sm-6">
                                <select  class="form-control" name="assigne_id">
                                    @if ($assignes->count())
                                        @foreach($assignes as $assigne)
                                        <option value="{{ $assigne->id }}" {{ $selectedAssigne == $assigne->id ? 'selected="selected"' : '' }}>{{ $assigne->name }}</option>
                                        @endForeach

                                    @endif
                                </select>
                            </div>
                        </div>

                        <!-- Task title -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task Title</label>

                            <div class="col-sm-6">
                                <input type="text" name="title" id="task-title" class="form-control" value="">
                            </div>
                        </div>


                        <!-- Task desc -->
                        <div class="form-group">
                            <label for="task-description" class="col-sm-3 control-label">Task Description</label>

                            <div class="col-sm-6">
                                <input type="text" name="description" id="task-description" class="form-control" value="">
                            </div>
                        </div>


                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6 pull-right">
                                <a href="{{ url('/list') }}" class="btn btn-info">Tasks List</a>
                                <a href="{{ url('/statistics') }}" class="btn btn-danger">Tasks Statistics</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection