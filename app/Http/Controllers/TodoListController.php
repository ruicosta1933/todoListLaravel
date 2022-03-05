<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\ListItem;

class TodoListController extends Controller
{
    public function index() {
        return view('welcome', ['listItems' => ListItem::where('is_completed', 0)->get()]);
    }

    public function markComplete($id) {

        $lisItem = ListItem::find($id);
        $lisItem->is_completed = 1;
        $lisItem->save();

        return redirect('/');
    }

    public function saveItem(Request $request){
        \Log::info(json_encode($request->all()));

        $newListItem = new ListItem;
        $newListItem->name = $request->listItem;
        $newListItem->is_completed = 0;
        $newListItem->save();

        return redirect('/');
    }
}
