<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%company}}`.
 */
class m210109_193521_create_company_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%company}}', [
            'id' => $this->primaryKey(),
            'name' =>$this->string(),
            'car_id'=>$this->integer(),
            'establishment'=>$this->date(),
            'created_at'=>$this->timestamp(),
            'updated_at'=>$this->timestamp()
        ]);
        $this->createIndex(
            'idx_company_car_id',
            'company',
            'car_id'
        );
        $this->addForeignKey(
            'fk_company_car_id',
            'company',
            'car_id',
            'cars_of_company',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_company_car_id','company');
        $this->dropTable('{{%company}}');
    }
}
