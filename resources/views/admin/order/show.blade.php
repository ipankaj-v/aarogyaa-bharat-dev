@extends('admin.layout.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Order Details</h1>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Order #{{ $order->id }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Customer:</strong> {{ $order->customer->name }}</p>
                <p><strong>Amount:</strong> {{ $order->amount }}</p>
                <p><strong>Status:</strong> {{ $order->status->name }}</p>
                <p><strong>Created At:</strong> {{ $order->created_at }}</p>

                <!-- Status Update Form -->
                <form action="{{ route('admin.order.updateStatus', $order->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="status_id">Change Status</label>
                        <select name="status_id" id="status_id" class="form-control">
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}" {{ $status->id == $order->status_id ? 'selected' : '' }}>
                                    {{ $status->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </form>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.order.index') }}" class="btn btn-secondary">Back to Orders</a>
            </div>
        </div>
    </section>
</div>
@endsection
