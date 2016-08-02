<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "snippets/Navigator.php"?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Forms</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <?php if(@$_GET['respuesta']){?>
                <?php if($_GET['respuesta'] == "correcto"){?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Odontologo Guardado Correctamente. <a href="#" class="alert-link">Odontologo Insertado</a>.
                    </div>
                <?php }else{ ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Error: No se inserto el odontologo. <a href="#" class="alert-link">Odontologo No Insertado</a>.
                    </div>
                <?php } ?>
            <?php }?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Crear Odontologo
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" action="../Controlador/odontologos_controller.php?action=crear">
                                       <div class="form-group">
                                            <label>Nombres</label>
                                            <input name="nombres" id="nombres" maxlength="50" size="50" class="form-control" placeholder="Nombres Completos" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Apellidos</label>
                                            <input name="apellidos" id="apellidos" maxlength="50" size="50" class="form-control" placeholder="Apellidos Completos" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Especialidad</label>
                                            <select id="especialidad" name="especialidad" class="form-control" required>
                                                <option value="ENDODONCIA">ENDODONCIA</option>
                                                <option value="ORTODONCIA">ORTODONCIA</option>
                                                <option value="PERIODONCIA">PERIODONCIA</option>
                                                <option value="ODONTOPEDIATRIA">ODONTOPEDIATRIA</option>
                                                <option value="IMPLANTOLOGIA">IMPLANTOLOGIA</option>
                                                <option value="ODONTOLOGIA GERIATRICA">ODONTOLOGIA GERIATRICA</option>
                                                <option value="PROSTODONCIA">PROSTODONCIA</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Direccion</label>
                                            <input name="direccion" id="direccion" size="60" maxlength="60" class="form-control" placeholder="Direccion completa" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Nº Celular</label>
                                            <input type="number" name="celular" id="celular" class="form-control" placeholder="Numero del Celular" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Usuario</label>
                                            <input name="user" id="user" size="45" maxlength="45" class="form-control" placeholder="Usuario del sistema" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Contraseña</label>
                                            <input type="password" name="pass" id="pass" size="45" maxlength="45" class="form-control" placeholder="Contraseña de Ingreso" required>
                                        </div>
                                        <button type="submit" class="btn btn-default">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                                </div>

                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
