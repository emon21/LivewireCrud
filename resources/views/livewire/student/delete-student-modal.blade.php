<div wire:ignore.self class="modal fade" id="DeleteStudentModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this student?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" wire:click="cancel()" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button type="button" class="btn btn-danger" wire:click="DeleteStudentData()">Yes
                    Delete</button>
            </div>
        </div>
    </div>
</div>
