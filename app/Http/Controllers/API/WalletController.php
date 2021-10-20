<?php

namespace App\Http\Controllers\API;

use App\Models\Wallet;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return response()->json([
        //     'status' => true,
        //     'message' => 'success',
        //     'data' => []
        // ]);
        $userWallet = Auth::id();
        $wallet = Wallet::where('user_uuid', '$userWallet');
    }

    public function webview() {
        $data = Wallet::all();
        return view('wallets.webview', [
            'wallet' => $data,
            'header' => 'Wallet'
        ]);
    }

    public function walletGet(Wallet $wallet)
    {
        return view('wallets.index', [
            'title' => 'Wallet',
            'wallet' => $wallet
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function walletCreate(Wallet $wallet)
    {
        $success = $wallet->create([
            'uuid' => Str::uuid(),
            'pin' => bcrypt(request('pin')),
            'user_uuid' => request('user_uuid'),
        ]);

        if($success) {
            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => $success
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'data not found',
                'data' => $success
            ]);
        }
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
