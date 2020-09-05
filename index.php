<?php

function reverse(string $string){
    $array = str_split($string);
    foreach ( array_reverse($array) as $reverse ) {
        echo $reverse;
    }
}
//reverse('revers');

function factorial(int $number, $product = 1) {
    $product *= $number;
    if($number === 1) {
        return $product;
    }
    return factorial($number-1, $product);
}
//var_dump(factorial(6));
?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="radio" id="white" name="color" value="white">
    <label for="white">White</label><br>
    <input type="radio" id="black" name="color" value="black">
    <label for="black">Black</label><br>
    <input type="radio" id="red" name="color" value="red">
    <label for="red">Red</label><br>
    <input type="radio" id="blue" name="color" value="blue">
    <label for="blue">Blue</label><br>
    <input type="radio" id="green" name="color" value="green">
    <label for="green">Green</label><br>
    <input type="radio" id="yellow" name="color" value=yellow">
    <label for="yellow">Yellow</label><br>

    <button>Submit</button>
</form>

<?php
    if(isset($_POST['color']))
    echo "My favorite color is {$_POST['color']}.";
?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <button>Submit</button>
</form>

<?php
var_dump($_FILES);

if(isset($_FILES['image'])) {
    $errors     = array();
    $maxsize    = 1048576;
    $acceptable = array(
        'image/jpeg',
        'image/jpg',
        'image/png'
    );

    if(($_FILES['image']['size'] >= $maxsize) || ($_FILES["image"]["size"] == 0)) {
        $errors[] = 'File too large. File must be less than 1 megabytes.';
    }

    if(!in_array($_FILES['image']['type'], $acceptable) && (!empty($_FILES["image"]["type"]))) {
        $errors[] = 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.';
    }

    if(count($errors) === 0) {
        move_uploaded_file($_FILES['image']['tmp_name'], 'files' . DIRECTORY_SEPARATOR . $_FILES['image']['name']);
    } else {
        foreach($errors as $error) {
            echo '<script>alert("'.$error.'");</script>';
        }

        die();
    }
}
