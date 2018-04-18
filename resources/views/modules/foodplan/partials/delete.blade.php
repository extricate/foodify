{!! Form::model($foodplan, [
'method' => 'DELETE',
'route' => ['plan.destroy', $foodplan->id],
'class' => 'form-inline pull-left ml-1'
]) !!}
<button type="submit" class="btn btn-warning">Clear week <i class="fal fa-trash-alt"></i></button>
{{ Form::close() }}