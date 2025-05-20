<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newUser = [
        "username" => $_POST['username'],
        "password" => password_hash($_POST['password'], PASSWORD_DEFAULT)
    ];

    $file = 'users.json';
    $users = json_decode(file_get_contents($file), true);
    $users[] = $newUser;

    file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));
    echo "Registrierung erfolgreich. <a href='index.html'>Login</a>";
}
?>
