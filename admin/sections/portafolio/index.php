<?php 
include("../../db.php");

if(isset($_GET['txtID'])){

    // Recuperar los datos del ID correspondiente (seleccionado)
    $txtID=( isset($_GET['txtID']) )?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("SELECT imagen FROM tbl_portafolio WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();


    $registro_imagen = $sentencia->fetch(PDO::FETCH_LAZY);

    if (
        isset($registro_imagen["imagen"]) &&
        !empty($registro_imagen["imagen"])
    ) {
        $ruta = "../../../assets/img/portfolio/" . $registro_imagen["imagen"];

        if (file_exists($ruta) && is_file($ruta)) {
            unlink($ruta);
        }
    }


    $sentencia=$conexion->prepare("DELETE FROM tbl_portafolio WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();

}

// Seleccionar registros
$sentencia=$conexion->prepare("SELECT * FROM `tbl_portafolio`");
$sentencia->execute();
$lista_portafolio=$sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php"); ?>

<div class="card">
    <div class="card-header"><a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registros</a></div>
    <div class="card-body">
        
    <div
        class="table-responsive-sm">
        <table
            class="table table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Título</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Cliente&Categoría</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                
                <?php foreach($lista_portafolio as $registros){ ?>
                <tr class="">
                    <td scope="col"><?php echo $registros['id'];?></td>
                    <td scope="col">
                        <h5><?php echo $registros['titulo'];?></h5>
                        <?php echo $registros['subtitulo'];?><br>
                        - <?php echo $registros['url'];?>
                    </td>
                    <td scope="col">
                    <img width="100" src="../../../assets/img/portfolio/<?php echo $registros['imagen'];?>" />
                </td>
                    <td scope="col"><?php echo $registros['descripcion'];?></td>
                    <td scope="col">
                        - <?php echo $registros['cliente'];?><br>
                        - <?php echo $registros['categoria'];?>
                </td>
                    <td scope="col">
                        <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registros['id']; ?>" role="button">Editar</a>
                        |
                        <a class="btn btn-danger" href="#" onclick="confirmarEliminar(event, '<?php echo $registros['id']; ?>')" role="button">Eliminar</a>
                </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
<?php include("../../templates/footer.php"); ?>