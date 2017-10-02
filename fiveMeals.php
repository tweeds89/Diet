<!DOCTYPE HTML>
<html lang ="pl">
<head>
    <meta charset ="utf-8"/>
      <link href="style/style.css" rel="stylesheet">
    <title>Five Meals</title>          
</head>
<body class="fiveMeals">  
 <div>
   <a href="index.php">Strona główna</a><br> 
     <?php require_once 'connect.php'; ?>

    <h3>Wybierz pięć posiłków</h3>  
     <form action="addedFiveMeals.php" method="POST">       
       <p> 
        <label>Dzień tygodnia     
          <select name = "day" class="selectFive">
          
          <?php $result = $conn ->query("SELECT week_id, day FROM Week ORDER By week_id"); 
          
                  while ($row = $result->fetch_assoc()){ ?>    
              
             <option value ="<?php echo $row["day"];?>"><?php echo $row["day"]; ?></option>             
            <?php } ?>              
          </select>   
        </label> 
      </p>     
      <p>
        <label>Planowana liczba kalorii   
           <input type="number" name="plannedCalories" style="width:80px"/>[kcal]
        </label> 
      </p>       
      <p> 
        <label> Śniadanie:     
           <select name = "breakfast" class="selectFive">
            <?php $result = $conn ->query("SELECT meal_id, meal, calories FROM Meals ORDER BY meal");
      
                    while ($row = $result->fetch_assoc()){ ?>
               
              <option value ="<?php echo $row["meal"]?>"><?php echo $row["meal"].', '. $row['calories']. ' kalorii'; ?></option>                
              <?php } ?>  
           </select>  
        </label>
      </p> 
      <p> 
        <label> Drugie śniadanie:        
            <select name = "secondBreakfast" class="selectFive">
            <?php $result = $conn ->query("SELECT meal_id, meal, calories FROM Meals ORDER BY meal");   
          
                    while ($row = $result->fetch_assoc()){ ?>
                
              <option value ="<?php echo $row["meal"];?>"><?php echo $row["meal"].', '. $row['calories']. ' kalorii'; ?></option>   
              <?php } ?>  
            </select>
        </label>
      </p>
      <p>
        <label> Obiad:   
           <select name = "dinner" class="selectFive">
           <?php $result = $conn ->query("SELECT meal_id, meal, calories FROM Meals ORDER BY meal"); 
          
                   while ($row = $result->fetch_assoc()){ ?>
               
             <option value ="<?php echo $row["meal"];?>"><?php echo $row["meal"].', '. $row['calories']. ' kalorii'; ?></option>   
             <?php } ?>  
           </select>
        </label>
      </p>
      <p>
        <label> Podwieczorek:    
          <select name = "tea" class="selectFive">
           <?php $result = $conn ->query("SELECT meal_id, meal, calories FROM Meals ORDER BY meal"); 
          
                   while ($row = $result->fetch_assoc()){ ?>
              
             <option value ="<?php echo $row["meal"];?>"><?php echo $row["meal"].', '. $row['calories']. ' kalorii'; ?></option>   
             <?php } ?>  
          </select>
        </label>
      </p>
      <p>
        <label> Kolacja:  
          <select name = "supper" class="selectFive">
          <?php $result = $conn ->query("SELECT meal_id, meal, calories FROM Meals ORDER BY meal"); 
          
                  while ($row = $result->fetch_assoc()){ ?>
              
             <option value ="<?php echo $row["meal"];?>"><?php echo $row["meal"].', '. $row['calories']. ' kalorii'; ?></option>   
            <?php } ?>  
          </select>
        </label>
      </p>
      <label>
        <input type="submit" value="Przelicz"/>
      </label>
     </form>
  </div>
</body>
</html>
   

    