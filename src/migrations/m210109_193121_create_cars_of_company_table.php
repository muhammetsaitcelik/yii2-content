<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cars_of_company}}`.
 */
class m210109_193121_create_cars_of_company_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cars_of_company}}', [
            'id' => $this->primaryKey(),
            'car_name' =>$this->string(),
            'model'=>$this->string(),
            'year'=>$this->integer(),
            'price'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cars_of_company}}');
    }
}
