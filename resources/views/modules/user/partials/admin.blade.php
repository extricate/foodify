<div class="form-inline pull-right mr-1">
    {!! Form::open([
'method' => 'POST',
'route' => ['user.admin'],
'enctype' => 'multipart/form-data'
]) !!}
    {{ csrf_field() }}
    <input type="hidden" class="hidden" name="user_id" value="{{ $user_id }}">
    <input type="hidden" class="hidden" name="action" value="{{ $action }}">
    <button type="submit" class="btn btn-success">@if( $action == true) Make admin @else Remove admin @endif <i class="fal fa-user-shield"></i></button>
    {!! Form::close() !!}
</div>