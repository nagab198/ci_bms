
<!-- **********************************************************************************************************************************************************
		MAIN CONTENT
		*********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<h3><i class="fa fa-angle-right"></i> Add Product</h3>
		<!-- BASIC FORM ELELEMNTS -->
		<span class="response_msg"></span>
		<div class="row mt">
			<div class="col-lg-12">
				<div class="form-panel">

					<form class="form-horizontal style-form" action="product/create" method="post" id="add_product" name="add_product" enctype="multipart/form-data">
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
							<label class="col-sm-2 col-sm-2 control-label">Meta Keywords</label>
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
								<span class=" category-id text-danger"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Select Sub Category</label>
							<div class="col-sm-10">
								<select class="form-control " name="sub_category_id" id="sub_category_id">
									<?php echo $sub_category; ?>
								</select>
								<span class="sub-category-id text-danger"></span>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">Product Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control round-form" id="name" name="name">
								<span class=" name text-danger"></span>
							</div>
						</div>
						<div class="form-group ">
							<label class="col-sm-2 col-sm-2 control-label">Description</label>
							<div class="col-lg-10">
								<input type="text" class="form-control round-form" id="desc"
									   name="desc">
								<span class="desc text-danger"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Upload Product Images</label>
							<div class="col-md-4">
								<input type="file" name="photo" class="default"/>
<!--								<input type="hidden" name="path" value="img.png">-->
								<span class=" photo text-danger"></span>
							</div>
						</div>
						<div class="form-group ">
							<label class="col-sm-2 col-sm-2 control-label">Home Page Product</label>
							<label class="checkbox-inline">
								<input type="checkbox" name="priority" id="priority" value="1">
							</label>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<input type="hidden" name="edit_product_id" id="edit_product_id">
								<button class="btn btn-theme hidden" id="edit_product_btn" type="submit" value="ADD">
									Edit
								</button>
								<button disabled class="btn btn-theme" id="product" type="submit" value="ADD" >ADD</button>
								<button class="btn btn-theme04" type="button">Cancel</button>
							</div>
						</div>


					</form>
				</div>
			</div>
			<!-- col-lg-12-->
		</div>
		<!-- /row -->

	</section>
