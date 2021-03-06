{!! Form::open([
'method' => 'PATCH',
'route' => ['plan.update', $foodplan->id],
'class' => 'form-inline ml-1'
]) !!}
<input name="_method" type="hidden" value="PUT">
<input name="day" value="{{ $day }}" type="hidden">
<input name="recipe" value="{{ $recipe->id }}" type="hidden">
<div
        @if( $foodplan_day != null)
        style="background-image: url('{{ $foodplan_day->getFirstMedia()->getUrl() }}'); background-size: cover; background-repeat: no-repeat;"
        data-toggle="tooltip" data-placement="top" title="{{ $day }}: {{ $foodplan_day->name }}"
        @endif
        class="img-recipe">
    <button type="submit" class="btn btn-default img-overlay text-light text-capitalize font-weight-bold @php if ($day == strtolower(\Carbon\Carbon::today()->format('l'))) echo 'btn-today'; @endphp">
        {{ substr($day, 0, 2) }}
    </button>
</div>
{{ Form::close() }}