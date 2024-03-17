<?php

declare(strict_types=1);

use App\Enums\Nudge\NudgeStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('nudges', function (Blueprint $table) {
            $table
            ->string('status')
            ->default(NudgeStatus::NOT_VALIDATED->value)
            ->after('code');
        });

        DB::table('nudges')
            ->where('validated', true)
            ->update([
                'status' => NudgeStatus::VALIDATED->value
            ]);
    }

    public function down(): void
    {
        Schema::table('nudges', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
