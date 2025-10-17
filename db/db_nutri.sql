-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2025 a las 02:51:19
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
-- Base de datos: `db_nutri`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimentos`
--

CREATE TABLE `alimentos` (
  `id_alimento` int(11) NOT NULL,
  `nombre_alimento` varchar(100) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `descripcion_alimento` varchar(255) NOT NULL,
  `calorias` decimal(6,2) NOT NULL,
  `proteinas` decimal(6,2) NOT NULL,
  `carbohidratos` decimal(6,2) NOT NULL,
  `fibras` decimal(6,2) NOT NULL,
  `grasas` decimal(6,2) NOT NULL,
  `imagen_alimento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alimentos`
--

INSERT INTO `alimentos` (`id_alimento`, `nombre_alimento`, `id_grupo`, `descripcion_alimento`, `calorias`, `proteinas`, `carbohidratos`, `fibras`, `grasas`, `imagen_alimento`) VALUES
(1, 'Yogurt Griego Natural', 4, 'Producto lácteo espeso y cremoso que se obtiene al filtrar el yogur para quitar el suero. Es más cremoso y menos dulce que el yogur común.', 82.40, 6.64, 5.92, 0.10, 3.60, 'https://imag.bonviveur.com/yogur-griego.webp'),
(2, 'Carne de res', 5, 'La carne de res procede de un animal no menor a tres años de edad, su peso debe rondar los 500 kg; esta carne es de color rojo en diferentes tonalidades, su contenido graso medio o alto varía según la raza y alimentación de la res.\r\n\r\n', 250.00, 26.00, 0.00, 0.00, 15.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSh0T-SQ2b-2BMI5aTKpRy91G3_XEkHyliklw&s'),
(12, 'Queso Parmesano', 4, 'Queso duro y curado de origen italiano, elaborado a base de leche de vaca. Se caracteriza por su sabor fuerte, salado y ligeramente afrutado, y su textura granulada.', 431.00, 38.00, 4.10, 0.00, 29.00, 'https://www.lacasadelqueso.com.ar/wp-content/uploads/2017/08/parmigiano-reggiano.jpg'),
(13, 'Huevo', 5, 'Alimento de origen animal que proviene de las aves, principalmente de las gallinas. Es una excelente fuente de proteínas de alta calidad, vitaminas (como B12, D y riboflavina), minerales (como el hierro y el selenio) y ácidos grasos esenciales.', 155.00, 13.00, 1.10, 0.00, 11.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlZuyb3QckKU6qNwQywlCb5Dot2Om5C7yDZw&s'),
(14, 'Salmón', 5, 'Pescado graso rico en ácidos omega-3, proteínas y vitaminas como la D y B12. Es beneficioso para la salud cardiovascular y se consume de diversas formas, como ahumado, a la parrilla o en sushi.', 208.00, 20.00, 0.00, 0.00, 13.00, 'https://hips.hearstapps.com/hmg-prod/images/salmon-elle-gourmet-2-64c38d1d435c7.jpg?crop=0.668xw:1.00xh;0.240xw,0&resize=1120:*'),
(15, 'Papa', 14, 'Tubérculo rico en carbohidratos, principalmente almidón. Es una buena fuente de vitamina C, potasio y fibra, además de ser baja en calorías y no contener grasas.', 65.00, 2.90, 13.00, 4.40, 0.20, 'https://cdn.eldestapeweb.com/eldestape/092023/1694114506190.webp?cw=1200&ch=675'),
(16, 'Almendras', 14, 'Fruto seco ricos en grasas saludables, especialmente monoinsaturadas, proteínas, fibra, vitaminas (como la E) y minerales (como magnesio y calcio). Se consumen crudas, tostadas o como parte de productos como mantecas y leches vegetales.', 576.00, 21.00, 22.00, 12.00, 49.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqo8-Lna29fTn6agoZbffCJgzrc5oSt0BEpQ&s'),
(17, 'Garbanzos', 14, 'Legumbre rica en proteínas, fibra, vitaminas (como B6) y minerales (como hierro y magnesio). Son excelentes para la salud digestiva y cardiovascular, y se utilizan en una variedad de platos como sopas, ensaladas y hummus.', 364.00, 19.00, 61.00, 17.00, 6.00, 'https://mejorconsalud.as.com/wp-content/uploads/2016/11/beneficios-garbanzos-salud.jpg'),
(18, 'Espinaca', 15, 'Planta de hojas verdes, comestible y rica en nutrientes. Se consume tanto cruda como cocida y es conocida por su alto contenido de vitaminas A, C, K, ácido fólico, hierro y fibra.', 23.00, 2.90, 3.60, 2.20, 0.40, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoVpyEvllMB2Wrj4Yeuu1FBdruHNBndnH8Vw&s'),
(19, 'Remolacha', 15, 'Hortaliza de raíz comestible, carnosa y de color rojo intenso, aunque también puede ser blanca o dorada.  Es rica en nutrientes como fibra, vitaminas (B y C), minerales (potasio, manganeso) y antioxidantes como las betalaínas.', 44.00, 1.70, 9.60, 2.00, 0.20, 'https://i.blogs.es/08042d/remolachas/840_560.jpg'),
(20, 'Frutilla', 16, 'Frutas pequeñas, rojas y jugosas, con un sabor dulce y ligeramente ácido. Son ricas en vitamina C, antioxidantes y fibra, lo que las hace beneficiosas para la salud del sistema inmunológico y la piel.', 32.00, 0.67, 7.68, 2.00, 0.30, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQKtf2xlOcPKQJqOktpC3M6Rn6HGqmfA9e2lA&s'),
(21, 'Bananas', 16, 'Fruta tropical rica en carbohidratos, especialmente azúcares naturales y fibra. Es una excelente fuente de potasio, vitamina C y vitamina B6. Además de ser energética, la banana es buena para la salud del corazón y la función muscular.', 89.00, 1.10, 23.00, 2.60, 0.30, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRodu6JhFb79BdYpepbLDSgqSBgV9C-bdIgEw&s'),
(22, 'Arándanos', 16, 'Frutos de color azul intenso, de sabor dulce y ligeramente ácido. Son ricos en vitaminas, minerales y antioxidantes.', 33.00, 0.63, 6.05, 4.90, 0.60, 'https://cloudfront-us-east-1.images.arcpublishing.com/infobae/LSIIK3VKRVFWRF5JUQG4VYAEBU.jpg'),
(23, 'Arroz blanco', 17, 'Grano refinado sin cáscara, salvado y germen, lo que le da su color blanco. Es una fuente de carbohidratos de rápida digestión, pero tiene menos nutrientes que el arroz integral, ya que se pierden vitaminas.', 130.00, 2.70, 28.00, 0.40, 0.30, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWpD3ienH8L4y5d9MmhSOYvphCpNDbV7oBTA&s'),
(24, 'Chocolates', 17, 'Alimento elaborado a partir de cacao, azúcar y, en ocasiones, leche. Dependiendo de su contenido de cacao, puede ser oscuro, con leche o blanco. Es rico en antioxidantes y proporciona energía rápida debido a su contenido de azúcares y grasas.', 546.00, 4.90, 61.00, 7.00, 31.00, 'https://www.lacocinasana.com/static/28c3b6f8448498c026e2ff162890948e/64f6c/chocolate_492332134_bfbb78b0_58fb9a5e7b.jpg'),
(25, 'Avena', 17, 'Cereal integral rico en fibra, proteínas, vitaminas (como la B1) y minerales (como hierro y magnesio). Es conocida por sus beneficios para la digestión y la salud cardiovascular. Se consume comúnmente en forma de copos o harina.', 68.00, 2.40, 12.00, 1.70, 1.40, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcvskXeqXp3XPlByp-ZdcVhQNgPa5E_LZPMw&s'),
(26, 'Aceite de Oliva', 18, 'Aceite vegetal extraído de las aceitunas. Es rico en grasas monoinsaturadas, especialmente ácido oleico, y tiene propiedades antioxidantes.', 884.00, 0.00, 0.00, 0.00, 100.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRkloPzcmi888cCAIhTtcA5MVTaM1OpvHbNRw&s'),
(27, 'Aceite de Coco', 18, 'Aceite vegetal extraído de la pulpa del coco. Es rico en grasas saturadas, especialmente ácido láurico, y se usa tanto en la cocina como en productos cosméticos. Tiene propiedades antimicrobianas.', 862.00, 0.00, 0.00, 0.00, 100.00, 'https://ecotiendanatural.cl/cdn/shop/articles/14-CONOCE_EL_ACEITE_DE_COCO_NATURAL_UN_AMIGO_PERFECTO_Y_VERSATIL_600x600_crop_center.png?v=1646228925');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos_alimentos`
--

CREATE TABLE `grupos_alimentos` (
  `id_grupo` int(11) NOT NULL,
  `nombre_grupo` varchar(50) NOT NULL,
  `descripcion_grupo` text NOT NULL,
  `imagen_grupo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grupos_alimentos`
--

INSERT INTO `grupos_alimentos` (`id_grupo`, `nombre_grupo`, `descripcion_grupo`, `imagen_grupo`) VALUES
(4, 'Lácteos', 'El grupo de los lácteos incluye alimentos como la leche (derivados de la leche de mamíferos, como la vaca, la cabra, la oveja o la búfala) y sus derivados procesados. Son productos altamente perecederos que deben mantener rigurosamente la cadena de frío. Ejemplos de lácteos: leche, yogur, queso, manteca, cuajada, dulce de leche, helados, postres, etc.', 'https://www.webconsultas.com/sites/default/files/styles/wc_adaptive_image__medium/public/media/0d/articulos/productos-lacteos.jpg.webp'),
(5, 'Carnes, pescados y huevos', 'Son alimentos que nos aportan proteínas de alta calidad, esenciales para el crecimiento, la reparación de tejidos y el mantenimiento de funciones corporales. Además, estos alimentos aportan vitaminas del grupo B, minerales como hierro, zinc y fósforo, y grasas saludables. La carne puede ser roja o blanca, el pescado es rico en ácidos grasos omega-3, y los huevos son una excelente fuente de proteínas completas.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp1uJDIYd9seuH6WT2rUyMgvs9GE_0h7QkEA&s'),
(14, 'Tubérculos, Legumbres y Frutos Secos', 'Los tubérculos incluyen alimentos como la papa y la batata, ricos en almidón. Las legumbres son semillas como frijoles y lentejas, ricas en proteínas y fibra. Los frutos secos son nueces, almendras y pistachos, ricos en grasas saludables.', 'https://www.lavanguardia.com/files/content_image_mobile_filter/uploads/2018/04/23/5e997d22d1ec4.jpeg'),
(15, 'Hortalizas y Verduras', 'Son plantas cultivadas para ser consumidas crudas o elaboradas. Se caracterizan por contener fibra vegetal y por aportar pocas calorías. Aportan una gran cantidad de minerales y vitaminas. Se han relacionado con este grupo beneficios cardiovasculares y parece que previenen algunos cánceres (mama, tubo digestivo).  ', 'https://media.scoolinary.app/blog/images/2021/02/hortalizas-portada.jpg'),
(16, 'Frutas', 'Las frutas son alimentos naturales provenientes de las plantas, se comen sin preparación, ricos en vitaminas, minerales, fibra y antioxidantes. Son esenciales para una dieta equilibrada y se consumen frescas o en jugos, batidos y postres.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR8y-SMfr7n-4zTKAaWaYJeytNCmdSTwF10OA&s'),
(17, 'Cereales y derivados, azúcares y dulces', 'Los cereales son granos como el trigo, maíz y arroz, que se consumen en su forma integral o procesada. Sus derivados incluyen productos como pan, pasta y galletas. Los azúcares son carbohidratos simples que se encuentran en alimentos como el azúcar de mesa y los edulcorantes. Los dulces son productos procesados con azúcar y grasas, como pasteles, caramelos y chocolates. Todos son fuentes de energía rápida, pero deben consumirse con moderación para mantener una dieta equilibrada.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0QCunQAAtocArsP6GFyCnkKFLPFGMRILOxw&s'),
(18, 'Aceites y Grasas', 'Los aceites y las grasas son lípidos que proporcionan una fuente concentrada de energía. Los aceites, como el de oliva, canola y girasol, son generalmente líquidos a temperatura ambiente y son ricos en ácidos grasos insaturados, que son beneficiosos para la salud cardiovascular. Las grasas saturadas, presentes en alimentos como la mantequilla, la carne grasa y algunos aceites tropicales (como el de coco y palma), deben consumirse con moderación, ya que su exceso puede aumentar el riesgo de enfermedades cardíacas. Las grasas también son esenciales para la absorción de ciertas vitaminas (A, D, E y K).', 'https://imagenes.20minutos.es/files/image_640_auto/uploads/imagenes/2024/04/03/el-sencillo-truco-para-identificar-un-aceite-de-oliva-virgen-extra-es-bueno-o-de-calidad.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `contraseña`) VALUES
(2, 'webadmin', '$2y$10$JfbZMkSDhgl9G7ZHOkFt5Ov6PEYcWue8qTeElZUbVvPBYQwYXQDvq');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`id_alimento`),
  ADD KEY `ID_grupo` (`id_grupo`);

--
-- Indices de la tabla `grupos_alimentos`
--
ALTER TABLE `grupos_alimentos`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `id_alimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `grupos_alimentos`
--
ALTER TABLE `grupos_alimentos`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alimentos`
--
ALTER TABLE `alimentos`
  ADD CONSTRAINT `alimentos_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupos_alimentos` (`id_grupo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
