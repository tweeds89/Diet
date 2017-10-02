<!DOCTYPE HTML>
<html lang ="pl">
<head>
    <meta charset ="utf-8"/>
    <link href="style/style.css" rel="stylesheet">
    <title>Added meal</title>
</head>
<body class="newMeal">
  <a href="index.php">Strona główna</a><br>
  <form action="addedMeal.php" method="POST">
    <?php require_once 'connect.php'; ?>
    <p> 
    <?php
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
       
     if (!empty($_POST['meal']) && !empty($_POST['numberOfCalories'])){
      $meal = $_POST['meal'];
      $calories = $_POST['numberOfCalories'];

        $sql = "INSERT INTO Meals (meal, calories) VALUES ('$meal', '$calories')";
        $result = $conn->query($sql);
    
          if ($result){
            echo "$meal <br>";
            echo "Skomponuj składniki:<br>"; ?>
        
              <input type="hidden" name="mealName" value="<?php echo $meal?>"/>
              <select name = "ingredients">
              <?php $result = $conn ->query("SELECT ingredient FROM Ingredients");
                       while ($row = $result->fetch_assoc()){ ?>
                   <option value="<?php echo $row['ingredient']; ?>"><?php echo $row['ingredient']; ?></option>
             <?php  } ?>
             </select>
        
            <input type="submit" value="Dodaj"/>
          
      <?php }else{
              echo 'Coś poszło nie tak... Sprawdź czy takie danie już nie istnieje';
            }
     }else{
         echo 'Proszę wpisać nazwę dania i liczbę kalorii';
     } 
   }  
      $conn->close();?>  
    </p>
  </form>
</body>
</html>

        
        
