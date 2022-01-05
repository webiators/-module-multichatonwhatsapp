<?php
/**
* @category   Webiators
* @package    Webiators_MultiChatOnWhatsapp
* @author     Webiators Team
* @copyright  Copyright (c) Webiators Technologies Private Limited. ( https://store.webiators.com ).
*/
namespace Webiators\MultiChatOnWhatsapp\Controller\Adminhtml\Agent;

use Magento\Backend\App\Action;
use Magento\Backend\Model\Session;
use Webiators\MultiChatOnWhatsapp\Model\Agent;

class Save extends \Magento\Backend\App\Action
{  

    protected $_storeManager;

    /**
     * @var Agent
     */
    protected $multiChatOnWhatsappmodel;

    /**
     * @var Session
     */
    protected $adminsession;

    /**
     * @param Action\Context $context
     * @param Agent           $multiChatOnWhatsappmodel
     * @param Session        $adminsession
     */
    public function __construct(
        Action\Context $context,
        Agent $multiChatOnWhatsappmodel,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        Session $adminsession
    ) {
        parent::__construct($context);
        $this->multiChatOnWhatsappmodel = $multiChatOnWhatsappmodel;
        $this->adminsession = $adminsession;
        $this->_storeManager = $storeManager;
    }

    /**
     * Save agent record action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        $resultRedirect = $this->resultRedirectFactory->create();

        if ($data) {
            $agent_id = $this->getRequest()->getParam('agent_id');
            if ($agent_id) {
                $this->multiChatOnWhatsappmodel->load($agent_id);
            }

            $mediaUrl =  $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . 'logo/image/';
            if(isset($data['logo'][0]['name']))
            {
                $imageUrl = str_replace ($mediaUrl, "", $data['logo'][0]['url']);
                $data['logo'] = $imageUrl;
            }

            $this->multiChatOnWhatsappmodel->setData($data);

            try {
                $this->multiChatOnWhatsappmodel->save();
                $this->messageManager->addSuccess(__('The data has been saved.'));
                $this->adminsession->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    if ($this->getRequest()->getParam('back') == 'add') {
                        return $resultRedirect->setPath('*/*/add');
                    } else {
                        return $resultRedirect->setPath('*/*/edit', ['agent_id' => $this->multiChatOnWhatsappmodel->getAgentId(), '_current' => true]);
                    }
                }

                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the data.'));
            }

            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['agent_id' => $this->getRequest()->getParam('agent_id')]);
        }

        return $resultRedirect->setPath('*/*/');
    }
}