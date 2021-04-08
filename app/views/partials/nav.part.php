<!-- Navigation Bar -->
<nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">
                <span>[PHOTO]</span>
            </a>
        </div>
        <div class="collapse navbar-collapse navbar-right" id="menu">
            <ul class="nav navbar-nav">
                <li class="<?php echo cursophp7\app\utils\Utils::esOpcionMenuActiva('index') ? "active lien" : "lien"; ?>">
                    <a href="<?php echo cursophp7\app\utils\Utils::esOpcionMenuActiva('index') ? "#" : "/"; ?>">
                        <i class="fa fa-home sr-icons"></i> Home</a></li>
                <li class="<?php echo cursophp7\app\utils\Utils::esOpcionMenuActiva('about') ? "active lien" : "lien"; ?>">
                    <a href="<?php echo cursophp7\app\utils\Utils::esOpcionMenuActiva('about') ? "#" : "/about"; ?>">
                        <i class="fa fa-bookmark sr-icons"></i> About</a></li>
                <li class="<?php echo cursophp7\app\utils\Utils::existeOpcionMenuActivaEnArray(array('blog', 'post')) ? "active lien" : "lien"; ?>">
                    <a href="<?php echo cursophp7\app\utils\Utils::esOpcionMenuActiva('blog') ? "#" : "/blog"; ?>">
                        <i class="fa fa-file-text sr-icons"></i> Blog</a></li>
                <li class="<?php echo cursophp7\app\utils\Utils::esOpcionMenuActiva('contact') ? "active lien" : "lien"; ?>">
                    <a href="<?php echo cursophp7\app\utils\Utils::esOpcionMenuActiva('contact') ? "#" : "/contact"; ?>">
                        <i class="fa fa-phone-square sr-icons"></i> Contact</a></li>
                <li class="<?php echo cursophp7\app\utils\Utils::esOpcionMenuActiva('imagenes-galeria') ? "active lien" : "lien"; ?>">
                    <a href="<?php echo cursophp7\app\utils\Utils::esOpcionMenuActiva('imagenes-galeria') ? "#" : "/imagenes-galeria"; ?>">
                        <i class="fa  fa-image sr-icons"></i> Galería</a></li>
                <li class="<?php echo cursophp7\app\utils\Utils::esOpcionMenuActiva('asociados') ? "active lien" : "lien"; ?>">
                    <a href="<?php echo cursophp7\app\utils\Utils::esOpcionMenuActiva('asociados') ? "#" : "/asociados"; ?>">
                        <i class="fa fa-hand-o-right sr-icons"></i> Asociados</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- End of Navigation Bar -->