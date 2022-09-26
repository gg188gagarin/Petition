<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ImageTable extends Migration
{
    public function up()
    {
        $sql = "  CREATE TABLE `images` (
            `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            `img_path` VARCHAR(255) NOT NULL,
            `user_id` BIGINT UNSIGNED NULL,
            `created_at` BIGINT UNSIGNED NULL,
            `updated_at` BIGINT UNSIGNED NULL,
            `deleted_at` BIGINT UNSIGNED NULL,
            PRIMARY KEY (`img_id`),
            UNIQUE INDEX `img_path_UNIQUE` (`img_path` ASC) VISIBLE,
            INDEX `images_user_id_idx` (`user_id` ASC) VISIBLE,
            CONSTRAINT `images_user_id`
              FOREIGN KEY (`user_id`)
              REFERENCES `petition`.`user` (`id`)
              ON DELETE CASCADE
              ON UPDATE CASCADE);
           ";
       $this->db->query($sql);
    }

    public function down()
    {
               $this->db->query("DROP TABLE `images`");
    }
}
