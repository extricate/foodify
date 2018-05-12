{!! Form::open([
'method' => 'DELETE',
'route' => ['menus.destroy', $menu],
'enctype' => 'multipart/form-data',
'class' => 'form-inline'
]) !!}
{{ csrf_field() }}
<button type="submit" class="btn btn-danger pull-right">Delete menu <i class="fal fa-trash"></i></button>
{!! Form::close() !!}