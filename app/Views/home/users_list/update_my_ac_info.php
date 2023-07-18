<?php $this->extend('layouts/main') ?>
<?php $this->section('content') ?>

<!--<div class="row">-->
<!--    <div>-->
<!--        <h1 class="bright_text"> Welcome to PERSONAL-page</h1>-->
<!--        --><?php //$route_to = base_url('/home/update'); ?>
<!--        --><?php //if (!empty($user)) {
//            $route_to = route_to('Home::update/$1', $user['id']);
//        } ?>
<!---->
<!--            --><?php //= $this->include('home/users_list/update_user_info'); ?>
<!--            <br>-->
<!--            --><?php //if (!empty($errors)) { ?>
<!--                <div class="alert alert-danger">-->
<!--                    --><?php //foreach ($errors as $field => $error) { ?>
<!--                        <p>--><?php //= $error ?><!--</p>-->
<!--                    --><?php //} ?>
<!--                </div>-->
<!--            --><?php //} ?>
<!--    </div>-->
<!--</div>-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="post" >
    <p>
        <input type="number" required id="firstNumber" name="firstNumber" >
        <select id="operation" name="operation">
            <option value="+">+</option>
            <option value="+">-</option>
            <option value="+">/</option>
            <option value="+">*</option>
        </select>
        <input type="number"  required id="secondNumber" name="secondNumber" >
        <button id="result" type="submit">Calculate</button>
    </p>
    <p>Result:</p>
</form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstNumber = $_POST["firstNumber"];
    $operation = $_POST["operation"];
    $secondNumber = $_POST["secondNumber"];

    switch ($operation) {
        case "+":
            $result = $firstNumber + $secondNumber;
            break;
        case "-":
            $result = $firstNumber - $secondNumber;
            break;
        case "*":
            $result = $firstNumber * $secondNumber;
            break;
        case "/":
            if ($secondNumber !== 0) {
                $result = $firstNumber / $secondNumber;
                break;
            } else {
                $result = "You can't divide by zero";
                break;
            }
        default:
            $result = "we have trouble";
            break;
    }
    echo "Here your result: $result";
}
?>


<?php $this->endSection() ?>
