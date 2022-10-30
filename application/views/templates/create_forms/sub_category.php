<!-- **********************************************************************************************************************************************************
	MAIN CONTENT
	*********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<h3><i class="fa fa-angle-right"></i> Add Sub Categery</h3>
		<span class="response_msg"></span>
		<!-- BASIC FORM ELELEMNTS -->
		<div class="row mt">
			<div class="col-lg-12">
				<div class="form-panel">

					<form class="form-horizontal style-form" action="sub_category/create" method="post"
						  id="add_sub_category" name="add_sub_category"
						  enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Meta Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control round-form" id="meta_name" name="meta_name">
								<span class="meta-name text-danger"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Meta Description</label>
							<div class="col-sm-10">
								<input type="text" class="form-control round-form" id="meta_desc"
									   name="meta_desc">
								<span class=" meta-desc text-danger"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Meta Kewords</label>
							<div class="col-sm-10">
								<input type="text" class="form-control round-form" id="meta_keyword"
									   name="meta_keyword">
								<span class=" meta-keyword text-danger"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Select Categery</label>
							<div class="col-sm-10">
								<select class="form-control " name="category_id" id="category_id">
									<?php echo $category; ?>
								</select>
								<span class=" category-id-err text-danger"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control round-form" id="name" name="name">
								<span class=" name text-danger"></span>

							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Upload Image</label>
							<div class="col-md-4">
								<input type="file" name="photo" class="default"/>
								<input type="hidden" name="path" value="img.png">
								<span class=" photo text-danger"></span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<input type="hidden" name="form_type" value="sub_category">
								<button class="btn btn-theme" id="sub_category" type="submit">ADD</button>
								<button class="btn btn-theme04" type="button">Cancel</button>
							</div>
						</div>


					</form>
				</div>
			</div>
			<!-- col-lg-12-->
		</div>
		<!-- /row -->


		<!-- /col-lg-12 -->
		<!-- CUSTOM TOGGLES -->

		</div>
		<!-- /row -->
	</section>
	<!-- /wrapper -->
	<script type="text/javascript" src="<?php echo base_url('assets/js/ajaxForm.js')?>"></script>
