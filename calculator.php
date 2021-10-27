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
        function Calculate($num1,$num2, $operator)
        {
            $result = null;
            //processing
            switch($operator){
                case "+":
                    $result = $num1 + $num2;
                    break;
                case "-":
                    $result = $num1 - $num2;
                    break;
                case "x":
                    $result = $num1 * $num2;
                    break;
                case "/":
                    $result = $num1 / $num2;
                    break;
            }
            // if ($operator == '+'){
            //     $result = $num1 + $num2;
            // }elseif($operator == '-'){
            //     $result = $num1 - $num2;
            // }elseif($operator == 'x'){
            //     $result = $num1 * $num2;
            // }elseif($operator == '/'){
            //     $result = $num1 / $num2;
            // }
            return $result;
        }
    

        // implement validateInput
        // by create a function
        function ValidateInput($num1, $num2, $operator)
        {
            if($num1 == null)
            {
                echo "Invalid First Number";
                return false;
            }
            if($num2 == null)
            {
                echo "Invalid Second Number";
                return false;
            }
            if($operator == null)
            {
                echo "Invalid Operator";
                return false;
            }

            // check division by zero
            if($operator == "/" && $num2 == 0)
            {
                echo "Aaaa! can't do division by zero";
                return false;
            }
            return true;
        }
        
        $operator=null;
        $num1 = null;
        $num2 = null;
        if(isset($_POST["num1"])){
            $num1 = $_POST["num1"];
        }
        if(isset($_POST["num1"])){
            $num2 = $_POST["num2"];
        }
        if(isset($_POST["num1"])){
            $operator = $_POST["operator"];
        }
        //Validation
        if(ValidateInput($num1,$num2, $operator) == true)
        {
           
            $result = Calculate($num1,$num2,$operator);
            
            if($result == null){
                echo "operand and operator are not provided.";
                echo "Go <a href='index.php'>Here</a>";
            }else{
                echo "$num1 $operator $num2 = $result" ;
            } 
        } 
        
    ?>
    <a href="index.php">Back</a>
</body>
</html>