<?php
session_start();
if ($_SESSION["loggedIn"] !== true) {
    header("Location: login.php");
    exit;
}
include('layouts/header.php');
?>
<main>
    <h1>Welcome</h1>
    <p>You are successfully logged into home page</p>
    <form action="home.php" method="get">
    <input type="submit" value="Log Out" name="logout">
    </form>
    <?php
    if (!empty($_GET["logout"])) {
        session_destroy();
        header("Location: login.php");
    }
    ?>
</main>
<?php
include('layouts/footer.php');
?>