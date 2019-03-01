@extends('layouts.admin')

@section('title', 'Edit Blog Post')

@section('page-header')
    @if($post->id)
        Edit Blog Post <small>#{{ $post->id }} [{{ $post->slug }}]</small>
    @else
        Edit Blog Post <small>New</small>
    @endif
@endsection

@section('breadcrumb')
    <li><a href="/admin/blog/posts"><i class="fa fa-pencil-square-o"></i> Blog Posts</a></li>
    @if($post->id)
        <li class="active">Edit Post #{{ $post->id }}</li>
    @else
        <li class="active">Create New Blog Post</li>
    @endif
@endsection

@push('scripts')
    <script src="/bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="/bower_components/AdminLTE/plugins/ckeditor/ckeditor.js"></script>
    <script src="/bower_components/AdminLTE/plugins/select2/select2.full.min.js"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="/bower_components/AdminLTE/plugins/datepicker/datepicker3.css">
<link rel="stylesheet" href="/bower_components/AdminLTE/plugins/select2/select2.min.css">
@endpush

@section('content')

<div id="admin_blog" v-cloak>
<EditPostMain inline-template v-cloak>
<div class="vue-wrapper">

    @if(session('status'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            {{ session('status') }}
        </div>
    @endif

    <EditPostGeneral inline-template v-cloak>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Main Post Info</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        @php
            $_urlPostId = $post->id;
            if(!$_urlPostId) {
                $_urlPostId = 'new';
            }
        @endphp
        <form role="form" method="post" target="_self" action="/admin/blog/save-post/{{ $_urlPostId }}">
            {{ csrf_field() }}
            <input type="hidden" name="postId" value="{{ $post->id }}" />

            <div class="box-body">
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" class="form-control" placeholder="Slug..." value="{{ $post->slug }}" name="slug" />
                    <span class="help-block"><strong style="color:black;">/</strong>url-will-be-like-this<strong style="color:black;">/</strong></span>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        @foreach(App\BlogPost::GetFullStatusesList() as $key => $value)
                            <option value="{{ $key }}" @if($key == $post->status) selected="selected" @endif>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Place Coordinates</label>
                    <input type="text" class="form-control" placeholder="Place Coordinates ..." value="{{ $post->place_coordinates }}" name="place_coordinates"/>
                    <span class="help-block">For example : 54.9915352,73.225426</span>
                </div>
                <div class="form-group">
                    <label>Main Order</label>
                    <input type="number" class="form-control" placeholder="Main Order ..." value="{{ $post->main_order }}" name="main_order"/>
                    <span class="help-block">Integer : 1, 2, ..., 100, ...</span>
                </div>

                <div class="form-group">
                    <label>Date Occurred:</label>

                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        @php
                            if($post->date_occurred) {
                                $dateOccurredObj = new \DateTime($post->date_occurred);
                                $dateOccurred = $dateOccurredObj->format('m/d/Y');
                            } else {
                                $dateOccurred = '';
                            }
                        @endphp

                        <input type="text" class="form-control pull-right" id="date_occurred" value="{{ $dateOccurred }}" name="date_occurred" />
                    </div>

                    <!-- /.input group -->
                </div>

                <div class="form-group">
                    <label>Keywords</label>
                    <textarea class="form-control" rows="3" placeholder="Keywords ..." name="keywords">{{ $post->keywords }}</textarea>
                    <span class="help-block">Comma separated : history, living, diving, ...</span>
                </div>

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


            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save General Post Information</button>
            </div>
        </form>
    </div>
    </EditPostGeneral>
    @if($post->id)

    @php
        $languagesList = [
            'en' => ['locale' => 'en', 'name' => 'English', 'active' => ''],
            'es' => ['locale' => 'es', 'name' => 'Spanish', 'active' => ''],
            'ru' => ['locale' => 'ru', 'name' => 'Russian', 'active' => ''],
        ];

        $selectedLocale = session('selectedLocale');
        if(!$selectedLocale) {
            $selectedLocale = 'en';
        }

        $languagesList[$selectedLocale]['active'] = ' active';
    @endphp

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="pull-left header"><i class="fa fa-language"></i> Languages &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
            @foreach($languagesList as $lang)
                <li class="{{ $lang['active'] }}"><a href="#tab_lang_{{ $lang['locale'] }}" data-toggle="tab">{{$lang['name']}}</a></li>
            @endforeach
        </ul>
        <div class="tab-content">
            @foreach($languagesList as $lang)
                @include('admin.blog.parts.lang', ['lang' => $lang ])
            @endforeach

        </div>
        <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
</div>
</EditPostMain>
</div>

    @push('scripts')
    <script type="text/javascript">
        @foreach($languagesList as $lang)
            CKEDITOR.replace('html_content_{{ $lang['locale'] }}');
        @endforeach
    </script>
    @endpush

    @endif

    @push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#date_occurred').datepicker({
                autoclose: true
            });

            $(".select2").select2();

        });
    </script>
    @endpush
@endsection