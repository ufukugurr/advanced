<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('pages', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'keys' => $this->text()->notNull(),
            'content' => $this->text()->notNull(),
            'cover' => $this->string(),

            'status' => $this->smallInteger()->notNull()->defaultValue(1),

        ], $tableOptions);

        $this->createTable('menu', [
            'id' => $this->primaryKey(),
            'page_id' => $this->integer()->notNull(),
            'parent_id' => $this->integer()->notNull()->defaultValue(0),
            'position' => $this->integer()->notNull()->defaultValue(0),
        ], $tableOptions);

        $this->createTable('slider', [
            'id' => $this->primaryKey(),
            'image' => $this->text()->notNull()->unique(),
            'position' => $this->integer()->notNull()->defaultValue(0),
            'url' => $this->string(),
            'text' => $this->string(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
        $this->dropTable('pages');
        $this->dropTable('menu');
        $this->dropTable('slider');
    }
}
