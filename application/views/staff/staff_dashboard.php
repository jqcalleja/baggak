<div class="col-md bg-light overflow-y-auto mx-2">
    <div class="p-3 vh-100">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <!-- TODO: Loop through an array from the Controller to dynamiccaly show the breadcrumb-->
                <?php
                foreach ($breadcrumb as $name => $link) :
                ?>
                    <li class="breadcrumb-item"><a href="<?= $link; ?>"><?= $name; ?></a></li>
                <?php
                endforeach;
                ?>
            </ol>
        </nav>
        <!-- Page content -->
        <div>
            <h1>Lorem Ipsum</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas ipsum tempora voluptatibus sint nemo eos corrupti, at, ratione doloribus, sequi amet. Harum ratione eum aspernatur sit commodi enim quam ab!</p>
        </div>
        <!-- End of page content -->
    </div>
</div>