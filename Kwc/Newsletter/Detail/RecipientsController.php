<?php
class Kwc_Newsletter_Detail_RecipientsController extends Kwc_Newsletter_Subscribe_RecipientsController
{
    protected $_buttons = array('add', 'delete', 'saveRecipients', 'removeRecipients');

    protected function _isAllowedComponent()
    {
        return Kwf_Controller_Action::_isAllowedComponent();
    }

    protected function _getSelect()
    {
        $ret = parent::_getSelect();
        if ($this->_model->hasColumn('unsubscribed')) {
            $ret->whereEquals('unsubscribed', false);
        }
        return $ret;
    }
}
