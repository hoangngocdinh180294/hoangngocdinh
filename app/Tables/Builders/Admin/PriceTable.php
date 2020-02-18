<?php
namespace App\Tables\Builders\Admin;

use App\Models\Price;
use LaravelEnso\Tables\app\Services\Table;
// Log cass su dung de log info
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class PriceTable extends Table
{
    protected $templatePath = __DIR__.'/../../Templates/Admin/prices.json';

    public function query() {
        if(env('APP_DEBUG', false) == true) {
            Log::info("PriceTable Query");
        }
        return Price::select(\DB::raw('
        prices.id as dtRowId,
        prices.title,
        prices.price,
        prices.created_at
    '));
    }
}
