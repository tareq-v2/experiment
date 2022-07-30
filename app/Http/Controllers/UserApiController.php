<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserApiController extends Controller
{
    public function __construct(){
        $this->middleware('api');
    }
    public function index(){
        $UserData = DB::table('users')->get();
        return response()->json([$UserData, 200]);
    }
    public function show($id){
        $UserData = User::findOrFail($id);
        return response()->json([$UserData, 200]);
    }
    public function update(Request $request, $id){
        $UserData = User::findOrFail($id);
        $UserData->name = $request->name;
        $UserData->email = $request->email;
        $UserData->save();
        return response()->json([$UserData, 200]);
    }
    public function create(){
        $data = User::create([
            'name' => request()->name,
            'email' => request()->email,
            'password' => "ssssss",
            'created_at' => Carbon::now(),
        ]);
        return response()->json([$data, 200]);
    }

    public function destroy($id){
        $data = User::findOrFail($id)->delete();
        return response()->json([$data, 200]);
    }

    public function userlist(){
        $client = new Client();
        $response = $client->request('POST', 'https://targetUrl.com', [
            'form_params' => [
                'email' => 'email',
                'password' => 'password',
            ]
        ]);

        $data = json_decode($response->getBody(), true);
        $token = $data['token'];

        $userlist = $client->request('GET', 'https://targetUrl.com', [

            'headers' =>
            [
                'Authorization' => "Bearer {$token}"
            ]

        ]);

        $lists =  json_decode($userlist->getBody(), true)['data'];

        return view('api-users', compact('lists'));
    }
}
