<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        @media only screen and (max-width: 1024px){
            #head-line-2{
                background:#000;
                font-size:20px;
                font-family: 'AR Julian', 'Algerian', 'Times New Roman';
            }
        }
    </style>
</head>
<body  background="../img/error.jpg"  style="background-size:100%;">
<header>
    <div id="head-line-2">
        You'll never walk alone! <br>
        Hello, Ivan Boyko! Now you can add new settlement & population to database!
    </div>
</header>
<div style="position:relative; left:10px; top:0px; height:200px; width:800px;" align="center">

    <?php
    if ($_POST) //Условие будет выполнено, если произведен POST-запрос к скрипту.
    {
        $name = trim($_POST['rname']);
        $country = trim($_POST['fr_country']);
        $population = trim($_POST['fr_population']);
        $type = trim($_POST['fr_type']);
        $data = date('y,n,d');
        $image = trim($_POST['fr_image']);

        $error = false;//Создаем переменную, контролирующую ошибки регистрации.
        //$errortext = " <br/> <br/><br/><div style = 'background-color:black;'><b><font color='#FFEFD5'><h2>When you wanted to add settlement to DB, the following errors occurred:</h2></font></div><ul>";
        if (empty($name))
        {
            $error = true;
            //$errortext .= "<div style = 'background-color:black; width:300px;'><li><font color='white'>Settlement NAME is empty!</font></li></div>";
            $errortext.="<script>alert('Settlement NAME is empty!')</script>";
        } else {
            if (!preg_match("/^[a-z а-яё]{2,30}$/iu",$name))
            {
                $error = true;
                //$errortext .= "<div style = 'background-color:black;'><li><font color='white'>Make sure that the NAME contains from 2 to 30 characters and does not contain numbers!</font></li></div>";
                $errortext.="<script>alert('Make sure that the NAME contains from 2 to 30 characters and does not contain numbers!')</script>";
            }
        }

        $errortext .= "</ul></b>";
        if ($error)
        {
            echo($errortext);//Выводим текст ошибок.
        } else {
            //Подключаемся к базе данных.
            $dbcon = mysqli_connect("localhost", "root", "");
            mysqli_select_db($dbcon,"settlements");
            if (!$dbcon)
            {
                echo "<p>Произошла ошибка при подсоединении к MySQL!</p>".mysqli_error(); exit();
            } else {
                if (!mysqli_select_db($dbcon,"settlements"))
                {
                    echo("<p>Выбранной базы данных не существует!</p>");
                }
            }
            //Выполняем SQL-запрос записывающий данные пользователя в таблицу.
            $sql = mysqli_query( $dbcon,"INSERT INTO settlements (url,name,country,population,type) Values ('$image','$name','$country','$population','$type')");
            #if (!$sql) {echo "Запрос не прошел. Попробуйте еще раз.";}
            if (!$sql) {echo "<script> alert('Such a login exists. Change your login.'); </script>";}
            if ($sql)
            {
                //Выводим сообщение об успешной регистрации.
                exit ('<div style = " position:relative; top:250px; left:70%; background:black; color:white; font-family:ALGERIAN; height: 50px; width: 700px;
border-radius: 50%;"><h3>
        You have successfully added new settlement!<br/> <a href="../admin/second_page.php" style = "text-decoration:none;"><font color="blue">ADD ONCE</font></a> !</h3></div>
  ');
            }
            mysqli_close($dbcon);//Закрываем соединение MySQL.
        }
    }
    if (($_POST && $error) || !$_POST)
    {
    }
    ?>
</div>
<!--Начало формы регистрации-->
<form id="register_form" name="register_form" method="post" action="">
    <table width="450" height="315" border="3" align="center" cellpadding="0" cellspacing="0" bgcolor="#000" style="color:#fff;">
        <tr>
            <td align="right">
                <span style = "font-family:ALGERIAN; font-size:25px;"><b>Settlement NAME:</b></span> <input style = "background:#DCDCDC" type="text" name="rname" id="rname" />
            </td>
        </tr>
        <tr>
            <td align="center">
                <span style = "font-family:ALGERIAN; font-size:25px;"><b>Country:</b></span>
                <select name="fr_country" id="fr_country" style = "background:#DCDCDC; font-size: 18px;" >
                    <option value="Ukraine">Ukraine</option>
                    <option value="Russia">Russia</option>
                    <option value="USA">USA</option>
                    <option value="Denmark">Denmark</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="center"><span style = "font-family:ALGERIAN; font-size:25px;"><b>Population:</b></span> <input style = "background:#DCDCDC" type="text" name="fr_population" id="fr_population" />
            </td>
        </tr>
        <tr>
            <td align="right"><span style = "font-family:ALGERIAN; font-size:22px;"><b>Type of Settlement:</b></span>
                <select name="fr_type" id="fr_type" style = "background:#DCDCDC; font-size: 18px;" >
                    <option value="village">village</option>
                    <option value="city">city</option>
                    <option value="town">town</option>
                    <option value="capital of Ukraine">capital of Ukraine</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="center"><span style = "font-family:ALGERIAN; font-size:25px;"><b>Image ROUTE:</b></span> <input style = "background:#DCDCDC" type="text" name="fr_image" id="fr_image" />
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="reg_button" id="reg_button" style="font-size:25px;font-family:'ALGERIAN'; color:black; background-color:#C0C0C0; border: 3px solid black;border-radius:5px;" value="DONE" />
            </td>
        </tr>
    </table>
</form>
<!--Конец формы для додавания населенного пункта-->
<?php
echo "<div style='margin-left:47%; margin-top:10%;'><a href='verification/viiti.php' style='text-decoration: none; '><span style='font-size:40px; color:#fff; 
font-family: \"Algerian\", \"Calibri\"; '>
EXIT!</span></a> </div>";
?>
</body>
</html>