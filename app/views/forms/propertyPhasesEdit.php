<?php 
extract($data);
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Phase</h4>
            </div>
            <div class="card-body wizard-box">
            <form class="row" id="needs-validation" novalidate="" autocomplete="off">
                <div class="mb-3 col-md-6 col-sm-12">
                    <label class="form-label required">Phase Name</label>
                    <input type="text" name="phaseName" class="form-control" value="<?= $phaseName ?>"
                    placeholder="Enter Phase" required>
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" placeholder="Brief description of the phase" rows="3"><?= $description ?></textarea>
                </div>
                <div class="col-sm-12 text-center">
                    <button type="submit" id="savePhase" class="btn btn-warning btn-sm">Update Phase</button>
                    <button type="type" id="cancelForm" class="btn btn-danger btn-sm">Cancel</button>
                </div>
            </form>

            </div>
        </div>
    </div>
</div>

<script>
    $("#savePhase").on("click", function() {
            event.preventDefault(); 

            var formData = {
                phaseName: $("input[name='phaseName']").val(),
                description: $("textarea[name='description']").val(),
                uuid: '<?php echo $uuid ?>'
            };
            var url = urlroot + "/property/savePhase";

            var successCallback = function(response) {
                if (response == 1 || response == 3) {
                    $('html, body').animate({
                        scrollTop: $("#phaseTableDiv").offset().top
                    }, 200);
                    $.notify("Phase updated", {
                            position: "top center",
                            className: "success"
                    });
                    loadPage("/forms/propertyPhases", function(response) {
                        $('#phaseFormDiv').html(response);
                    });

                    loadPage("/tables/propertyPhases", function(response) {
                        $('#phaseTableDiv').html(response);
                    });
                }
                else {
                    $.notify("Phase already exist", {
                            position: "top center",
                            className: "error"
                    });
                }
              
            };

            var validateForm = function(formData) {
                var error = '';
                if (!formData.phaseName) {
                    error += 'Phase Name is required\n';
                    $("input[name='phaseName']").focus();
                }
                
                return error;
            };

            saveForm(formData, url, successCallback, validateForm);
        });


        $('#cancelForm').on("click", function(e) { 
            e.preventDefault();
            loadPage("/forms/propertyPhases", function(response) {
                $('#phaseFormDiv').html(response);
            });
        });

</script>