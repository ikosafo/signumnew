<?php extract($data); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Bills for <?= Tools::clientName($clientid) ?></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th width="10%">NO.</th>
                                <th width="20%">DATE DUE</th>
                                <th width="20%">AMOUNT</th>
                                <th width="20%">DESCRIPTION</th>
                                <th width="20%">PAYMENT STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1; // Initialize a counter
                            foreach ($maintenanceBilling as $result) { ?>
                                <tr>
                                    <td><strong class="text-black"><?= $no++ ?></strong></td>
                                    <td><?= $result->dateDue ?></td>
                                    <td><?php if (is_null($result->amountPaid)): ?>
                                            <?= "GHC " . number_format(Billings::clientMaintenanceAmount(Tools::getPhasefromClient($result->clientid)), 2) ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $result->description ?></td>
                                   <td>
                                        <div class="d-flex">
                                            <?php if (!in_array(strtolower($result->paymentStatus), ['success', 'successful'])) { ?>
                                                <span class="bgl-danger text-danger rounded p-1 ps-2 pe-2 font-w600 fs-12 d-inline-block mb-2 mb-sm-3">Not Paid</span>
                                            <?php } else { ?>
                                                <span class="bgl-success text-success rounded p-1 ps-2 pe-2 font-w600 fs-12 d-inline-block mb-2 mb-sm-3">Paid</span>
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
