<?php
/**
* @category   Webiators
* @package    Webiators_MultiChatOnWhatsapp
* @author     Webiators Team
* @copyright  Copyright (c) Webiators Technologies Private Limited. ( https://store.webiators.com ).
*/
namespace Webiators\MultiChatOnWhatsapp\Block\Adminhtml\Agent\Edit\Button;

use Magento\Backend\Block\Widget\Context;

/**
 * Class Generic
 */
class Generic
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
     * Generate url by route and parameters
     *
     * @param string $route
     * @param array $params
     * @return string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}