<!DOCTYPE html>
<html lang="en">
<head>
    <!-- este script es igual que rail.php pero cambiando algunos colores -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Fira+Sans:ital,wght@1,900&family=Oswald:wght@500&family=Poppins&display=swap');

        #container-rail-d{
            width: 100%;
            height: auto;
            background-color: black;
            display: inline-flex;
            user-select: none;
            white-space: nowrap;
            font-size: 80px;
            line-height: 1.5;
            font-weight: 600;
            font-family: "Oswald";
            text-transform: uppercase;
            position: relative;
            animation: marquee 20s linear infinite;
        }
        
        #track3-container{
            position: relative;
            display: inline-flex;
            gap: 0px;
            margin: 0;
            width: auto;
            border-top: 3px solid red;
            border-bottom: 3px solid red;
        }

        #track3{
            margin: 0;
            display: inline-block;
            position: relative;
            background-color: #000;
            color: white;
        }

        #track3:nth-child(1){
            color: black;
            -webkit-text-stroke: 2px white;
        }

        @keyframes marquee {
            from {
                transform: translateX(-40%);
            }
            to {
                transform: translateX(-200%);
            }
        }
    </style>
</head>
<body>
    <div id="container-rail-d">
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track3-container" class="track3__container">
            <div id="track3" class="track3">
                <span>Burger</span>
            </div>
            <div id="track3" class="track3">
                <span>Kingdom</span>
            </div>
        </div>
    </div>
</body>
</html>