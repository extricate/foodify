@php $foodplan_day = $foodplan->$day() @endphp
<a href="{{ route('recipes.show', $foodplan_day->id) }}"
        data-toggle="tooltip" data-placement="top" title="{{ $day }}: {{ $foodplan_day->name }}"
        @if( $foodplan_day != null)
        style="background-image: url('{{ $foodplan_day->image_url }}'); background-size: cover; background-repeat: no-repeat;"
        @endif
        class="btn btn-default text-light font-weight-bold">
    {{ substr($day, 0, 2) }}
</a>