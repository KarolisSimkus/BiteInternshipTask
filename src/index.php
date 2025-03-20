<?php
    session_start();

    $numberArray = array();
    $numberArray = file("../data/input.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $numberArray = array_map('intval', $numberArray);
    sort($numberArray); //Quicksort

    $biggestNumber = end($numberArray);
    
    // This in theory should increase/decrease the value by 5 but it only does this once
    // No idea how to fix this:)
    if ($_POST['action'] === "increase") {
        $biggestNumber +=  5;
        $_SESSION['biggestNumber'] = $biggestNumber;
    } 
    elseif ($_POST['action'] === "decrease") {
        $biggestNumber = max(0, $biggestNumber - 5);
        $_SESSION['biggestNumber'] = $biggestNumber;
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karolis Simkus</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h3>Sorted Numbers:</h3>
    <?php echo implode('<br>', $numberArray); 
    //Shows all of the numbers from the array line by line
    ?> 
    <br>
    <h3>Highest Number: </h3>
    <?php echo "{$biggestNumber}";?> 
    <form method="post">
        <button type="submit" name="action" value="increase">+5</button>
        <button type="submit" name="action" value="decrease">-5</button>
    </form>
</body>
</html>
