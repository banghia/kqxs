/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100129
 Source Host           : localhost:3306
 Source Schema         : kqxs_db

 Target Server Type    : MySQL
 Target Server Version : 100129
 File Encoding         : 65001

 Date: 21/01/2018 22:56:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cards
-- ----------------------------
DROP TABLE IF EXISTS `cards`;
CREATE TABLE `cards`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `value` int(11) NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prediction_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `cards_prediction_id_foreign`(`prediction_id`) USING BTREE,
  CONSTRAINT `cards_prediction_id_foreign` FOREIGN KEY (`prediction_id`) REFERENCES `predictions` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cards
-- ----------------------------
INSERT INTO `cards` VALUES (4, 20000, 'VTT', 23, '2018-01-21 08:00:30', '2018-01-21 08:00:30');
INSERT INTO `cards` VALUES (5, 20000, 'VTT', 23, '2018-01-21 08:00:44', '2018-01-21 08:00:44');
INSERT INTO `cards` VALUES (6, 20000, 'VTT', 24, '2018-01-21 08:02:44', '2018-01-21 08:02:44');

-- ----------------------------
-- Table structure for config
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `merchant_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_secret` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of config
-- ----------------------------
INSERT INTO `config` VALUES (1, '51076', '163d3319029627', '056df4cce27bc2cbe68cc92e2031a30d', NULL, NULL);

-- ----------------------------
-- Table structure for histories
-- ----------------------------
DROP TABLE IF EXISTS `histories`;
CREATE TABLE `histories`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `guess` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prediction_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `histories_prediction_id_foreign`(`prediction_id`) USING BTREE,
  CONSTRAINT `histories_prediction_id_foreign` FOREIGN KEY (`prediction_id`) REFERENCES `predictions` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of histories
-- ----------------------------
INSERT INTO `histories` VALUES (14, '2018-01-18', '1', '1', 24, '2018-01-21 08:02:20', '2018-01-21 08:02:20');
INSERT INTO `histories` VALUES (15, '2018-01-22', '11', 'cc', 24, '2018-01-21 08:06:27', '2018-01-21 08:06:27');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2018_01_20_144710_create_predictions_table', 1);
INSERT INTO `migrations` VALUES (4, '2018_01_20_144923_create_histories_table', 1);
INSERT INTO `migrations` VALUES (5, '2018_01_20_145159_create_cards_table', 1);
INSERT INTO `migrations` VALUES (6, '2018_01_21_044733_create_config_table', 2);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for predictions
-- ----------------------------
DROP TABLE IF EXISTS `predictions`;
CREATE TABLE `predictions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guess` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of predictions
-- ----------------------------
INSERT INTO `predictions` VALUES (23, 'Dự đoán kết quả sổ xố miền bắc', 'abs', '1000000', '2018-01-21 07:05:36', '2018-01-21 07:05:36');
INSERT INTO `predictions` VALUES (24, 'dự đoán kết quả miền nam', '1111111', '500000', '2018-01-21 08:02:01', '2018-01-21 08:05:42');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'banghia', 'banghia.violet@gmail.com', '$2y$10$HCxR5yc7NqyhmzMnKvP/wOKv/5PGAPPJX7kAeCznJEKeH8jTDsFTG', '9pzV72Q4UWj7lNPm8Dcjabiv5tYltQFkKu3tlcAqPOJA3ulVaJCRJ71CJdgB', '2018-01-21 01:59:40', '2018-01-21 08:03:53');

SET FOREIGN_KEY_CHECKS = 1;
