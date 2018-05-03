<div class="card mt-3 mb-3">
    <div class="card-body">
        {!! Form::open([
            'method' => 'POST',
            'route' => ['comments.store'],
            'enctype' => 'multipart/form-data'
            ]) !!}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{ csrf_field() }}
        <div class="form-group">
            <label for="text">What do you think about this recipe?</label>
            <textarea type="text" class="form-control" id="text" name="text" placeholder="Write your comment here" rows="4">{{ old('text') }}</textarea>
        </div>
        <input class="hidden" type="hidden" id="recipe" name="recipe" value="{{ $recipe->id }}">
        <p class="small">Some <b>Markdown</b> is supported.</p>
        <button type="submit" class="btn btn-primary">Submit</button>
        {!! Form::close() !!}
    </div>
</div>