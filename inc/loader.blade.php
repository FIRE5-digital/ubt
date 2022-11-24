<style>
    .loaded .loader-ctr{
        opacity:0;
        height:0;
        display: none;
    }
    .loader-ctr{
        opacity:1;
        background-color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        position:fixed;
        width: 100%;
        height:100%;
        top:0;
        left: 0;
        visibility: visible;
        transition: opacity 0.3s, height 0.3s 0.4s;
        z-index: 999999999;
    }

    .loader{
        width: 300px;
        height:90px;
        /*animation: rotation 4s infinite ease-in-out;*/
    }

    .loader img{
        margin-bottom:30px;
        width:100%;
        height:auto;
    }

    .circles{
        display:flex;
        justify-content: space-between;
    }

    .circles div{
        width:20px;
        height:20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .circles span{
        border:3px solid ##00ab4e;
        border-radius: 20px;
        animation: rtb 1.5s infinite ease-in-out;
        width:16px;
        height:16px;
    }

    .circles div:nth-of-type(1) span{
        animation-delay: 0s;
    }
    .circles div:nth-of-type(2) span{
        animation-delay: 0.1s;
    }
    .circles div:nth-of-type(3) span{
        animation-delay: 0.2s;
    }
    .circles div:nth-of-type(4) span{
        animation-delay: 0.3s;
    }

    @keyframes rtb {
        20%   {border-color: #83D653; width:16px; height:16px;}
        60%  {border-color: #ffffff; width:5px; height:5px;}
        100% {border-color: #00ab4e; width:16px; height:16px;}
    }

    @keyframes rotation {
        0% {
            transform: rotate(0);
        }
        40% {
            transform: rotate(0);
        }
        50% {
            transform: rotate(360deg);
        }
        90% {
            transform: rotate(360deg);
        }
        100% {
            transform: rotate(0deg);
        }
    }
</style>

<div class="loader-ctr">
    <div class="loader">
        <img src="/themes/ubt/img/logo@2x.png" alt="{{ config('company.name') }}">
        <div class="circles">
            <div><span></span></div>
            <div><span></span></div>
            <div><span></span></div>
            <div><span></span></div>
        </div>
    </div>
</div>