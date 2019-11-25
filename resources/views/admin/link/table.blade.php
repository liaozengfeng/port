<!-- Table -->
        <table class="table">
            <tr>
                <td>link ID</td>
                <td>link names</td>
                <td>admin</td>
                <td>operation</td>
            </tr>
            @foreach($data as $v)
                <tr>
                    <td>{{ $v['l_id'] }}</td>
                    <td><a href="{{ $v['l_url'] }}">{{ $v['l_name'] }}</a></td>
                    <td>{{ $v['a_name'] }}</td>
                    <td><a href="javascript:;" class="del" l_id="{{ $v['l_id'] }}">delete</a></td>
                </tr>
            @endforeach
        </table>
        {{ $data->links() }}
