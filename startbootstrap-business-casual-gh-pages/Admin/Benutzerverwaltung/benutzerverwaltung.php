<?php
session_start();
require('header_ben.php');
?>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item px-lg-4">
                        <a class="nav-link text-expanded" href="../../index.php">Hauptseite</a>
                    </li>
                    <li class="nav-item px-lg-4">
                        <a class="nav-link text-expanded" href="../../Produkte/produkte.php">Produkte</a>
                    </li>
                    <li class="nav-item px-lg-4">
                        <a class="nav-link text-expanded" href="../../Warenkorb/warenkorb.php">Warenkorb</a>
                    </li>
                    <li class="nav-item px-lg-4">
                        <a class="nav-link text-expanded" href="../../Benutzer/profil.php">Dein Profil<a>
                    </li>
                    <?php
                    if($_SESSION['admin'] == 1)
                    {
                        ?>
                        <li class="nav-item px-lg-4">
                            <a class="nav-link text-expanded" href="../admin.php">Adminbereich
                            </a>
                        </li>
                        <li class="nav-item active px-lg-4">
                            <a class="nav-link text-expanded" href="../admin.php">Zurück
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

<!--Hier Programmtext-->
<?php
    $pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

    $statement = $pdo->prepare("SELECT ID, Vorname, Name FROM benutzer");
    if($statement->execute())
    {
        echo'<div style="width: 25%; text-align: center; margin: auto; text-decoration: none; color: white; font-family: Arial;">';

        while ($row = $statement->fetch())
        {
            echo '
                <tr>
                    <form method="POST" action="update_Benutzer.php" accept-charset="UTF-8">
                        <div class="intro-button mx-auto">
                            <input type="hidden" name="id" value="'. utf8_encode($row['ID']) .'">
                            <input class="btn btn-primary btn-xl" type="submit" name="submit" value="'. utf8_encode($row['Vorname']) .' '. utf8_encode($row['Name']) .'">
                        </div>
                    </form>
                </tr>
                <br/>';
        }
        echo '</div>';
    }
?>

<br/>

<div style="width: 25%; text-align: center; margin: auto; text-decoration: none; color: white; font-family: Arial;">
    <div class="intro-button mx-auto">
        <a class="btn btn-primary btn-xl" href="neuer_Benutzer.php">Neuen Benutzer anlegen</a>
    </div>
</div>
<?php
require('footer_ben.php');
?>