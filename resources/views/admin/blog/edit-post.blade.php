@extends('layouts.admin')

@section('title', 'Edit Blog Post')

@section('page-header')
    Edit Blog Post <small id="title_part">New</small>
@endsection

@section('breadcrumb')
    <li><a href="/admin/blog/posts"><i class="fa fa-pencil-square-o"></i> Blog Posts</a></li>
    <li class="active" id="bc_part">Create New Blog Post</li>
@endsection

@push('middle_scripts')
    <script src="{{ adminlte('/plugins/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ adminlte('/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ adminlte('/plugins/ckeditor/ckeditor.js') }}"></script>

    <script type="text/javascript" src="/js/admin-blog.js"></script>
@endpush

@push('scripts')
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ adminlte('/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }}">
<link rel="stylesheet" href="{{ adminlte('/plugins/select2/dist/css/select2.min.css') }}">
    <style>
        .fade-enter-active, .fade-leave-active {
            transition: opacity 1.5s;
        }
        .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
            opacity: 0;
        }

        .save-btn {
            transition: all .5s linear;
        }
    </style>

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

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
    <EditPostGeneral inline-template v-cloak ref="main"
         _id="{{ $_id }}"
    >
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Main Post Info</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        @php
            $_urlPostId = $_id;
            if(!$_urlPostId) {
                $_urlPostId = 'new';
            }
        @endphp
        <form role="form" name="general_post_form" method="post" target="_self" action="/admin/blog/save-post/{{ $_urlPostId }}">
            {{ csrf_field() }}
            <input type="hidden" name="postId" v-model="post.id" />

            <div class="box-body">
                <div class="form-group" :class="slugIsChecking ? 'has-warning' : slugHasError ? 'has-error' : slugChanged && slugOk ? 'has-success' : ''">
                    <label>
                        <i class="fa fa-spinner fa-spin" v-if="slugIsChecking"></i>
                        <i class="fa fa-times-circle-o" v-else-if="slugHasError"></i>
                        <i class="fa fa-check" v-else-if="slugChanged && slugOk"></i>
                        Slug
                    </label>
                    <input type="text" class="form-control" placeholder="Slug..." v-model="post.slug" name="slug" @change="checkSlug" />
                    <span v-if="slugHasError" class="help-block slug" v-html="errors.slug"></span>
                    <span v-else class="help-block">http://webdiver.org/blog<strong style="color:black;">/</strong><span style="color:black;" v-html="post.slug"></span><strong style="color:black;">/</strong></span>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-xs-12">
                        <div class="form-group">
                            <label>Place Coordinates</label>
                            <input type="text" class="form-control" placeholder="Place Coordinates ..." v-model="post.place_coordinates" name="place_coordinates"/>
                            <span class="help-block">For example : 54.9915352,73.225426</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                        <div class="form-group">
                            <label>Main Order</label>
                            <input type="number" class="form-control" placeholder="Main Order ..." v-model="post.main_order" name="main_order"/>
                            <span class="help-block">Integer : 1, 2, ..., 100, ...</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-6">
                        <div class="form-group">
                            <label>Date Occurred:</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="date_occurred" v-model="post.date_occurred" name="date_occurred" />
                            </div>
                        </div>
                    </div>
                    <!-- /.input group -->
                </div>

                <div class="row">
                    <div class="col-xs-12 col-lg-6">
                        <div class="form-group" :class="saving && !validation.categories ? 'has-error' : ''">
                            <label>
                                <i class="fa fa-times-circle-o" v-if="saving && !validation.categories"></i>
                                Categories
                            </label>

                            <select class="form-control select2 categories" multiple="multiple" data-placeholder="Select One Or Few Categories ..." style="width: 100%;" name="categories" v-model="post.categories">
                                @foreach($categories as $category)
                                    @php
                                        $cat = $category->content('en');
                                    @endphp
                                    <option value="{{ $category->id }}">{{ $cat->title }}</option>
                                    {{--@if(in_array($category->id, $_catIds)) selected="selected" @endif--}}
                                @endforeach
                            </select>
                            <span v-if="saving && !validation.categories" class="help-block categories" v-html="errors.categories"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label>Keywords</label>
                            <textarea class="form-control" rows="3" placeholder="Keywords ..." name="keywords" v-model="post.keywords"></textarea>
                            <span class="help-block">Comma separated : history, living, diving, ...</span>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.box-body -->
        </form>
        <div class="overlay" v-if="!slugTimer">
            <i class="fa fa-refresh fa-spin"></i>
        </div>
    </div>
    </EditPostGeneral>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
    <EditPostDashboard inline-template v-cloak ref="dashboard">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Post dashboard</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" v-model="status">
                            @foreach(Blog\BlogPostEditable::GetFullStatusesList() as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="button" class="btn save-btn" :class="hasSaved ? 'btn-success' : 'btn-primary'" @click="save" :disabled="isSaving || !changed">
                        <i class="fa fa-spinner fa-spin" v-if="isSaving"></i>
                        <i class="fa fa-check" v-if="hasSaved"></i>
                        <span v-if="hasSaved">Saved OK</span>
                        <span v-else>Save General Post Information</span>
                    </button>
                </div>
                <div class="overlay" v-if="!$parent.$refs.main.slugTimer">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>

    </EditPostDashboard>
        </div>
    </div>

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


    <transition name="fade">
    <div class="nav-tabs-custom" v-if="hasPostId && postId">
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
    </transition>
    <!-- nav-tabs-custom -->

    <transition name="fade">
        <div class="nav-tabs-custom" v-if="hasPostId && postId">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Post Meta</h3>
                    <div class="box-tools pull-right">

                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-plus"></i> Add <span class="fa fa-caret-down"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-image"></i> Image</a></li>
                            {{--<li><a href="#">Another action</a></li>--}}
                            {{--<li><a href="#">Something else here</a></li>--}}
                            {{--<li class="divider"></li>--}}
                            {{--<li><a href="#">Separated link</a></li>--}}
                        </ul>
                    </div>
                </div>
                <div class="box-body">

                </div>
            </div>
        </div>
    </transition>

    <div class="modal fade" :class="'modal-' + modal.type" id="post-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" v-text="modal.title"></h4>
                </div>
                <div class="modal-body">
                    <p v-text="modal.body">One fine body&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button v-if="modal.button" type="button" class="btn btn-outline">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
            <!-- /.modal -->

</div>
</EditPostMain>
</div>


@endsection