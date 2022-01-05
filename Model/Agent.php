<?php
/**
* @category   Webiators
* @package    Webiators_MultiChatOnWhatsapp
* @author     Webiators Team
* @copyright  Copyright (c) Webiators Technologies Private Limited. ( https://store.webiators.com ).
*/
namespace Webiators\MultiChatOnWhatsapp\Model;
use Magento\Framework\Model\AbstractModel;
use Webiators\MultiChatOnWhatsapp\Model\ResourceModel\Agent as AgentResourceModel;
class Agent extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init(AgentResourceModel::class);
    }
}