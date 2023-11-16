            
            <div class="col-md bg-light overflow-y-auto mx-2 vh-100">
                <div class="row justify-content-center">
                    <div class="col-md-9 m-5 px-5 py-5 bg-light border rounded-5 shadow">
                        <h2 class="text-center">Edit My User Profile</h2>
                        <div class="border-top border-5 rounded-5 border-dark mx-auto my-4"></div>
                        <form action="<?= base_url('Staff/update_profile'); ?>" method="">
                        <div class="row justify-content-between">
                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="role" name="role" aria-label="User account role" required>
                                            <option value="Admin">Admin</option>
                                            <option value="Staff" selected>Staff</option>
                                        </select>
                                        <label for="role">Role</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="status" name="status" aria-label="User account status" required>
                                            <option value="Active" selected>Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                        <label for="status">Status</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" value="<?= $profile['firstname']?>" required>
                                        <label for="firstname">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middle Name"value="<?= $profile['middlename']?>" >
                                        <label for="middlename">Middle Name</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" value="<?= $profile['lastname']?>" required>
                                        <label for="lastname">Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?= $profile['address']?>" required>
                                        <label for="address">Address</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating mb-3">
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="<?= $profile['phone']?>" required>
                                        <label for="phone">Phone Number</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="EMail" name="EMail" placeholder="EMail" value="<?= $profile['email']?>" required>
                                        <label for="EMail">EMail</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="password" name="password" placeholder="Password" required>
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="tel" class="form-control" id="confpassword" name="confpassword" placeholder="Confirm Password" required>
                                        <label for="confpassword">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-3">
                                    <a href="<?= base_url('Staff/editprofile'); ?>" class="btn btn-lg btn-success w-100"><i class="bi bi-pencil-square me-2"></i>Edit Profile</a>
                                </div>
                                <div class="col-md-3">
                                    <a href="<?= base_url('Staff/myprofile'); ?>" class="btn btn-lg btn-danger w-100"><i class="bi bi-x-square me-2"></i>Close</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>