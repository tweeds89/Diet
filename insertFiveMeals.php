<!DOCTYPE HTML>
<html lang ="pl">
<head>
    <meta charset ="utf-8"/>
    <link href="style/style.css" rel="stylesheet">
</head>
<body>
  <div class="newMeal">
    <a href="index.php">Strona główna</a><br>
     <?php
      require_once'connect.php';
      
        if( $_SERVER['REQUEST_METHOD'] === 'POST'){
          
          if( isset($_POST['breakfast']) && isset($_POST['secondBreakfast']) && isset($_POST['dinner']) && isset($_POST['tea']) 
                  && isset($_POST['supper']) && isset($_POST['day'] )){
      
            $day = $_POST['day']; 
            $breakfast = $_POST['breakfast'];
            $secondBreakfast = $_POST['secondBreakfast'];
            $dinner = $_POST['dinner'];
            $supper = $_POST['supper'];
            $tea = $_POST['tea'];
         
            $sqlWeek = ("SELECT week_id FROM Week WHERE day = '$day'");
            $resultWeek = $conn->query($sqlWeek)->fetch_assoc();

              foreach ($resultWeek as $week_id){
                 $weekID;
              }
            //wyciągam id dla dania na śniadanie
             $sqlIdBreakfast = ("SELECT meal_id FROM Meals WHERE meal='$breakfast'");
             $resultIdBreakfast = $conn ->query($sqlIdBreakfast)->fetch_array();

               foreach ($resultIdBreakfast as $idBreakfast){
                  $idBreakfast;
               } 
                $sqlInBreakfast = ("INSERT INTO Week_Meals (week_id, meal_id, type) VALUES ('$week_id', '$idBreakfast', '1')");
                $resultInBreakfast = $conn->query($sqlInBreakfast);

             //wyciągam id dla dania na drugie śniadanie
             $sqlIdSecondBreakfast = ("SELECT meal_id FROM Meals WHERE meal='$secondBreakfast'");
             $resultIdSecondBreakfast = $conn ->query($sqlIdSecondBreakfast)->fetch_array();

               foreach ($resultIdSecondBreakfast as $idSecondBreakfast){
                  $idSecondBreakfast;
               } 
                $sqlInSecondBreakfast = ("INSERT INTO Week_Meals (week_id, meal_id, type) VALUES ('$week_id', '$idSecondBreakfast', '2')");
                $resultInSecondBreakfast = $conn->query($sqlInSecondBreakfast);

              //wyciągam id dla dania na obiad
             $sqlIdDinner = ("SELECT meal_id FROM Meals WHERE meal='$dinner'");
             $resultIdDinner = $conn ->query($sqlIdDinner)->fetch_array();

               foreach ($resultIdDinner as $idDinner){
                   $idDinner;
               } 
                $sqlInDinner = ("INSERT INTO Week_Meals (week_id, meal_id, type) VALUES ('$week_id', '$idDinner', '3')");
                $resultInDinner = $conn->query($sqlInDinner);

              //wyciągam id dla dania na podwieczorek
             $sqlIdTea = ("SELECT meal_id FROM Meals WHERE meal='$tea'");
             $resultIdTea = $conn ->query($sqlIdTea)->fetch_array();

                foreach ($resultIdTea as $idTea){
                   $idTea;
                } 
                $sqlInTea = ("INSERT INTO Week_Meals (week_id, meal_id, type) VALUES ('$week_id', '$idTea', '4')");
                $resultInTea = $conn->query($sqlInTea);

             //wyciągam id dla dania na kolację
             $sqlIdSupper = ("SELECT meal_id FROM Meals WHERE meal='$supper'");
             $resultIdSupper = $conn ->query($sqlIdSupper)->fetch_array();

                foreach ($resultIdSupper as $idSupper){
                    $idSupper;
                } 
                $sqlInSupper = ("INSERT INTO Week_Meals (week_id, meal_id, type) VALUES ('$week_id', '$idSupper', '5')");
                $resultInSupper = $conn->query($sqlInSupper);

             if($resultInBreakfast && $resultInSecondBreakfast && $resultInDinner && $resultInTea && $resultInSupper){
                 echo "Dzień został zaplanowany. <html><body><a href='fiveMeals.php'>Zaplanuj kolejny</body></html> <br>";
             }else{
                 echo 'Nie udało się zaplanować dnia';
             }
           }
       }
      $conn->close(); ?>
   </div>
</body>
</html>
        
        
