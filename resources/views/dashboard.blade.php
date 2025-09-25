@extends('layouts.app')

@section('header', 'Dashboard')

@section('content')
<div class="px-4 sm:px-0">
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-8">
        <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate text-sm font-medium text-gray-500">Total Products</dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $totalProducts }}</dd>
        </div>

        <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate text-sm font-medium text-gray-500">Total Categories</dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $totalCategories }}</dd>
        </div>

        <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate text-sm font-medium text-gray-500">Total Orders</dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $totalOrders }}</dd>
        </div>

        <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate text-sm font-medium text-gray-500">Total Revenue</dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">${{ number_format($totalRevenue, 2) }}</dd>
        </div>
    </div>

    <!-- Orders by Status -->
    <div class="mb-8 rounded-lg bg-white shadow">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Orders by Status</h3>
            <div class="grid grid-cols-2 gap-4 sm:grid-cols-5">
                @foreach(['pending' => 'Pending', 'processing' => 'Processing', 'shipped' => 'Shipped', 'delivered' => 'Delivered', 'cancelled' => 'Cancelled'] as $key => $label)
                    <div class="text-center">
                        <div class="text-2xl font-bold text-gray-900">{{ $ordersByStatus[$key] ?? 0 }}</div>
                        <div class="text-sm text-gray-500">{{ $label }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
        <!-- Recent Orders -->
        <div class="rounded-lg bg-white shadow">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Recent Orders</h3>
                <div class="flow-root">
                    <ul role="list" class="-my-5 divide-y divide-gray-200">
                        @forelse($recentOrders as $order)
                            <li class="py-4">
                                <div class="flex items-center justify-between">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-sm font-medium text-gray-900">{{ $order->order_number }}</p>
                                        <p class="truncate text-sm text-gray-500">{{ $order->customer_name }}</p>
                                    </div>
                                    <div class="ml-4 flex-shrink-0 flex items-center space-x-2">
                                        <span class="inline-flex items-center rounded-full px-2 py-1 text-xs font-medium {{ $order->getStatusBadgeClass() }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                        <span class="text-sm font-medium text-gray-900">${{ number_format($order->total, 2) }}</span>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="py-4 text-center text-gray-500">No recent orders</li>
                        @endforelse
                    </ul>
                </div>
                @if($recentOrders->count() > 0)
                    <div class="mt-6">
                        <a href="{{ route('orders.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                            View all orders
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Low Stock Products -->
        <div class="rounded-lg bg-white shadow">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Low Stock Products</h3>
                <div class="flow-root">
                    <ul role="list" class="-my-5 divide-y divide-gray-200">
                        @forelse($lowStockProducts as $product)
                            <li class="py-4">
                                <div class="flex items-center justify-between">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-sm font-medium text-gray-900">{{ $product->name }}</p>
                                        <p class="truncate text-sm text-gray-500">{{ $product->category->name }}</p>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <span class="inline-flex items-center rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-800">
                                            {{ $product->stock }} in stock
                                        </span>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="py-4 text-center text-gray-500">All products are well stocked</li>
                        @endforelse
                    </ul>
                </div>
                @if($lowStockProducts->count() > 0)
                    <div class="mt-6">
                        <a href="{{ route('products.index') }}?stock=low" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                            View all low stock products
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
