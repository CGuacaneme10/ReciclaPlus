$("#submit").click(function (e) {
    e.preventDefault()

    var password = generatePassword();
    let url = "?controller=empleado&method=saveEmpleado"
    let params = {
        Nombres: $('#Nombres').val(),
        Apellidos: $('#Apellidos').val(),
        Identidad: $('#Identidad').val(),
        Direccion: $('#Direccion').val(),
        Telefono: $('#Telefono').val(),
        username: $('#username').val(),
        rol_id: $('#rol_id').val(),
        password: password
    }
    $.post(url, params, function (response) {
        EmailJS(password);
        alert("Inserción Satisfactoria")
        location.href = '?controller=empleado'
    });
});

function generatePassword() {
    var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    var string_length = 8;
    var randomstring = '';
    for (var i = 0; i < string_length; i++) {
        var rnum = Math.floor(Math.random() * chars.length);
        randomstring += chars.substring(rnum, rnum + 1);
    }
    return randomstring;
}


function EmailJS(password) {
    emailjs.init("user_agMTazsERkfHS77lSiDgB");
    var templateParams = {
        nombreU: $('#Nombres').val(),
        email: $('#username').val(),
        password: password
    };

    emailjs.send('gmail', 'template_n2xxlip', templateParams).(function (response) {
        console.log('Éxito!', response.status, response.text);
    }, function (error) {
        console.log('Fallo...', error);
    });
}