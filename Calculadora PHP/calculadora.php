<?php
function add($num1, $num2) {
    return $num1 + $num2;
}

function subtract($num1, $num2) {
    return $num1 - $num2;
}

function multiply($num1, $num2) {
    return $num1 * $num2;
}

function divide($num1, $num2) {
    if ($num2 != 0) {
        return $num1 / $num2;
    } else {
        return "Erro: divisão por zero.";
    }
}

$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operator = $_POST["operator"];

    switch ($operator) {
        case "add":
            $result = add($num1, $num2);
            break;
        case "subtract":
            $result = subtract($num1, $num2);
            break;
        case "multiply":
            $result = multiply($num1, $num2);
            break;
        case "divide":
            $result = divide($num1, $num2);
            break;
        default:
            $result = "Operação inválida.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio03</title>
</head>
<body>

<h2>Calculadora Básica</h2>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <label for="num1">Número 1:</label>
    <input type="text" name="num1" required value="<?php echo isset($num1) ? $num1 : ''; ?>">

    <label for="operator">Operação:</label>
    <select name="operator" required>
        <option value="add" <?php echo ($operator == 'add') ? 'selected' : ''; ?>>Soma</option>
        <option value="subtract" <?php echo ($operator == 'subtract') ? 'selected' : ''; ?>>Subtração</option>
        <option value="multiply" <?php echo ($operator == 'multiply') ? 'selected' : ''; ?>>Multiplicação</option>
        <option value="divide" <?php echo ($operator == 'divide') ? 'selected' : ''; ?>>Divisão</option>
    </select>

    <label for="num2">Número 2:</label>
    <input type="text" name="num2" required value="<?php echo isset($num2) ? $num2 : ''; ?>">

    <button type="submit">Calcular</button>
</form>

<?php
if ($result !== "") {
    echo "<h3>Resultado: " . $result . "</h3>";
}
?>

</body>
</html>

