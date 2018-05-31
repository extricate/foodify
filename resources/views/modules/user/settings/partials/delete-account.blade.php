<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-account">
    Delete my account
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Permanently delete account</button>
            </div>
        </div>
    </div>
</div>