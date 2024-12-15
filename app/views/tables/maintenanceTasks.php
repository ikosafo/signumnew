<?php extract($data); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Complaints</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md" id="complaintTable">
                        <thead>
                            <tr>
                                <th width="10%">NO.</th>
                                <th width="20%">CLIENT</th>
                                <th width="20%">PROPERTY NAME</th>
                                <th width="20%">COMPLAINT TYPE</th>
                                <th width="20%">CATEGORY</th>
                                <th width="20%">LOCATION</th>
                                <th width="10%">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1; // Initialize a counter
                            foreach ($listMaintenanceTasks as $result) { ?>
                                <tr>
                                    <td><strong class="text-black"><?= $no++ ?></strong></td>
                                    <td><?= Tools::clientName($result->clientid) ?></td>
                                    <td><?= Tools::propertyClient(Tools::getClientProperty($result->clientid)) ?></td>
                                    <td><?= $result->complaintType ?></td>
                                    <td><?= $result->issueCategory ?></td>
                                    <td><?= $result->location ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="btn btn-primary viewTask shadow btn-xs sharp me-1" complaintid='<?= $result->complaintid ?>'><i class="fas fa-eye"></i></a>
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
<div id="pageDetailsDiv"></div>

<script>
    $("#complaintTable").DataTable({
        language: {
            paginate: {
            next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
            previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
            }
        }
    });


    $(document).on('click', '.viewTask', function() {
        var complaintid = $(this).attr('complaintid');
        var hash = btoa(btoa(btoa(complaintid)));
        window.location.href = urlroot + "/pages/viewTask?complaintid=" + hash;
    });
    

</script>