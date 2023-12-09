<div class="col-md bg-light overflow-y-auto mx-2 vh-100">
    <div class="row justify-content-center">
        <div class="col-md-12 m-1 px-3 py-3 overflow-auto">
            <!-- Lists of reservations -->
            <h2 class="text-center">Reservations List</h2>
            <div class="border-top border-5 rounded-5 border-dark mx-auto my-4"></div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url('Reservations/new'); ?>" class="btn btn-primary">New Reservation</a>
                        <a href="<?= base_url('Reservations'); ?>" class="btn btn-primary">Refresh</a>
                    </div>
                </div>
            </div>
            <!-- Search and filter form -->
            <div class="col-md">
                <form action="<?= base_url('Reservations'); ?>" method="get" autocomplete="off">
                    <div class="d-flex justify-content-between">
                        <div class="input-group mb-3 me-5">
                            <input type="date" class="form-control" name="from" id="from" aria-label="From" aria-describedby="button-addon2" value="<?php echo (($this->input->get('from') == null) ? $from : $this->input->get('from')); ?>">
                            <span class="input-group-text" id="basic-addon1">to</span>
                            <input type="date" class="form-control" name="to" id="to" aria-label="To" aria-describedby="button-addon2" value="<?php echo (($this->input->get('to') == null) ? $to : $this->input->get('to')); ?>">
                        </div>
                        <div class="input-group mb-3 ms-5">
                            <input type="text" class="form-control" name="search" id="search" placeholder="Search name of customer" aria-label="Search" aria-describedby="button-addon2" value="<?= $this->input->get('search'); ?>">
                            <button class="btn btn-outline-secondary px-5" type="submit" id="button-addon2">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End of search and filter form -->
            <!-- Table for showing the reservations -->
            <table class="table table-hover table-striped table bordered">
                <thead>
                    <tr class="text-center">
                        <!-- Hidden column for reservation id -->
                        <th scope="col" style="width: auto;" hidden></th>
                        <th scope="col" style="width: auto;">#</th>
                        <th scope="col" style="width: auto;">Customer Name</th>
                        <th scope="col" style="width: auto;">Reserved Items</th>
                        <th scope="col" style="width: auto;">Start Date</th>
                        <th scope="col" style="width: auto;">End Date</th>
                        <th scope="col" style="width: auto;">Status</th>
                        <th scope="col" style="width: 15%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 0;
                    foreach ($reservationlist as $reservation) : ?>
                        <tr>
                            <td hidden>
                                <input type="hidden" name="reservationid" value="<?= $reservation['reservationid']; ?>">
                            </td>
                            <th scope="row">
                                <?= ++$count; ?>
                            </th>
                            <td>
                                <?= $names[$reservation['customerid']]['firstname'] . ' ' . $names[$reservation['customerid']]['lastname']; ?>
                            </td>
                            <td>
                                <?php
                                    foreach($items[$reservation['reservationid']] as $item) {
                                        echo $item . '<br>';
                                    }
                                ?>
                            </td>
                            <td class="text-center">
                                <?= $reservation['startdate']; ?>
                            </td>
                            <td class="text-center">
                                <?= $reservation['enddate']; ?>
                            </td>
                            <td class="text-center">
                                <?php if ($reservation['status'] == 0) : ?>
                                    <span class="badge bg-warning text-dark">Pending</span>
                                <?php elseif ($reservation['status'] == 1) : ?>
                                    <span class="badge bg-success">Approved</span>
                                <?php elseif ($reservation['status'] == 2) : ?>
                                    <span class="badge bg-danger">Rejected</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url('Reservations/view/') . $reservation['reservationid']; ?>" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
                                <a href="<?= base_url('Reservations/approve/') . $reservation['reservationid']; ?>" class="btn btn-sm btn-success"><i class="bi bi-check-lg"></i></a>
                                <a href="<?= base_url('Reservations/reject/') . $reservation['reservationid']; ?>" class="btn btn-sm btn-danger"><i class="bi bi-x-lg"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- Modal div for confirmation -->
    </div>
</div>