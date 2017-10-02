<!DOCTYPE HTML>
<html lang ="pl">
<head>
    <meta charset ="utf-8"/>
      <link href="style/style.css" rel="stylesheet">
    <title>New Ingredient</title>
</head>
<body class="newMeal"> 
 <a href="index.php">Strona głowna</a><br>
  <div class="newMeal">
    <form>
      <p>
        <?php require_once 'connect.php'; ?>
      </p>
      <p>
      <?php 
      if($_SERVER['REQUEST_METHOD'] === 'POST'){
          
        if (!empty($_POST['ingredient'])){
            $ingredient = $_POST['ingredient'];
            $sql = "INSERT INTO Ingredients (ingredient) VALUE ('$ingredient')";
            $result = $conn->query($sql);
           
              if ($result){  
               echo "Składnik: $ingredient został dodany. <html><body><a href='newIngredients.php'>Dodaj kolejny</body></html> <br>";
               
              }else{             
               echo "Niestety składnik nie został dodany. Być może taki składnik już istnieje. <html><body><a href='newIngredients.php'>Dodaj kolejny</body></html> <br>";
              }
              
        }else{
          echo "Proszę wpisać nazwę produktu. <html><body><a href='newIngredients.php'>Wróć</body></html> <br>";
        }
      }?>
      </p>
    </form>     
  </div>
</body>
</html>