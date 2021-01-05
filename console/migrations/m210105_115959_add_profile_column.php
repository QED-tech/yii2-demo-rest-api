<?php

use yii\db\Migration;

/**
 * Class m210105_115959_add_profile_column
 */
class m210105_115959_add_profile_column extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'description', $this->text());
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'description');
    }
}
