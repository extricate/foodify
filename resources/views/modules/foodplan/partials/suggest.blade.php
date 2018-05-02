{!! Form::model($foodplan, [
'method' => 'POST',
'route' => ['plan.suggest'],
'class' => 'form-inline ml-1 justify-content-center'
]) !!}
<button type="submit" class="btn btn-primary">Suggest week <i class="fal fa-lightbulb"></i></button>
{{ Form::close() }}