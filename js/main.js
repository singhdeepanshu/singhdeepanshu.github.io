(function ($) {
   
    var form = $('.contact_form'),
       var message = $('#success'),
        var formData = {
        'name'               : $('input[name=name]').val(),
        'phone'             : $('input[name=phone]').val(),
        'email'            : $('input[name=email]').val(),
		'message'		   : $('input[name=message]').val()
        
    };

    // Success function
    function done_func(response) {
		$('#success').show();
        message.fadeIn()
        message.html(response);
        setTimeout(function () {
            message.fadeOut();
        }, 5000);
        
        form.find('input:not([type="submit"]), textarea').val('');
    }

    // fail function
    function fail_func(data) {
		$('#fail').show();
        message.fadeIn()
        message.html(data.responseText);
        setTimeout(function () {
            message.fadeOut(5000);
        }, 5000);
    }
    
    form.submit(function (e) {
        e.preventDefault();
        formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: formData,
			dataType: json
        })
        .done(done_func)
        .fail(fail_func);
    });
})(jQuery);