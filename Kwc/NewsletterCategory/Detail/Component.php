<?php
class Kwc_NewsletterCategory_Detail_Component extends Kwc_Newsletter_Detail_Component
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['generators']['mail'] = array(
            'class' => 'Kwf_Component_Generator_Static',
            'component' => 'Kwc_NewsletterCategory_Detail_Mail_Component'
        );
        return $ret;
    }
}
