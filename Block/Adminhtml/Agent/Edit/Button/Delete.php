<?php
/**
* @category   Webiators
* @package    Webiators_MultiChatOnWhatsapp
* @author     Webiators Team
* @copyright  Copyright (c) Webiators Technologies Private Limited. ( https://store.webiators.com ).
*/
namespace Webiators\MultiChatOnWhatsapp\Block\Adminhtml\Agent\Edit\Button;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Delete extends Generic implements ButtonProviderInterface
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @param Context $context
     */
    public function __construct(
        Context $context
    ) {
        $this->context = $context;
    }

    /**
     * Get button data
     *
     * @return array
     */
    public function getButtonData()
    {
        $data = [];
        $agent_id = $this->context->getRequest()->getParam('agent_id');

        if ($agent_id) {
            $data = [
                'label' => __('Delete'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __(
                    'Are you sure you want to do this?'
                ) . '\', \'' . $this->getDeleteUrl() . '\')',
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    /**
     * @return string
     */
    public function getDeleteUrl()
    {
        $agent_id = $this->context->getRequest()->getParam('agent_id');
        return $this->getUrl('*/*/delete', ['agent_id' => $agent_id]);
    }
}