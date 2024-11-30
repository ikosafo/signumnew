<?php extract($data); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Payment History</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md" id="clientTable">
                        <thead>
                            <tr>
                                <th width="10%">NO.</th>
                                <th width="15%">AMOUNT</th>
                                <th width="15%">BILL TYPE</th>
                                <th width="15%">PAYMENT METHOD</th>
                                <th width="15%">SERIAL NUMBER</th>
                                <th width="15%">STATUS</th>
                                <th width="20%">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1; // Initialize a counter
                            foreach ($clientPaymentHistoy as $result) { ?>
                                <tr>
                                    <td><strong class="text-black"><?= $no++ ?></strong></td>
                                    <td><?= $result->amountPaid ?></td>
                                    <td><?= $result->billType ?></td>
                                    <td><?= $result->paymentMethod ?></td>
                                    <td><?= $result->serialNumber ?></td>
                                    <td><?= $result->paymentStatus ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <button type="button" id="printReceeipt" class="printReceipt btn btn-success next2 btn-sm" i_index='<?php echo $result->payid ?>' style="margin-left:10px">Print Receipt</button>
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
    $("#clientTable").DataTable({
        language: {
            paginate: {
            next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
            previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
            }
        }
    });

    $(document).on('click', '.printReceipt', function() {
        var idIndex = $(this).attr('i_index');
        
        $('html, body').animate({
                scrollTop: $("#detailsIssueDiv").offset().top
        }, 2000);
        //alert(idIndex);

        var formData = {
            id_index: idIndex
        };
        var url = "/forms/printReceipt";
        var successCallback = function(response) {
            $('#detailsIssueDiv').html(response);
        };
        saveForm(formData, url, successCallback);
       
    });
    


</script>