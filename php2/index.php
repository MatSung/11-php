<!DOCTYPE html>
<?php
if (!isset($_COOKIE['pinigai'])) {
    setcookie('pinigai', 0, time() + (86400), "/");
}
function console_log($data)
{
    echo '<script>';
    echo 'console.log(' . json_encode($data) . ')';
    echo '</script>';
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uzduotis2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            width: 95%;
            margin: auto;
        }

        .div1 {
            display: inline-block;
            width: 49%;
            margin-top: 100px;
        }
    </style>

</head>

<body>

    <div class="div1 mb-3">
        <form method="POST" action="index.php">
            <label for="skaicius" class="form-label">Kiek pinigu i taupykle?</label>
            <input type="number" class="form-control" id="skaicius" name="skaicius">
            <div name="pinigu">turi pinigu <?php echo $_COOKIE['pinigai'] + $_POST['skaicius']; ?></div>
            <button type="submit" class="btn btn-primary" name="submit">ideti</button>
        </form>
    </div>

    


    <?php
    $pinigai = $_COOKIE['pinigai'] + $_POST['skaicius'];
    $items = [
        [
            'name' => 'Playstation 5',
            'price' => 849.99
        ],
        [
            'name' => 'Iphone 13',
            'price' => 999.99
        ],
        [
            'name' => 'Bulviu tarkavimo masina migris',
            'price' => 89.99
        ],
        [
            'name' => 'Mikrobangų krosnelė DOMO DO2342CG',
            'price' => 253
        ]
    ];
    ?>

    <!-- saraso sudarymas -->




    <div class="div1 mb-3">
        <ul>
            <?php
            //kvieciu funkcija kuria cia sukuriau :DDD
            //nebetaisysiu nes veikia
            reloadList($items, $pinigai);
            function reloadList($items, $pinigai)
            {
                for ($i = 0; $i < count($items); $i++) {
                    echo '<li>';
                    echo $items[$i]['name'] . ' (' . $items[$i]['price'] . ') ';
                    if ($items[$i]['price'] > $pinigai) {
                        echo '<span class="badge bg-danger">neiperkama</span>';
                    } else {
                        echo '<span class="badge bg-success">iperkama</span>';
                    }
                    //jeigu iperkama, zalias, jeigu ne, raudonas
                    echo '</li>';
                }
            }

            ?>
        </ul>
    </div>
            
    <?php
    if (isset($_POST['submit'])) {
        if (!empty($_POST['skaicius'])) {
            setcookie('pinigai', $_COOKIE['pinigai'] + $_POST['skaicius'], time() + (86400), "/");
            console_log($_COOKIE['pinigai'] + $_POST['skaicius']);
        } else {
            echo 'Prašau pasirinkti skaičių';
        }
    }
    ?>
</body>

</html>