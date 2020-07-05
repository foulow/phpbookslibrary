<div id="cabecera" class="jumbotron jumbotron-fluid ">
    <div class="container">
        <header>
            <h1 class="display-4 text-center">Bienvenido a la Librería en línea</h1>
            <hr>
            <nav class="fixed-top" aria-label="breadcrumb">
                <?php if ($p == "principal") { ?>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Principal</li>
                        <li class="breadcrumb-item"><a href="?p=contacto">Contacto</a></li>
                    </ol>
                <?php } else { ?>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="?p=principal">Principal</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contacto</li>
                        </ol>
                <?php } ?>
            </nav>
        <header>
    </div>
</div>