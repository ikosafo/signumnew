<?php extract($data); ?>
<div id="clientDetailsDiv"></div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Mantenance Information for the month of <?= date('F, Y') ?></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md" id="RentInfoTable">
                        <thead>
                            <tr>
                                <th width="10%">NO.</th>
                                <th width="20%">TENANT</th>
                                <th width="20%">PROPERTY</th>
                                <th width="20%">DATE DUE</th>
                                <th width="20%">DESCRIPTION</th>
                                <th width="20%">MAINTENANCE</th>
                                <th width="20%">ALL BILLING <br> INFO</th>
                                <th width="20%">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1; // Initialize a counter
                            foreach ($listCurrentMaintenance as $result) { ?>
                                <tr>
                                    <td><strong class="text-black"><?= $no++ ?></strong></td>
                                    <td><?= Tools::clientName($result->clientid) ?></td>
                                    <td><?= Tools::propertyClient(Tools::getClientProperty($result->clientid)) ?></td>
                                    <td><?= $result->dateDue ?></td>
                                    <td><?= $result->description ?></td>
                                    <td><?php if (is_null($result->amountPaid)): ?>
                                            <?= "GHC " . number_format(Billings::clientMaintenanceAmount(Tools::getPhasefromClient($result->clientid)), 2) ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><a href="javascript:void(0);" class="btn btn-sm btn-primary getBills" billid='<?= $result->billid ?>'>View Bills</a></td>
                                    <td>
                                        <div class="d-flex">
                                            <?php if (!in_array(strtolower($result->paymentStatus), ['success', 'successful'])) { ?>
                                                <a href="javascript:void(0);" class="btn btn-success generateInvoice" billid='<?= $result->billid ?>'>Generate Invoice</a>
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
<div id="detailsIssueDiv"></div>

<script>
    $("#RentInfoTable").DataTable({
        language: {
            paginate: {
            next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
            previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
            }
        }
    });



    $(document).on('click', '.generateInvoice', function() {
        var billid = $(this).attr('billid');
        
        $('html, body').animate({
                scrollTop: $("#detailsIssueDiv").offset().top
        }, 2000);
        //alert(billid);

        var formData = {
            billid: billid
        };
        var url = "/forms/generateMaintenanceInvoice";
        var successCallback = function(response) {
            $('#detailsIssueDiv').html(response);
        };
        saveForm(formData, url, successCallback);    
    });

   
</script>