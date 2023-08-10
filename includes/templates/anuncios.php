<?php 
//impotar la base 
require __DIR__ . '/../config/database.php';
$db = conectarDB();
//consultar 

$query = "SELECT * FROM propiedades LIMIT ${limite}";



//obtener resultados
$resultado = mysqli_query($db, $query);

?>



<div class="contenedor-anuncios">
        
<?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
        
        
                    <div class="anuncio">
                        
                    <img loading="lazy" src="/bienesraices/imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio">
                        
                        <div class="contenido-anuncio">
                        <h3><?php echo $propiedad['titulo']; ?></h3>
                <p><?php echo $propiedad['']; ?></p>
                <p class="precio">$<?php echo $propiedad['precio']; ?></p>
                            <ul class="iconos-caracteristicas">
                                <li>
                                   <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                                   <p><?php echo $propiedad['wc']; ?></p> 
                                </li>
                                <li>
                                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                                    <p><?php echo $propiedad['estacionamiento']; ?></p> 
                                 </li>
                                 <li>
                                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitacion">
                                    <p><?php echo $propiedad['habitaciones']; ?></p> 
                                 </li>
                            </ul>
                            <a href="/bienesraices/anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton boton-amarillo-block">
                                Ver Propiedad
                            </a>
                        </div> <!--.CONTENIDO-Anuncio-->
                                </div><!--.Anuncio-->
                                <?php endwhile; ?>                 
        
    </div><!--.Contenedor-Anuncios-->

    <?php 
    
    //cerrar conexion
    mysqli_close($db);
    ?>
