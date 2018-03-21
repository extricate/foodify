@php $foodplan = Auth::user()->food_plan() @endphp
{!! Form::model($foodplan, [
'method' => 'PATCH',
'route' => ['plan.update', $foodplan->id],
'class' => 'form-inline pull-left m-1'
]) !!}
<input name="_method" type="hidden" value="PUT">
<input name="day" value="{{ $day }}" type="hidden">
<input name="recipe" value="{{ $recipe->id }}" type="hidden">
<button type="submit"
        data-toggle="tooltip" data-placement="top" title="{{ $day }}: {{ $foodplan->$day()->name }}"
        @if( $foodplan->$day() != null)
        style="background-image: url('{{ $foodplan->$day()->image_url }}'); background-size: cover; background-repeat: no-repeat;"
        @endif
        class="btn btn-default btn-lg font-weight-bold">
    {{ $day_short }}
</button>
{{ Form::close() }}