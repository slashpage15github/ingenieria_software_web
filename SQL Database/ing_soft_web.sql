/*
 Navicat Premium Data Transfer

 Source Server         : Local_Server
 Source Server Type    : MySQL
 Source Server Version : 100116
 Source Host           : 127.0.0.1:3306
 Source Schema         : ing_soft_web

 Target Server Type    : MySQL
 Target Server Version : 100116
 File Encoding         : 65001

 Date: 06/11/2023 18:22:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for departamento
-- ----------------------------
DROP TABLE IF EXISTS `departamento`;
CREATE TABLE `departamento`  (
  `id_depa` int(5) NOT NULL,
  `nombre_depa` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_depa`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of departamento
-- ----------------------------
INSERT INTO `departamento` VALUES (1, 'Soporte Técnico');
INSERT INTO `departamento` VALUES (2, 'Compras');
INSERT INTO `departamento` VALUES (3, 'Ventas');
INSERT INTO `departamento` VALUES (4, 'Recursos Humanos');

-- ----------------------------
-- Table structure for problematicas
-- ----------------------------
DROP TABLE IF EXISTS `problematicas`;
CREATE TABLE `problematicas`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(70) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `producto` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `notifica` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `depa` int(5) NULL DEFAULT NULL,
  `desc` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fecha_registro` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fkdepa`(`depa`) USING BTREE,
  CONSTRAINT `fkdepa` FOREIGN KEY (`depa`) REFERENCES `departamento` (`id_depa`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of problematicas
-- ----------------------------
INSERT INTO `problematicas` VALUES (8, 'DAVID PEREZ', 'SLASHPAGE15@HOTMAIL.COM', 'COLDFUSION', 'Y', 2, 'ADSDSKDASLK  DLJAS KDJLA DL KDJAS D JASLKDKJ ASLKDJSAKL ', '2023-11-06 18:21:55');
INSERT INTO `problematicas` VALUES (9, 'FIDEL', 'SLASHPAGE15@HOTMAIL.COM', 'FLASH', 'N', 4, 'ZXZFFDFSDFDSDFD GFHGHGHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH', '2023-11-06 18:22:22');

SET FOREIGN_KEY_CHECKS = 1;
