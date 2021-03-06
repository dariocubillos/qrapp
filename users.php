<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Administrador
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />

</head>

<body class="">

  <?php
  include 'php/mainconn.php';
  $Mysql = new MysqlConn;

  if (isset($_COOKIE["usr"]) && isset($_COOKIE["pass"])) {
    // code...
  }else {
    // code...
    setcookie("usr",$_GET['usr'],time()+3600);
    setcookie("pass",$_GET['pass'],time()+3600);

    if ($Mysql->FunctionName($_GET['usr'],$_GET['pass']) == true) {

    }else {
      // code...
      header("Location:index.html");
    }

  }
   ?>

  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Administrador
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="./dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>PanelPrincipal</p>
            </a>
          </li>
          <li class="nav-item active" style="width: 80%;">
            <a class="nav-link" href="./users.php">
              <i class="material-icons">person</i>
              <p>Usuarios</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Panel Administrador</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" data-toggle="modal" data-target="#NewUser" href="#">Añadir usuarios</a>
                  <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter" href="#">Cambio de contraseña</a>
                  <a class="dropdown-item" data-toggle="modal" onclick="backbupdb()" href="#">Respaldar DB</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" onclick="exit()" href="#">Cerrar sesion</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment_ind</i>
                  </div>
                  <p class="card-category">Usuarios</p>
                  <h3 class="card-title"> <?php  $Mysql->QueryEcho($querycountusers); ?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Dia de hoy
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment_turned_in</i>
                  </div>
                  <p class="card-category">Entradas Hoy</p>
                  <h3 class="card-title"><?php $Mysql->QueryEcho($querycountenters);?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Dia de hoy
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">Salidas Hoy</p>
                  <h3 class="card-title"><?php $Mysql->QueryEcho($querycountexits);?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Hasta este momento
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>

<style media="screen">
div.dataTables_wrapper {
      margin-bottom: 3em;
  }
</style>

      <div class="card">
        <h3 class="card-header">Informacion de maestros</h3>
        <div class="card-body">
          <table id="users" class="display" style="width:100%">
              <thead>
                  <tr>
                      <th>NSS</th>
                      <th>Nombre</th>
                      <th>Apellidos</th>
                      <th>Puesto</th>
                      <th>Grado</th>
                      <th>Telefono</th>
                      <th>Email</th>
                      <th>Fecha Registro</th>
                      <th>Configurar</th>
                      <th>Descargar QR</th>
                  </tr>
              </thead>
              <tbody>

              </tbody>
              <tfoot>
                  <tr>
                      <th>NSS</th>
                      <th>Nombre</th>
                      <th>Apellidos</th>
                      <th>Puesto</th>
                      <th>Grado</th>
                      <th>Telefono</th>
                      <th>Email</th>
                      <th>Fecha Registro</th>
                      <th>Configurar</th>
                      <th>Descargar QR</th>
                  </tr>
              </tfoot>
          </table>
         </div>
        </div>
        </div>
      </div>
    </div>

  <!-- Modal -->

  <div class="modal fade" id="UpdateUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLongTitle">Actualizar Usuario</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-12">
                <input id="nssupdate" class="form-control" type="text" placeholder="Numero de seguridad social">
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <input id="nombreupdate" class="form-control" type="text" placeholder="Nombre">
            </div>
            <div class="col-6">
              <input id="apellidosupdate" class="form-control" type="text" placeholder="Apellidos">
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <input id="puestoupdate" class="form-control" type="text" placeholder="Puesto">
            </div>
            <div class="col-6">
              <input id="telefonoupdate" class="form-control" type="number" placeholder="Telefono">
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <input id="gradoupdate" class="form-control" type="text" placeholder="Grado Academico">
            </div>
            <div class="col-6">
              <input id="emailupdate" class="form-control" type="text" placeholder="Email">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" onclick="updateuser()">Guardar Usuario</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLongTitle">Cambio de contraseña</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="password" class="form-control" id="inputPassword0" placeholder="Nueva contraseña">
          </div>
          <div class="form-group">
              <input type="password" class="form-control" id="inputPassword1" placeholder="Confirmar Contraseña">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" onclick="savepass()">Guardar Cambios</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="NewUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLongTitle">Añadir Usuario</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-12">
                <input id="nss" class="form-control" type="text" placeholder="Numero de seguridad social">
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <input id="nombre" class="form-control" type="text" placeholder="Nombre">
            </div>
            <div class="col-6">
              <input id="apellidos" class="form-control" type="text" placeholder="Apellidos">
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <input id="puesto" class="form-control" type="text" placeholder="Puesto">
            </div>
            <div class="col-6">
              <input id="telefono" class="form-control" type="number" placeholder="Telefono">
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <input id="grade" class="form-control" type="text" placeholder="Grado Academico">
            </div>
            <div class="col-6">
              <input id="email" class="form-control" type="text" placeholder="Email">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" onclick="saveuser()">Guardar Usuario</button>
        </div>
      </div>
    </div>
  </div>



  <div id="Credencial" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="LabelApartados">Codigo del empleado</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="qrcontentmain">
          <div class="row" style="align-items: center; justify-content: center"> <h3 id="NombreColocar"></h3></div>
          <div id="qrcode" class="d-flex justify-content-center"></div>
          <div class="row" style="align-items: center; justify-content: center"> <h3 id="PuestoColocar"></h3></div>
        <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary  " onclick="SaveCred()">Guardar</button>
      </div>
    </div>
  </div>
  </div>


    <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="assets/js/plugins/arrive.min.js"></script>
  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <script src="js/GeneralFuctions.js"></script>
  <script src="js/globalvarfun.js"></script>
  <script src="js/qrcode.min.js"></script>
  <script src="js/html2canvas.js"></script>
  <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
  <script type="text/javascript" charset="utf8" src="js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" charset="utf8" src="js/dataTables.fixedHeader.min.js"></script>
  <script type="text/javascript" charset="utf8" src="js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" charset="utf8" src="js/pdfmake.min.js"></script>
  <script type="text/javascript" charset="utf8" src="js/vfs_fonts.js"></script>
  <script type="text/javascript" charset="utf8" src="js/buttons.html5.min.js"></script>

  <script>
  var d = new Date();
  var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();

  var  idmodalupdate;
  var    nombreupdate;
  var   apellidoupdate;
  var    puestoupdate;
  var    gradoupdate;
  var    telefonoupdate;
  var    emailupdate;

  function getitem(row) {

    idmodalupdate = row.parentNode.parentElement.children[0].textContent;
    nombreupdate = row.parentNode.parentElement.children[1].textContent;
    apellidoupdate = row.parentNode.parentElement.children[2].textContent;
    puestoupdate = row.parentNode.parentElement.children[3].textContent;
    gradoupdate = row.parentNode.parentElement.children[4].textContent;
    telefonoupdate = row.parentNode.parentElement.children[5].textContent;
    emailupdate = row.parentNode.parentElement.children[6].textContent;

    $("#nssupdate").val(idmodalupdate);
    $("#nombreupdate").val(nombreupdate);
    $("#apellidosupdate").val(apellidoupdate);
    $("#puestoupdate").val(puestoupdate);
    $("#telefonoupdate").val(telefonoupdate);
    $("#gradoupdate").val(gradoupdate);
    $("#emailupdate").val(emailupdate);

  }

  function updateuser() {

        var param = {
            "nss" : $("#nssupdate").val(),
            "nombre":$("#nombreupdate").val() ,
            "apellidos":$("#apellidosupdate").val(),
            "puesto":$("#puestoupdate").val(),
            "telefono":$("#telefonoupdate").val(),
            "grado":$("#gradoupdate").val(),
            "email":$("#emailupdate").val()
                };

                $.ajax({
                      data:  param, //datos que se envian a traves de ajax
                      url:   'php/updateuser.php', //archivo que recibe la peticion
                      type:  'post', //método de envio
                      success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                                    if (Number(response) == true) {
                                      alert("Usuario Actualizado.");
                                      location.reload();
                                    }else {
                                      alert("Error en la actualizacion.");
                                    }
                                  }

               });
  }

function OpenCred(row) {
  $("#qrcode").empty();
  var qrcode = new QRCode("qrcode");
  var id = row.parentNode.parentElement.children[0].textContent;
  $("#NombreColocar").text(row.parentNode.parentElement.children[1].textContent+" "+row.parentNode.parentElement.children[2].textContent);
  $("#PuestoColocar").text(row.parentNode.parentElement.children[4].textContent);
  qrcode.makeCode(id);
}

  function SaveCred() {
    html2canvas(document.querySelector("#qrcontentmain")).then(canvas => {
        saveAs(canvas.toDataURL(), 'Codigo.png');
      });
  }

  function ReloadTable() {
    $.ajax({
      type : 'POST',
      url  : 'php/getusers.php',
      dataType: 'json',
      cache: false,
      success :  function(result)
          {
           $('#users').DataTable({
             dom: 'Bfrtip',
         buttons: [  'excel'
       ], fixedHeader: true,
                  language:languageesp,
                  "data": result,
                  columns: [
                    { "data": "id" },
                    { "data": "firstname" },
                    { "data": "lastname" },
                    { "data": "stall" },
                    { "data": "grade" },
                    { "data": "tel" },
                    { "data": "email" },
                    { "data": "reg_date" },
                    {"defaultContent": "<button data-toggle='modal' data-target='#UpdateUserModal' onclick='getitem(this)'>Modificar</button>"},
                    {"defaultContent": "<button data-toggle='modal' data-target='#Credencial' onclick='OpenCred(this)'>Codigo</button>"}
                  ],
                });
          }
      });
  }


    $(document).ready(function() {
      ReloadTable();

      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }
          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);
          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });
      });
    });
  </script>
</body>

</html>
