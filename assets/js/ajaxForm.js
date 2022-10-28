$(document).ready(function () {
    $("#category").attr("disabled", false);
    $("#sub_category").attr("disabled", false);
    $("#product").attr("disabled", false);
    $("#business").attr("disabled", false);

    function submitForm(id){
        let formId = "#add_"+id;
        $(formId).one('submit',function (event) {
            // AJAX Code To Submit Form.
            $.ajax({
                type: "POST",
                url: "add_form.php",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (result) {
                    if (result.status === 201) {
                        $('.response_msg').removeClass('text-danger').addClass('text-success').html(result.msg);
                        $("#"+id).attr("disabled", true);
                        window.setTimeout(function () {
                            location.reload();
                        }, 3000);
                    }
                    if (result.status === 400) {
                        $('.response_msg').removeClass('text-success').addClass('text-danger').html(result.msg);
                        $('.meta-name').html(result.meta_name_err);
                        $('.meta-desc').html(result.meta_desc_err);
                        $('.desc').html(result.desc_err);
                        $('.meta-keyword').html(result.meta_keyword_err);
                        $('.name').html(result.name_err);
                        $('.category-id').html(result.category_id_err);
                        $('.sub-category-id').html(result.sub_category_id_err);
                        $('.address').html(result.address_err);
                        $('.phone-number').html(result.phone_number_err);
                        window.setTimeout(function () {
                            $('.meta-name').html('');
                            $('.meta-desc').html('');
                            $('.desc').html('');
                            $('.meta-keyword').html('');
                            $('.name').html('');
                            $('.category-id').html('');
                            $('.sub-category-id').html('');
                            $('.address').html('');
                            $('.phone-number').html('');
                        }, 3000);
                    }
                }
            });
            event.preventDefault();
        });
    }

    $('#category').on('click', function(e) {
        let formId = $(this).attr('id');
        submitForm(formId);
    });
    $('#sub_category').on('click', function(e) {
        let formId = $(this).attr('id');
        submitForm(formId);
    });
    $('#product').on('click', function(e) {
        let formId = $(this).attr('id');
        submitForm(formId);
    });
    $('#business').on('click', function(e) {
        let formId = $(this).attr('id');
        submitForm(formId);
    });

});