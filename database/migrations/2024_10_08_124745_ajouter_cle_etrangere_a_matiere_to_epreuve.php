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
        Schema::table('epreuves', function (Blueprint $table) {
            // Add the 'matiere_id' column with unsignedBigInteger type
            $table->unsignedBigInteger('matiere_id');

            // Define the foreign key constraint, referencing the 'id' column of the 'matieres' table
            // Add ON DELETE CASCADE to automatically delete associated 'epreuves' records when the related 'matiere' is deleted
            $table->foreign('matiere_id')
                  ->references('id')
                  ->on('matieres')  // Corrected the table name to 'matieres'
                  ->onDelete('cascade'); // Add the 'on delete cascade' rule
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('epreuves', function (Blueprint $table) {
            // Drop the foreign key constraint and the 'matiere_id' column
            $table->dropForeign(['matiere_id']);
            $table->dropColumn('matiere_id');
        });
    }
};
