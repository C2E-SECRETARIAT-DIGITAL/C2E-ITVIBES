<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>

    <style>
        body{
            margin:0px;
            padding:0px;
        }


        .business-1{
            padding: 30px 10px;
            display: table;
        }

        .mybusiness{
            width: 50%;
            float: left;
            padding: 5px 40px;
            height: 250px;
        
            
        }

        .busi-1{
            align-items: center;
            padding: 150px 0px;
            border-radius: 10px;
        }

        .busi-2{
            /* background: red; */
        }

        .btn{
            text-decoration: none;
            font-size: 14px;
            padding: 10px 20px;
            border: 2px solid rgba(2, 1, 49, 0.918);
            border-radius: 10px;  
            
            left: 0px;
        }

        .btn:hover{
            color: white;
            background:rgba(2, 1, 49, 0.918) ;
        }

        .business-2{
            padding: 10px 30px;
            text-align: center;
            background: rgba(2, 1, 49, 0.918);

            color: white;
            font-size: 16px;
            font-weight: bold;
            border: 18px;
        }

        .business-3{
            padding: 30px 20px;
            display: table;   
        }

        .card{
            
            border: 1px solid ;
            width: 31%; 
            /* height: 200px; */
            border-radius: 20px;
            display: inline-block;
            border-radius: 10px;
            box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2),  0 4px 4px 0 rgba(0, 0, 0, 0.2);
            margin: 0px 1%;
        }

        .card-div{
            padding: 10px 20px;
        }
        .card-div p:first-child{
            font-size: 28px;
            font-weight:bold;
        }
        .card-end{
            padding: 10px 20px;  
            background: rgba(128, 128, 128, 0.11);
            border-radius: 0px 0px 20px 20px ; 
        }

        .business{
            padding: 150px 10px;
        }

        
    </style>
</head>
<body>

    <div class="business">

        <div class="business-1">
            <div class="mybusiness busi-1">
                <img src="data:image/png;base64, {!! $qr_code !!}">
                <div  style="text-align: right; margin-right:10px; color:gray">
    
                    
                </div>
            </div>
            <div class="mybusiness busi-2">
                <div style=" text-align: center;">
                    <p>
                        <img src="{{asset('img/ItVibesLogoshort.jpeg')}}" style="height: 100px; weight:100px" alt="ItVibes">
                        
                    </p>
                    <p style="font-weight: bold">
                        {{ $person }}
                    </p>
                </div>
                <div style="font-size: 14px">
                    <span style="font-weight: bolder; color:gray ">Au programme</span>  :
                    <ul>
                        <li>Du sport (football, basketball, chasse au trésor)</li>
                        <li>Des jeux de sociétés (échecs, scrabbles, dame)</li>
                        <li>Des battle (danse, zouglou « woyo », karafolie…)</li>
                        <li style="font-weight: bolder">Une bouffe party</li>
                        <li> une soirée cinéma</li>
                    </ul>
                    	
                    <p style="text-align: center">
                        <h6> Ticket imprimé le {{ $date }} </h6>
                    </p>
                </div>
                
                
            </div>
        </div>

        
        

    </div>


    
</body>
    
</body>
</html>