{!! Form::model($history, [
'method' => 'POST',
'route' => ['history.setAsFoodplan', $history->id],
'class' => 'form-inline mr-1 pull-left'
]) !!}
<button type="submit" class="btn btn-success">Set as current plan <i class="fa fa-calendar-check-o"></i></button>
{{ Form::close() }}