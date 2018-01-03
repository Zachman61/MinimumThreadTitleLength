<?php

namespace Z61\MinThreadTitle\Admin\Controller;

use XF\Mvc\FormAction;

class Forum extends XFCP_Forum
{
    protected function saveTypeData(FormAction $form, \XF\Entity\Node $node, \XF\Entity\AbstractNode $data)
    {
        parent::saveTypeData($form, $node, $data);

        $form->setup(function() use ($data)
        {
            $data->z61_character_min_enable = $this->filter('z61_character_min_enable', 'bool');
            $data->z61_character_min = $this->filter('z61_character_min', 'int');
        });
    }
}