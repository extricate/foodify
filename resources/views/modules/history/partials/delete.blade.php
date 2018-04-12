{!! Form::model($history, [
'method' => 'DELETE',
'route' => ['history.destroy', $history->id],
'class' => 'form-inline m-3 pull-right'
]) !!}
<button type="submit" class="btn btn-danger">Remove</button>
{{ Form::close() }}