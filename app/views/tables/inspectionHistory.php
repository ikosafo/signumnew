<?php extract($data); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Complaints</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-responsive-md" id="inspectionTable">
                    <thead>
                        <tr>
                            <th width="10%">NO.</th>
                            <th width="20%">PROPERTY NAME</th>
                            <th width="20%">INSPECTION TYPE</th>
                            <th width="20%">DATE</th>
                            <th width="20%">APARTMENT</th>
                            <th width="10%">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($listInspection as $result) { ?>
                            <tr>
                                <td><strong class="text-black"><?= $no++ ?></strong></td>
                                <td><?= Tools::propertyClient($result->propertyid) ?></td>
                                <td><?= $result->inspectionType ?></td>
                                <td><?= $result->inspectionDate ?></td>
                                <td><?= $result->unitNumber ?></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="javascript:void(0);" class="btn btn-primary viewInspectionDetail shadow btn-xs sharp me-1" inspectionid='<?= $result->id ?>'><i class="fas fa-eye"></i></a>
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
    $("#inspectionTable").DataTable({
        language: {
            paginate: {
            next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
            previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
            }
        }
    });


    $(document).on('click', '.viewInspectionDetail', function() {
        var inspectionid = $(this).attr('inspectionid');
        var hash = btoa(btoa(btoa(inspectionid)));
        window.location.href = urlroot + "/pages/viewInspectionDetail?inspectionid=" + hash;
    });
    

</script>