<?php include __DIR__ . '/partials/inicio-doc.part.php'; ?>
<?php include __DIR__ . '/partials/nav.part.php'; ?>

    <!-- Principal Content Start -->
    <div id="galeria">
        <div class="container">
            <div class="col-xs-12 col-sm-8 col-sm-push-2">
                <h1>Asociados</h1>
                <hr>
                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
                    <div class="alert alert-<?= empty($errores) ? 'info' : 'danger'; ?> alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php if (empty($errores)) : ?>
                            <p><?= $mensajeConfirmacion ?></p>
                        <?php else : ?>
                            <ul>
                                <?php foreach ($errores as $error) : ?>
                                    <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <form class="form-horizontal" action="asociado/nuevo" method="post"
                      enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="label-control">Imagen Logo</label>
                            <input class="form-control-file" type="file" name="imagen">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="label-control">Nombre</label>
                            <input class="form-control" type="text" name="nombre" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="label-control">Descripción</label>
                            <textarea class="form-control" name="descripcion"><?= $descripcion ?></textarea>
                            <button class="pull-right btn btn-lg sr-button">ENVIAR</button>
                        </div>
                    </div>
                </form>
                <hr class="divider"/>
                <div class="imagenes_galeria">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Logo</th>
                            <th>Nombre</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach (($asociados ??[]) as $asociado) {
                            echo "
                            <tr>
                                <th scope='row'>" . $asociado->getId() . "</th>
                                <td>
                                <img class='img-thumbnail' width='100px'
                                src='" . $asociado->getUrlLogo() . "' 
                                alt='" . $asociado->getDescripcion() . "' 
                                title='" . $asociado->getDescripcion() . "' </td>
                                <td>" . $asociado->getNombre() . "</td>
                            </tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Principal Content Start -->

<?php include __DIR__ . '/partials/fin-doc.part.php'; ?>

<?php include __DIR__ . '/partials/fin-doc.part.php'; ?>