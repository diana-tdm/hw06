<?php
session_start();
$path = $_SERVER['DOCUMENT_ROOT'];
require_once "$path/system/db.php";

if(isset($_POST['send'])){
    $query = $db -> query("SELECT * FROM users WHERE login = '$_POST[login]'");
    $numRows = $query -> num_rows;
    $password = $query -> fetch_assoc()['password'];
    if($numRows > 0){
        if(password_verify($_POST['password'], $password)){
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['auth'] = true;
            header("Location: /public/chat.php");
        }
    }
}
?> 

<?php require_once "$path/components/head.php"; ?>

<body>
    <div class="container">
        <?php require_once "$path/components/header.php"; ?>
        <main class="main__signup">
            <div class="signup">
                <h3>Log In</h3>
                <form action="" method="post">
                    <input type="text" name="login" id="login" placeholder="Login">
                    <input type="password" name="password" id="password" placeholder="Password">
                    <button type="submit" name="send">Log In</button>                  
                </form>
            </div>
        </main>
        <?php require_once "$path/components/footer.php";?>
    </div>
</body>
</html>