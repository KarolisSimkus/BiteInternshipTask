<?php
    session_start();
    $numberArray = array();
    $numberArray = file("../data/input.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $numberArray = array_map('intval', $numberArray);
    sort($numberArray);

    $biggestNumber = end($numberArray);
    
    //It's a simple mistake, yet I don't know why it won't re-update itself
    /*if ($_POST['action'] === "increase") {
        $biggestNumber +=  5;
        $_SESSION['biggestNumber'] = $biggestNumber;
    } 
    elseif ($_POST['action'] === "decrease") {
        $biggestNumber = max(0, $biggestNumber - 5);
        $_SESSION['biggestNumber'] = $biggestNumber;
    }*/

    // Function to increase the number by 5
    function increaseBiggestNumber(&$biggestNumber) {
        echo"INCREASE";
        $biggestNumber +=  5;
        $_SESSION['biggestNumber'] = $biggestNumber;
    }

    // Function to decrease the number by 5
    function decreaseBiggestNumber(&$biggestNumber) {
        echo"DECREASE";
        $biggestNumber = max(0, $biggestNumber - 5);
        $_SESSION['biggestNumber'] = $biggestNumber;
    }

    if ($_POST['action'] === "increase") {
        increaseBiggestNumber($biggestNumber);
    } 
    elseif ($_POST['action'] === "decrease") {
        decreaseBiggestNumber($biggestNumber);
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
    <?php echo implode('<br>', $numberArray); ?>
    <br>
    <h3>Highest Number: </h3>
    <?php echo "{$biggestNumber}";?> 
    <form method="post">
        <button type="submit" name="action" value="increase">+5</button>
        <button type="submit" name="action" value="decrease">-5</button>
    </form>

    

</body>
</html>
