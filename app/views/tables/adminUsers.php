<?php extract($data); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Users</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-responsive-md" id="adminUser">
                    <thead>
                        <tr>
                            <th width="10%">NO.</th>
                            <th width="20%">FULL NAME</th>
                            <th width="20%">EMAIL ADDRESS</th>
                            <th width="20%">PHONE NUMBER</th>
                            <th width="20%">DEPARTMENT</th>
                            <th width="20%">USER TYPE</th>
                            <th width="10%">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1; // Initialize a counter
                        foreach ($listAdminUsers as $result) { ?>
                            <tr>
                                <td><strong class="text-black"><?= $no++ ?></strong></td>
                                <td><?= $result->firstName. ' '. $result->lastName ?></td>
                                <td><?= $result->emailaddress ?></td>
                                <td><?= $result->phoneNumber ?></td>
                                <td><?= Tools::getDepartment($result->department) ?></td>
                                <td><?= $result->accessLevel ?></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="javascript:void(0);" class="btn btn-primary viewUser shadow btn-xs sharp me-1" userid='<?= $result->id ?>'><i class="fas fa-eye"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-warning editUser shadow btn-xs sharp me-1" userid='<?= $result->id ?>'><i class="fas fa-pencil-alt"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-danger deleteUser shadow btn-xs sharp" userid='<?= $result->id ?>'><i class="fas fa-trash"></i></a>
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
<div id="userDetailsDiv"></div>

<script>
    $("#adminUser").DataTable({
        language: {
            paginate: {
            next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
            previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
            }
        }
    });

    $(document).on('click', '.viewUser', function() {
        var userid = $(this).attr('userid');
        $('html, body').animate({
            scrollTop: $("#userDetailsDiv").offset().top
        }, 500);

        var formData = {};
        formData.userid = userid; 
        saveForm(formData, "/forms/adminUserDetails", function(response) {
            $('#userDetailsDiv').html(response);
        });
    });

    $(document).on('click', '.editUser', function() {
        var userid = $(this).attr('userid');
        var hash = btoa(btoa(btoa(userid)));
        window.location.href = urlroot + "/pages/editUser?userid=" + hash;
    });

    
    $(document).off('click', '.deleteUser').on('click', '.deleteUser', function() {
        var userid = $(this).attr('userid');
       
        var formData = {};
        formData.userid = userid; 
       
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
                                formData.userid = userid; 
                                saveForm(formData, "/delete/adminUser", function(response) {
                                    $('#userTableDiv').html(response);
                                });
                                //$("#adminUser").DataTable().ajax.reload(null, false);
                                $('html, body').animate({
                                    scrollTop: $("#userTableDiv").offset().top
                                }, 200);
                                
                                loadPage("/tables/adminUsers", function(response) {
                                    $('#userTableDiv').html(response);
                                });
                               
                            }
                        }
                    }
                });
            
    });

</script>