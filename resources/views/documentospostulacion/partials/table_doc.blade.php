<table id="todo" class="table table-hover custom-check">
    <tbody>

        @foreach($nombresDoc as $key => $valor)

        <tr>
            <td>
                <span class="check">
                    @if($valor)
                    <input type="checkbox" class="checked" checked>
                    @else
                    <input type="checkbox" class="checked">

                    @endif
                </span>
                <a href="#!"> {{$key}}</a></span>

            </td>
        </tr>
        @endforeach

    </tbody>
</table>