<div class="row">
    <div class="card">
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
                <label for="description">Comment</label>
                <textarea type="text" class="form-control" id="text" name="text" placeholder="Write your comment here" rows="4">{{ old('text') }}</textarea>
            </div>
            <input class="hidden" type="hidden" id="recipe" name="recipe" value="{{ $recipe->id }}">
            <button type="submit" class="btn btn-primary">Submit</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>