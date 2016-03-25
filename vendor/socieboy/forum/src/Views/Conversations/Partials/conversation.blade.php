<li>

    <div class="hidden-xs col-sm-2 text-center">

        @include('Forum::Partials.avatar', ['user' => $conversation->user])

    </div>

    <div class="col-xs-10 col-sm-8">
        <div class="hidden-xs topic2">
            <i  class="glyphicon glyphicon-tags"
                style="background: {{ $conversation->topicR->color }}">
            </i>

            {{--{{ $conversation->topic}}--}}

        </div>

        <a href="{{ route('forum.conversation.show', $conversation->slug) }}">

            <h3>{{ str_limit($conversation->title, 50) }}</h3>

        </a>


        @include('Forum::Conversations.Partials.timing-information')


    </div>

    <div class="col-xs-2">

            @include('Forum::Conversations.Partials.replies-counter')

    </div>

</li>

