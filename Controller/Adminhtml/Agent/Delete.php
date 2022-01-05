<?php
/**
* @category   Webiators
* @package    Webiators_MultiChatOnWhatsapp
* @author     Webiators Team
* @copyright  Copyright (c) Webiators Technologies Private Limited. ( https://store.webiators.com ).
*/
namespace Webiators\MultiChatOnWhatsapp\Controller\Adminhtml\Agent;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

class Delete extends Action
{

    /**
     * @var \Webiators\MultiChatOnWhatsapp\Model\Agent
     */
    protected $modelAgent;

    /**
     * @param Context                  $context
     * @param \Webiators\MultiChatOnWhatsapp\Model\Agent $agentFactory
     */
    public function __construct(
        Context $context,
        \Webiators\MultiChatOnWhatsapp\Model\Agent $agentFactory
    ) {
        parent::__construct($context);
        $this->modelAgent = $agentFactory;
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Webiators\MultiChatOnWhatsapp::agent_delete');
    }

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('agent_id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->modelAgent;
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('Agent deleted successfully.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addError(__('Agent does not exist.'));
        return $resultRedirect->setPath('*/*/');
    }
}