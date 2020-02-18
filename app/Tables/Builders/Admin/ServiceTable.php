<?php
namespace App\Tables\Builders\Admin;

use App\Models\Service;
use LaravelEnso\Tables\app\Services\Table;
// Log cass su dung de log info
use Illuminate\Support\Facades\Log;

class ServiceTable extends Table
{
    protected $templatePath = __DIR__.'/../../Templates/Admin/services.json';

    public function query() {
        if(env('APP_DEBUG', false) == true) {
            Log::info("PartnerTable Query");
        }
        return Service::select(\DB::raw('
            services.id as dtRowId,
            services.title,
            services.status,
            services.created_at
        '));

    }
}


