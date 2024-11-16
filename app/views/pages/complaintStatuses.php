<?php include ('includes/headerClient.php'); ?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">COMPLAINTS</a></li>
						<li class="breadcrumb-item active"><a href="#">Complaints Statuses</a></li>
					</ol>
                </div>
                <!-- row -->

                <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Select Status</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form class="d-sm-flex align-items-center">

                                    <div class="form-group col-md-6 mx-sm-3 col-sm-12">
                                            <select id="resolutionStatus" class="form-control" required>
                                                <option value=""></option>
                                                <option value="">PENDING</option>
                                                <option value="Pending">PENDING</option>
                                                <option value="Resolved">RESOLVED</option>
                                                <option value="In Review">IN REVIEW</option>
                                                <option value="Unresolved">UNRESOLVED</option>
                                                <option value="Escalated">ESCALATED</option>
                                                <option value="Awaiting Client Response">AWAITING CLIENT RESPONSE</option>
                                                <option value="Closed">CLOSED</option>
                                                <option value="Partially Resolved">PARTIALLY RESOLVED</option>
                                                <option value="Reopened">REOPENED</option>
                                                <option value="Not Applicable">NOT APPLICABLE</option>
                                                <option value="Deferred">DEFERRED</option>
                                                <option value="Rejected">REJECTED</option>
                                            </select>
                                        </div>

                                        <button type="button" id="searchStatus" class="btn btn-primary mb-3">Search Status</button>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
               
                <div id="pageTableDiv"></div>         
               
            </div>
        </div>

<?php include ('includes/footer.php'); ?>

<script>	

$("#resolutionStatus").select2({
    placeholder: "Select Status"
});

$("#searchStatus").click(function() {
    var selectedStatus = $("#resolutionStatus").val();
    loadPage("/tables/complaintStatuses?status=" + encodeURIComponent(selectedStatus), function(response) {
        $('#pageTableDiv').html(response);
    });
});

   
</script>