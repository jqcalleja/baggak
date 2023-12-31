
            <div class="col-md bg-light overflow-y-auto mx-2 vh-100">
                <div class="row justify-content-center">
                    <div class="col-md-9 m-5 px-5 py-5 bg-light border rounded-5 shadow">
                        <h2 class="text-center">Add New User Account</h2>
                        <div class="border-top border-5 rounded-5 border-dark mx-auto my-4"></div>
<?php if ($this->session->userdata('error') != null) : ?>
                            <div class="alert alert-danger">
                                <?= $this->session->userdata('error'); ?>
                            </div>
<?php endif; ?>
<?php if ($this->session->userdata('success') != null) : ?>
                            <div class="alert alert-success">
                                <?= $this->session->userdata('success'); ?>
                            </div>
<?php endif; ?>
                        <form action="<?= base_url('Staff/add_user'); ?>" method="post" novalidate>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="role" name="role" aria-label="User account role" required>
                                            <option value="1">Admin</option>
                                            <option value="2">Staff</option>
                                        </select>
                                        <label for="role">Role</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" value="<?= set_value('firstname') ?>" required>
                                        <label for="firstname">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middle Name" value="<?= set_value('middlename') ?>">
                                        <label for="middlename">Middle Name</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" value="<?= set_value('lastname') ?>" required>
                                        <label for="lastname">Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?= set_value('address') ?>" required>
                                        <label for="address">Address</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating mb-3">
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="<?= set_value('phone') ?>" required>
                                        <label for="phone">Phone Number</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" required>
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="confpassword" name="confpassword" placeholder="Confirm Password">
                                        <label for="confpassword">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-lg btn-primary w-100" data-bs-toggle="modal" data-bs-target="#confirmdialog">
                                        <i class="bi bi-floppy me-2"></i>Save Changes
                                    </button>
                                </div>
                                <div class="col-md-3">
<?php if ($this->session->userdata('fromusers') == '1') : ?>
                                    <a href="<?= base_url('Staff/users'); ?>" class="btn btn-lg btn-danger w-100"><i class="bi bi-x-square me-2"></i>Cancel</a>
<?php else :?>
                                    <a href="<?= base_url('Staff'); ?>" class="btn btn-lg btn-danger w-100"><i class="bi bi-x-square me-2"></i>Cancel</a>
<?php endif; ?>
                                </div>
                            </div>

                            <!-- Modal div for confirmation -->
                            <div class="modal fade my-auto" id="confirmdialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmdialoglabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="confirmdialoglabel">Save New Account</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Continue saving the changes you made to your profile?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Yes</button>
                                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">No</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>