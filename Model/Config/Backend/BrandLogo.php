<?php
 /**
 * @category   Webiators
 * @package    Webiators_MultiChatOnWhatsapp
 * @author     Webitaors Team
 * @copyright  Copyright (c) Webiators Technologies Private Limited. ( https://store.webiators.com/ ).
 */
namespace Webiators\MultiChatOnWhatsapp\Model\Config\Backend;
 
class BrandLogo extends \Magento\Config\Model\Config\Backend\File
{
    /**
     * @return string[]
     */
    public function getAllowedExtensions() {
        return ['jpg', 'jpeg', 'gif', 'png'];
    }
}