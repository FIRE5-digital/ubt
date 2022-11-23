<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Page Not Found</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" type="text/css">
    <style>

        * {
            line-height: 1.2;
            margin: 0;
        }

        html {
            color: #ffffff;
            background:#25272c;
            display: table;
            font-family: 'Poppins', sans-serif;
            height: 100%;
            text-align: center;
            width: 100%;
        }

        body {
            display: table-cell;
            vertical-align: middle;
            margin: 2em auto;
        }

        h1 {
            color: #ffffff;
            font-size: 62px;
            font-weight: 00;
            margin:55px auto 0;
            text-transform:uppercase;
        }
        h3{
            margin-bottom:40px;
            font-size:26px;
        }

        p {
            margin: 15px auto 120px;
            width: 515px;
            font-size:22px;
        }
        p span{
            font-weight:700;
        }
        a{
            color:#00BDA5;
        }

        svg{
            width: 85px;
            height:auto;
            margin-top:40px;
        }

        .error-shapes{
            position: absolute;
            width: 100%;
            height: 89%;
            bottom: 0;
            overflow: hidden;
        }
        .error-shapes span{
            background-image:url('');
            background-image:url('../img/shapes/green-hex.svg');
            background-size:contain;
            background-repeat:no-repeat;
            width:40px;
            height:40px;
            position: absolute;
            opacity:1;
            transform:rotate(0);
        }

        .error-shapes span:nth-of-type(4n){
            background-image:url('../img/shapes/blue-hex.svg');
            
        }
        .error-shapes span:nth-of-type(4n+1){
            background-image:url('../img/shapes/yellow-hex.svg');
        }
        .error-shapes span:nth-of-type(4n+2){
            background-image:url('../img/shapes/red-hex.svg');
            
        }

        .error-shapes span:nth-of-type(1){
            bottom:10%;
            left:3%;
            width:30px;
            height:30px;
            transform:rotate(8deg);
            opacity:0.4;
        }
        .error-shapes span:nth-of-type(2){
            bottom:18%;
            left:12%;
            width:36px;
            height:36px;
            transform:rotate(15deg);
            opacity:0.32;
        }
        .error-shapes span:nth-of-type(3){
            bottom:15%;
            left:19%;
            width:50px;
            height:50px;
            transform:rotate(21deg);
            opacity:0.35;
        }
        .error-shapes span:nth-of-type(4){
            bottom:3%;
            left:26%;
            width:20px;
            height:20px;
            transform:rotate(29deg);
            opacity:0.47
        }
        .error-shapes span:nth-of-type(5){
            bottom:26%;
            left:31%;
            width:50px;
            height:50px;
            transform:rotate(24deg);
            opacity:0.24
        }
        .error-shapes span:nth-of-type(6){
            bottom:6%;
            left:35%;
            width:30px;
            height:30px;
            transform:rotate(36deg);
            opacity:0.44
        }
        .error-shapes span:nth-of-type(7){
            bottom:14%;
            left:41%;
            width:45px;
            height:45px;
            transform:rotate(2deg);
            opacity:0.36
        }
        .error-shapes span:nth-of-type(8){
            bottom:10%;
            left:47%;
            width:30px;
            height:30px;
            transform:rotate(8deg);
            opacity:0.4
        }
        .error-shapes span:nth-of-type(9){
            bottom:3%;
            left:55%;
            width:40px;
            height:40px;
            transform:rotate(17deg);
            opacity:0.47
        }
        .error-shapes span:nth-of-type(10){
            bottom:22%;
            left:58%;
            width:15px;
            height:15px;
            transform:rotate(22deg);
            opacity:0.28
        }
        .error-shapes span:nth-of-type(11){
            bottom:24%;
            left:65%;
            width:35px;
            height:35px;
            transform:rotate(29deg);
            opacity:0.26
        }
        .error-shapes span:nth-of-type(12){
            bottom:2%;
            left:68%;
            width:20px;
            height:20px;
            transform:rotate(33deg);
            opacity:0.48
        }
        .error-shapes span:nth-of-type(13){
            bottom:22%;
            left:96%;
            width:25px;
            height:25px;
            transform:rotate(41deg);
            opacity:0.28
        }
        .error-shapes span:nth-of-type(14){
            bottom:8%;
            left:75%;
            width:40px;
            height:40px;
            transform:rotate(3deg);
            opacity:0.42
        }
        .error-shapes span:nth-of-type(15){
            bottom:16%;
            left:86%;
            width:30px;
            height:30px;
            transform:rotate(12deg);
            opacity:0.34
        }
        .error-shapes span:nth-of-type(16){
            bottom:8%;
            left:92%;
            width:15px;
            height:15px;
            transform:rotate(22deg);
            opacity:0.42
        }

        @media only screen and (max-width: 768px) {

            body, p {
                width: 95%;
            }

            h1 {
                font-size: 38px;
                width:auto;
            }

        }

    </style>
    <script>
    function goBack() {
        window.history.back()
    }
</script>
</head>
<body>
    <div class="error-shapes">
        <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
    </div>
    <a href="/">
        <img src="{{ config('company.website').'/'.config('company.company_logo') }}" alt="{{ config('company.email') }}">
    </a>
    <div class="404">
        <h1>
        <span>404 Error</span></h1>
    </div>
    <h3>This page doesn't exist</h3>
    <p>Having trouble? Call us on <span>{{ config('company.telephone') }}</span> or email us at <span>{{ config('company.email') }}</span></p>
    
</body>
</html>
<!-- IE needs 512+ bytes: https://blogs.msdn.microsoft.com/ieinternals/2010/08/18/friendly-http-error-pages/ -->
