<ul class="nav nav-tabs">
    @foreach($links as $title => $link)
        <li class="nav-item  @if(count($link) > 1) dropdown @endif">
            @if(is_string($title))
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                   aria-expanded="false">{{$title}}</a>
                <ul class="dropdown-menu">
                    @foreach($link as $inner_link)
                        <li>
                            <a class="dropdown-item @if($inner_link['current']) active @endif"
                               href="{{ $inner_link['link'] }}">{{ $inner_link['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <a href="{{ $link['link'] }}"
                   class="nav-link @if($link['current']) active @endif">{{ $link['name'] }}</a>
            @endif
        </li>
    @endforeach
</ul>