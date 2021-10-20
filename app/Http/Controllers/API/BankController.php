<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Bank;
use Ramsey\Uuid\Uuid;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return response()->json ([
        //     'status' => true,
        //     'message' => 'success',
        //     'data' => []
        // ]);
        // $banks = Bank::all()->get();
        $data =  Bank::all();
        return view('bank', ['banks'=>$data]);
        // return view('banks', [
        //     "name_bank" => "Bank::all()"
        // ]);
    }

    public function webview() {
        $data = Bank::all();
        return view('banks.webview', [
            'banks' => $data,
            'header' => 'Bank'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uuid = Str::uuid();
        // dd($uuid);
        // dd($request->nameBank);
        DB::table('banks')->insert([
            'uuid' => $uuid->toString(),
            'name_bank' => $request->nameBank,
            'code_bank' => $request->codeBank,
            'number_bank' => $request->numberBank,
            'method_bank' => $request->methodBank
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
