<div class="col-md bg-light overflow-y-auto mx-2 vh-100">
    <div class="row justify-content-center">
        <div class="col-md-9 m-5 px-5 py-5 bg-light border rounded-5 shadow">
            <h2 class="text-center">Add New Amenity</h2>
            <div class="border-top border-5 rounded-5 border-dark mx-auto my-4"></div>
            <?php if ($this->session->userdata('error') != null) : ?>
                <div class="alert alert-danger">
                    <?= $this->session->userdata('error'); ?>
                </div>
            <?php endif; ?>
            <?php if ($this->session->userdata('success') != null) : ?>
                <div class="alert alert-success">
                    <?= $this->session->userdata('success'); ?>
                </div>
            <?php endif; ?>
            <form action="<?= base_url('Amenities/update_amenity'); ?>" method="post" enctype="multipart/form-data" novalidate>
                <input type="hidden" name="id" value="<?= $amenity['id']; ?>">
                <div class="row justify-content-between">
                    <div class="col-md-2">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="type" name="type" aria-label="Amenity type">
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
                            <select class="form-select" id="status" name="status" aria-label="Amenity status">
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
                            <input type="text" class="form-control" id="name" name="name" placeholder="Amenity Name" value="<?= $amenity['name'] ?>">
                            <label for="name">Amenity Name</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="price" name="price" placeholder="Amenity Price" value="<?= $amenity['price'] ?>">
                            <label for="price">Amenity Price</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Amenity Description" id="description" name="description" style="height: 100px"><?= $amenity['description'] ?></textarea>
                            <label for="description">Amenity Description</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div>
                            <label for="image">Amenity Image</label>
                            <input type="file" class="form-control" id="image" name="image" placeholder="Amenity Image" value="<?= set_value('image') ?>" accept=".jpg, .jpeg, .png, .gif">
                        </div>
                    </div>
                    <span class="text-muted mb-3"><small>Leave this blank if you will not change the image.</small></span>
                </div>
                <div class="row">
                    <div class="col-md">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmdialog"><i class="bi bi-floppy me-2"></i>Save</button>
                        <a href="<?= base_url('Amenities'); ?>" class="btn btn-danger"><i class="bi bi-x-square me-2"></i>Cancel</a>
                    </div>
                </div>

                <!-- Modal div for confirmation -->
                <div class="modal fade my-auto" id="confirmdialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmdialoglabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="confirmdialoglabel">Save Changes to Amenity</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Continue saving the changes to the amenity?</p>
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