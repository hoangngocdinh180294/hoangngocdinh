<?php
namespace App\Tables\Builders\Admin;

use App\Models\Recruitment;
use LaravelEnso\Tables\app\Services\Table;
// Log cass su dung de log info
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class RecruitmentTable extends Table
{
    protected $templatePath = __DIR__.'/../../Templates/Admin/recruitments.json';

    public function query() {
        if(env('APP_DEBUG', false) == true) {
            Log::info("PriceTable Query");
        }
        return Recruitment::select(\DB::raw('
        recruitment.id as dtRowId,
        recruitment.position,
        recruitment.qty,
        recruitment.exp,
        recruitment.created_at
    '));
    }
}
