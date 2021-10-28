<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>index.html</h2>
    <form action="calculator.php" method="post">
        <label for="num1">Enter First Number</label>
        <input type="number" name="num1" step="0.01" >
        <br>
        <label for="num2">Enter Second Number</label>
        <input type="number" name="num2" step="0.01">
        <br>
        <input type="submit" name="operator" value="+" />
        <input type="submit" name="operator" value="-" />
        <input type="submit" name="operator" value="x" />
        <input type="submit" name="operator" value="/" />
    </form>
</body>
</html>