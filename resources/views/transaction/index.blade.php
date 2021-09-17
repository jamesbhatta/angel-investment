@extends('layouts.backend')

@section('content')
<x-backend-heading>
    <h3>Transactions</h3>
    <x-slot name="navigation">
        <li class="breadcrumb-item active" aria-current="page">Transactions</li>
    </x-slot>
</x-backend-heading>

<x-backend-table>
    <x-slot name="thead">
        <th>Description</th>
        <th>User</th>
        <th>Amount</th>
        <th>Transaction ID</th>
        <th>Package Name</th>
        <th>Billing Name</th>
        <th>Payment Status</th>
    </x-slot>
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
</x-backend-table>

@if($transactions->hasPages())
<div class="d-flex justify-content-end">
    {{ $transactions->links() }}
</div>
@endif
</div>
@endsection
