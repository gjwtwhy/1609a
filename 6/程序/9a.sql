/*
Navicat MySQL Data Transfer

Source Server         : shop
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : 9a

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-04-16 15:33:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `elm_category`
-- ----------------------------
DROP TABLE IF EXISTS `elm_category`;
CREATE TABLE `elm_category` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `pid` int(4) DEFAULT '0' COMMENT '父ID',
  `name` varchar(20) DEFAULT NULL COMMENT '分类名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of elm_category
-- ----------------------------

-- ----------------------------
-- Table structure for `elm_store`
-- ----------------------------
DROP TABLE IF EXISTS `elm_store`;
CREATE TABLE `elm_store` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '商家ID',
  `name` varchar(50) DEFAULT NULL COMMENT '商家名称',
  `tel` varchar(20) DEFAULT NULL COMMENT '商家电话',
  `type` tinyint(2) DEFAULT NULL COMMENT '餐饮类型',
  `address` varchar(100) DEFAULT NULL COMMENT '商家地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of elm_store
-- ----------------------------

-- ----------------------------
-- Table structure for `elm_user`
-- ----------------------------
DROP TABLE IF EXISTS `elm_user`;
CREATE TABLE `elm_user` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `type` int(2) DEFAULT '1' COMMENT '用户类型(1管理员2商家3用户)',
  `mobile` varchar(11) DEFAULT NULL COMMENT '手机号',
  `pwd` char(32) DEFAULT NULL COMMENT '密码',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mobile` (`mobile`),
  KEY `mobilepwd` (`mobile`,`pwd`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of elm_user
-- ----------------------------
INSERT INTO `elm_user` VALUES ('1', '1', '15210754766', '111111', null);
INSERT INTO `elm_user` VALUES ('2', '1', '15210754761', null, null);
INSERT INTO `elm_user` VALUES ('3', '1', '15210754763', null, null);
INSERT INTO `elm_user` VALUES ('4', '1', '15210754765', null, null);
INSERT INTO `elm_user` VALUES ('5', '1', '15210754768', null, null);

-- ----------------------------
-- Table structure for `grade`
-- ----------------------------
DROP TABLE IF EXISTS `grade`;
CREATE TABLE `grade` (
  `no` int(4) NOT NULL AUTO_INCREMENT COMMENT '成绩ID',
  `id` int(4) DEFAULT NULL COMMENT '学生ID',
  `kemu` varchar(10) DEFAULT NULL COMMENT '科目',
  `score` int(4) DEFAULT '0' COMMENT '成绩',
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='成绩表';

-- ----------------------------
-- Records of grade
-- ----------------------------
INSERT INTO `grade` VALUES ('1', '1', 'math', '30');
INSERT INTO `grade` VALUES ('2', '3', 'math', '40');
INSERT INTO `grade` VALUES ('3', '4', 'math', '50');

-- ----------------------------
-- Table structure for `student`
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT '学生ID',
  `name` varchar(20) DEFAULT NULL COMMENT '姓名',
  `age` tinyint(2) DEFAULT NULL COMMENT '年龄',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='学生表';

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('1', '李1', '20');
INSERT INTO `student` VALUES ('2', '李2', '25');
INSERT INTO `student` VALUES ('3', '张3', '10');
