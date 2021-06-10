@props(['trigger'])

<div x-data="{ show: false }" @click.away="show = false">

    {{-- Trigger --}}
    <div @click="show = !show">
        {{ $trigger }}
    </div>

    {{-- Links --}}
    <div x-show="show" class="absolute bg-gray-100 max-h-52 mt-2 overflow-auto py-2 rounded-xl w-full z-50" style="display: none">
        {{ $slot }}
    </div>

</div>
