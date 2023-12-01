CREATE DATABASE lisandro_tp3;

USE lisandro_tp3;

CREATE TABLE `pedidos` (
  `id_pedidos` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `alf_cer` tinyint(4) NOT NULL DEFAULT 0,
  `alf_arr` tinyint(4) NOT NULL DEFAULT 0,
  `mix_cer` tinyint(4) NOT NULL DEFAULT 0,
  `fecha_ingreso` date NOT NULL DEFAULT current_timestamp(),
  `fecha_entregado` date DEFAULT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'INGRESADO'
);

INSERT INTO `pedidos`(`nombre`, `email`, `telefono`, `direccion`, `alf_cer`, `alf_arr`) 
VALUES 
('Lisandro','lisandropaolini@gmail.com','+56982133783','av. suecia 750','12','6');

INSERT INTO `pedidos`(`nombre`, `email`, `telefono`, `direccion`, `alf_cer`, `mix_cer`) 
VALUES 
('Natalia','nataliapaolini@gmail.com','+56973422368','rivadavia 44','6','6');

INSERT INTO `pedidos`(`nombre`, `email`, `telefono`, `direccion`, `alf_arr`, `mix_cer`) 
VALUES 
('Josefina','josefinapaolini@gmail.com','+56985644562','bv colon 436','3','4');

INSERT INTO `pedidos`(`nombre`, `email`, `telefono`, `direccion`, `alf_cer`, `alf_arr`, `mix_cer`) 
VALUES 
('Gina','gina.psico@gmail.com','+56982144758','chacabuco 455','6','6','6');

INSERT INTO `pedidos`(`nombre`, `email`, `telefono`, `direccion`, `alf_cer`, `alf_arr`, `mix_cer`) 
VALUES 
('Stefano','stefano.bskt@gmail.com','+54952366846','san lorenzo 306','1','2','4');

INSERT INTO `pedidos`(`nombre`, `email`, `telefono`, `direccion`, `mix_cer`) 
VALUES 
('Juan Carlos','jc.paolini@gmail.com','+54943577893','el trovador 4315','20');

INSERT INTO `pedidos`(`nombre`, `email`, `telefono`, `direccion`, `alf_cer`, `alf_arr`, `mix_cer`) 
VALUES 
('Lisandro','lisandropaolini@gmail.com','+56982133783','av. suecia 750','12','12','6');

INSERT INTO `pedidos`(`nombre`, `email`, `telefono`, `direccion`, `alf_cer`, `alf_arr`, `mix_cer`) 
VALUES 
('Natalia','nataliapaolini@gmail.com','+56973422368','rivadavia 44','1','6','12');

INSERT INTO `pedidos`(`nombre`, `email`, `telefono`, `direccion`, `alf_cer`, `alf_arr`) 
VALUES 
('Josefina','josefinapaolini@gmail.com','+56985644562','bv colon 436','6','6');
