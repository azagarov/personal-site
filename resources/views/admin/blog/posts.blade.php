@extends('layouts.admin')


@section('title', 'Blog Posts List')

@section('page-header')
    Blog Posts List
@endsection

@section('breadcrumb')
    <li class="active">Blog Posts</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Posts</h3>

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
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            {{--<th>Author</th>--}}
                            <th>Slug</th>
                            <th>Title</th>
                            <th>Categories</th>
                            <th>Languages</th>
                            <th>Status</th>
                            <th>&nbsp;</th>
                        </tr>

                        @foreach($list as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
{{--                                <td>{{ $post->author->name }}</td>--}}
                                <td>/{{ $post->slug }}/</td>

                                <td>
                                    @if($post->content('en')->title)
                                        {{ $post->content('en')->title }}
                                    @else
                                        <i>No Title</i>
                                    @endif
                                </td>

                                <td>
                                    @php
                                    $_catNames = [];
                                    foreach($post->categories as $_cat) {
                                        $_catNames[] = "<span class='badge bg-blue'>{$_cat->content('en')->title}</span>";
                                    }
                                    $_categories = implode(', ', $_catNames);
                                    if(!$_categories) {
                                        $_categories = '<i>No categories yet</i>';
                                    }
                                    @endphp
                                    {!! $_categories !!}
                                </td>

                                <td>
                                    @foreach(['en', 'es', 'ru'] as $locale)
                                        @php
                                            $content = $post->content($locale);
                                            $badgeColor = 'red';

                                            if($content->id) {
                                                $badgeColor = 'yellow';

                                                if($content->title) {
                                                    $badgeColor = 'blue';

                                                    if($content->html_content) {
                                                        $badgeColor = 'green';
                                                    }
                                                }
                                            }
                                        @endphp
                                        <span class="badge bg-{{ $badgeColor }}">{{ $locale }}</span>
                                    @endforeach
                                </td>


                                <td>
                                    @if($post->status == \App\BlogPost::STATUS_PUBLIC)
                                        <span class="label label-success">Public</span>
                                    @elseif($post->status == \App\BlogPost::STATUS_PRIVATE)
                                        <span class="label label-warning">Private</span>
                                    @elseif($post->status == \App\BlogPost::STATUS_DELETED)
                                        <span class="label label-danger">Deleted</span>
                                    @else
                                        <span class="label label-danger">{{ $post->status }} [UNKNOWN]</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-default btn-sm" onclick="document.location.href='/admin/blog/edit-post/{{ $post->id }}';">Edit</button>
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

@endsection