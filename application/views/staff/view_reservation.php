<div class="col-md bg-light overflow-y-auto mx-2 vh-100">
    <div class="row justify-content-center">
        <div class="col-md-6 m-5 px-5 py-5 bg-light border rounded-5 shadow">
            <h2 class="text-center">Viewing Reservation</h2>
            <div class="border-top border-5 rounded-5 border-dark mx-auto my-4"></div>
            <!-- Reservation details -->
            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Customer Name" value="<?= $customer['firstname'] . ' ' . $customer['lastname']; ?>" disabled>
                        <label for="name">Customer Name</label>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="datetime-local" class="form-control" id="startdate" name="startdate" placeholder="Start Date" value="<?= $reservation[0]['startdate'] ?>" disabled>
                        <label for="start_date">Start Date (dd/mm/yyyy)</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="datetime-local" class="form-control" id="enddate" name="enddate" placeholder="End Date" value="<?= $reservation[0]['enddate'] ?>" disabled>
                        <label for="enddate">End Date (dd/mm/yyyy)</label>
                    </div>
                </div>
            </div>
            <!-- Table for showing the reserved items -->
            <h4 class="text-center">Reserved Items</h4>
            <div class="row mb-2">
                <div class="col-md-12">
                    <table class="table table-striped table bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center" style="width: auto;">#</th>
                                <th scope="col" class="text-center" style="width: 80%;">Item</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 0;
                            foreach ($items as $item) : ?>
                                <tr>
                                    <th scope="row" class="text-center">
                                        <?= ++$count; ?>
                                    </th>
                                    <td>
                                        <?= $item; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mb-2">
                <div class="d-flex justify-content-end">
                    <a href="<?= base_url('Reservations'); ?>" class="btn btn-lg btn-danger">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>