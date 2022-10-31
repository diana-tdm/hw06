<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once "$path/system/db.php";
?>

<?php require_once "$path/components/head.php"; ?>
<body>
    <div class="container">
        <?php require_once "$path/components/header.php"; ?>
        <main class="main">
            <a href="/public/login.php"><button class="main__btn">Log In</button></a>
            <a href="/public/signup.php"><button class="main__btn">Sign Up</button></a>           
        </main>
        <?php require_once "$path/components/footer.php";  ?>
    </div>    
</body>
</html>   