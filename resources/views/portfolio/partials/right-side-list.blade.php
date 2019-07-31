<h3>
    @if(isset($title) && $title)
        {{$title}}
    @else
        Portfolio
    @endif
</h3>
<ul class="alt">
    @foreach($list as $item)
        <li><a href="/development/portfolio/{{$item->slug}}">{{ $item->title }}</a></li>
    @endforeach
</ul>
