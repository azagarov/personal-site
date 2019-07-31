@extends('layouts.admin')


@section('title', 'Portfolio Items List')

@section('page-header')
    Portfolio Items List
@endsection

@section('breadcrumb')
    <li class="active">Portfolio Items</li>
@endsection

@push('middle_scripts')
    <script type="text/javascript" src="/js/admin-portfolio.js"></script>
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
<div id="admin_portfolio" v-cloak>
    <div class="row">
        <div class="col-xs-12">
            <ItemsList></ItemsList>
        </div>
    </div>
</div>
@endsection