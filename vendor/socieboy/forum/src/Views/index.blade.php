@extends('Forum::Template.master')
@section('forum-content')

<div class="row mt">  
    <div class="col-lg-9 conversations">

        <ul>

            @forelse($conversations as $conversation)

                @include('Forum::Conversations.Partials.conversation')

            @empty

                @include('Forum::Partials.no-conversations')

            @endforelse

        </ul>


    </div>
    <div class="col-lg-3 topics">

         @include('Forum::Topics.index')

    </div>

    <div class="col-lg-offset-1 col-lg-11">

        {!! $conversations->render() !!}

    </div>
</div>                    


@stop

