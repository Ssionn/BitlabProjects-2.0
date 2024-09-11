<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('repositories', function (Blueprint $table) {
            $table->string('default_branch')
                ->default('main')
                ->after('owner');
            $table->string('visibility')
                ->default('public')
                ->after('default_branch');
            $table->boolean('archived')
                ->default(false)
                ->after('visibility');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('repositories', function (Blueprint $table) {
            $table->dropColumn('default_branch');
            $table->dropColumn('visibility');
            $table->dropColumn('archived');
        });
    }
};
