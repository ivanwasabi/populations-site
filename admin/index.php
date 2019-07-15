<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrator</title>
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        @media only screen and (max-width: 550px){
            #form_autorization{
                margin-left: -37%;
            }
        }

    </style>
</head>
<body background="../img/whoami.jpg" >


<?php
// Проверяем, пусты ли переменные логина и id пользователя
if (empty($_SESSION['login']) or empty($_SESSION['id']))
{
    ?>
    <!--Если пусты, то выводим форму входа.-->
    <div style=" position:relative; top:220px; left:40%; height:200px;  width:400px; " id="form_autorization">
        <div class="inner" style = "border:10px solid #fff; border-radius:10%; background: #BBD2C5;  /* fallback for old browsers */
background: -webkit-linear-gradient(to top, #536976, #BBD2C5);  /* Chrome 10-25, Safari 5.1-6 */
background: #000; /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  ">
            <form action="verification/proverca.php" method="post">
                <label for="log" style = "margin-left:40%;"><span style = "font-size: 25px; font-family:'ALGERIAN'; color:white;">LOGIN</span> </label><br/>
                <input id="log" name="login" type="text" size="15" maxlength="15" style="margin-left:30%; with:80px; height:30px; background:#F8F8FF;"><br/>
                <label for="log2" style = "margin-left:32%;"><span style = "font-size: 25px; font-family:'ALGERIAN'; color:white;">PASSWORD</span> </label><br/>
                <input name="password" type="password" size="15" maxlength="15" id = "log2" style="margin-left:30%; with:80px; height:30px; background:#F8F8FF;"><br/><br/>
                <input type="submit" value="input" style="width:90px; height:40px; margin-left:37%; font-family:'ALGERIAN'; font-size:30px; color:black; background-color:#C0C0C0; border: 3px solid black;border-radius:5px;"><br/><br/>
            </form>
           <!-- <div style ="margin-left:10%; text-align:center; ">
                Hello, <font color="red">GUEST</font>! <br/>
                Log in and follow the link! <br>
                You do not have an account? <a href="../forma_reg.php"><font color='blue'>CREATE </a></font> it!
            </div>
            -->
        </div>

    </div>
    <?php
}
else  //Иначе.
{
    $login=$_SESSION['login'];

    //Подключаемся к базе данных.
    $dbcon = mysql_connect("localhost", "root", "");
    mysql_select_db("settlements", $dbcon);
    if (!$dbcon)
    {
        echo "<p>Произошла ошибка при подсоединении к MySQL!</p>".mysql_error(); exit();
    } else {
        if (!mysql_select_db("settlements", $dbcon))
        {
            echo("<p>Выбранной базы данных не существует!</p>");
        }
    }
//Формирование оператора SQL SELECT
    $sqlCart = mysql_query("SELECT name FROM administrator WHERE login = '$login'", $dbcon);
//Цикл по множеству записей и вывод необходимых записей
    while($row = mysql_fetch_array($sqlCart))
    {
//Присваивание записей
        $name = $row['name'];
    }
    mysql_close($dbcon);
    // Если не пусты, то мы выводим ссылку
    echo "
    <div align='center'
    style=' color:white; border: 0px solid blue; position:relative; top:100px; left:40%; height:150px; width:300px; border:10px solid #808080; border-radius:30%; background: #BBD2C5;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to top, #536976, #BBD2C5);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to top, #536976, #BBD2C5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */'>
    
        <font color='green'>Hello: "."<font color='red'>".$name."</font>!</font>
        <br/>
        If you want to choose books: <br/> <a href='../second_page.php' style = 'font-fimaly:Algerian;'><font color='blue'>Click here</font></a>
        <br/><br/>
          <a href='viiti.php'><font color='violet'>EXIT!</font></a> 
       <br/>
    
    </div>";
}
?>
</body>
</html>