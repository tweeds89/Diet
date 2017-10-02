<?php
require_once 'connect.php';

$sqlIngredients = "CREATE TABLE Ingredients(
                   ingredient_id int AUTO_INCREMENT,
                   ingredient VARCHAR (64) UNIQUE,
                   PRIMARY KEY (ingredient_id))";
        
$resultIngredients = $conn->query($sqlIngredients);

if ($resultIngredients == TRUE) {
    echo "Tabela Ingredients została stworzona poprawnie <br>";
} else {
    echo "Tabela Meals nie została stworzona: ". $conn->error;
}

$sqlMeals = "CREATE TABLE Meals(
             meal_id int AUTO_INCREMENT,
             meal VARCHAR (64) UNIQUE,
             calories int NOT NULL,
             PRIMARY KEY (meal_id))";
        
$resultMeals = $conn->query($sqlMeals);

if ($resultMeals == TRUE) {
    echo "Tabela Meals została stworzona poprawnie <br>";
} else {
    echo "Tabela Meals nie została stworzona: ". $conn->error;
}

$sqlWeek = "CREATE TABLE Week(
            week_id int AUTO_INCREMENT,
            day VARCHAR (15) NOT NULL,
            PRIMARY KEY (week_id))";
        
$resultWeek = $conn->query($sqlWeek);

if ($resultWeek == TRUE) {
    echo "Tabela Week została stworzona poprawnie <br>";
} else {
    echo "Tabela Week nie została stworzona: ". $conn->error;
}

$sqlMeals_Ingredients = "CREATE TABLE Meals_Ingredients(
                        id int AUTO_INCREMENT,
                        meal_id int NOT NULL,
                        ingredient_id int NOT NULL,
                        PRIMARY KEY(id),
                        FOREIGN KEY(ingredient_id) REFERENCES Ingredients(ingredient_id),
                        FOREIGN KEY(meal_id) REFERENCES Meals(meal_id)
                        ON DELETE CASCADE)";
        
$resultMeals_Ingredients = $conn->query($sqlMeals_Ingredients);

if ($resultMeals_Ingredients == TRUE) {
    echo "Tabela Meals_Ingredients została stworzona poprawnie <br>";
} else {
    echo "Tabela Meals_Ingredients nie została stworzona: ". $conn->error;
}

$sqlWeek_Meals = "CREATE TABLE Week_Meals(
                id int AUTO_INCREMENT,
                week_id int NOT NULL,
                meal_id int NOT NULL,
                type int NOT NULL,
                PRIMARY KEY(id),
                FOREIGN KEY(week_id) REFERENCES Week(week_id),
                FOREIGN KEY(meal_id) REFERENCES Meals(meal_id))";
        
$resultWeek_Meals = $conn->query($sqlWeek_Meals);

if ($resultWeek_Meals == TRUE) {
    echo "Tabela Week_Meals została stworzona poprawnie <br>";
} else {
    echo "Tabela Week_Meals nie została stworzona: ". $conn->error;
}

$sqlInsertWeek = "INSERT INTO Week (day) VALUES ('Poniedziałek'), ('Wtorek'), ('Środa'), ('Czwartek'), ('Piątek'), ('Sobota'), ('Niedziela')";
$resultInsertWeek = $conn->query($sqlInsertWeek);

if ($resultInsertWeek == TRUE) {
    echo "Dni tygodnia zostały wstawione do tabeli Week";
} else {
    echo "Dni tygodnia nie zostały uzupełnnione ". $conn->error;
}
  $conn->close(); 


