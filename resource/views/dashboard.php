<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PANDORACODE - PHOENIX V3</title>
    <link rel="stylesheet" href="<?= asset('dist/css/adminlte.min.css') ?>">
</head>
<style>
    body {
        background-color: #14161F;
        margin-top: 10%;
    }

    .logo {
        width: 100%
    }

    p{
        color:white;
        font-family: 'arial';
        margin-top: 30px;
    }

    button{
        background-color: #E82F3D;
        border: none;
        color: white;
        width:120px;
        height: 40px;
        font-weight: bold;
        font-family: "calibri";
        margin-top: 17px;
    }

    button:hover{
        background-color: white;
        border: none;
        color: #E82F3D;
    }

    .repository{
        background-color: #14161F;
        border: 1px solid #E82F3D;
        color: #E82F3D;
        width:120px;
        height: 40px;
        font-weight: bold;
        font-family: "calibri";
        margin-top: 17px;
    }

    .w-10{
        max-width: 110px;
    }

</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 content">
                <img src="<?= asset('img/logo.png') ?>" class="logo" alt="">
                <p>
                    <b>Helper system php</b> yang sudah kami tata dengan sebaik mungkin <br>
                    dan membebaskan anda untuk berkreasi dalam membuat sebuah sistem <br>
                    sangat cocok untuk anda yang mengembangkan sistem baik secara solo maupun tim.
                </p>
                <a href="<?= url('setup/database/data') ?>"><button>Mulai</button></a>
                <a target="_blank" href="https://gitlab.com/pandoradevofficial/pandoracode-phoenix"><button class="repository ml-1">Repository Git</button></a>
                
                <p>
                    <img class="img-responsive w-10" src="<?= asset('img/by-pandoradev.png') ?>" alt="">
                </p>
            </div>
        </div>
    </div>
</body>

</html>