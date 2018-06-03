-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 03, 2018 at 09:29 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profitableitems`
--

-- --------------------------------------------------------

--
-- Table structure for table `ML_profitable_items`
--

CREATE TABLE `ML_profitable_items` (
  `itemID` varchar(250) NOT NULL,
  `Title` varchar(300) NOT NULL,
  `StartPrice` double NOT NULL,
  `Currency` varchar(200) NOT NULL,
  `viewItemURL` varchar(250) NOT NULL,
  `totalQTYPurchased` int(11) DEFAULT NULL,
  `totalMoneyPurchased` double NOT NULL,
  `totalItemsSold` int(11) NOT NULL,
  `userID` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ML_profitable_items`
--

INSERT INTO `ML_profitable_items` (`itemID`, `Title`, `StartPrice`, `Currency`, `viewItemURL`, `totalQTYPurchased`, `totalMoneyPurchased`, `totalItemsSold`, `userID`) VALUES
('MCO454428115', 'Par De Set De Gomas Conductoras Cauchos Control Xbox 360', 3400, '', 'https://articulo.mercadolibre.com.co/MCO-454428115-par-de-set-de-gomas-conductoras-cauchos-control-xbox-360-_JM', 0, 479400, 141, 'CYBER-GAMERS'),
('MCO446149969', 'Kit 7 En 1 Teclado Estuche Y Mas Tablets 10 Pulgadas Negro', 24900, '', 'https://articulo.mercadolibre.com.co/MCO-446149969-kit-7-en-1-teclado-estuche-y-mas-tablets-10-pulgadas-negro-_JM', 0, 3411300, 137, 'CYBER-GAMERS'),
('MCO449114881', 'Estuche Teclado Usb Tablet 10 Pulgadas Negro', 9900, '', 'https://articulo.mercadolibre.com.co/MCO-449114881-estuche-teclado-usb-tablet-10-pulgadas-negro-_JM', 0, 940500, 95, 'CYBER-GAMERS'),
('MCO448355790', 'Soporte 360 Para Cabecera Auto Ipad Mini O Tablet 7 - 8.5', 26900, '', 'https://articulo.mercadolibre.com.co/MCO-448355790-soporte-360-para-cabecera-auto-ipad-mini-o-tablet-7-85-_JM', 0, 1829200, 68, 'CYBER-GAMERS'),
('MCO445096051', 'Estuche Rigido Doble Cierre Nintendo New 3ds Xl 3ds Xl Negro', 19800, '', 'https://articulo.mercadolibre.com.co/MCO-445096051-estuche-rigido-doble-cierre-nintendo-new-3ds-xl-3ds-xl-negro-_JM', 0, 3049200, 154, 'CYBER-GAMERS'),
('MCO451762469', 'Lector Adaptador De Memoria Micro Sd A Usb', 2900, '', 'https://articulo.mercadolibre.com.co/MCO-451762469-lector-adaptador-de-memoria-micro-sd-a-usb-_JM', 0, 179800, 62, 'CYBER-GAMERS'),
('MCO450274081', 'Control + Nunchuk + Motion Plus + Silicona Wii Y Wii U Negro', 75100, '', 'https://articulo.mercadolibre.com.co/MCO-450274081-control-nunchuk-motion-plus-silicona-wii-y-wii-u-negro-_JM', 0, 18024000, 240, 'CYBER-GAMERS'),
('MCO449468518', 'Convertidor Adaptador Memoria Micro Sd Memory Stick Pro Duo', 5400, '', 'https://articulo.mercadolibre.com.co/MCO-449468518-convertidor-adaptador-memoria-micro-sd-memory-stick-pro-duo-_JM', 0, 739800, 137, 'CYBER-GAMERS'),
('MCO451195481', 'Base Vertical Cargador Control Ventilador Refrigerate Ps4', 45800, '', 'https://articulo.mercadolibre.com.co/MCO-451195481-base-vertical-cargador-control-ventilador-refrigerate-ps4-_JM', 0, 3297600, 72, 'CYBER-GAMERS'),
('MCO448494278', 'Kit 7 En 1 Teclado Estuche Y Mas Tablet 8 Pulgadas  Negro', 24900, '', 'https://articulo.mercadolibre.com.co/MCO-448494278-kit-7-en-1-teclado-estuche-y-mas-tablet-8-pulgadas-negro-_JM', 0, 1045800, 42, 'CYBER-GAMERS'),
('MCO450274957', 'Kit Protector 4 En 1 Acrilico Screen Y Mas Sony Ps Vita Fat', 19900, '', 'https://articulo.mercadolibre.com.co/MCO-450274957-kit-protector-4-en-1-acrilico-screen-y-mas-sony-ps-vita-fat-_JM', 0, 2766100, 139, 'CYBER-GAMERS'),
('MCO460286121', 'Combo 5 En 1 Estuche Aluminio Y Mas Nintendo 3ds Old Negro', 29900, '', 'https://articulo.mercadolibre.com.co/MCO-460286121-combo-5-en-1-estuche-aluminio-y-mas-nintendo-3ds-old-negro-_JM', 0, 1016600, 34, 'CYBER-GAMERS'),
('MCO447116591', 'Estuche Tipo Agenda Forro Protector Tablet  Ipad 2 3 4 Negro', 29800, '', 'https://articulo.mercadolibre.com.co/MCO-447116591-estuche-tipo-agenda-forro-protector-tablet-ipad-2-3-4-negro-_JM', 0, 5781200, 194, 'CYBER-GAMERS'),
('MCO457130413', 'Set Gomas Conductoras Para Control Sony Ps2', 2900, '', 'https://articulo.mercadolibre.com.co/MCO-457130413-set-gomas-conductoras-para-control-sony-ps2-_JM', 0, 95700, 33, 'CYBER-GAMERS'),
('MCO449261485', 'Kit Estuche Cable Datos Screen Acrilico +regalos Sony Psp Go', 24900, '', 'https://articulo.mercadolibre.com.co/MCO-449261485-kit-estuche-cable-datos-screen-acrilico-regalos-sony-psp-go-_JM', 0, 1543800, 62, 'CYBER-GAMERS'),
('MCO448494301', 'Cable Usb Carga Nintendo New 3ds Xl 2ds 3ds 3ds Xl Dsi Xl ', 6300, '', 'https://articulo.mercadolibre.com.co/MCO-448494301-cable-usb-carga-nintendo-new-3ds-xl-2ds-3ds-3ds-xl-dsi-xl-_JM', 0, 270900, 43, 'CYBER-GAMERS'),
('MCO444959860', 'Convertidor Hdmi A Micro Hdmi 4k 1080 Gopro', 7300, '', 'https://articulo.mercadolibre.com.co/MCO-444959860-convertidor-hdmi-a-micro-hdmi-4k-1080-gopro-_JM', 0, 394200, 54, 'CYBER-GAMERS'),
('MCO445496887', 'Estuche Forro Protector Gira 360 Samsung Note 10.1 Negro', 24900, '', 'https://articulo.mercadolibre.com.co/MCO-445496887-estuche-forro-protector-gira-360-samsung-note-101-negro-_JM', 0, 3984000, 160, 'CYBER-GAMERS'),
('MCO449261498', 'Kit 12 En 1 Estuches Cargador Y Mas Nintendo Dsi Xl ', 24900, '', 'https://articulo.mercadolibre.com.co/MCO-449261498-kit-12-en-1-estuches-cargador-y-mas-nintendo-dsi-xl-_JM', 0, 522900, 21, 'CYBER-GAMERS'),
('MCO450275821', 'Fundas Silicona Protectora Apple Ipad 2 3 4 Negro', 8900, '', 'https://articulo.mercadolibre.com.co/MCO-450275821-fundas-silicona-protectora-apple-ipad-2-3-4-negro-_JM', 0, 391600, 44, 'CYBER-GAMERS'),
('MCO449261442', 'Bateria + Cable Playstation3 Play3 Control Sony Ps3', 15900, '', 'https://articulo.mercadolibre.com.co/MCO-449261442-bateria-cable-playstation3-play3-control-sony-ps3-_JM', 0, 1176600, 74, 'CYBER-GAMERS'),
('MCO451195068', 'Estuche Rigido Doble Cierre Nintendo 3ds Dsi Ds Lite Negro', 9900, '', 'https://articulo.mercadolibre.com.co/MCO-451195068-estuche-rigido-doble-cierre-nintendo-3ds-dsi-ds-lite-negro-_JM', 0, 297000, 30, 'CYBER-GAMERS'),
('MCO445810062', 'Cargador + Kit 7 En 1 Gratis Playstation Go Sony Psp Go', 29800, '', 'https://articulo.mercadolibre.com.co/MCO-445810062-cargador-kit-7-en-1-gratis-playstation-go-sony-psp-go-_JM', 0, 1579400, 53, 'CYBER-GAMERS'),
('MCO450525142', 'Lapiz Tactil X 3 Unidades Stylus Nintendo Dsi Xl Vinotinto', 7900, '', 'https://articulo.mercadolibre.com.co/MCO-450525142-lapiz-tactil-x-3-unidades-stylus-nintendo-dsi-xl-vinotinto-_JM', 0, 331800, 42, 'CYBER-GAMERS'),
('MCO447120145', 'Estuche Teclado Bluetooth Samsung Tab 2 De 7 Pulgadas Negro', 26900, '', 'https://articulo.mercadolibre.com.co/MCO-447120145-estuche-teclado-bluetooth-samsung-tab-2-de-7-pulgadas-negro-_JM', 0, 430400, 16, 'CYBER-GAMERS'),
('MCO448877394', 'Multitap - Multiplayer Play2 Ps2 Playstation 2 Negro', 29900, '', 'https://articulo.mercadolibre.com.co/MCO-448877394-multitap-multiplayer-play2-ps2-playstation-2-negro-_JM', 0, 956800, 32, 'CYBER-GAMERS'),
('MCO447783638', 'Cable Otg Mini Usb (5 Pines) A Usb Hembra ', 1500, '', 'https://articulo.mercadolibre.com.co/MCO-447783638-cable-otg-mini-usb-5-pines-a-usb-hembra-_JM', 0, 60000, 40, 'CYBER-GAMERS'),
('MCO456974580', 'Accesorios Forro Silicona Grips Gratis Control Xbox 360 C24', 7400, '', 'https://articulo.mercadolibre.com.co/MCO-456974580-accesorios-forro-silicona-grips-gratis-control-xbox-360-c24-_JM', 0, 51800, 7, 'CYBER-GAMERS'),
('MCO446338775', 'Screen Protector De Pantalla Trasero Y Delantero Iphone 5 5s', 3900, '', 'https://articulo.mercadolibre.com.co/MCO-446338775-screen-protector-de-pantalla-trasero-y-delantero-iphone-5-5s-_JM', 0, 39000, 10, 'CYBER-GAMERS'),
('MCO451195377', 'Estuche Teclado Usb Tablet 8 Pulgadas Negro', 9900, '', 'https://articulo.mercadolibre.com.co/MCO-451195377-estuche-teclado-usb-tablet-8-pulgadas-negro-_JM', 0, 188100, 19, 'CYBER-GAMERS'),
('MCO460280769', 'Combo Silicona Protector Pantalla Y Cargador Sony Psp Azul', 24500, '', 'https://articulo.mercadolibre.com.co/MCO-460280769-combo-silicona-protector-pantalla-y-cargador-sony-psp-azul-_JM', 0, 171500, 7, 'CYBER-GAMERS'),
('MCO450524994', 'Estuche Rigido Doble Cierre Nintendo New 3ds Xl 3ds Xl Rojo', 19800, '', 'https://articulo.mercadolibre.com.co/MCO-450524994-estuche-rigido-doble-cierre-nintendo-new-3ds-xl-3ds-xl-rojo-_JM', 0, 554400, 28, 'CYBER-GAMERS'),
('MCO458142975', 'Estuche Universal Tipo Agenda Tablet 8 Pulgadas Negro', 10700, '', 'https://articulo.mercadolibre.com.co/MCO-458142975-estuche-universal-tipo-agenda-tablet-8-pulgadas-negro-_JM', 0, 74900, 7, 'CYBER-GAMERS'),
('MCO461724323', 'Control De Juegos Joystick Gamepad Usb Retro Turbo Pc Negro', 11900, '', 'https://articulo.mercadolibre.com.co/MCO-461724323-control-de-juegos-joystick-gamepad-usb-retro-turbo-pc-negro-_JM', 0, 130900, 11, 'CYBER-GAMERS'),
('MCO445496778', 'Estuche Teclado Bluetooth Samsung Galaxy Note 8 N5100  Rojo', 29700, '', 'https://articulo.mercadolibre.com.co/MCO-445496778-estuche-teclado-bluetooth-samsung-galaxy-note-8-n5100-rojo-_JM', 0, 386100, 13, 'CYBER-GAMERS'),
('MCO446813198', 'Estuche Forro Protector Gira 360 Samsung Note 10.1 Blanco', 24900, '', 'https://articulo.mercadolibre.com.co/MCO-446813198-estuche-forro-protector-gira-360-samsung-note-101-blanco-_JM', 0, 572700, 23, 'CYBER-GAMERS'),
('MCO461390663', 'Repuesto Analog-stick Tapa Analogo  Controles Sony Ps2 Y Ps3', 2400, '', 'https://articulo.mercadolibre.com.co/MCO-461390663-repuesto-analog-stick-tapa-analogo-controles-sony-ps2-y-ps3-_JM', 0, 88800, 37, 'CYBER-GAMERS'),
('MCO459246775', 'Carcasa Protectora Acrilica Nintendo Ds Lite', 10700, '', 'https://articulo.mercadolibre.com.co/MCO-459246775-carcasa-protectora-acrilica-nintendo-ds-lite-_JM', 0, 64200, 6, 'CYBER-GAMERS'),
('MCO450276795', 'Estuche Forro Protector Gira 360 Samsung Tab 2 10.1 Negro', 29900, '', 'https://articulo.mercadolibre.com.co/MCO-450276795-estuche-forro-protector-gira-360-samsung-tab-2-101-negro-_JM', 0, 687700, 23, 'CYBER-GAMERS'),
('MCO447117271', 'Kit 7 En 1 Teclado Estuche Y Mas Tablets 10 Pulgadas Morado', 24900, '', 'https://articulo.mercadolibre.com.co/MCO-447117271-kit-7-en-1-teclado-estuche-y-mas-tablets-10-pulgadas-morado-_JM', 0, 398400, 16, 'CYBER-GAMERS'),
('MCO450274788', 'Adaptador Cable Otg A Micro Usb Tablet S2 S3 S4 Tab 3 Atrix', 4000, '', 'https://articulo.mercadolibre.com.co/MCO-450274788-adaptador-cable-otg-a-micro-usb-tablet-s2-s3-s4-tab-3-atrix-_JM', 0, 128000, 32, 'CYBER-GAMERS'),
('MCO461672975', 'Pistola Laser Metal Gun Accesorio Control Nintendo Wii Wii U', 24900, '', 'https://articulo.mercadolibre.com.co/MCO-461672975-pistola-laser-metal-gun-accesorio-control-nintendo-wii-wii-u-_JM', 0, 99600, 4, 'CYBER-GAMERS'),
('MCO446242088', 'Control Dualshock Play3 Playstation3 Regalos Sony Ps3 Negro', 49900, '', 'https://articulo.mercadolibre.com.co/MCO-446242088-control-dualshock-play3-playstation3-regalos-sony-ps3-negro-_JM', 0, 15818300, 317, 'CYBER-GAMERS'),
('MCO451511627', 'Screen Protector De Pantalla Psvita Slim Ps Vita 2000 Slim', 8300, '', 'https://articulo.mercadolibre.com.co/MCO-451511627-screen-protector-de-pantalla-psvita-slim-ps-vita-2000-slim-_JM', 0, 298800, 36, 'CYBER-GAMERS'),
('MCO456146416', 'Estuche Teclado Usb Tablet De 7 Pulgadas Morado', 9900, '', 'https://articulo.mercadolibre.com.co/MCO-456146416-estuche-teclado-usb-tablet-de-7-pulgadas-morado-_JM', 0, 39600, 4, 'CYBER-GAMERS'),
('MCO449115099', 'Estuche Forro Protector Gira 360 Samsung Note 10.1 Rojo', 24900, '', 'https://articulo.mercadolibre.com.co/MCO-449115099-estuche-forro-protector-gira-360-samsung-note-101-rojo-_JM', 0, 298800, 12, 'CYBER-GAMERS'),
('MCO450276281', 'Control Dualshock Play3 Playstation3 Regalos Sony Ps3 Blanco', 49900, '', 'https://articulo.mercadolibre.com.co/MCO-450276281-control-dualshock-play3-playstation3-regalos-sony-ps3-blanco-_JM', 0, 5538900, 111, 'CYBER-GAMERS'),
('MCO444960722', 'Carcasa Protectora Acrilica Sony Ps Vita 1000 (fat)', 10700, '', 'https://articulo.mercadolibre.com.co/MCO-444960722-carcasa-protectora-acrilica-sony-ps-vita-1000-fat-_JM', 0, 224700, 21, 'CYBER-GAMERS'),
('MCO451511625', 'Kit 5 En 1  Estuche Silicona Acrilico Screen Sony Psp Go', 25900, '', 'https://articulo.mercadolibre.com.co/MCO-451511625-kit-5-en-1-estuche-silicona-acrilico-screen-sony-psp-go-_JM', 0, 1243200, 48, 'CYBER-GAMERS'),
('MCO447783244', 'Protector De Pantalla Calidad Aaa Ipad Mini', 4800, '', 'https://articulo.mercadolibre.com.co/MCO-447783244-protector-de-pantalla-calidad-aaa-ipad-mini-_JM', 0, 33600, 7, 'CYBER-GAMERS');

-- --------------------------------------------------------

--
-- Table structure for table `ML_profitable_sellers`
--

CREATE TABLE `ML_profitable_sellers` (
  `userID` varchar(210) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `totalPages` int(11) NOT NULL,
  `totalEntries` int(11) NOT NULL,
  `pageImported` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ML_profitable_sellers`
--

INSERT INTO `ML_profitable_sellers` (`userID`, `city`, `country`, `state`, `totalPages`, `totalEntries`, `pageImported`) VALUES
('CYBER-GAMERS', '', '', '', 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ML_profitable_items`
--
ALTER TABLE `ML_profitable_items`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `ML_profitable_sellers`
--
ALTER TABLE `ML_profitable_sellers`
  ADD PRIMARY KEY (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
