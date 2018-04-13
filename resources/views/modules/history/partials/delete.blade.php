{!! Form::model($history, [
'method' => 'DELETE',
'route' => ['history.destroy', $history->id],
'class' => 'form-inline pull-right'
]) !!}
<button type="submit" class="btn btn-danger"><i class="fal fa-times"></i></button>
{{ Form::close() }}