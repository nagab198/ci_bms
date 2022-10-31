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
						</table>
					</section>
				</div>
				<!-- /content-panel -->
			</div>
			<!-- /col-lg-4 -->
		</div>

		<div class="modal fade" tabindex="-1" role="dialog" id="deleteSubCategoryModal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
									aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Remove sub Category</h4>
					</div>
					<div class="modal-body">
						<div id="remove-messages"></div>
						<p>Do you really want to remove ?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="removeSubCategoryBtn">Save changes</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		<div class="modal fade" tabindex="-1" role="dialog" id="updateSubCategoryModal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
									aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Edit Category</h4>
					</div>
					<div class="modal-body">
						<div id="remove-messages"></div>
						<p>Do you really want to edit ?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="editCategoryBtn">Save changes</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->


	</section>
	<!-- /wrapper -->
