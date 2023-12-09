<div class="col-md bg-light overflow-y-auto mx-2 vh-100">
    <div class="row justify-content-center">
        <div class="col-md-6 m-5 px-5 py-5 bg-light border rounded-5 shadow">
            <h2 class="text-center">Add New Reservation</h2>
            <div class="border-top border-5 rounded-5 border-dark mx-auto my-4"></div>
            <?php if ($this->session->userdata('error') != null) : ?>
                <div class="alert alert-danger">
                    <?= $this->session->userdata('error'); ?>
                </div>
            <?php endif; ?>
            <?php if ($this->session->userdata('success') != null) : ?>
                <div class="alert alert-success">
                    <?= $this->session->userdata('success'); ?>
                </div>
            <?php endif; ?>
            <form action="<?= base_url('Reservations/insert'); ?>" method="post" novalidate>
                <div class="row mb-2">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <select class="form-select" name="customerid" id="customerid">
                                <option value="" disabled selected>Select a customer</option>
                                <?php foreach ($customers as $customer) : ?>
                                    <option value="<?= $customer['customerid']; ?>"><?= $customer['firstname'] . ' ' . $customer['lastname']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="name">Customer Name</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="datetime-local" class="form-control" id="startdate" name="startdate" placeholder="Start Date" value="<?= (set_value('startdate') ? set_value('startdate') : date('Y-m-d h:i')); ?>" min="<?= date('Y-m-d h:i'); ?>" required>
                            <label for="start_date">Start Date (dd/mm/yyyy)</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="datetime-local" class="form-control" id="enddate" name="enddate" placeholder="End Date" value="<?= (set_value('enddate') ? set_value('enddate') : date('Y-m-d h:i', strtotime('+ 3 hours'))); ?>" min="<?= date('Y-m-d h:i'); ?>" required>
                            <label for="enddate">End Date (dd/mm/yyyy)</label>
                        </div>
                    </div>
                    <!-- Script to set the end date 3 hours from start date on load and on change-->
                    <script>
                        document.getElementById('startdate').addEventListener('change', function() {
                            var start = new Date(document.getElementById('startdate').value);
                            var end = new Date(document.getElementById('enddate').value);
                            // Set the min date of end date to start date
                            document.getElementById('enddate').min = document.getElementById('startdate').value;
                            end = new Date(start.getTime() + (3 * 60 * 60 * 1000));
                            document.getElementById('enddate').value = end.getFullYear() + '-' + ('0' + (end.getMonth() + 1)).slice(-2) + '-' + ('0' + end.getDate()).slice(-2) + 'T' + ('0' + end.getHours()).slice(-2) + ':' + ('0' + end.getMinutes()).slice(-2);
                        });
                        document.getElementById('enddate').addEventListener('change', function() {
                            var start = new Date(document.getElementById('startdate').value);
                            var end = new Date(document.getElementById('enddate').value);
                            // Set the min date of end date to start date
                            document.getElementById('enddate').min = document.getElementById('startdate').value;
                            if (end.getTime() < start.getTime()) {
                                end = new Date(start.getTime() + (3 * 60 * 60 * 1000));
                                document.getElementById('enddate').value = end.getFullYear() + '-' + ('0' + (end.getMonth() + 1)).slice(-2) + '-' + ('0' + end.getDate()).slice(-2) + 'T' + ('0' + end.getHours()).slice(-2) + ':' + ('0' + end.getMinutes()).slice(-2);
                            }
                        });
                    </script>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <!-- Amount to pay is set to 0 on load, will change when items are added to the table -->
                        <div class="form-floating">
                            <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" value="0" disabled>
                            <label for="amount">Amount to Pay</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Amount paid is set to 0 on load-->
                        <div class="form-floating">
                            <input type="text" class="form-control" id="amountpaid" name="amountpaid" placeholder="Amount Paid" value="0.0">
                            <label for="amountpaid">Amount Paid</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-9">
                        <!-- File upload for proof of payment -->
                        <label for="receipt">Proof of payment</label>
                        <input type="file" class="form-control" id="proof" name="proof" placeholder="Proof of payment" accept=".jpg,.jpeg,.png,gif">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <small class="text-muted">What to reserve?</small>
                        <select name="type" id="type" class="form-select">
                            <option value="1" selected>Amenities</option>
                            <option value="2">Rooms</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <small class="text-muted">Item:</small>
                        <select name="item" id="itemamenities" class="form-select">
                            <option value="" disabled selected>Select an amenity</option>
                            <?php foreach ($amenities as $item) : ?>
                                <option value="<?= $item['id']; ?>" data-price="<?= $item['price'];?>"><?= $item['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select name="item" id="itemrooms" class="form-select" hidden>
                            <option value="" disabled selected>Select a room</option>
                            <?php foreach ($rooms as $item) : ?>
                                <option value="<?= $item['id']; ?>" data-price="<?= $item['price'];?>"><?= $item['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <script>
                            // Script to show the correct select element based on select type
                            document.getElementById('type').addEventListener('change', function() {
                                if (document.getElementById('type').value == 2) {
                                    document.getElementById('itemrooms').hidden = false;
                                    document.getElementById('itemamenities').hidden = true;
                                } else {
                                    document.getElementById('itemrooms').hidden = true;
                                    document.getElementById('itemamenities').hidden = false;
                                }
                            });
                        </script>
                    </div>
                </div>
                <!-- Button to add the selected item to the reserved items table -->
                <div class="row mb-2">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-sm btn-primary" id="additem">Add Item</button>
                    </div>
                </div>
                <!-- Table for showing the reserved items -->
                <h4 class="text-center">Reserved Items</h4>
                <div class="row mb-2">
                    <div class="col-md-12">
                        <table class="table table-hover table-striped table bordered">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col" style="width: auto;">#</th>
                                    <th scope="col" style="width: 80%;">Item</th>
                                    <th scope="col" style="width: auto;">Remove</th>
                                </tr>
                            </thead>
                            <tbody id="reserveditems">
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Script to add rows to the table based on the inputs in the form -->
                <script>
                    document.getElementById('additem').addEventListener('click', function() {
                        var item = document.getElementById('itemamenities');
                        var type = document.getElementById('type');
                        var table = document.getElementById('reserveditems');

                        if (document.getElementById('type').value == 2) {
                            item = document.getElementById('itemrooms');
                        }
                        // Check if type is selected
                        if (type.value == '') {
                            return;
                        }
                        // Check if item is selected
                        if (item.value == '') {
                            return;
                        }
                        // Check if item is already in the table
                        for (var i = 0, row; row = table.rows[i]; i++) {
                            if (row.cells[1].innerHTML == item.options[item.selectedIndex].text) {
                                // Show the modal to show the error
                                $('#errordialog').modal('show');
                                return;
                            }
                        }

                        // Update the amount to pay based on the price of the item selected
                        var amount = parseFloat(document.getElementById('amount').value);
                        var price = parseFloat(item.options[item.selectedIndex].dataset.price);
                        // Format the amount to 2 decimal places
                        amount = (amount + price).toFixed(2);
                        document.getElementById('amount').value = amount;

                        var row = table.insertRow();
                        var cell1 = row.insertCell();
                        var cell2 = row.insertCell();
                        var cell3 = row.insertCell();
                        var cell4 = row.insertCell();
                        var cell5 = row.insertCell();
                        cell1.innerHTML = table.rows.length;
                        cell2.innerHTML = item.options[item.selectedIndex].text;
                        cell3.innerHTML = '<button type="button" class="btn btn-sm btn-danger" onclick="removeitem(this)"><i class="bi bi-trash"></i></button>';
                        cell4.innerHTML = '<input type="hidden" name="type[]" value="' + type.value + '">';
                        cell5.innerHTML = '<input type="hidden" name="item[]" value="' + item.value + '" data-price="' + price +'">';
                    });

                    function removeitem(row) {
                        var i = row.parentNode.parentNode.rowIndex;
                        document.getElementById('reserveditems').deleteRow(i - 1);
                        var amount = parseFloat(document.getElementById('amount').value);
                        var price = parseFloat(row.parentNode.parentNode.cells[4].children[0].dataset.price);
                        // Format the amount to 2 decimal places
                        amount = (amount - price).toFixed(2);
                        document.getElementById('amount').value = amount;
                        var table = document.getElementById('reserveditems');
                        for (var i = 0, row; row = table.rows[i]; i++) {
                            row.cells[0].innerHTML = i + 1;
                        }
                    }
                </script>
                <!-- Button to save the reservation -->
                <div class="row mb-2">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-lg btn-primary me-2 px-4" data-bs-toggle="modal" data-bs-target="#confirmdialog">Save</button>
                        <a href="<?= base_url('Reservations'); ?>" class="btn btn-lg btn-danger">Cancel</a>
                    </div>
                </div>
                <!-- Modal div for confirmation -->
                <div class="modal modal-sm fade my-auto" id="confirmdialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmdialoglabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="confirmdialoglabel">Save Changes</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Continue saving the new reservation?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Yes</button>
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal div for error message -->
                <div class="modal modal-sm fade" id="errordialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="errordialoglabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="errordialoglabel">Alert!</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Item is already reserved.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>