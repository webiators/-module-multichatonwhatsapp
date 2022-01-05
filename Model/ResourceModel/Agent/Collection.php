<?php
/**
* @category   Webiators
* @package    Webiators_MultiChatOnWhatsapp
* @author     Webiators Team
* @copyright  Copyright (c) Webiators Technologies Private Limited. ( https://store.webiators.com ).
*/
namespace Webiators\MultiChatOnWhatsapp\Model\ResourceModel\Agent;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Webiators\MultiChatOnWhatsapp\Model\Agent as AgentModel;
use Webiators\MultiChatOnWhatsapp\Model\ResourceModel\Agent as AgentResourceModel;

class Collection extends AbstractCollection
{
	/**
     * @var string
     */
    protected $_idFieldName = 'agent_id';
    
    protected function _construct()
    {
        $this->_init(AgentModel::class, AgentResourceModel::class);
    }
}