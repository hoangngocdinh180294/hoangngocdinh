<?php
namespace App\Tables\Builders\Admin;

use App\Models\Testimonial;
use LaravelEnso\Tables\app\Services\Table;
// Log cass su dung de log info
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class TestimonialTable extends Table
{
    protected $templatePath = __DIR__.'/../../Templates/Admin/testimonials.json';

    public function query() {
        if(env('APP_DEBUG', false) == true) {
            Log::info("TestimonialTable Query");
        }

        //return DB::table('posts')->join('users', 'posts.author_id','=', 'users.id')
        //    ->select('posts.id as dtRowId', 'users.name as tacgia', 'posts.title as title');

        //return DB::table('posts')->select(['id as dtRowId','author_id','title']);
        /*
        return Post::with('author')->select(\DB::raw('
            id as dtRowId,
            author_id,
            title
        '));
        */
        return Testimonial::select(
                'id as dtRowId',
                'author',
                'created_at');
    }
}
