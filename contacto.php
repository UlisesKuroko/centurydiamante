<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>
<main class="contenedor seccion">

<h1>Century 21 Diamante</h1>
    <div class="contenido-nosotros">
        <div class="imagen">
        <picture>
    <source srcset="build/img/century.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/century.jpg" alt="century">
        
    </picture>
        </div>

        <di0 class="texto-nosotros">
<blockquote>
  Contacta Con Nosotros
</blockquote>
<p>
    Estamos Ubicados en:
    Av Lincenciado Benito Juáres Pte 108-A
    Planta Alta Col.Centro
    San Juan del Rio Diamante
<p>
 Manda Tu Mensaje: Ventas@c21diamantente.com

 <p>
  Llama a Nuestros Telefonos: 427 236 84 96 o 427 236 89 14
</p>
        </div>

    </div>


    <h1>Contacto</h1>
    <picture>
      <source srcset="build/img/unete.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/unete.jpg" alt="century">
          
 </picture>
 <h2>Llene el Formulario de Contacto</h2>
 <form class="formulario" >
    <fieldset>
        <legend>Informacion Personal</legend>
        <Label for="nombre">Nombre</Label>
        <input type="text" placeholder="Tu Nombre" id="nombre">

        <Label for="email">E-Mail</Label>
        <input type="email" placeholder="Tu Email" id="email">

        <Label for="telefono">Telefono</Label>
        <input type="tel" placeholder="Tu Telefono" id="telefono">

        <Label for="mensaje">Mensaje</Label>
        <textarea  id="mensaje"></textarea>
    </fieldset>

<fieldset>
    <legend>Informacio de Propiedad</legend>
    <Label for="opciones">Vende o Compra</Label>
    <select  id="opciones">
        <option value="" disabled selected>--Seleccione--</option>
        <option value="Compra">Compra</option>
        <option value="Vende">Vende</option>
    </select>

    <Label for="presupuesto">Precio o Presupuesto</Label>
        <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto">
</fieldset>

<fieldset>
    <legend>Informacio de Propiedad</legend>
  <p>Como desea ser Contactado</p>

  <div class="forma-contacto">
    <label for="contactar-telefono">Telefono</label>
    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

    <label for="contactar-email">E-Mail</label>
    <input name="contacto" type="radio" value="email" id="contactar-email">
  </div>
  <p>Si eligio telefono eliga la fecha y la hora</p>

  <Label for="fecha">Fecha</Label>
  <input type="date"  id="fecha">

  <Label for="hora">Hora</Label>
  <input type="time"  id="hora" min="09:00" max="20:00">

</fieldset>



    <input type="submit" value="Enviar" class="boton-verde">


 </form>
</main>

<?php 
    incluirTemplate('footer');
?>