{!! Form::open([
'method' => 'POST',
'route' => ['history.store'],
'class' => 'form-inline m-3 pull-right'
]) !!}
<button type="submit" class="btn btn-primary">Save to history</button>
{{ Form::close() }}