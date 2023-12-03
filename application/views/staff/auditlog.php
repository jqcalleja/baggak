            <div class="col-md bg-light overflow-y-auto mx-2 vh-100">
                <div class="row justify-content-center">
                    <div class="col-md-11 m-5">
                        <h2 class="text-center">System Activity Log</h2>
                        <div class="border-top border-5 rounded-5 border-dark mx-auto my-4"></div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-end">
                                    <div class="d-flex justify-content-start">
                                        <div class="col-md me-2">
                                            <form action="<?= base_url('AuditLog'); ?>" method="get">
                                                <div class="d-flex justify-content-between">
                                                    <div class="input-group mb-3 me-3">
                                                        <span class="input-group-text">Date range:</span>
                                                        <input type="date" class="form-control" name="from" id="from" aria-label="From" aria-describedby="button-addon2" value="<?php echo (($this->input->get('from') == null) ? $from : $this->input->get('from')); ?>">
                                                        <span class="input-group-text" id="basic-addon1">to</span>
                                                        <input type="date" class="form-control" name="to" id="to" aria-label="To" aria-describedby="button-addon2" value="<?php echo (($this->input->get('to') == null) ? $to : $this->input->get('to')); ?>">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" name="search" id="search" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" value="<?= $this->input->get('search'); ?>">
                                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                                                        <a href="<?= base_url('AuditLog'); ?>" class="btn btn-outline-secondary" id="button-addon2">Clear</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div>
                                            <button class="btn btn-outline-success" onclick="window.print();"><i class="bi bi-printer me-2"></i>Print</button>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col" style="width: auto;">#</th>
                                            <th scope="col" style="width: auto;">User</th>
                                            <th scope="col" style="width: 45%;">Activity</th>
                                            <th scope="col" style="width: 25%;">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count = 0;
                                        foreach ($auditlog as $log) : ?>
                                            <tr>
                                                <th scope="row">
                                                    <?= ++$count; ?>
                                                </th>
                                                <td>
                                                    <?= $log['lastname'] . ', ' . $log['firstname']; ?>
                                                </td>
                                                <td>
                                                    <?= $log['activity']; ?>
                                                </td>
                                                <td>
                                                    <?= date('F d, Y h:i A', strtotime($log['date'])); ?>
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

            <!-- Hidden div for printing the log -->
            <div class="d-none d-print-flex">
                <div class="print" id="content">
                    <div class="text-center">
                        <img src="<?= base_url('assets/images/logo.png'); ?>" alt="Baggak Logo" class="img-fluid" style="width: 200px;">
                        <p><span class="fw-bold fs-4">BAGGAK SON’Z Hotel and Restaurant</span><br>Centro 2, Sanchez Mira, Cagayan</p>
                    </div>
                    <div class="border-top border-5 rounded-5 border-dark mx-auto my-4"></div>
                    <h2 class="text-center">System Activity Log</h2>
                    <div class="border-top border-5 rounded-5 border-dark mx-auto my-4"></div>
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col" style="width: auto;">#</th>
                                <th scope="col" style="width: auto;">User</th>
                                <th scope="col" style="width: 45%;">Activity</th>
                                <th scope="col" style="width: auto;">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 0;
                            foreach ($print as $log) : ?>
                                <tr>
                                    <th scope="row">
                                        <?= ++$count; ?>
                                    </th>
                                    <td>
                                        <?= $log['lastname'] . ', ' . $log['firstname']; ?>
                                    </td>
                                    <td>
                                        <?= $log['activity']; ?>
                                    </td>
                                    <td>
                                        <?= date('F d, Y h:i A', strtotime($log['date'])); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        <p>Printed by: <?= $this->session->userdata('fname'); ?></p>
                        <p>Date: <?= date('F d, Y h:i A'); ?></p>
                    </div>
                </div>
            </div>
            