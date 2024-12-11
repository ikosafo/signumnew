<?php extract($data);
$uuid = Tools::generateUUID();
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Maintenance Fee</h4>
            </div>
            <div class="card-body wizard-box">
            <form class="row" id="needs-validation" novalidate="" autocomplete="off">
                <div class="form-group col-md-6 col-sm-12">
                    <label class="form-label required">Phase</label>
                    <select id="phaseName" class="default-select form-control wide" required>
                        <option></option>
                        <?php foreach ($listPhase as $record): ?>
                            <option value="<?= $record->phaseId ?>"><?= $record->phaseName ?></option>
                        <?php endforeach; ?>
                        
                    </select>
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label class="form-label required">Activity</label>
                    <select id="activityName" class="default-select form-control wide" required>
                        <option></option>
                        <?php foreach ($listActivity as $record): ?>
                            <option value="<?= $record->activityId ?>"><?= $record->activityName ?></option>
                        <?php endforeach; ?>
                        
                    </select>
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label class="form-label required">Details</label>
                    <textarea id="details" class="form-control" placeholder="Enter Details" required></textarea>
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label class="form-label required">Amount</label>
                    <input type="text" id="amount" class="form-control" onkeypress="allowTwoDecimalPlaces(event)" placeholder="Enter Amount" required>
                </div>
                <div class="col-sm-12 text-center">
                    <button type="submit" id="saveFee" class="btn btn-primary btn-sm">Add Fee</button>
                </div>
            </form>

            </div>
        </div>
    </div>
</div>

<script>

    $("#phaseName").select2({
        placeholder: "Select Phase"
    })

    $("#activityName").select2({
        placeholder: "Select Activity"
    })

    $("#saveFee").on("click", function() {
        event.preventDefault(); 

        var formData = {
            phaseName: $("#phaseName").val(),
            amount: $("#amount").val(),
            activityName: $("#activityName").val(),
            details: $("#details").val(),
            uuid: '<?php echo $uuid ?>'
        };
        var url = urlroot + "/property/saveMaintenanceFee";

        var successCallback = function(response) {
            if (response == 1) {
                $('html, body').animate({
                    scrollTop: $("#pageTableDiv").offset().top
                }, 200);
                $.notify("Fee saved", {
                        position: "top center",
                        className: "success"
                });
                loadPage("/forms/maintenanceFee", function(response) {
                    $('#pageFormDiv').html(response);
                });

                loadPage("/tables/maintenanceFee", function(response) {
                    $('#pageTableDiv').html(response);
                });
            }
            else {
                $.notify("Phase maintenance fee already exist", {
                        position: "top center",
                        className: "error"
                });
            }
            
        };

        var validateForm = function(formData) {
            var error = '';
            if (!formData.phaseName) {
                error += 'Phase is required\n';
                $("#phaseName").focus();
            }
            if (!formData.activityName) {
                error += 'Activity is required\n';
                $("#activityName").focus();
            }
            if (!formData.details) {
                error += 'Detail is required\n';
                $("#details").focus();
            }
            if (!formData.amount) {
                error += 'Amount is required\n';
                $("#amount").focus();
            }
            
            return error;
        };

        saveForm(formData, url, successCallback, validateForm);
    });

</script>