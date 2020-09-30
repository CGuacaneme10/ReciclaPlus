$(document).ready(function(){

    $('#show').mousedown(function(){

        $('#password').removeAttr('type');
    });

    $('#show').mouseup(function(){

        $('#password').attr('type','password');
    });

});