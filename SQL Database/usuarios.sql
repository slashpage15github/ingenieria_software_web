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

 Date: 13/11/2023 21:25:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `IDUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `clave` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nombre_usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tipo_usuario` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`IDUsuario`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 59 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (45, 'jose', '123', 'fsfsf', 2);
INSERT INTO `usuarios` VALUES (51, 'tinoco', 'abc', 'ddsssss', 1);

SET FOREIGN_KEY_CHECKS = 1;
