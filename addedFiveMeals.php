<!DOCTYPE HTML>
<html lang ="pl">
<head>
    <meta charset ="utf-8"/>
    <link href="style/style.css" rel="stylesheet">
</head>
<body>   
  <div class= "fiveMeals">
    <form action ="insertFiveMeals.php" method="POST">
    <?php
    require_once 'connect.php';  
    
      if( $_SERVER['REQUEST_METHOD'] === 'POST'){
          
          if( isset($_POST['breakfast']) && isset($_POST['secondBreakfast']) && isset($_POST['dinner']) && isset($_POST['tea']) 
                  && isset($_POST['supper']) && isset($_POST['day']) && !empty($_POST['plannedCalories']) ){ 
              
            $breakfast = $_POST['breakfast'];
            $secondBreakfast = $_POST['secondBreakfast'];
            $dinner = $_POST['dinner'];
            $supper = $_POST['supper'];
            $tea = $_POST['tea'];
            $day = $_POST['day'];
            $plannedCalories = $_POST['plannedCalories'];  ?>
      
                <input type="hidden" name="day" value="<?php echo $day?>"/>
                <?php echo "Wybrany dzień tygodnia: <b> $day </b> <br>";      
              
              $meals = [$breakfast, $secondBreakfast, $dinner, $tea, $supper];
              $sum = 0;

                foreach($meals as $meal){
                  $sqlCalories = ("SELECT meal_id, calories FROM Meals WHERE meal='$meal'");
                  $resultCalories = $conn ->query($sqlCalories);
                     while ($row = $resultCalories->fetch_assoc()){
                       $cal = $row['calories'];
                       $sum += $cal;     
                     } 
                } ?>
                <input type="hidden" name="breakfast" value="<?php echo $breakfast?>"/>    
                <?php echo "Śniadanie: <b> $breakfast </b> <br>"; ?>
                <input type="hidden" name="secondBreakfast" value="<?php echo $secondBreakfast?>"/> 
                 <?php echo "Drugie śniadanie: <b> $secondBreakfast </b> <br>";?>
                <input type="hidden" name="dinner" value="<?php echo $dinner?>"/> 
                 <?php echo "Obiad: <b> $dinner </b> <br>"; ?>
                <input type="hidden" name="tea" value="<?php echo $tea?>"/> 
                 <?php echo "Podwieczorek: <b> $tea </b> <br>"; ?>
                <input type="hidden" name="supper" value="<?php echo $supper?>"/> 
                 <?php echo "Kolacja: <b> $supper </b> <br>";
                 echo "Planowana liczba kalorii: <b> $plannedCalories </b> <br>";
                 echo "Wyliczona liczba kalorii: <b> $sum </b> <br>";    
               
                     if ($plannedCalories > $sum){
                        echo "Wyliczona liczba kalorii jest mniejsza od zakładanej. <br>";

                     }else if ($plannedCalories<$sum) {
                        echo "Wyliczona liczba kalorii jest większa od zakładanej. <br>";

                     }else{
                        echo"Wyliczona liczba kalorii jest równa zakładanej <br>";
                     } ?>
                 
                     <input type="button" value="Zmień" onclick="history.back()"/>
                     <input type="submit" value="Dodaj"/>

    <?php }else{
              echo "Proszę podać liczbę kalorii <br>";
          }
      }?>      
    </form>
  </div>
</body>
</html>
        
