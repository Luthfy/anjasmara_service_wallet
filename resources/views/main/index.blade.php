@extends('layouts.main')
{{-- @dd($datas) --}}
@section('container')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="makePayout" method="POST">
                @csrf
                <h2 class="text-center mb-3">Make Payout</h2>
                <label for="external_id">external_id</label>
                <input type="text" class="form-control mb-3" name="exid" id="external_id">
                <label for="amount">Amount</label>
                <input type="text" class="form-control mb-3" name="amount" id="amount">
                <label for="email">Email</label>
                <input type="text" class="form-control mb-3" name="email" id="email">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection