const base_url = $("#base_url").val();
var categoryTable;
var subCategoryTable;
var businessTable;

$(document).ready(function () {

	categoryTable = $("#category_table").DataTable({
		'ajax': base_url + 'category/fetchCategoryForDataTable',
		'order': []
	});
	subCategoryTable = $("#sub_category_table").DataTable({
		'ajax': base_url + 'sub_category/fetchSubCategoryForDataTable',
		'order': []
	});
	businessTable = $("#business_table").DataTable({
		'ajax': base_url + 'Business/fetchBusinessForDataTable',
		'order': []
	});

	var productTable = $("#product_table").DataTable({
		'ajax': base_url + 'Product/fetchProductForDataTable',
		'order': []
	});

	// $("#category").attr("disabled", false);
	$("#sub_category").attr("disabled", false);
	$("#product").attr("disabled", false);
	$("#business").attr("disabled", false);


	/*remove error messages*/
	$(".form-group").removeClass('has-success').removeClass('has-error');
	$(".text-danger").remove();
	$(".response_msg").html('');

	function submitForm(formId, editId = false) {
		$('#' + formId).unbind('submit').bind('submit', function () {
			var form = $(this);
			var formData = new FormData($(this)[0]);
			var url = form.attr('action');
			url = editId ? url + '/' + editId : url;
			var type = form.attr('method');

			$.ajax({
				url: base_url + url,
				type: type,
				data: formData,
				dataType: 'json',
				cache: false,
				contentType: false,
				processData: false,
				success: function (response) {
					if (response.success === true) {
						$('.response_msg').html('<div class="alert alert-success alert-dismissible" role="alert">' +
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
							response.messages +
							'</div>');
						$('.form-group').removeClass('has-error').removeClass('has-success');
						$('.text-danger').remove();
						redirect(formId);
					} else {
						if (response.messages instanceof Object) {
							$.each(response.messages, function (index, value) {
								var key = $("#" + index);

								key.closest('.form-group')
									.removeClass('has-error')
									.removeClass('has-success')
									.addClass(value.length > 0 ? 'has-error' : 'has-success')
									.find('.text-danger').remove();
								key.after(value);

							});
						} else {
							$(".response_msg").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
								'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
								response.messages +
								'</div>');
						}
					} // /else
				} // /success
			}); // /ajax

			return false;
		});

	}

	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);

	if (urlParams.get('cid')) {
		fetchCategoryById(urlParams.get('cid'));
	}

	if (urlParams.get('scid')) {
		fetchSubCategoryById(urlParams.get('scid'));
	}
	if (urlParams.get('bid')) {
		fetchBusinessById(urlParams.get('bid'));
	}
	if (urlParams.get('pid')) {
		fetchProductById(urlParams.get('pid'));
	}


	// if (!urlParams.get('cid')) return console.log(' page_type not found');
	// if (!urlParams.get('scid')) return console.log(' page_type not found');


	//for creating new records instance

	$('#category').on('click', function (e) {
		submitForm('add_category');
	});
	$('#sub_category').on('click', function (e) {
		submitForm('add_sub_category');
	});
	$('#product').on('click', function (e) {
		submitForm('add_product');
	});
	$('#business').on('click', function (e) {
		submitForm('add_business');
	});

	// for edit exist records

	$('#edit_category_btn').on('click', function (e) {
		var cId = $('#edit_category_id').val();
		submitForm('edit_category', cId);
	});
	$('#edit_sub_category_btn').on('click', function (e) {
		var scId = $('#edit_sub_category_id').val();
		submitForm('edit_sub_category', scId);
	});
	$('#edit_product_btn').on('click', function (e) {
		var pId = $('#edit_product_id').val();
		submitForm('edit_product', pId);
	});
	$('#edit_business_btn').on('click', function (e) {
		var bId = $('#edit_business_id').val();
		submitForm('edit_business', bId);
	});

});

function removeCategory(id = null) {
	if (id) {
		$("#removeCategoryBtn").unbind('click').bind('click', function () {
			$.ajax({
				url: base_url + 'category/remove/' + id,
				type: 'delete',
				dataType: 'json',
				success: function (response) {
					if (response.success === true) {
						console.log(response.messages);
						$(".response_msg").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
							response.messages +
							'</div>');

						categoryTable.ajax.reload(null, false);
						$("#deleteCategoryModal").modal('hide');
					} else {
						$(".response_msg").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
							response.messages +
							'</div>');
					}
				} // /response
			}); // /ajax
		}); // /remove teacher button clicked of the modal button
	} // /if
}

function removeSubCategory(id) {
	if (id) {
		$("#removeSubCategoryBtn").unbind('click').bind('click', function () {
			$.ajax({
				url: base_url + 'sub_category/remove/' + id,
				type: 'delete',
				dataType: 'json',
				success: function (response) {
					if (response.success === true) {
						console.log(response.messages);
						$(".response_msg").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
							response.messages +
							'</div>');

						subCategoryTable.ajax.reload(null, false);
						$("#deleteSubCategoryModal").modal('hide');
					} else {
						$(".response_msg").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
							response.messages +
							'</div>');
					}
				} // /response
			}); // /ajax
		}); // /remove teacher button clicked of the modal button
	}
}

function removeBusiness(id) {
	if (id) {
		$("#removeBusinessBtn").unbind('click').bind('click', function () {
			$.ajax({
				url: base_url + 'business/remove/' + id,
				type: 'delete',
				dataType: 'json',
				success: function (response) {
					if (response.success === true) {
						console.log(response.messages);
						$(".response_msg").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
							response.messages +
							'</div>');

						businessTable.ajax.reload(null, false);
						$("#deleteBusinessModal").modal('hide');
					} else {
						$(".response_msg").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
							response.messages +
							'</div>');
					}
				} // /response
			}); // /ajax
		}); // /remove teacher button clicked of the modal button
	}
}

function editCategory(id) {
	window.location.href = base_url + 'admin/create_category?cid=' + id;

}

function editSubCategory(id) {
	window.location.href = base_url + 'admin/create_sub_category?scid=' + id;
}

function editBusiness(id) {
	window.location.href = base_url + 'admin/create_business?bid=' + id;
}

function editProduct(id) {
	window.location.href = base_url + 'admin/create_product?pid=' + id;
}


//functions list for fetch recordsDisplay

function fetchCategoryById(id) {

	$.ajax({
		url: base_url + 'category/fetchCategoryById/' + id,
		type: 'get',
		dataType: 'json',
		success: function (response) {
			if (response) {
				$('#category').hide();
				$('#edit_category_btn').removeClass('hidden');
				$('#add_category').attr('id', 'edit_category').attr('action', 'category/update').attr('name', 'edit_category');
				console.log(response);
				$('.form-name').html('Edit');
				$("#name").val(response.name);
				$("#edit_category_id").val(response.category_id);
				$("#meta_name").val(response.meta_name);
				$("#meta_desc").val(response.meta_desc);
				$("#meta_keyword").val(response.meta_keyword);
			}
		}
	});
}

function fetchSubCategoryById(id) {

	$.ajax({
		url: base_url + 'sub_category/fetchSubCategoryById/' + id,
		type: 'get',
		dataType: 'json',
		success: function (response) {
			if (response) {
				$('#sub_category').hide();
				$('#edit_sub_category_btn').removeClass('hidden');
				$('#add_sub_category').attr('id', 'edit_sub_category').attr('action', 'sub_category/update').attr('name', 'edit_sub_category');
				console.log(response);
				$('.form-name').html('Edit');
				$("#name").val(response.name);
				$("#edit_sub_category_id").val(response.sub_category_id);
				$("#meta_name").val(response.meta_name);
				$("#meta_desc").val(response.meta_desc);
				$("#meta_keyword").val(response.meta_keyword);
			}
		}
	});
}


function fetchBusinessById(bid) {
	$.ajax({
		url: base_url + 'Business/fetchBusinessById/' + bid,
		type: 'get',
		dataType: 'json',
		success: function (response) {
			if (response) {
				$('#business').hide();
				$('#edit_business_btn').removeClass('hidden');
				$('#add_business').attr('id', 'edit_business').attr('action', 'business/update').attr('name', 'edit_business');
				console.log(response);
				$('.form-name').html('Edit');
				$("#name").val(response.name);
				$("#edit_category_id").val(response.category_id);
				$("#meta_name").val(response.meta_name);
				$("#meta_desc").val(response.meta_desc);
				$("#meta_keyword").val(response.meta_keyword);
				$("#desc").val(response.desc);
				$('#phone_number').val(response.phone_number);
				$('#address').val(response.address);
				$('#edit_business_id').val(response.business_id);
			}
		}
	});
}

function fetchProductById(pid) {
	$.ajax({
		url: base_url + 'product/fetchProductById/' + pid,
		type: 'get',
		dataType: 'json',
		success: function (response) {
			if (response) {
				$('#product').hide();
				$('#edit_product_btn').removeClass('hidden');
				$('#add_product').attr('id', 'edit_product').attr('action', 'product/update').attr('name', 'edit_product');
				console.log(response);
				$('.form-name').html('Edit');
				$("#name").val(response.name);
				$("#edit_category_id").val(response.category_id);
				$("#meta_name").val(response.meta_name);
				$("#meta_desc").val(response.meta_desc);
				$("#meta_keyword").val(response.meta_keyword);
			}
		}
	});
}

function clearForm() {
	$('input[type="text"]').val('');
	$('input[type="file"]').val('');
	$('select').val('');
}

function redirect(req) {
	//for redirects form submissions
	if (req === 'add_category' || req === 'edit_category') return window.location.href = base_url + '/admin/get_category';
	if (req === 'add_sub_category' || req === 'edit_sub_category') return window.location.href = base_url + '/admin/get_sub_category';
	if (req === 'add_product' || req === 'edit_product') return window.location.href = base_url + '/admin/get_product';
	if (req === 'add_business' || req === 'edit_business') return window.location.href = base_url + '/admin/get_business';


}
