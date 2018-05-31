<div class="card m-3">
    <div class="card-body">
        @include('modules.user.settings.partials.change-password')
    </div>
</div>

<div class="card alert-danger m-3">
    <div class="card-body">
        <h2 class="card-title">Danger zone</h2>
        @include('modules.user.settings.partials.delete-account')
    </div>
</div>