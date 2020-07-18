<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%holidays}}`.
 */
class m200718_073614_create_holidays_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%holidays}}', [
            'id'      => $this->primaryKey(),
            'start'   => $this->date()->notNull(),
            'end'     => $this->date()->notNull(),
            'status'  => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull()
        ]);

        $this->createIndex(
            'idx-holidays-user_id',
            'holidays',
            'user_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%holidays}}');
    }
}
