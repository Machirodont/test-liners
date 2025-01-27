@php
    /** @var string $label */
    /** @var string $name */
    /** @var string $value */
    /** @var bool $withNull */
    /** @var string[] $options */

    if(!isset($value)){
        $value = isset($model)
        ? old($name, $model->{$name})
        : old($name);
    }
@endphp

<div class="mb-4">
    <label for="{{$name}}" class="block text-sm font-medium text-gray-700">{{$label}}</label>
    <select id="{{$name}}" name="{{$name}}" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none">
        @if(isset($withNull) && $withNull)
            <option value="" @selected($value === null)>Не выбрано</option>
        @endif
        @foreach($options as $optionValue => $optionTitle)
            <option value="{{ $optionValue }}" @selected($value === $optionValue)>
                {{ $optionTitle }}
            </option>
        @endforeach
    </select>
    @error($name)
    <div class="error">{{ $message }}</div>
    @enderror
</div>
