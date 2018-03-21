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
<a href="/recipes" class="btn btn-primary m-1">Something else?</a>
<input name="_method" type="hidden" value="PUT">
<input name="day" value="{{ $day }}" type="hidden">
<input name="recipe" value="" type="hidden">
<button type="submit" class="btn btn-warning">Clear day</button>
{{ Form::close() }}