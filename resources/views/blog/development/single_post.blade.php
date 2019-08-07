@extends('layouts.development')

@section('css')
<style type="text/css">
.content-wrapper {
    text-align: justify;
}
.content-wrapper p {
    text-indent: 1.5em;
}
</style>
@endsection

@section('content')

    <section id="three" class="wrapper style1">
        <header class="major">
            <h2>{{ $post->title }}</h2>
        </header>
        <div class="container">

            @if($featuredImage = $post->meta('image', 'featured_image')->Content())
                <div class="image fit"><img src="{{ $featuredImage }}" /></div>
            @endif

            <div class="content-wrapper">
                {!! $post->html_content!!}
            </div>

        @if($post->date_occurred || $post->place_name)
            <div class="align-right">
                <i>
            @if($post->date_occurred) {{ (new \DateTime($post->date_occurred))->format('F jS, Y') }}@endif
            @if($post->date_occurred && $post->place_name),@endif
            @if($post->place_name)
                {{ $post->place_name }}
            @endif
                </i>
            </div>
        @endif
            {{--<div class="category-description">{!! $category->description!!}</div>--}}
{{--    @foreach($category->posts as $post)--}}
        {{--<a href="{{$post->getUrl()}}">--}}
            {{--<h4>{{ $post->title }}</h4>--}}
        {{--</a>--}}
{{--        <p>{{ $post->annotation }}</p>--}}
{{--        <div>{{ $post->date_occurred }}</div>--}}
        {{--<hr />--}}
    {{--@endforeach--}}

        </div>
    </section>
@endsection

