<?php

namespace Models\Migrations;

use Models\Migrations\Traits\BlogQueryBuilderTrait;

class Post_Table_Migration_001
{
    use BlogQueryBuilderTrait;

    public function execute(){
        // TODO create table query here for making post table

        $this->query("CREATE TABLE `post` (`id` BIGINT NOT NULL AUTO_INCREMENT, `authorId` BIGINT NOT NULL, `parentId` BIGINT NULL DEFAULT NULL, `title` VARCHAR(75) NOT NULL, `metaTitle` VARCHAR(100) NULL, `slug` VARCHAR(100) NOT NULL, `summary` TINYTEXT NULL, `published` TINYINT(1) NOT NULL DEFAULT 0, `createdAt` DATETIME NOT NULL, `updatedAt` DATETIME NULL DEFAULT NULL, `publishedAt` DATETIME NULL DEFAULT NULL, `content` TEXT NULL DEFAULT NULL, PRIMARY KEY (`id`), UNIQUE INDEX `uq_slug` (`slug` ASC),INDEX `idx_post_user` (`authorId` ASC), CONSTRAINT `fk_post_user` FOREIGN KEY (`authorId`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION);");
        $this->query("ALTER TABLE `post` ADD INDEX `idx_post_parent` (`parentId` ASC); ALTER TABLE `post` ADD CONSTRAINT `fk_post_parent` FOREIGN KEY (`parentId`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;");
    }

    public function drop(){
        // TODO drop post table from database
        $this->query("DROP TABLE IF EXISTS `post`;");
    }
}