<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="<?= asset('dist/css/adminlte.min.css') ?>">
</head>
<style>
    .center {
        margin: 0;
        position: absolute;
        top: 40%;
        left: 50%;
        text-align: center;
        transform: translate(-50%, -50%)
    }

    .title {
        margin-top: 50px;
        font-size: 30px;
        font-family: lato;
    }

    .text {
        font-weight: bolder;
        background: linear-gradient(to right, #5b28ff 30%, #04c3ff 70%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
        vertical-align: middle;
        line-height: normal;
        font-size: 45px;
    }

    .desc {
        font-size: 20px;
        font-family: arial;
        color: #007bff;
        margin-top: 16px;
    }

    .mt-240 {
        margin-top: 240px;
    }

    .bg {
        background-image: url('resource/assets/img/bg.png');
        background-size: cover;
        background-repeat: no-repeat;
    }

    .high {
        color: #7d5fff;
        text-decoration: underline;
        text-decoration-color: #7d5fff;
    }

    .btn-outline-primary:hover {
        background-color: transparent;
        color: #5f27cd;
        border-color: #5f27cd;
    }
</style>

<body class="bg">
    <div class="center">
        <h1 class="text">
            <img src="resource/assets/img/logo.png" alt="" style="max-width: 400px;">
        </h1>

        <div style="margin-top: 10%;">
            <a href="<?= url('setup/database/data') ?>"><button type="button" class="btn btn-outline-dark btn-sm">Mulai</button></a>
        </div>
    </div>
</body>

</html>