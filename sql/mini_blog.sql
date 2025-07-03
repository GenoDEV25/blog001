-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2025 a las 09:27:13
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mini_blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `cat_clave` int(11) NOT NULL,
  `cat_nombre` varchar(100) NOT NULL,
  `cat_fecha_creacion` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`cat_clave`, `cat_nombre`, `cat_fecha_creacion`) VALUES
(1, 'Cine', '2025-07-01'),
(2, 'Música', '2025-07-01'),
(3, 'Viajes', '2025-07-01'),
(4, 'Comida', '2025-07-01'),
(5, 'Espacio', '2025-07-01'),
(6, 'Educación', '2025-07-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `pos_clave` int(11) NOT NULL,
  `pos_titulo` varchar(255) NOT NULL,
  `pos_contenido` text DEFAULT NULL,
  `pos_imagen` varchar(255) DEFAULT NULL,
  `pos_categoria_id` int(11) DEFAULT NULL,
  `pos_fecha_creacion` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`pos_clave`, `pos_titulo`, `pos_contenido`, `pos_imagen`, `pos_categoria_id`, `pos_fecha_creacion`) VALUES
(5, 'Festival City', 'El Festival City será un evento que, en un solo día, reunirá a grandes artistas reconocidos de talla nacional e internacional. El evento se llevará a cabo el próximo 12 de abril de 2025, a partir de las 12:00 p.m., en el Lienzo Charro Hermanos Ramírez en El Pueblito, Querétaro.', '1751515272_513fb45544d2466b5ac8.jpg', 2, '2025-07-03'),
(6, 'Hot Cakes', 'Ingredientes Hot Cakes:\r\n- 1 1/2 tazas de harina de trigo\r\n- 3 1/2 cucharaditas de polvo para hornear\r\n- 1 cucharadita de sal\r\n- 1 cucharada de azúcar\r\n- 1 1/4 tazas de leche\r\n- 1 huevo grande\r\n- 3 cucharadas de mantequilla derretida', '1751515628_0b89a44e79c5205e5ca2.jpeg', 4, '2025-07-03'),
(7, 'Flow', 'La película Flow se desarrolla en un mundo que está por llegar a su final y sigue los pasos de un gato negro que luego de sobrevivir a una inundación con un golden retriever y habitar en una casa abandonada que también queda afectada, emprenden un viaje en velero al que se une un capibara.', '1751515676_a4e206c5096b9ce6cd62.jpg', 1, '2025-07-03'),
(8, 'Plutón', 'En la mitología griega, el dios del inframundo se llamaba Hades. Es decir, Hades era el rey que extendía su poder entre los muertos. Pero este dios tenía varios apodos. Y de uno de ellos se deriva, ya en la cultura romana, el nombre de Plutón.\r\n\r\nCada 18 de febrero, coincidiendo con la fecha en que fue descubierto hace ahora 92 años (1930) se celebra el día de Plutón. Seguro que sabes que existe una controversia, aún no resuelta, sobre si Plutón es o no un planeta.', '1751515803_c341b3233eea7d7e9840.jpeg', 5, '2025-07-03'),
(9, 'Andrés Manuel López Obrador', 'Esta mañana el presidente de México, Andrés Manuel López Obrador, acudió a una ceremonia que realizaron 12 comunidades indígenas Mayas de Chiapas para pedir permiso a la tierra por la construcción del Tren Maya.\r\n\r\nDe acuerdo a las comunidades se ofreció aguardiente, posol, hojas de plátano, un pollo entero, y tortillas a la madre tierra para tener su aprobación en la construcción del Tren Maya, el cual cruzará por cinco estados del país. El secretario para el desarrollo sustentable de los pueblos indígenas, Emilio Ramón Ramírez Gutiérrez dijo: \"Tenemos que pedir permiso a la tierra porque de ella comemos y en ella caminamos\".', '1751515948_4df62c336acdb8e530dc.jpeg', 6, '2025-07-03'),
(10, 'IA', 'ChatGPT es un modelo de inteligencia artificial desarrollado por OpenAI que utiliza procesamiento de lenguaje natural para interactuar con los usuarios de manera conversacional. Se basa en la tecnología GPT (Generative Pre-trained Transformer) y fue entrenado con más de 40 GB de texto extraído de internet, lo que le permite aprender patrones y estructuras lingüísticas. ChatGPT puede responder preguntas, redactar textos y ayudar en tareas creativas, convirtiéndose en una herramienta versátil para diversas aplicaciones.', '1751516157_022354562d2ae83a92b6.jpg', 6, '2025-07-03'),
(11, 'Auroras Boreales', 'Las auroras boreales son fenómenos naturales que ocurren en las regiones polares del planeta, visibles principalmente en el Ártico. Se producen cuando partículas cargadas del sol chocan con los gases en la atmósfera terrestre, generando emisiones de luz que forman láminas iridiscentes de colores, principalmente verdes y rojos, aunque también pueden ser azules y púrpuras. Este espectáculo etéreo es conocido como \"luces del norte\" y su equivalente en el hemisferio sur se llama aurora austral. Las auroras son más visibles en latitudes altas y son un fenómeno astronómico impresionante que atrae a muchos observadores y turistas.', '1751516217_dd1d2a35ee25fba72e69.jpg', 3, '2025-07-03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cat_clave`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`pos_clave`),
  ADD KEY `pos_categoria_id` (`pos_categoria_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cat_clave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `pos_clave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`pos_categoria_id`) REFERENCES `categorias` (`cat_clave`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
