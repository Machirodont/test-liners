@php
    /** @var string $label */
    /** @var string $name */
    /** @var string $value */
        if(!isset($value)){
            $value = isset($model)
            ? old($name, $model->{$name})
            : old($name);
        }
@endphp

<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        required
        rows="4"
        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        {{ $value }}
    </textarea>

    @error($name)
    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
    @enderror
</div>
