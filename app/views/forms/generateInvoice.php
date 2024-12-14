<?php extract($data); ?>
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
                <div class="card-header text-uppercase"> RENT INVOICE</strong>  </div>
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
                            <div> <strong><?= Tools::clientName($rentInfo['clientid']); ?></strong> </div>
                            <div><?= Tools::clientAddress($rentInfo['clientid']) ?></div>
                            <div>Email: <?= Tools::clientEmail($rentInfo['clientid']) ?></div>
                            <div>Phone: <?= Tools::clientPhone($rentInfo['clientid']) ?></div>
                        </div>
                        <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-lg-end justify-content-md-start justify-content-xs-start">
                            <div class="row align-items-center">
                                <div class="col-sm-12"> 
                                    <span>Date:</span>
                                    <span><?php $date = new DateTime($rentInfo['createdAt']);
                                            echo $date->format('F j, Y'); ?></span>
                                    <div class="detail-item">
                                        <span>Invoice No:</span>
                                        <span><?= Tools::generateReceiptNumber($rentInfo['createdAt']) ?></span>
                                    </div>
                                    <div class="detail-item">
                                        <span>Customer Name:</span>
                                        <span><?= Tools::clientName($rentInfo['clientid']); ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Description</th>
                                    <th>Rent Amount</th>
                                    <th>Security</th>
                                    <th>Penalty</th>
                                    <th class="right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $subtotal = 0;
                                $rowTotal = $rentInfo['rentAmount'] + $rentInfo['securityAmount'] + $rentInfo['penaltyAmount'];
                                $subtotal += $rowTotal;
                                ?>
                                <tr>
                                    <td><strong class="text-black">1</strong></td>
                                    <td>Rent</td>
                                    <td><?= number_format($rentInfo['rentAmount'], 2) ?></td>
                                    <td><?= number_format($rentInfo['securityAmount'], 2) ?></td>
                                    <td><?= number_format($rentInfo['penaltyAmount'], 2) ?></td>
                                    <td class="right"><strong><?= number_format($rowTotal, 2) ?></strong></td>
                                </tr>
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
                                        <td class="right"><?= number_format($subtotal, 2) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="left"><strong class="text-black">Total</strong></td>
                                        <td class="right"><strong class="text-black"><?= number_format($rowTotal, 2) ?></strong></td>
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

<a href="javascript:void(0);" class="btn btn-sm btn-primary emailInvoice font-weight-lighter mr-2 text-small" rentid='<?= $rentInfo['rentid'] ?>'>Email Invoice to Client</a>

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
        var rentid = $(this).attr('rentid');
        var url = urlroot + "/billing/generateInvoice";

        $.ajax({
            type: 'POST',
            url: url,
            data: { rentid: rentid },
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

