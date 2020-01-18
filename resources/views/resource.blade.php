@if(!in_array($resource->name, ['Collection', 'Resource']))
    <h3 id="{{ $resource->elementId }}">
        {{ $resource->name }}
    </h3>
@endif
@if( ! empty($resource->descriptionHtml) )
    {!! $resource->descriptionHtml !!}
@endif
@foreach($resource->actions as $action)
    @include('blueprint::action')
@endforeach
