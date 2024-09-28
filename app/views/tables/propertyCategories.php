<?php extract($data); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Categories</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-responsive-md" id="categoryTable">
                    <thead>
                        <tr>
                            <th width="10%">NO.</th>
                            <th width="30%">CATEGORY</th>
                            <th width="50%">DESCRIPTION</th>
                            <th width="10%">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1; // Initialize a counter
                        foreach ($listPropertyCategory as $result) { ?>
                            <tr>
                                <td><strong class="text-black"><?= $no++ ?></strong></td>
                                <td><?= $result->categoryName ?></td>
                                <td><?= $result->description ?></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="javascript:void(0);" class="btn btn-primary editCategory shadow btn-xs sharp me-1" catid='<?= $result->categoryId ?>'><i class="fas fa-pencil-alt"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-danger shadow btn-xs sharp"><i class="fas fa-trash"></i></a>
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

    $(document).on('click', '.editCategory', function() {
        var catid = $(this).attr('catid');
         window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });

        var formData = {};
        formData.catid = catid; 
        saveForm(formData, "/forms/propertyCategoriesEdit", function(response) {
            $('#categoryFormDiv').html(response);
        });
    });


</script>