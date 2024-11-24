<?php extract($data); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Maintenance Fee</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-responsive-md" id="categoryTable">
                    <thead>
                        <tr>
                            <th width="10%">NO.</th>
                            <th width="30%">PROPERTY</th>
                            <th width="50%">AMOUNT</th>
                            <th width="10%">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1; // Initialize a counter
                        foreach ($listMaintenanceFee as $result) { ?>
                            <tr>
                                <td><strong class="text-black"><?= $no++ ?></strong></td>
                                <td><?= Tools::propertyClient($result->propertyid) ?></td>
                                <td><?= number_format($result->amount,2) ?></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="javascript:void(0);" class="btn btn-danger deleteFee shadow btn-xs sharp" feeid='<?= $result->feeid ?>'><i class="fas fa-trash"></i></a>
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
    $("#categoryTable").DataTable({
        language: {
            paginate: {
            next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
            previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
            }
        }
    });


    $(document).off('click', '.deleteFee').on('click', '.deleteFee', function() {
        var feeid = $(this).attr('feeid');
       
        var formData = {};
        formData.feeid = feeid; 
       
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
                        formData.feeid = feeid; 
                        saveForm(formData, "/delete/maintenancefee", function(response) {
                            $('#pageTableDiv').html(response);
                        });
                        
                        $('html, body').animate({
                            scrollTop: $("#pageTableDiv").offset().top
                        }, 200);
                        
                        loadPage("/tables/maintenanceFee", function(response) {
                            $('#pageTableDiv').html(response);
                        });
                        
                    }
                }
            }
        });
            
    });


</script>