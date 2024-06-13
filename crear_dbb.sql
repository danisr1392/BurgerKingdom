/*script exportado de phpmyadmin una vez creada la bdd*/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP DATABASE if exists burgerkingdom; 
CREATE DATABASE burgerkingdom;
USE burgerkingdom;


CREATE TABLE `detallespedido` (
  `id_ped` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallespedido`
--

INSERT INTO `detallespedido` (`id_ped`, `id_prod`, `cantidad`) VALUES
(1, 1, 2),
(1, 20, 1),
(2, 10, 1),
(2, 11, 1),
(2, 20, 2),
(3, 9, 4),
(3, 22, 2),
(4, 9, 1),
(4, 12, 1),
(4, 17, 1),
(4, 25, 1),
(5, 6, 1),
(5, 13, 2),
(5, 20, 2),
(6, 7, 2),
(6, 18, 1),
(6, 19, 1),
(6, 20, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesproducto`
--

CREATE TABLE `detallesproducto` (
  `id_prod` int(11) NOT NULL,
  `id_ingr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallesproducto`
--

INSERT INTO `detallesproducto` (`id_prod`, `id_ingr`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(7, 1),
(8, 1),
(9, 1),
(11, 1),
(6, 2),
(10, 2),
(1, 3),
(2, 3),
(4, 3),
(6, 3),
(7, 3),
(9, 3),
(10, 3),
(11, 3),
(3, 4),
(5, 4),
(8, 4),
(1, 5),
(3, 5),
(4, 5),
(5, 5),
(6, 5),
(1, 6),
(2, 6),
(4, 6),
(5, 6),
(10, 6),
(1, 7),
(11, 7),
(1, 8),
(2, 8),
(7, 8),
(8, 8),
(9, 8),
(11, 8),
(3, 9),
(4, 9),
(1, 10),
(2, 10),
(3, 10),
(6, 10),
(8, 10),
(9, 10),
(11, 10),
(3, 11),
(9, 11),
(2, 13),
(11, 13),
(2, 14),
(3, 14),
(4, 14),
(5, 14),
(6, 14),
(8, 14),
(9, 14),
(11, 14),
(1, 15),
(2, 15),
(3, 15),
(6, 15),
(10, 15),
(7, 16),
(4, 17),
(5, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingrediente`
--

CREATE TABLE `ingrediente` (
  `id_ingr` int(11) NOT NULL,
  `nombre` varchar(100),
  `imagen` varchar(300)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingrediente`
--

INSERT INTO `ingrediente` (`id_ingr`, `nombre`, `imagen`) VALUES
(1, 'Ternera', 'https://cdn-icons-png.flaticon.com/512/1702/1702834.png'),
(2, 'Pollo', 'https://cdn-icons-png.flaticon.com/512/4391/4391764.png'),
(3, 'Pan', 'https://cdn-icons-png.flaticon.com/512/3348/3348101.png'),
(4, 'Pan Brioche' , 'https://cdn-icons-png.flaticon.com/512/3348/3348078.png'),
(5, 'Tomate', 'https://cdn-icons-png.flaticon.com/512/5280/5280911.png'),
(6, 'Lechuga', 'https://cdn-icons-png.flaticon.com/512/3823/3823393.png'),
(7, 'Jalapeños', 'https://cdn-icons-png.flaticon.com/512/5030/5030063.png'),
(8, 'Queso Cheddar', 'https://cdn-icons-png.flaticon.com/512/2057/2057212.png'),
(9, 'Queso Gouda', 'https://cdn-icons-png.flaticon.com/512/3307/3307913.png'),
(10, 'Bacon', 'https://cdn-icons-png.flaticon.com/512/1582/1582138.png'),
(11, 'Cebolla', 'https://cdn-icons-png.flaticon.com/512/2522/2522907.png'),
(12, 'Huevo', 'https://cdn-icons-png.flaticon.com/512/1046/1046774.png'),
(13, 'Guacamole', 'https://cdn-icons-png.flaticon.com/512/4727/4727290.png'),
(14, 'Salsa BBQ', 'https://cdn-icons-png.flaticon.com/512/2755/2755300.png'),
(15, 'Mayonesa', 'https://cdn-icons-png.flaticon.com/512/1811/1811985.png'),
(16, 'Ketchup', 'https://cdn-icons-png.flaticon.com/512/1811/1811987.png'),
(17, 'Aguacate', 'https://cdn-icons-png.flaticon.com/512/2079/2079291.png'),
(18, 'Jamón Serrano', 'https://cdn-icons-png.flaticon.com/512/454/454411.png'),
(19, 'Setas', 'https://cdn-icons-png.flaticon.com/512/765/765591.png');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_ped` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `metodo_pago` varchar(50) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_rep` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_ped`, `precio`, `metodo_pago`, `fecha_entrega`, `id_user`, `id_rep`) VALUES
(1, '20.98', 'Paypal', '2023-09-15', 6, 1),
(2, '18.98', 'Paypal', '2023-09-24', 7, 2),
(3, '45.96', 'Paypal', '2023-09-04', 5, 3),
(4, '15.47', 'Paypal', '2023-07-03', 5, NULL),
(5, '21.97', 'Paypal', '2023-05-14', 8, 4),
(6, '20.96', 'Paypal', '2023-08-07', 9, NULL),
(7, '20.98', 'Paypal', '2023-09-15', 6, 1),
(8, '18.98', 'Paypal', '2023-09-24', 7, 2),
(9, '45.96', 'Paypal', '2023-09-04', 5, 3),
(10, '15.47', 'Paypal', '2023-07-03', 5, NULL),
(11, '21.97', 'Paypal', '2023-05-14', 8, 4),
(12, '20.96', 'Paypal', '2023-08-07', 9, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_prod` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tipo` enum('Hamburguesa','Snack','Bebida') NOT NULL,
  `imagen` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_prod`, `nombre`, `descripcion`, `precio`, `id_user`, `tipo`, `imagen`) VALUES
(1, 'Nara Burger', 'Nuestra best seller, versión carbonara. Carne picada en la plancha con bacon bits, queso americano, cebolla a la plancha y salsa estilo carbonara. ¡Molto buona!', '9.99', 1, 'Hamburguesa', 'https://www.goiko.com/es/wp-content/uploads/2023/10/KevinCarbonara_1200x600px-340x340.png'),
(2, 'King Rodeo', 'Para los que buscan un sabor auténtico y mayor jugosidad. Hamburguesa GOIKO con 220 g de carne de buey criado en libertad -con una alimentación 100% natural-, carpaccio de panceta ahumada y rúcula. Acompañada de nuestras patatas caseras.', '8.99', 1, 'Hamburguesa', 'https://www.goiko.com/es/wp-content/uploads/2023/12/PORK-STAR_1200x600px-340x340.png'),
(3, 'Kevin Bacon', 'El auténtico best seller de esta casa. ¿Sabes cómo se hace una King? Fácil pero increíblemente rico: Picamos la carne directamente en la plancha y la mezclamos con trozos de bacon, cebolla crunchy y queso americano. ¡Una vez que la pruebas no puedes dejar de pensar en ella! Te recomendamos que le añ', '8.99', 1, 'Hamburguesa', 'https://www.goiko.com/es/wp-content/uploads/2017/03/KevinBacon_1200x600px-340x340.png'),
(4, 'Serrana', 'Carne picada en la plancha con pedacitos de jamón serrano crujiente, queso manchego y americano, patatas paja y huevo frito, acompañada de salsa Brava Goiko. Viene con patatas bañadas en salsa Alioli Goiko.', '7.99', 1, 'Hamburguesa', 'https://www.goiko.com/es/wp-content/uploads/2022/05/Kevin-Serrana_1200x600px-1-340x340.png'),
(5, 'King-Kong', 'Tu King de siempre (Carne, bacon bits, cebolla crunchy y queso americano) con costilla desmenuzada y salsa barbacoa.', '6.99', 1, 'Hamburguesa', 'https://www.goiko.com/es/wp-content/uploads/2020/12/KVN-COSTNER-_1200x600px-340x340.png'),
(6, 'Kevin Chick', 'Nuestra obsesión por Kevin es REAL y, por eso, ahora llega… ¡KEVIN CHICK! 🍔 Pollo empanado picado al estilo Kevin, bacon bits, cebolla crunchy y queso americano. Uffff, ¡MUUUCHO KEVIIIIIN! 😎', '9.99', 1, 'Hamburguesa', 'https://www.goiko.com/es/wp-content/uploads/2021/02/KEVIN-CHICK_1200x600px-340x340.png'),
(7, 'M-30', 'Algo tan simple nunca fue tan delicioso. Solo con dos ingredientes, queso de cabra al grill y cebolla caramelizada, se te hará la boca agua. Llévala al siguiente nivel añadiendo bacon o champiñones a la plancha. ¡Directa a tu lista de burgers favoritas! ', '6.99', 1, 'Hamburguesa', 'https://www.goiko.com/es/wp-content/uploads/2017/02/M30_1200x600px-340x340.png'),
(8, 'Kiki', 'Pollo crujiente, queso americano, bacon, lechuga iceberg y Salsa 50 de Goiko. Dale un toque especial añadiéndole pepinillos o huevo frito… ¡Otro rollo! ', '5.99', 1, 'Hamburguesa', 'https://www.goiko.com/es/wp-content/uploads/2019/11/Kiki-_1200x600px-340x340.png'),
(9, 'Pigma', 'No hay duda: todo con huevo mola más. Huevo frito, bacon, queso americano y salsa Mayo Goiko. Te recomendamos que le añadas champiñones a la plancha o aros de cebolla… ¡MMMMM!', '10.99', 1, 'Hamburguesa', 'https://www.goiko.com/es/wp-content/uploads/2017/02/Pigma_1200x600px-340x340.png'),
(10, 'Long Chicken', 'Es una realidad: no hay burger ni más sexy ni más bomba. Queso Monterey Jack empanado, setas fritas, bacon, salsa Mayo ahumada y lechuga batavia. Los más burgerlovers le añaden pepinillos o cebolla natural, ¿te atreves?', '7.99', 1, 'Hamburguesa', 'https://www.goiko.com/es/wp-content/uploads/2017/07/BombaSexy_1200x600px-340x340.png'),
(11, 'Yankee', 'Para los que le gusta poner toooda la carne en el asador. Carne de vaca, costilla de cerdo en salsa Barbacoa Goiko, queso americano, cebolla al grill y lechuga batavia. Si te atreves a añadirle algo más, te recomendamos que la pruebes con cebolla crunchy o champiñones a la plancha. ¡Simplemente brut', '8.99', 1, 'Hamburguesa', 'https://www.goiko.com/es/wp-content/uploads/2017/03/Yankee_1200x600px-340x340.png'),
(12, 'Baby Yankee', 'Como su propio nombre indica, es la versión baby de La Yankee. Costillas de cerdo deshuesadas en salsa Barbacoa Goiko, queso americano, cebolla a la plancha y lechuga batavia. Si quieres ir un paso más allá, te recomendamos que la pruebes con cebolla crunchy o champiñones a la plancha. ¡No te arrepe', '6.99', 2, 'Hamburguesa', 'https://www.goiko.com/es/wp-content/uploads/2017/02/BabyYankee_1200x600px-1-340x340.png'),
(13, 'Kikiller', 'Pollo crujiente, queso americano, lechuga batavia y nuestra salsa Mayo Ahumada. ', '5.99', 2, 'Hamburguesa', 'https://www.goiko.com/es/wp-content/uploads/2021/11/KIKILLER_1200x600px-1-340x340.png'),
(14, 'Chipotle', 'Si amas el guacamole, deja de buscar, esta es tu burger. Guacamole casero, fresco y rústico, acompañado con salsa Chipotle. Si quieres darle un toque distinto, te recomendamos añadirle queso americano o bacon. ¡ÑAAAAM!', '4.99', 2, 'Hamburguesa', 'https://www.goiko.com/es/wp-content/uploads/2017/02/Chipotle_1200x600px-340x340.png'),
(15, 'Tequeños', '¡Están tan ricos que se acaban en lo que dura un ÑAM! Palitos fritos rellenos de queso derretido, acompañados con tu salsa favorita de la casa. ¡Tradición venezolana!', '2.99', 2, 'Snack', 'https://www.goiko.com/es/wp-content/uploads/2017/02/Teques_Sala_1200x600px-340x340.png'),
(16, 'Tequeños Italy', 'Una obra de arte con sabor a pizza. La versión italiana de nuestros famosos teques, rellenos de queso derretido, orégano, albahaca y tomate, acompañados de salsa de tomate casera Goiko.', '1.99', 2, 'Snack', 'https://www.goiko.com/es/wp-content/uploads/2023/06/TEQUEVINCI_1200x600_Ficha-de-producto_Web-340x340.jpg'),
(17, 'Chicken Fingers', 'Hay cosas que nunca fallan. Tiras de pollo empanadas, acompañadas de tu salsa favorita de la casa. Disponible en versión small.', '1.99', 2, 'Snack', 'https://www.goiko.com/es/wp-content/uploads/2017/02/CHICKENTENDERS_1200x600px-1-340x340.png'),
(18, 'Nachos', 'Un clásico para compartir, ¡el último tiene que ser tuyo! Nachos bañados en chili con carne, guacamole, tomate, nata agria, jalapeños y Enquésame. ', '3.99', 2, 'Snack', 'https://www.goiko.com/es/wp-content/uploads/2017/02/NACHORREO_1200x600px-340x340.png'),
(19, 'Aros de Queso', 'Aros de queso gouda derretido, setas y trufa acompañados de nuestra salsa Mayo Goiko.', '2.99', 2, 'Snack', 'https://www.goiko.com/es/wp-content/uploads/2023/04/TRUFF-RINGS_1200x600px-1-340x340.png'),
(20, 'Aros de Cebolla', 'Los clásicos aros de cebolla acompañados de salsa Barbacoa Goiko. Disponible en versión small.', '2.99', 2, 'Snack', 'https://www.goiko.com/es/wp-content/uploads/2017/02/ONION-RINGS_1200x600px-340x340.png'),
(22, 'Chilitos', 'Triángulos rebozados con chips de nachos, rellenos de chili con carne y acompañados con salsa de tomate casera y nata agria. ¡Pídeme, que no pico!', '2.99', 2, 'Snack', 'https://www.goiko.com/es/wp-content/uploads/2024/03/CHILITOS_1200x600px-340x340.png'),
(23, 'Coca Cola', NULL, '1.00', 3, 'Bebida', 'https://resizer.deliverect.com/Mw1CozvgygBK1PFbmfHjK7alt7tk-xvvurdrY8GLHf4/rt:fill/g:ce/el:0/aHR0cHM6Ly9zdG9yYWdlLmdvb2dsZWFwaXMuY29tL2lrb25hLWJ1Y2tldC1wcm9kdWN0aW9uL2ltYWdlcy82MjU2ZGU2ZWNjYzgxZTk2MWU2MzJkZjEvUGV0X0NvY2Fjb2xhLTY2MGFlMTJhODM2MWUxOWJjOTM0MzM1Yy5wbmc=.jpg'),
(24, 'Fanta Naranja', NULL, '1.00', 3, 'Bebida', 'https://resizer.deliverect.com/0mbrXCW_HLSwJEa0SjfR5stkVmQRcOTFyfzMpFtPCGs/rt:fill/g:ce/el:0/aHR0cHM6Ly9zdG9yYWdlLmdvb2dsZWFwaXMuY29tL2lrb25hLWJ1Y2tldC1wcm9kdWN0aW9uL2ltYWdlcy82MjU2ZGU2ZWNjYzgxZTk2MWU2MzJkZjEvUGV0X0ZhbnRhTmFyYW5qYS02NjBhZTEyYTgzNjFlMTliYzkzNDMzNWUucG5n.jpg'),
(25, 'Agua', NULL, '1.00', 3, 'Bebida', 'https://resizer.deliverect.com/plZPk0ad91qaXE3_5pl6CWpK9pYtj0Y6dEAqUR3hwYk/rt:fill/g:ce/el:0/aHR0cHM6Ly9zdG9yYWdlLmdvb2dsZWFwaXMuY29tL2lrb25hLWJ1Y2tldC1wcm9kdWN0aW9uL2ltYWdlcy82MjU2ZGU2ZWNjYzgxZTk2MWU2MzJkZjEvQWd1YS02NjBhZTExNTM5MDcwZjAyM2NlYTU3NWIucG5n.jpg'),
(26, 'Nestea', NULL, '1.00', 3, 'Bebida', 'https://resizer.deliverect.com/CdHl7xL4-eCcLYC_N-g1lm9OdYeYVu-VVyPO_D1vpCY/rt:fill/g:ce/el:0/aHR0cHM6Ly9zdG9yYWdlLmdvb2dsZWFwaXMuY29tL2lrb25hLWJ1Y2tldC1wcm9kdWN0aW9uL2ltYWdlcy82MjU2ZGU2ZWNjYzgxZTk2MWU2MzJkZjEvUGV0X05lc3RlYS02NjBhZTEyYTgzNjFlMTliYzkzNDMzNWYucG5n.jpg'),
(27, 'Red Bull', NULL, '1.50', 3, 'Bebida', 'https://resizer.deliverect.com/ylX8Ktuzfdu4-EBcVwFDfUZnOWZ65EpdG5oYXh7NAY0/rt:fill/g:ce/el:0/cb:f4fedaf692ec459bb71d37f8eecd896a/aHR0cHM6Ly9zdG9yYWdlLmdvb2dsZWFwaXMuY29tL3Jldm8tY2xvdWQtYnVja2V0L3hlZi9nb2lrby9pbWFnZXMvaTgyZmxlb2pDTy5wbmc=.jpg'),
(28, 'Red Bull Sandía', NULL, '1.50', 3, 'Bebida', 'https://resizer.deliverect.com/HMn0neyXFbQqkYYeY5iQMZcWCE7CmqCKRziHScPfTyY/rt:fill/g:ce/el:0/cb:2fa563b4943447f3954fc0692ce0166c/aHR0cHM6Ly9zdG9yYWdlLmdvb2dsZWFwaXMuY29tL3Jldm8tY2xvdWQtYnVja2V0L3hlZi9nb2lrby9pbWFnZXMvRE1laU9kNm9ZMi5wbmc=.jpg'),
(29, 'Cerveza', NULL, '1.50', 3, 'Bebida', 'https://resizer.deliverect.com/848ez9wZQ9ykGc7-QhXn3UelqYmtIrFMZSMKGokC7po/rt:fill/g:ce/el:0/aHR0cHM6Ly9zdG9yYWdlLmdvb2dsZWFwaXMuY29tL2lrb25hLWJ1Y2tldC1wcm9kdWN0aW9uL2ltYWdlcy82MjU2ZGU2ZWNjYzgxZTk2MWU2MzJkZjEvQ2VydmV6YV9BbGhhbWJyYTE5MjUtNjYwYWUxMTUzOTA3MGYwMjNjZWE1NzVlLnBuZw==.jpg'),
(30, 'Aquarius', NULL, '1.00', 3, 'Bebida', 'https://resizer.deliverect.com/K-pV-m_83vpX0VSk7kjWNYAQWIEh-kZjvFl5zyxysDI/rt:fill/g:ce/el:0/aHR0cHM6Ly9zdG9yYWdlLmdvb2dsZWFwaXMuY29tL2lrb25hLWJ1Y2tldC1wcm9kdWN0aW9uL2ltYWdlcy82MjU2ZGU2ZWNjYzgxZTk2MWU2MzJkZjEvUGV0X0FxdWFyaXVzLTY2MGFlMTJhODM2MWUxOWJjOTM0MzM1Yi5wbmc=.jpg'),
(31, 'Sprite', NULL, '1.00', 3, 'Bebida', 'https://resizer.deliverect.com/0nDPvgHXq3C4qGhExZa_sjAm6DcGaPUgyTChMCA1_RA/rt:fill/g:ce/el:0/aHR0cHM6Ly9zdG9yYWdlLmdvb2dsZWFwaXMuY29tL2lrb25hLWJ1Y2tldC1wcm9kdWN0aW9uL2ltYWdlcy82MjU2ZGU2ZWNjYzgxZTk2MWU2MzJkZjEvUGV0X1Nwcml0ZS02NjBhZTEyYTgzNjFlMTliYzkzNDMzNjAucG5n.jpg');



--
-- Estructura de tabla para la tabla `repartidor`
--

CREATE TABLE `repartidor` (
  `id_rep` int(11) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `repartidor`
--

INSERT INTO `repartidor` (`id_rep`, `dni`, `nombre`, `apellido`, `provincia`, `telefono`) VALUES
(1, '56789012E', 'Pedro', 'Martínez García', 'Almería', '543210987'),
(2, '67890123F', 'Ana', 'Hernández López', 'Granada', '432109876'),
(3, '78901234G', 'David', 'Gómez Fernández', 'Jaén', '321098765'),
(4, '89012345H', 'Sara', 'Pérez Rodríguez', 'Sevilla', '210987654'),
(5, '90123456I', 'Jorge', 'López Martínez', 'Cádiz', '109876543'),
(6, '01234567J', 'Carmen', 'García Pérez', 'Málaga', '098765432'),
(7, '12345678K', 'Daniel', 'Fernández Rodríguez', 'Almería', '987654321'),
(8, '23456789L', 'Elena', 'Martínez García', 'Málaga', '876543210'),
(9, '34567890M', 'Adrián', 'Hernández López', 'Huelva', '765432109'),
(10, '45678901N', 'Isabel', 'Gómez Fernández', 'Córdoba', '654321098'),
(11, '56789012E', 'Pedro', 'Martínez García', 'Almería', '543210987'),
(12, '67890123F', 'Ana', 'Hernández López', 'Granada', '432109876'),
(13, '78901234G', 'David', 'Gómez Fernández', 'Jaén', '321098765'),
(14, '89012345H', 'Sara', 'Pérez Rodríguez', 'Sevilla', '210987654'),
(15, '90123456I', 'Jorge', 'López Martínez', 'Cádiz', '109876543'),
(16, '01234567J', 'Carmen', 'García Pérez', 'Málaga', '098765432'),
(17, '12345678K', 'Daniel', 'Fernández Rodríguez', 'Almería', '987654321'),
(18, '23456789L', 'Elena', 'Martínez García', 'Málaga', '876543210'),
(19, '34567890M', 'Adrián', 'Hernández López', 'Huelva', '765432109'),
(20, '45678901N', 'Isabel', 'Gómez Fernández', 'Córdoba', '654321098');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `contrasenya` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `provincia` varchar(20) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `fecha_alta` date DEFAULT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `nombre`, `contrasenya`, `email`, `telefono`, `provincia`, `ciudad`, `direccion`, `fecha_alta`, `id_rol`) VALUES
(1, 'Daniel', '$2y$10$RcgTsqGVb.vNjXwSbBkv8uWQBkzsHGd/D85WALjUo3JY0hz4YFI6G', 'daniserrano1392@gmail.com', '123456789', 'Almería', 'Roquetas de Mar', 'Calle Luis Cervantes 19', '2023-08-12', 1),
(2, 'Arturo', '$2y$10$RcgTsqGVb.vNjXwSbBkv8uWQBkzsHGd/D85WALjUo3JY0hz4YFI6G', 'arturosanchez1221@gmail.com', '987654321', 'Almería', 'Vícar', 'Avenida Federico García Lorca 55', '2023-08-16', 1),
(3, 'Jose', '$2y$10$RcgTsqGVb.vNjXwSbBkv8uWQBkzsHGd/D85WALjUo3JY0hz4YFI6G', 'joselopez1227@gmail.com', '543219876', 'Almería', 'Aguadulce', 'Plaza de la Paz 7', '2023-08-15', 1),
(4, 'Sofía', '$2y$10$RcgTsqGVb.vNjXwSbBkv8uWQBkzsHGd/D85WALjUo3JY0hz4YFI6G', 'sofialopez@gmail.com', '901234567', 'Granada', 'Albayzín', 'Calle Granada 25', '2023-09-21', 2),
(5, 'Javier', '$2y$10$RcgTsqGVb.vNjXwSbBkv8uWQBkzsHGd/D85WALjUo3JY0hz4YFI6G', 'javierhernandez@gmail.com', '012345678', 'Huelva', 'Matalascañas', 'Calle Huelva 77', '2023-09-21', 2),
(6, 'Lucía', '$2y$10$RcgTsqGVb.vNjXwSbBkv8uWQBkzsHGd/D85WALjUo3JY0hz4YFI6G', 'luciaperez@gmail.com', '123456789', 'Cádiz', 'Barbate', 'Calle Cadiz 89', '2023-09-21', 2),
(7, 'Manuel', '$2y$10$RcgTsqGVb.vNjXwSbBkv8uWQBkzsHGd/D85WALjUo3JY0hz4YFI6G', 'manuelgomez@gmail.com', '234567890', 'Sevilla', 'Triana', 'Calle Sevilla 30', '2023-09-21', 2),
(8, 'Carmen', '$2y$10$RcgTsqGVb.vNjXwSbBkv8uWQBkzsHGd/D85WALjUo3JY0hz4YFI6G', 'carmenmartinez@gmail.com', '345678901', 'Málaga', 'Torremolinos', 'Avenida Malaga 5', '2023-09-21', 2),
(9, 'Diego', '$2y$10$RcgTsqGVb.vNjXwSbBkv8uWQBkzsHGd/D85WALjUo3JY0hz4YFI6G', 'diegofernandez@gmail.com', '456789012', 'Córdoba', 'Córdoba', 'Plaza del Agua 22', '2023-09-21', 2),
(10, 'María', '$2y$10$RcgTsqGVb.vNjXwSbBkv8uWQBkzsHGd/D85WALjUo3JY0hz4YFI6G', 'mariagarcialopez@gmail.com', '890123456', 'Almería', 'Roquetas de Mar', 'Avenida Almería 10', '2023-09-21', 2),
(11, 'Sofía', '$2y$10$RcgTsqGVb.vNjXwSbBkv8uWQBkzsHGd/D85WALjUo3JY0hz4YFI6G', 'sofialopez@gmail.com', '901234567', 'Granada', 'Albayzín', 'Calle Granada 25', '2023-09-21', 2),
(12, 'Javier', '$2y$10$RcgTsqGVb.vNjXwSbBkv8uWQBkzsHGd/D85WALjUo3JY0hz4YFI6G', 'javierhernandez@gmail.com', '012345678', 'Huelva', 'Matalascañas', 'Calle Huelva 77', '2023-09-21', 2),
(13, 'Lucía', '$2y$10$RcgTsqGVb.vNjXwSbBkv8uWQBkzsHGd/D85WALjUo3JY0hz4YFI6G', 'luciaperez@gmail.com', '123456789', 'Cádiz', 'Barbate', 'Calle Cadiz 89', '2023-09-21', 2),
(14, 'Manuel', '$2y$10$RcgTsqGVb.vNjXwSbBkv8uWQBkzsHGd/D85WALjUo3JY0hz4YFI6G', 'manuelgomez@gmail.com', '234567890', 'Sevilla', 'Triana', 'Calle Sevilla 30', '2023-09-21', 2),
(15, 'Carmen', '$2y$10$RcgTsqGVb.vNjXwSbBkv8uWQBkzsHGd/D85WALjUo3JY0hz4YFI6G', 'carmenmartinez@gmail.com', '345678901', 'Málaga', 'Torremolinos', 'Avenida Malaga 5', '2023-09-21', 2),
(16, 'Diego', '$2y$10$RcgTsqGVb.vNjXwSbBkv8uWQBkzsHGd/D85WALjUo3JY0hz4YFI6G', 'diegofernandez@gmail.com', '456789012', 'Córdoba', 'Córdoba', 'Plaza del Agua 22', '2023-09-21', 2),
(22, 'a', '$2y$10$RcgTsqGVb.vNjXwSbBkv8uWQBkzsHGd/D85WALjUo3JY0hz4YFI6G', 'a@gmail.com', '622689322', 'Málaga', 'Torremolinos', 'Calle Juan Perez 19', '2023-12-26', 2),

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detallespedido`
--
ALTER TABLE `detallespedido`
  ADD PRIMARY KEY (`id_ped`,`id_prod`),
  ADD KEY `id_prod` (`id_prod`);

--
-- Indices de la tabla `detallesproducto`
--
ALTER TABLE `detallesproducto`
  ADD PRIMARY KEY (`id_ingr`,`id_prod`),
  ADD KEY `id_prod` (`id_prod`);

--
-- Indices de la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`id_ingr`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_ped`),
  ADD KEY `id_rep` (`id_rep`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `repartidor`
--
ALTER TABLE `repartidor`
  ADD PRIMARY KEY (`id_rep`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  MODIFY `id_ingr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_ped` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `repartidor`
--
ALTER TABLE `repartidor`
  MODIFY `id_rep` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallespedido`
--
ALTER TABLE `detallespedido`
  ADD CONSTRAINT `detallespedido_ibfk_1` FOREIGN KEY (`id_ped`) REFERENCES `pedido` (`id_ped`),
  ADD CONSTRAINT `detallespedido_ibfk_2` FOREIGN KEY (`id_prod`) REFERENCES `producto` (`id_prod`);

--
-- Filtros para la tabla `detallesproducto`
--
ALTER TABLE `detallesproducto`
  ADD CONSTRAINT `detallesproducto_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `producto` (`id_prod`),
  ADD CONSTRAINT `detallesproducto_ibfk_2` FOREIGN KEY (`id_ingr`) REFERENCES `ingrediente` (`id_ingr`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_rep`) REFERENCES `repartidor` (`id_rep`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;