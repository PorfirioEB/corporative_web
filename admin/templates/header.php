<?php 
session_start();
$url_base="http://localhost/responsiveweb/admin/"; 
if(!isset($_SESSION['usuario'])){
    header("Location:".$url_base."login.php");
}

?>
<!doctype html>
<html lang="en">
<head>
    <title>Administrador del sitio web </title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>

    <script src="https://code.jquery.com/jquery-4.0.0.min.js" integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="style.css">
    <link type="text/css" href="https://cdn.datatables.net/v/dt/dt-3.0.0/datatables.min.css" rel="stylesheet">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/v/dt/dt-3.0.0/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <header>
        <!-- place navbar here -->
        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="nav navbar-nav">
                <a class="nav-item nav-link active" href="#" aria-current="page">Administrador <span class="visually-hidden">(current)</span></a>
                <a class="nav-item nav-link" href="<?php echo $url_base;?>sections/servicios">Servicios</a>
                <a class="nav-item nav-link" href="<?php echo $url_base;?>sections/portafolio">Portafolio</a>
                <a class="nav-item nav-link" href="<?php echo $url_base;?>sections/entradas">Entradas</a>
                <a class="nav-item nav-link" href="<?php echo $url_base;?>sections/equipo">Equipo</a>
                <a class="nav-item nav-link" href="<?php echo $url_base;?>sections/config">Configuraciones</a>
                <a class="nav-item nav-link" href="<?php echo $url_base;?>sections/usuarios">Usuarios</a>
                <a class="nav-item nav-link" href="#" onclick="confirmarCerrarSesion(event)">Cerrar sesión</a>
            </div>
        </nav>
    </header>
<main class="container">
    <br/>

    <script>
    function confirmarEliminar(event, id) {
        event.preventDefault();

        Swal.fire({
            title: '¿Desea eliminar este registro?',
            text: 'Esta acción no se puede deshacer.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "index.php?txtID=" + id;
            }
        });
    }
    </script>

    <script>
    function confirmarCerrarSesion(event) {
        event.preventDefault();

        Swal.fire({
            title: '¿Seguro que quieres cerrar sesión?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí',
            cancelButtonText: 'No',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo $url_base; ?>cerrar.php";
            }
        });
    }
    </script>

    <script>
        <?php if(isset($_GET['mensaje'])) { ?>
        Swal.fire({icon:"success", title:"<?php echo $_GET['mensaje'];?>"});
        <?php } ?>

    </script>
    