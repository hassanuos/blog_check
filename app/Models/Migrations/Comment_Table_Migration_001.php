<?php

namespace Models\Migrations;

use Models\Migrations\Traits\BlogQueryBuilderTrait;

class Comment_Table_Migration_001
{
    use BlogQueryBuilderTrait;

    public function execute(){
        // TODO create table query here for making comment table
        $this->query("CREATE TABLE `post_comment` (`id` BIGINT NOT NULL AUTO_INCREMENT, `postId` BIGINT NOT NULL, `parentId` BIGINT NULL DEFAULT NULL, `title` VARCHAR(100) NOT NULL, `published` TINYINT(1) NOT NULL DEFAULT 0, `createdAt` DATETIME NOT NULL, `publishedAt` DATETIME NULL DEFAULT NULL, `content` TEXT NULL DEFAULT NULL, PRIMARY KEY (`id`), INDEX `idx_comment_post` (`postId` ASC), CONSTRAINT `fk_comment_post` FOREIGN KEY (`postId`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION);");
        $this->query("ALTER TABLE `post_comment` ADD INDEX `idx_comment_parent` (`parentId` ASC);ALTER TABLE `post_comment` ADD CONSTRAINT `fk_comment_parent` FOREIGN KEY (`parentId`) REFERENCES `post_comment` (`id`) ON DELETE NO ACTIONON UPDATE NO ACTION;");
    }

    public function drop(){
        // TODO drop comment table from database
        $this->query("DROP TABLE IF EXISTS post_comment;");
    }
}