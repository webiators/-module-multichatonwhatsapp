<?php
/**
* @category   Webiators
* @package    Webiators_MultiChatOnWhatsapp
* @author     Webiators Team
* @copyright  Copyright (c) Webiators Technologies Private Limited. ( https://store.webiators.com ).
*/
namespace Webiators\MultiChatOnWhatsapp\Setup;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        /**
         * Create table 'webiators_multichat_agent'
         */
        if (!$installer->tableExists('webiators_multichat_agent')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('webiators_multichat_agent')
            )->addColumn(
                'agent_id',
                Table::TYPE_INTEGER,
                null,
                [
                    'identity' => true,
                    'nullable' => false,
                    'primary' => true,
                    'unsigned' => true,
                ],
                'Agent ID'
            )->addColumn(
                'agent_name',
                Table::TYPE_TEXT,
                255,
                [
                    'nullable => false',
                ],
                'Agent Name'
            )->addColumn(
                'agent_department',
                Table::TYPE_TEXT,
                255,
                [],
                'Agent Department'
            )->addColumn(
                'default_message',
                Table::TYPE_TEXT,
                '2M',
                [],
                'Default Message'
            )->addColumn(
                'mobile_no',
                Table::TYPE_TEXT,
                255,
                [],
                'Mobile Number'
            )->addColumn(
                'status',
                Table::TYPE_SMALLINT,
                null,
                [
                    'nullable' => false,
                ],
                'Status'
            )->addColumn(
                'logo',
                Table::TYPE_TEXT,
                null,
                [
                    'nullable' => false,
                ],
                'Image'
            )->setComment('Agent Table');
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}