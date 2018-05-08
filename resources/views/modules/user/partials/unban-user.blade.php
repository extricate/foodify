<div class="form-inline pull-right mr-1">
    {!! Form::open([
'method' => 'POST',
'route' => ['user.unban'],
'enctype' => 'multipart/form-data'
]) !!}
    {{ csrf_field() }}
    <input type="hidden" class="hidden" name="user_id" value="{{ $user_id }}">
    <button type="submit" class="btn btn-warning">Unban <i class="fal fa-unlock"></i></button>
    {!! Form::close() !!}
</div>