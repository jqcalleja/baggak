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
        <div class="col-md-10 border-top border-5 rounded-5 border-dark mx-auto mt-2 mb-5"></div>
        <div class="col col-md-10 mx-auto">
        <div class="row mb-3">
                <div class="text-center">
                    <h1 class="display-6 fw-bold">Foods and Beverage</h1>
                </div>
            </div>
            <!-- Main content section -->
            <div class="container">
                <div class="row">
                <?php
                    $count = count($foods);
                    $i = 1;
                    foreach ($foods as $food):
                ?>
                        <div class="col-md-3 mb-3 mx-auto">
                            <div class="card text-white bg-secondary">
                                <a href="<?= base_url('Index/viewimage/foods/') . $food['image']; ?>" target="_blank"><img src="<?= base_url('assets/images/foods/thumbs/').$food['image'];?>" class="card-img-top" alt="<?= $food['name']?>"></a>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?= $food['name'];?></h5>
                                    <p class="card-text"><?= $food['description'];?></p>
                                </div>
                            </div>
                        </div>
                <?php if ($i % 4 == 0 || $i == $count): ?>
                        </div>
                        <div class="row">
                <?php
                        endif;
                        $i++;
                    endforeach;
                ?>
            </div>
        </div>

        <!-- Script for changing the active state of the navigation links -->
        <script>
            $(document).ready(function() {
                var url = window.location.href;
                var page = url.substr(url.lastIndexOf("/") + 1);
                if (page == "") {
                    page = "home";
                }
                $('.nav-link').removeClass('active');
                $('.nav-link').each(function() {
                    if ($(this).attr('href').indexOf(page) !== -1) {
                        $(this).addClass('active');
                    }
                });
            });
        </script>