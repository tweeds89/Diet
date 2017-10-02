<!DOCTYPE HTML>
<html lang ="pl">
<head>
    <meta charset ="utf-8"/>
      <link href="style/style.css" rel="stylesheet">
    <title>New Ingredient</title>
</head>
<body class="newMeal"> 
  <table border ="1" class="tabela">
    <form action ="deleteDay.php" method="POST">
     <a href="index.php">Strona główna</a><br>
     <?php    
     require_once 'connect.php';

     $days = [1,2,3,4,5,6,7];

       foreach($days as $day){

        $sql = ("SELECT * FROM `Week` JOIN Week_Meals ON Week.week_id=Week_Meals.week_id
               JOIN Meals ON Meals.meal_id=Week_Meals.meal_id WHERE Week.week_id='$day' ORDER BY type");
        $result  = $conn ->query($sql);
                     
            switch ($day){  

              case 1:
                echo "<tr> <td> <b> Poniedziałek </b> <br>";
                   foreach ($result as $row){
                      echo $row['meal']. '<br>'; 
                   }                                                  
                    if (!empty($row) && $row['week_id'] == '1'){ ?>
                       <input type="submit" name = "delete" style="font-size: 15px" value="Usuń Poniedziałek" /> <?php
                                      
                    }else{
                       echo "<html><body><a href='fiveMeals.php'>Zaplanuj</body></html>";
                    } 
                    echo "</td>";                    
                    break; 

              case 2: 
                 echo "<td> <b> Wtorek </b> <br>";
                   foreach ($result as $row){
                       echo $row['meal']. '<br>'; 
                   }                                                  
                   if (!empty($row) && $row['week_id'] == '2'){ ?>
                      <input type="submit" name = "delete" style="font-size: 15px" value="Usuń Wtorek" /> <?php
                                        
                   }else{ 
                          echo "<html><body><a href='fiveMeals.php'>Zaplanuj</body></html>";
                   }
                   echo "</td>";                    
                   break; 

              case 3: 
                  echo "<td><b> Środa </b> <br>";                      
                    foreach ($result as $row){
                       echo $row['meal']. '<br>'; 
                    }                                                  
                    if (!empty($row) && $row['week_id'] == '3'){ ?>
                       <input type="submit" name = "delete" style="font-size: 15px" value="Usuń Środę" /> <?php
                                       
                    }else{
                        echo "<html><body><a href='fiveMeals.php'>Zaplanuj</body></html>";
                    }
                    echo "</td>";                      
                    break; 

              case 4: 
                 echo "<td> <b> Czwartek </b> <br>";
                    foreach ($result as $row){
                       echo $row['meal']. '<br>'; 
                    }                                                  
                    if (!empty($row) && $row['week_id'] == '4'){ ?>
                       <input type="submit" name = "delete" style="font-size: 15px" value="Usuń Czwartek" /> <?php 
                         
                    }else{ 
                       echo "<html><body><a href='fiveMeals.php'>Zaplanuj</body></html>";
                    } 
                    echo "</td>";                   
                    break; 

              case 5: 
                 echo "<td> <b> Piątek </b> <br>";
                    foreach ($result as $row){
                         echo $row['meal']. '<br>'; 
                    }                                                  
                    if (!empty($row) && $row['week_id'] == '5'){ ?>
                       <input type="submit" name = "delete" style="font-size: 15px" value="Usuń Piątek" /> <?php
                                         
                    }else{ 
                       echo "<html><body><a href='fiveMeals.php'>Zaplanuj</body></html>";
                    } 
                    echo "</td>";                     
                    break; 

              case 6: 
                 echo "<td><b> Sobota </b> <br>";
                    foreach ($result as $row){
                       echo $row['meal']. '<br>'; 
                    }                                                  
                    if (!empty($row) && $row['week_id'] == '6'){ ?>
                         <input type="submit" name = "delete" style="font-size: 15px" value="Usuń Sobotę" /> <?php 
                                         
                    }else{ 
                       echo "<html><body><a href='fiveMeals.php'>Zaplanuj</body></html>";
                    } 
                    echo "</td>";              
                    break; 

              case 7: 
                echo "<td><b> Niedziela </b> <br>";
                   foreach ($result as $row){
                      echo $row['meal']. '<br>'; 
                   }                                                  
                   if (!empty($row) && $row['week_id'] == '7'){ ?>
                        <input type="submit" name = "delete" style="font-size: 15px" value="Usuń Niedzielę" /> <?php 
                                          
                   }else{
                      echo "<html><body><a href='fiveMeals.php'>Zaplanuj</body></html>";
                   }
                   echo "</td> </tr>";              
                   break; 
                      
              default:
                echo"Wybierz dzień";           
            }   
      }?>
     </form>
  </table>
</body>
</html>
   