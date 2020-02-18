<?php
namespace App\Tables\Builders\Admin;

use App\Models\Custommer;
use LaravelEnso\Tables\app\Services\Table;
// Log cass su dung de log info
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class CustommerTable extends Table
{
    protected $templatePath = __DIR__.'/../../Templates/Admin/custommers.json';

    public function query() {
        if(env('APP_DEBUG', false) == true) {
            Log::info("CustommerTable Query");
        }

        return Custommer::select(\DB::raw('
            id as dtRowId,
            title,
            slug,
            status,
            created_at
        '));
    }
}