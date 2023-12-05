<div class="container-fluid row align-items-center flex-grow-1">
    <div class="mx-auto col-9 col-md-5 bg-light rounded-5 px-5 py-5 my-2 shadow">
        <h2 class="text-center">User Registration</h2>
        <div class="border-top border-5 rounded-5 border-dark mx-auto my-3"></div>
<?php if ($this->session->userdata('error') != null) : ?>
        <div class="alert alert-danger">
            <?= $this->session->userdata('error'); ?>
        </div>
<?php endif; ?>
        <form action="#" method="post">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" required>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-7">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="confirm" class="form-label">Confirm Password</label>
                        <input type="confirm" class="form-control" id="confirm" name="confirm" required>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <p class="mt-3">Already have an account? <a href="<?= base_url('Customer/login'); ?>">Login here</a></p>
    </div>
</div>