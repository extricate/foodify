

{!! Form::open([
    'method' => 'POST',
    'route' => ['favorites.store'],
    'class' => 'form-inline'
]) !!}
<input name="recipe_id" value="{{ $recipe->id }}" type="hidden">
<button type="submit" class="btn btn-primary"><i class="fal fa-heart fa-2x"></i></button>

{{ Form::close() }}