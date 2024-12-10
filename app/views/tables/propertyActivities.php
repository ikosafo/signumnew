<?php extract($data); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Activities</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-responsive-md" id="activityTable">
                    <thead>
                        <tr>
                            <th width="10%">NO.</th>
                            <th width="30%">ACTIVITY</th>
                            <th width="50%">DESCRIPTION</th>
                            <th width="10%">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1; // Initialize a counter
                        foreach ($listPropertyActivity as $result) { ?>
                            <tr>
                                <td><strong class="text-black"><?= $no++ ?></strong></td>
                                <td><?= $result->activityName ?></td>
                                <td><?= $result->description ?></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="javascript:void(0);" class="btn btn-primary editActivity shadow btn-xs sharp me-1" activityid='<?= $result->activityId ?>'><i class="fas fa-pencil-alt"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-danger deleteActivity shadow btn-xs sharp" activityid='<?= $result->activityId ?>'><i class="fas fa-trash"></i></a>
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
    $("#activityTable").DataTable({
        language: {
            paginate: {
            next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
            previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
            }
        }
    });

    $(document).on('click', '.editActivity', function() {
        var activityid = $(this).attr('activityid');
         window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });

        var formData = {};
        formData.activityid = activityid; 
        saveForm(formData, "/forms/propertyActivitiesEdit", function(response) {
            $('#activityFormDiv').html(response);
        });
    });

    $(document).off('click', '.deleteActivity').on('click', '.deleteActivity', function() {
        var activityid = $(this).attr('activityid');
       
        var formData = {};
        formData.activityid = activityid; 
       
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
                        formData.activityid = activityid; 
                        saveForm(formData, "/delete/propertyActivity", function(response) {
                            $('#activityTableDiv').html(response);
                        });
                        //$("#activityTable").DataTable().ajax.reload(null, false);
                        $('html, body').animate({
                            scrollTop: $("#activityTableDiv").offset().top
                        }, 200);
                        
                        loadPage("/tables/propertyActivities", function(response) {
                            $('#activityTableDiv').html(response);
                        });
                        
                    }
                }
            }
        });
            
    });


</script>