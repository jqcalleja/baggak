            <div class="col-lg-2 pe-1 overflow-y-auto vh-100">
                <div class="bg-light p-3 mb-2">
                    <!-- Sidebar navigation -->
                    <ul class="list-unstyled ps-0">
                        <li class="mb-1">
                            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed fw-bold fs-5" data-bs-toggle="collapse" data-bs-target="#transaction-collapse" aria-expanded="true">
                                <i class="bi bi-calendar me-2"></i>Transactions
                            </button>
                            <div class="collapse ms-4" id="transaction-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 fs-6">
                                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Sales and Amenities</a></li>
                                    <li><a href="<?= base_url('Reservations'); ?>" class="link-dark d-inline-flex text-decoration-none rounded">Reservations</a></li>
                                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Confirm Payments</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="border-top my-3"></li>
                        <li class="mb-1">
                            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed fw-bold fs-5" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                                <i class="bi bi-people me-2"></i>Accounts
                            </button>
                            <div class="collapse ms-4" id="account-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 fs-6">
                                    <li><a href="<?= base_url('Staff/addcustomer') ?>" class="link-dark d-inline-flex text-decoration-none rounded">New Customer Account</a></li>
                                    <li><a href="<?= base_url('Staff/customers') ?>" class="link-dark d-inline-flex text-decoration-none rounded">View Customers List</a></li>
<?php if($this->session->userdata('role') == '1'):?>
                                    <li><a href="<?= base_url('Staff/adduser') ?>" class="link-dark d-inline-flex text-decoration-none rounded">New Staff Account</a></li>
<?php endif;?>
                                    <li><a href="<?= base_url('Staff/users') ?>" class="link-dark d-inline-flex text-decoration-none rounded">View Staffs List</a></li>
                                </ul>
                            </div>
                        </li>
<?php if($this->session->userdata('role') == '1'):?>
                        <li class="border-top my-3"></li>
                        <li class="mb-1">
                            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed fw-bold fs-5" data-bs-toggle="collapse" data-bs-target="#system-collapse" aria-expanded="false">
                                <i class="bi bi-gear me-2"></i>System Setup
                            </button>
                            <div class="collapse ms-4" id="system-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 fs-6">
                                    <li><a href="<?= base_url('Rooms') ?>" class="link-dark d-inline-flex text-decoration-none rounded">Rooms</a></li>
                                    <li><a href="<?= base_url('Amenities') ?>" class="link-dark d-inline-flex text-decoration-none rounded">Amenities</a></li>
                                    <li><a href="<?= base_url('Foods') ?>" class="link-dark d-inline-flex text-decoration-none rounded">Foods</a></li>
                                </ul>
                            </div>
                        </li>
<?php endif;?>
                        <li class="border-top my-3"></li>
                        <li class="mb-1">
                            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed fw-bold fs-5" data-bs-toggle="collapse" data-bs-target="#reports-collapse" aria-expanded="false">
                                <i class="bi bi-clipboard-data me-2"></i>Reports
                            </button>
                            <div class="collapse ms-4" id="reports-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 fs-6">
                                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Transaction Reports</a></li>
<?php if($this->session->userdata('role') == '1'):?>
                                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Customer Reports</a></li>
                                    <li><a href="<?= base_url('AuditLog') ?>" class="link-dark d-inline-flex text-decoration-none rounded">Audit Logs</a></li>
<?php endif;?>
                                </ul>
                            </div>
                        </li>
                        <li class="border-top my-3"></li>
                        <li class="mb-1 mt-5">
                            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed fw-bold fs-5" data-bs-toggle="collapse" data-bs-target="#profile-collapse" aria-expanded="false">
                                <i class="bi-person me-2"></i>Profile
                            </button>
                            <div class="collapse ms-4" id="profile-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 fs-6">
                                    <li><a href="<?= base_url('Staff/myprofile') ?>" class="link-dark d-inline-flex text-decoration-none rounded">View My Profile</a></li>
                                    <li><a href="<?= base_url('Staff/logout') ?>" class="link-dark d-inline-flex text-decoration-none rounded">Sign out</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <!-- End of sidebar navigation -->
                </div>
            </div>