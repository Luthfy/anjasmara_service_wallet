<?php

namespace App\Http\Controllers\API;

use App\Models\Bank;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class BankController extends Controller
{

    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('banks.index', [
            'title' => 'Banks',
            'banks' => Bank::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function bankCreate(Bank $bank)
    {
        $success = $bank->create([
            'uuid' => Str::uuid(),
            'name_bank' => request('name_bank'),
            'code_bank' => request('code_bank'),
            'number_bank' => request('number_bank'),
            'method_bank' => request('method_bank'),
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
    public function bankGet()
    {
        // return $bank->all();
        $response = $this->client->request(
            'GET',
            'https://api.github.com/repos/symfony/symfony-docs'
        );

        $content = $response->getContent();

        return $content;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bankIsDeleted(Bank $bank)
    {
        $success = $bank->trashed();
        if($success) {
            return response()->json([
                'status' => true,
                'message' => 'data has been deleted',
                'data' => $success
            ]); 
        }
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
