<div class="col-sm">
    <h3>Contacto</h3>
    <p>Envía un correo electrónico:</p>
    <form class="form-group" method="post" action="<?php echo $_SERVER["PHP_SELF"]."?p=contacto";?>">
        <label>
            Nombre * <br>
            <input class="form-control" type="text" name="nombre" value="" required>
        </label>
        <label>
            Correo electrónico * <br>
            <input class="form-control" type="email" name="correo" value="" required>
        </label>
        <label>
            Asunto * <br>
            <input class="form-control" type="text" name="asunto" value="" required>
        </label>
        <br>
        <label>
            Mensaje * <br>
            <textarea class="form-control" name="mensaje" rows="5" cols="82" value="" required></textarea>
        </label>
        <br> <br>
        <button type="summit" class="btn btn-primary" name="enviar" value="Enviar">Enviar</button>
    </form>

    <?php
        $alerta = "Todos los campos con el asterisco ('*') son obligatorios.";
        if ( !empty($_POST) ) {
            $name = $_POST['nombre'];
            $emailSender = $_POST['correo'];
            $emailReceiver = "jeffreyissaul@hotmail.com";
            $subject = $_POST['asunto'];
            $message = $_POST['mensaje'];

            if ( !empty($name) && !empty($email) && !empty($subject) && !empty($message) ) {

                if ( filter_var($email, FILTER_VALIDATE_EMAIL) != false ) {
                    $full_message = "Est. ". $name ."\n". $subject; 
                    $was_send = mail($emailReceiver, $subject, "From: ". $emailSender ."\n". $full_message);

                    if ($was_send === true) {
                        $alerta = "El correo ha sido enviado correctamente.";
                    } else {
                        $alerta = "El correo no pudo ser enviado correctamente.";
                    }

                    echo "<p>". $alerta ."</p>";

                } else {
                    $alerta = "El correo electrónico introducido no es valido.";
                    echo "<p>". $alerta ."</p>";
                }

            } else {
                $alerta = "Verifique que los datos han sido introducidos correctamente.";
                echo "<p>". $alerta ."</p>";
            }
        }
        else {
            echo "<p>". $alerta ."</p>";
        }

    ?>
    
</div>