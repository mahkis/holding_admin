<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->string('inn');
            $table->string('region');
            $table->string('address');
            $table->string('application_area');
            $table->string('by_industry');
            $table->string('expired_date');
            $table->string('comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->dropColumn('inn');
            $table->dropColumn('region');
            $table->dropColumn('address');
            $table->dropColumn('application_area');
            $table->dropColumn('by_industry');
            $table->dropColumn('expired_date');
            $table->dropColumn('comment');
        });
    }
}
