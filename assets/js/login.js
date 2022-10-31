$(document).ready(function () {
	$('#userLogin').on('click', function (e) {
		$('#login').unbind('submit').bind('submit', function () {
			var form = $(this);
			var formData = new FormData($(this)[0]);
			var url = form.attr('action');
			var type = form.attr('method');
			$.ajax({
				url: url,
				type: type,
				data: formData,
				dataType: 'json',
				cache: false,
				contentType: false,
				processData: false,
				success: function (response) {
					console.log(response)
					if (response.success === true) {
						$('.response_msg').html('<div class="alert alert-success alert-dismissible" role="alert">' +
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
							response.messages +
							'</div>');
						$('.form-group').removeClass('has-error').removeClass('has-success');
						$('.text-danger').remove();
						window.setTimeout(function () {
							location.href = response.redirect;
						}, 2000);
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
					}
				}
			});

			return false;
		});
	})
});
