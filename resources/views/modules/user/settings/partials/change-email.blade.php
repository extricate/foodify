@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form class="form-horizontal" method="POST" action="{{ route('settings.email') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('new-email') ? ' has-error' : '' }}">
        <label for="new-email" class="col-md-4 control-label">New email address</label>
        <div class="col-md-6">
            <input id="new-email" type="email" class="form-control {{ $errors->has('new-email') ? ' is-invalid' : '' }}" name="new-email" required>
            @if ($errors->has('new-email'))
                <span class="help-block">
                    <strong>{{ $errors->first('new-email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label for="new-email-confirm" class="col-md-4 control-label">Confirm new email address</label>
        <div class="col-md-6">
            <input id="new-email-confirm" type="email" class="form-control" name="new-email_confirmation" required>
        </div>
    </div>
    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
        <label for="current-password-email" class="col-md-4 control-label">Current Password</label>
        <div class="col-md-6">
            <input id="current-password-email" type="password" class="form-control {{ $errors->has('current-password') ? ' is-invalid' : '' }}" name="current-password" required>
            @if ($errors->has('current-password'))
                <span class="help-block">
                    <strong>{{ $errors->first('current-password') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Change email <i class="fal fa-arrow-right"></i>
            </button>
        </div>
    </div>
</form>