<ul>
@foreach($menu->elements as $element)
    <li>
        <a href="{{ $element->slug }}">
            {{ $element->name }}
        </a>
    </li>
@endforeach
</ul>