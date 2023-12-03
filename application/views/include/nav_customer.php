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
                                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">New Reservation</a></li>
                                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Transactions History</a></li>
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
                                    <li><a href="<?= base_url('Customer/myprofile') ?>" class="link-dark d-inline-flex text-decoration-none rounded">View My Profile</a></li>
                                    <li><a href="<?= base_url('Customer/logout') ?>" class="link-dark d-inline-flex text-decoration-none rounded">Sign out</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <!-- End of sidebar navigation -->
                </div>
            </div>