<?php include __DIR__ . '/partials/inicio-doc.part.php'; ?>
<?php include __DIR__ . '/partials/nav.part.php'; ?>

    <!-- Principal Content Start -->
    <div id="contact">
        <div class="container">
            <div class="col-xs-12 col-sm-8 col-sm-push-2">
                <h1>CONTACT US</h1>
                <hr>
                <p>Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
                <!-- Validations -->
                <?php
                $fields = ['nombre' => "", 'apellidos' => "", 'asunto' => "", 'email' => "", 'texto' => ""];
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $valid = true;
                    foreach ($fields as $field => $value) {
                        if ($_POST[$field] == "") {
                            if ($field != 'apellidos' && $field != 'texto') {
                                $valid = false;
                                echo "<div class='alert alert-warning' role='alert'>
                                <strong>Recuerde!</strong> El campo $field es obligatorio.
                              </div>";
                            }
                        } else {
                            $fields[$field] = trim(htmlspecialchars($_POST[$field]));
                        }
                        if ($field == 'email' && filter_var($_POST[$field], FILTER_VALIDATE_EMAIL) === false) {
                            $valid = false;
                            echo "<div class='alert alert-warning' role='alert'>
                                <strong>Recuerde!</strong> El campo $field debe ser un email.
                              </div>";
                        }
                    }
                }
                ?>
                <form class="form-horizontal" action="contact/nuevo" method="post">
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label class="label-control">Nombre</label>
                            <input class="form-control" type="text" name="nombre"
                                   value="<?= $fields['nombre']; ?>">
                        </div>
                        <div class="col-xs-6">
                            <label class="label-control">Apellidos</label>
                            <input class="form-control" type="text" name="apellidos"
                                   value="<?= $fields['apellidos']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="label-control">Email</label>
                            <input class="form-control" type="text" name="email" value="<?= $fields['email']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="label-control">Asunto</label>
                            <input class="form-control" type="text" name="asunto" value="<?= $fields['asunto']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="label-control">Mensaje</label>
                            <textarea class="form-control" name="texto"><?= $fields['texto']; ?></textarea>
                            <button class="pull-right btn btn-lg sr-button">SEND</button>
                        </div>
                    </div>
                </form>
                <!-- Validations -->
                <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if ($valid) {
                            echo "<div class='alert alert-success' role='alert'>
                                                    Los campos introducidos son:<br>
                                                    <ul>";
                            foreach ($fields as $field => $value) {
                                echo "<li><strong>" . ucwords(str_replace('_', ' ', $field)) . ": </strong>$value</li>";
                            }
                            echo "</ul>
                                              </div>";
                        }
                    }
                ?>
                <hr class="divider">
                <div class="address">
                    <h3>GET IN TOUCH</h3>
                    <hr>
                    <p>Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit
                        vero.</p>
                    <div class="ending text-center">
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-facebook sr-icons"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-twitter sr-icons"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-google-plus sr-icons"></i></a>
                            </li>
                        </ul>
                        <ul class="list-inline contact">
                            <li class="footer-number"><i class="fa fa-phone sr-icons"></i> (00228)92229954</li>
                            <li><i class="fa fa-envelope sr-icons"></i> kouvenceslas93@gmail.com</li>
                        </ul>
                        <p>Photography Fanatic Template &copy; 2017</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Principal Content Start -->
<?php include __DIR__ . '/partials/fin-doc.part.php'; ?>