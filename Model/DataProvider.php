<?php
/**
* @category   Webiators
* @package    Webiators_MultiChatOnWhatsapp
* @author     Webiators Team
* @copyright  Copyright (c) Webiators Technologies Private Limited. ( https://store.webiators.com ).
*/
namespace Webiators\MultiChatOnWhatsapp\Model;

use Webiators\MultiChatOnWhatsapp\Model\ResourceModel\Agent\CollectionFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Store\Model\StoreManagerInterface;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    /**
     * @var array
     */
    protected $loadedData;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $agentCollectionFactory,
        RequestInterface $request,
        StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $agentCollectionFactory->create();
        $this->request = $request;
        $this->storeManager = $storeManager;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (!$this->loadedData) {
            $storeId = (int) $this->request->getParam('store');
            $items = $this->collection->getItems();
            foreach ($items as $item) {
                $this->loadedData[$item->getAgentId()] = $item->getData();
                $itemData = $item->getData();
                if (isset($itemData['logo'])) {
                    $imageName = explode('/', $itemData['logo']);
                    $itemData['logo'] = [
                        [
                            'name' => $imageName[2],
                            'url' => $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . 'logo/image/' . $itemData['logo'],
                        ],
                    ];
                } else {
                    $itemData['logo'] = null;
                }
                
                $this->loadedData[$item->getAgentId()] = $itemData;
                break;
            }
        }
        return $this->loadedData;
    }
}