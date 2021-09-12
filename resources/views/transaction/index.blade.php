@extends('layouts.backend')

@section('content')
<div class="container pt-4">
    <h4 class="h4-responsive mb-4">Transactions</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Description</th>
                <th>User</th>
                <th>Amount</th>
                <th>Transaction ID</th>
                <th>Package Name</th>
                <th>Billing Name</th>
                <th>Payment Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->title }}</td>
                <td>{{ $transaction->user->name }}</td>
                <td>{{ $transaction->amount }}</td>
                <td>{{ $transaction->payment_id }}</td>
                <td>{{ $transaction->package_name }}</td>
                <td>{{ $transaction->billing_name }}</td>
                <td>
                    @if($transaction->payment_status)
                    <div class="badge bg-primary">Completed</div>
                    @else
                    <div class="badge bg-danger">Uncomplete</div>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($transactions->hasPages())
    <div class="d-flex justify-content-end">
        {{ $transactions->links() }}
    </div>
    @endif
</div>
@endsection
