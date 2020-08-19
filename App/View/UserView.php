
<?PHP include("header.php")?>
<main class="row">

    <ul class="navig col l2">

        <li><a>Home</a></li>
        <li><a>Article</a></li>
        <li><a>Logout</a></li>
        
    </ul>

    <div class="col l10">
    <div class="container">
        <h1>Personnal Informations</h1>
        <hr>

        <?PHP 

            echo "<p><strong>Username: </strong>" . $Username . " </p>";
            echo "<p><strong>Email: </strong>" . $email . " </p>";
        ?>
    </div>
    </div>


</main>