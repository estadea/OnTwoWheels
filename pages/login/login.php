
<?php
//echo var_dump($_SERVER);
//echo $_SERVER['DOCUMENT_ROOT'].'/constant.php';
include_once($_SERVER['DOCUMENT_ROOT'].'/onTheWheel/constant.php');
include ROOTDIR . '/components/header.php';
include_once(ROOTDIR . '/config/database.php');


if (isset($_SESSION['session_id'])) {
    header('Location: ../../index.php');
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    

    if (empty($username) || empty($password)) {
        $msg = 'Inserisci username e password';
    } else {
        $query = "
            SELECT username, password
            FROM users
            WHERE username = :username
        ";

        $check = $pdo->prepare($query);
        $check->bindParam(':username', $username, PDO::PARAM_STR);
        $check->execute();

        $user = $check->fetch(PDO::FETCH_ASSOC);

        if (!$user || password_verify($password, $user['password']) === false) {

            echo "Credenziali utente errate";
        } else {
            session_regenerate_id();
            $_SESSION['session_id'] = session_id();
            $_SESSION['session_user'] = $user['username'];

            header('Location: ../../index.php');
            exit;
        }
    }

}
?>

<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <form method="post" action="login.php">
        <h1>Login</h1>
        <input type="text" id="username" placeholder="Username" name="username">
        <input type="password" id="password" placeholder="Password" name="password">
        <button type="submit" name="login">Accedi</button>
    </form>

    
    <form method="post" action="../signup/signup.php">
        <h1>Registrazione</h1>
        <input type="text" id="username" placeholder="Username" name="username" maxlength="50" required>
        <input type="password" id="password" placeholder="Password" name="password" required>
        <button type="submit" name="register">Registrati</button>
    </form>

</body>

</html>

