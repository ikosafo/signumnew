<?php extract($data); ?>
<div id="clientDetailsDiv"></div>
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
                            <th width="20%">CLIENT</th>
                            <th width="20%">AMOUNT</th>
                            <th width="20%">BILL TYPE</th>
                            <th width="20%">PAYMENT METHOD</th>
                            <th width="20%">STATUS</th>
                            <th width="10%">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1; // Initialize a counter
                        foreach ($paymentHistory as $result) { ?>
                            <tr>
                                <td><strong class="text-black"><?= $no++ ?></strong></td>
                                <td><?= Tools::clientName($result->clientid) ?></td>
                                <td><?= $result->amountPaid ?></td>
                                <td><?= $result->billType ?></td>
                                <td><?= $result->paymentMethod ?></td>
                                <td><?= $result->paymentStatus ?></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="javascript:void(0);" class="btn btn-primary viewPayment shadow btn-xs sharp me-1" paymentid='<?= $result->payid ?>'><i class="fas fa-eye"></i></a>
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

<script>
    $("#clientTable").DataTable({
        language: {
            paginate: {
            next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
            previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
            }
        }
    });

    $(document).on('click', '.editPayment', function() {
        var paymentid = $(this).attr('paymentid');
        var hash = btoa(btoa(btoa(paymentid)));
        window.location.href = urlroot + "/pages/editPayment?paymentid=" + hash;
    });

    $(document).on('click', '.viewPayment', function() {
        var paymentid = $(this).attr('paymentid');
        var hash = btoa(btoa(btoa(paymentid)));
        window.location.href = urlroot + "/pages/viewPayment?paymentid=" + hash;
    });


    $(document).off('click', '.deletePayment').on('click', '.deletePayment', function() {
        var paymentid = $(this).attr('paymentid');
       
        var formData = {};
        formData.paymentid = paymentid; 
       
        $.confirm({
            title: 'Delete Record!',
            content: 'Are you sure to continue?',
            buttons: {
                no: {
                    text: 'No',
                    keys: ['enter', 'shift'],
                    backdrop: 'static',
                    keyboard: false,
                    action: function() {
                        $.alert('Data is safe');
                    }
                },
                yes: {
                    text: 'Yes, Delete it!',
                    btnClass: 'btn-blue',
                    action: function() {
                        var formData = {};
                        formData.paymentid = paymentid; 
                        saveForm(formData, urlroot + "/delete/client", function(response) {
                            $('#clientTableDiv').html(response);
                        });
                        
                        $('html, body').animate({
                            scrollTop: $("#clientTableDiv").offset().top
                        }, 200);
                        
                        loadPage("/tables/clients", function(response) {
                            $('#clientTableDiv').html(response);
                        });
                        
                    }
                }
            }
        });
        
     });


</script>