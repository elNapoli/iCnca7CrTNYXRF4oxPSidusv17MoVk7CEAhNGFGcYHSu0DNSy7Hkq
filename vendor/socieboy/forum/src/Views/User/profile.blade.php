@extends($template)
@section($content)

<div class="container text-center" style="margin-top: 20px;">

    @include('Forum::Partials.avatar')

    <h3>{{ $user->{config('forum.user.username')} }}</h3>
    <p>Miembro desde {{ $user->created_at->diffForHumans() }}</p>
    <a href="{{ route('forum') }}">Regresar al foro</a>
</div>

@stop