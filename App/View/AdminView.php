<main class="row">
<ul class="navig col l2">

<li><a>Home</a></li>
<li><a>Article</a></li>
<li><a>Logout</a></li>

</ul>

<div class="col l10">
<div class="container">
<h1>Admin Panel</h1>
<hr>

<h3>Add User</h3>
<a class="waves-effect waves-light btn">Add</a>
<hr>
<?PHP 

    echo $state;
?>

<h3>Remove User</h3>
<a class="waves-effect waves-light btn">Remove</a>
<hr>
<?PHP 

    echo $state;
?>

<h3>View User</h3>
<hr>
<?PHP 

    echo "<p><strong>Username: </strong>" . $Username . " </p>";
    echo "<p><strong>Email: </strong>" . $email . " </p>";
?>

<hr>
<h1>Article</h1>

<h3>Add Article</h3>
<a class="waves-effect waves-light btn">Add</a>
<hr>
<?PHP 

    echo $state;
?>

<h3>Remove Article</h3>
<a class="waves-effect waves-light btn">Remove</a>
<hr>
<?PHP 

    echo $state;
?>
</div>

</div>

</main>