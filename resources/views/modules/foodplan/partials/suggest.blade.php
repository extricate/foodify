{!! Form::model($foodplan, [
'method' => 'DELETE',
'route' => ['plan.destroy', $foodplan->id],
'class' => 'form-inline m-3 pull-right'
]) !!}
<button type="submit" class="btn btn-primary">Suggest week</button>
{{ Form::close() }}