-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2025 a las 03:28:26
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_semillero_sinergy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `codigo_ciu` int(11) NOT NULL,
  `nombre_ciu` varchar(70) DEFAULT NULL,
  `codigo_dep` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`codigo_ciu`, `nombre_ciu`, `codigo_dep`) VALUES
(5001, 'MEDELLÍN', 5),
(5002, 'ABEJORRAL', 5),
(5004, 'ABRIAQUÍ', 5),
(5021, 'ALEJANDRÍA', 5),
(5030, 'AMAGÁ', 5),
(5031, 'AMALFI', 5),
(5034, 'ANDES', 5),
(5036, 'ANGELÓPOLIS', 5),
(5038, 'ANGOSTURA', 5),
(5040, 'ANORÍ', 5),
(5042, 'SANTAFÉ DE ANTIOQUIA', 5),
(5044, 'ANZA', 5),
(5045, 'APARTADÓ', 5),
(5051, 'ARBOLETES', 5),
(5055, 'ARGELIA', 5),
(5059, 'ARMENIA', 5),
(5079, 'BARBOSA', 5),
(5086, 'BELMIRA', 5),
(5088, 'BELLO', 5),
(5091, 'BETANIA', 5),
(5093, 'BETULIA', 5),
(5101, 'CIUDAD BOLÍVAR', 5),
(5107, 'BRICEÑO', 5),
(5113, 'BURITICÁ', 5),
(5120, 'CÁCERES', 5),
(5125, 'CAICEDO', 5),
(5129, 'CALDAS', 5),
(5134, 'CAMPAMENTO', 5),
(5138, 'CAÑASGORDAS', 5),
(5142, 'CARACOLÍ', 5),
(5145, 'CARAMANTA', 5),
(5147, 'CAREPA', 5),
(5148, 'EL CARMEN DE VIBORAL', 5),
(5150, 'CAROLINA', 5),
(5154, 'CAUCASIA', 5),
(5172, 'CHIGORODÓ', 5),
(5190, 'CISNEROS', 5),
(5197, 'COCORNÁ', 5),
(5206, 'CONCEPCIÓN', 5),
(5209, 'CONCORDIA', 5),
(5212, 'COPACABANA', 5),
(5234, 'DABEIBA', 5),
(5237, 'DON MATÍAS', 5),
(5240, 'EBÉJICO', 5),
(5250, 'EL BAGRE', 5),
(5264, 'ENTRERRIOS', 5),
(5266, 'ENVIGADO', 5),
(5282, 'FREDONIA', 5),
(5284, 'FRONTINO', 5),
(5306, 'GIRALDO', 5),
(5308, 'GIRARDOTA', 5),
(5310, 'GÓMEZ PLATA', 5),
(5313, 'GRANADA', 5),
(5315, 'GUADALUPE', 5),
(5318, 'GUARNE', 5),
(5321, 'GUATAPE', 5),
(5347, 'HELICONIA', 5),
(5353, 'HISPANIA', 5),
(5360, 'ITAGUI', 5),
(5361, 'ITUANGO', 5),
(5364, 'JARDÍN', 5),
(5368, 'JERICÓ', 5),
(5376, 'LA CEJA', 5),
(5380, 'LA ESTRELLA', 5),
(5390, 'LA PINTADA', 5),
(5400, 'LA UNIÓN', 5),
(5411, 'LIBORINA', 5),
(5425, 'MACEO', 5),
(5440, 'MARINILLA', 5),
(5467, 'MONTEBELLO', 5),
(5475, 'MURINDÓ', 5),
(5480, 'MUTATÁ', 5),
(5483, 'NARIÑO', 5),
(5490, 'NECOCLÍ', 5),
(5495, 'NECHÍ', 5),
(5501, 'OLAYA', 5),
(5541, 'PEÑOL', 5),
(5543, 'PEQUE', 5),
(5576, 'PUEBLORRICO', 5),
(5579, 'PUERTO BERRÍO', 5),
(5585, 'PUERTO NARE', 5),
(5591, 'PUERTO TRIUNFO', 5),
(5604, 'REMEDIOS', 5),
(5607, 'RETIRO', 5),
(5615, 'RIONEGRO', 5),
(5628, 'SABANALARGA', 5),
(5631, 'SABANETA', 5),
(5642, 'SALGAR', 5),
(5647, 'SAN ANDRÉS DE CUERQUÍA', 5),
(5649, 'SAN CARLOS', 5),
(5652, 'SAN FRANCISCO', 5),
(5656, 'SAN JERÓNIMO', 5),
(5658, 'SAN JOSÉ DE LA MONTAÑA', 5),
(5659, 'SAN JUAN DE URABÁ', 5),
(5660, 'SAN LUIS', 5),
(5664, 'SAN PEDRO', 5),
(5665, 'SAN PEDRO DE URABA', 5),
(5667, 'SAN RAFAEL', 5),
(5670, 'SAN ROQUE', 5),
(5674, 'SAN VICENTE', 5),
(5679, 'SANTA BÁRBARA', 5),
(5686, 'SANTA ROSA DE OSOS', 5),
(5690, 'SANTO DOMINGO', 5),
(5697, 'EL SANTUARIO', 5),
(5736, 'SEGOVIA', 5),
(5756, 'SONSON', 5),
(5761, 'SOPETRÁN', 5),
(5789, 'TÁMESIS', 5),
(5790, 'TARAZÁ', 5),
(5792, 'TARSO', 5),
(5809, 'TITIRIBÍ', 5),
(5819, 'TOLEDO', 5),
(5837, 'TURBO', 5),
(5842, 'URAMITA', 5),
(5847, 'URRAO', 5),
(5854, 'VALDIVIA', 5),
(5856, 'VALPARAÍSO', 5),
(5858, 'VEGACHÍ', 5),
(5861, 'VENECIA', 5),
(5873, 'VIGÍA DEL FUERTE', 5),
(5885, 'YALÍ', 5),
(5887, 'YARUMAL', 5),
(5890, 'YOLOMBÓ', 5),
(5893, 'YONDÓ', 5),
(5895, 'ZARAGOZA', 5),
(8001, 'BARRANQUILLA', 8),
(8078, 'BARANOA', 8),
(8137, 'CAMPO DE LA CRUZ', 8),
(8141, 'CANDELARIA', 8),
(8296, 'GALAPA', 8),
(8372, 'JUAN DE ACOSTA', 8),
(8421, 'LURUACO', 8),
(8433, 'MALAMBO', 8),
(8436, 'MANATÍ', 8),
(8520, 'PALMAR DE VARELA', 8),
(8549, 'PIOJÓ', 8),
(8558, 'POLONUEVO', 8),
(8560, 'PONEDERA', 8),
(8573, 'PUERTO COLOMBIA', 8),
(8606, 'REPELÓN', 8),
(8634, 'SABANAGRANDE', 8),
(8638, 'SABANALARGA', 8),
(8675, 'SANTA LUCÍA', 8),
(8685, 'SANTO TOMÁS', 8),
(8758, 'SOLEDAD', 8),
(8770, 'SUAN', 8),
(8832, 'TUBARÁ', 8),
(8849, 'USIACURÍ', 8),
(11001, 'BOGOTÁ, D.C.', 11),
(13001, 'CARTAGENA', 13),
(13006, 'ACHÍ', 13),
(13030, 'ALTOS DEL ROSARIO', 13),
(13042, 'ARENAL', 13),
(13052, 'ARJONA', 13),
(13062, 'ARROYOHONDO', 13),
(13074, 'BARRANCO DE LOBA', 13),
(13140, 'CALAMAR', 13),
(13160, 'CANTAGALLO', 13),
(13188, 'CICUCO', 13),
(13212, 'CÓRDOBA', 13),
(13222, 'CLEMENCIA', 13),
(13244, 'EL CARMEN DE BOLÍVAR', 13),
(13248, 'EL GUAMO', 13),
(13268, 'EL PEÑÓN', 13),
(13300, 'HATILLO DE LOBA', 13),
(13430, 'MAGANGUÉ', 13),
(13433, 'MAHATES', 13),
(13440, 'MARGARITA', 13),
(13442, 'MARÍA LA BAJA', 13),
(13458, 'MONTECRISTO', 13),
(13468, 'MOMPÓS', 13),
(13473, 'MORALES', 13),
(13549, 'PINILLOS', 13),
(13580, 'REGIDOR', 13),
(13600, 'RÍO VIEJO', 13),
(13620, 'SAN CRISTÓBAL', 13),
(13647, 'SAN ESTANISLAO', 13),
(13650, 'SAN FERNANDO', 13),
(13654, 'SAN JACINTO', 13),
(13655, 'SAN JACINTO DEL CAUCA', 13),
(13657, 'SAN JUAN NEPOMUCENO', 13),
(13667, 'SAN MARTÍN DE LOBA', 13),
(13670, 'SAN PABLO', 13),
(13673, 'SANTA CATALINA', 13),
(13683, 'SANTA ROSA', 13),
(13688, 'SANTA ROSA DEL SUR', 13),
(13744, 'SIMITÍ', 13),
(13760, 'SOPLAVIENTO', 13),
(13780, 'TALAIGUA NUEVO', 13),
(13810, 'TIQUISIO', 13),
(13836, 'TURBACO', 13),
(13838, 'TURBANÁ', 13),
(13873, 'VILLANUEVA', 13),
(13894, 'ZAMBRANO', 13),
(15001, 'TUNJA', 15),
(15022, 'ALMEIDA', 15),
(15047, 'AQUITANIA', 15),
(15051, 'ARCABUCO', 15),
(15087, 'BELÉN', 15),
(15090, 'BERBEO', 15),
(15092, 'BETÉITIVA', 15),
(15097, 'BOAVITA', 15),
(15104, 'BOYACÁ', 15),
(15106, 'BRICEÑO', 15),
(15109, 'BUENAVISTA', 15),
(15114, 'BUSBANZÁ', 15),
(15131, 'CALDAS', 15),
(15135, 'CAMPOHERMOSO', 15),
(15162, 'CERINZA', 15),
(15172, 'CHINAVITA', 15),
(15176, 'CHIQUINQUIRÁ', 15),
(15180, 'CHISCAS', 15),
(15183, 'CHITA', 15),
(15185, 'CHITARAQUE', 15),
(15187, 'CHIVATÁ', 15),
(15189, 'CIÉNEGA', 15),
(15204, 'CÓMBITA', 15),
(15212, 'COPER', 15),
(15215, 'CORRALES', 15),
(15218, 'COVARACHÍA', 15),
(15223, 'CUBARÁ', 15),
(15224, 'CUCAITA', 15),
(15226, 'CUÍTIVA', 15),
(15232, 'CHÍQUIZA', 15),
(15236, 'CHIVOR', 15),
(15238, 'DUITAMA', 15),
(15244, 'EL COCUY', 15),
(15248, 'EL6aSPINO', 15),
(15272, 'FIRAVITOBA', 15),
(15276, 'FLORESTA', 15),
(15293, 'GACHANTIVÁ', 15),
(15296, 'GAMEZA', 15),
(15299, 'GARAGOA', 15),
(15317, 'GUACAMAYAS', 15),
(15322, 'Guateque', 15),
(15325, 'GUAYATÁ', 15),
(15332, 'GÜICÁN', 15),
(15362, 'IZA', 15),
(15367, 'JENESANO', 15),
(15368, 'JERICÓ', 15),
(15377, 'LABRANZAGRANDE', 15),
(15380, 'LA CAPILLA', 15),
(15401, 'LA VICTORIA', 15),
(15403, 'LA UVITA', 15),
(15407, 'VILLA DE LEYVA', 15),
(15425, 'MACANAL', 15),
(15442, 'MARIPÍ', 15),
(15455, 'MIRAFLORES', 15),
(15464, 'MONGUA', 15),
(15466, 'MONGUÍ', 15),
(15469, 'MONIQUIRÁ', 15),
(15476, 'MOTAVITA', 15),
(15480, 'MUZO', 15),
(15491, 'NOBSA', 15),
(15494, 'NUEVO COLÓN', 15),
(15500, 'OICATÁ', 15),
(15507, 'OTANCHE', 15),
(15511, 'PACHAVITA', 15),
(15514, 'PÁEZ', 15),
(15516, 'PAIPA', 15),
(15518, 'PAJARITO', 15),
(15522, 'PANQUEBA', 15),
(15531, 'PAUNA', 15),
(15533, 'PAYA', 15),
(15537, 'PAZ DE RÍO', 15),
(15542, 'PESCA', 15),
(15550, 'PISBA', 15),
(15572, 'PUERTO BOYACÁ', 15),
(15580, 'QUÍPAMA', 15),
(15599, 'RAMIRIQUÍ', 15),
(15600, 'RÁQUIRA', 15),
(15621, 'RONDÓN', 15),
(15632, 'SABOYÁ', 15),
(15638, 'SÁCHICA', 15),
(15646, 'SAMACÁ', 15),
(15660, 'SAN EDUARDO', 15),
(15664, 'SAN JOSÉ DE PARE', 15),
(15667, 'SAN LUIS DE GACENO', 15),
(15673, 'SAN MATEO', 15),
(15676, 'SAN MIGUEL DE SEMA', 15),
(15681, 'SAN PABLO DE BORBUR', 15),
(15686, 'SANTANA', 15),
(15690, 'SANTA MARÍA', 15),
(15693, 'SANTA ROSA DE VITERBO', 15),
(15696, 'SANTA SOFÍA', 15),
(15720, 'SATIVANORTE', 15),
(15723, 'SATIVASUR', 15),
(15740, 'SIACHOQUE', 15),
(15753, 'SOATÁ', 15),
(15755, 'SOCOTÁ', 15),
(15757, 'SOCHA', 15),
(15759, 'SOGAMOSO', 15),
(15761, 'SOMONDOCO', 15),
(15762, 'SORA', 15),
(15763, 'SOTAQUIRÁ', 15),
(15764, 'SORACÁ', 15),
(15774, 'SUSACÓN', 15),
(15776, 'SUTAMARCHÁN', 15),
(15778, 'SUTATENZA', 15),
(15790, 'TASCO', 15),
(15798, 'TENZA', 15),
(15804, 'TIBANÁ', 15),
(15806, 'TIBASOSA', 15),
(15808, 'TINJACÁ', 15),
(15810, 'TIPACOQUE', 15),
(15814, 'TOCA', 15),
(15816, 'TOGÜÍ', 15),
(15820, 'TÓPAGA', 15),
(15822, 'TOTA', 15),
(15832, 'TUNUNGUÁ', 15),
(15835, 'TURMEQUÉ', 15),
(15837, 'TUTA', 15),
(15839, 'TUTAZÁ', 15),
(15842, 'UMBITA', 15),
(15861, 'VENTAQUEMADA', 15),
(15879, 'VIRACACHÁ', 15),
(15897, 'ZETAQUIRA', 15),
(17001, 'MANIZALES', 17),
(17013, 'AGUADAS', 17),
(17042, 'ANSERMA', 17),
(17050, 'ARANZAZU', 17),
(17088, 'BELALCÁZAR', 17),
(17174, 'CHINCHINÁ', 17),
(17272, 'FILADELFIA', 17),
(17380, 'LA DORADA', 17),
(17388, 'LA MERCED', 17),
(17433, 'MANZANARES', 17),
(17442, 'MARMATO', 17),
(17444, 'MARQUETALIA', 17),
(17446, 'MARULANDA', 17),
(17486, 'NEIRA', 17),
(17495, 'NORCASIA', 17),
(17513, 'PÁCORA', 17),
(17524, 'PALESTINA', 17),
(17541, 'PENSILVANIA', 17),
(17614, 'RIOSUCIO', 17),
(17616, 'RISARALDA', 17),
(17653, 'SALAMINA', 17),
(17662, 'SAMANÁ', 17),
(17665, 'SAN JOSÉ', 17),
(17777, 'SUPÍA', 17),
(17867, 'VICTORIA', 17),
(17873, 'VILLAMARÍA', 17),
(17877, 'VITERBO', 17),
(18001, 'FLORENCIA', 18),
(18029, 'ALBANIA', 18),
(18094, 'BELÉN DE LOS ANDAQUIES', 18),
(18150, 'CARTAGENA DEL CHAIRÁ', 18),
(18205, 'CURILLO', 18),
(18247, 'EL DONCELLO', 18),
(18256, 'EL PAUJIL', 18),
(18410, 'LA MONTAÑITA', 18),
(18460, 'MILÁN', 18),
(18479, 'MORELIA', 18),
(18592, 'PUERTO RICO', 18),
(18610, 'SAN JOSÉ DEL FRAGUA', 18),
(18753, 'SAN VICENTE DEL CAGUÁN', 18),
(18756, 'SOLANO', 18),
(18785, 'SOLITA', 18),
(18860, 'VALPARAÍSO', 18),
(19001, 'POPAYÁN', 19),
(19022, 'ALMAGUER', 19),
(19050, 'ARGELIA', 19),
(19075, 'BALBOA', 19),
(19100, 'BOLÍVAR', 19),
(19110, 'BUENOS AIRES', 19),
(19130, 'CAJIBÍO', 19),
(19137, 'CALDONO', 19),
(19142, 'CALOTO', 19),
(19212, 'CORINTO', 19),
(19256, 'EL TAMBO', 19),
(19290, 'FLORENCIA', 19),
(19300, 'GUACHENÉ', 19),
(19318, 'GUAPI', 19),
(19355, 'INZÁ', 19),
(19364, 'JAMBALÓ', 19),
(19392, 'LA SIERRA', 19),
(19397, 'LA VEGA', 19),
(19418, 'LÓPEZ', 19),
(19450, 'MERCADERES', 19),
(19455, 'MIRANDA', 19),
(41551, 'PITALITO', 41),
(41615, 'RIVERA', 41),
(41660, 'SALADOBLANCO', 41),
(41668, 'SAN AGUSTÍN', 41),
(41676, 'SANTA MARÍA', 41),
(41770, 'SUAZA', 41),
(41791, 'TARQUI', 41),
(41797, 'TESALIA', 41),
(41799, 'TELLO', 41),
(41801, 'TERUEL', 41),
(41807, 'TIMANÁ', 41),
(41872, 'VILLAVIEJA', 41),
(41885, 'YAGUARÁ', 41),
(44001, 'RIOHACHA', 44),
(44035, 'ALBANIA', 44),
(44078, 'BARRANCAS', 44),
(44090, 'DIBULLA', 44),
(44098, 'DISTRACCIÓN', 44),
(44110, 'EL MOLINO', 44),
(44279, 'FONSECA', 44),
(44378, 'HATONUEVO', 44),
(44420, 'LA JAGUA DEL PILAR', 44),
(44430, 'MAICAO', 44),
(44560, 'MANAURE', 44),
(44650, 'SAN JUAN DEL CESAR', 44),
(44847, 'URIBIA', 44),
(44855, 'URUMITA', 44),
(44874, 'VILLANUEVA', 44),
(47001, 'SANTA MARTA', 47),
(47030, 'ALGARROBO', 47),
(47053, 'ARACATACA', 47),
(47058, 'ARIGUANÍ', 47),
(47161, 'CERRO SAN ANTONIO', 47),
(47170, 'CHIBOLO', 47),
(47189, 'CIÉNAGA', 47),
(47205, 'CONCORDIA', 47),
(47245, 'EL BANCO', 47),
(47258, 'EL PIÑÓN', 47),
(47268, 'EL RETÉN', 47),
(47288, 'FUNDACIÓN', 47),
(47318, 'GUAMAL', 47),
(47460, 'NUEVA GRANADA', 47),
(47541, 'PEDRAZA', 47),
(47545, 'PIJIÑO DEL CARMEN', 47),
(47551, 'PIVIJAY', 47),
(47555, 'PLATO', 47),
(47570, 'PUEBLOVIEJO', 47),
(47605, 'REMOLINO', 47),
(47660, 'SABANAS DE SAN ÁNGEL', 47),
(47675, 'SALAMINA', 47),
(47692, 'SAN SEBASTIÁN DE BUENAVISTA', 47),
(47703, 'SAN ZENÓN', 47),
(47707, 'SANTA ANA', 47),
(47720, 'SANTA BÁRBARA DE PINTO', 47),
(47745, 'SITIONUEVO', 47),
(47798, 'TENERIFE', 47),
(47960, 'ZAPAYÁN', 47),
(47980, 'ZONA BANANERA', 47),
(50001, 'VILLAVICENCIO', 50),
(50006, 'ACACÍAS', 50),
(50110, 'BARRANCA DE UPIA', 50),
(50124, 'CABUYARO', 50),
(50150, 'CASTILLA LA NUEVA', 50),
(50223, 'CUBARRAL', 50),
(50226, 'CUMARAL', 50),
(50245, 'EL CALVARIO', 50),
(50251, 'EL CASTILLO', 50),
(50270, 'EL DORADO', 50),
(50287, 'FUENTE DE ORO', 50),
(50313, 'GRANADA', 50),
(50318, 'GUAMAL', 50),
(50325, 'MAPIRIPÁN', 50),
(50330, 'MESETAS', 50),
(50350, 'LA MACARENA', 50),
(50370, 'URIBE', 50),
(50400, 'LEJANÍAS', 50),
(50450, 'PUERTO CONCORDIA', 50),
(50568, 'PUERTO GAITÁN', 50),
(50573, 'PUERTO LÓPEZ', 50),
(50577, 'PUERTO LLERAS', 50),
(50590, 'PUERTO RICO', 50),
(50606, 'RESTREPO', 50),
(50680, 'SAN CARLOS DE GUAROA', 50),
(50683, 'SAN JUAN DE ARAMA', 50),
(50686, 'SAN JUANITO', 50),
(50689, 'SAN MARTÍN', 50),
(50711, 'VISTAHERMOSA', 50),
(52001, 'PASTO', 52),
(52019, 'ALBÁN', 52),
(52022, 'ALDANA', 52),
(52036, 'ANCUYÁ', 52),
(52051, 'ARBOLEDA', 52),
(52079, 'BARBACOAS', 52),
(52083, 'BELÉN', 52),
(52110, 'BUESACO', 52),
(52203, 'COLÓN', 52),
(52207, 'CONSACÁ', 52),
(52210, 'CONTADERO', 52),
(52215, 'CORDOBA', 52),
(52224, 'CUASPUD', 52),
(52227, 'CUMBAL', 52),
(52233, 'CUMBITARA', 52),
(52240, 'CHACHAGÜÍ', 52),
(52250, 'EL CHARCO', 52),
(52254, 'EL PEÑOL', 52),
(52256, 'EL ROSARIO', 52),
(52258, 'EL TABLÓN', 52),
(52260, 'EL TAMBO', 52),
(52287, 'FUNES', 52),
(52317, 'GUACHUCAL', 52),
(52320, 'GUAITARILLA', 52),
(52323, 'GUALMATÁN', 52),
(52352, 'ILES', 52),
(52354, 'IMUÉS', 52),
(52356, 'IPIALES', 52),
(52378, 'LA CRUZ', 52),
(52381, 'LA FLORIDA', 52),
(52385, 'LA LLANADA', 52),
(52390, 'LA TOLA', 52),
(52399, 'LA UNIÓN', 52),
(52405, 'LEIVA', 52),
(52411, 'LINARES', 52),
(52418, 'LOS ANDES', 52),
(52427, 'MAGÜÍ', 52),
(52435, 'MALLAMA', 52),
(52473, 'MOSQUERA', 52),
(52480, 'NARIÑO', 52),
(52490, 'OLAYA HERRERA', 52),
(52506, 'OSPINA', 52),
(52520, 'FRANCISCO PIZARRO', 52),
(52540, 'POLICARPA', 52),
(52560, 'POTOSÍ', 52),
(52565, 'PROVIDENCIA', 52),
(52573, 'PUERRES', 52),
(52585, 'PUPIALES', 52),
(52612, 'RICAURTE', 52),
(52621, 'ROBERTO PAYÁN', 52),
(52678, 'SAMANIEGO', 52),
(52683, 'SANDONÁ', 52),
(52685, 'SAN BERNARDO', 52),
(52687, 'SAN LORENZO', 52),
(52693, 'SAN PABLO', 52),
(52694, 'SAN PEDRO DE CARTAGO', 52),
(52696, 'SANTA BÁRBARA', 52),
(52699, 'SANTACRUZ', 52),
(52720, 'SAPUYES', 52),
(52786, 'TAMINANGO', 52),
(52788, 'TANGUA', 52),
(52835, 'TUMACO', 52),
(52838, 'TÚQUERRES', 52),
(52885, 'YACUANQUER', 52),
(54001, 'CÚCUTA', 54),
(54003, 'ÁBREGO', 54),
(54051, 'ARBOLEDAS', 54),
(54099, 'BOCHALEMA', 54),
(54109, 'BUCARASICA', 54),
(54125, 'CÁCHIRA', 54),
(54128, 'CÁCOTA', 54),
(54172, 'CHINÁCOTA', 54),
(54174, 'CHITAGÁ', 54),
(54206, 'CONVENCIÓN', 54),
(54223, 'CUCUTILLA', 54),
(54239, 'DURANIA', 54),
(54245, 'EL CARMEN', 54),
(54250, 'EL TARRA', 54),
(54261, 'EL ZULIA', 54),
(54313, 'GRAMALOTE', 54),
(54344, 'HACARÍ', 54),
(54347, 'HERRÁN', 54),
(54377, 'LABATECA', 54),
(54385, 'LA ESPERANZA', 54),
(54398, 'LA PLAYA', 54),
(54405, 'LOS PATIOS', 54),
(54418, 'LOURDES', 54),
(54480, 'MUTISCUA', 54),
(54498, 'OCAÑA', 54),
(54518, 'PAMPLONA', 54),
(54520, 'PAMPLONITA', 54),
(54553, 'PUERTO SANTANDER', 54),
(54599, 'RAGONVALIA', 54),
(54660, 'SALAZAR', 54),
(54670, 'SAN CALIXTO', 54),
(54673, 'SAN CAYETANO', 54),
(54680, 'SANTIAGO', 54),
(54720, 'SARDINATA', 54),
(54743, 'SILOS', 54),
(54800, 'TEORAMA', 54),
(54810, 'TIBÚ', 54),
(54820, 'TOLEDO', 54),
(54871, 'VILLA CARO', 54),
(54874, 'VILLA DEL ROSARIO', 54),
(63001, 'ARMENIA', 63),
(63111, 'BUENAVISTA', 63),
(63130, 'CALARCA', 63),
(63190, 'CIRCASIA', 63),
(63212, 'CÓRDOBA', 63),
(63272, 'FILANDIA', 63),
(63302, 'GÉNOVA', 63),
(63401, 'LA TEBAIDA', 63),
(63470, 'MONTENEGRO', 63),
(63548, 'PIJAO', 63),
(63594, 'QUIMBAYA', 63),
(63690, 'SALENTO', 63),
(66001, 'PEREIRA', 66),
(66045, 'APÍA', 66),
(66075, 'BALBOA', 66),
(66088, 'BELÉN DE UMBRÍA', 66),
(66170, 'DOSQUEBRADAS', 66),
(66318, 'GUÁTICA', 66),
(66383, 'LA CELIA', 66),
(66400, 'LA VIRGINIA', 66),
(66440, 'MARSELLA', 66),
(66456, 'MISTRATÓ', 66),
(66572, 'PUEBLO RICO', 66),
(66594, 'QUINCHÍA', 66),
(66682, 'SANTA ROSA DE CABAL', 66),
(66687, 'SANTUARIO', 66),
(68001, 'BUCARAMANGA', 68),
(68013, 'AGUADA', 68),
(68020, 'ALBANIA', 68),
(68051, 'ARATOCA', 68),
(68077, 'BARBOSA', 68),
(68079, 'BARICHARA', 68),
(68081, 'BARRANCABERMEJA', 68),
(68092, 'BETULIA', 68),
(68101, 'BOLÍVAR', 68),
(68121, 'CABRERA', 68),
(68132, 'CALIFORNIA', 68),
(68147, 'CAPITANEJO', 68),
(68152, 'CARCASÍ', 68),
(68160, 'CEPITÁ', 68),
(68162, 'CERRITO', 68),
(68167, 'CHARALÁ', 68),
(68169, 'CHARTA', 68),
(68176, 'CHIMA', 68),
(68179, 'CHIPATÁ', 68),
(68190, 'CIMITARRA', 68),
(68207, 'CONCEPCIÓN', 68),
(68209, 'CONFINES', 68),
(68211, 'CONTRATACIÓN', 68),
(68217, 'COROMORO', 68),
(68229, 'CURITÍ', 68),
(68235, 'EL CARMEN DE CHUCURÍ', 68),
(68245, 'EL GUACAMAYO', 68),
(68250, 'EL PEÑÓN', 68),
(68255, 'EL PLAYÓN', 68),
(68264, 'ENCINO', 68),
(68266, 'ENCISO', 68),
(68271, 'FLORIÁN', 68),
(68276, 'FLORIDABLANCA', 68),
(68296, 'GALÁN', 68),
(68298, 'GAMBITA', 68),
(68307, 'GIRÓN', 68),
(68318, 'GUACA', 68),
(68320, 'GUADALUPE', 68),
(68322, 'GUAPOTÁ', 68),
(68324, 'GUAVATÁ', 68),
(68327, 'GÜEPSA', 68),
(68344, 'HATO', 68),
(68368, 'JESÚS MARÍA', 68),
(68370, 'JORDÁN', 68),
(68377, 'LA BELLEZA', 68),
(68385, 'LANDÁZURI', 68),
(68397, 'LA PAZ', 68),
(68406, 'LEBRÍJA', 68),
(68418, 'LOS SANTOS', 68),
(68425, 'MACARAVITA', 68),
(68432, 'MÁLAGA', 68),
(68444, 'MATANZA', 68),
(68464, 'MOGOTES', 68),
(68468, 'MOLAGAVITA', 68),
(68498, 'OCAMONTE', 68),
(68500, 'OIBA', 68),
(68502, 'ONZAGA', 68),
(68522, 'PALMAR', 68),
(68524, 'PALMAS DEL SOCORRO', 68),
(68533, 'PÁRAMO', 68),
(68547, 'PIEDECUESTA', 68),
(68549, 'PINCHOTE', 68),
(68572, 'PUENTE NACIONAL', 68),
(68573, 'PUERTO PARRA', 68),
(68575, 'PUERTO WILCHES', 68),
(68615, 'RIONEGRO', 68),
(68655, 'SABANA DE TORRES', 68),
(68669, 'SAN ANDRÉS', 68),
(68673, 'SAN BENITO', 68),
(68679, 'SAN GIL', 68),
(68682, 'SAN JOAQUÍN', 68),
(68684, 'SAN JOSÉ DE MIRANDA', 68),
(68686, 'SAN MIGUEL', 68),
(68689, 'SAN VICENTE DE CHUCURÍ', 68),
(68705, 'SANTA BÁRBARA', 68),
(68720, 'SANTA HELENA DEL OPÓN', 68),
(68745, 'SIMACOTA', 68),
(68755, 'SOCORRO', 68),
(68770, 'SUAITA', 68),
(68773, 'SUCRE', 68),
(68780, 'SURATÁ', 68),
(68820, 'TONA', 68),
(68855, 'VALLE DE SAN JOSÉ', 68),
(68861, 'VÉLEZ', 68),
(68867, 'VETAS', 68),
(68872, 'VILLANUEVA', 68),
(68895, 'ZAPATOCA', 68),
(70001, 'SINCELEJO', 70),
(70110, 'BUENAVISTA', 70),
(70124, 'CAIMITO', 70),
(70204, 'COLOSO', 70),
(70215, 'COROZAL', 70),
(70221, 'COVEÑAS', 70),
(70230, 'CHALÁN', 70),
(70233, 'EL ROBLE', 70),
(70235, 'GALERAS', 70),
(70265, 'GUARANDA', 70),
(70400, 'LA UNIÓN', 70),
(70418, 'LOS PALMITOS', 70),
(70429, 'MAJAGUAL', 70),
(70473, 'MORROA', 70),
(70508, 'OVEJAS', 70),
(70523, 'PALMITO', 70),
(70670, 'SAMPUÉS', 70),
(70678, 'SAN BENITO ABAD', 70),
(70702, 'SAN JUAN DE BETULIA', 70),
(70708, 'SAN MARCOS', 70),
(70713, 'SAN ONOFRE', 70),
(70717, 'SAN PEDRO', 70),
(70742, 'SAN LUIS DE SINCÉ', 70),
(70771, 'SUCRE', 70),
(70820, 'SANTIAGO DE TOLÚ', 70),
(70823, 'TOLÚ VIEJO', 70),
(73001, 'IBAGUÉ', 73),
(73024, 'ALPUJARRA', 73),
(73026, 'ALVARADO', 73),
(73030, 'AMBALEMA', 73),
(73043, 'ANZOÁTEGUI', 73),
(73055, 'ARMERO', 73),
(73067, 'ATACO', 73),
(73124, 'CAJAMARCA', 73),
(73148, 'CARMEN DE APICALÁ', 73),
(73152, 'CASABIANCA', 73),
(73168, 'CHAPARRAL', 73),
(73200, 'COELLO', 73),
(73217, 'COYAIMA', 73),
(73226, 'CUNDAY', 73),
(73236, 'DOLORES', 73),
(73268, 'ESPINAL', 73),
(73270, 'FALAN', 73),
(73275, 'FLANDES', 73),
(73283, 'FRESNO', 73),
(73319, 'GUAMO', 73),
(73347, 'HERVEO', 73),
(73349, 'HONDA', 73),
(73352, 'ICONONZO', 73),
(73408, 'LÉRIDA', 73),
(73411, 'LÍBANO', 73),
(73443, 'MARIQUITA', 73),
(73449, 'MELGAR', 73),
(73461, 'MURILLO', 73),
(73483, 'NATAGAIMA', 73),
(73504, 'ORTEGA', 73),
(73520, 'PALOCABILDO', 73),
(73547, 'PIEDRAS', 73),
(73555, 'PLANADAS', 73),
(73563, 'PRADO', 73),
(73585, 'PURIFICACIÓN', 73),
(73616, 'RIOBLANCO', 73),
(73622, 'RONCESVALLES', 73),
(73624, 'ROVIRA', 73),
(73671, 'SALDAÑA', 73),
(73675, 'SAN ANTONIO', 73),
(73678, 'SAN LUIS', 73),
(73686, 'SANTA ISABEL', 73),
(73770, 'SUÁREZ', 73),
(73854, 'VALLE DE SAN JUAN', 73),
(73861, 'VENADILLO', 73),
(73870, 'VILLAHERMOSA', 73),
(73873, 'VILLARRICA', 73),
(76001, 'CALI', 76),
(76020, 'ALCALÁ', 76),
(76036, 'ANDALUCÍA', 76),
(76041, 'ANSERMANUEVO', 76),
(76054, 'ARGELIA', 76),
(76100, 'BOLÍVAR', 76),
(76109, 'BUENAVENTURA', 76),
(76111, 'GUADALAJARA DE BUGA', 76),
(76113, 'BUGALAGRANDE', 76),
(76122, 'CAICEDONIA', 76),
(76126, 'CALIMA', 76),
(76130, 'CANDELARIA', 76),
(76147, 'CARTAGO', 76),
(76233, 'DAGUA', 76),
(76243, 'EL ÁGUILA', 76),
(76246, 'EL CAIRO', 76),
(76248, 'EL CERRITO', 76),
(76250, 'EL DOVIO', 76),
(76275, 'FLORIDA', 76),
(76306, 'GINEBRA', 76),
(76318, 'GUACARÍ', 76),
(76364, 'JAMUNDÍ', 76),
(76377, 'LA CUMBRE', 76),
(76400, 'LA UNIÓN', 76),
(76403, 'LA VICTORIA', 76),
(76497, 'OBANDO', 76),
(76520, 'PALMIRA', 76),
(76563, 'PRADERA', 76),
(76606, 'RESTREPO', 76),
(76616, 'RIOFRÍO', 76),
(76622, 'ROLDANILLO', 76),
(76670, 'SAN PEDRO', 76),
(76736, 'SEVILLA', 76),
(76823, 'TORO', 76),
(76828, 'TRUJILLO', 76),
(76834, 'TULUÁ', 76),
(76845, 'ULLOA', 76),
(76863, 'VERSALLES', 76),
(76869, 'VIJES', 76),
(76890, 'YOTOCO', 76),
(76892, 'YUMBO', 76),
(76895, 'ZARZAL', 76),
(81001, 'ARAUCA', 81),
(81065, 'ARAUQUITA', 81),
(81220, 'CRAVO NORTE', 81),
(81300, 'FORTUL', 81),
(81591, 'PUERTO RONDÓN', 81),
(81736, 'SARAVENA', 81),
(81794, 'TAME', 81);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `codigo_dep` int(11) NOT NULL,
  `nombre_dep` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`codigo_dep`, `nombre_dep`) VALUES
(5, 'Antioquia'),
(8, 'Atlántico'),
(11, 'Bogotá D.C.'),
(13, 'Bolívar'),
(15, 'Boyacá'),
(17, 'Caldas'),
(18, 'Caquetá'),
(19, 'Cauca'),
(20, 'Cesar'),
(23, 'Córdoba'),
(25, 'Cundinamarca'),
(27, 'Chocó'),
(41, 'Huila'),
(44, 'La Guajira'),
(47, 'Magdalena'),
(50, 'Meta'),
(52, 'Nariño'),
(54, 'Norte de Santander'),
(63, 'Quindío'),
(66, 'Risaralda'),
(68, 'Santander'),
(70, 'Sucre'),
(73, 'Tolima'),
(76, 'Valle del Cauca'),
(81, 'Arauca'),
(85, 'Casanare'),
(86, 'Putumayo'),
(88, 'San Andrés'),
(91, 'Amazonas'),
(94, 'Guainía'),
(95, 'Guaviare'),
(97, 'Vaupés'),
(99, 'Vichada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes_proyectos`
--

CREATE TABLE `estudiantes_proyectos` (
  `ide_est_pro` int(11) NOT NULL,
  `codigo_pro` int(11) DEFAULT NULL,
  `id_per` int(11) NOT NULL,
  `documento_per` varchar(15) DEFAULT NULL,
  `rol_est_pro` int(11) DEFAULT NULL,
  `horassemana` int(11) DEFAULT NULL,
  `semestreacademico` int(11) DEFAULT NULL,
  `promedio` float DEFAULT NULL,
  `mesessemillero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes_proyectos`
--

INSERT INTO `estudiantes_proyectos` (`ide_est_pro`, `codigo_pro`, `id_per`, `documento_per`, `rol_est_pro`, `horassemana`, `semestreacademico`, `promedio`, `mesessemillero`) VALUES
(134680, 18, 15, '91514447', 0, 15, 5, 4.2, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas`
--

CREATE TABLE `lineas` (
  `codigo_lin` int(11) NOT NULL,
  `nombre_lin` varchar(100) DEFAULT NULL,
  `estado_lin` char(10) DEFAULT NULL,
  `codigo_sem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lineas`
--

INSERT INTO `lineas` (`codigo_lin`, `nombre_lin`, `estado_lin`, `codigo_sem`) VALUES
(132006, 'Desarrollo de Software', 'Activo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `codigo_men` int(11) NOT NULL,
  `nombre_men` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `codigo_per` int(11) NOT NULL,
  `codigo_men` int(11) DEFAULT NULL,
  `codigo_tip` int(11) DEFAULT NULL,
  `acceso` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_per` int(11) NOT NULL,
  `documento_per` varchar(15) NOT NULL,
  `nombre_per` varchar(30) DEFAULT NULL,
  `apellidos_per` varchar(30) DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `email_per` varchar(100) DEFAULT NULL,
  `telefono_per` varchar(15) DEFAULT NULL,
  `foto_per` varchar(100) DEFAULT NULL,
  `estado_per` char(10) DEFAULT NULL,
  `password_per` varchar(50) DEFAULT NULL,
  `codigo_tip` int(11) DEFAULT NULL,
  `codigo_sem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_per`, `documento_per`, `nombre_per`, `apellidos_per`, `fechanacimiento`, `email_per`, `telefono_per`, `foto_per`, `estado_per`, `password_per`, `codigo_tip`, `codigo_sem`) VALUES
(9, '1097102912', 'Santiago', 'Barón', '2023-10-04', 'Santiago@gmail.com', '3215486719', './fotos_perfil/Santiago.jpg', 'Inactivo', '543210', 2, 2),
(10, '1097910189', 'Cristian', 'Barón', '2004-05-06', 'Baronrodriguezcristian@gmail.com', '3134534867', './fotos_perfil/Yo.png', 'Activo', '1234', 3, 2),
(11, '123456789', 'Yomira ', 'Jerez', '2003-05-08', 'dy.jerezojeda@unicienciabga.edu.co', '3212590507', './fotos_perfil/Ana.jpeg', 'Activo', 'Y+*-810911', 2, 2),
(15, '91514447', 'Manuel', 'Barón', '2023-10-18', 'mebp32@hotmail.com', '311564892', './fotos_perfil/Manuel.jpg', 'Activo', '810911', 1, 2),
(18, '63327090', 'Amparo ', 'Rueda', '2025-04-11', 'Amparo.rueda@gmail.com', '3178339612', './fotos_perfil/Amparo.jpg', 'Activo', 'Amparo+123', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `codigo_pro` int(11) NOT NULL,
  `nombre_pro` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`codigo_pro`, `nombre_pro`) VALUES
(1, 'Derecho Institucional'),
(2, 'Ingenieria de Sistemas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `codigo_pro` int(11) NOT NULL,
  `tiutlo_pro` varchar(150) DEFAULT NULL,
  `estado_pro` char(10) DEFAULT NULL,
  `anio_pro` int(11) DEFAULT NULL,
  `mes_pro` int(11) DEFAULT NULL,
  `palabras_pro` varchar(150) DEFAULT NULL,
  `codigo_ciu` int(11) DEFAULT NULL,
  `duracion_pro` int(11) DEFAULT NULL,
  `codigo_tip_pro` int(11) DEFAULT NULL,
  `horassemanalider_pro` int(11) DEFAULT NULL,
  `resumen` varchar(700) DEFAULT NULL,
  `planteamientoproblema` varchar(999) DEFAULT NULL,
  `justificacion` varchar(999) DEFAULT NULL,
  `preguntainvestigacion` varchar(200) DEFAULT NULL,
  `marcoteorico` varchar(999) DEFAULT NULL,
  `estadoarte` varchar(999) DEFAULT NULL,
  `objetivogeneral` varchar(200) DEFAULT NULL,
  `objetivosespecificos` varchar(800) DEFAULT NULL,
  `metodologia` varchar(999) DEFAULT NULL,
  `cronograma` varchar(999) DEFAULT NULL,
  `resultadosProductos` varchar(999) DEFAULT NULL,
  `bibliografia` varchar(999) DEFAULT NULL,
  `presupuesto` varchar(999) DEFAULT NULL,
  `gastosprofesores` varchar(999) DEFAULT NULL,
  `gastosequipos` varchar(999) DEFAULT NULL,
  `gastossoftware` varchar(999) DEFAULT NULL,
  `gastosviajes` varchar(999) DEFAULT NULL,
  `gastosplanformacion` varchar(999) DEFAULT NULL,
  `rutaarchivo_pro` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`codigo_pro`, `tiutlo_pro`, `estado_pro`, `anio_pro`, `mes_pro`, `palabras_pro`, `codigo_ciu`, `duracion_pro`, `codigo_tip_pro`, `horassemanalider_pro`, `resumen`, `planteamientoproblema`, `justificacion`, `preguntainvestigacion`, `marcoteorico`, `estadoarte`, `objetivogeneral`, `objetivosespecificos`, `metodologia`, `cronograma`, `resultadosProductos`, `bibliografia`, `presupuesto`, `gastosprofesores`, `gastosequipos`, `gastossoftware`, `gastosviajes`, `gastosplanformacion`, `rutaarchivo_pro`) VALUES
(18, 'Moléculas funcionales y nanotubos funcionalizados', 'activo', 2025, 2, 'Magnetisme nuclear; Magnetismo nuclear; Nuclear magnetism; Compostos de coordinació; Compuestos de coordinación; Coordination compounds; Nanotubs; Nan', 11001, 6, 360, 12, 'En esta tesis doctoral se han llevado a cabo diferentes estudios dentro del ámbito del magnetismo molecular y la funcionalización de nanotubos de carbono de pared sencilla (SWNT). El magnetismo molecular engloba un amplio abanico de sistemas en función de su comportamiento magnético y de la funcionalidad que dicho comportamiento conlleve, lo que será de gran interés desde el punto de vista tecnológico. Entre estos sistemas cabe destacar los imanes unimoleculares (SMM) y los refrigerantes magnéticos moleculares. Por otro lado, los SWNT y su interacción con otras moléculas han atraído la atención de muchos grupos de investigación durante los últimos años debido a su posible aplicación en elect', 'A pesar de los avances en la nanotecnología, aún existen limitaciones significativas en la funcionalización efectiva de nanotubos de carbono con moléculas funcionales específicas, lo cual restringe su aplicabilidad en áreas como la medicina, sensores químicos, electrónica molecular y almacenamiento de energía. La escasa solubilidad de los nanotubos en medios acuosos y orgánicos, la baja selectividad en las interacciones con moléculas blanco y la dificultad para controlar la orientación y densidad de las moléculas funcionales son algunos de los principales retos. Esto impide aprovechar completamente las propiedades excepcionales de los nanotubos funcionalizados en sistemas reales, lo que plantea la necesidad de explorar nuevos métodos de funcionalización, caracterización y aplicaciones prácticas de estos nanomateriales.', 'La funcionalización de nanotubos con moléculas específicas permite mejorar sus propiedades químicas y físicas, ampliando su aplicabilidad en campos como la biomedicina, la electrónica y los sensores. Estudiar nuevas estrategias de funcionalización es clave para superar las limitaciones actuales y aprovechar al máximo el potencial de estos nanomateriales en el desarrollo de tecnologías avanzadas.', '¿Cómo influye el tipo de molécula funcional utilizada en las propiedades físico-químicas y la eficiencia de aplicación de nanotubos de carbono funcionalizados en sistemas tecnológicos o biomédicos?', 'Los nanotubos de carbono (NTC) son estructuras cilíndricas formadas por láminas de grafeno enrolladas, conocidas por su alta conductividad eléctrica, resistencia mecánica y estabilidad térmica. Sin embargo, su escasa solubilidad y baja reactividad química limitan su uso en aplicaciones prácticas. Para superar estas barreras, se recurre a la funcionalización, un proceso mediante el cual se modifican químicamente los nanotubos para incorporar moléculas funcionales que mejoran su compatibilidad y desempeño en distintos entornos.\r\n\r\nExisten dos tipos principales de funcionalización: covalente y no covalente. La funcionalización covalente implica la formación de enlaces químicos entre las moléculas funcionales y la superficie del nanotubo, lo cual puede alterar su estructura pero proporciona una unión fuerte y estable. Por otro lado, la funcionalización no covalente preserva la estructura original del NTC y se basa en interacciones físicas como fuerzas de Van der Waals o apilamiento π-π.\r\n', 'En los últimos años, diversos estudios han explorado la funcionalización de nanotubos de carbono para mejorar su compatibilidad en medios biológicos y su integración en dispositivos tecnológicos. Investigaciones como las de Bianco et al. (2011) han demostrado el uso de nanotubos funcionalizados para la liberación dirigida de fármacos, mostrando alta eficiencia en sistemas terapéuticos. Por otro lado, Chen et al. (2016) aplicaron moléculas funcionales específicas para convertir los nanotubos en sensores químicos sensibles a gases y biomarcadores.\r\n\r\nAvances más recientes se enfocan en técnicas de funcionalización más precisas y sostenibles, como el uso de biomoléculas y procesos de química verde. Sin embargo, persisten desafíos en cuanto a la reproducibilidad, estabilidad y control del grado de funcionalización, lo cual sigue siendo objeto de investigación activa a nivel global.', 'Investigar y analizar el efecto de la funcionalización de nanotubos de carbono con diferentes moléculas funcionales sobre sus propiedades físico-químicas, con el fin de evaluar su potencial en aplicac', 'Identificar los principales métodos de funcionalización covalente y no covalente aplicados a nanotubos de carbono.  Caracterizar las propiedades estructurales y fisicoquímicas de nanotubos funcionalizados con diferentes moléculas.  Evaluar el impacto de la funcionalización en la solubilidad, estabilidad y reactividad de los nanotubos.', 'La investigación se desarrollará bajo un enfoque experimental y descriptivo, dividida en las siguientes etapas:\r\n\r\nRevisión bibliográfica: Se recopilará y analizará información científica actualizada sobre nanotubos de carbono, métodos de funcionalización y aplicaciones recientes, utilizando bases de datos académicas como Scopus, ScienceDirect y Google Scholar.\r\n\r\nSelección de materiales: Se elegirá un tipo de nanotubo de carbono (de pared simple o múltiple) y diversas moléculas funcionales según la aplicación objetivo.\r\n\r\nFuncionalización de los nanotubos: Se aplicarán métodos covalentes y/o no covalentes para incorporar las moléculas seleccionadas a los nanotubos, siguiendo protocolos estandarizados en la literatura.\r\n\r\nCaracterización de materiales: Se utilizarán técnicas como espectroscopía FTIR, Raman, microscopía electrónica (SEM/TEM) y análisis térmico (TGA/DSC) para evaluar la eficacia de la funcionalización y los cambios en las propiedades de los nanotubos.\r\n\r\nEvaluación de d', '1 - 10 de abril: Revisión bibliográfica sobre nanotubos de carbono y moléculas funcionales.  11 - 15 de abril: Planteamiento del problema, objetivos y justificación.  16 - 25 de abril: Diseño detallado de la metodología experimental.  26 - 30 de abril: Selección de materiales y planificación del trabajo experimental.  1 - 10 de mayo: Preparación del laboratorio y adquisición de reactivos.  11 - 25 de mayo: Ejecución del proceso de funcionalización de los nanotubos.  26 - 31 de mayo: Inicio de caracterización preliminar (FTIR, SEM, etc.).  1 - 15 de junio: Continuación de la caracterización de los nanotubos funcionalizados.  16 - 25 de junio: Pruebas de aplicación (ej. sensores, liberación de fármacos, etc.).  26 - 30 de junio: Recolección de datos y organización de resultados.', 'Obtención exitosa de nanotubos funcionalizados mediante técnicas covalentes o no covalentes, conservando su integridad estructural.  Mejora en las propiedades físico-químicas de los nanotubos, como solubilidad, dispersión y estabilidad en medios líquidos, gracias a la incorporación de moléculas funcionales.  Verificación por caracterización instrumental (espectroscopía FTIR, Raman, SEM, etc.) de la presencia de grupos funcionales en la superficie de los nanotubos.  Demostración del desempeño mejorado en la aplicación seleccionada (por ejemplo, mayor sensibilidad en sensores o mejor transporte en liberación de fármacos).', 'Hirsch, A. (2002). Functionalization of single-walled carbon nanotubes. Accounts of Chemical Research, 35(10), 1036–1044. https://doi.org/10.1021/ar010144q\r\n\r\nTasis, D., Tagmatarchis, N., Bianco, A., & Prato, M. (2006). Chemistry of carbon nanotubes. Chemical Reviews, 106(3), 1105–1136. https://doi.org/10.1021/cr050569o\r\n\r\nBianco, A., Kostarelos, K., & Prato, M. (2005). Applications of carbon nanotubes in drug delivery. Current Opinion in Chemical Biology, 9(6), 674–679. https://doi.org/10.1016/j.cbpa.2005.10.005\r\n\r\nBussy, C., Ali-Boucetta, H., & Kostarelos, K. (2013). Safety considerations for the use of carbon nanotubes in humans. Nanomedicine, 8(6), 775–779. https://doi.org/10.2217/nnm.13.65\r\n\r\nMonthioux, M., & Kuznetsov, V. L. (2006). Who should be given the credit for the discovery of carbon nanotubes?. Carbon, 44(9), 1621–1623. https://doi.org/10.1016/j.carbon.2006.03.019\r\n\r\nAjayan, P. M., & Tour, J. M. (2007). Materials science: nanotube composites. Nature, 447(7148), 1066–1068', '60000000', '5000000', '40000000', '12000000', '2000000', '1000000', 'uploads/Moléculas funcionales y nanotubos funcionalizados.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos_profesor`
--

CREATE TABLE `proyectos_profesor` (
  `id` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `creation` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proyectos_profesor`
--

INSERT INTO `proyectos_profesor` (`id`, `id_profesor`, `id_proyecto`, `creation`) VALUES
(2, 0, 1, '2024-09-25 05:26:02'),
(3, 11, 1, '2024-09-25 05:28:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semilleros`
--

CREATE TABLE `semilleros` (
  `codigo_sem` int(11) NOT NULL,
  `nombre_sem` varchar(80) DEFAULT NULL,
  `fechacreacion_sem` date DEFAULT NULL,
  `estado_sem` char(10) DEFAULT NULL,
  `codigo_pro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `semilleros`
--

INSERT INTO `semilleros` (`codigo_sem`, `nombre_sem`, `fechacreacion_sem`, `estado_sem`, `codigo_pro`) VALUES
(1, 'Cimed', '2018-10-05', 'Activo', 1),
(2, 'Sinergy', '2013-06-05', 'Activo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopersonas`
--

CREATE TABLE `tipopersonas` (
  `codigo_tip` int(11) NOT NULL,
  `nombre_tip` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipopersonas`
--

INSERT INTO `tipopersonas` (`codigo_tip`, `nombre_tip`) VALUES
(1, 'Estudiante'),
(2, 'Profesor'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoproyectos`
--

CREATE TABLE `tipoproyectos` (
  `codigo_tip_pro` int(11) NOT NULL,
  `nombre_tip_pro` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipoproyectos`
--

INSERT INTO `tipoproyectos` (`codigo_tip_pro`, `nombre_tip_pro`) VALUES
(255, 'Software'),
(360, 'Investigativo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`codigo_ciu`),
  ADD KEY `codigo_dep` (`codigo_dep`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`codigo_dep`);

--
-- Indices de la tabla `estudiantes_proyectos`
--
ALTER TABLE `estudiantes_proyectos`
  ADD PRIMARY KEY (`ide_est_pro`),
  ADD KEY `documento_per` (`documento_per`),
  ADD KEY `fk_codigo_pro` (`codigo_pro`);

--
-- Indices de la tabla `lineas`
--
ALTER TABLE `lineas`
  ADD PRIMARY KEY (`codigo_lin`),
  ADD KEY `codigo_sem` (`codigo_sem`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`codigo_men`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`codigo_per`),
  ADD KEY `codigo_men` (`codigo_men`),
  ADD KEY `codigo_tip` (`codigo_tip`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_per`),
  ADD KEY `codigo_tip` (`codigo_tip`),
  ADD KEY `codigo_sem` (`codigo_sem`),
  ADD KEY `documento_per` (`documento_per`) USING BTREE;

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`codigo_pro`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`codigo_pro`),
  ADD KEY `codigo_ciu` (`codigo_ciu`),
  ADD KEY `codigo_tip_pro` (`codigo_tip_pro`);

--
-- Indices de la tabla `proyectos_profesor`
--
ALTER TABLE `proyectos_profesor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `semilleros`
--
ALTER TABLE `semilleros`
  ADD PRIMARY KEY (`codigo_sem`),
  ADD KEY `codigo_pro` (`codigo_pro`);

--
-- Indices de la tabla `tipopersonas`
--
ALTER TABLE `tipopersonas`
  ADD PRIMARY KEY (`codigo_tip`);

--
-- Indices de la tabla `tipoproyectos`
--
ALTER TABLE `tipoproyectos`
  ADD PRIMARY KEY (`codigo_tip_pro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estudiantes_proyectos`
--
ALTER TABLE `estudiantes_proyectos`
  MODIFY `ide_est_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134681;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `codigo_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `codigo_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `proyectos_profesor`
--
ALTER TABLE `proyectos_profesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `semilleros`
--
ALTER TABLE `semilleros`
  MODIFY `codigo_sem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipopersonas`
--
ALTER TABLE `tipopersonas`
  MODIFY `codigo_tip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipoproyectos`
--
ALTER TABLE `tipoproyectos`
  MODIFY `codigo_tip_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD CONSTRAINT `ciudades_ibfk_1` FOREIGN KEY (`codigo_dep`) REFERENCES `departamentos` (`codigo_dep`);

--
-- Filtros para la tabla `estudiantes_proyectos`
--
ALTER TABLE `estudiantes_proyectos`
  ADD CONSTRAINT `estudiantes_proyectos_ibfk_1` FOREIGN KEY (`documento_per`) REFERENCES `personas` (`documento_per`),
  ADD CONSTRAINT `fk_codigo_pro` FOREIGN KEY (`codigo_pro`) REFERENCES `proyectos` (`codigo_pro`);

--
-- Filtros para la tabla `lineas`
--
ALTER TABLE `lineas`
  ADD CONSTRAINT `lineas_ibfk_1` FOREIGN KEY (`codigo_sem`) REFERENCES `semilleros` (`codigo_sem`);

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`codigo_men`) REFERENCES `menu` (`codigo_men`),
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`codigo_tip`) REFERENCES `tipopersonas` (`codigo_tip`);

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`codigo_tip`) REFERENCES `tipopersonas` (`codigo_tip`),
  ADD CONSTRAINT `personas_ibfk_2` FOREIGN KEY (`codigo_sem`) REFERENCES `semilleros` (`codigo_sem`);

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `proyectos_ibfk_1` FOREIGN KEY (`codigo_ciu`) REFERENCES `ciudades` (`codigo_ciu`),
  ADD CONSTRAINT `proyectos_ibfk_2` FOREIGN KEY (`codigo_tip_pro`) REFERENCES `tipoproyectos` (`codigo_tip_pro`);

--
-- Filtros para la tabla `semilleros`
--
ALTER TABLE `semilleros`
  ADD CONSTRAINT `semilleros_ibfk_1` FOREIGN KEY (`codigo_pro`) REFERENCES `programas` (`codigo_pro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
