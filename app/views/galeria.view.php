<?php
use cursophp7\app\repository\CategoriaRepository;
use cursophp7\core\App;

include __DIR__ . '/partials/inicio-doc.part.php'; ?>

<?php include __DIR__ . '/partials/nav.part.php'; ?>

<!-- Principal Content Start -->
<div id="galeria">
    <div class="container">
        <div class="col-xs-12 col-sm-8 col-sm-push-2">
            <h1>GALERÍA</h1>
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
            <form class="form-horizontal" action="imagenes-galeria/nueva" method="post"
                  enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Imagen</label>
                        <input class="form-control-file" type="file" name="imagen">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control">Categoría</label>
                        <select class="form-control" name="categoria">
                            <?php foreach ($categorias as $categoria){
                                echo "
                                    <option value='".$categoria->getId()."'>".$categoria->getNombre()."</option>";
                            }?>
                        </select>
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
                        <th>Imagen</th>
                        <th>Categoría</th>
                        <th>Visualizaciones</th>
                        <th>Likes</th>
                        <th>Descargas</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach (($imagenes ??[]) as $imagen) {
                        echo "
                            <tr>
                                <th scope='row'>" . $imagen->getId() . "</th>
                                <td>
                                <img class='img-thumbnail' width='100px'
                                src='" . $imagen->getUrlGallery() . "' 
                                alt='" . $imagen->getDescripcion() . "' 
                                title='" . $imagen->getDescripcion() . "' </td>
                                <td>" . App::getRepository(CategoriaRepository::class)->find($imagen->getCategoria())->getNombre() . "</td>
                                <td>" . $imagen->getNumVisualizaciones() . "</td>
                                <td>" . $imagen->getNumLikes() . "</td>
                                <td>" . $imagen->getNumDownloads() . "</td>
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
