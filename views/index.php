<?php
require_once('../database/db.php');
?>
<?php
include('layouts/header.php');
?>
<main>
    <div>
        <h1>Registration Form</h1>
        <form action="index.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username"><br>
            <label for="password">Password:&nbsp;</label>
            <input type="password" name="password" id="password"><br>
            <input class="button" type="submit" name="register" value="Register">
        </form>
        <p>Already registered? <a href="login.php">login here</a></p>
    </div>

</main>
<?php
include('layouts/footer.php');
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $passcode = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    if (!empty($username) && !empty($passcode)) {
        $hash = password_hash($passcode, PASSWORD_DEFAULT);
        try {
            $sql = "INSERT INTO users(username,password) VALUES ('$username', '$hash')";
            $stmt = mysqli_query($conn, $sql);
        } catch (mysqli_sql_exception) {
            echo "<script>window.alert('That username is already taken.');</script>";
        }
        if ($stmt) {
            header("Location: login.php");
            exit;
        } else {
            echo "<script>window.alert('Registration Failed, Try Again.');</script>";
        }
    } else {
        echo "<script>window.alert('Empty Username or Password.');</script>";
    }
}

?>