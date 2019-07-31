@extends('layouts.development')

@section('css')
@endsection

@section('content')
<section id="main" class="wrapper style1">
    <header class="major">
        <h2>{{ __('Portfolio') }}</h2>
        {{--<p>Tempus adipiscing commodo ut aliquam blandit</p>--}}
    </header>
    <div class="container">
        <div class="row">
            <div class="8u">
                <div class="row">
                @foreach($fullList as $item)
                    <div class="6u">
                        <a href="/development/portfolio/{{ $item->slug }}">
                            <h5>{{$item->title}}</h5>
                            <div class="image fit"><img src="{{$item->featured_image}}" /></div>
                        </a>
                    </div>
                @endforeach
                </div>
                {{--<h1>Hola</h1>--}}
            </div>
            <div class="4u">
                {{--<section>--}}
                    {{--<h3>Magna massa blandit</h3>--}}
                    {{--<p>Feugiat amet accumsan ante aliquet feugiat accumsan. Ante blandit accumsan eu amet tortor non lorem felis semper. Interdum adipiscing orci feugiat penatibus adipiscing col cubilia lorem ipsum dolor sit amet feugiat consequat.</p>--}}
                    {{--<ul class="actions">--}}
                        {{--<li><a href="#" class="button alt">Learn More</a></li>--}}
                    {{--</ul>--}}
                {{--</section>--}}
                {{--<hr />--}}
                <section>
                    @include('portfolio.partials.right-side-list', ['list' => $fullList, ])
                </section>
            </div>
        </div>
    </div>
</section>
@endsection