@props(['tag'])
<{{$tag}} {!! $attributes->toHtml() !!}>
    {{$slot}}
</{{$tag}}>
