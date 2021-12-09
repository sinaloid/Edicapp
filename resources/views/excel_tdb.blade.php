<table>
    <thead>
    <tr>
        <th>Désactivé pour le moment</th>
        <!--th>Email</th-->
    </tr>
    </thead>
    <tbody>
    @foreach($invoices as $invoice)
        <tr>
            <!--td>{{$invoice["name"]}}</td>
            <td>{{$invoice["email"]}}</td-->
        </tr>
    @endforeach
    </tbody>
</table>