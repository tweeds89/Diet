<!DOCTYPE HTML>
<html lang ="pl">
<head>
    <?php require_once 'connect.php'; ?>
    <meta charset ="utf-8"/>
      <link href="style/style.css" rel="stylesheet">
    <title>New Ingredient</title>
</head>
<body class="newMeal"> 
 <a href="index.php">Strona główna</a><br>
  <div class="newMeal">
    <h3>Dodaj nowy produkt</h3>
    <form action="addedIngredient.php" method="POST">
        <p>
          <label>Nazwa produktu: </br>
            <input type="text" name="ingredient" size = "50">
            <input type="submit" value="Dodaj"/>
          </label>
        </p>
    </form>     
  </div>
</body>
</html>