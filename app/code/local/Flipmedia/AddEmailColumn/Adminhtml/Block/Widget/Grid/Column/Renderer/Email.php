<?php
class Flipmedia_AddEmailColumn_Adminhtml_Block_Widget_Grid_Column_Renderer_Email extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract {

	public function render(Varien_Object $row){
		   $value = $this->_getValue($row);
		   return $value ? '<a href="mailto:' . $value . '">' . $value . '</a>' : false;
		}
}
