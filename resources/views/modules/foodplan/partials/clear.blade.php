{!! Form::model($foodplan, [
'method' => 'PATCH',
'route' => ['plan.update', $foodplan->id]
]) !!}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<a href="{{ route('recipes.index') }}" class="btn btn-primary m-1">Something else? <i class="fal fa-arrow-right"></i></a>
<input name="_method" type="hidden" value="PUT">
<input name="day" value="{{ $day }}" type="hidden">
<input name="recipe" value="" type="hidden">
<button type="submit" class="btn btn-warning">Clear day <i class="fal fa-trash-alt"></i></button>
{{ Form::close() }}