<div class="parameters">
    <table>
        <thead>
        <tr>
            <td colspan="2">
                <span class="method {{ $action->methodLower }}">{{ $action->method }}</span>
                <span class="uri">
                    <span class="hostname">{{ $blueprint->host }}</span>{!! urldecode($action->colorizedUriTemplate) !!}
                </span>
            </td>
        </tr>
        </thead>
        <tbody>
        @foreach ($action->parameters as $parameter)
            <tr>
                <td width="30%">
                    <strong>{{ $parameter->name }}</strong>
                    &nbsp;<code>{{$parameter->type}}</code>
                    @if ($parameter->required)
                        &nbsp;({{ $parameter->required }})
                    @endif
                </td>
                <td>
                    {!! $parameter->descriptionHtml !!}
                    @if ($parameter->defaultValue)
                        <p><span class="text-muted">Default: {{ $parameter->defaultValue }}</span></p>
                    @endif
                    @if ($parameter->example)
                        <p><span class="text-muted">Example: {{ urldecode($parameter->example) }}</span></p>
                    @endif
                    @if (!empty($parameter->values))
                        <p class="choices">
                            <strong>Choices:</strong>&nbsp;
                            @foreach($parameter->values as $value)
                                <code>{{ $value }}</code>&#32;
                            @endforeach
                        </p>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
