<?php
class Kwc_Favourites_Page_Component extends Kwc_Abstract
{
    public static function getSettings()
    {
        $ret = parent::getSettings();
        $ret['componentName'] = trlStatic('Favourites');
        $ret['viewCache'] = false;
        $ret['flags']['skipFulltextRecursive'] = true;
        $ret['flags']['hasComponentLinkModifiers'] = true;
        return $ret;
    }

    public function getComponentLinkModifiers()
    {
        return array(
            array(
                'type' => 'callback',
                'callback' => array('Kwc_Favourites_Page_Component', 'modifyComponentLink')
            )
        );
    }

    public static function modifyComponentLink($ret, $componentId)
    {
        return $ret .
            '<div class="cnt">' .
            count(Kwc_Favourites_Component::getFavouriteComponentIds()) .
            '</div>';
    }

    public function getTemplateVars()
    {
        $ret = parent::getTemplateVars();
        $user = Kwf_Model_Abstract::getInstance('Users')->getAuthedUser();
        if($user) {
            $lessonsFavouritesModel = Kwf_Model_Abstract::getInstance('Kwc_Favourites_Model');
            $selectFavourites = $lessonsFavouritesModel->select()
                                        ->whereEquals('user_id', $user->id);
            $favourites = $lessonsFavouritesModel->getRows($selectFavourites);
            $components = array();
            foreach ($favourites as $favourite) {
                $component = Kwf_Component_Data_Root::getInstance()->getComponentById($favourite->component_id);
                if ($component) {
                    $components[] = $component;
                }
            }
            $ret['favourites'] = $components;
        }
        return $ret;
    }
}