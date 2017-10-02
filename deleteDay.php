<!DOCTYPE HTML>
<html lang ="pl">
<head>
    <meta charset ="utf-8"/>
    <link href="style/style.css" rel="stylesheet">
    <title>Delete Day</title>
</head>
  <body class="newMeal">  
  <?php
   require_once 'connect.php';
   
   if( $_SERVER['REQUEST_METHOD'] === 'POST'){
          
      if( isset($_POST['delete'])){
              
          switch($_POST['delete']){        

                case 'Usuń Poniedziałek':         
                   $week_id = '1';

                    break;

                case 'Usuń Wtorek':               
                   $week_id = '2';
                    break;

                case 'Usuń Środę':               
                   $week_id = '3';
                    break;

                case 'Usuń Czwartek':
                  $week_id = '4';
                    break;

                case 'Usuń Piątek':
                    $week_id = '5';
                    break;

                case 'Usuń Sobotę':
                   $week_id = '6';
                     break;

                case 'Usuń Niedzielę':
                    $week_id = '7';
                    break;

                default :
                    echo "Wybierz dzień";         
          }
            $sql = "DELETE FROM Week_Meals WHERE week_id= '$week_id'";    
            $result = $conn->query($sql);

               if($result){
                  echo "Dzień został usunięty. <br>";
               }else{
                  echo 'Wystąpił błąd';
               }
      }
   }?>
      <a href="weekSchedule.php">Powrót</a><br>
  </body>
</html>
   

    