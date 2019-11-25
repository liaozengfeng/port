@foreach($news_info as $v)
    <div>
        <img src="{{ $v['img'] }}" alt="" style="margin: 8px; width: 196px; float: left; height: 209px; ">
    </div>
    <div style="padding-top:10px;">
        <span style="font-size:14px;"><strong>{{ $v['title'] }}</strong></span>
        <br>
    </div>
    <div></div>
    <div>
        <span style="font-size:14px;"><strong>{{ $v['content'] }}</strong></span>
        <br>
        <span>发布时间: {{ $v['pdate'] }}</span>
    </div>
    <div class="clear">

    </div>
@endforeach