-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.36 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para skysolar
CREATE DATABASE IF NOT EXISTS `skysolar` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `skysolar`;

-- Copiando estrutura para tabela skysolar.estados
CREATE TABLE IF NOT EXISTS `estados` (
  `cod_estado` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(100) DEFAULT NULL,
  `sigla` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cod_estado`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela skysolar.estados: 27 rows
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT IGNORE INTO `estados` (`cod_estado`, `estado`, `sigla`) VALUES
	(1, 'Acre', 'AC'),
	(2, 'Alagoas', 'AL'),
	(3, 'Amapá', 'AP'),
	(4, 'Amazonas', 'AM'),
	(5, 'Bahia', 'BA'),
	(6, 'Ceará', 'CE'),
	(7, 'Espírito Santo', 'ES'),
	(8, 'Goiás', 'GO'),
	(9, 'Maranhão', 'MA'),
	(10, 'Mato Grosso', 'MT'),
	(11, 'Mato Grosso do Sul', 'MS'),
	(12, 'Minas Gerais', 'MG'),
	(13, 'Pará', 'PA'),
	(14, 'Paraíba', 'PB'),
	(15, 'Paraná', 'PR'),
	(16, 'Pernambuco', 'PE'),
	(17, 'Piauí', 'PI'),
	(18, 'Rio de Janeiro', 'RJ'),
	(19, 'Rio Grande do Norte', 'RN'),
	(20, 'Rio Grande do Sul', 'RS'),
	(21, 'Rondônia', 'RO'),
	(22, 'Roraima', 'RR'),
	(23, 'Santa Catarina', 'SC'),
	(24, 'São Paulo', 'SP'),
	(25, 'Sergipe', 'SE'),
	(26, 'Tocantins', 'TO'),
	(27, 'Distrito Federal', 'DF');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;

-- Copiando estrutura para tabela skysolar.pessoas
CREATE TABLE IF NOT EXISTS `pessoas` (
  `cod_pessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome_completo` varchar(200) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `cep` varchar(50) DEFAULT NULL,
  `logradouro` varchar(200) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `excluido` set('N','Y') DEFAULT 'N',
  `dth_excluido` datetime DEFAULT NULL,
  `dth_insert` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cod_pessoa`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela skysolar.pessoas: 5 rows
/*!40000 ALTER TABLE `pessoas` DISABLE KEYS */;
INSERT IGNORE INTO `pessoas` (`cod_pessoa`, `nome_completo`, `rg`, `cpf`, `data_nascimento`, `cep`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `excluido`, `dth_excluido`, `dth_insert`) VALUES
	(1, 'BRUNO BESSA CHAVES', '42335463', '32344456789', '1994-09-29', '02991-070', 'Rua Morro de Santa Marta', '49', 'CS 3', 'Jardim Rincão', 'São Paulo', 'SP', 'N', NULL, '2022-03-04 20:01:51'),
	(2, 'Andressa Soares', '345657675', '12345656788', '1992-01-10', '02991-070', 'Rua Morro de Santa', '49', 'CS 3', 'Jardim Rincão', 'São Paulo', 'SP', 'Y', '2022-03-06 13:40:00', '2022-03-04 20:01:51'),
	(3, 'Teste Bruno', '345657675', '12345656780', '1992-01-10', '02991-070', 'Rua Morro de Santa', '49', 'CS 3', 'Jardim Rincão', 'São Paulo', 'SP', 'N', NULL, '2022-03-04 20:01:51'),
	(4, 'teste bruno', '424156458', '11122244455', '1994-09-29', '02991070', 'rua morro de san', '49', 'cs 3', 'jd rincao', 'sao paulo', 'sp', 'N', NULL, '2022-03-05 19:26:51'),
	(5, 'Teste bruno 02', '1351313131', '11155588877', '1994-09-29', '02991070', 'rua teste', '111', 'teste', 'teste', 'teste', 'te', 'N', NULL, '2022-03-05 19:30:14'),
	(6, 'Teste Bruno', '425627819', '41258896519', '1992-01-10', '02860001', 'Avenida Deputado Cantídio Sampaio', '5901', 'Rua A Casa 50', 'Vila Souza', 'São Paulo', 'SP', 'Y', '2022-03-06 13:46:34', '2022-03-06 09:05:26');
/*!40000 ALTER TABLE `pessoas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
