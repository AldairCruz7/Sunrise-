$(document).ready(function () {
  /*Formato correo electrónico*/
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  $('#btn-registro').click(function () {
    /*Validación de campos*/
    if ($('#nombre').val() == '') {
      error_formulario('nombre', 'El nombre es requerido');
      return false;
    } else if ($('#telefono').val() == '' || $('#telefono').val().length == 10) {
      error_formulario('telefono', 'El telefono es requerido');
      return false;
    } else if ($('#correo').val() == '') {
      error_formulario('correo', 'El correo es requerido');
      return false;
    } else if (!regex.test($('#correo').val())) {
      error_formulario(
        'correo',
        'El correo debe tener formato usuario@servidor.algo'
      );
      return false;
    } else if ($('#contrasenia').val() == '') {
      error_formulario('contrasenia', 'La contraseña es requerida');
      return false;
    }

    /*función AJAX para autentificación (registro)*/
    $.ajax({
      url: appData.url_ws + 'autentificacion/registro',
      type: 'post',
      data: {
        nombre: $('#nombre').val(),
        telefono: $('#telefono').val(),
        correo: $('#correo').val(),
        contrasenia: $('#contrasenia').val(),
      },
      dataType: 'json',
    }).done(function (json) {
      console.log('registrado');
      if (json.resultado) {
        alert('Registro exitoso');
        muestra_mensaje('success', 'Registro exitoso');
        $(location).attr('href', appData.base_url + 'frontend/login');
      } else {
        if (json.respuesta == '400') {
          muestra_mensaje('warning', 'Usuario o correo existente');
        } else if (json.respuesta == '404') {
          muestra_mensaje('warning', '¡Lo sentimos! :( ocurrió un error');
        }
      }
    });
  });

  return true;
});
