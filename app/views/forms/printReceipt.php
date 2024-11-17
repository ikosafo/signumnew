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
                <div class="card-header"> <strong>PAYMENT RECEIPT</strong>  </div>
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
                            <div> <strong><?= Tools::clientName($paymentDetails['clientid']); ?></strong> </div>
                            <div><?= Tools::clientAddress($paymentDetails['clientid']) ?></div>
                            <div>Email: <?= Tools::clientEmail($paymentDetails['clientid']) ?></div>
                            <div>Phone: <?= Tools::clientPhone($paymentDetails['clientid']) ?></div>
                        </div>
                        <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-lg-end justify-content-md-start justify-content-xs-start">
                            <div class="row align-items-center">
                                <div class="col-sm-12"> 
                                    <span>Date:</span>
                                    <span><?php $date = new DateTime($paymentDetails['datePaid']);
                                            echo $date->format('F j, Y'); ?></span>
                                    <div class="detail-item">
                                        <span>Receipt No:</span>
                                        <span><?= Tools::generateReceiptNumber($paymentDetails['createdAt']) ?></span>
                                    </div>
                                    <div class="detail-item">
                                        <span>Customer Name:</span>
                                        <span><?= Tools::clientName($paymentDetails['clientid']); ?></span>
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
                                    <th>Payment Method</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th class="right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                        
                                <tr>
                                    <td><strong class="text-black">1</strong></td>
                                    <td><?= $paymentDetails['billType'] ?></td>
                                    <td><?= $paymentDetails['paymentMethod'] ?></td>
                                    <td>1</td>
                                    <td><?= $paymentDetails['amountPaid'] ?></td>
                                    <td><?= $paymentDetails['amountPaid'] ?></td>
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
                                        <td class="left"><strong class="text-black">Subtotal</strong></td>
                                        <td class="right">0.00</td>
                                    </tr>
                                    <tr>
                                        <td class="left"><strong class="text-black">Total</strong></td>
                                        <td class="right"><strong class="text-black"><?= $paymentDetails['amountPaid'] ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        
                        </div>
                        <div class="receipt-footer">
                            <p>This is a computer-generated receipt. No signature required.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div> 

<a href="#" id="printbutton" class="btn btn-sm btn-primary font-weight-lighter mr-2 text-small">Print Application</a>

<script>
    function printContent() {
        printJS({
            printable: 'print_this',
            type: 'html',
            targetStyles: ['*']
        });
    }

    document.getElementById('printbutton').addEventListener('click', printContent);
 </script>

