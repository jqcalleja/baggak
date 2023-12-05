            <div class="col-md bg-light overflow-y-auto mx-2 vh-100">
                <div class="row justify-content-center">
                    <div class="col-md-9 m-5 px-5 py-5">
                        <h2 class="text-center">Amenities List</h2>
                        <div class="border-top border-5 rounded-5 border-dark mx-auto my-4"></div>
                        <?php if ($this->session->userdata('success') != null) : ?>
                            <div class="alert alert-success">
                                <?= $this->session->userdata('success'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between">
<?php if($this->session->userdata('role') == 1): ?>
                                    <div class="col-md-3">
                                        <a href="<?= base_url('Amenities/addamenity');?>" class="btn btn-primary mb-3"><i class="bi bi-umbrella me-2"></i>Add New Amenity</a>
                                    </div>
<?php endif; ?>
                                    <div class="col-md-5">
                                        <form action="<?= base_url('Amenities'); ?>" method="get">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="search" id="search" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" value="<?= $this->input->get('search'); ?>">
                                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                                                <a href="<?= base_url('Amenities'); ?>" class="btn btn-outline-secondary" type="button" id="button-addon2">Clear</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col" style="width: auto;">#</th>
                                            <th scope="col" style="width: 35%;">Amenity Name</th>
                                            <th scope="col" style="width: auto;">Image</th>
                                            <th scope="col" style="width: auto;">Price</th>
                                            <th scope="col" style="width: auto;">Status</th>
                                            <th scope="col" style="width: 15%;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count = 0;
                                        foreach ($amenities as $amenity) : ?>
                                            <tr>
                                                <th scope="row">
                                                    <?= ++$count; ?>
                                                </th>
                                                <td>
                                                    <?= $amenity['name']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($amenity['image'] == null) : ?>
                                                        <img src="<?= base_url('assets/images/amenities/no_image.png'); ?>" alt="<?= $amenity['name']; ?>" class="img-fluid" style="max-width: 100px;">
                                                    <?php else : ?>
                                                        <a href="<?= base_url('Amenities/viewimage/') . $amenity['image']; ?>" target="_blank"><img src="<?= base_url('assets/images/amenities/thumbs/') . $amenity['image']; ?>" alt="<?= $amenity['name']; ?>" class="img-fluid" style="max-width: 100px;"></a>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $amenity['price']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($amenity['status'] == 1) : ?>
                                                        <span class="badge bg-success">Active</span>
                                                    <?php else : ?>
                                                        <span class="badge bg-danger">Inactive</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('Amenities/viewamenity/') . $amenity['id']; ?>" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                                                    <?php if($this->session->userdata('role') == 1): ?>
                                                        <a href="<?= base_url('Amenities/editamenity/') . $amenity['id']; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    <?= $links; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
