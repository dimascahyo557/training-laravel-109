<table>
    <tr>
        <td colspan="3">
            Data Transaksi
        </td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td>Id</td>
        <td>Product</td>
        <td>Transaction Date</td>
        <td>Price</td>
    </tr>
    @foreach ($transactions as $transaction)
        <tr>
            <td>{{ $transaction->id }}</td>
            <td>{{ $transaction->product->name }}</td>
            <td>{{ $transaction->trx_date }}</td>
            <td>{{ $transaction->price }}</td>
        </tr>
    @endforeach
</table>