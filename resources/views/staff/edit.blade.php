<div class="modal fade" id="EditStaffModal" tabindex="-1" aria-labelledby="AddUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddUserModalLabel">Staff Registration</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
                <ul id="update_msgList"></ul>
                <input type="hidden" class="staff_id" />
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="" class="text-end">Name </label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="name" required class="name form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="" class="text-end">Email </label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="email" required class="email form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="" class="text-end">Address </label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="address" required class="address form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="" class="text-end">Phone </label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="phone" required class="phone form-control">
                    </div>
                </div>

            </div>
            <div class="modal-footer" style="justify-content: center">
                <button type="button" value="{{ $staff->id }}" class="btn btn-primary updateStaff">Update</button>
            </div>
        </div>
    </div>
</div>