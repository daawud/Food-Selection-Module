<?php

use yii\db\Migration;

/**
 * Handles the creation of table `dish_item`.
 */
class m200205_085407_create_dish_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$options = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci';
		$this->createTable('dish_item', [
            'id' => $this->primaryKey()->comment('Код'),
            'dish_id' => $this->integer()->comment('Код блюда'),
            'item_id' => $this->integer()->comment('Код ингредиента'),
        ], $options);
	
		$this->addForeignKey(
			'fk-dish_item-item_id',
			'dish_item',
			'item_id',
			'item',
			'id',
			'CASCADE'
		);
		
		$this->addForeignKey(
			'fk-dish_item-dish_id',
			'dish_item',
			'dish_id',
			'dish',
			'id',
			'CASCADE'
		);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
		$this->dropForeignKey(
			'fk-dish_item-dish_id',
			'dish_item'
		);
	
		$this->dropForeignKey(
			'fk-dish_item-item_id',
			'dish_item'
		);
    	
        $this->dropTable('dish_item');
    }
}
