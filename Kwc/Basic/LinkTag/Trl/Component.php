<?php
class Kwc_Basic_LinkTag_Trl_Component extends Kwc_Chained_Trl_Component
{
    public static function getSettings($masterComponent)
    {
        $ret = parent::getSettings($masterComponent);
        $ret['dataClass'] = 'Kwc_Basic_LinkTag_Data';
        $ret['extConfig'] = 'Kwf_Component_Abstract_ExtConfig_Form';
        return $ret;
    }

    public function getTemplateVars()
    {
        $ret = parent::getTemplateVars();
        $ret['child'] = $this->getData()->getChildComponent(array(
            'generator' => 'child'
        ));
        $ret['linkTag'] = $ret['child'];
        return $ret;
    }
}
