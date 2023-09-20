<div
    x-data="code('{{ $element->id() }}', {
        lineNumbers: {{ $element->lineNumbers ? 'true' : 'false' }},
        language: '{{ $element->language ?? 'js' }}',
        readonly: {{ $element->isReadonly() ? 'true' : 'false' }},
    })"
    {{ $element->attributes()
        ->except('x-on:change')
        ->merge(['class' => 'w-100 min-h-[300px] relative']) }}
>
</div>

<x-moonshine::form.input
    type="hidden"
    id="{{ $element->id() }}"
    name="{{ $element->name() }}"
    :attributes="$element->attributes()"
    value="{{ $element->value() ?? '' }}"
/>
