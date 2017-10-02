<!DOCTYPE HTML>
<html lang ="pl">
<head>
    <meta charset ="utf-8"/>
      <link href="style/style.css" rel="stylesheet">
    <title>New Meal</title>
</head>
<body class="newMeal"> 
 <a href="index.php">Strona główna</a><br>
  <div class="newMeal">  
   <form>     
     <p>
       <?php
       require_once 'connect.php'; ?>
     </p>
     <p>
        <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

         if (!empty($_POST['mealName']) && !empty($_POST['ingredients'])){

          $mealName = $_POST['mealName'];
          $ingredientName = $_POST['ingredients'];

            $sqlMeal = "SELECT meal_id FROM Meals WHERE meal = '$mealName'";
            $resultMeal = $conn->query($sqlMeal)->fetch_assoc();

              foreach($resultMeal as $mealId){
                 $mealId;
              }

            $sqlIngredient = "SELECT ingredient_id FROM Ingredients WHERE ingredient = '$ingredientName'";
            $resultIngredient = $conn->query($sqlIngredient)->fetch_assoc();

              foreach($resultIngredient as $ingredientId){
                    $ingredientId;
              }


            $sqlInsert = "INSERT INTO Meals_Ingredients (meal_id, ingredient_id) VALUES ('$mealId', '$ingredientId')";
            $resultInsert = $conn->query($sqlInsert);

            $sqlAllIngredients = ("SELECT * FROM `Meals` JOIN Meals_Ingredients ON Meals.meal_id=Meals_Ingredients.meal_id
                                 JOIN Ingredients ON Ingredients.ingredient_id=Meals_Ingredients.ingredient_id WHERE Meals.meal_id='$mealId'");

            $resultAllIngredients  = $conn ->query($sqlAllIngredients);
                   
             if ($resultInsert){
                echo "$mealName <br>" ?>             
     </p> 
     <p>
       <?php
        echo "Składniki: <br>";
                while ($row = $resultAllIngredients->fetch_assoc()){           
                   echo $row['ingredient'].'<br> ';  
                }?>       
                <input type="button" value="Dodaj kolejne składniki" onclick="history.back()"/>    
                
          <?php }else{
                  echo 'Wystąpił błąd';
                } 
          }
        }?>
     </p>
    </form>
  </div>
</body>
</html>
    



        
        
