<?php 

include("../../db.php");

if(isset($_GET['txtID'])){
    // Recuperar los datos del ID correspondiente (seleccionado)
    $txtID=( isset($_GET['txtID']) )?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("SELECT * FROM tbl_config WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    $nombreconfig=$registro['nombreconfig'];
    $valor=$registro['valor'];
}

if($_POST){

    // Recepcionamos los valoresd del formulario
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $nombreconfig=(isset($_POST['nombreconfig']))?$_POST['nombreconfig']:"";
    $valor=(isset($_POST['valor']))?$_POST['valor']:"";
    
    $sentencia=$conexion->prepare("UPDATE tbl_config 
    SET 
    nombreconfig=:nombreconfig, 
    valor=:valor
    WHERE id=:id ");

    $sentencia->bindParam(":nombreconfig",$nombreconfig);
    $sentencia->bindParam(":valor",$valor);
    $sentencia->bindParam(":id",$txtID);

    $sentencia->execute();

    $mensaje="Registro modificado con éxito.";
    header("Location:index.php?mensaje=".$mensaje);
}

include("../../templates/header.php"); 

?>

<div class="card">
    <div class="card-header">
        Configuración
    </div>
    <div class="card-body">

    <form action="" method="post">
        <div class="mb-3">
            <label for="txtID" class="form-label">ID: </label>
            <input
                readonly type="text"
                class="form-control"
                value="<?php echo $txtID;?>"
                name="txtID"
                id="txtID"
                aria-describedby="helpId"
                placeholder="id"
            />
        </div>

        <div class="mb-3">
            <label for="nombreconfig" class="form-label">Nombre:</label>
            <input
                type="text"
                class="form-control"
                value="<?php echo $nombreconfig;?>"
                name="nombreconfig"
                id="nombreconfig"
                aria-describedby="helpId"
                placeholder="Nombre de la configuración"
            />
            
        </div>
         <div class="mb-3">
            <label for="valor" class="form-label">Valor:</label>
            <input
                type="text"
                class="form-control"
                name="valor"
                value="<?php echo $valor;?>"
                id="valor"
                aria-describedby="helpId"
                placeholder="Valor de la configuración"
            />
         </div>

    <button type="submit" class="btn btn-success">Actualizar</button>

    <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        
    </form>
        
    </div>
    <div class="card-footer text-muted">
        
    </div>
</div>

<?php include("../../templates/footer.php"); ?>