// var manageTeacherTable;
var base_url = $("#base_url").val();

$(document).ready(function () {

	/*remove error messages*/
	$(".form-group").removeClass('has-success').removeClass('has-error');
	$(".text-danger").remove();
	$(".response_msg").html('');

	$("#add_category").unbind('submit').bind('submit', function () {
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

});
function clearForm()
{
	$('input[type="text"]').val('');
	$('select').val('');
	$(".fileinput-remove-button").click();
}
