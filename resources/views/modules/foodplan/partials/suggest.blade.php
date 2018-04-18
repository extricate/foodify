{!! Form::model($foodplan, [
'method' => 'POST',
'route' => ['plan.suggest'],
'class' => 'form-inline pull-left ml-1'
]) !!}
<button type="submit" class="btn btn-primary">Suggest week <i class="fal fa-lightbulb"></i></button>
{{ Form::close() }}