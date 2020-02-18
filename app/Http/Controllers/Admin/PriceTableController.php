<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tables\Builders\Admin\PriceTable;
use LaravelEnso\Tables\app\Traits\Datatable;
use Illuminate\Support\Facades\Log;
use App\Forms\Builders\Admin\PostForm;
use App\Models\Price;
use App\Http\Requests\Admin\ValidatePostRequest;

class PriceTableController extends Controller
{
    use Datatable;
    protected $tableClass = PriceTable::class;

    public function destroy(Price $price)
    {
        $price->delete();
        return [
            'message' => __('The Price was successfully deleted'),
            'redirect' => 'admin.prices',
        ];
    }

    public function create(PostForm $form)
    {
        return ['form' => $form->create()];
    }

    public function store(ValidatePostRequest $request)
    {
        if (env('APP_DEBUG', false) == true) {
            Log::info(' PriceTableController-> store');
        }
        $price = Price::create($request->all());

        return [
            'message' => __('The price was successfully created'),
            'redirect' => 'admin.price.edit',
            'param' => ['price' => $price->id],
        ];
    }
    public function show(Price $price) {
        return ['price', $price];
    }

    public function edit(Price $price, PostForm $form) {
        return ['form' => $form->edit($price)];
    }
    /*
    public function update(Post $post) {
        return [];
    }
    */
}
