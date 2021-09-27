<?php

/*
 * This file is part of the 2amigos/yii2-usuario project.
 *
 * (c) 2amigOS! <http://2amigos.us/>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Da\User\Migration;

use Da\User\Helper\MigrationHelper;
use yii\db\Migration;

class m000000_000010_add_preferred_language extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'preferred_language', $this->string(5));
    }

    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'preferred_language');
    }
}
