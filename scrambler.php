<?php

require_once('scramblef.php');

$task = 'encode';
$key = 'abcdefghijklmnopqrstuvwxyz1234567890';

if(isset($_GET['task'])&& $_GET['task']!=''){
    $task = $_GET['task'];
}

if('key' ==  $task){

    $original_key = str_split($key);
    shuffle($original_key);
    $key = join('', $original_key);

}elseif(isset($_POST['key']) && $_POST['key'] != ''){

    $key = $_POST['key'];
}

$scrambleData = '';

if('encode' == $task){
    $data = $_POST['data']??'';

    if($data != ''){
        $scrambleData = scrambleData($data, $key);
    }
}

if('decode' == $task){
    $data = $_POST['data']??'';

    if($data != ''){
        $scrambleData = decodeData($data, $key);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Document</title>
    <style>
        h1,h2,h3,h4,h5,h6{
            font-family: sans-serif;
        }
        .genarotor a{
            text-decoration: none;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="heading">
            <h1 class="text-secondary">Data Scrambaler</h1>
        </div>
        
        <div class="genarotor">
            <a href="scrambler.php?task=encode">Encode |</a>
            <a href="scrambler.php?task=decode">Decode |</a>
            <a href="scrambler.php?task=key">Genarate key</a>
        </div>

        <div class="data-table mt-5">
            
            <form action="scrambler.php<?php if('decode' == $task){echo "?task=decode";} ?>" method="post">
                <div class="form-group">
                    <label for="key">Key</label>
                    <input class="form-control" type="text" name="key" id="key" <?php displa_key($key); ?>>
                </div>
                <div class="form-group">
                    <label for="data">Data</label>
                    <textarea class="form-control" name="data" id="data" cols="20" rows="5"><?php if(isset($_POST['data'])){echo $_POST['data']; } ?></textarea>
                </div>
                <div class="form-group">
                    <label for="result">Result</label>
                    <textarea class="form-control" name="result" id="result" cols="20" rows="5"><?php echo $scrambleData; ?></textarea>
                </div>
                <div class="button">
                    <input type="submit" class="btn btn-success" value="Submit">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
