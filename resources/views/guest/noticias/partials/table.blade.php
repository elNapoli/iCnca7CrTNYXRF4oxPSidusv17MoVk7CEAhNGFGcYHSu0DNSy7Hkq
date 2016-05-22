
            <table id="tableNoticias" class="table cell-border table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($noticias as $item)
                    <tr>
                        @if($item->foto == 'path' or $item->foto == '')
                            <td id="td1"><img id="img2" src="http://cdn.abclocal.go.com/content/kfsn/images/cms/26184_1280x720.jpg" alt="..." hspace="0"></td>
                        @else
                            <td><img id="img2" src="{{$item->foto}}" alt="..." hspace="0"></td>
                        @endif
                        <td id="td2"> 
                        <div class="caption">
                            <br>
                            <a href="noticias-view/{{$item->id}}"><p>{{$item->titulo}}</p></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


