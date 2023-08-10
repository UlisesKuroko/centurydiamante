<?php 

require 'includes/config/database.php';
$db = conectarDB();
//autenticas usuario

$errores = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

 //   echo"<pre>";
//var_dump($_POST);
//echo"</pre>";

$email = mysqli_real_escape_string($db,  filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL) );
$password = mysqli_real_escape_string($db,  $_POST['password']);

if(!$email) {
    $errores[] = "El email es obligatorio o no es válido";
}

if(!$password) {
    $errores[] = "El Password es obligatorio";
}

if(empty($errores)) {
   // revisar si el usuario existe

   $query = "SELECT * FROM usuarios WHERE email = '${email}' ";
   $resultado = mysqli_query($db, $query);



if ($resultado->num_rows) {
    //revisar si el password es correcto

    $usuario = mysqli_fetch_assoc($resultado);


 //verificar si el password es correcto

 
 $auth = password_verify($password, $usuario['password']);

if ($auth) {
  session_start();

//llenar el arreglo de la sesion

$_SESSION['usuario'] = $usuario['email']; 
$_SESSION['login'] = true; 


header('Location: /bienesraices/admin/index.php');

}else {
 $errores [] ='El password no es correcto';
}


}else {
   $errores [] ="El Usuario no existe";
}

}

}


//header
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesion</h1>

<?php foreach ($errores as $error):?>
<div class="alerta error">

<?php echo $error;?>
</div>

<?php endforeach;?>


<form method="POST" class="formulario" novalidate>

<fieldset>
        <legend>Email y Password</legend>

        <Label for="email">E-Mail</Label>
        <input type="email" name="email" placeholder="Tu Email" id="email" >

        <Label for="password">Password</Label>
        <input type="password" name="password" placeholder="Tu Password" id="password" >

      
    </fieldset>
<input type="submit" value="Iniciar Sesion" class="boton boton-verde">

</form>

</main>

<?php 
    incluirTemplate('footer');
?>