
<ul>
    <a href="{{ url('forum') }}">
    <li>
        <span>
            <i class="glyphicon glyphicon-tags"></i>
            {{ trans('Forum::messages.all') }}
        </span>
    </li>
    </a>

    @foreach( $topic as $key => $topic)
        <a href="{{ route('forum.topic', $topic['id']) }}">
            <li>
                <span>
                    <i  class="glyphicon glyphicon-tags"
                        @if(isset($topic['color']))
                            style="background: {{ $topic['color'] }}"
                        @endif >
                    </i>
                    {{ $topic['nombre'] }}
                </span>
            </li>
        </a>
    @endforeach
    <a href="#!" data-toggle="modal" data-target="#create-topic-modal">
    <li>
        <span>
            <i class="glyphicon glyphicon-plus"></i>
            Nueva categoria
        </span>
    </li>
    </a>

</ul>







