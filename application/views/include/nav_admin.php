            <div class="col-lg-2 pe-1 overflow-y-auto vh-100">
                <div class="bg-light p-3 mb-2">
                    <!-- Sidebar navigation -->
                    <ul class="list-unstyled ps-0">
                        <li class="mb-1">
                            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed fw-bold fs-5" data-bs-toggle="collapse" data-bs-target="#transaction-collapse" aria-expanded="true">
                                <i class="bi-calendar"></i>Transactions
                            </button>
                            <div class="collapse ms-4" id="transaction-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 fs-6">
                                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Sales and Amenities</a></li>
                                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Reservation</a></li>
                                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Confirm Payments</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="border-top my-3"></li>
                        <li class="mb-1">
                            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed fw-bold fs-5" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                                <i class="bi-people"></i>Accounts
                            </button>
                            <div class="collapse ms-4" id="account-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 fs-6">
                                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">New...</a></li>
                                    <li><a href="<?= base_url('users/Users/get_users') ?>" class="link-dark d-inline-flex text-decoration-none rounded">Users</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="border-top my-3"></li>
                        <li class="mb-1">
                            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed fw-bold fs-5" data-bs-toggle="collapse" data-bs-target="#reports-collapse" aria-expanded="false">
                                Reports
                            </button>
                            <div class="collapse ms-4" id="reports-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 fs-6">
                                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Transaction Reports</a></li>
                                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Audit Logs</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="border-top my-3"></li>
                        <li class="mb-1 mt-5">
                            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed fw-bold fs-5" data-bs-toggle="collapse" data-bs-target="#profile-collapse" aria-expanded="false">
                                <i class="bi-person"></i>Profile
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