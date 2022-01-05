<?php
/**
 * @category   Webiators
 * @package    Webiators_MultiChatOnWhatsapp
 * @author     Webitaors Team
 * @copyright  Copyright (c) Webiators Technologies Private Limited. ( https://store.webiators.com/ ).
 */
namespace Webiators\MultiChatOnWhatsapp\Model\Config\Source;

class MultiChatWhatsappIconPosition implements \Magento\Framework\Option\ArrayInterface
{
	public function toOptionArray()
	{
		return 
		[
            ['value' => 'bottom-left','label' => __('Bottom Left')],
            ['value' => 'bottom-right', 'label' => __('Bottom Right')]
		];
	}

}