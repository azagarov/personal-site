@extends('layouts.development')

@section('css')
<style type="text/css">
.annotation {
    text-indent: 1.5em;
}
</style>
@endsection

@section('content')

    <section id="three" class="wrapper style1">
        <header class="major">
            <h2>{{ __('Blog') }}</h2>
        </header>
        <div class="container">
    <div class="category-description">{!! $category->description!!}</div>
    @foreach($category->publicPosts() as $post)
        <a href="{{$post->getUrl(['section' => $category->slug])}}">
            <h3>{{ $post->title }}</h3>
        </a>
        <div class="row">
@if($featuredImage = $post->meta('image', 'featured_image')->Content())
            <div class="4u">
                <div class="image fit">
                    <a href="{{$post->getUrl(['section' => $category->slug])}}"><img src="{{ $featuredImage }}" /></a>
                </div>
            </div>
@endif
            <div class="{{$featuredImage ? 8 : 12}}u">
                <p class="annotation">{{ $post->annotation }}</p>
                <div class="row">
                    <div class="6u">
                        <ul class="actions">
                            <li><a href="{{$post->getUrl(['section' => $category->slug])}}" class="button alt">{{ __('Read More') }}</a></li>
                        </ul>
                    </div>
                    <div class="6u">
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
                    </div>
                </div>
            </div>
        </div>
        <hr />
    @endforeach

        </div>
    </section>
@endsection

