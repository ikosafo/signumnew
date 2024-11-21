<?php extract($data); 

$groupedPermissions = [];
foreach ($listPermissions as $row) {
    $groupedPermissions[$row->uuid][] = [
        'id' => $row->id,
        'permission' => $row->permission,
    ];
}

?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Users</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered table-responsive-md" id="">
                    <thead>
                            <tr>
                                <th>Name</th>
                                <th>Permission</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($groupedPermissions)) : ?>
                                <?php foreach ($groupedPermissions as $uuid => $perms) : ?>
                                    <?php foreach ($perms as $index => $permData) : ?>
                                        <tr>
                                            <?php if ($index === 0) : ?>
                                                <td rowspan="<?php echo count($perms); ?>">
                                                    <?php echo htmlspecialchars(Tools::getNamebyuuid($uuid)); ?>
                                                </td>
                                            <?php endif; ?>
                                            <td><?php echo htmlspecialchars($permData['permission']); ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="javascript:void(0);" class="btn btn-primary viewUser shadow btn-xs sharp me-1" uuid='<?= $uuid ?>'><i class="fas fa-eye"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-danger deleteUser shadow btn-xs sharp" id='<?= $permData['id'] ?>'><i class="fas fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="3">No permissions found.</td>
                                </tr>
                            <?php endif; ?>
                    </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>
</div>
<div id="userDetailsDiv"></div>

<script>
   
    $(document).on('click', '.viewUser', function() {
        var uuid = $(this).attr('uuid');
       
        $('html, body').animate({
            scrollTop: $("#userDetailsDiv").offset().top
        }, 500);

        var formData = {};
        formData.uuid = uuid; 
        saveForm(formData, "/forms/adminUserDetails", function(response) {
            $('#userDetailsDiv').html(response);
        });
    });

    $(document).off('click', '.deleteUser').on('click', '.deleteUser', function() {
        var id = $(this).attr('id');
       
        var formData = {};
        formData.id = id; 
       
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
                                formData.id = id; 
                                saveForm(formData, "/delete/userPermission", function(response) {
                                    $('#userTableDiv').html(response);
                                });
                                //$("#adminUser").DataTable().ajax.reload(null, false);
                                $('html, body').animate({
                                    scrollTop: $("#userTableDiv").offset().top
                                }, 200);
                                
                                loadPage("/tables/userPermissions", function(response) {
                                    $('#userTableDiv').html(response);
                                });
                               
                            }
                        }
                    }
                });
            
    });



</script>