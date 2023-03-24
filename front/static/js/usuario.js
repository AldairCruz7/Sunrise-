$(document).ready(function () {
  /*Función AJAX para obtener objeto cliente*/
  $.ajax({
    url: appData.url_ws + 'autentificacion/getcliente',
    type: 'post',
    data: {
      correo: appData.correo,
    },
    dataType: 'json',
  }).done(function (json) {
    /*Configuración HTML de la barra de navegación*/
    if (json.resultado) {
      /*Barra de navegación en caso de una sesión activa*/
      $('#nombre-cliente').html(json.cliente.nombre);
      $('#sesion').append(
        '<a class="nav-link"' +
          'href="' +
          appData.base_url +
          'frontend/cierrasesion' +
          '" ><i class="fa-2x fas fa-sign-in-alt"></i></a>'
      );
      $('#historial').append(
        '<a class="nav-link"' +
          'href="' +
          appData.base_url +
          'frontend/historial' +
          '" ><i class="fa-2x fas fa-receipt"></i></a>'
      );
      appData.idCliente = json.cliente.idCliente;
    } else {
      /*Barra de navegación en caso de no existir una sesión activa*/
      muestra_mensaje('warning', 'Te recomendamos iniciar sesión');
      $('#sesion').append(
        '<a class="nav-link" href="' +
          appData.base_url +
          'frontend/login' +
          '"><i class="fa-2x fas fa-user"></i></a>'
      );
    }
  });
});
