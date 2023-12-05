            <div class="col-md bg-light overflow-y-auto mx-2 vh-100">
                <div class="row justify-content-center">
                    <div class="col-md-9 m-5 px-5 py-5">
                        <h2 class="text-center">Viewing Food/Beverage Details</h2>
                        <div class="border-top border-5 rounded-5 border-dark mx-auto my-4"></div>
                        <div role="form">
                            <div class="row justify-content-between">
                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="type" name="type" aria-label="Food/Beverage type" disabled>
                                            <option value="Food">Food</option>
                                            <option value="Beverage">Beverage</option>
                                        </select>
                                        <label for="type">Type</label>
                                    </div>
                                    <script>
                                        document.getElementById('type').value = "<?= $food['type'] ?>";
                                    </script>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="status" name="status" aria-label="Food/Beverage status" disabled>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        <label for="status">Status</label>
                                    </div>
                                    <script>
                                        document.getElementById('status').value = "<?= $food['status'] ?>";
                                    </script>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Food/Beverage Name" value="<?= $food['name'] ?>" disabled>
                                        <label for="name">Food/Beverage Name</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="price" name="price" placeholder="Food/Beverage Price" value="<?= $food['price'] ?>" disabled>
                                        <label for="price">Food/Beverage Price</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" placeholder="Food/Beverage Description" id="description" name="description" style="height: 100px" disabled><?= $food['description'] ?></textarea>
                                        <label for="description">Food/Beverage Description</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md text-center mb-3">
                                    <?php if ($food['image'] == null) : ?>
                                        <img src="<?= base_url('assets/images/foods/no_image.png'); ?>" alt="<?= $food['name']; ?>" class="img-fluid" style="height: 100px">
                                    <?php else : ?>
                                        <img src="<?= base_url('assets/images/foods/thumbs/') . $food['image']; ?>" alt="<?= $food['name']; ?>" class="img-fluid" style="height: 100px">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md justify-content-left">
                                    <a href="<?= base_url('Foods/editfood/') . $food['id']; ?>" class="btn btn-primary btn-lg"><i class="bi bi-pencil-square me-2"></i>Edit</a>
                                    <a href="<?= base_url('Foods'); ?>" class="btn btn-secondary btn-lg"><i class="bi bi-arrow-left me-2"></i>Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>