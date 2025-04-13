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
</main>
<?php
include('layouts/footer.php');
?>