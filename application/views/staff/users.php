            <div class="col-md bg-light overflow-y-auto mx-2 vh-100">
                <div class="row justify-content-center">
                    <div class="col-md-9 m-5 px-5 py-5">
                        <h2 class="text-center">Users List</h2>
                        <div class="border-top border-5 rounded-5 border-dark mx-auto my-4"></div>
                        <?php if ($this->session->userdata('success') != null) : ?>
                            <div class="alert alert-success">
                                <?= $this->session->userdata('success'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between">
<?php if($this->session->userdata('role') == 1): ?>
                                    <div class="col-md-3">
                                        <a href="<?= base_url('Staff/adduser');?>" class="btn btn-primary mb-3"><i class="bi bi-person-add me-2"></i>Add New User</a>
                                    </div>
<?php endif; ?>
                                    <div class="col-md-5">
                                        <form action="<?= base_url('Staff/users'); ?>" method="get">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="search" id="search" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" value="<?= $this->input->get('search'); ?>">
                                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                                                <a href="<?= base_url('Staff/users'); ?>" class="btn btn-outline-secondary" type="button" id="button-addon2">Clear</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col" style="width: auto;">#</th>
                                            <th scope="col" style="width: 45%;">Full Name</th>
                                            <th scope="col" style="width: auto;">Role</th>
                                            <th scope="col" style="width: auto;">Status</th>
                                            <th scope="col" style="width: 15%;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count = 0;
                                        foreach ($users as $user) : ?>
                                            <tr>
                                                <th scope="row">
                                                    <?= ++$count; ?>
                                                </th>
                                                <td>
<?php if($user['middlename'] != null): ?>
                                                    <?= $user['lastname'] . ', ' . $user['firstname'] . ' ' . substr($user['middlename'],0,1) . '. '; ?>
<?php else: ?>
                                                    <?= $user['lastname'] . ', ' . $user['firstname']; ?>
<?php endif; ?>
                                                 </td>
                                                <td class="text-center">
                                                    <?php if ($user['role'] == 1) : ?>
                                                        Admin
                                                    <?php else : ?>
                                                        Staff
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($user['status'] == 1) : ?>
                                                        Active
                                                    <?php else : ?>
                                                        Inactive
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('Staff/user/' . $user['staffid']); ?>" class="btn btn-success">
                                                        <i class="bi bi-binoculars"></i>
                                                    </a>
<?php if($this->session->userdata('role') == 1): ?>
                                                    <a href="<?= base_url('Staff/edituser/' . $user['staffid']); ?>" class="btn btn-warning">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
<?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <?= $links; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>