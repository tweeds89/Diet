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
  <p>
        <?php require_once 'connect.php'; ?>
      </p>
  <div class="newMeal">
    <h3>Dodaj nowy produkt</h3>
    <form action="" method="POST">
        <p>
          <label>Nazwa produktu: </br>
            <input type="text" name="ingredient" size = "50">
            <input type="submit" name="submit" value="Dodaj"/>
          </label>
        </p>
    </form>   
    <?php 
      if($_SERVER['REQUEST_METHOD'] === 'POST'){
          
        if (!empty($_POST['ingredient']) && isset($_POST['submit'])){
            $ingredient = $_POST['ingredient'];
            $sql = "INSERT INTO Ingredients (ingredient) VALUE ('$ingredient')";
            $result = $conn->query($sql);
           
              if ($result){  
               echo "Składnik: $ingredient został dodany <br>";
               
              }else{             
               echo "Niestety składnik nie został dodany. Być może taki składnik już istnieje <br>";
              }
              
        }else{
          echo "Proszę wpisać nazwę produktu <br>";
        }
      }?>
  </div>
</body>
</html>