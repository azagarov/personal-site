@extends('layouts.admin')


@section('title', 'Blog Posts List')

@section('page-header')
    Blog Posts List
@endsection

@section('breadcrumb')
    <li class="active">Blog Posts</li>
@endsection

@push('middle_scripts')
    <script type="text/javascript" src="/js/admin-blog.js"></script>
@endpush

@section('content')
<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>
<div id="admin_blog" v-cloak>
    <div class="row">
        <div class="col-xs-12">
            <PostsList></PostsList>
        </div>
    </div>
</div>
@endsection