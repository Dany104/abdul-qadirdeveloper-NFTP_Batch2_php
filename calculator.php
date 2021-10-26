<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Calculator</h1>
    <?php
        // echo var_dump(isset($_POST["num1"]));
        $operator=null;
        $num1 = null;
        $num2 = null;
        $result = null;
        if(isset($_POST["num1"])){
            $num1 = $_POST["num1"];
        }
        if(isset($_POST["num1"])){
            $num2 = $_POST["num2"];
        }
        if(isset($_POST["num1"])){
            $operator = $_POST["operator"];
        }
        if ($operator == '+'){
            $result = $num1 + $num2;
        }elseif($operator == '-'){
            $result = $num1 - $num2;
        }elseif($operator == 'x'){
            $result = $num1 * $num2;
        }elseif($operator == '/'){
            $result = $num1 / $num2;
        }
        
        if($result == null){
            echo "operand and operator are not provided.";
            echo "Go <a href='index.php'>Here</a>";
        }else{
            echo "$num1 $operator $num2 = $result" ;
        }
        
    ?>
    <a href="index.php">Back</a>
</body>
</html>