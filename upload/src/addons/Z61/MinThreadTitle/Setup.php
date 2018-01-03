<?php

namespace Z61\MinThreadTitle;

use XF\AddOn\AbstractSetup;
use XF\Db\Schema\Alter;

class Setup extends AbstractSetup
{
	public function install(array $stepParams = [])
	{
        $sm = \XF::db()->getSchemaManager();
        $sm->alterTable('xf_forum', function(Alter $table)
        {
            $table->addColumn('z61_character_min_enable', 'tinyint')->setDefault(0);
            $table->addColumn('z61_character_min', 'int')->setDefault(5);
        });
	}

	public function upgrade(array $stepParams = [])
	{
	    //
	}

	public function uninstall(array $stepParams = [])
	{
        $sm = \XF::db()->getSchemaManager();
        $sm->alterTable('xf_forum', function(Alter $table)
        {
            $table->dropColumns(
                ['z61_character_min_enable', 'z61_character_min']
            );
        });
	}
}