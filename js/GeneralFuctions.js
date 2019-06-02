$(document).ready(function() {
  // Javascript method's body can be found in assets/js/demos.js
  md.initDashboardPageCharts();
  var uri = window.location.toString();
  if (uri.indexOf("?") > 0) {
      var clean_uri = uri.substring(0, uri.indexOf("?"));
      window.history.replaceState({}, document.title, clean_uri);
  }
});

function exit() {
  window.location.href ='logout.php';   var slecttoconfig = selected.parentNode.parentElement.children[0].textContent;     // Gets a descendent with class="nr" .text();         // Retrieves the text within <td>
}

function saveuser() {

var  nss = $("#nss").val();
var  nombre = $("#nombre").val();
var  apellidos = $("#apellidos").val();
var  puesto = $("#puesto").val();
var  telefono = $("#telefono").val();
var  grade = $("#grade").val();
var  email = $("#email").val();

var param = {
              "nss" : nss,
              "nombre" : nombre,
              "apellidos" : apellidos,
              "puesto" : puesto,
              "telefono" : telefono,
              "grado": grade,
              "email" : email
            };

if (nss != '' && nombre != '' && apellidos != '' && puesto != '' && telefono != '' & email != '' && grade != '') {
  $.ajax({
        data:  param, //datos que se envian a traves de ajax
        url:   'php/registeruser.php', //archivo que recibe la peticion
        type:  'post', //método de envio
        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                      if (Number(response) == true) {
                        alert("Datos guardados correctamente.");
                        location.reload();
                      }else {
                        alert("Error en el guardado.");
                      }
                }
         });

}else {
  alert("Faltan datos por completar.");
}

}


function savepass() {
  if ($("#inputPassword0").val() == $("#inputPassword1").val()) {

    var param = {
        "user" : getCookie("usr"),
        "newpass": $("#inputPassword0").val()
            };

            $.ajax({
                  data:  param, //datos que se envian a traves de ajax
                  url:   'php/changepass.php', //archivo que recibe la peticion
                  type:  'post', //método de envio
                  success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                                if (Number(response) == true) {
                                  alert("Contraseña actualizada.");
                                  location.reload();
                                }else {
                                  alert("Error en el cambio de contraseña.");
                                }
                              }

           });

  }else {
    alert("Las contraseñas no coinciden.");
  }
}

function getCookie(name) {
    var v = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
    return v ? v[2] : null;
}

function saveAs(uri, filename) {
    var link = document.createElement('a');
    if (typeof link.download === 'string') {
      link.href = uri;
      link.download = filename;

      //Firefox requires the link to be in the body
      document.body.appendChild(link);

      //simulate click
      link.click();

      //remove the link when done
      document.body.removeChild(link);
    } else {
      window.open(uri);
    }
  }
