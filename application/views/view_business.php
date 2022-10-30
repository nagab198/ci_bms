
	<!-- **********************************************************************************************************************************************************
		MAIN CONTENT
		*********************************************************************************************************************************************************** -->
	<!--main content start-->
	<section id="main-content">
		<section class="wrapper">
			<h3><i class="fa fa-angle-right"></i> View Business</h3>
			<div class="row mt">
				<div class="col-lg-12">
					<div class="content-panel">
						<section id="unseen">
							<table id="business_table" class="table table-bordered table-striped table-condensed">
								<thead>
								<tr>
									<th>Code</th>
									<th>Business Name</th>
									<th class="numeric">meta name</th>
									<th class="numeric">meta_desc</th>
									<th class="numeric">meta_keyword</th>
									<th class="numeric">address</th>
									<th class="numeric">phone_number</th>
									<th class="numeric">desc</th>
									<th class="numeric">category_id</th>
									<th class="numeric">sub_category_id</th>
									<th class="numeric">edit</th>
									<th class="numeric">delete</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($business as $row) {
									?>
									<tr>
										<td><?= $row['id'] ?></td>
										<td><?= $row['name'] ?></td>
										<td><?= $row['meta_name'] ?></td>
										<td><?= $row['meta_desc'] ?></td>
										<td><?= $row['meta_keyword'] ?></td>
										<td><?= $row['address'] ?></td>
										<td><?= $row['phone_number'] ?></td>
										<td><?= $row['desc'] ?></td>
										<td><?= $row['category_id'] ?></td>
										<td><?= $row['sub_category_id'] ?></td>
										<td>Edit</td>
										<td>Delete</td>
									</tr>
									<?php
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

		<!--main content end-->
