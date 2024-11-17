<?php extract($data); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Clients</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md" id="clientTable">
                        <thead>
                            <tr>
                                <th width="10%">NO.</th>
                                <th width="15%">PROPERTY</th>
                                <th width="15%">RENT AMOUNT</th>
                                <th width="15%">PENALTY</th>
                                <th width="15%">SECURITY AMOUNT</th>
                                <th width="15%">TOTAL AMOUNT</th>
                                <th width="15%">DURATION</th>
                                <th width="15%">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1; 
                            foreach ($listRentDue as $result) { ?>
                                <tr>
                                    <td><strong class="text-black"><?= $no++ ?></strong></td>
                                    <td><?= Tools::propertyClient($result->propertyid) ?></td>
                                    <td><?= number_format($result->rentAmount,2) ?></td>
                                    <td><?= number_format($result->penaltyAmount,2) ?></td>
                                    <td><?= number_format($result->securityAmount,2) ?></td>
                                    <td><?= number_format($result->securityAmount + $result->rentAmount + $result->penaltyAmount, 2) ?></td>
                                    <td><?= 'From: ' . $result->startDate . ' <br> To: ' . $result->endDate ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <?php if ($result->paymentStatus === "success") {
                                               echo '<span class="bgl-success text-success rounded p-1 ps-2 pe-2 font-w600 fs-12 d-inline-block mb-2 mb-sm-3">Paid</span>';
                                            }
                                            else if ($result->paymentStatus === "pending") {
                                                echo '<span class="bgl-primary text-primary rounded p-1 ps-2 pe-2 font-w600 fs-12 d-inline-block mb-2 mb-sm-3">Pending</span>';
                                            }
                                            else if ($result->paymentStatus === "timeout" || $result->paymentStatus === "failed") {
                                                echo '<span class="bgl-danger text-danger rounded p-1 ps-2 pe-2 font-w600 fs-12 d-inline-block mb-2 mb-sm-3">Pending</span>';
                                            }
                                            else { ?>
                                                <a href="javascript:void(0);" class="btn btn-success makePayment" 
                                                data-clientid="<?= $result->clientid ?>" 
                                                data-rentid="<?= $result->rentid ?>" 
                                                data-email="<?= Tools::clientEmail($result->clientid) ?>" 
                                                data-amount="<?= ($result->securityAmount + $result->rentAmount + $result->penaltyAmount) * 100 ?>">Pay Now
                                                </a>

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
<div id="makePaymentDiv"></div>

<!-- Bootstrap Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Payment</h5>
            </div>
            <div class="modal-body">
                <!-- Payment iframe -->
                <iframe id="paymentFrame" src="" style="width: 100%; height: 600px; border: none;"></iframe>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo URLROOT ?>/assets/js/inline.js"></script>

<script>
    $("#clientTable").DataTable({
        language: {
            paginate: {
                next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
            }
        }
    });

 
    $(document).on('click', '.makePayment', function() {
        var clientid = $(this).data('clientid');
        var amount = $(this).data('amount');
        var rentid = $(this).data('rentid');
        var email = $(this).data('email'); 

        var handler = PaystackPop.setup({
            key: 'pk_test_e9c02de44d365f18c863d41a01caa43aba1b1568',
            email: email,
            amount: amount, 
            rentid: rentid,
            currency: 'GHS',
            metadata: {
                custom_fields: [
                    {
                        display_name: "Client ID",
                        variable_name: "client_id",
                        value: clientid
                    }
                ]
            },
            callback: function(response) {
                console.log("Paystack Callback Response: ", response);
                setTimeout(function() {
                    console.log("Reloading the page...");
                    location.reload();
                }, 3000);

                // Send data to verify payment on the server
                $.post('/billing/verifyPayment', { 
                    reference: response.reference, 
                    status: response.status,
                    amount: amount,
                    rentid: rentid
                }, function(data) {
                    var responseData = JSON.parse(data);

                    if (responseData.status) {
                        $.notify("Payment successful!", {
                            position: "top center",
                            className: "success"
                        });
                    } else {
                        $.notify("Payment verification failed!", {
                            position: "top center",
                            className: "error"
                        });
                    }

                    // Ensure the page reloads after notification
                    setTimeout(function() {
                        console.log("Reloading the page...");
                        location.reload();
                    }, 1000);

                }).fail(function(error) {
                    console.log("Error in POST request: ", error);
                });
            },
            onClose: function() {
                // Log when the payment window is closed
                console.log("Paystack payment window closed.");
                $.notify("Payment window closed!", {
                    position: "top center",
                    className: "info"
                });
            }
        });

        // Open the Paystack iframe
        handler.openIframe();
    });



</script>
