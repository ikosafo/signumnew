<?php
extract($data);
?>
<div class="row gx-lg-3">
	<div class="col-xl-9 col-xxl-12">
		<div class="row gx-lg-3">
			<div class="col-xl-4 col-lg-4 col-sm-12">
				<div class="card overflow-hidden">
					<div class="text-center p-3 overlay-box" style="background-image: url(images/big/img1.jpg);">
						<h3 class="mt-3 mb-1 text-white"><?= $userDetails['firstName'] . ' ' . $userDetails['lastName'] ?></h3>
						<p class="text-white mb-0"><?= $userDetails['jobtitle']; ?></p>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Email Address</span> 
							<strong class="text-black"><?= $userDetails['emailAddress'] ?></strong>
						</li>
						<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Phone Number</span> 
							<strong class="text-black"><?= $userDetails['phoneNumber'] ?></strong>
						</li>
						<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Alternative Phone Number</span> 
							<strong class="text-black"><?= $userDetails['altPhoneNumber'] ?></strong>
						</li>
						<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Date of Birth</span> 
							<strong class="text-black"><?= $userDetails['dateBirth'] ?></strong>
						</li>
						<li class="list-group-item d-flex justify-content-between"><span class="mb-0">Department</span> 
							<strong class="text-black"><?= Tools::getDepartment($userDetails['department']) ?></strong>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-sm-12">
				<div class="card overflow-hidden">
					<div class="card-header">
						<h4 class="card-title">User Details</h4>
					</div>
					<div class="card-body">
						<table class="check-tbl mb-2">
							<tbody>
								<tr>
									<td><i class="las la-check-circle"></i> Address :</td>
									<td class="tb-para"><?= $userDetails['address'] ?></td>
								</tr>
								<tr>
									<td><i class="las la-check-circle"></i> Access Level :</td>
									<td class="tb-para"><?= $userDetails['accessLevel'] ?></td>
								</tr>
								<tr>
									<td><i class="las la-check-circle"></i> Security Question :</td>
									<td class="tb-para"><?= $userDetails['securityQuestion'] ?></td>
								</tr>
								<tr>
									<td><i class="las la-check-circle"></i> Security Answer :</td>
									<td class="tb-para"><?= $userDetails['securityAnswer'] ?></td>
								</tr>
								<tr>
									<td><i class="las la-check-circle"></i> Created At :</td>
									<td class="tb-para"><?= $userDetails['createdAt'] ?></td>
								</tr>
								<tr>
									<td><i class="las la-check-circle"></i> Username :</td>
									<td class="tb-para"><?= $userDetails['username'] ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				</div>

			<div class="col-xl-4 col-lg-4 col-sm-12">
				<div class="card overflow-hidden">
					<div class="card-header">
						<h4 class="card-title">Permissions</h4>
					</div>
					<div class="card-body">
						<ul>
							<?php 
							foreach ($userPermissions as $result) { 
								echo "<li>" . $result->permission . "</li>";
							}
							?>
						</ul>
					</div>	
				</div>
				
			</div>
		</div>
		<div class="text-center">
            <button id="listUsers" class="btn-sm btn btn-primary mb-3">Back to List</button>
        </div>
			
	</div>
</div>
						


<script>
    $("#listUsers").click(function() {
        loadPage("/tables/adminUsers", function(response) {
            $('#userTableDiv').html(response);
        });
    })
</script>
