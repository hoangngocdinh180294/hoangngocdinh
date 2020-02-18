<?php
namespace App\Tables\Builders\Admin;

use App\Models\Employee;
use LaravelEnso\Tables\app\Services\Table;
// Log cass su dung de log info
use Illuminate\Support\Facades\Log;

class EmployeeTable extends Table
{
    protected $templatePath = __DIR__.'/../../Templates/Admin/employees.json';

    public function query() {
        if(env('APP_DEBUG', false) == true) {
            Log::info("EmployeeTable Query");
        }
        return Employee::select(\DB::raw('
           id as dtRowId,
           name,
           email,
           phone,
           position
        '));

    }
}


