@extends('layouts.admin')

@section('title', 'Edit Portfolio Item')

@section('page-header')
    Edit Blog Post <small id="title_part">New</small>
@endsection

@section('breadcrumb')
    <li><a href="/admin/portfolio/items"><i class="fa fa-pencil-square-o"></i> Portfolio Items</a></li>
    <li class="active" id="bc_part">Create New Portfolio Item</li>
@endsection

@push('middle_scripts')
    <script src="{{ adminlte('/plugins/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ adminlte('/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ adminlte('/plugins/ckeditor/ckeditor.js') }}"></script>

    <script type="text/javascript" src="/js/admin-portfolio.js"></script>
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

<div id="admin_portfolio" v-cloak>
<EditItemMain inline-template v-cloak>
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
    <EditItemGeneral inline-template v-cloak ref="main"
         _id="{{ $_id }}"
    >
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Main Item Info</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        @php
            $_urlItemId = $_id;
            if(!$_urlItemId) {
                $_urlItemId = 'new';
            }
        @endphp
        <form role="form" name="general_post_form" method="post" target="_self" action="/admin/portfolio/save-item/{{ $_urlItemId }}">
            {{ csrf_field() }}
            <input type="hidden" name="itemId" v-model="item.id" />

            <div class="box-body">
                <div class="form-group" :class="slugIsChecking ? 'has-warning' : slugHasError ? 'has-error' : slugChanged && slugOk ? 'has-success' : ''">
                    <label>
                        <i class="fa fa-spinner fa-spin" v-if="slugIsChecking"></i>
                        <i class="fa fa-times-circle-o" v-else-if="slugHasError"></i>
                        <i class="fa fa-check" v-else-if="slugChanged && slugOk"></i>
                        Slug
                    </label>
                    <input type="text" class="form-control" placeholder="Slug..." v-model="item.slug" name="slug" @change="checkSlug" />
                    <span v-if="slugHasError" class="help-block slug" v-html="errors.slug"></span>
                    <span v-else class="help-block">http://webdiver.org/portfolio<strong style="color:black;">/</strong><span style="color:black;" v-html="item.slug"></span><strong style="color:black;">/</strong></span>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-xs-12">
                        <div class="form-group">
                            <label>URL</label>
                            <input type="text" class="form-control" placeholder="URL ..." v-model="item.url" name="url"/>
                            <span class="help-block">For example : https://www.bibeg.org/silence</span>
                        </div>
                    </div>
                </div>
                {{--<div class="row">--}}
                    {{--<div class="col-lg-4 col-xs-12">--}}
                        {{--<div class="form-group">--}}
                            {{--<label>Place Coordinates</label>--}}
                            {{--<input type="text" class="form-control" placeholder="Place Coordinates ..." v-model="post.place_coordinates" name="place_coordinates"/>--}}
                            {{--<span class="help-block">For example : 54.9915352,73.225426</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-4 col-xs-6">--}}
                        {{--<div class="form-group">--}}
                            {{--<label>Main Order</label>--}}
                            {{--<input type="number" class="form-control" placeholder="Main Order ..." v-model="post.main_order" name="main_order"/>--}}
                            {{--<span class="help-block">Integer : 1, 2, ..., 100, ...</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-4 col-xs-6">--}}
                        {{--<div class="form-group">--}}
                            {{--<label>Date Occurred:</label>--}}
{{----}}
                            {{--<div class="input-group date">--}}
                                {{--<div class="input-group-addon">--}}
                                    {{--<i class="fa fa-calendar"></i>--}}
                                {{--</div>--}}
                                {{--<input type="text" class="form-control pull-right" id="date_occurred" v-model="post.date_occurred" name="date_occurred" />--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <!-- /.input group -->
                {{--</div>--}}

                <div class="row">
                    <div class="col-xs-12 col-lg-6">
                        <div class="form-group">
                            <label>Keywords</label>
                            <textarea class="form-control" rows="3" placeholder="Keywords ..." name="keywords" v-model="item.keywords"></textarea>
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
    </EditItemGeneral>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
    <EditItemDashboard inline-template v-cloak ref="dashboard">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Item dashboard</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" v-model="status">
                            @foreach(Portfolio\PortfolioItemEditable::GetFullStatusesList() as $key => $value)
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
                        <span v-else>Save General Item Information</span>
                    </button>
                </div>
                <div class="overlay" v-if="!$parent.$refs.main.slugTimer">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>

    </EditItemDashboard>
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
    <div class="nav-tabs-custom" v-if="hasItemId && itemId">
        <ul class="nav nav-tabs">
            <li class="pull-left header"><i class="fa fa-language"></i> Languages &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
            @foreach($languagesList as $lang)
                <li class="{{ $lang['active'] }}"><a href="#tab_lang_{{ $lang['locale'] }}" data-toggle="tab">{{$lang['name']}}</a></li>
            @endforeach
        </ul>
        <div class="tab-content">
            @foreach($languagesList as $lang)
                @include('admin.portfolio.parts.lang', ['lang' => $lang ])
            @endforeach

        </div>
        <!-- /.tab-content -->
    </div>
    </transition>
    <!-- nav-tabs-custom -->

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
</EditItemMain>
</div>


@endsection