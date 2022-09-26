<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PetitionStatuses extends Migration
{
    public function up()
    {
        $sql = "
            CREATE TABLE `petition_statuses` (
                `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
                `petition_id` bigint(11) unsigned DEFAULT NULL,
                `status` varchar(45) DEFAULT NULL,
                `updated_at` bigint(11) unsigned DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `petition_statuses_id_fk_idx` (`petition_id`),
                CONSTRAINT `petition_statuses_id_fk` FOREIGN KEY (`petition_id`) REFERENCES `petition` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
                )
            ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

";
        $this->forge->query($sql);
    }

    public function down()
    {
        $this->forge->dropTable('petition_statuses');
    }
}
