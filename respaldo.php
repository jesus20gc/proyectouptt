<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Restaurar una base de datos MySQL </title>
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.min.css">
</head>
<style>
 body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
              margin: 0;
            padding: 0;
            background: url(images/liceo.jpg);
            background-size: cover;
            background-position: center;
            opacity: %;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            margin: 0 auto;
            margin-top: 20px;
        }

        h1 {
            color: #007BFF;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #007BFF;
            border-radius: 5px;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn-primary {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .alert {
            margin-top: 20px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        .volver-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            text-decoration: none;
        }

        .volver-button:hover {
            background-color: #0056b3;
        }
       </style>
<body>
<div class="container">
	<h1 class="text-center" style="margin-top:30px;"> Restaurar una base de datos MySQL </h1>
	<hr>
	<div class="row justify-content-center">
		<div class="col-sm-6">
			<?php
				if(isset($_SESSION['error'])){
					?>
					<div class="alert alert-danger text-center">
						<?php echo $_SESSION['error']; ?>
					</div>
					<?php

					unset($_SESSION['error']);
				}

				if(isset($_SESSION['success'])){
					?>
					<div class="alert alert-success text-center">
						<?php echo $_SESSION['success']; ?>
					</div>
					<?php

					unset($_SESSION['success']);
				}
			?>
			<div class="card">
				<div class="card-body">
					<h4>Información de la Base de Datos</h3>
					<br>
					<form method="POST" action="restore.php" enctype="multipart/form-data">
					    <div class="form-group row">
					     	<label for="server" class="col-sm-3 col-form-label">Servidor</label>
					      	<div class="col-sm-9">
					        	<input type="text" class="form-control" id="server" name="server" placeholder="Ejemplo: 'localhost'" required>
					      	</div>
					    </div>
					    <div class="form-group row">
					      	<label for="userame" class="col-sm-3 col-form-label">Usuario</label>
					      	<div class="col-sm-9">
					        	<input type="text" class="form-control" id="username" name="username" placeholder="Ejemplo: 'root'" required>
					      	</div>
					    </div>
					    <div class="form-group row">
					      	<label for="password" class="col-sm-3 col-form-label">Contraseña</label>
					      	<div class="col-sm-9">
					        	<input type="text" class="form-control" id="password" name="password" placeholder="db password">
					      	</div>
					    </div>
					    <div class="form-group row">
					      	<label for="dbname" class="col-sm-3 col-form-label">base de datos</label>
					      	<div class="col-sm-9">
					        	<input type="text" class="form-control" id="dbname" name="dbname" placeholder="base de datos que deseas restaurar" required>
					      	</div>
					    </div>
					    <div class="form-group row">
					      	<label for="sql" class="col-sm-3 col-form-label">Archivo</label>
					      	<div class="col-sm-9">
					        	<input type="file" class="form-control-file" id="sql" name="sql" placeholder="base de datos que deseas restaurar" required>
					      	</div>
					    </div>
					    <button type="submit" class="btn btn-primary" name="restore">Restaurar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>