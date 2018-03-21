{!! Form::model($foodplan, [
'method' => 'PATCH',
'route' => ['plan.update', $foodplan->id],
'class' => 'form-inline pull-left m-1'
]) !!}
<input name="_method" type="hidden" value="PUT">
<input name="day" value="{{ $day }}" type="hidden">
<input name="recipe" value="{{ $recipe->id }}" type="hidden">
@php $foodplan_day = $foodplan->$day() @endphp
<button type="submit"
        data-toggle="tooltip" data-placement="top" title="{{ $day }}: {{ $foodplan_day->name }}"
        @if( $foodplan_day != null)
        style="background-image: url('{{ $foodplan_day->image_url }}'); background-size: cover; background-repeat: no-repeat;"
        @endif
        class="btn btn-default text-light btn-lg font-weight-bold">
    {{ substr($day, 0, 2) }}
</button>
{{ Form::close() }}