<!-- Add New Admin-->

<div class="modal fade" id="add-new-admin" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="admin_add.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label font-weight-normal">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="username" class="col-sm-3 col-form-label font-weight-normal">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="username" name="username" autocomplete="off" required>
                                <div id="user_val"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="email" class="col-sm-3 col-form-label font-weight-normal">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email">
                                <div id="email_val"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="role" class="col-sm-3 col-form-label font-weight-normal">Role</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="role" id="role" required>
                                    <option value="" selected>- Select -</option>
                                    <option value="0">Employee</option>
                                    <option value="1">Admin</option>
                                    <?php if ($user['role'] >= 2) : ?>
                                        <option value="2">Developer</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="photo" class="col-sm-3 col-form-label font-weight-normal">Profile Picture</label>

                            <div class="col-sm-9">
                                <input type="file" name="photo" id="photo">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="password" class="col-sm-3 col-form-label font-weight-normal">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm btn-flat" id="submit-btn" name="add"><i class="fa fa-save"></i> Add Now</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Info -->
<div class="modal fade" id="update-admin" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update User Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="admin_update.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <label for="name" class="col-sm-3 col-form-label font-weight-normal">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" value="<?= $row['name'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <?php if ($user['role'] == 2 || $row['email'] == "") : ?>
                        <div class="form-group">
                            <div class="row">
                                <label for="email" class="col-sm-3 col-form-label font-weight-normal">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="email" name="email" value="<?= $row['email'] ?>">
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($user['role'] >= 1) : ?>
                        <?php
                        function get_role($x)
                        {
                            global $row;
                            if ($row['role'] == $x) {
                                return 'selected';
                            }
                        }
                        ?>

                        <div class="form-group">
                            <div class="row">
                                <label for="role" class="col-sm-3 col-form-label font-weight-normal">Role</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="role" id="role" required>
                                        <option value="0" <?= get_role(0) ?>>Employee</option>
                                        <option value="1" <?= get_role(1) ?>>Admin</option>
                                        <?php if ($user['role'] >= 2) : ?>
                                            <option value="2" <?= get_role(2) ?>>Developer</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    <? endif ?>
                    <div class="form-group">
                        <div class="row">
                            <label for="photo" class="col-sm-3 col-form-label font-weight-normal">Profile Picture</label>

                            <div class="col-sm-9">
                                <input type="file" name="photo" id="photo">
                            </div>
                        </div>
                    </div>
                    <?php if (isset($_GET['id'])) : ?>
                        <input type="hidden" value="<?= $_GET['id'] ?>" name="id">
                    <?php endif ?>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm btn-flat" name="update"><i class="fa fa-save"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Password Change -->
<div class="modal fade" id="password-change" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="admin_password_change.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <label for="new_password" class="col-sm-4 col-form-label font-weight-normal text-right">New Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="new_password" name="new_password" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="confirm_password" class="col-sm-4 col-form-label font-weight-normal text-right">Confirm Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                <div id="pass_val"></div>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($_GET['id'])) : ?>
                        <input type="hidden" value="<?= $_GET['id'] ?>" name="id">
                    <?php endif ?>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm btn-flat" id="change-password" name="password"><i class="fa fa-save"></i> Change</button>
                </form>
            </div>
        </div>
    </div>
</div>