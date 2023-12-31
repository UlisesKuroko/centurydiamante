<?php


require '../../includes/funciones.php';
$auth = estaAutenticado();

if(!$auth) {
    header('Location: /bienesraices/index.php');
}


   $id = $_GET['id'];
   $id = filter_var($id, FILTER_VALIDATE_INT);




//redireccion

if(!$id) {
    header('Location: /bienesraices/admin/index.php');
}


//base de datos

require '../../includes/config/database.php';

$db = conectarDB();

//obtener los datos de la propiedad
$consulta = "SELECT * FROM propiedades WHERE id = ${id} ";
$resultado = mysqli_query($db, $consulta);
$propiedad = mysqli_fetch_assoc($resultado);
    
    /*echo "<pre>";
var_dump($propiedad);
echo"</pre>";*/

//consultar para obtener a los vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);



//arreglo con errores

$errores =  [];

$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$descripcion = $propiedad['descripcion'];
$habitaciones = $propiedad['habitaciones'];
$wc = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedorId = $propiedad['vendedores_id'];
$imagenPropiedad = $propiedad['imagen'];

//ejecutar despues de enviar
if($_SERVER  ['REQUEST_METHOD'] === 'POST'){
    
    
    
   /* echo "<pre>";
    var_dump($_POST);
    echo"</pre>";



    /*echo "<pre>";
    var_dump($_FILES);
    echo"</pre>";*/





    $titulo = mysqli_real_escape_string( $db,  $_POST['titulo'] );
    $precio = mysqli_real_escape_string( $db,  $_POST['precio'] );
    $descripcion = mysqli_real_escape_string( $db,  $_POST['descripcion'] );
    $habitaciones = mysqli_real_escape_string( $db,  $_POST['habitaciones'] );
    $wc = mysqli_real_escape_string( $db,  $_POST['wc'] );
    $estacionamiento = mysqli_real_escape_string( $db,  $_POST['estacionamiento'] );
    $vendedorId = mysqli_real_escape_string( $db,  $_POST['vendedor'] );
    $creado = date('Y/m/d');

//imagenes

$imagen = $_FILES ['imagen'];


if(!$titulo) {
    $errores[] = "Debes añadir un titulo";
}

if(!$precio) {
    $errores[] = 'El Precio es Obligatorio';
}

if( strlen( $descripcion ) < 50 ) {
    $errores[] = 'La descripción es obligatoria y debe tener al menos 50 caracteres';
}

if(!$habitaciones) {
    $errores[] = 'El Número de habitaciones es obligatorio';
}

if(!$wc) {
    $errores[] = 'El Número de Baños es obligatorio';
}

if(!$estacionamiento) {
    $errores[] = 'El Número de lugares de Estacionamiento es obligatorio';
}

if(!$vendedorId) {
    $errores[] = 'Elige un vendedor';
}




// validar por tamaño

$medida = 1000 * 1000;


if($imagen['size'] > $medida ) {
    $errores[] = 'La Imagen es muy pesada';
}



/*echo "<pre>";
    var_dump($errores);
    echo"</pre>";*/

   //revisar que el arreglo de errores este vacio
   
   if (empty($errores)) {




//subida de archivo

//crear carpeta
$carpetaImagnes = '../../imagenes/';
if (!is_dir($carpetaImagnes)) {
    mkdir($carpetaImagnes);
}

$nombreImagen = '';


if ($imagen['name']) {
 //eliminar

unlink($carpetaImagnes . $propiedad['imagen']);
 
//generar nombre unico

$nombreImagen = md5(uniqid(rand(), true )) . ".jpg";


//subir imagen
move_uploaded_file($imagen['tmp_name'],$carpetaImagnes . $nombreImagen );


}else{
  $nombreImagen  = $propiedad['imagen'];
}








   
//insertar en la base de datos
$query = " UPDATE propiedades SET titulo = '${titulo}', precio = '${precio}', imagen = '${nombreImagen}',  descripcion = '${descripcion}', habitaciones = ${habitaciones}, wc = ${wc}, estacionamiento = ${estacionamiento}, vendedores_id = ${vendedorId} WHERE id = ${id} ";


$resultado = mysqli_query($db, $query);

if ($resultado) {
   //rediccionar

header('Location: /bienesraices/admin/index.php?resultado=2');


}

}


   }






   
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Actualizar</h1>

        <a href="/bienesraices/admin/index.php" class="boton-verde">Volver</a>


        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST"  enctype="multipart/form-data">

        <fieldset>
            <legend>Informacion General</legend>

            <label for="titulo ">Titulo</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo" value="<?php echo $titulo; ?>">

            <label for="precio ">Precio</label>
            <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

            <label for="imagen ">Imagen</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

            <img src="/bienesraices/imagenes/<?php echo $imagenPropiedad; ?>" class="imagen-small">

<label for="descripcion">Descripcion</label>
<textarea  id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion de la Propiedad</legend>

            <label for="habitaciones ">Habitaciones</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3"  min="1" max="9" value="<?php echo $habitaciones; ?>">

            <label for="wc ">Baños</label>
            <input type="number" id="wc" name="wc" placeholder="Ej: 3"  min="1" max="9" value="<?php echo $wc; ?>">

            
            <label for="estacionamiento ">Estacionamientos</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3"  min="1" max="9" value="<?php echo $estacionamiento; ?>">


        </fieldset>

<fieldset>
    <legend>Vendedor</legend>

    <select name="vendedor">
    <option value="">-- Seleccione --</option>

    <?php while($vendedor =  mysqli_fetch_assoc($resultado)):?>
        <option  <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?>   value="<?php echo $vendedor['id']; ?>"> <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?> </option>
    <?php endwhile;?>

    </select>
</fieldset>


<input type="submit" value="Actualizar Propiedad" class="boton boton-verde">

        </form>

    </main>


<?php 
    incluirTemplate('footer');
?>