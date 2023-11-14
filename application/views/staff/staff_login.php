    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4 px-5 py-3 bg-light border rounded-5 shadow">
                <h2 class="text-center">Login</h2>
                <div class="border-top border-5 rounded-5 border-dark mx-auto my-3"></div>
                <form action="<?= base_url('Staff/login_user'); ?>" method="post">
                    <?php if ($this->session->userdata('error') != null) : ?>
                        <div class="alert alert-danger">
                            <?= $this->session->userdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="col-12 col-lg">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
                            <label for="email">Email</label>
                        </div>
                    </div>

                    <div class="col-12 col-lg">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                            <label for="password">Password</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-lg btn-primary">Login</button>
                </form>
                <p class="mt-3"><span class="text-muted fw-light fs-6">Don't have an account? Contact an administrator to create your account.</span></p>
            </div>
        </div>
    </div>