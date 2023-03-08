


<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand mb-0 h1 align-middle" href="index.php">
        <img src="img/waipt/Logo.jpg" alt="Logo" height=30px width=30px class="d-inline-block align-middle">
        What Am I Playing Today ?
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse mx-auto" id="navbarSupportedContent">
        <div class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php
            switch ($categoriePage) {
                case 'ACCUEIL':
                    echo '<li class="nav-item">
                        <a class="nav-link active" href="index.php">ACCUEIL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="catalogue.php">CATALOGUE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="classement.php">CLASSEMENT</a>
                    </li>';
                    break;
                
                case 'CATALOGUE':
                    echo '<li class="nav-item">
                    <a class="nav-link" href="index.php">ACCUEIL</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="catalogue.php">CATALOGUE</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="classement.php">CLASSEMENT</a>
                    </li>';
                    break;
                
                case 'CLASSEMENT':
                    echo '<li class="nav-item">
                    <a class="nav-link" href="index.php">ACCUEIL</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="catalogue.php">CATALOGUE</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="classement.php">CLASSEMENT</a>
                    </li>';
                    break;

                default:
                    echo '<li class="nav-item">
                    <a class="nav-link" href="index.php">ACCUEIL</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="catalogue.php">CATALOGUE</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="classement.php">CLASSEMENT</a>
                    </li>';
                    break;
            }
            
        ?>
            
        </div>
        
    </div>
   
    
        <?php
            if(!isset($_SESSION))
            {
                echo '<a class="btn btn-outline-success" type="button" href="connexion.php">Se connecter</a>';
            }
            else
            {
                if($_SESSION['connecte'] == true)
                {
                    echo '<a class="btn btn-outline-success" type="button" href="profil.php">Profil</a>';
                }
                else
                {
                    echo '<a class="btn btn-outline-success" type="button" href="connexion.php">Se connecter</a>';
                }
            }
        ?>
        
    </div>
</nav>

