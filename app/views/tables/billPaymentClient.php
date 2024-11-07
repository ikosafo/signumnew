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
                                            <a href="javascript:void(0);" class="btn btn-success makePayment" 
                                               data-clientid="<?= $result->clientid ?>" 
                                               data-amount="<?= ($result->rentAmount + $result->penaltyAmount) * 100 ?>">Pay Now</a>
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
        
        // Initiating payment request
        $.ajax({
            url: '/billing/initiatePayment', // Your backend endpoint
            method: 'POST',
            data: { clientid: clientid, amount: amount },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.authorization_url) {
                    // Open the Paystack authorization URL in a new tab
                    window.open(data.authorization_url, '_blank');
                } else {
                    alert('Error: ' + data.error || 'Unknown error');
                }
            },
            error: function() {
                alert('An error occurred. Please try again.');
            }
        });
    });
</script>
