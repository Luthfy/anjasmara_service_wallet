@extends('layouts.main')
{{-- @dd($wallet->user->name) --}}
@section('container')
    <div class="row justify-content-center">
        <div class="col-md-6 mb-3">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h2>{{ $wallet->user->name }}</h2>
                    <h5 class="card-title">Saldo: {{ $wallet->balance_wallet }}</h5>
                    <h5 class="card-title">Poin: {{ $wallet->poin_wallet }}</h5>
                    <a href="/api/wallet" class="btn btn-primary">to wallet</a>
                </div>
            </div>
        </div>
    </div>
@endsection