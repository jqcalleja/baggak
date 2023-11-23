            <div class="col-md bg-light overflow-y-auto mx-2 vh-100">
                <div class="row justify-content-center">
                    <div class="col-md-9 m-5 px-5 py-5">
                        <div class="print">
                            <h2 class="text-center">System Activity Log</h2>
                        </div>
                        <div class="border-top border-5 rounded-5 border-dark mx-auto my-4"></div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-end">
                                    <div class="col-md-5 me-2">
                                        <form action="<?= base_url('AuditLog'); ?>" method="get">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="search" id="search" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" value="<?= $this->input->get('search'); ?>">
                                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                                                <a href="<?= base_url('AuditLog'); ?>" class="btn btn-outline-secondary" type="button" id="button-addon2">Clear</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-outline-success" onclick="window.print();"><i class="bi bi-printer me-2"></i>Print</button>
                                    </div>
                                </div>
                                <div class="print">
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
                                </div>
                                <div class="d-flex justify-content-center">
                                    <?= $links; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>