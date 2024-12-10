<?php $uuid = Tools::generateUUID(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Activity</h4>
            </div>
            <div class="card-body wizard-box">
            <form class="row" id="needs-validation" novalidate="" autocomplete="off">
                <div class="mb-3 col-md-6 col-sm-12">
                    <label class="form-label required">Activity Name</label>
                    <input type="text" name="activityName" class="form-control" 
                    placeholder="Enter Activity" required>
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" placeholder="Brief description of the activity" rows="3"></textarea>
                </div>
                <div class="col-sm-12 text-center">
                    <button type="submit" id="saveActivity" class="btn btn-primary btn-sm">Add Activity</button>
                </div>
            </form>

            </div>
        </div>
    </div>
</div>

<script>
    $("#saveActivity").on("click", function() {
            event.preventDefault(); 

            var formData = {
                activityName: $("input[name='activityName']").val(),
                description: $("textarea[name='description']").val(),
                uuid: '<?php echo $uuid ?>'
            };
            var url = urlroot + "/property/saveActivity";

            var successCallback = function(response) {
                if (response == 1) {
                    $.notify("Activity saved", {
                            position: "top center",
                            className: "success"
                    });
                    loadPage("/forms/propertyActivities", function(response) {
                        $('#activityFormDiv').html(response);
                    });

                    loadPage("/tables/propertyActivities", function(response) {
                        $('#activityTableDiv').html(response);
                    });
                }
                else {
                    $.notify("Activity already exist", {
                            position: "top center",
                            className: "error"
                    });
                }
              
            };

            var validateForm = function(formData) {
                var error = '';
                if (!formData.activityName) {
                    error += 'Activity Name is required\n';
                    $("input[name='activityName']").focus();
                }
                
                return error;
            };

            saveForm(formData, url, successCallback, validateForm);
        });

</script>