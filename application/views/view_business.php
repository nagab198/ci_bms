<!-- **********************************************************************************************************************************************************
	MAIN CONTENT
	*********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<h3><i class="fa fa-angle-right"></i> View Business</h3>
		<span class="response_msg"></span>
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

						</table>
					</section>
				</div>
				<!-- /content-panel -->
			</div>
			<!-- /col-lg-4 -->
		</div>
		<div class="modal fade" tabindex="-1" role="dialog" id="deleteBusinessModal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
									aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Remove Category</h4>
					</div>
					<div class="modal-body">
						<div id="remove-messages"></div>
						<p>Do you really want to remove ?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="removeBusinessBtn">Save changes</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

	</section>
	<!-- /wrapper -->

	<!--main content end-->
