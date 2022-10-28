
<!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<h3><i class="fa fa-angle-right"></i> View Product</h3>
		<div class="row mt">
			<div class="col-lg-12">
				<div class="content-panel">
					<section id="unseen">
						<table class="table table-bordered table-striped table-condensed">
							<thead>
							<tr>
								<th>Code</th>
								<th>Business Name</th>
								<th class="numeric">Phone Number</th>
								<th class="numeric">Description</th>
								<th class="numeric">Address</th>
								<th class="numeric">Edit</th>
								<th class="numeric">Delete</th>
							</tr>
							</thead>
							<tbody>
							<?php

							if (mysqli_num_rows($result) > 0) {
								while ($row = mysqli_fetch_array($result)) {
									?>
									<tr>
										<td><?=$row['id']?></td>
										<td><?=$row['name']?></td>
										<td><?=$row['phone_number']?></td>
										<td><?=$row['desc']?></td>
										<td><?=$row['address']?></td>
										<td>Edit</td>
										<td>Delete</td>
									</tr>

									<?php
								}
							}

							?>
							</tbody>
						</table>
					</section>
				</div>
				<!-- /content-panel -->
			</div>
			<!-- /col-lg-4 -->
		</div>

	</section>
	<!-- /wrapper -->

