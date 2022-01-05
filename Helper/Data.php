<?php
/**
 * @category   Webiators
 * @package    Webiators_MultiChatOnWhatsapp
 * @author     Webiators Team
 * @copyright  Copyright (c) Webiators Technologies Private Limited. ( https://store.webiators.com/ ).
 */
namespace Webiators\MultiChatOnWhatsapp\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

    /**
     * @var \Magento\Framework\Filter\FilterManager
     */
    private $filterManager;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\Filter\FilterManager $filterManager
    ) {
        parent::__construct($context);
        $this->filterManager = $filterManager;
    }

    /**
     * Return enable
     *
     * @return string
     */

    public function getMultichatOnWhatsappEnable(){
        return $this->scopeConfig->getValue('multichat_on_whatsapp/general_settings/enable', 
                        \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * Return Brand Logo Upload
     *
     * @return string
     */
    public function getBrandLogoUpload(){
        return $this->scopeConfig->getValue('multichat_on_whatsapp/general_settings/brand_logo_upload', 
                        \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * Return Multichat whatsapp Header Text
     *
     * @return string
     */
    public function getMultichatwhatsappHeaderText(){
        return $this->scopeConfig->getValue('multichat_on_whatsapp/general_settings/multichatwhatsapp_header_text', 
                        \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * Return Multichat whatsapp Icon Position Option
     *
     * @return string
     */
    public function getMultichatwhatsappIconPositionOption(){
        return $this->scopeConfig->getValue('multichat_on_whatsapp/general_settings/multichatwhatsapp_icon_position_option', 
                        \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * Return Multichat whatsapp Icon Bg Color Option
     *
     * @return string
     */
    public function getMultichatwhatsappIconBgColorOption(){
        return $this->scopeConfig->getValue('multichat_on_whatsapp/general_settings/multichatwhatsapp_icon_bg_color_option', 
                        \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }


    /**
     * Return Multichat whatsapp Icon Color Option
     *
     * @return string
     */
    public function getMultichatwhatsappIconColorOption(){
        return $this->scopeConfig->getValue('multichat_on_whatsapp/general_settings/multichatwhatsapp_icon_color_option', 
                        \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * Return Multichat whatsapp Box Top Header Bg Color Option
     *
     * @return string
     */
    public function getMultichatwhatsappBoxTopHeaderBgColorOption(){
        return $this->scopeConfig->getValue('multichat_on_whatsapp/general_settings/multichatwhatsapp_box_top_header_bg_color_option', 
                        \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * Return Multichat whatsapp Box Bubble Color Option
     *
     * @return string
     */
    public function getMultichatwhatsappBoxBubbleColorOption(){
        return $this->scopeConfig->getValue('multichat_on_whatsapp/general_settings/multichatwhatsapp_box_bubble_color_option', 
                        \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

     /**
     * Return Multichat whatsapp Box Bubble Color Option
     *
     * @return string
     */
    public function getMultichatwhatsappAgentHoverColorOption(){
        return $this->scopeConfig->getValue('multichat_on_whatsapp/general_settings/multichatwhatsapp_agent_hover_color_option', 
                        \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * Return Multichat whatsapp Box Bubble Color Option
     *
     * @return string
     */
    public function getMultichatwhatsappIconEffectOption(){
        return $this->scopeConfig->getValue('multichat_on_whatsapp/general_settings/multichatwhatsapp_icon_effect_option', 
                        \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }


}
