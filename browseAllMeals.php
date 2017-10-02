<!DOCTYPE HTML>
<html lang ="pl">
<head>
    <meta charset ="utf-8"/>
      <link href="style/style.css" rel="stylesheet">
    <title>Browse</title>
</head>
<body class="newMeal"> 
  <div> 
   <a href="index.php">Strona główna</a><br>  
    <form action ="composition.php" method="POST">
    <?php  
    require_once 'connect.php';
    ?>
     <p>
       <label> 
         Wybierz danie:
          <select name = "select" class = "select">
             <option>Wybierz danie</option>
             
          <?php $result = $conn ->query("SELECT meal, calories FROM Meals ORDER BY meal");
          
                  while ($row = $result->fetch_assoc()){ ?>  
                   <option value ="<?php echo $row["meal"];?>"><?php echo $row["meal"].', '. $row['calories']. ' kalorii'; ?></option> 
            <?php } ?> 
          </select>
       </label>
       </p>
       <p>
         <label>
           <input type="submit" name ="button" value="Przeglądaj"/>
           <input type="submit" name = "button" value="Usuń danie"/>
         </label>
       </p>
    </form>
  </div>
</body>
</html>
        
