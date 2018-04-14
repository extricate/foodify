@if ($recipe->isFavorite($recipe->id) == false)
    {!! Form::open([
        'method' => 'POST',
        'route' => ['favorites.store'],
        'class' => 'form-inline'
    ]) !!}

    <input name="recipe_id" value="{{ $recipe->id }}" type="hidden">
    <button type="submit" class="btn btn-primary"><i class="fal fa-heart fa-2x"></i></button>

    {{ Form::close() }}

@elseif($recipe->isFavorite($recipe->id) == true)
    {!! Form::open([
        'method' => 'DELETE',
        'route' => ['favorites.destroy', $recipe->id],
        'class' => 'form-inline'
    ]) !!}

    <input name="recipe_id" value="{{ $recipe->id }}" type="hidden">
    <button type="submit" class="btn btn-secondary"><i class="fal fa-heart fa-2x"></i></button>

    {{ Form::close() }}
@endif