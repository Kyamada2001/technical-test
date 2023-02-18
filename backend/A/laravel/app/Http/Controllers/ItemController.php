<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

class ItemController extends Controller
{
    public function insert(Request $request)
    {
        /* 
        登録API実行コマンド：
        $ curl -X POST -d "name=apple" -d "price=200" http://0.0.0.0:9001/api/items/insert
        */
        try {
            DB::beginTransaction();
            $item = new Item();
            $item->fill($request->all());
            Log::info($item);
            $item->save();
            DB::commit();

            return response()->json([
                'message' => 'success',
            ], 200);
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e);
            return response()->json([
                'message' => 'error'
            ], 500);
        }
    }

    public function fetchItems()
    {
        /* 
        一覧API実行コマンド：
        $ curl -X GET http://0.0.0.0:9001/api/items
        */
        try{
            $items = Item::get('name', 'price')->toArray();
            return response()->json($items, 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'error'
            ], 500);
        }
    }
}
