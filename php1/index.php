<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uzduotis1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body{
            width: 95%;
            margin:auto;
        }
    </style>
</head>

<body>
    <h1>Atspek skaiciu</h1>

    <form method="POST" action="index.php">
        <div class="mb-3">
        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="diff">
            <option selected disabled>Pasirinkti Sunkuma</option>
            <option value="3">3</option>
            <option value="5">5</option>
            <option value="9">9</option>
        </select>
        </div>
        <div class="mb-3">
            <label for="skaicius" class="form-label">Tavo Skaicius</label>
            <input type="number" class="form-control" id="skaicius" name="skaicius">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">bandyt</button>
    </form>
    <?php
    if(isset($_POST['submit'])){
    if(!empty($_POST['diff'])) {
        $selected = $_POST['diff'];
        //game here
        $choice = $_POST['skaicius'];
        $answer = rand(1, $selected);
        if($choice == $answer){
            echo '<div class="alert alert-success" role="alert">
            teisingai
          </div>';
        } else{
            echo '<div class="alert alert-danger" role="alert">
            neteisingai, teisingas buvo '.$answer.
          '</div>';
        }

        // echo 'You have chosen: ' . $selected . ' ' . $choice;
    } else {
        echo 'Prašau pasirinkti skaičių';
    }
    }
?>
</body>

</html>