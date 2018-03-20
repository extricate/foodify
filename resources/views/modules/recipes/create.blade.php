@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form action="../recipes" method="POST" enctype="multipart/form-data">
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
                        <label for="name">Recipe name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Recipe name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea type="text" class="form-control" id="description" name="description"
                                  placeholder="Recipe description" rows="4"></textarea>
                    </div>

                        <div class="form-group">
                            <label for="description">Image URL</label>
                            <input type="text" class="form-control" id="description" name="image_url"
                                      placeholder="Enter direct link to image">
                        </div>

                    <div class="form-group">
                        <label for="ingredients">Ingredients</label>
                        <button class="btn btn-default">Add ingredient</button>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="file" id="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection