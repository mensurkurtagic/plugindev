$(document).ready(function () {
    $('#register_personal_password').keyup(function () {
        $('#result').html(checkStrength($('#register_personal_password').val()));
    });

    function checkStrength(password) {
        var strength = 0;

        if(password.length < 8){
            $('#result').removeClass();
            $('#result').addClass('short');

            return 'Password is too short'
        }

        if (password.length > 8) strength += 1;
// If password contains both lower and uppercase characters, increase strength value.
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1;
// If it has numbers and characters, increase strength value.
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1;
// If it has one special character, increase strength value.
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1;
// If it has two special characters, increase strength value.
        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1;

        if(strength < 2){
            $('#result').removeClass();
            $('#result').addClass('weak');

            return 'Password is weak!'

        } else if(strength == 2){
            $('#result').removeClass();
            $('#result').addClass('good');

            return 'Password is okay, but it could be better!'

        } else {
            $('#result').removeClass();
            $('#result').addClass('strong');

            return 'Password is now strong!'
        }
    }
});