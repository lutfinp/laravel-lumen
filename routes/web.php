<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'penjualan'], function () use ($router) {
    $router->get('/', function () {
        return response()->json([
            [
                "id" => "1",
                "nomor" => "SALE/0001",
                "customer" => "Joko"
            ],
            [
                "id" => "1",
                "nomor" => "SALE/0001",
                "customer" => "Joko"
            ],
            [
                "id" => "1",
                "nomor" => "SALE/0001",
                "customer" => "Joko"
            ],
            [
                "id" => "1",
                "nomor" => "SALE/0001",
                "customer" => "Joko"
            ],
            [
                "id" => "1",
                "nomor" => "SALE/0001",
                "customer" => "Joko"
            ],
            [
                "id" => "1",
                "nomor" => "SALE/0001",
                "customer" => "Joko"
            ],
        ]);
    });
    $router->get('/{id}', function ($id) {
        return response()->json(['data' => [
                "id" => "1",
                "nomor" => "SALE/0001",
                "customer" => "Joko",
                "total" => 2000000
        ]]);
    });
    $router->post('/', function (){
        return response()->json([
            'msg' => "berhasil",
            "id" => 4
        ]);
    });
    $router->put('/{id}', function (Request $request, $id) {
        $nomor = $request->input('nomor');
        return response()->json(['data' => [
                "id" => $id,
                "nomor" => $nomor,
                "customer" => "Joko",
                "total" => 2000000
        ]]);
    });
    $router->delete('/{id}', function ($id) {
        return response()->json(['msg' => "berhasil delete"]);
    });
    $router->get('/{id}/confirm', function (Request $request, $id) {
        $user = $request->user();
        Log::debug('<<<<<<<<<<');
        Log::debug($user);
        if($user == null){
            return response()->json(['error' => 'Unauthorized'], 401, ['X-Header-One' => 'Header Value']);
        }
        return response()->json(['msg' => "berhasil confirm"]);
    });
    $router->get('/{id}/send-email', function (Request $request, $id) {
        $user = $request->user();
        Mail::raw('This is the email body.', function ($message) {
            $message->to('nofalpratamalutfi@gmail.com')
                ->subject('Lumen email test');
            });
    
    
        return response()->json(['msg' => "berhasil kirim email"]);
    });
});
