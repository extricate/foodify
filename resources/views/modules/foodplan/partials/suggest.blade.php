{!! Form::model($foodplan, [
'method' => 'POST',
'route' => ['plan.suggest'],
'class' => 'form-inline m-3 pull-right'
]) !!}
<button type="submit" class="btn btn-primary">Suggest week</button>
{{ Form::close() }}