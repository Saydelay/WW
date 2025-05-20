<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$users = json_decode(file_get_contents('users.json'), true);

foreach ($users as $user) {
    if ($user['username'] === $username && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.html");
        exit();
    }
}
echo "Login fehlgeschlagen. <a href='index.html'>Zurück</a>";
?>
