@extends('layouts.base')

@section('content')
    <h1>Your Cart</h1>

    @if (session('cart'))
        @php
            $grandTotal = 0;
        @endphp

        <table border="1" class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach (session('cart') as $id => $item)
                    @php
                        $itemTotal = $item['price'] * $item['quantity'];
                        $grandTotal += $itemTotal; // Add item total to grand total
                    @endphp
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" />
                                <button type="submit">Update</button>
                            </form>
                        </td>
                        <td>${{ number_format($item['price'], 2) }}</td>
                        <td>${{ number_format($itemTotal, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" align="right"><strong>Grand Total:</strong></td>
                    <td><strong>${{ number_format($grandTotal, 2) }}</strong></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    @else
        <p>Your cart is empty.</p>
    @endif
@endsection
