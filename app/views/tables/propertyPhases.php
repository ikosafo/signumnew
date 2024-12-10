<?php extract($data); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Phases</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-responsive-md" id="phaseTable">
                    <thead>
                        <tr>
                            <th width="10%">NO.</th>
                            <th width="30%">PHASE</th>
                            <th width="50%">DESCRIPTION</th>
                            <th width="10%">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1; // Initialize a counter
                        foreach ($listPropertyPhases as $result) { ?>
                            <tr>
                                <td><strong class="text-black"><?= $no++ ?></strong></td>
                                <td><?= $result->phaseName ?></td>
                                <td><?= $result->description ?></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="javascript:void(0);" class="btn btn-primary editPhase shadow btn-xs sharp me-1" phaseid='<?= $result->phaseId ?>'><i class="fas fa-pencil-alt"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-danger deletePhase shadow btn-xs sharp" phaseid='<?= $result->phaseId ?>'><i class="fas fa-trash"></i></a>
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
    $("#phaseTable").DataTable({
        language: {
            paginate: {
            next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
            previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
            }
        }
    });

    $(document).on('click', '.editPhase', function() {
        var phaseid = $(this).attr('phaseid');
         window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });

        var formData = {};
        formData.phaseid = phaseid; 
        saveForm(formData, "/forms/propertyPhasesEdit", function(response) {
            $('#phaseFormDiv').html(response);
        });
    });

    $(document).off('click', '.deletePhase').on('click', '.deletePhase', function() {
        var phaseid = $(this).attr('phaseid');
       
        var formData = {};
        formData.phaseid = phaseid; 
       
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
                        formData.phaseid = phaseid; 
                        saveForm(formData, "/delete/propertyPhase", function(response) {
                            $('#phaseTableDiv').html(response);
                        });
                        //$("#phaseTable").DataTable().ajax.reload(null, false);
                        $('html, body').animate({
                            scrollTop: $("#phaseTableDiv").offset().top
                        }, 200);
                        
                        loadPage("/tables/propertyPhases", function(response) {
                            $('#phaseTableDiv').html(response);
                        });
                        
                    }
                }
            }
        });
            
    });


</script>