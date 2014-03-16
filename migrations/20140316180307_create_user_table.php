<?php

use Phinx\Migration\AbstractMigration;

class CreateUserTable extends AbstractMigration
{
    public function change()
    {
        // create the table
        $table = $this->table('user');
        $table->addColumn('user_name', 'string')
            ->addColumn('password', 'string')
            ->addColumn('created', 'datetime')
            ->addColumn('email', 'string')
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