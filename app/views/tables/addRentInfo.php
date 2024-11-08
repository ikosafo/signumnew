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
                            <th width="20%">RENT AMOUNT</th>
                            <th width="20%">BEDROOMS</th>
                            <th width="10%">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1; // Initialize a counter
                        foreach ($listRentInformation as $result) { ?>
                            <tr>
                                <td><strong class="text-black"><?= $no++ ?></strong></td>
                                <td><?= Tools::clientName($result->clientid) ?></td>
                                <td><?= Tools::propertyClient($result->propertyid) ?></td>
                                <td><?= $result->startDate ?></td>
                                <td><?= $result->endDate ?></td>
                                <td><?= number_format($result->rentAmount,2) ?></td>
                                <td><?= $result->numberRoom ?></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="javascript:void(0);" class="btn btn-primary viewRentInfo shadow btn-xs sharp me-1" rentid='<?= $result->rentid ?>'><i class="fas fa-eye"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-warning editRentInfo shadow btn-xs sharp me-1" rentid='<?= $result->rentid ?>'><i class="fas fa-pencil-alt"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-danger deleteRentInfo shadow btn-xs sharp" rentid='<?= $result->rentid ?>'><i class="fas fa-trash"></i></a>
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
    $("#RentInfoTable").DataTable({
        language: {
            paginate: {
            next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
            previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
            }
        }
    });

    $(document).on('click', '.editRentInfo', function() {
        var rentid = $(this).attr('rentid');
        var hash = btoa(btoa(btoa(rentid)));
        window.location.href = urlroot + "/pages/editRentInfo?rentid=" + hash;
    });

    $(document).on('click', '.viewRentInfo', function() {
        var rentid = $(this).attr('rentid');
        var hash = btoa(btoa(btoa(rentid)));
        window.location.href = urlroot + "/pages/viewRentInfo?rentid=" + hash;
    });


    $(document).off('click', '.deleteRentInfo').on('click', '.deleteRentInfo', function() {
        var rentid = $(this).attr('rentid');
       
        var formData = {};
        formData.rentid = rentid; 
       
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
                        formData.rentid = rentid; 
                        saveForm(formData, urlroot + "/delete/rentInfo", function(response) {
                            $('#rentInfoTableDiv').html(response);
                        });
                        
                        $('html, body').animate({
                            scrollTop: $("#rentInfoTableDiv").offset().top
                        }, 200);
                        
                        loadPage("/tables/addRentInfo", function(response) {
                            $('#rentInfoTableDiv').html(response);
                        });
                        
                    }
                }
            }
        });
        
     });


</script>