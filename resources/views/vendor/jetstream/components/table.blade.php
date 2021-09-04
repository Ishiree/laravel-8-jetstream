<table {{ $attributes->merge(['class' => 'table-fixed w-full']) }} >
    <thead>
        <tr class="text-left font-bold">
            {{$header}}
        </tr>
    </thead>
    <tbody>
        {{$slot}}
    </tbody>
</table>