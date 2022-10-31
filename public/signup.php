<?php
session_start();
$path = $_SERVER['DOCUMENT_ROOT'];
require_once "$path/system/db.php";

if(isset($_POST['send'])){

    $_POST['login'] = trim($_POST['login']); // убирает все пробелы вокруг значения

    $errors = [];
   if($_POST['login']==""){
    $errors[] = "Введите логин";     
   }
   if($_POST['password']==""){
    $errors[] = "Введите пароль";     
   }
   if($_POST['password']!=$_POST['password2']){
    $errors[] = "Пароли не совпадают";     
   }

   if(empty($errors)){
    $passwordHash = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $db -> query("INSERT INTO `users`(`login`,`password`) VALUE('$_POST[login]', '$passwordHash')");
    header("Location: /public/login.php");
   }
   else{
    echo $errors[0];
   }
}
?>

<?php require_once "$path/components/head.php"; ?>

<body>
    <div class="container">
        <?php require_once "$path/components/header.php"; ?>
        <main class="main__signup">
            <div class="signup">
                <h3>Sign Up</h3>
                <form action=""  method="post" id="signupForm">
                    <input type="text" name="login" id="login" placeholder="Login" autocomplete="off">
                    <div class="result" id="resultSearchLogin"></div>
                    <input type="password" name="password" id="password" placeholder="Password">
                    <input type="password" name="password2" id="password2" placeholder="Password2">
                    <button type="submit" name="send">Sign Up</button>                  
                </form>

            </div>
        </main>
        <?php require_once "$path/components/footer.php";?>
    </div>

    <script>

        login.oninput = ()=>{
            if(login.value.length<3){
                login.style.border = "3px solid red";
                resultSearchLogin.innerHTML = " ";          
            }
            else{
                login.style.border = "3px solid #89c249";
                $.ajax({
                    url:"/system/searchLogin.php",
                    type:"post",
                    data:{
                        "login":login.value
                    },
                    success: data =>{
                        resultSearchLogin.innerHTML = data;
                    }
                })
                
            }
        }

        signupForm.onsubmit = ()=>{
            if(login.value.length<3){
                alert("Логин должен быт больше 3 символов");
                login.style.border = "1px solid red";
                return false;               
            }
        }
    </script>
</body>
</html>