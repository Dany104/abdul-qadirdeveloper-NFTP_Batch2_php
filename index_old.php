<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $num1;
         if(isset($_POST["num1"]) && !empty($_POST["num1"]))
         {
            $num1 = $_POST["num1"];
            echo $num1;
         }
        else
            echo "no value";
    ?>


    <?php
        $name="Danial";
        // following line will print hello danial
        /*
            I have a lot say
            1. I am crazy about php
        */

        // php is forgiving in case sensitiviy only for keyword
        // for variables, function names, class names it is case sensitive
        echo "Hello " . $name;
        ECHO "<br>";
        Echo "Hello $name";
        eChO "<br>";
        $x = 2;
        echo $x;
        echo "<br>";
        echo "I have $x <br>";
        var_dump($name);
        $y=null;
        echo "<br>";
        var_dump($y);
        echo is_int($x);
        var_dump(is_int($x));

    ?>
</body>
</html>