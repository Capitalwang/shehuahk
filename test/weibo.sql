/*
Navicat MySQL Data Transfer

Source Server         : ����
Source Server Version : 50130
Source Host           : localhost:3306
Source Database       : weibo

Target Server Type    : MYSQL
Target Server Version : 50130
File Encoding         : 65001

Date: 2011-12-19 03:09:11
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `award`
-- ----------------------------
DROP TABLE IF EXISTS `award`;
CREATE TABLE `award` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL COMMENT '识别码,用于计算中奖率',
  `name` varchar(50) DEFAULT NULL COMMENT '名称',
  `views` text COMMENT '显示值',
  `share` text COMMENT '分享内容',
  `taxis` tinyint(2) DEFAULT NULL COMMENT '中奖率计算顺序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of award
-- ----------------------------
INSERT INTO `award` VALUES ('1', '100', '100元现金券', '<b>恭喜您！</b>您本次转发给你赢取了100元现金券，（此券使用范围：在实店或网上选购1200元或以上的商品即可使用）购满5988元再送幸运草钻石吊坠一件。\r\n您的现金券领取号为：<strong>{{key}}</strong>【凭借此领取号兑换,丢失无效】', '今天我的运气还不错！在 奢华珠宝钻石网 上赢得了100元的现金券,朋友们,你们也去碰碰运气吧，100%中奖哦！Http://www.52shehua.com/', '6');
INSERT INTO `award` VALUES ('2', '200', '200元现金券', '<b>恭喜您！</b>您本次转发给你赢取了200元现金券，（此券使用范围：在实店或网上选购2300元或以上的商品即可使用）购满5988元再送幸运草钻石吊坠一件。\r\n您的现金券领取号为：<strong>{{key}}</strong>【凭借此领取号兑换,丢失无效】', '今天我的运气还不错！在 奢华珠宝钻石网 上赢得了200元的现金券,朋友们,你们也去碰碰运气吧，100%中奖哦！Http://www.52shehua.com/', '5');
INSERT INTO `award` VALUES ('3', '500', '500元现金券', '<b>恭喜您！</b>您本次转发给你赢取了500元现金券，（此券使用范围：在实店或网上选购5600元或以上的商品即可使用）购满5988元再送幸运草钻石吊坠一件。\r\n您的现金券领取号为：<strong>{{key}}</strong>【凭借此领取号兑换,丢失无效】', '今天我的运气比较好！在 奢华珠宝钻石网 上赢得了500元的现金券,朋友们,你们也去碰碰运气吧，100%中奖哦！Http://www.52shehua.com/', '4');
INSERT INTO `award` VALUES ('4', 'jade', '碧玺', '<b>恭喜您！</b>您本次转发给你赢取实物礼品--碧玺吊坠一个!购满5988元再送幸运草钻石吊坠一件。\r\n您的礼品领取号为：<strong>{{key}}</strong>【凭借此领取号兑换,丢失无效】', '今天我的运气非常好！在 奢华珠宝钻石网 上赢得了一个碧玺，朋友们,你们也去碰碰运气吧，100%中奖哦！Http://www.52shehua.com/', '3');
INSERT INTO `award` VALUES ('5', 'pearl', '珍珠吊坠', '<b>恭喜您！</b>您本次转发给你赢取实物礼品--珍珠吊坠一个!购满5988元再送幸运草钻石吊坠一件。\r\n您的礼品领取号为：<strong>{{key}}</strong>【凭借此领取号兑换,丢失无效】', '今天我鸿运当头！在 奢华珠宝钻石网 上赢得了一枚珍珠吊坠，朋友们,你们也去碰碰运气吧，100%中奖哦！Http://www.52shehua.com/', '2');
INSERT INTO `award` VALUES ('6', 'diamond', '钻石戒指', '<b>恭喜您！</b>您本次转发给你赢取实物礼品--钻石戒指一只!购满5988元再送幸运草钻石吊坠一件。\r\n您的礼品领取号为：<strong>{{key}}</strong>【凭借此领取号兑换,丢失无效】', '今天我的运气棒极了！在 奢华珠宝钻石网 上赢得了最高的礼品-钻石戒指,朋友们,你们也去碰碰运气吧，100%中奖哦！Http://www.52shehua.com/', '1');

-- ----------------------------
-- Table structure for `award_wb`
-- ----------------------------
DROP TABLE IF EXISTS `award_wb`;
CREATE TABLE `award_wb` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `W_U_id` bigint(18) unsigned DEFAULT NULL COMMENT '新浪微博ID(用这个字段区分新浪/腾讯)',
  `W_U_name` varchar(64) DEFAULT NULL COMMENT '微博名',
  `W_U_nick` varchar(64) DEFAULT NULL COMMENT '微博昵称[腾讯]',
  `W_U_info_id` bigint(18) unsigned DEFAULT NULL COMMENT '转发ID',
  `W_U_info` varchar(250) DEFAULT NULL COMMENT '转发内容',
  `W_U_ip` char(15) DEFAULT NULL COMMENT '转发IP',
  `time` int(11) unsigned DEFAULT NULL,
  `key` char(25) DEFAULT NULL COMMENT '16位',
  `aid` int(11) unsigned DEFAULT NULL COMMENT '奖品ID',
  `is_friends` tinyint(1) DEFAULT '0' COMMENT '是否关注我的微博',
  `share_wb_id` bigint(18) unsigned DEFAULT NULL COMMENT '中奖信息分享ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of award_wb
-- ----------------------------
