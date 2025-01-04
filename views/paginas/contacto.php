
<h1 class="fw-300 centrar-texto">Contacto</h1>

<?php if ($mensaje) { ?>
    <p class="alerta exito"><?php echo $mensaje; ?></p>
<?php } ?>

<main class="contenedor seccion contenido-centrado">
    <img src="/build/img/destacada3.jpg" alt="Imagen Principal">
    <h2 class="fw-300 centrar-texto">Llena el formulario de Contacto</h2>

    <form class="formulario" action="" method="post">
        <fieldset>
            <legend>Información Personal</legend>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" placeholder="Tu Nombre" name="contacto[nombre]" >

            <label for="mensaje">Mensaje: </label>
            <textarea id="mensaje" name="contacto[mensaje]" ></textarea>

        </fieldset>


        <fieldset>
            <legend>Información sobre Propiedad</legend>
            <label for="opciones">Vende o Compra</label>
            <select id="opciones" name="contacto[tipo]" >
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="cantidad">Cantidad:</label>
            <input type="number" min="0" max="100" step="5" id="cantidad" name="contacto[cantidad]" >
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>

            <p>Como desea ser Contactado:</p>

            <div class="forma-contacto">
                <label for="telefono">Teléfono</label>
                <input type="radio" name="contacto[contacto]" value="telefono" id="telefono" >

                <label for="correo">E-mail</label>
                <input type="radio" name="contacto[contacto]" value="correo" id="correo" >
            </div>

            <div id="contacto"></div>

        </fieldset>

        <input type="submit" value="Enviar" class="boton boton-verde">

    </form>
</main>
