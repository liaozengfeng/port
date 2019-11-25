 <!-- Table -->
            <table class="table">
                <tr>
                    <td>nav ID</td>
                    <td>nav names</td>
                    <td>admin</td>
                    <td>operation</td>
                </tr>
                @foreach($data as $v)
                    <tr>
                        <td>{{ $v['n_id'] }}</td>
                        <td><a href="{{ $v['n_url'] }}">{{ $v['n_name'] }}</a></td>
                        <td>{{ $v['a_name'] }}</td>
                        <td><a href="javascript:;" class="del" n_id="{{ $v['n_id'] }}">delete</a></td>
                    </tr>
                @endforeach
            </table>
            {{ $data->links() }}
