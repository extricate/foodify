@php $foodplan_day = $foodplan->$day() @endphp
<div
        @if( $foodplan_day != null)
        style="background-image: url('{{ $foodplan_day->getFirstMedia()->getUrl() }}'); background-size: cover; background-repeat: no-repeat;"
        data-toggle="tooltip" data-placement="top" title="{{ $day }}: {{ $foodplan_day->name }}"
        @endif
        class="img-recipe">
    <a href="@if( $foodplan_day != null) {{ route('recipes.show', $foodplan_day->id) }} @else {{ route('recipes.index') }} @endif"
       class="btn btn-default img-overlay text-light text-capitalize font-weight-bold">
        {{ substr($day, 0, 2) }}
    </a>
</div>

