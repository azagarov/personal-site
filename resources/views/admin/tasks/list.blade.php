@extends('layouts.admin')


@section('title', 'Tasks List')

@section('page-header')
    Tasks <small>Personal</small>
@endsection

@section('breadcrumb')
    <li class="active">Tasks</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Tasks</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                    <div class="tasks-list-controls" style="padding: 5px;">
                        <button type="button" class="btn btn-primary btn-sm btn-add-task"><i class="fa fa-plus"></i> Add Task</button>
                    </div>

                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Percentage</th>
                            <th>&nbsp;</th>
                        </tr>

                        @foreach($list as $task)
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td>
                                    @if($task->category)
                                        {{ $task->GetCategoryName() }}
                                    @else
                                        <i>Unknown</i>
                                    @endif
                                </td>

                                <td>{{ $task->title }}</td>

                                <td>
                                    @if($task->priority == \App\Task::PRIORITY_LOW)
                                        <span class="label label-success">Low</span>
                                    @elseif($task->priority == \App\Task::PRIORITY_MEDIUM)
                                        <span class="label label-primary">Medium</span>
                                    @elseif($task->priority == \App\Task::PRIORITY_HIGH)
                                        <span class="label label-warning">High</span>
                                    @elseif($task->priority == \App\Task::PRIORITY_CRITICAL)
                                        <span class="label label-danger">Critical</span>
                                    @else
                                        <span class="label label-danger">{{ $task->priority }} [UNKNOWN]</span>
                                    @endif

                                </td>

                                <td>
                                    <span class="label label-warning">{{ $task->status }}</span>
                                </td>

                                <td>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar progress-bar-aqua" role="progressbar" aria-valuenow="{{ $task->percentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $task->percentage }}%">
                                            <span class="sr-only">{{ $task->percentage }}% Complete</span>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <button type="button" class="btn btn-default btn-sm" onclick="document.location.href='/admin/tasks/edit/{{ $task->id }}';">Edit</button>
                                </td>
                            </tr>
                        @endforeach
                            {{--<td><span class="label label-primary">Approved</span></td>--}}
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-add-task").click(function() {
                document.location.href = "{{ url('/admin/tasks/edit/new') }}";
            });
        });
    </script>

@endsection