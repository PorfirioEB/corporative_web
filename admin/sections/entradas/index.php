<?php
include("../../db.php");

// Seleccionar registros
$sentencia=$conexion->prepare("SELECT * FROM `tbl_entradas`");
$sentencia->execute();
$lista_portafolio=$sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registro</a></div>
    </div>
    <div class="card-body">

    <div
        class="table-responsive-sm"
    >
        <table
            class="table"
        >
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Título</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr class="">
                    <td>1</td>
                    <td>18/06/2025</td>
                    <td>Inicia Negocio</td>
                    <td>Empresa se establece para la venta de artículos</td>
                    <td>imagen.jpg</td>
                    <td>Editar | Borrar</td>
                </tr>
            </tbody>
        </table>
    </div>
    

    </div>
    <div class="card-footer text-muted">

    </div>
</div>


<?php include("../../templates/footer.php"); ?>