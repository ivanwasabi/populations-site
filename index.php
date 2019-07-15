<?php
include ("classes/Singleton.php");
include("classes/Proxy.php");
include("classes/SettlementInfo.php");
//include ("classes/MyIterator.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Settlements</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">
   <!-- <script src="jquery/script.js"></script>-->
   <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">-->

    <script type="text/javascript">
        $(function(){
            $('a[href^="#"]').on('click', function(event) {
                // отменяем стандартное действие
                event.preventDefault();

                var sc = $(this).attr("href"),
                    dn = $(sc).offset().top;
                /*
                * sc - в переменную заносим информацию о том, к какому блоку надо перейти
                * dn - определяем положение блока на странице
                */

                $('html, body').animate({scrollTop: dn}, 1000);

                /*
                * 1000 скорость перехода в миллисекундах
                */
            });
        });
    </script>
    <style>
      descript{
            font-family: "AR BLANCA", "Calibri";
            font-size:30px;
        }
        #text-head-2{
            color:black;
            font-size:40px;
            font-family: 'Forte', 'Calibri';
            text-align: center;
            vertical-align: middle;
        }
        #foot .made{
            text-align: center;
            color:#fff;
            font-size:24px;
            font-family: "AR DECODE", "AR BLANCA", "Calibri";
        }
        #head-line{
            width: 100%;
            height: 50px;
            background-color: black;
            color:white;
            font-size:35px;
            font-family: 'AR DELANEY', 'Calibri';
            text-align: center;

        }
        #foot{
            height: 30px;
            width:100%;
            background: #000;
        }
      @media only screen and (max-width: 1024px){
          #head-line{
              background:#000;
              font-size:20px;
              font-family: 'AR Julian', 'Algerian', 'Times New Roman';
          }
      }
    </style>
</head>
<body  style="background: rgb(253,245,230);" >

    <div id="head-line">
        Here you will find all information about population in some settlements!
    </div>


    <div id="frame">
        <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d1795873.1561334368!2d30.49257364993859!3d49.521679786471864!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sua!4v1557491725322!5m2!1sru!2sua"
                width="100%" height="610" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
  <div id="image-arrow">
        <a href="#text-head-2" ><img src="img/arrow-down.png" alt="arrow-down" width="50px" height="50px"></a>
    </div>

    <div id="text-head-2">
        Population in Settlements which exist in our Database
    </div>
    <?php

    $db = Singleton::getInstance();
    #$db2 = Singleton::getInstance();
    #var_dump($db == $db2);
    $mysqli = $db->getConnection();
    $sql_query = "SELECT * FROM settlements";
    $result = $mysqli->query($sql_query);


    while($row = mysqli_fetch_array($result)){

        $infObj = new SettlementInfo();

        $infObj->GetName($row['name']);
        $infObj->GetCountry($row['country']);
        $infObj->GetPopulation($row['population']);
        $infObj->GetType($row['type']);
        $infObj->GetURL($row['url']);


        $obj1 = new SomeObject($infObj->SetURL());
        $proxy_obj = new Proxy($obj1);
        $checked = $proxy_obj->doSomething();

        echo " 
             <div align = 'center' style = 'width:300px; height:450px; display:inline-block; 
             border: 5px solid blue; margin-left:8%; font-family: \" AR JULIAN\"; font-size: 30px; margin-bottom: 20px;
             border-radius: 25px; padding: 3px;' > <img src='$checked ' alt='Settlement' width='290px' height='300px'><br>
             <span class='descript'>Name: </span> ".$infObj->SetName()." <br/><span class='descript'>Country:</span>  ".$infObj->SetCountry()." <br/>
             <span class='descript'>Population:</span> ".$infObj->SetPopulation()." <br/><span class='descript'>Type: </span>".$infObj->SetType()." <br/>
             
             
             </div> ";

    }
    /*echo "<br/>";
    $it = new MyIterator($infObj);
    foreach ($it as $a => $b) {
        print "$a: $b <br/>";
    }*/
    ?>

    <footer>
        <div id="foot">
            <div class="made"> Made by Ivan Boyko</div>
        </div>
    </footer>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>