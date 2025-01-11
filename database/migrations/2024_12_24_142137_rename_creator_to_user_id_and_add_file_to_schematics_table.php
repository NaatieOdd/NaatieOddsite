<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameCreatorToUserIdAndAddFileToSchematicsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('schematics', function (Blueprint $table) {
            // Rename the 'creator' column to 'user_id'
            $table->renameColumn('creator', 'user_id');

            // Add the 'file' column
            $table->string('file')->nullable()->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('schematics', function (Blueprint $table) {
            // Rollback: Rename 'user_id' back to 'creator'
            $table->renameColumn('user_id', 'creator');

            // Remove the 'file' column
            $table->dropColumn('file');
        });
    }
}
