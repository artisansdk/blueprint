<div class="panel panel-default panel-resource-group">
    <div class="panel-heading">
        <h2 class="panel-title" id="{{ $group->elementId }}">
            {{ $group->name }}
        </h2>
    </div>
    <div class="panel-body">
        {!! $group->descriptionHtml !!}
        @foreach($group->resources as $resource)
            @include('blueprint::resource', ['resource' => $resource])
        @endforeach
    </div>
</div>
