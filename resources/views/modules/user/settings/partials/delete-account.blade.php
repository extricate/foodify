<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-account">
    Delete my account <i class="fal fa-arrow-right"></i>
</button>

<div class="modal fade" id="delete-account" tabindex="-1" role="dialog" aria-labelledby="delete-account" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete your account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <strong>Warning.</strong> Deleting your account is irreversible. Are you sure you want to proceed with deleting your account?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel <i class="fal fa-times"></i></button>
                <a href="{{ route('settings.delete-account') }}" class="btn btn-danger">Proceed to delete account <i class="fal fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>