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
    <h3>Dodaj nowe danie</h3>
    <form action="chooseIngredients.php" method="POST">          
        <p>
          <label>Nazwa dania:</br>
            <input type="text" name="meal" size = "50">
          </label>
        </p>             
        <p>
          <label>Liczba kalorii [kcal]:<br>
            <input type="number" name="numberOfCalories"><br>
          </label>
        </p>
          <label>
            <input type="submit" value="Wybierz składniki">
          </label>
    </form>     
  </div>
</body>
</html>