<?php extract($data); ?>
<div id="clientDetailsDiv"></div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Rent Information</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-responsive-md" id="RentInfoTable">
                    <thead>
                        <tr>
                            <th width="10%">NO.</th>
                            <th width="20%">TENANT</th>
                            <th width="20%">PROPERTY</th>
                            <th width="20%">START <br> DATE</th>
                            <th width="20%">END <br> DATE</th>
                            <th width="10%">LEASE <br> TYPE</th>
                            <th width="20%">RENT <br> AMOUNT</th>
                            <th width="20%">PAYMENT <br> STATUS</th>
                            <th width="25%">RENT DUE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1; // Initialize a counter
                        foreach ($listRentInformation as $result) { ?>
                            <tr>
                                <td><strong class="text-black"><?= $no++ ?></strong></td>
                                <td><?= Tools::clientName($result->clientid) ?></td>
                                <td><?= Tools::propertyClient($result->propertyid). '<br><small><strong>'. Tools::propertyPhase($result->phaseid) . '</strong></small>'  ?></td>
                                <td><?= $result->startDate ?></td>
                                <td><?= $result->endDate ?></td>
                                <td><?= $result->leaseType ?></td>
                                <td><?= number_format($result->rentAmount,2) ?></td>
                                <td>
                                        <div class="d-flex">
                                            <?php if (!in_array(strtolower($result->paymentStatus), ['success', 'successful'])) { ?>
                                                <span class="bgl-danger text-danger rounded p-1 ps-2 pe-2 font-w600 fs-12 d-inline-block mb-2 mb-sm-3">Not Paid</span>
                                            <?php } else { ?>
                                                <span class="bgl-success text-success rounded p-1 ps-2 pe-2 font-w600 fs-12 d-inline-block mb-2 mb-sm-3">Paid</span>
                                            <?php } ?>
                                        </div>
                                    </td>
                                <td>
                                    <?php 
                                        $endDate = new DateTime($result->endDate);
                                        $currentDate = new DateTime(date('Y-m-d'));
                                        $interval = $currentDate->diff($endDate);

                                        // Determine the class based on the interval value
                                        $days = (int)$interval->format('%R%a'); // Convert to integer for comparison
                                        $class = $days >= 0 ? 'bgl-success text-success' : 'bgl-danger text-danger';
                                        $text = $days >= 0 ? "In {$interval->format('%a day(s)')}" : "{$interval->format('%a day(s) ago')}";
                                    ?>
                                    <span class="<?= $class ?> rounded p-1 ps-2 pe-2 font-w600 fs-12 d-inline-block mb-2 mb-sm-3">
                                        <?= $text ?>
                                    </span>

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
    $("#RentInfoTable").DataTable({
        language: {
            paginate: {
            next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
            previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
            }
        }
    });

    $(document).on('click', '.editRentInfo', function() {
        var rentid = $(this).attr('rentid');
        var hash = btoa(btoa(btoa(rentid)));
        window.location.href = urlroot + "/pages/editRentInfo?rentid=" + hash;
    });

    $(document).on('click', '.viewRentInfo', function() {
        var rentid = $(this).attr('rentid');
        var hash = btoa(btoa(btoa(rentid)));
        window.location.href = urlroot + "/pages/viewRentInfo?rentid=" + hash;
    });


    $(document).off('click', '.deleteRentInfo').on('click', '.deleteRentInfo', function() {
        var rentid = $(this).attr('rentid');
       
        var formData = {};
        formData.rentid = rentid; 
       
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
                        formData.rentid = rentid; 
                        saveForm(formData, urlroot + "/delete/rentInfo", function(response) {
                            $('#rentInfoTableDiv').html(response);
                        });
                        
                        $('html, body').animate({
                            scrollTop: $("#rentInfoTableDiv").offset().top
                        }, 200);
                        
                        loadPage("/tables/addRentInfo", function(response) {
                            $('#rentInfoTableDiv').html(response);
                        });
                        
                    }
                }
            }
        });
        
     });


</script>