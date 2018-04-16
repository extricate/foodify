@if (!$recipe->isFavorite($recipe->id))
    {!! Form::open([
        'method' => 'POST',
        'route' => ['favorites.store'],
        'class' => 'form-inline'
    ]) !!}

    <input name="recipe_id" value="{{ $recipe->id }}" type="hidden">
    <button type="submit" class="btn btn-primary btn-sm btn-unfavorite"><i class="fal fa-heart fa-2x"></i></button>

    {{ Form::close() }}

@elseif($recipe->isFavorite($recipe->id))
    {!! Form::open([
        'method' => 'DELETE',
        'route' => ['favorites.destroy', $recipe->id],
        'class' => 'form-inline'
    ]) !!}

    <input name="recipe_id" value="{{ $recipe->id }}" type="hidden">
    <button type="submit" class="btn btn-primary btn-sm btn-favorite"><i class="fal fa-heart fa-2x"></i></button>

    {{ Form::close() }}
@endif