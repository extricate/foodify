{!! Form::open([
'method' => 'PATCH',
'route' => ['menus.detach', $menu, $element],
'enctype' => 'multipart/form-data'
]) !!}
{{ csrf_field() }}
<div class="form-group mt-3">
</div>
{{ $element->name }}
<input type="hidden" class="hidden" name="id" value="{{ $element->id }}">
<button type="submit" class="btn btn-danger">Remove <i class="fal fa-trash"></i></button>
{!! Form::close() !!}