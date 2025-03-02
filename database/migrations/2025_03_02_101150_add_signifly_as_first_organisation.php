<?php

use App\Models\Organisation;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Organisation::updateOrCreate([
            'id' => 1,
        ], [
            'name' => 'Signifly',
            'notion_id' => '01J0000000000000000000000',
        ]);
    }
};
