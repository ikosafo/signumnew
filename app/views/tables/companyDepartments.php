<?php extract($data); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Departments</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-responsive-md" id="companyDepartment">
                    <thead>
                        <tr>
                            <th width="10%">NO.</th>
                            <th width="30%">DEPARTMENT</th>
                            <th width="50%">DESCRIPTION</th>
                            <th width="10%">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1; // Initialize a counter
                        foreach ($listCompanyDepartments as $result) { ?>
                            <tr>
                                <td><strong class="text-black"><?= $no++ ?></strong></td>
                                <td><?= $result->departmentName ?></td>
                                <td><?= $result->description ?></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="javascript:void(0);" class="btn btn-primary editDepartment shadow btn-xs sharp me-1" deptid='<?= $result->departmentId ?>'><i class="fas fa-pencil-alt"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-danger deleteDepartment shadow btn-xs sharp" deptid='<?= $result->departmentId ?>'><i class="fas fa-trash"></i></a>
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
    $("#companyDepartment").DataTable({
        language: {
            paginate: {
            next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
            previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
            }
        }
    });

    $(document).on('click', '.editDepartment', function() {
        var deptid = $(this).attr('deptid');
         window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });

        var formData = {};
        formData.deptid = deptid; 
        saveForm(formData, "/forms/companyDepartmentsEdit", function(response) {
            $('#departmentFormDiv').html(response);
        });
    });

    $(document).off('click', '.deleteDepartment').on('click', '.deleteDepartment', function() {
        var deptid = $(this).attr('deptid');
       
        var formData = {};
        formData.deptid = deptid; 
       
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
                                formData.deptid = deptid; 
                                saveForm(formData, "/delete/companyDepartment", function(response) {
                                    $('#companyDepartmentDiv').html(response);
                                });
                                //$("#companyDepartment").DataTable().ajax.reload(null, false);
                                $('html, body').animate({
                                    scrollTop: $("#companyDepartmentDiv").offset().top
                                }, 200);
                                
                                loadPage("/tables/companyDepartments", function(response) {
                                    $('#companyDepartmentDiv').html(response);
                                });
                               
                            }
                        }
                    }
                });
            
    });


</script>