{!! Form::open([
'method' => 'POST',
'route' => ['history.store'],
'class' => 'form-inline pull-left ml-1'
]) !!}
<button type="submit" class="btn btn-primary">Save to history <i class="fal fa-history"></i></button>
{{ Form::close() }}