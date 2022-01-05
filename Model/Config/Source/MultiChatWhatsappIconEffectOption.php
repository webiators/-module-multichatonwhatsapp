<?php
/**
 * @category   Webiators
 * @package    Webiators_MultiChatOnWhatsapp
 * @author     Webitaors Team
 * @copyright  Copyright (c) Webiators Technologies Private Limited. ( https://store.webiators.com/ ).
 */
namespace Webiators\MultiChatOnWhatsapp\Model\Config\Source;

class MultiChatWhatsappIconEffectOption implements \Magento\Framework\Option\ArrayInterface
{
	public function toOptionArray()
	{
		return 
		[
			['value' => 'none','label' => __('None')],
			['value' => 'bounce','label' => __('Bounce')],
			['value' => 'rotate','label' => __('Rotate')],
			['value' => 'wiggle','label' => __('Wiggle')],
			['value' => 'pulse','label' => __('Pulse')],
			['value' => 'zoom','label' => __('Zoom')],
			['value' => 'wiggle_on_hover', 'label' => __('Wiggle On Hover')],
			['value' => 'pulse_on_hover','label' => __('Pulse On Hover')]
		];
	}
}