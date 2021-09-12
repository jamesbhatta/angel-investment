@extends('layouts.app')

@section('content')
<div class="container pt-4">
    <table class="table">
        <thead>
            <tr>
                <th>Description</th>
                <th>Amount</th>
                <th>Package Name</th>
                <th>Billing Name</th>
                <th>Payment Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
            <tr>
                <td>{{ $invoice->title }}</td>
                <td>{{ $invoice->amount }}</td>
                <td>{{ $invoice->package_name }}</td>
                <td>{{ $invoice->billing_name }}</td>
                <td>
                    @if($invoice->payment_status)
                    <div class="badge bg-primary">Completed</div>
                    @else
                    <div class="badge bg-danger">Uncomplete</div>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($invoices->hasPages())
    <div class="d-flex justify-content-end">
        {{ $invoices->links() }}
    </div>
    @endif
</div>
@endsection
