<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        
    .ticket {
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
        top: 35px;
        left: 65px;

        color: #41008A;
        font-family: 'Myriad Pro', sans-serif;
        font-size: 20px;
    }

    .qrcode {
        background-color: black;
        width: 110px;
        height: 110px;

        position: absolute;
        top: 109px;
        left: 58px;
    }

    .img1 {
        width: 30px;
        height: 30px;

        position: absolute;
        bottom: 15px;
        left: 40px;
    }

    .img2 {
        width: 30px;
        height: 30px;

        position: absolute;
        bottom: 15px;
        left: 85px;
    }

    .img3 {
        width: 30px;
        height: 30px;

        position: absolute;
        bottom: 15px;
        left: 125px;
    }

    .img4 {
        width: 30px;
        height: 30px;

        position: absolute;
        bottom: 15px;
        left: 165px;
    }

    .nom {
        color: #ffffff;
        font-family: 'BEASIGNE', sans-serif;
        font-size: 20px;

        position: absolute;
        top: 105px;
        left: 270px;
    }

    .prenoms {
        color: #ffffff;
        font-family: 'BEASIGNE', sans-serif;
        font-size: 20px;

        position: absolute;
        top: 130px;
        left: 270px;
    }


</style>
</head>
<body>

<div class="ticket">
    <img src="{{public_path().'/img/fond.png'}}" width="100%" alt="fondTicket" style="z-index:-10;position: absolute;">
    <!-- <img src="{{asset('img/fond.png')}}" width="100%" alt="fondTicket" style="z-index:-10;position: absolute;"> -->

        <h4>No. {{ $tombola }}</h4>
        <div class="qrcode">
            <img src="data:image/png;base64, {!! $qr_code !!}">
        </div>
        <div class="img1"><img width="100%" src="{{public_path().'/img/c2elogo.png'}}" alt=""></div>
        <!-- <div class="img1"><img width="100%" src="{{asset('img/c2elogo.png')}}" alt=""></div> -->
        <div class="img2"><img width="100%" src="{{public_path().'/img/itvibeslogo.png'}}" alt=""></div>
        <!-- <div class="img2"><img width="100%" src="{{asset('img/itvibeslogo.png')}}" alt=""></div> -->
        <div class="img3"><img width="100%" src="{{public_path().'/img/c2elogo.png'}}" alt=""></div>
        <!-- <div class="img3"><img width="100%" src="{{asset('img/c2elogo.png')}}" alt=""></div> -->
        <div class="img4"><img width="100%" src="{{public_path().'/img/itvibeslogo.png'}}" alt=""></div>
        <!-- <div class="img4"><img width="100%" src="{{asset('img/itvibeslogo.png')}}" alt=""></div> -->
        <h5 class="nom">{{ $nom }}</h5>
        <h5 class="prenoms">{{ $prenoms }}</h5>
</div>


    
</body>
</html>