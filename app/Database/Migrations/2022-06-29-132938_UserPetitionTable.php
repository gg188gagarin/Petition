<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserPetitionTable extends Migration
{
    public function up()
    {

        $sql = " CREATE TABLE `user_petition` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `petition_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index4` (`user_id`,`petition_id`),
  KEY `user_petition_petition_id_idx` (`petition_id`),
  KEY `user_petition_user_id_idx` (`user_id`),
  CONSTRAINT `user_petition_petition_id` FOREIGN KEY (`petition_id`) REFERENCES `petition` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_petition_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
 ";
        $this->db->query($sql);
    }

    public function down()
    {
        $this->db->query("DROP TABLE `user_petition`");
    }
}
