<?php


namespace Z61\MinThreadTitle;


use XF\Mvc\Entity\Entity;

class Listener
{
    public static function forumEntityStructure(\XF\Mvc\Entity\Manager $em, \XF\Mvc\Entity\Structure &$structure)
    {
        $structure->columns += [
            'z61_character_min_enable' => ['type' => Entity::BOOL, 'default' => false],
            'z61_character_min' => ['type' => Entity::UINT, 'default' => 5, 'min' => 5, 'max' => 150],
        ];
    }
}