<?php
session_start();
require_once('../database/db.php');
include('layouts/header.php');
?>
<main>
    <div>
        <h1>Login Form</h1>
        <form action="login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username"><br>
            <label for="password">Password:&nbsp;</label>
            <input type="password" name="password" id="password"><br>
            <input class="button" type="submit" name="login" value="Login">
        </form>
        <p>Haven't registered? <a href="index.php">register here</a></p>
    </div>
</main>
<?php
include('layouts/footer.php');
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $passcode = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    if (isset($username) && isset($passcode)) {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($passcode, $row['password'])) {
                header("Location: home.php");
                $_SESSION["loggedIn"] = true;
                exit;
            } else {
                echo "<script>window.alert('incorrect password.');</script>";
            }
        } else {
            echo "<script>window.alert('You're not Registered!');</script>";
        }
    } else {
    }
} else {
}

?>
