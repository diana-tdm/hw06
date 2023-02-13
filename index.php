<?php
$path = $_SERVER['DOCUMENT_ROOT'];
session_start();
require_once "$path/system/db.php";
if(isset($_POST['exitSystem'])){
    unset($_SESSION['login']);
    unset( $_SESSION['auth']);
    $db -> query("UPDATE online SET time_out = 0 WHERE login = '$_session[login] '");
    header("Location: /index.php");
}
?>

<?php require_once "$path/components/head.php"; ?>
<body>
    <div class="container">
        <?php require_once "$path/components/header.php"; ?>
        <main class="main">
            <?php
            if (isset($_SESSION['login'])){
                echo "<a href='/public/chat.php'><button class='main__btn'>Chat</button></a>";
                echo "<form action='' method='post'><button name='exitSystem' id='exitSystem' class='main__btn'>Exit</button></form>";
            }
            else{?>
            <a href="/public/login.php"><button class="main__btn">Log In</button></a>
            <a href="/public/signup.php"><button class="main__btn">Sign Up</button></a>
            <?php } ?>        
        </main>
        <?php require_once "$path/components/footer.php";  ?>
    </div>
</body>
</html>   