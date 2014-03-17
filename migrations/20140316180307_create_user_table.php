<?php

use Phinx\Migration\AbstractMigration;

class CreateUserTable extends AbstractMigration
{
    public function change()
    {
        // create the table
        $table = $this->table('user');
        $table->addColumn('email', 'string', array('limit' => 100))
            ->addColumn('password', 'string')
            ->addColumn('salt', 'string', array('limit' => 50))
            ->addColumn('created', 'timestamp', array('default' => 'CURRENT_TIMESTAMP'))
            ->addIndex(array('email'), array('unique' => true))
            ->create();
    }

    /**
     * Migrate Up.
     */
    public function up()
    {
    
    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }
}