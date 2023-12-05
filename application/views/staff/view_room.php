            <div class="col-md bg-light overflow-y-auto mx-2 vh-100">
                <div class="row justify-content-center">
                    <div class="col-md-9 m-5 px-5 py-5">
                        <h2 class="text-center">Viewing Room Details</h2>
                        <div class="border-top border-5 rounded-5 border-dark mx-auto my-4"></div>
                        <div role="form">
                        <div class="row justify-content-between mb-3">
                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <select class="form-select" id="category" name="category" aria-label="Room category" disabled>
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
                                        <select class="form-select" id="status" name="status" aria-label="User account status" disabled>
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
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Room Name" value="<?= $room['name']; ?>" disabled>
                                        <label for="name">Room Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Room Description" id="description" name="description" style="height: 100px" disabled><?= $room['description']; ?></textarea>
                                        <label for="description">Room Description</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="short" name="short" placeholder="Price" value="<?= $room['short']; ?>" disabled>
                                        <label for="short">Price (Short)</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="twelve" name="twelve" placeholder="Price" value="<?= $room['twelve']; ?>" disabled>
                                        <label for="twelve">Price (12 Hours)</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="price" name="overnight" placeholder="Overnight" value="<?= $room['overnight']; ?>" disabled>
                                        <label for="overnight">Price (Overnight)</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="whole" name="whole" placeholder="24 Hours" value="<?= $room['whole']; ?>" disabled>
                                        <label for="whole">Price (24 Hours)</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="hour" name="hour" placeholder="Price" value="<?= $room['hour']; ?>" disabled>
                                        <label for="hour">Price (Per Hour)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md text-center mb-3">
                                    <?php if ($room['image'] == null) : ?>
                                        <img src="<?= base_url('assets/images/rooms/no_image.png'); ?>" alt="<?= $room['name']; ?>" class="img-fluid" style="height: 100px">
                                    <?php else : ?>
                                        <img src="<?= base_url('assets/images/rooms/thumbs/') . $room['image']; ?>" alt="<?= $room['name']; ?>" class="img-fluid" style="height: 100px">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md justify-content-left">
                                    <a href="<?= base_url('Rooms/editroom/') . $room['id']; ?>" class="btn btn-primary btn-lg"><i class="bi bi-pencil-square me-2"></i>Edit</a>
                                    <a href="<?= base_url('Rooms'); ?>" class="btn btn-secondary btn-lg"><i class="bi bi-arrow-left me-2"></i>Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>