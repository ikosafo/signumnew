<?php extract($data); ?>

<?php
// Sort $listMaintenanceFee by phase and activity
usort($listMaintenanceFee, function ($a, $b) {
    $phaseA = Tools::propertyPhase($a->phaseid);
    $phaseB = Tools::propertyPhase($b->phaseid);
    $activityA = Tools::getActivityName($a->activityid);
    $activityB = Tools::getActivityName($b->activityid);

    // First, sort by phase
    if ($phaseA !== $phaseB) {
        return strcmp($phaseA, $phaseB);
    }

    // Then, sort by activity within the same phase
    return strcmp($activityA, $activityB);
});

// Initialize variables for rendering
$no = 1; // Counter for the NO. column
$currentPhase = '';
$currentActivity = '';
$phaseRowspan = [];
$activityRowspan = [];

// Preprocess data to calculate rowspans
foreach ($listMaintenanceFee as $result) {
    $phase = Tools::propertyPhase($result->phaseid);
    $activity = Tools::getActivityName($result->activityid);

    // Count rowspan for phases
    if (!isset($phaseRowspan[$phase])) {
        $phaseRowspan[$phase] = 0;
    }
    $phaseRowspan[$phase]++;

    // Count rowspan for activities within each phase
    if (!isset($activityRowspan[$phase][$activity])) {
        $activityRowspan[$phase][$activity] = 0;
    }
    $activityRowspan[$phase][$activity]++;
}
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Maintenance Fee</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md" id="categoryTable">
                        <thead>
                            <tr>
                                <th width="10%">NO.</th>
                                <th width="20%">PHASE</th>
                                <th width="30%">ACTIVITY</th>
                                <th width="30%">DETAIL</th>
                                <th width="20%">AMOUNT</th>
                                <th width="10%">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listMaintenanceFee as $result): 
                                $phase = Tools::propertyPhase($result->phaseid);
                                $activity = Tools::getActivityName($result->activityid);
                                $details = $result->details;
                                $amount = number_format($result->amount, 2);
                                ?>
                                <tr>
                                    <!-- NO. Cell -->
                                    <?php if ($phase !== $currentPhase): ?>
                                        <td rowspan="<?= $phaseRowspan[$phase] ?>">
                                            <?= $no++ ?>
                                        </td>
                                    <?php endif; ?>

                                    <!-- Phase Cell -->
                                    <?php if ($phase !== $currentPhase): ?>
                                        <td rowspan="<?= $phaseRowspan[$phase] ?>">
                                            <strong class="text-black"><?= $phase ?></strong>
                                        </td>
                                        <?php $currentPhase = $phase; ?>
                                        <?php $currentActivity = ''; // Reset activity for new phase ?>
                                    <?php endif; ?>

                                    <!-- Activity Cell -->
                                    <?php if ($activity !== $currentActivity): ?>
                                        <td rowspan="<?= $activityRowspan[$phase][$activity] ?>">
                                            <?= $activity ?>
                                        </td>
                                        <?php $currentActivity = $activity; ?>
                                    <?php endif; ?>

                                    <!-- Detail and Amount -->
                                    <td><?= $details ?></td>
                                    <td><?= $amount ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="btn btn-danger deleteFee shadow btn-xs sharp" feeid='<?= $result->feeid ?>'><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
  
    $(document).off('click', '.deleteFee').on('click', '.deleteFee', function() {
        var feeid = $(this).attr('feeid');
       
        var formData = {};
        formData.feeid = feeid; 
       
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
                        formData.feeid = feeid; 
                        saveForm(formData, "/delete/maintenancefee", function(response) {
                            $('#pageTableDiv').html(response);
                        });
                        
                        $('html, body').animate({
                            scrollTop: $("#pageTableDiv").offset().top
                        }, 200);
                        
                        loadPage("/tables/maintenanceFee", function(response) {
                            $('#pageTableDiv').html(response);
                        });
                        
                    }
                }
            }
        });
            
    });


</script>