<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/onTheWheel/constant.php');
include ROOTDIR . '/components/header.php';
include_once(ROOTDIR . '/config/database.php');


if (!isset($_SESSION['session_id'])) {
    header('Location: ../../index.php');
    exit;
}

?>

<html>

<head>

</head>

<body>
PROTECTED PAGE!
</body>

</html>