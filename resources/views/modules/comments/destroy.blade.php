<div class="float-right">
    {!! Form::open([
'method' => 'POST',
'route' => ['comments.destroy'],
'enctype' => 'multipart/form-data'
]) !!}
    {{ csrf_field() }}
    <input type="hidden" class="hidden" name="comment_id" value="{{ $comment->id }}">
    <button type="submit" class="btn btn-danger btn-sm"><i class="fal fa-times"></i></button>
    {!! Form::close() !!}
</div>