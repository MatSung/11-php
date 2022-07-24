<!DOCTYPE html>
<?php
if (!isset($_COOKIE['items'])) {
    setcookie('items', json_encode([]), time() + (86400), "/");
}
$items = json_decode($_COOKIE['items'], true);

for ($i = 0; $i < count($items); $i++) {
    if (isset($_POST['button' . $i])) {
        unset($items[$i]);
        $items = array_values($items);
        setcookie('items', json_encode($items), time() + (86400), "/");
    }
}
if (isset($_POST['submit'])) {
    array_push($items, $_POST['item']);
}
function console_log($data)
{
    echo '<script>';
    echo 'console.log(' . json_encode($data) . ')';
    echo '</script>';
}
console_log($items);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uzduotis3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            width: 95%;
            margin: auto;
        }

        li {
            margin: 10px;
        }
    </style>

</head>

<body>


    <div class="div1 mb-3">
        <form method="POST" action="index.php">
            <ul>
                <?php

                for ($i = 0; $i < count($items); $i++) {
                    echo '<li>';

                    echo $items[$i] . '<button type="submit" class="btn btn-primary" name="button' . $i . '">istrinti</button>';

                    echo '</li>';
                }

                //<button type="button" class="btn btn-primary">istrinti</button>
                ?>
            </ul>
        </form>
    </div>


    <div class="div1 mb-3">
        <form method="POST" action="index.php">
            <label for="item" class="form-label">Ka ideti</label>
            <input type="text" class="form-control" id="item" name="item">
            <button type="submit" class="btn btn-primary" name="submit">ideti</button>
        </form>
    </div>

    <?php
    for ($i = 0; $i < count($items); $i++) {
        if (isset($_POST['button' . $i])) {
            console_log("istrinti mygtukas");
            // unset($items[$i]);
            // $items = array_values($items);
            // setcookie('items', json_encode($items), time() + (86400), "/");
            // console_log('this' . $i);
        }
    }
    if (isset($_POST['submit'])) {
        // console_log("submit mygtukas");
        $items[count($items)-1]= $_POST['item'];
        setcookie('items', json_encode($items), time() + (86400), "/");
    }

    ?>
</body>

</html>