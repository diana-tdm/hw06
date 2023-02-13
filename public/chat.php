<?php
session_start();
$path = $_SERVER['DOCUMENT_ROOT'];
require_once "$path/system/db.php";
if(empty($_SESSION['login'])){
    header("Location: /public/login.php");
}

$time = time();
$searchOnline = $db -> query("SELECT * FROM online WHERE login = '$_SESSION[login]'");

if($searchOnline -> num_rows > 0 ){
$db -> query("UPDATE online SET time_out = $time WHERE login = '$_SESSION[login]'");
// echo $time;
}
else{
$db -> query("INSERT INTO online (login, time_out) VALUES('$_SESSION[login]',$time)");
}

?> 

<?php require_once "$path/components/head.php"; ?>

<body>
    <div class="container">
        <?php require_once "$path/components/header.php"; ?>
        <main class="main__chat">
            <div id="windowChat"></div>
            <div id="windowUsers">
                <h4>Online</h4>
                <div id="onlineUsers"></div>
            </div>
            <div id="windowMsg">
                <input type="text" id="msg" placeholder="Введите текст">
                <button id="sendMsg" value="send">Send</button>             
            </div>           
        </main>
        <?php require_once "$path/components/footer.php";?>
    </div>
    <script>
        sendMsg.onclick = () =>{
            $.ajax ({
                url: "/system/setMsg.php",
                type: "post",
                data: {
                    "msg":msg.value
                },
                success:()=>{
                    msg.value = null;
                }
            })
        }
        
        function updateChat() {
            $.ajax ({ 
                url: "/system/getMsg.php",
                type: "post",
                success: data => {
                    console.log (data);
                    document.querySelector("#windowChat").innerHTML = data;
                }
            })
        }
        updateChat();
        setInterval(updateChat,5000);

        function updateOnline() {
            $.ajax ({ 
                url: "/system/getOnline.php",
                type: "post",
                success: data => {
                    console.log (data);
                    document.querySelector("#onlineUsers").innerHTML = data;
                }
            })
        }
        updateOnline();
        setInterval(updateOnline,5000);
    </script>
</body>
</html>