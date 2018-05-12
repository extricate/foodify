{!! Form::open([
'method' => 'PATCH',
'route' => ['menus.attach', $menu, $element],
'enctype' => 'multipart/form-data'
]) !!}
{{ csrf_field() }}
<div class="form-group mt-3">
</div>
{{ $element->name }}
<input type="hidden" class="hidden" name="id" value="{{ $element->id }}">
<button type="submit" class="btn btn-primary pull-right">Add <i class="fal fa-plus"></i></button>
{!! Form::close() !!}