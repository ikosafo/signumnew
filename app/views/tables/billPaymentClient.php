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
                                <th width="15%">TOTAL AMOUNT</th>
                                <th width="15%">DURATION</th>
                                <th width="15%">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1; // Initialize a counter
                            foreach ($listRentDue as $result) { ?>
                                <tr>
                                    <td><strong class="text-black"><?= $no++ ?></strong></td>
                                    <td><?= Tools::propertyClient($result->propertyid) ?></td>
                                    <td><?= number_format($result->rentAmount,2) ?></td>
                                    <td><?= number_format($result->penaltyAmount,2) ?></td>
                                    <td><?= number_format($result->rentAmount + $result->penaltyAmount, 2) ?></td>
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
                                                data-amount="<?= ($result->rentAmount + $result->penaltyAmount) * 100 ?>">Pay Now
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

        // Initialize the Paystack payment modal
        var handler = PaystackPop.setup({
            key: 'pk_test_e9c02de44d365f18c863d41a01caa43aba1b1568',
            email: email,
            amount: amount, 
            rentid:rentid,
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
                    loadPage("/tables/billPaymentClient", function(response) {
                        $('#billPaymentTableDiv').html(response);
                    });
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

                        loadPage("/tables/billPaymentClient", function(response) {
                            $('#billPaymentTableDiv').html(response);
                        });
                    } else {
                        $.notify("Payment verification failed!", {
                            position: "top center",
                            className: "error"
                        });
                    }
                });

            },
            onClose: function() {
                $.notify("Payment window closed!", {
                    position: "top center",
                    className: "error"
                });
            }
        });

        // Open the modal
        handler.openIframe();
    });


</script>
