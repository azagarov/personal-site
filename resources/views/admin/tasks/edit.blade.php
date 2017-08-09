@extends('layouts.admin')

@section('title', 'Edit Task')

@section('page-header')
    @if($task->id)
        Edit Task <small>#{{ $task->id }} {{ $task->title }}</small>
    @else
        Edit Task <small>New</small>
    @endif
@endsection

@section('breadcrumb')
    <li><a href="{{ url('/admin/tasks') }}"><i class="fa fa-tasks"></i> Tasks</a></li>
    @if($task->id)
        <li class="active">Edit Task #{{ $task->id }}</li>
    @else
        <li class="active">Create New Task</li>
    @endif
@endsection

@push('scripts')
    <script src="/bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="/bower_components/AdminLTE/plugins/select2/select2.full.min.js"></script>
    <script src="/bower_components/AdminLTE/plugins/bootstrap-slider/bootstrap-slider.js"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="/bower_components/AdminLTE/plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="/bower_components/AdminLTE/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="/bower_components/AdminLTE/plugins/bootstrap-slider/slider.css">
@endpush

@section('content')

    @if(session('status'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            {{ session('status') }}
        </div>
    @endif

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Task Info</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        @php
            $_urlTaskId = $task->id;
            if(!$_urlTaskId) {
                $_urlTaskId = 'new';
            }
        @endphp
        <form role="form" method="post" target="_self" action="/admin/tasks/save/{{ $_urlTaskId }}">
            {{ csrf_field() }}
            <input type="hidden" name="taskId" value="{{ $task->id }}" />

            <div class="box-body">

                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category">
                        @foreach(App\Task::GetCategoriesList() as $key => $value)
                            <option value="{{ $key }}" @if($key == $task->category) selected="selected" @endif>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" placeholder="Title..." value="{{ $task->title }}" name="title" />
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" placeholder="Description ..." name="description">{{ $task->description }}</textarea>
                </div>

                <div class="form-group">
                    <label>Date Due:</label>

                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        @php
                            if($task->date_due) {
                                $dateDueObj = new \DateTime($task->date_due);
                                $dateDue = $dateDueObj->format('m/d/Y');
                            } else {
                                $dateDue = '';
                            }
                        @endphp

                        <input type="text" class="form-control pull-right" id="date_due" value="{{ $dateDue }}" name="date_due" />
                    </div>

                    <!-- /.input group -->
                </div>

                <div class="form-group">
                    <label>Priority</label>
                    <select class="form-control" name="priority">
                        @foreach(App\Task::GetFullPriorityList() as $key => $value)
                            <option value="{{ $key }}" @if($key == $task->priority) selected="selected" @endif>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        @foreach(App\Task::GetFullStatusesList() as $key => $value)
                            <option value="{{ $key }}" @if($key == $task->status) selected="selected" @endif>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Percentage</label>
                    <input type="text" value="" name="percentage" class="slider form-control" data-slider-min="0" data-slider-max="100"
                           data-slider-step="5" data-slider-value="{{ $task->percentage }}" data-slider-orientation="horizontal"
                           data-slider-selection="before" data-slider-tooltip="show" data-slider-id="aqua" />
                </div>


{{--
                <div class="form-group">
                    <label>Categories</label>

                    @php
                        $_catIds = [];
                        foreach($post->categories as $_cat) {
                            $_catIds[] = $_cat->id;
                        }
                    @endphp

                    <select class="form-control select2" multiple="multiple" data-placeholder="Select One Or Few Categories ..." style="width: 100%;" name="categoryIds[]">
                        @foreach($categories as $category)
                            @php
                                $cat = $category->content('en');
                            @endphp
                            <option value="{{ $category->id }}" @if(in_array($category->id, $_catIds)) selected="selected" @endif >{{ $cat->title }}</option>
                        @endforeach
                    </select>
                </div>
--}}

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Task</button>
            </div>
        </form>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#date_due').datepicker({
                autoclose: true
            });

            $(".select2").select2();

            $('.slider').slider();
        });
    </script>
@endsection