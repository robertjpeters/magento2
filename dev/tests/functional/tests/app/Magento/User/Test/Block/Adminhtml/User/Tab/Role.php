<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\User\Test\Block\Adminhtml\User\Tab;

use Mtf\Client\Element\SimpleElement;
use Magento\Backend\Test\Block\Widget\Tab;

/**
 * Class Role
 * User role tab on UserEdit page.
 */
class Role extends Tab
{
    /**
     * Fill user options
     *
     * @param array $fields
     * @param SimpleElement|null $element
     * @return void
     */
    public function fillFormTab(array $fields, SimpleElement $element = null)
    {
        $this->getRoleGrid()->searchAndSelect(['rolename' => $fields['role_id']['value']]);
    }

    /**
     * Returns role grid
     *
     * @return \Magento\User\Test\Block\Adminhtml\User\Tab\Role\Grid
     */
    public function getRoleGrid()
    {
        return $this->blockFactory->create(
            'Magento\User\Test\Block\Adminhtml\User\Tab\Role\Grid',
            ['element' => $this->_rootElement->find('#permissionsUserRolesGrid')]
        );
    }
}
