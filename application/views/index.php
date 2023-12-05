            
            <!-- Home page navigation section -->
            <div>
                <ul class="nav nav-tabs justify-content-center fs-5 fw-medium border-0">
                    <li class="nav-item  border rounded-2 me-1 shadow-sm">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('Index'); ?>"><span class="material-icons me-2">home</span>Home</a>
                    </li>
                    <li class="nav-item border rounded-2 me-1 shadow-sm">
                        <a class="nav-link" href="<?= base_url('Index/about'); ?>"><span class="material-icons me-2">info</span>About Us</a>
                    </li>
                    <li class="nav-item border rounded-2 me-1 shadow-sm">
                        <a class="nav-link" href="<?= base_url('Index/foods'); ?>"><span class="material-icons me-2">restaurant</span>Foods</a>
                    </li>
                    <li class="nav-item border rounded-2 me-1 shadow-sm">
                        <a class="nav-link" href="<?= base_url('Index/amenities'); ?>"><span class="material-icons me-2">beach_access</span>Amenities</a>
                    </li>
                    <li class="nav-item border rounded-2 me-1 shadow-sm">
                        <a class="nav-link" href="<?= base_url('Index/rooms'); ?>"><span class="material-icons me-2">meeting_room</span>Rooms</a>
                    </li>
                </ul>
            </div>
            
            <!-- Carousel section -->
            <div id="home-carousel" class="carousel slide carousel-fade rounded-3 shadow w-75 bg-dark mx-auto p-3" data-bs-ride="carousel">
                <div class="carousel-inner">
<?php
$count = 1;
foreach ($images as $image) :
    if ($count == 1) :
?>
                    <div class="carousel-item active">
    <?php else : ?>
                <div class="carousel-item">
    <?php endif; ?>
                    <img src="<?= base_url('assets/images/carousel/') . $image; ?>" class="d-block img-fluid rounded-3 m-auto" style="height: 600px" alt="<?= 'Carousel image' . $count++; ?>">
                    </div>
    <?php endforeach; ?>
            </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#home-carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#home-carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!-- End of carousel section -->
            
            <!-- Mission and Vision section -->
            <div class="container my-5 px-5" id="mv">
                <div class="row h-100">
                    <div class="border-top border-5 rounded-5 border-dark mx-auto"></div>
                    <div class="d-flex align-items-center justify-content-center mx-auto my-5" style="width: 90%;">
                        <div class="col-md-4 m-2 p-5 border rounded-5 text-bg-dark h-100">
                            <h2 class="fs-1 text-center">Mission</h2>
                            <p class="fs-3">To provide sustainable quality, affordable and accessible products and services thereby satisfying every client’s expectation.</p>
                        </div>
                        <div class="col-md-4 m-2 p-5 border rounded-5 text-bg-dark h-100">
                            <h2 class="fs-1 text-center">Vision</h2>
                            <p class="fs-3">A recognized destination for quality products and services with utmost professionalism in the tourism industry.</p>
                        </div>
                        <div class="col-md-4 m-2 p-5 border rounded-5 text-bg-dark h-100">
                            <h2 class="fs-1 text-center">Core Values</h2>
                            <ul class="fs-3">
                                <li>Commitment</li>
                                <li>Accountability</li>
                                <li>Responsiveness</li>
                                <li>Excellence</li>
                                <li>Stability</li>
                                <li>Service Oriented</li>
                            </ul>
                        </div>
                    </div>
                    <div class="border-top border-5 rounded-5 border-dark w-80 mx-auto"></div>
                </div>
            </div>
            <!-- Contact section -->
            <div class="container px-5 m-auto text-center">
                <h2>Contact Us for Inquiries</h2>
                <p>Contact: 012393214 | eMail: asd@asd.com</p>
            </div>