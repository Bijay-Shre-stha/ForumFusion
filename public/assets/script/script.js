    // Function to check password strength
    function checkPasswordStrength() {
        var number = /([0-9])/;
        var alphabets = /([a-zA-Z])/;
        var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
        if ($('#password').val().length < 6) {
            $('#password_strength_text').removeClass();
            $('#password_strength_text').addClass('text-danger');
            $('#password_strength_text').text('Weak');
        } else {
            if ($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password')
                .val().match(special_characters)) {
                $('#password_strength_text').removeClass();
                $('#password_strength_text').addClass('text-success');
                $('#password_strength_text').text('Strong');
            } else {
                $('#password_strength_text').removeClass();
                $('#password_strength_text').addClass('text-warning');
                $('#password_strength_text').text('Medium');
            }
        }
    }
