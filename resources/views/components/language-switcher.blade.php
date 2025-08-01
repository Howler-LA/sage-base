@props([
  'name' => null,
])

@php($menu = Navi::build($name))

@if ($menu->isNotEmpty())
  <div class="relative group">
    <x-button 
      :label="weglot_get_current_language()"
      href="#"
      size="sm"
      variant="outline"
      class="capitalize"
      icon="lucide-arrow-down"
    />
    <div class="invisible opacity-0 group-hover:visible group-hover:opacity-100 top-full absolute -mt-px pt-em z-30">
      <ul data-theme="White" class="drop-shadow-2xl bg-background text-foreground rounded -ml-btn-horiz-l transition ease-in-out duration-300 translate-y-min group-hover:translate-y-0">
        @foreach ($menu->all() as $item)
          <li @class([
            'whitespace-nowrap',
            $item->classes,
            $inactive => ! $item->active,
            $active => $item->active,
          ])>
            <a 
              class="px-btn-horiz-l py-btn-vert-l block"
              href="{{ $item->url }}"
            >
              {{ $item->label }}
            </a>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
@endif
{{-- 
<div class="invisible opacity-0 group-hover:visible group-hover:opacity-100 top-full absolute -mt-px pt-em">
<ul data-theme="White" class="drop-shadow-2xl bg-background text-foreground rounded -ml-min w-72 transition ease-in-out duration-300 translate-y-min group-hover:translate-y-0"> --}}