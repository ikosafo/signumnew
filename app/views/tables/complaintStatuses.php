<?php extract($data); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Statuses that are <strong><?= strtoupper($status)?></strong></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-responsive-md" id="complaintTable">
                    <thead>
                        <tr>
                            <th width="10%">NO.</th>
                            <th width="20%">ISSUE TRACKING NO.</th>
                            <th width="20%">PROPERTY NAME</th>
                            <th width="20%">COMPLAINT TYPE</th>
                            <th width="20%">CATEGORY</th>
                            <th width="20%">STATUS</th>
                            <th width="10%">VERIFY RESOLUTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1; // Initialize a counter
                        foreach ($listComplaints as $result) { ?>
                            <tr>
                                <td><strong class="text-black"><?= $no++ ?></strong></td>
                                <td><?= $result->issueTrackingNumber ?></td>
                                <td><?= Tools::propertyClient($result->propertyid) ?></td>
                                <td><?= $result->complaintType ?></td>
                                <td><?= $result->issueCategory ?></td>
                                <td><?= !$result->resolution ? 'Pending': $result->resolution  ?></td>
                                <td>
                                    <?php
                                        if ($result->verifyRemarks != "") {
                                            echo '<button type="button" id="viewResolution" class="viewResolution btn btn-success next2 btn-sm" i_index="' . $result->complaintid . '" style="margin-left:10px">View Feedback</button>';
                                        }
                                        else if ($result->resolution != "" && $result->resolution != "Pending") {
                                            echo '<button type="button" id="verifyResolution" class="verifyResolution btn btn-warning next2 btn-sm" i_index="' . $result->complaintid . '" style="margin-left:10px">Verify Resolution</button>';
                                        }
                                        else {
                                            echo "Pending Resolution";
                                        }
                                    ?>
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
<div id="verifyIssue"></div>


<script>
    $("#complaintTable").DataTable({
        language: {
            paginate: {
            next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
            previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
            }
        }
    });


    $(document).on('click', '.viewComplaint', function() {
        var complaintid = $(this).attr('complaintid');
        var hash = btoa(btoa(btoa(complaintid)));
        window.location.href = urlroot + "/pages/viewComplaint?complaintid=" + hash;
    });


    $(document).on('click', '.verifyResolution', function() {
        var idIndex = $(this).attr('i_index');
        //alert(idIndex);
        
        $('html, body').animate({
                scrollTop: $("#verifyIssue").offset().top
        }, 2000);

        var formData = {
            id_index: idIndex
        };
        var url = "/forms/verifyResolution";
        var successCallback = function(response) {
            $('#verifyIssue').html(response);
        };
        saveForm(formData, url, successCallback);
       
    });



    $(document).on('click', '.viewResolution', function() {
        var idIndex = $(this).attr('i_index');
        
        $('html, body').animate({
                scrollTop: $("#verifyIssue").offset().top
        }, 2000);
        //alert(idIndex);

        var formData = {
            id_index: idIndex
        };
        var url = "/forms/viewResolution";
        var successCallback = function(response) {
            $('#verifyIssue').html(response);
        };
        saveForm(formData, url, successCallback);
       
    });
    

</script>