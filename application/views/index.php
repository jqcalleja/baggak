            
            <!-- Carousel Section -->
            <div id="home-carousel" class="carousel slide carousel-fade rounded-3 shadow w-75 bg-dark mx-auto mb-5 p-3" data-bs-ride="carousel">
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
            </div>
            <!-- End of Carousel Section -->
            <!-- Mission and Vision Section -->
            <div class="border-top border-5 rounded-5 border-dark mx-auto mb-5"></div>
            <div class="container mt-3 px-5">

                <div class="row">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="col-md-4 m-2 p-5 boder rounded-5 text-bg-dark h-100">
                            <h2 class="fs-1 text-center">Mission</h2>
                            <p class="fs-3">To provide sustainable quality, affordable and accessible products and services thereby satisfying every client’s expectation.</p>
                        </div>
                        <div class="col-md-4 m-2 p-5 boder rounded-5 text-bg-dark h-100">
                            <h2 class="fs-1 text-center">Vision</h2>
                            <p class="fs-3">A recognized destination for quality products and services with utmost professionalism in the tourism industry.</p>
                        </div>
                        <div class="col-md-4 m-2 p-5 boder rounded-5 text-bg-dark h-100">
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
                </div>
            </div>

            <!-- Contact Section -->
            <div class="container mt-5 px-5 m-auto text-center">
                <div class="border-top border-5 rounded-5 border-dark w-80 mx-auto mb-4"></div>
                <h2>Contact Us for Inquiries</h2>
                <p>Contact: 012393214 | eMail: asd@asd.com</p>

            </div>