            <div class="col-md bg-light overflow-y-auto mx-2 vh-100">
                <div class="row justify-content-center">
                    <div class="col-md-9 m-5 px-5 py-5">
                        <h2 class="text-center">Viewing User Account</h2>
                        <div class="border-top border-5 rounded-5 border-dark mx-auto my-4"></div>
                        <div role="form">
                            <div class="row justify-content-between">
                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="role" name="role" aria-label="User account role" disabled>
                                            <option value="1">Admin</option>
                                            <option value="2">Staff</option>
                                        </select>
                                        <label for="role">Role</label>
                                    </div>
                                    <script>
                                        document.getElementById('role').value = $profile['role'];
                                    </script>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="status" name="status" aria-label="User account status" disabled>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        <label for="status">Status</label>
                                    </div>
                                    <script>
                                        document.getElementById('status').value = "<?= $profile['status'] ?>";
                                    </script>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" value="<?= $profile['firstname'] ?>" disabled>
                                        <label for="firstname">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middle Name" value="<?= $profile['middlename'] ?>" disabled>
                                        <label for="middlename">Middle Name</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" value="<?= $profile['lastname'] ?>" disabled>
                                        <label for="lastname">Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?= $profile['address'] ?>" disabled>
                                        <label for="address">Address</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating mb-3">
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="<?= $profile['phone'] ?>" disabled>
                                        <label for="phone">Phone Number</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= $profile['email'] ?>" disabled>
                                        <label for="EMail">Email</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-3">
                                    <a href="<?= base_url('Staff/users'); ?>" class="btn btn-lg btn-danger w-100"><i class="bi bi-x-square me-2"></i>Close</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>