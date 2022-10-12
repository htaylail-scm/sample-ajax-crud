@extends('layouts.app')
@section('content')
<div class="modal fade" id="AddUserModal" tabindex="-1" aria-labelledby="AddUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header product-card">
                <h5 class="modal-title text-white" id="AddUserModalLabel">{{ trans('userList.userRegistration') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul id="save_msgList"></ul>

                <div class="row mb-3">
                    <div class="col-md-4 offset-1">
                        <label for="" class="col-form-label">{{ trans('userList.name') }} :</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" required class="name form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 offset-1">
                        <label for="" class="col-form-label">{{ trans('userList.email') }} :</label>
                    </div>
                    <div class="col-md-6">
                        <input type="email" required class="email form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 offset-1">
                        <label for="" class="col-form-label">{{ trans('userList.password') }} :</label>
                    </div>
                    <div class="col-md-6">
                        <input type="password" required class="password form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 offset-1">
                        <label for="" class="col-form-label">{{ trans('userList.confirmPassword') }} :</label>
                    </div>
                    <div class="col-md-6">
                        <input type="password" required class="password_confirmation form-control" name="password_confirmation">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 offset-1">
                        <label for="" class="col-form-label">{{ trans('userList.position') }} :</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" required class="position form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 offset-1">
                        <label for="" class="col-form-label">{{ trans('userList.phone') }} :</label>
                    </div>
                    <div class="col-md-6">
                        <input type="phone" required class="phone form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 offset-1">
                        <label for="" class="col-form-label">{{ trans('userList.role') }} :</label>
                    </div>
                    <div class="col-md-6">
                        <select id="role_id" name="role_id" class="role_id form-select">
                            <option></option>
                            <?php foreach (config('constants.role_id') as $key => $value) { ?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="justify-content: space-evenly">
                <button type="button" class="btn btn-primary add_user">{{ trans('userList.register') }}</button>
                <button type="button" class="btn btn-secondary resetCreateBtn">{{ trans('userList.reset') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection