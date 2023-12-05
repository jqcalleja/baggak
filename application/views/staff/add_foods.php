            
            <div class="col-md bg-light overflow-y-auto mx-2 vh-100">
                <div class="row justify-content-center">
                    <div class="col-md-9 m-5 px-5 py-5 bg-light border rounded-5 shadow">
                        <h2 class="text-center">Add New Food/Beverage</h2>
                        <div class="border-top border-5 rounded-5 border-dark mx-auto my-4"></div>
                        <?php if ($this->session->userdata('error') != null) : ?>
                            <div class="alert alert-danger">
                                <?= $this->session->userdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <form action="<?= base_url('Foods/insert_food'); ?>" method="post" enctype="multipart/form-data" novalidate>
                            <div class="row justify-content-between">
                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="type" name="type" aria-label="Food/Beverage type" required>
                                            <option value="Food">Food</option>
                                            <option value="Beverage">Beverage</option>
                                        </select>
                                        <label for="type">Type</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="status" name="status" aria-label="Food/Beverage status" required>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        <label for="status">Status</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Food/Beverage Name" value="<?= set_value('name') ?>" required>
                                        <label for="name">Food/Beverage Name</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="price" name="price" placeholder="Food/Beverage Price" value="<?= set_value('price') ?>" required>
                                        <label for="price">Food/Beverage Price</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" placeholder="Food/Beverage Description" id="description" name="description" style="height: 100px" required><?= set_value('description') ?></textarea>
                                        <label for="description">Food/Beverage Description</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label for="image">Food/Beverage Image</label>
                                        <input type="file" class="form-control" id="image" name="image" placeholder="Food/Beverage Image" value="<?= set_value('image') ?>" accept=".jpg, .jpeg, .png, .gif">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmdialog"><i class="bi bi-floppy me-2"></i>Save</button>
                                    <a href="<?= base_url('Foods'); ?>" class="btn btn-danger"><i class="bi bi-x-square me-2"></i>Cancel</a>
                                </div>
                            </div>

                            <!-- Modal div for confirmation -->
                            <div class="modal fade my-auto" id="confirmdialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmdialoglabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="confirmdialoglabel">Add New Food/Beverage</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Save the newly created Food/Beverage?</p>
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
            