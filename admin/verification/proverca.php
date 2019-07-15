<?php
/**
 * Created by PhpStorm.
 * User: Dima Kruhlyi
 * Date: 5/10/2019
 * Time: 2:46 PM
*/

header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL,'ru_RU.65001','rus_RUS.65001','Russian_Russia.65001','russian');
session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    exit ("<body style='background-image:url(../img/error.jpg);  /* fallback for old browsers */
    background: -webkit-linear-gradient(to top, #536976, #BBD2C5);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to top, #536976, #BBD2C5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    '><div align='center'><br/><br/><br/><h2>You have not entered all the information, go back and fill in all the fields! <br/>" . "<a href='../index.php' style = 'text-decoration:none; color:blue; font-family:ALGERIAN;'> <b>GO BACK!</b> </a></h2></div></body>");
}
//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);

//Подключаемся к базе данных.
$dbcon = mysqli_connect("localhost", "root", "");
mysqli_select_db( $dbcon,"settlements");
if (!$dbcon)
{
    echo "<p>Произошла ошибка при подсоединении к MySQL!</p>".mysqi_error(); exit();
} else {
    if (!mysqli_select_db( $dbcon,"settlements"))
    {
        echo("<p>Выбранной базы данных не существует!</p>");
    }
}
//извлекаем из базы все данные о пользователе с введенным логином
$result = mysqli_query( $dbcon,"SELECT * FROM administrator WHERE login='$login'");
$myrow = mysqli_fetch_array($result);
if (empty($myrow["ps"]))
{
    //если пользователя с введенным логином не существует
    exit ("<body style='background:#BBD2C5;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to top, #536976, #BBD2C5);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to top, #536976, #BBD2C5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    '><div align='center'><br/><br/><br/><h2>WRONG PASSWORD/LOGIN! <br/>" . "<a href='../index.php' style = 'text-decoration:none; color:blue; font-family:ALGERIAN;'> <b>GO BACK!</b> </a></h2></div></body>");

}
else {
    //если существует, то сверяем пароли
    if ($myrow["ps"]==$password) {
        //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
        #echo "Вы вошли! Поздравляю!";
        $_SESSION['login']=$myrow["login"];
        $_SESSION['id']=$myrow["ps"];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
        #header("Location:index.php");
        header("Location:../second_page.php");

    }
    else {
        //если пароли не сошлись




        exit ("<body style='background: #BBD2C5;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to top, #536976, #BBD2C5);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to top, #536976, #BBD2C5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    '><div align='center'><br/><br/><br/><h2>WRONG PASSWORD/LOGIN! <br/>" . "<a href='../index.php' style = 'text-decoration:none; color:blue; font-family:ALGERIAN;'> <b>GO BACK!</b> </a></h2></div></body>");
    }
}
?>