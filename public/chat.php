<?php
session_start();
$path = $_SERVER['DOCUMENT_ROOT'];
require_once "$path/system/db.php";
if(empty($_SESSION['login'])){
    header("Location: /public/login .php");
}

?> 

<?php require_once "$path/components/head.php"; ?>

<body>
    <div class="container">
        <?php require_once "$path/components/header.php"; ?>
        <main class="main__chat">
           
        </main>
        <?php require_once "$path/components/footer.php";?>
    </div>
</body>
</html>