<!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<h3><i class="fa fa-angle-right"></i> View Sub Categories</h3>
		<div class="row mt">
			<div class="col-lg-12">
				<div class="content-panel">
					<section id="unseen">
						<table id="sub_category_table" class="table table-bordered table-striped table-condensed">
							<thead>
							<tr>
								<th>ID</th>
								<th>Category Name</th>
								<th>Meta Name</th>
								<th>Meta Description</th>
								<th>Meta keywords</th>
								<th>category_id</th>
								<th class="numeric">Edit</th>
								<th class="numeric">Delete</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($sub_category as $row) {
								?>
								<tr>
									<td><?= $row['id'] ?></td>
									<td><?= $row['name'] ?></td>
									<td><?= $row['meta_name'] ?></td>
									<td><?= $row['meta_desc'] ?></td>
									<td><?= $row['category_id'] ?></td>
									<td><?= $row['meta_keyword'] ?></td>
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
