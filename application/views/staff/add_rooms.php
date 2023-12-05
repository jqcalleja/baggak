            
            <div class="col-md bg-light overflow-y-auto mx-2 vh-100">
                <div class="row justify-content-center">
                    <div class="col-md-9 m-5 px-5 py-5 bg-light border rounded-5 shadow">
                        <h2 class="text-center">Add New Room</h2>
                        <div class="border-top border-5 rounded-5 border-dark mx-auto my-4"></div>
                        <?php if ($this->session->userdata('error') != null) : ?>
                            <div class="alert alert-danger">
                                <?= $this->session->userdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <form action="<?= base_url('Rooms/insert_room'); ?>" method="post" enctype="multipart/form-data" novalidate>
                            <div class="row justify-content-between mb-3">
                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <select class="form-select" id="category" name="category" aria-label="Room category" required>
                                            <option value="Economy">Economy</option>
                                            <option value="Standard">Standard</option>
                                            <option value="Deluxe">Deluxe</option>
                                            <option value="Premium">Premium</option>
                                        </select>
                                        <label for="category">Category</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <select class="form-select" id="status" name="status" aria-label="User account status" required>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        <label for="status">Status</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Room Name" value="<?= set_value('name') ?>" required>
                                        <label for="name">Room Name</label>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div>
                                        <label for="image"><small>Room Image</small></label>
                                        <input type="file" class="form-control" id="image" name="image" placeholder="Room Image" value="<?= set_value('image') ?>" accept=".jpg, .jpeg, .png, .gif">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Room Description" id="description" name="description" style="height: 100px" required><?= set_value('description') ?></textarea>
                                        <label for="description">Room Description</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="short" name="short" placeholder="Price" value="<?= set_value('short') ?>" required>
                                        <label for="short">Price (Short)</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="twelve" name="twelve" placeholder="Price" value="<?= set_value('twelve') ?>" required>
                                        <label for="twelve">Price (12 Hours)</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="price" name="overnight" placeholder="Overnight" value="<?= set_value('overnight') ?>" required>
                                        <label for="overnight">Price (Overnight)</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="whole" name="whole" placeholder="24 Hours" value="<?= set_value('whole') ?>" required>
                                        <label for="whole">Price (24 Hours)</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="hour" name="hour" placeholder="Price" value="<?= set_value('hour') ?>" required>
                                        <label for="hour">Price (Per Hour)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmdialog"><i class="bi bi-floppy me-2"></i>Save</button>
                                    <a href="<?= base_url('Rooms'); ?>" class="btn btn-danger"><i class="bi bi-x-square me-2"></i>Cancel</a>
                                </div>
                            </div>

                            <!-- Modal div for confirmation -->
                            <div class="modal fade my-auto" id="confirmdialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmdialoglabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="confirmdialoglabel">Add New Amenity</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Save the newly created amenity?</p>
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
            
