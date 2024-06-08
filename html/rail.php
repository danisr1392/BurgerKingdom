<!DOCTYPE html>
<html lang="en">
<head>
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
            animation: marquee 30s linear infinite; /* la animacion durará 30 secs */
        }

        /* hago que el contenedor se vaya desplazando a la izquierda */
        @keyframes marquee {
            from {
                transform: translateX(-40%);
            }
            to {
                transform: translateX(-200%);
            }
        }
        
        #track-container{
            border-top: 2px solid #000;
            border-bottom: 2px solid #000;
            position: relative;
            display: inline-flex;
            gap: 0px;
            margin: 0;
            width: auto;
        }

        #track{
            margin: 0;
            display: inline-block;
            position: relative;
            background-color: #000;
            color: white;
        }

        #track:nth-child(2){
            color: #ee2737;
        }

  </style>
</head>
<body>
    <!-- creo muchos contenedores con el texto 'Burger Kingdom' -->
    <div id="container-rail-d">
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
        <div id="track-container" class="track__container">
            <div id="track" class="track">
                <span>Burger</span>
            </div>
            <div id="track" class="track">
                <span>Kingdom</span>
            </div>
        </div>
    </div>
</body>
</html>