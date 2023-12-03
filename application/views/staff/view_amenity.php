            <div class="col-md bg-light overflow-y-auto mx-2 vh-100">
                <div class="row justify-content-center">
                    <div class="col-md-9 m-5 px-5 py-5">
                        <h2 class="text-center">Viewing Amenity Details</h2>
                        <div class="border-top border-5 rounded-5 border-dark mx-auto my-4"></div>
                        <div role="form">
                            <div class="row justify-content-between">
                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="type" name="type" aria-label="Amenity type" disabled>
                                            <option value="Pool">Pool</option>
                                            <option value="Cottage">Cottage</option>
                                            <option value="Table">Table</option>
                                        </select>
                                        <label for="type">Type</label>
                                    </div>
                                    <script>
                                        document.getElementById('type').value = "<?= $amenity['type'] ?>";
                                    </script>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="status" name="status" aria-label="Amenity status" disabled>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        <label for="status">Status</label>
                                    </div>
                                    <script>
                                        document.getElementById('status').value = "<?= $amenity['status'] ?>";
                                    </script>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Amenity Name" value="<?= $amenity['name'] ?>" disabled>
                                        <label for="name">Amenity Name</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="price" name="price" placeholder="Amenity Price" value="<?= $amenity['price'] ?>" disabled>
                                        <label for="price">Amenity Price</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" placeholder="Amenity Description" id="description" name="description" style="height: 100px" disabled><?= $amenity['description'] ?></textarea>
                                        <label for="description">Amenity Description</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md text-center mb-3">
                                    <?php if ($amenity['image'] == null) : ?>
                                        <img src="<?= base_url('assets/images/amenities/no_image.png'); ?>" alt="<?= $amenity['name']; ?>" class="img-fluid" style="height: 200px">
                                    <?php else : ?>
                                        <img src="<?= base_url('assets/images/amenities/thumbs/') . $amenity['image']; ?>" alt="<?= $amenity['name']; ?>" class="img-fluid" style="height: 200px">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md justify-content-left">
                                    <a href="<?= base_url('Amenities'); ?>" class="btn btn-secondary btn-lg"><i class="bi bi-arrow-left me-2"></i>Back</a>
                                    <a href="<?= base_url('Amenities/editamenity/') . $amenity['id']; ?>" class="btn btn-primary btn-lg"><i class="bi bi-pencil-square me-2"></i>Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>