<?php
namespace Webiators\MultiChatOnWhatsapp\Block;
use Magento\Framework\View\Element\Template;

class Agent extends \Magento\Framework\View\Element\Template
{
    private $_contact;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Webiators\MultiChatOnWhatsapp\Model\Agent $agent,
        \Magento\Framework\App\ResourceConnection $resource,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $data = []
    ) {
        $this->_agent = $agent;
        $this->_resource = $resource;
        $this->_storeManager = $storeManager;

        parent::__construct($context,$data);
    }

    public function getAgents()
    {
        $collection = $this->_agent->getCollection();
        return $collection;
    }

    /**
    * @return mediaUrl
    */
    public function getMediaUrl()

    {
        return $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
    }
}