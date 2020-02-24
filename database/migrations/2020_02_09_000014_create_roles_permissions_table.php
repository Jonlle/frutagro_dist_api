<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesPermissionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'roles_permissions';

    /**
     * Run the migrations.
     * @table roles_permissions
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('rol_perm_id');
            $table->string('permission_id', 10);
            $table->string('rol_id', 6);

            $table->index(["permission_id"], 'fk_roles_permissions_permissions_idx');

            $table->index(["rol_id"], 'fk_roles_permissions_roles_idx');


            $table->foreign('permission_id', 'fk_role_permissionss_permissions')
                  ->references('permission_id')->on('permissions')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->foreign('rol_id', 'fk_roles_permissions_roles')
                  ->references('rol_id')->on('roles')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
