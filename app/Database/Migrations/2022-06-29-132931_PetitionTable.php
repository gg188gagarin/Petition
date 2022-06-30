<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PetitionTable extends Migration
{
    public function up()
    {
        $sql = "  CREATE TABLE `petition` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(127) DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `description` text,
  `answer` text,
  `status` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `is_deleted` (`id`),
  KEY `name` (`name`),
  KEY `user_id` (`user_id`),
  KEY `status` (`status`),
  FULLTEXT KEY `details` (`description`,`answer`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;";
        $this->db->query($sql);
    }

    public function down()
    {
         $this->db->query("DROP TABLE `petition`");
    }
}
