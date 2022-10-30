var base_url = $("#base_url").val();
var categoryTable;
$(document).ready(function () {
	categoryTable = $("#category_table").DataTable({
		'ajax': base_url + 'category/fetchCategoryForDataTable',
		'order': []
	});
	$('#business_table').DataTable();
	$('#sub_category_table').DataTable();
	$('#product_table').DataTable();
	// $("#category").attr("disabled", false);
	$("#sub_category").attr("disabled", false);
	$("#product").attr("disabled", false);
	$("#business").attr("disabled", false);


	/*remove error messages*/
	$(".form-group").removeClass('has-success').removeClass('has-error');
	$(".text-danger").remove();
	$(".response_msg").html('');

	function submitForm(id) {
		let formId = "#add_" + id;
		$(formId).unbind('submit').bind('submit', function () {
			var form = $(this);
			var formData = new FormData($(this)[0]);
			var url = form.attr('action');
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
						$('.response_msg').removeClass('text-danger').addClass('text-success').html(response.messages);
						// manageTeacherTable.ajax.reload(null, false);
						$('.form-group').removeClass('has-error').removeClass('has-success');
						$('.text-danger').remove();
						clearForm();
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

	const page_type = urlParams.get('cid')
	if (page_type) {
		fetchCategoryById(page_type);
	} else {
		console.log(page_type + ' page_type not found');
	}

	$('#category').on('click', function (e) {
		let formId = $(this).attr('id');
		submitForm(formId);
	});
	$('#sub_category').on('click', function (e) {
		let formId = $(this).attr('id');
		submitForm(formId);
	});
	$('#product').on('click', function (e) {
		let formId = $(this).attr('id');
		submitForm(formId);
	});
	$('#business').on('click', function (e) {
		let formId = $(this).attr('id');
		submitForm(formId);
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


function editCategory(id) {
	window.location.href = base_url + 'admin/create_category?cid=' + id;

}

function fetchCategoryById(id) {

	$.ajax({
		url: base_url + 'category/fetchCategoryById/' + id,
		type: 'get',
		dataType: 'json',
		success: function (response) {
			if (response) {
				console.log(response);
				$('.form-name').html('Edit');
				$("#name").val(response.name);
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
