<?php extract($data); ?>
<div id="clientDetailsDiv"></div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Rent Information</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md" id="RentInfoTable">
                        <thead>
                            <tr>
                                <th width="10%">NO.</th>
                                <th width="20%">TENANT</th>
                                <th width="20%">PROPERTY</th>
                                <th width="20%">START DATE</th>
                                <th width="20%">END DATE</th>
                                <th width="10%">LEASE TYPE</th>
                                <th width="10%">RENEWABLE</th>
                                <th width="20%">RENT AMOUNT</th>
                                <th width="20%">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1; // Initialize a counter
                            foreach ($listRentInformation as $result) { ?>
                                <tr>
                                    <td><strong class="text-black"><?= $no++ ?></strong></td>
                                    <td><?= Tools::clientName($result->clientid) ?></td>
                                    <td><?= Tools::propertyClient($result->propertyid). '<br><small><strong>'. Tools::propertyPhase($result->phaseid) . '</strong></small>' ?></td>
                                    <td><?= $result->startDate ?></td>
                                    <td><?= $result->endDate ?></td>
                                    <td><?= $result->leaseType ?></td>
                                    <td><?= $result->renewable ?></td>
                                    <td><?= number_format($result->rentAmount, 2) ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <?php if (!in_array(strtolower($result->paymentStatus), ['success', 'successful'])) { ?>
                                                <a href="javascript:void(0);" class="btn btn-success generateInvoice" rentid='<?= $result->rentid ?>'>Generate Invoice</a>
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
        var rentid = $(this).attr('rentid');
        
        $('html, body').animate({
                scrollTop: $("#detailsIssueDiv").offset().top
        }, 2000);
        //alert(rentid);

        var formData = {
            rentid: rentid
        };
        var url = "/forms/generateInvoice";
        var successCallback = function(response) {
            $('#detailsIssueDiv').html(response);
        };
        saveForm(formData, url, successCallback);    
    });

   
</script>