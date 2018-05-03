<div class="form-inline pull-right mr-1">
    {!! Form::open([
'method' => 'POST',
'route' => ['user.ban'],
'enctype' => 'multipart/form-data'
]) !!}
    {{ csrf_field() }}
    <input type="hidden" class="hidden" name="user_id" value="{{ $user_id }}">
    <button type="submit" class="btn btn-danger btn-sm"><i class="fal fa-user-lock"></i></button>
    {!! Form::close() !!}
</div>