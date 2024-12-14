<?php extract($data); 

// Sort $listClientMaintenance by activity
usort($listClientMaintenance, function ($a, $b) {
    return strcmp(Tools::getActivityName($a->activityid), Tools::getActivityName($b->activityid));
});

// Precalculate the number of people per phase
$phaseCount = [];
foreach ($listClientMaintenance as $fee) {
    $phase = Tools::propertyPhase($fee->phaseid);
    if (!isset($phaseCount[$phase])) {
        $phaseCount[$phase] = Properties::getClientNumberPhase($fee->phaseid); // Function to get tenant count in phase
    }
}

// Calculate totals
$subtotal = 0;
$activityTotals = [];
foreach ($listClientMaintenance as $fee) {
    $phase = Tools::propertyPhase($fee->phaseid);
    $tenantCount = $phaseCount[$phase] ?? 1;
    $individualAmount = $fee->amount / $tenantCount;
    $subtotal += $individualAmount;

    $activityName = Tools::getActivityName($fee->activityid);
    if (!isset($activityTotals[$activityName])) {
        $activityTotals[$activityName] = 0;
    }
    $activityTotals[$activityName] += $individualAmount;
}
?>

<style>
    .receipt-footer {
        text-align: center;
        margin-top: 20px;
        font-size: 12px;
        color: #888;
    }
</style>
<div id="print_this">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header text-uppercase">MAINTENANCE INVOICE</strong>  </div>
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <h6>From:</h6>
                            <div> <strong>Signum Properties</strong> </div>
                            <div>Address: </div>
                            <div>Email: info@signumproperties.com</div>
                            <div>Phone: +233 123 456 7890</div>
                        </div>
                        <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <h6>To:</h6>
                            <div> <strong><?= Tools::clientName($billInfo['clientid']); ?></strong> </div>
                            <div><?= Tools::clientAddress($billInfo['clientid']) ?></div>
                            <div>Email: <?= Tools::clientEmail($billInfo['clientid']) ?></div>
                            <div>Phone: <?= Tools::clientPhone($billInfo['clientid']) ?></div>
                        </div>
                        <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-lg-end justify-content-md-start justify-content-xs-start">
                            <div class="row align-items-center">
                                <div class="col-sm-12"> 
                                    <span>Date:</span>
                                    <span><?php $date = new DateTime($billInfo['createdAt']);
                                            echo $date->format('F j, Y'); ?></span>
                                    <div class="detail-item">
                                        <span>Invoice No:</span>
                                        <span><?= Tools::generateInvoiceNumber($billInfo['createdAt']) ?></span>
                                    </div>
                                    <div class="detail-item">
                                        <span>Customer Name:</span>
                                        <span><?= Tools::clientName($billInfo['clientid']); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ACTIVITY</th>
                                    <th>DETAIL</th>
                                    <th>OPTIONAL <br> SERVICES</th>
                                    <th>AMOUNT /<br> MONTH</th>
                                    <th class="right">INDIVIDUAL AMOUNT /<br> MONTH</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                              
                                $currentActivity = '';
                                $activityRowCount = [];
                                foreach ($listClientMaintenance as $fee) {
                                    $activity = Tools::getActivityName($fee->activityid);
                                    if (!isset($activityRowCount[$activity])) {
                                        $activityRowCount[$activity] = 0;
                                    }
                                    $activityRowCount[$activity]++;
                                }

                                foreach ($listClientMaintenance as $fee):
                                    $activity = Tools::getActivityName($fee->activityid);
                                    $details = $fee->details;
                                    $totalAmount = $fee->amount;
                                    $phase = Tools::propertyPhase($fee->phaseid);
                                    $tenantCount = $phaseCount[$phase] ?? 1; // Default to 1 to avoid division by zero
                                    $individualAmount = $totalAmount / $tenantCount;
                                ?>
                                    <tr>
                                        <?php if ($currentActivity !== $activity): ?>
                                            <td rowspan="<?= $activityRowCount[$activity]; ?>"><span><?= $activity; ?></span></td>
                                            <?php $currentActivity = $activity; ?>
                                        <?php endif; ?>
                                        <td><?= $details; ?></td>
                                        <td></td> <!-- Optional Services Column, Blank -->
                                        <td><?= number_format($totalAmount, 2); ?></td>
                                        <td class="right"><?= number_format($individualAmount, 2); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5"> </div>
                        <div class="col-xl-4 col-lg-4 col-sm-7 ms-auto">
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                        <td class="left">Subtotal</td>
                                        <td class="right"><?= number_format($subtotal, 2); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="left"><strong class="text-black">Total</strong></td>
                                        <td class="right"><strong class="text-black"><?= number_format($subtotal, 2); ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="receipt-footer">
                            <p>This is a computer-generated invoice. No signature required.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> 
</div> 

<a href="javascript:void(0);" class="btn btn-sm btn-primary emailInvoice font-weight-lighter mr-2 text-small" billid='<?= $billInfo['billid'] ?>'>Email Invoice to Client</a>

<!-- <script>
    function printContent() {
        printJS({
            printable: 'print_this',
            type: 'html',
            targetStyles: ['*']
        });
    }

    document.getElementById('printbutton').addEventListener('click', printContent);
 </script> -->



 <script>

    $(document).on('click', '.emailInvoice', function() {
        var billid = $(this).attr('billid');
        var url = urlroot + "/billing/generateMaintenanceInvoice";

        $.ajax({
            type: 'POST',
            url: url,
            data: { billid: billid },
            success: function(response) {
                if (response == '1') {
                    $.notify("Email sent successfully", {
                        position: "top center",
                        className: "success"
                    });
                } else {
                    $.notify("Error sending email", {
                        position: "top center",
                        className: "error"
                    });
                }
            },
            error: function() {
                $.notify("An unexpected error occurred", {
                    position: "top center",
                    className: "error"
                });
            }
        });
    });

 </script>

