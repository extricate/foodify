{!! Form::open([
        'method' => 'POST',
        'route' => 'recipesrating.store',
        'class' => 'form-inline'
    ]) !!}
<input name="rating" value="1" type="hidden">
<input name="recipe" value="{{ $recipe->id }}" type="hidden">
<button type="submit" class="btn btn-primary"><i class="fal fa-star fa-2x"></i></button>
{{ Form::close() }}