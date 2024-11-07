<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href='../../../public/css/app.css'>
    
    <style>

    body {
        font-family: 'enigma-bold', sans-serif;
    }
    
    .ticket {
        font-family: 'enigma-bold', sans-serif;
        width: 700px;
        height: 300px;

        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7.75%;
        
        position: relative;
    }

    h4 {
        position: absolute;
        bottom: -1.5px;
        left: 238px;
        text-align: left;
        color: #fff;
        font-size: 20px;
        font-family: "enigma-bold", sans-serif;
    }
    
    .qrcode {
        background-color: black;
        width: 105px;
        height: 105px;
        border-radius: 10px;

        position: absolute;
        top: 99.5px;
        right: 43px;
    }

    .nom {
        color: #000;
        font-size: 18px;
        text-align: center;

        position: absolute;
        bottom: 0px;
        right: 52px;
        font-family: "enigma-bold", sans-serif;
    }
    
    .prenoms {
        color: #000;
        font-size: 18px;
        text-align: center;
        
        font-family: "enigma-bold", sans-serif;
        position: absolute;
        bottom: -15px;
        right: 52px;
    }


</style>
</head>
<body>


<div class="ticket">
    <img src="{{public_path().'/img/fond2024.jpg'}}" width="100%" alt="fondTicket" style="z-index:-10;position: absolute;">
        <h4>{{ $tombola }}</h4>
        <div class="qrcode">
            <img src="data:image/png;base64, {!! $qr_code !!}">
        </div>
        <h5 class="nom">{{ $nom }}</h5>
        <h5 class="prenoms">{{ $prenoms }}</h5>
</div>


</body>
</html>