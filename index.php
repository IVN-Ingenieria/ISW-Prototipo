<?php

$servername = "localhost";
$username = "root";
$password = "41739810";
$dbname = "ieci7";
$trabajadores = array();
if(!empty($_POST)) {
	if(!empty($_POST['nuevo'])) {
		$mysqli = new mysqli($servername, $username, $password, $dbname);
		/* check connection */
		if (mysqli_connect_errno()) {
			printf("Error de conexión: %s\n", mysqli_connect_error());
			exit();
		}
		$query = "INSERT INTO trabajadores (`nombre`) VALUES ('".$_POST['nuevo']."')";
		$mysqli->query($query);
	}
	
	
} elseif (!empty($_GET['delete'])) {
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "DELETE FROM trabajadores WHERE id=".$_GET['delete'];
	$conn->query($sql);
}

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM trabajadores";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		array_push($trabajadores, array('id'=>$row['id'], 'nombre'=>$row['nombre']));
	}
}



$tests = array();

        // Versión de PHP
        $phpversion = new \stdClass();
        $phpversion->label = 'Versión de PHP';
        $phpversion->status = false;
        $phpversion->required = '>= 5.4';
        $phpversion->message = phpversion();
        if (version_compare(PHP_VERSION, '5.4') >= 0) {
            $phpversion->status = true;
        }
        array_push($tests, $phpversion);

        // Extensions
        $mcrypt = new \stdClass();
        $mcrypt->label = 'MCrypt';
        $mcrypt->status = false;
        $mcrypt->required = 'Instalado';
        $mcrypt->message = 'NO INSTALADO';

        $openssl = new \stdClass();
        $openssl->label = 'OpenSSL';
        $openssl->status = false;
        $openssl->required = 'Instalado';
        $openssl->message = 'NO INSTALADO';

        $pdo = new \stdClass();
        $pdo->label = 'PDO';
        $pdo->status = false;
        $pdo->required = 'Instalado';
        $pdo->message = 'NO INSTALADO';

        $mbstring = new \stdClass();
        $mbstring->label = 'Mbstring';
        $mbstring->status = false;
        $mbstring->required = 'Instalado';
        $mbstring->message = 'NO INSTALADO';

        $tokenizer = new \stdClass();
        $tokenizer->label = 'Mbstring';
        $tokenizer->status = false;
        $tokenizer->required = 'Instalado';
        $tokenizer->message = 'NO INSTALADO';

        foreach(get_loaded_extensions() as $extension) {
            if($extension == 'mcrypt') {
                $mcrypt->status = true;
                $mcrypt->message = 'INSTALADO';
            } else if($extension == 'openssl') {
                $openssl->status = true;
                $openssl->message = 'INSTALADO';
            } else if(strpos($extension, 'pdo_') !== false) {
                $pdo->status = true;
                $pdo->message = 'INSTALADO';
            } else if($extension == 'mbstring') {
                $mbstring->status = true;
                $mbstring->message = 'INSTALADO';
            } else if($extension == 'tokenizer') {
                $tokenizer->status = true;
                $tokenizer->message = 'INSTALADO';
            }
        }
        array_push($tests, $mcrypt);
        array_push($tests, $openssl);
        array_push($tests, $pdo);
        array_push($tests, $mbstring);
        array_push($tests, $tokenizer);

        // Database
        $db_tests = array();
        $db_available = false;

        $db_connection = new \stdClass();
        $db_connection->label = 'Estado del servidor';
        $db_connection->status = false;
        $db_connection->message = 'ERROR';

        $db_database = new \stdClass();
        $db_database->label = 'Base de datos de prueba';
        $db_database->status = false;
        $db_database->message = 'ERROR';

        if ($dbc = mysqli_connect('localhost', 'root', '41739810')) {
            $db_connection->status = true;
            $db_connection->message = 'OK';
            if (mysqli_select_db($dbc, 'ieci7')) {
                $db_database->status = true;
                $db_database->message = 'OK';
                $db_available = true;
            }
        }
        array_push($db_tests, $db_connection);
        array_push($db_tests, $db_database);

        //$tm = new Trabajadores();
        //$trabajadores = $tm->all();

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <!-- Stylesheets -->
	<link rel="stylesheet" type="text/css" href="public/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="public/assets/css/style.css">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="container-fluid header">
        <div class="container header-frame">
    <div class="row">
        <div class="logo col-sm-6">
			<img src="public/assets/images/logo_horizontal_fondo-negro.png" class="logo-img">
        </div>
        <div class="col-sm-6 user-info">
            <div class="space-15"></div>
            <div class="controls"><a href="#">PROTOTIPO :: PRUEBAS DE SERVIDOR</a></div>
        </div>
    </div>
</div>
    </div>
    <div class="container">
        
		<div class="row">

        <ol class="breadcrumb">
            <li class="active">Prototipo</li>
        </ol>

        <div class="col-sm-12">
            <h2>Información de PHP</h2>
            <div class="space-15"></div>
        </div>

        <div class="col-sm-8">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Módulo</th>
                    <th>Requerido</th>
                    <th>Estado</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach($tests as $key => $test): ?>
                    <tr class="<?= $test->status ? 'success text-success' : 'danger text-danger' ?>">
                        <td><?=$test->label?></td>
                        <td><?=$test->required?></td>
                        <td><strong><?=$test->message?></strong></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <div class="col-sm-12">
            <h2>Información de la base de datos</h2>
            <div class="space-15"></div>
        </div>

        <div class="col-sm-8">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Criterio</th>
                    <th>Estado</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($db_tests as $key => $test): ?>
                    <tr class="<?= $test->status ? 'success text-success' : 'danger text-danger' ?>">
                        <td><?=$test->label?></td>
                        <td><strong><?=$test->message?></strong></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <?php if($db_available): ?>
        <div class="col-sm-12">
            <h2>Gestion Trabajador</h2>
            <div class="space-15"></div>
        </div>

        <div class="col-sm-8">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>id</th>
                    <th>nombre</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($trabajadores as  $trabador): ?>
                    <tr >
                        <td><?=$trabador['id']?></td>
                        <td><?=$trabador['nombre']?></td>
                        <td><a href="<?=$_SERVER["PHP_SELF"]?>?delete=<?=$trabador['id']?>" class="btn btn-danger btn-xs" role="button">&nbsp;x&nbsp;</a></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>

			<form method="post" class="form-inline">
                <div class="form-group">
                    <label for="nuevo">Agregar nuevo trabajador </label>
                    <input name="nuevo" type="text" class="form-control" id="nuevo" placeholder="Jane Doe">
                </div>
                <button type="submit" class="btn btn-success">Agregar</button>
            </form>

            <div class="space-30"></div>
        </div>
        <?php endif ?>

    </div>
		
    </div>
</body>
</html>