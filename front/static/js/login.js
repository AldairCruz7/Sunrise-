$(document).ready(function () {
  /*Formato correo electrónico*/
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  $('#btn-ingresar').click(function () {
    /* Validación de campos */
    if ($('#correo').val() == '') {
      error_formulario('correo', 'El correo es requerido');
      return false;
    } else if (!regex.test($('#correo').val())) {
      error_formulario(
        'correo',
        'El correo debe tener formato usuario@servidor.algo'
      );
      return false;
    } else if ($('#contrasenia').val() == '') {
      error_formulario('contrasenia', 'la contraseña es requerida');
      return false;
    }

    /*función AJAX para autentificación (login)*/
    $.ajax({
      url: appData.url_ws + 'autentificacion/login',
      type: 'post',
      data: {
        correo: $('#correo').val(),
        contrasenia: $('#contrasenia').val(),
      },
      dataType: 'json',
    }).done(function (json) {
      if (json.resultado) {
        $(location).attr(
          'href',
          appData.base_url + 'frontend/inicio/' + $('#correo').val()
        );
      } else {
        muestra_mensaje('danger', 'Correo o contraseña incorrectos');
        $('#correo').html($('#correo').val());
      }
    });
  });

  return true;
});
