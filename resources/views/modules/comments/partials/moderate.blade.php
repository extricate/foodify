@if($comment->published === null)
<div class="form-inline pull-left">
    {!! Form::open([
'method' => 'POST',
'route' => ['comments.moderation.action', $comment],
'enctype' => 'multipart/form-data'
]) !!}
    {{ csrf_field() }}
    <input type="hidden" class="hidden" name="id" value="{{ $comment->id }}">
    <input type="hidden" class="hidden" name="action" value="1">
    <button type="submit" class="btn btn-success"><span class="d-none d-lg-inline-block">Approve</span> <i class="fal fa-check"></i></button>
    {!! Form::close() !!}
</div>

<div class="form-inline pull-left ml-1">
    {!! Form::open([
'method' => 'POST',
'route' => ['comments.moderation.action', $comment],
'enctype' => 'multipart/form-data'
]) !!}
    {{ csrf_field() }}
    <input type="hidden" class="hidden" name="id" value="{{ $comment->id }}">
    <input type="hidden" class="hidden" name="action" value="0">
    <button type="submit" class="btn btn-danger"><span class="d-none d-lg-inline-block">Disapprove</span> <i class="fal fa-times"></i></button>
    {!! Form::close() !!}
</div>
@else
    <div class="form-inline pull-left">
        {!! Form::open([
    'method' => 'POST',
    'route' => ['comments.moderation.action', $comment],
    'enctype' => 'multipart/form-data'
    ]) !!}
        {{ csrf_field() }}
        <input type="hidden" class="hidden" name="id" value="{{ $comment->id }}">
        <input type="hidden" class="hidden" name="action" value="1">
        <button type="submit" class="btn @if($comment->published == true) btn-primary @else btn-secondary @endif"><i class="fal fa-check"></i></button>
        {!! Form::close() !!}
    </div>

    <div class="form-inline pull-left ml-1">
        {!! Form::open([
    'method' => 'POST',
    'route' => ['comments.moderation.action', $comment],
    'enctype' => 'multipart/form-data'
    ]) !!}
        {{ csrf_field() }}
        <input type="hidden" class="hidden" name="id" value="{{ $comment->id }}">
        <input type="hidden" class="hidden" name="action" value="0">
        <button type="submit" class="btn @if($comment->published == false) btn-primary @else btn-secondary @endif"><i class="fal fa-times"></i></button>
        {!! Form::close() !!}
    </div>
@endif