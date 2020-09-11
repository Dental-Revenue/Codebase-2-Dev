//DR Form Processor
//v1.0
var $ = require('jquery');
window.jQuery = window.$ = $;

$(function() {
    $('form[action^="https://ws.dentalrevenue.com"]').on('submit', function(e) {
        e.preventDefault();
        var $this = $(this);
        var err = 0;
        if (!$this.find('button').hasClass('disabled')) {
            $this.find('.invalid').removeClass('invalid');
            $this.find('.err').remove();
            $this.find('button').addClass('disabled');
            $this.find('[data-req="true"]').each(function(i, obj) {
                $elem = $(this);
                if ($elem.val() == '') {
                    $elem.addClass('invalid');
                    err++;
                }
            });
            if ($('.captcha-container').length > 0) {
                var captchaString = $('#g-recaptcha-response').val();
                if (!captchaString || captchaString == '') {
                    err++;
                }
            }
            var name = $this.find('input[name="Name"]');
            if (name.length && name.val() == '') {
                name.addClass('invalid');
                err++;
            }
            var fname = $this.find('input[name="FirstName"]');
            var lname = $this.find('input[name="LastName"]');
            if (fname.length && (fname.val() == '' || lname.val() == '')) {
                fname.addClass('invalid');
                lname.addClass('invalid');
                err++;
            }
            var phone = $this.find('input[name="Phone"]');
            var email = $this.find('input[name="EmailName"]');
            if ((phone.length || email.length) && (phone.val() == '' && email.val() == '')) {
                phone.addClass('invalid');
                email.addClass('invalid');
                err++;
            }
            var patient = $this.find('select[name="AdsNext-AreYouNewPatient"]');
            if ((patient.length) && (patient.val() == 'Select One')) {
                patient.addClass('invalid');
                patient.prev().addClass('invalid');
                err++;
            }
            
            if (err > 0) {
                $this.prepend('<p class="err">Please fill out all required form fields.</p>');
                $this.find('button').removeClass('disabled');
            } else {
                var formData = $this.serialize();
                formData += "&api_key=6LcBtZUUAAAAALV5OTtYds1aaMjw-M_lAETu3mfc";
                if ($('.captcha-container').length > 0) {
                    formData += "&captchamode=simple";
                }
                $.ajax({
                    type: "POST",
                    url: 'https://ws.dentalrevenue.com/ws/forms/postLead.aspx',
                    cache: false,
                    data: formData,
                    crossDomain: true,
                    success: function(data, result, xhr) {
                        if (data.result == 'error') {
                            $this.prepend('<p class="err">' + data.message + '</p>');
                            $this.find('button').removeClass('disabled');
                        } else {
                            var redirectLocation = $this.find('input[name="RedirectPageFullURL"]').val();
                            if (redirectLocation && redirectLocation != '') {
                                window.location = redirectLocation;
                            } else {
                                window.location = "/";
                            }
                        }
                    },
                    error: function(xhr, data) {
                        $this.prepend('<p class="err">Sorry, we had trouble processing the form. Please call our telephone number for assistance.</p>');
                        $this.find('button').removeClass('disabled');
                    }
                });
            }
        }
    });
});
