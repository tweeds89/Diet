<!DOCTYPE HTML>
<html lang ="pl">
<head>
    <meta charset ="utf-8"/>
      <link href="style/style.css" rel="stylesheet">
    <title>Browse</title>
</head>
<body>  
  <div class= "newMeal">
    <a href="index.php">Strona główna</a><br> 
     <?php require_once 'connect.php'; ?>         
    <p>
    <?php
     if($_SERVER['REQUEST_METHOD'] === 'POST'){

        if (!empty($_POST['select']) && isset($_POST['button'])){
         $select = $_POST['select'];
       
         $sqlMealId = ("SELECT meal_id FROM Meals WHERE meal = '$select'");
         $resultMealId = $conn->query($sqlMealId)->fetch_assoc();
         foreach ($resultMealId as $mealId){
            $mealId;              
         }
              
          switch($_POST['button']){   
           
             case 'Przeglądaj':
                
                echo "Wybrane danie: <br> <b> $select </b> <br><br>";            
                echo "Skład: <br>";
                $sql = ("SELECT * FROM `Meals` JOIN Meals_Ingredients ON Meals.meal_id=Meals_Ingredients.meal_id
                         JOIN Ingredients ON Ingredients.ingredient_id=Meals_Ingredients.ingredient_id WHERE Meals.meal_id='$mealId'");
    
                $result  = $conn ->query($sql);
                      while ($row = $result->fetch_assoc()){             
                        echo '<b>'. $row['ingredient']. '</b> <br>';
                      }
                 break;
            
            case 'Usuń danie':
        
                $sqlDelete = "DELETE FROM Meals WHERE meal_id ='$mealId'";    
                $resultDelete = $conn->query($sqlDelete);
                  echo "Danie zostało usunięte";      
                break;
            
            default :
                echo "Wybierz danie";
         }
       }
     }?>
    </p>
  </div>
</body>
</html>
        
