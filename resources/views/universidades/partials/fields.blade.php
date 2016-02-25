<!-- Nav tabs -->
<ul class="nav nav-tabs" id="tabs">
    @if(!isset($infoUniversidad))
    @include('universidades.partials.tab_head')
    @endif
</ul>

<!-- Tab panes -->
<div class="tab-content">

    @include('universidades.partials.tab_content')

</ul>
</div>