<?php
/**
 * Setup scripts, add new column and fulfills
 * its values to existing rows
 *
 */
/* @var $this Mage_Sales_Model_Mysql4_Setup */
$this->startSetup();

	// Add Email
	$this->getConnection()->addColumn(
	$this->getTable('sales/order_grid'),
		'customer_email',
		"varchar(255) not null default ''"
	);
	
	$this->getConnection()->addKey(
	$this->getTable('sales/order_grid'),
		'customer_email',
		'customer_email'
	);
	 
	$select = $this->getConnection()->select();
	$select->join(
		array(	'order'=>$this->getTable('sales/order')),
				'order.entity_id = order_grid.entity_id',
				'customer_email'
	);
		
	$this->getConnection()->query(
		$select->crossUpdateFromSelect(
			array('order_grid' => $this->getTable('sales/order_grid'))
		)
	);	

$this->endSetup();