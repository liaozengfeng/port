<!-- Table -->
<table class="table">
    <tr>
        <td>news ID</td>
        <td width="100">news names</td>
        <td width="150">news desc</td>
        <td>news connect</td>
        <td>news cart</td>
        <td>admin</td>
        <td>operation</td>
    </tr>
    @foreach($data as $v)
        <tr>
            <td>{{ $v['n_id'] }}</td>
            <td>{{ $v['n_name'] }}</td>
            <td>{{ $v['n_desc'] }}</td>
            <td>{{ $v['n_connect'] }}</td>
            <td>{{ $v['c_name'] }}</td>
            <td>{{ $v['a_name'] }}</td>
            <td><a href="javascript:;" class="del" n_id="{{ $v['n_id'] }}">delete</a></td>
        </tr>
    @endforeach
</table>
{{ $data->links() }}