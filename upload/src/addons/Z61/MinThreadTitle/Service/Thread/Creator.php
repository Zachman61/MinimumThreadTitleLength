<?php

namespace Z61\MinThreadTitle\Service\Thread;

use Exception;

class Creator extends XFCP_Creator
{
    public function setContent($title, $message, $format = true)
    {
        $forum = $this->forum;

        if (!$forum->z61_character_min_enable || \XF::visitor()->hasNodePermission($forum->node_id, 'bypassThreadTitleReq'))
        {
            return parent::setContent($title, $message, $format);
        }

        if (strlen($title) < $forum->z61_character_min)
        {
            $this->thread->error(
                \XF::phrase('z61_mttl_title_length_must_be_at_least_x', ['length' => $forum->z61_character_min])
            );
        }

        return parent::setContent($title, $message, $format);
    }
}