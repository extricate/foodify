<div class="form-inline pull-right mr-1">
    {!! Form::open([
'method' => 'POST',
'route' => ['comments.destroy'],
'enctype' => 'multipart/form-data'
]) !!}
    {{ csrf_field() }}
    <input type="hidden" class="hidden" name="comment_id" value="{{ $comment->id }}">
    <button type="submit" class="btn btn-danger">Delete <i class="fal fa-trash"></i></button>
    {!! Form::close() !!}
</div>