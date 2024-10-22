<?php extract($data); ?>
<div id="clientDetailsDiv"></div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Clients</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-responsive-md" id="clientTable">
                    <thead>
                        <tr>
                            <th width="10%">NO.</th>
                            <th width="20%">FULL NAME</th>
                            <th width="20%">EMAIL ADDRESS</th>
                            <th width="20%">TELEPHONE</th>
                            <th width="20%">OCCUPATION</th>
                            <th width="10%">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1; // Initialize a counter
                        foreach ($listClients as $result) { ?>
                            <tr>
                                <td><strong class="text-black"><?= $no++ ?></strong></td>
                                <td><?= $result->fullName ?></td>
                                <td><?= $result->emailAddress ?></td>
                                <td><?= $result->phoneNumber ?></td>
                                <td><?= $result->occupation ?></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="javascript:void(0);" class="btn btn-success rentInfo" clientid='<?= $result->clientid ?>'>Rent Info</a>
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
<div id="rentInfoDiv"></div>

<script>
    $("#clientTable").DataTable({
        language: {
            paginate: {
            next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
            previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
            }
        }
    });

    $(document).on('click', '.rentInfo', function() {
        var clientid = $(this).attr('clientid');
        $('html, body').animate({
            scrollTop: $("#rentInfoDiv").offset().top
        }, 2000);

        var formData = {};
        formData.clientid = clientid; 
        saveForm(formData, "/forms/rentalInformation", function(response) {
            $('#rentInfoDiv').html(response);
        });
    });


</script>