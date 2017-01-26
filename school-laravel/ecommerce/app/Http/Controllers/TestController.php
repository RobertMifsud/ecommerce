<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

use App\User as userModel;
use App\Items as itemsModel;

class TestController extends BaseController
{
    public function test() {
        testModel::create([
            "user" => 1,
            "test" => true,
        ]);

        return response(testModel::all());
    }

    public function kyle() {
        $recordResponse = testModel::create([
            "user" => 24533535353535536,
            "test" => false,
        ]);

        $previousRecord = testModel::where('user', 'Kyle')->with('items')->first();
        $previousRecord->user = 'Kyle';
        $previousRecord->save();

        return view('welcome')->with('kyle', $previousRecord);
    }

    public function createItem() {
        $createdRecord = itemsModel::create([
            'item_name' => 'Hello',
            'item_code' => '12345'
        ]);

        return response($createdRecord);
    }

    public function alterUser() {
        $user = userModel::first();
        $user->item_id = '588a24396bf4614e867ec514';

        $user->save();

        return response($user);
    }

    public function getUser() {
        $user = userModel::where('_id', '5889be256bf4614e873c9103')->with('items')->first();

        return view('hello.welcome', ['data' => $user]);
    }
}
