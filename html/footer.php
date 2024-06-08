<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Fira+Sans:ital,wght@1,900&family=Oswald:wght@500&family=Poppins&display=swap');

        .footer{
            width: 100%;
            height: auto;
            background-color: #E9E9EB;
        }

        .footer-bottom{
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            padding: 20px 20px;
        }

        .footer-bottom-legalidad{
            display: flex;
            flex-direction: column;
        }

        .footer-bottom-legalidad a{
            color: #000;
        }

        .footer-bottom-legalidad a:hover{
            color: #ee2737;
            transition: 0.3s ease;
        }

        .footer-bottom-social{
            display: flex;
            flex-direction: row;
            gap: 15px;
        }

        .footer-bottom-social img{
            padding: 8px;
            border-radius: 30%;
        }

        .footer-bottom-social img:hover{
            transition: .3s ease;
            background-color: #ee2737;
        }

        @media only screen and (max-width: 1200px){

            .footer-bottom{
                display: flex;
                flex-direction: column;
                gap: 30px;
                text-align: center;
            }

            .footer-bottom-social{
                display: flex;
                flex-direction: row;
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <footer class="footer">
        <div class="footer-bottom">
            <!-- añado 2 enlaces para documentacion y 1 para ir al registro -->
            <div class="footer-bottom-legalidad">
                <a href="https://static.burgerkingencasa.es/bkhomewebsite/es/myburgerking_legal_es.pdf" target="_blank" style="font-family: 'Oswald'; text-decoration: none;">Condiciones Legales</a>
                <a href="https://static.burgerkingencasa.es/bkhomewebsite/es/myburgerking_restaurants_es.pdf" target="_blank" style="font-family: 'Oswald'; text-decoration: none;">Restaurantes Adheridos</a>
                <a href="registro.php" style="font-family: 'Oswald'; text-decoration: none;">Registrarse</a>
            </div>

            <!-- añado copyright -->
            <div class="footer-bottom-copy">
                <p style="font-family: 'Oswald'">©<b>2023 BURGER KINGDOM CORPORATION</b>, TODOS LOS DERECHOS RESERVADOS</p>
            </div>

            <!-- añado los 4 iconos de redes sociales -->
            <div class="footer-bottom-social">
                <a href="https://twitter.com/burgerking?lang=es" target="_blank"><img src="https://cdn-icons-png.flaticon.com/128/733/733635.png" width="60" height="60"></a>
                <a href="https://www.instagram.com/burgerking_es/?hl=es" target="_blank"><img src="https://cdn-icons-png.flaticon.com/128/739/739193.png"  width="60" height="60"></a>
                <a href="https://www.youtube.com/user/Burgerkingespana" target="_blank"><img src="https://cdn-icons-png.flaticon.com/128/1384/1384028.png"  width="60" height="60"></a>
                <a href="https://www.facebook.com/burgerkingespana" target="_blank"><img src="https://cdn-icons-png.flaticon.com/128/1384/1384005.png"  width="60" height="60"></a>
            </div>
        </div>
    </footer>
</body>
</html>