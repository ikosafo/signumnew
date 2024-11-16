<?php
extract($data);
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            
            <div class="card-body">
                <form id="needs-validation1" novalidate="" autocomplete="off">
                    <div class="row">
                       
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-label required">Remarks</label>
                            <select id="verifyRemarks" class="form-control" required>
                                <option value=""></option>
                                <option value="Fully Resolved and Satisfied">Fully Resolved and Satisfied</option>
                                <option value="Resolved, but Partially Satisfied">Resolved, but Partially Satisfied</option>
                                <option value="Resolved, but Additional Action Needed">Resolved, but Additional Action Needed</option>
                                <option value="Not Resolved">Not Resolved</option>
                                <option value="Resolution Pending Verification">Resolution Pending Verification</option>
                                <option value="Satisfied with Resolution After Follow-Up">Satisfied with Resolution After Follow-Up</option>
                                <option value="Resolved, but Issue Recurring">Resolved, but Issue Recurring</option>
                                <option value="Resolution Not Acceptable">Resolution Not Acceptable</option>
                                <option value="No Feedback at This Time">No Feedback at This Time</option>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-label">Feedback</label>
                            <textarea class="form-control" rows="10" id="verifyFeedback" placeholder="Enter description"></textarea>
                        </div>
                       
                       
                        <div class="next-btn py-4 d-flex col-sm-12 justify-content-center">
                            <button type="submit" id="saveVerification" class="btn btn-primary next2 btn-sm">Save</button>
                        </div>
                    </div>
                   
                    

                </form>
            </div>
                
        </div>
    </div>
</div>

<script>

    $("#verifyRemarks").select2({
        placeholder:"Select Remark"
    });

    $("#saveVerification").on("click", function(event) {
        event.preventDefault(); 

        var formData  = {
            verifyRemarks: $("#verifyRemarks").val(),
            verifyFeedback: $("#verifyFeedback").val(),
            idIndex: '<?php echo $id_index; ?>'
        };

        var url = urlroot + "/client/saveVerification";

        var successCallback = function(response) {
            //alert(response);
             $.notify("Form submitted successfully", {
                    position: "top center",
                    className: "success"
                });

            setTimeout(function() {
                location.reload();
            }, 500);
        };

        var validateRentForm = function(formData) {
            var error = '';
            if (!formData.verifyRemarks) {
                error += 'Remarks is required\n';
                $("#verifyRemarks").focus();
            }

            return error;
        };
        saveForm(formData, url, successCallback, validateRentForm);
    });
    
</script>
