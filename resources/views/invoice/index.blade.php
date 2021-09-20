@extends('layouts.app')

@section('content')
<div class="container pt-4">
    <div class="table-responsive">
        <table class="table table-lg invoices-table">
            <thead class="bg-primary text-white">
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
    </div>

    @if($invoices->hasPages())
    <div class="d-flex justify-content-end">
        {{ $invoices->links() }}
    </div>
    @endif
</div>
@endsection

@push('styles')
<style>
    .table.table-lg tr th,
    .table.table-lg tr td {
        padding: 1.3rem;
    }

    .invoices-table {
        letter-spacing: 0;
    }

    .invoices-table tr th {
        font-weight: 500;
    }

</style>
@endpush
