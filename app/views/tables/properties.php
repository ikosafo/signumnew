<?php extract($data); ?>
<div id="propertyDetailsDiv"></div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Properties</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-responsive-md" id="propertyTable">
                    <thead>
                        <tr>
                            <th width="10%">NO.</th>
                            <th width="20%">PROPERTY NAME</th>
                            <th width="20%">PROPERTY TYPE</th>
                            <th width="20%">CATEGORY</th>
                            <th width="20%">LOCATION</th>
                            <th width="20%">FURNISHING</th>
                            <th width="10%">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1; // Initialize a counter
                        foreach ($listProperties as $result) { ?>
                            <tr>
                                <td><strong class="text-black"><?= $no++ ?></strong></td>
                                <td><?= $result->propertyName ?></td>
                                <td><?= $result->propertyType ?></td>
                                <td><?= Tools::categoryName($result->propertyCategory) ?></td>
                                <td><?= $result->location ?></td>
                                <td><?= $result->furnishingStatus ?></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="javascript:void(0);" class="btn btn-primary viewProperty shadow btn-xs sharp me-1" propertyid='<?= $result->propertyId ?>'><i class="fas fa-eye"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-warning editProperty shadow btn-xs sharp me-1" propertyid='<?= $result->propertyId ?>'><i class="fas fa-pencil-alt"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-danger deleteProperty shadow btn-xs sharp" propertyid='<?= $result->propertyId ?>'><i class="fas fa-trash"></i></a>
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
    $("#propertyTable").DataTable({
        language: {
            paginate: {
            next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
            previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
            }
        }
    });

   /*  $(document).on('click', '.viewProperty', function() {
        var propertyid = $(this).attr('propertyid');
         window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });

        var formData = {};
        formData.propertyid = propertyid; 
        saveForm(formData, "/forms/propertyDetails", function(response) {
            $('#propertyDetailsDiv').html(response);
        });
    }); */

    $(document).on('click', '.viewProperty', function() {
        var propertyid = $(this).attr('propertyid');
        var hash = btoa(btoa(btoa(propertyid)));
        window.location.href = urlroot + "/pages/viewProperty?propertyid=" + hash;
    });
    

    $(document).on('click', '.editProperty', function() {
        var propertyid = $(this).attr('propertyid');
        var hash = btoa(btoa(btoa(propertyid)));
        window.location.href = urlroot + "/pages/editProperty?propertyid=" + hash;
    });


    $(document).off('click', '.deleteProperty').on('click', '.deleteProperty', function() {
        var propertyid = $(this).attr('propertyid');
       
        var formData = {};
        formData.propertyid = propertyid; 
        //alert(formData.propertyid);
       
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
                        formData.propertyid = propertyid; 
                        saveForm(formData, urlroot + "/delete/property", function(response) {
                            $('#propertyTableDiv').html(response);
                        });
                        //$("#adminUser").DataTable().ajax.reload(null, false);
                        $('html, body').animate({
                            scrollTop: $("#propertyTableDiv").offset().top
                        }, 200);
                        
                        loadPage(urlroot + "/tables/properties", function(response) {
                            $('#propertyTableDiv').html(response);
                        });
                        
                    }
                }
            }
        });
            
    });


</script>