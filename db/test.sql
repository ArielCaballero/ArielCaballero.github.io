-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2024 a las 00:30:28
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
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `ID_Cita` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `ID_Doctor` int(11) NOT NULL,
  `Fecha` date NOT NULL DEFAULT current_timestamp(),
  `Hora` time NOT NULL,
  `Condicion` enum('Pendiente','Confirmado','Cancelado','') NOT NULL,
  `Fecha_Confirmacion` date DEFAULT NULL,
  `ID_Confirmacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`ID_Cita`, `ID_Usuario`, `ID_Doctor`, `Fecha`, `Hora`, `Condicion`, `Fecha_Confirmacion`, `ID_Confirmacion`) VALUES
(7, 11, 1, '2125-12-05', '12:51:00', 'Confirmado', '2024-06-07', 11),
(9, 1, 1, '1225-02-15', '02:14:00', 'Pendiente', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `ID_Doctor` int(11) NOT NULL,
  `ID_Usuario` int(11) DEFAULT NULL,
  `Especialidad` varchar(100) DEFAULT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `Cedula_Profesional` varchar(20) DEFAULT NULL,
  `Condicion` tinyint(1) DEFAULT NULL,
  `Fecha_Modificacion` date NOT NULL DEFAULT current_timestamp(),
  `ID_Modificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`ID_Doctor`, `ID_Usuario`, `Especialidad`, `RFC`, `Cedula_Profesional`, `Condicion`, `Fecha_Modificacion`, `ID_Modificacion`) VALUES
(1, 2, 'Oftalmología', 'LOAA760101XYZ', '1234567', 1, '2024-06-07', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exploracion_fisica`
--

CREATE TABLE `exploracion_fisica` (
  `ID_Exploracion` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `Vias_Lagrimales` text DEFAULT NULL,
  `Parpados` text DEFAULT NULL,
  `Globo_Ocular` text DEFAULT NULL,
  `Conjuntivas` text DEFAULT NULL,
  `Corneas` text DEFAULT NULL,
  `Iris_Porcion_Ciliar` text DEFAULT NULL,
  `Cristalinos` text DEFAULT NULL,
  `Vitreo` text DEFAULT NULL,
  `Fondo_Ojo` text DEFAULT NULL,
  `Fecha_Modificacion` date NOT NULL DEFAULT current_timestamp(),
  `ID_Modificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `exploracion_fisica`
--

INSERT INTO `exploracion_fisica` (`ID_Exploracion`, `ID_Paciente`, `Vias_Lagrimales`, `Parpados`, `Globo_Ocular`, `Conjuntivas`, `Corneas`, `Iris_Porcion_Ciliar`, `Cristalinos`, `Vitreo`, `Fondo_Ojo`, `Fecha_Modificacion`, `ID_Modificacion`) VALUES
(2, 1, 'funcionales', 'bien', 'sano', 'si', 'bien', 'mal estado', 'si', 'no', 'impecable', '2024-06-07', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exploracion_funcional`
--

CREATE TABLE `exploracion_funcional` (
  `ID_Exploracion_Funcional` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `Pupilas_PP` text DEFAULT NULL,
  `Pupilas_C_Rup` text DEFAULT NULL,
  `Pupilas_Rec` text DEFAULT NULL,
  `Queratometria_OD` varchar(50) DEFAULT NULL,
  `Queratometria_OI` varchar(50) DEFAULT NULL,
  `Retinoscopia_OD` varchar(50) DEFAULT NULL,
  `Retinoscopia_OI` varchar(50) DEFAULT NULL,
  `Subjetivo_OD` varchar(50) DEFAULT NULL,
  `Subjetivo_OI` varchar(50) DEFAULT NULL,
  `Add_OD_AV` varchar(50) DEFAULT NULL,
  `Add_OI_AV` varchar(50) DEFAULT NULL,
  `Fecha_Modificacion` date NOT NULL DEFAULT current_timestamp(),
  `ID_Modificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `exploracion_funcional`
--

INSERT INTO `exploracion_funcional` (`ID_Exploracion_Funcional`, `ID_Paciente`, `Pupilas_PP`, `Pupilas_C_Rup`, `Pupilas_Rec`, `Queratometria_OD`, `Queratometria_OI`, `Retinoscopia_OD`, `Retinoscopia_OI`, `Subjetivo_OD`, `Subjetivo_OI`, `Add_OD_AV`, `Add_OI_AV`, `Fecha_Modificacion`, `ID_Modificacion`) VALUES
(1, 1, '2', '2', '2', '3', '3', '4', '4', '5', '5', '6', '6', '2024-06-07', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `ID_Factura` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `Fecha` date NOT NULL,
  `Monto` decimal(10,2) NOT NULL,
  `Descripcion` text DEFAULT NULL,
  `Condicion` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`ID_Factura`, `ID_Paciente`, `Fecha`, `Monto`, `Descripcion`, `Condicion`) VALUES
(1, 1, '2024-12-02', 5001.00, 'lentes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_ocular`
--

CREATE TABLE `historia_ocular` (
  `ID_Historia_Ocular` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `Interrogatorio` text DEFAULT NULL,
  `Historia_General` text DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `Sexo` enum('Masculino','Femenino') DEFAULT NULL,
  `Ocupacion` varchar(100) DEFAULT NULL,
  `Graduacion_Usa` tinyint(1) DEFAULT NULL,
  `Fecha_Graduacion` date DEFAULT NULL,
  `Fecha_Modificacion` date NOT NULL DEFAULT current_timestamp(),
  `ID_Modificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historia_ocular`
--

INSERT INTO `historia_ocular` (`ID_Historia_Ocular`, `ID_Paciente`, `Interrogatorio`, `Historia_General`, `Edad`, `Sexo`, `Ocupacion`, `Graduacion_Usa`, `Fecha_Graduacion`, `Fecha_Modificacion`, `ID_Modificacion`) VALUES
(3, 1, 'No presenta sintomas', 'miopia y astimagtismo', 25, 'Masculino', 'Maestro', 0, '2022-10-24', '2024-06-07', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lentes_opticos`
--

CREATE TABLE `lentes_opticos` (
  `id_modelo` int(11) NOT NULL,
  `nombre_modelo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `color` varchar(100) NOT NULL,
  `material` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` longblob NOT NULL,
  `compatibilidad_facial` varchar(255) NOT NULL,
  `compatibilidad_altas_graduaciones` varchar(255) NOT NULL,
  `alto_mica` decimal(10,2) NOT NULL,
  `ancho_frente` decimal(10,2) NOT NULL,
  `largo_pata` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `lentes_opticos`
--

INSERT INTO `lentes_opticos` (`id_modelo`, `nombre_modelo`, `descripcion`, `color`, `material`, `precio`, `imagen`, `compatibilidad_facial`, `compatibilidad_altas_graduaciones`, `alto_mica`, `ancho_frente`, `largo_pata`) VALUES
(1, 'yucatan', 'lentes yucatan', 'azul', 'acero', 5000.00, 0xffd8ffe000104a46494600010100000100010000ffdb00840009060714121215121212121615171612161713181916151a171218161716171618151b1e2a22181b251e151521312127292b2e2e2e171f3339332d37282d2f2b010a0a0a0e0d0d170f0f152d1d151d2b2d2b2d2d2d2b2d2b2d2d2b2d2b2b2b2b2d2d2b2d2d2d2d2b372d2d3737372b2b2d2b2b2d37372b2b2b2d2b2b2d2d2b2d2dffc0001108009f013e03012200021101031101ffc4001c0001000203010101000000000000000000000708040506030201ffc4004f100001030203040506060f0703050000000100020304110507210612314113516171812232427291a114628292b1c10817334344525354638393a2c2d2d32373b2c3d1e1f094a3b31624344555ffc400160101010100000000000000000000000000000102ffc40017110101010100000000000000000000000000112101ffda000c03010002110311003f009c51110111101111011110111101111011110111101111011110111101111011110111101111011110111101111011110111101111011110111101111011110111101111011110111101111011110111101111011110111101111011110111101111011110111579cd6db4ad6e21514f1554d1451ba36b591bba33f7363892f6d9c6e5c79a0b0cb1ea2b638fcf9236face6b7e92a9fd5e2934bf759e793d791eff00f112b04eef50f620b773ed7d033cfafa31d8668afecde5af9f3230b671ae84fa9bd27f8015561b1b8f016efd17b32849e32307cf3f52116525cdac29bf8538f74351f4ee2c77671e143efd29fd4cbf5855ea9f06df76ef4cce04f9aee0013f52d6cccdd716def6245f85ec6d7b22c594fb73e17f949ff64f5fadce6c2cfdf661df149f50559d2cac459e6e70613f9cbc7ea66fa98bea7cdec25a2e2a8bb4bd9b14d7f7b0007bcaabd64b24160ab73da901221a6a893a8b8c7183ef27dcb4f3e7cc87cca08c7ad3b9df4461429ba9ba904bf2679561f369e91bde2577f1858d267857f28e8c7eae53fe6a8aae7b5048541297dbc311fc9d17ece5feaaf58b3c6bfd28a88fc8947f9aa2a0e5f600412e479df57ce0a4f0127f3aca6677d473a5a73dcf78ff00550d08bbfdcbd5b4c7b7ddfea826519e320e34511ee988fe02bd599ea7d2a06f84e7fa4a19148eff00965eeca1775b7dbfec8266667a47ce89e3ba507f802c9667853f3a59bc1cc2a166e1dd6e1ec5ecda168e2ef70fad04d2cceda43f83d4ff00dbfe75ef1e73d11e30560f9311ff0031424d64238927c4fd4befa5807a17f924fd2ac1383738f0fe62a077b1bf53d7ab737f0dfc7947c8ff0042a039b1160f359ed1bbf52f88eb9a6fbc7774d2cddfb9eae2db282c18cdac33f2d27eca43f405f433670afce5e3f5351fc8a00e922d6f39ecb4675efbbb4ff9c797cd4f401aedc9dce7fa23a32d07502d73cec49f0b755c2c5333370b3f8633c5928fa58bd19991859fc3a11dfbcdfa42abe5fdab25b464b37f7c01671370388360df3af73a72e682cf376fb0c3ff00d852f8c8d1f4af78f6cb0f770afa23faf8bf9956bc0f669d536ffdc4315c120c97034e5759726c1d46bbb5140f3d4d9f53ddbcd0a5e2c596a7c729a4f32a69ddeac8c77d057ab71484e826889eadf6ff00aaaa35db275b18de7d2c85a3d266ecc3db1972d20eeb782a8b9f1d431de6bda7b883f42f554d20ae918439923d8e1c1cd739847739a410ba0c3330f12a721cdac99e1a6e592b8cc1c06a5a77ee6c786841eab20b5688880ab2e75e1ef871699ee690d9845246793808dac76bd61cc3a768eb56696b36870182b6174151187b1dc0fa4c7727b1de8b875fd4829dbcaebb64f2feaf1088c94bd080c700f748e2d25ee68786b6cd3a06b9be2e5cf6d1614fa4a99a9a4d5d13dccbf0de00f92f03907348778ab1191b006e1a5c3d39e571f921918f74610473f697c50f1968ff006927f497e7da3f12fcb517ed26fe92b12b81db9cd3a5a0de8a2b54548d0c6d3e4b0fe924e008fc5173dd7ba08baab296be998e965aba186368d657cb20681c38f45c4fb54733c6d6b886bc3da0d83da1c0387580e01c0778056db6a76b2ab1093a4aa94b80f3631e4c71faacbe87b4dc9e6576797f9473d66ecf57bf0539d436d69651d601fb9b4fe31173c86b75470fb3bb3d535f2f454b117bb4de2346b01f49ef3a34687b4db4ba96709c841ba0d4d69de205d90b0583b9d9efd5c3e4852e60b8341491361a689b1c6df45bccf5b89d5ceed372b3d28888e42d2f2aba9f6467f857cc79094d7d6b2a08ec6c63df62a5f4504590e4561e0ddd3563bb37e203dd1dfdeb670e4de14de30caef5a697f848520220e3e9b2bf0a8fcda18cface924ff1b8af4c432df0c9a3319a28597e0f8da23783d61edd7c0dc762eb11055fccacb8930b225638cb4cf76eb643a398fe219201a1b806ce1a1b1d0697e1da55aecd2a312e1358d70beec2e90763a3b480fb5aaa7828322372c98dea53cbec9c1510b2a6bdf2304803994ecb34ee1d4191e4122e35dd16205ae6fa0ee5d93f85dac20947689a6bfbdd6f720af8c72f50e5dce61e57bb0f8cd55348f969db6e918fb192304801fbc000f65ceba0238ea2f68fba4b027a8128aefb2ff2fe5c47fb691ee8a9417377db6df91e0d888ee080011ab883c2c071224d6653617b9bae81ef37b97ba69b789f92e000d780002df6c5d1360a0a589bc1b045af5b8b439cef1249f15ba44708eca1c2bf3778fd74ff00cebc65c9bc30f08e76f74d27f112a41441145764753107a0aba963b9749d1cad1e1bad36f151d6d6e5b56d08323a36cf08e33437bb475be3e2defd476ab38882a060789981fbed8a9ea19e9453c4c95a4766f0bb0f6b48f1e0a5dd90c4f01c42d1cb434b4d506c3a27b5ad6b9dfa390583bb8d8f62ea76bf2ba8abaf235bf079cfdfa2005cf5c91f07f7e87b5423b67b0b578792678fa486fa54c6096f66f8e319e1c74ea2504e93655e12ed4d1347ab24ccf735e162cb93f859e104adee9a6fadc544bb1999f59436639c6aa9f41d1bc9df637f472711dc6e34d2dc54e9b23b6d4988b6f4f2f9605dd03fc991bdede63b45c76a0e5e5c95a1f427ad6763648c8fde8c9f7ac7764a403ccaca8ef786bfe8dd0a53441139c9f95bf71c4cb3aed4e35f16c81727b5f94f2d242fa97d636668731a474658e0f9646c6d75f78dc6f3db7bf2bf356116836fe20ec3aaafca17bfc59e583ed6852415275e6b3706a233d4430341719248d9602fa39c01f60b9f05e35adbcaf00124c920006a4f96400075ab3d975b0d0e1b037c86baa5cd06598804ef1172c61e4c1c2c38dae551d822220222f97bc004920000924e8001c49282b867fe1fd1e26240349a089e4f5bda5d11fdd63177d967b4d4d4582c72d4cad8da249401c5cf7121f66306ae3e572f15c4e7b6d252d6cb4e2964e94c3d336491a2f19dfdc2d6b5fe991b8ed45c6bc546f35c88ddd6cb7cd739a7e808244db6cdaa9acde8a9b7a9a9f8686d33c7c6783e40f8adedb92170b87613355cac829a23248468c68034e6e71e0d02fc4d82e976072e6a7127093ee34d7d6770f3bac44df4cf6f9a35d4916562765f65e9b0f8ba2a68f76f6df79d5f238737bf9f7701c805ab838ccbdca5868b767abdd9ea058816bc51386a3741f3dc0fa47b2c071326222c822220222202222022220e5b346a84784d6b89b5e1733c64b460789700ab56c2e0bf0dafa6a622ed7c80bc7e899e5c9ed6b48f152e7d91b8c6ed3d3d234fdd1e657fa918b341ef73affab5aefb1cf02bbea2b9c346814f1fac6cf94f80e8c7ca7209c805fa8883c2ba91b346f8a41bcc91ae639bd6c702d23d84aa8b5f42ea79a5a67f9d1492444dad7dd716ef5ba8817ee2ae0aaef9eb8474188b6a00b36a630e27f4b1598fd3d5e88f89413365dd689b0ca37837fec2261f598d0c75fc5a5744a27c82c5f7a096949d58448d1f14f92e03b05a33f2d4b0808888088880be6460702d70041041075041e208e617d22088f6e726d926f4f8696c527134e7489fea1fbd9ecf37d550b5541352cdbb2365a7a88cdf9b1cd3c9c08f711a157156876bb6429b128ba3a88fca00ee4adb0923279b5dd5d86e0f5208b760f395cd2d8313b91a06d5b470fef5a38facdf11c4a9ae96a592b1b246f6bd8e00b5ed21cd734f021c3421561db5d82a8c31c4c83a5a726cda86836d7807b7d07761d0f2279626c8eda5561aebd33f7a226eea77dcb1dd761e83be30f1bf0560b5cb43b782f87560eba799bf3985bf5ad7ec5660d2e22035a7a29ed734ef22fda58ee120eed7ac05f79a357d161952ef8ad03e736fee05415fb2f683e138b52b3974dd29f563de9f5ec3b8078ab58abe7d8f9876fd7cd311a4306e8ec7c8e007eeb1fed560d01111014019d3b5124b2be9b7ded8e299d198068d91a238a46c8f23576af7793c000d3c54feb85dbdcb483139193195f0c8347b9ad0e123795c1f485adbdd5a1bd8582b14b313c7c0701ec524649e034b5d3b9954ce90c00c8c8c9f21dbc583cb1e90045edc3537054c1b37971434703e26c5d23a5639924d259cf731c2c5b7b59adec007017b9d542197352ec371a10caedddd924a790ea01d4b438f66808ef082ce31800000000000034000e000e4be9110111101111011110111101116063d89b6969a6a87f9b146f7dbac81a34769361e282b6675631f08c52500ddb0810b7e479c3e79914f996d81fc0b0da685c2cfdc12480f112c9e5b81eededdf92abbe5de14ec4b168849e50323aa263c8b5877cdc7539dbadf94ad7202222028f73c704f8461ae95a2efa670985b8f47e6c83bb75dbdf20290979d4c0d918e8de039af6b9ae69e05ae1620f78282b4651e31f07c42124d9af3d1bbd592ccf01bfd11f92acdaa898ae1aec3eba5a671378642d0ee6633ab1fa732c735cad46cce282aa9619f4bbd80badca41e4bc783839456cd1115411110111101111079d440d91ae63dad731c08735c03839a78820e84284f6ff27cc7bd538602e1a9752dee40e7d113e70f8a75eabe814e08829a74a43ade531ed3dad2d703ed69042eaf11dbeaaabc39d4950e126e3e32273e791e50dc7f27e973bdc74d6fc54cfb7f96d06220c8cb43536d260347e9a095a3cef5b88d388d1577c6285f4a0d349f746c9274801b8de6b8c6db1e7c1e7c504d3f63bd06ed1d4545b5967ddbf5b2260b7ef4922961552d8fda4aac3dc25a693c836df88ddd1bfb1cce47e30b1562b6236ba2c4a13230163d8409622412c7117043879cc3636769c0e8082107468888088880abe67e60269eb63ae8c59b306873872a88ad627aaed0c23af71cac1ad16daecdb311a39295f605c2f1bed7dc95bab1fedd0f58247341e197bb42daea186606ef0d0c907122468b1bf7f1f15d22ac9b0bb593605592d3d4c6ee8f7b7278bd26b879b2b2fe76874e4e691d8ac760d8b43570b67a791b246e170e6fbc11c5ae1cc1d420cd44440444404444044440510fd90db4623a78e8587cb9889241d50b0f920facf02dfdd95256d1e3f050c2e9ea640c6b41b0b8de7bada318df49c7abea5594fc231fc574043a6776b9b05333ea6b7bb79c7adc824afb1d300dc867ae7b7595dd1464fe499abc83d45f61df1a9916261587c74d0c7044ddd8e36358d1c7c968b6a799eb2b2d0111101111042bf641ecd1b4588c63cdb4335bf149fec9e7c49693f19ab2f20b68c3e39289eef29bfda477e6db00e03bacd3f38a95715c3e3a98648266ef47231cc70f8ae16d0f23cc1e4555dada5a8c0f12ddbf971383e37f296124eebadd445da475870416b1169364369a2c429db3c46c783e3bdcb1fcc1ece60f31ec5bb404444044440444404458f5f5d1c0c324d23236378bdc4340f1283c71bc4d94d0493c8406c6d2eeab9e43bc9b0f155a76570876318a06485db8e2e96670e2226f55f81738b47cbbadf66ae618ae229e9b7be0ed771b10667f0040e3bba9b0e3af8091f27f631d414ce96716a9a8dd73c738e317dc8fbf524f69b7a28235da1ca3afa594fc0c7c261770b1631edec7b5c4027b471ea0a46ca3d87970e6cb354b9bd2ce2306269b88dacde201770738971e1a0b712a43440444404444044441cb6dbec1d2e26c1d334b2568b32a1960f68e3ba793db7e47acdac4dd44cfcb9c6b0b79930f9ba46df530b830b801a192093c977702e56091040b066fe2949e4d750836d097c7253bafda6c5bec0174187e7bd23beeb4d511fabb920fa41f72965c2fa15a2c4b62f0fa824cb454ce278bba36b5c7e536c7de83434d9bb85bc0267732fc9d1bff008415b28331b0c78b8ad8adf183d9ee7342d1d7e4ae192798da887fbb949ffc81cb5c721e8bf39adf9d17f4d075c73170bfcfe9fe77fb2c3a9cd6c2986df0c0e3f12399e3e73596f7ae786445173a9adf9d0ff4d7d7da2283f38aff009f0ff4906557e7661ac1e47c2253f163dd1ed90b5717b439ed3c8d2da481905fef8f3d2bc76b5b60d07bf78762eea8f25b0b6001d1cd29eb7cae04f7f47ba174784ec361f4d630d153823838b448e1f2df777bd0574c3b00c531b97a4b4b203f844c4b6268ec7116b7c5603dcac0e5fec34385425ac3bf33edd2ce458b88e0d68f458390f6aeac04404444044440444405cc6de6c5c18a41d1c9e448db98a702ee8dc78e9e934d85dbcedc880574e882b0cf86629804fd280f6b469d3b07490c8cbf07f50f8aeb1eaeb5dc6019e6d200aba6ef92037f1e89e6e3c1c54ca45f45cd62d97d86d4dccb450dcea5cc062713d65d1904941874d9a385bc5fe161bd8f64ac23beedb2cd666061a7857d37cf017315792387b8dd9255c5d8d91ae1fbec71f7ad7cb91507a35b503d66c6efa820eebff5d61df9f537cf0bf1db7b868e35f4bfb46a8e8e420fff0045dff4edfea2f68721a2f4abe53eac4c6fd24a0eb6b33570b8f4f85079ea632477ef6eeefbd73f5f9e348dbf454f3bcfc6dd8c1f105df42f9832268c79f5558ef54c4dfe02b7b43947854762699d211ce492477b5a1c1a7d88238c5b3c6ae4f269e1821bf33799fd96e03f74ad23301c6718903e46543c71124f78626df9b5a4016ec634f72b1785e034d4dffc7a6822ed646c613de40b95b1411cec0e54c342e6d4543854548b169b5a388f5b1a752e1f8c7c005232220222202222022220222202222022220222202222022220222202222022220222202222022220222202222022220222202222022220222202222022220222202222022220222202222022220222202222022220222202222022220222202222022220222202222022220fffd9, 'fina', 'si', 10.00, 5.00, 22.00),
(2, 'oaxaca', 'lentes oaxaca', 'verde', 'plastico', 4000.00, 0xffd8ffe000104a46494600010100000100010000ffdb00840009060710110610100f0f111315160f15101010170f10171017161612181717181715191f2b201820251b151321312131292b2e3131172b3338332c37282d2e2b010a0a0a0e0d0e1610101b2d1d1d1d2d2b2d2d2d2f2b2b2d2d2b2d2d2b2d2b2d2b2d2d352b2d2b2d2d2d2d2b2d2d2b2d2d2b2d2d2d2d2d2d2d2b2b2d2d2b2d372dffc000110800ff00c503012200021101031101ffc4001b00010003000301000000000000000000000003040501020607ffc4004510000201030006050903070d0100000000000102030411051221314161132251718106143242527291a1b1336282346392a2b3c1d1151617234353558384b2c2d3f007ffc400160101010100000000000000000000000000000102ffc4001811010101010100000000000000000000000011013141ffda000c03010002110311003f00fb880000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000011d7ad085194ea4a318c5665294928a4b8b6f622b695d250b7b7529a949ca4a14a9c566a549bdd082e2f63e4926de126ccfa1a2675ab46b5f6ace49eb52b64f36d478a787f693fbef77aaa3c41fce48cff26b5bab85edc2946149f353ad28292e6b28eeb49de3dda39af7aee827fabac6b9c11592b48def1d1ebf0ddd26fe6912c34b55cf5ec6e63cd3b79afd5a8dfc8d2011421a76dbce15395554e6de230a91953949f6454d2d6f0c9a457b9b6855a0e9d5846716b1284a2a516b9a663dbb9595dc294a7295b5492851949b72a151ec8d2949ed7096e8b7b9f57738e2abd00002000004375754e950752ad48538af4a72928c577b7b0a7a6b49ba34e11a70e92b5496a50a59c65e32e527eac22b6b97ef69382c742454d55b96ae2bef756515ab16f85283d94e3ddb5e36b6c0e8fcabb37f673ab57b1d2b5b9ab17f8a1071f99cff003873e8595f4bfd3a8ffbe48d804563ff002f54ff000ebefd0b6ffb44bca484566adaded35c5bb3ab3fd96b1b070056d1ba5adee14ba0ab19b8fa714f138f2941f5a3e29174cdd25a228d76a534e3523f675e0f56bc3dd9ae1db1794f8a657b2d215695d46def30dc9ead0ba8ad5a757ee4e3fd9d4c70dd2debd9551b40000000019474dc6e1e8ca8ad2508d56b14e52f453cefdcf8723e75a634269a8d94aa54be9a843a4ad5a51aaf6d38c5ca505158ce70f0be689bad6657b5d071f38acefea6dd74e3691e10a19d925f7aa614dbecd55c36ed90584146c69462924a9412496c494561244e5640000000021bdb5856b49d2a91d684e2e325c9fd1f32700605969be8746ca372e73ad46b79ab8c62e556b4f554a9b8c56f73a6e327c175b728b278df5f49663634e0bf397694fc542125f329ca93fe90e2f0f57f93a537b3abafd328465ca5a8e6bb8f4c4566d2af77a9d7a1473d91b897ef8124748a55146ac2549bf45c9c5c1f7493c783c32f1e67ff00a3db2a9e49568359cce9657275a0a5faae49f26058f27e0eb549dfcd6daab56dd3f52dd3ea617073f4df7a5ea9b62304a0925849612ec4b702a00020000a0417b694eb5aca9558eb424b125f34d35b534f0d3de9ac938032f415cd453ab6b5e5ad528eae2a3c66ad29e7a3a8d7b5d59465ce0dec4d1ae788f2f7cf637b6f2d1924ae1d39a92c45b95184a2e4929269b529c39edef24d0371a6569751b9a5095072799b508d48c71b31896ddb86f2bb7712b53d7b3001594377094ada4a0f12c755f63e051a15bceb414d35872a73a3523c633c38c93f1350c3fc9fca3fcddcaf055e11ff009417c61cc2ad793b5fa4d016b53dab6a6df7ea2cfcf26818fe4df52957b77be8dcd48af72a3e9a9e3928d451fc06c04d000000000eb38e60d65ae6b195dd93b18de5568a8dce8dd494ea47564a5d4df2e0d639a6f6f0c85c45e4d6b4ae6e2a54a92a924d50536a2938a94a714925d9523bf2f6f71e80ccd19a2e9d3b58c2316a29eb28b6dbce17f05f034c9990de867e9c707a3ea539faf4e585db859c27da6810dd5bc6a517092ca7f27da8a8c9d11739d213556e35a73519508b928a9527052cc60b63926e597bf18368f32bc9fa32d3546e2a49f496ef563a8f19ca5aae69704bff006327a6262e8002a0000000031ea2d6f2c297e6ec6ab7fe6d6a497ec645bf3b72d2fd0c37421af55f396c8c7eafc0cdb7bb8c2ef485ecfd1838dbc5adee3422db4b9f4b56a47bd177c9eb49d3b0d6abf6b564eb56e5297abdd1588aee22b5000540a3a66cba6b09462f134d4e94bd99c5e62fe28bc00f394ef179cd0bdc6ac6ac55add47d89c64d5393f766e707efaec3d018ee8c69e95a946693a573172517e8f4896271fc51c3f064f46a4a8250aadca0b642bbdb85c2357b1af6b73e387be34d1071169c72b6ae0f81c84000106b619d74ba5ba8d0df18e275df0c6f8c3be4d65f25f78b156bca4dc28e1bdce7ea47f8be5f1c135a5b469d2d5597b75a527e94a4f7b6fb42f13000a80000cebfc52b955dfa2d2a759f62cf527f85b69f2967817923b4a29c5a6b29ac35c1a32e3295b75679951f527b5ca92f667c5c7b25c38f6917ad207584d4a09c5a69aca69a69ae4cec1000050a9a56f7a1b194d2d696c8d287b5524f108f8b6bb965f026b8af1a74f5a72c2f9b7d896f6f919ed75ddddc2d48538ca54a9bdf1d9b672fbcd6525c13ed6c114a9587f596d659d65492b9ba97b73727259f7aa394fc0f4a66682b792b6955a8b152b4ba59ae2b2b118fe18a48d329a0002000023ab4d492ca4da795de75a32df17bd7d098a35e135a4a128eed56a4bc40ed2d1d0cb74dca9b7b7a92c473dba8f31f911bb5b85e8dc45fbf4137f18ca3f4340122d52a746e3d6ab4bc28c97d66c97cd73e9ce52e594a3f058cf89600857118a51c2492e0b81c805400000000000052968d8a9374a52a4dbcbd46b51be70798f8e3275e8ee56e9d19f7c2707f14daf917c122d67b95d7f7743bfa6a9f4d4398d0b87e9d5a71e50a6dbfd29b6be45f02155a858c23535f6ca5edc9eb4bc3847b960eb569c6aa7194731caee7879faa3bdfce4ad65a8b2f185fc4e6c9356b0cefd5592c44e0000000000004371af85a8a39ce1b6f625c5f3ee26000000000000000000000000000000000043732924b561adb70d26b293e3b7792a5b0e40000000000000000000000070101c800000000000000000704d1c800a00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000003ffd9, 'redonda', 'no', 25.00, 12.00, 27.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lente_contacto`
--

CREATE TABLE `lente_contacto` (
  `ID_Lente` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `Radio` varchar(50) DEFAULT NULL,
  `Diam` varchar(50) DEFAULT NULL,
  `CP` varchar(50) DEFAULT NULL,
  `RX` varchar(50) DEFAULT NULL,
  `Grueso` varchar(50) DEFAULT NULL,
  `ZO` varchar(50) DEFAULT NULL,
  `PL` varchar(50) DEFAULT NULL,
  `Color` varchar(50) DEFAULT NULL,
  `AV` varchar(50) DEFAULT NULL,
  `Observaciones` text DEFAULT NULL,
  `Fecha_Modificacion` date NOT NULL DEFAULT current_timestamp(),
  `ID_Modificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lente_contacto`
--

INSERT INTO `lente_contacto` (`ID_Lente`, `ID_Paciente`, `Radio`, `Diam`, `CP`, `RX`, `Grueso`, `ZO`, `PL`, `Color`, `AV`, `Observaciones`, `Fecha_Modificacion`, `ID_Modificacion`) VALUES
(2, 1, '2', '2', '2', '2', '2', '2', '2', 'verde', '2', 'No hay Observaciones', '2024-06-07', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ojo`
--

CREATE TABLE `ojo` (
  `ID_Ojo` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `Tipo` enum('OD','OI') NOT NULL,
  `Esferico` decimal(5,2) DEFAULT NULL,
  `Cilindrico` decimal(5,2) DEFAULT NULL,
  `Eje` decimal(5,2) DEFAULT NULL,
  `Prisma` decimal(5,2) DEFAULT NULL,
  `Altura` decimal(5,2) DEFAULT NULL,
  `Oblea` decimal(5,2) DEFAULT NULL,
  `Color` varchar(50) DEFAULT NULL,
  `AV` varchar(50) DEFAULT NULL,
  `PIO` varchar(50) DEFAULT NULL,
  `Estereopsis` varchar(50) DEFAULT NULL,
  `Agudeza_Visual_S_L` varchar(50) DEFAULT NULL,
  `Agudeza_Visual_C` varchar(50) DEFAULT NULL,
  `Agudeza_Visual_L` varchar(50) DEFAULT NULL,
  `Agudeza_Visual_C_C` varchar(50) DEFAULT NULL,
  `Fecha_Modificacion` date NOT NULL DEFAULT current_timestamp(),
  `ID_Modificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ojo`
--

INSERT INTO `ojo` (`ID_Ojo`, `ID_Paciente`, `Tipo`, `Esferico`, `Cilindrico`, `Eje`, `Prisma`, `Altura`, `Oblea`, `Color`, `AV`, `PIO`, `Estereopsis`, `Agudeza_Visual_S_L`, `Agudeza_Visual_C`, `Agudeza_Visual_L`, `Agudeza_Visual_C_C`, `Fecha_Modificacion`, `ID_Modificacion`) VALUES
(1, 1, 'OD', 2.30, 2.00, 2.00, 2.00, 2.50, 2.00, 'azul', '2', '2', '4', '2', '2', '2', '2', '2024-06-07', 11),
(2, 1, 'OI', 1.50, 1.50, 1.50, 1.50, 1.50, 1.50, 'azul', '2.5', '3', '4', '2.5', '2.5', '2.2', '2.5', '2024-06-07', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `ID_Paciente` int(11) NOT NULL,
  `ID_Usuario` int(11) DEFAULT NULL,
  `Colonia` varchar(100) DEFAULT NULL,
  `Ciudad` varchar(100) DEFAULT NULL,
  `CP` varchar(10) DEFAULT NULL,
  `Edo` varchar(100) DEFAULT NULL,
  `Celular` varchar(15) DEFAULT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `FN` date DEFAULT NULL,
  `Condicion` tinyint(1) DEFAULT NULL,
  `Fecha_Modificacion` date NOT NULL DEFAULT current_timestamp(),
  `ID_Modificacion` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`ID_Paciente`, `ID_Usuario`, `Colonia`, `Ciudad`, `CP`, `Edo`, `Celular`, `RFC`, `FN`, `Condicion`, `Fecha_Modificacion`, `ID_Modificacion`) VALUES
(1, 1, 'Colonia Centro', 'Ciudad de México', '12345', 'CDMX', '555-5678', 'JUAP880101HDF', '1988-01-01', 1, '2024-06-07', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idpermiso`, `nombre`) VALUES
(1, 'datospaciente'),
(2, 'recetas'),
(3, 'acceso'),
(4, 'misdatos'),
(5, 'agendarcita'),
(6, 'confirmarcita'),
(7, 'lentes_opticos'),
(8, 'agregarlentes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `ID_Receta` int(11) NOT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `ID_Doctor` int(11) DEFAULT NULL,
  `Fecha` date NOT NULL,
  `id_modelo` int(11) NOT NULL,
  `Fecha_Modificacion` date NOT NULL DEFAULT current_timestamp(),
  `ID_Modificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`ID_Receta`, `ID_Paciente`, `ID_Doctor`, `Fecha`, `id_modelo`, `Fecha_Modificacion`, `ID_Modificacion`) VALUES
(6, 1, 1, '2024-06-07', 1, '2024-06-07', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_Usuario` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Tel` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Tipo` enum('Cliente','Doctor','Admin') NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Fecha_Modificacion` date NOT NULL DEFAULT current_timestamp(),
  `ID_Modificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_Usuario`, `Nombre`, `Direccion`, `Tel`, `Email`, `Tipo`, `Username`, `Password`, `Fecha_Modificacion`, `ID_Modificacion`) VALUES
(1, 'Juan Perez', 'Calle Falsa 123', '555-1234', 'juan.perez@example.com', 'Cliente', 'juanp', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', '2024-06-07', 11),
(2, 'Dr. Ana Lopez', 'Avenida Principal 456', '555-8765', 'analopez@example.com', 'Doctor', 'analopez', '9878d344400c00f8bab1a4ba1a3488b3ace88aea983e3d94ba1c781e09ba32bb', '2024-06-07', 11),
(11, 'admin', 'admin', 'admin', 'admin', 'Admin', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '2024-06-07', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_permiso`
--

CREATE TABLE `usuario_permiso` (
  `idusuario_permiso` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuario_permiso`
--

INSERT INTO `usuario_permiso` (`idusuario_permiso`, `idusuario`, `idpermiso`) VALUES
(207, 1, 2),
(208, 1, 4),
(209, 1, 5),
(210, 1, 7),
(211, 2, 1),
(212, 2, 2),
(213, 2, 6),
(214, 2, 7),
(215, 11, 1),
(216, 11, 2),
(217, 11, 3),
(218, 11, 5),
(219, 11, 6),
(220, 11, 7),
(221, 11, 8);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`ID_Cita`),
  ADD KEY `citas_ibfk_1` (`ID_Usuario`),
  ADD KEY `citas_ibfk_2` (`ID_Doctor`),
  ADD KEY `citas_ibfk_3` (`ID_Confirmacion`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`ID_Doctor`),
  ADD UNIQUE KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indices de la tabla `exploracion_fisica`
--
ALTER TABLE `exploracion_fisica`
  ADD PRIMARY KEY (`ID_Exploracion`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `exploracion_funcional`
--
ALTER TABLE `exploracion_funcional`
  ADD PRIMARY KEY (`ID_Exploracion_Funcional`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`ID_Factura`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `historia_ocular`
--
ALTER TABLE `historia_ocular`
  ADD PRIMARY KEY (`ID_Historia_Ocular`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `lentes_opticos`
--
ALTER TABLE `lentes_opticos`
  ADD PRIMARY KEY (`id_modelo`);

--
-- Indices de la tabla `lente_contacto`
--
ALTER TABLE `lente_contacto`
  ADD PRIMARY KEY (`ID_Lente`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `ojo`
--
ALTER TABLE `ojo`
  ADD PRIMARY KEY (`ID_Ojo`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`ID_Paciente`),
  ADD UNIQUE KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`ID_Receta`),
  ADD KEY `ID_Paciente` (`ID_Paciente`),
  ADD KEY `ID_Doctor` (`ID_Doctor`),
  ADD KEY `receta_ibfk_3` (`id_modelo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_Usuario`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `usuario_ibfk_1` (`ID_Modificacion`);

--
-- Indices de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD PRIMARY KEY (`idusuario_permiso`),
  ADD KEY `fk_usuario_permiso_permiso_idx` (`idpermiso`),
  ADD KEY `fk_usuario_permiso_usuario_idx` (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `ID_Cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `ID_Doctor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `exploracion_fisica`
--
ALTER TABLE `exploracion_fisica`
  MODIFY `ID_Exploracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `exploracion_funcional`
--
ALTER TABLE `exploracion_funcional`
  MODIFY `ID_Exploracion_Funcional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `ID_Factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `historia_ocular`
--
ALTER TABLE `historia_ocular`
  MODIFY `ID_Historia_Ocular` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `lentes_opticos`
--
ALTER TABLE `lentes_opticos`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `lente_contacto`
--
ALTER TABLE `lente_contacto`
  MODIFY `ID_Lente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ojo`
--
ALTER TABLE `ojo`
  MODIFY `ID_Ojo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `ID_Paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `receta`
--
ALTER TABLE `receta`
  MODIFY `ID_Receta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`ID_Doctor`) REFERENCES `doctor` (`ID_Doctor`),
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`ID_Confirmacion`) REFERENCES `usuario` (`ID_Usuario`);

--
-- Filtros para la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`);

--
-- Filtros para la tabla `exploracion_fisica`
--
ALTER TABLE `exploracion_fisica`
  ADD CONSTRAINT `exploracion_fisica_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`);

--
-- Filtros para la tabla `exploracion_funcional`
--
ALTER TABLE `exploracion_funcional`
  ADD CONSTRAINT `exploracion_funcional_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`);

--
-- Filtros para la tabla `historia_ocular`
--
ALTER TABLE `historia_ocular`
  ADD CONSTRAINT `historia_ocular_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`);

--
-- Filtros para la tabla `lente_contacto`
--
ALTER TABLE `lente_contacto`
  ADD CONSTRAINT `lente_contacto_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`);

--
-- Filtros para la tabla `ojo`
--
ALTER TABLE `ojo`
  ADD CONSTRAINT `ojo_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`);

--
-- Filtros para la tabla `receta`
--
ALTER TABLE `receta`
  ADD CONSTRAINT `receta_ibfk_1` FOREIGN KEY (`ID_Paciente`) REFERENCES `paciente` (`ID_Paciente`),
  ADD CONSTRAINT `receta_ibfk_2` FOREIGN KEY (`ID_Doctor`) REFERENCES `doctor` (`ID_Doctor`),
  ADD CONSTRAINT `receta_ibfk_3` FOREIGN KEY (`id_modelo`) REFERENCES `lentes_opticos` (`id_modelo`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_Modificacion`) REFERENCES `usuario` (`ID_Usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
