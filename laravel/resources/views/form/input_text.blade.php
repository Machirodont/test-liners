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
    <label for="{{$name}}" class="block text-sm font-medium text-gray-700">{{$label}}</label>
    <input type="text" id="{{$name}}" name="{{$name}}" value="{{ $value }}" required class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:outline-none">
    @error($name)
    <div class="error">{{ $message }}</div>
    @enderror
</div>
