@props([
  'name' => null,
  'inactive' => 'hover:text-blue-500',
  'active' => 'text-blue-500',
])

@php($menu = Navi::build($name))

<div {{ $attributes->twMerge(['absolute inset-x-0 top-full shadow-lg']) }}>
  <div class="bg-background border-t border-foreground/50">
    <ul class="divide-y divide-foreground/50">
      @foreach ($menu->all() as $item)
        <li x-data="{show:false}">
          <div class="flex justify-between items-center py-em px-med">
            <a class="font-bold text-button" href="{{ $item->url }}">
              {{ $item->label }}
            </a>
            @if ($item->children)
              <div 
                @click="show=!show" 
                class="size-9 flex items-center justify-center border border-foreground rounded-full transition-all ease" 
                :class="show ? 'rotate-180 bg-foreground text-background' : 'bg-background text-foreground'"
              >
                <x-lucide-arrow-down class="size-6 stroke-1"/>
              </div>
            @endif
          </div>
          @if ($item->children)
            <ul data-theme="White" x-show="show" class="bg-background text-foreground divide-y divide-border">
              @foreach ($item->children as $child)
                <li @class([
                  'py-em px-med',
                  $child->classes,
                  $inactive => ! $child->active,
                  $active => $child->active,
                ])>
                  <a href="{{ $child->url }}">
                    <x-body class="font-bold">{{ $child->label }}</x-body>
                  </a>
                </li>
              @endforeach
            </ul>
          @endif
        </li>
      @endforeach
    </ul>
  </div>
</div>

{{-- @if ($menu->isNotEmpty())
  <ul {{ $attributes }}>
    @foreach ($menu->all() as $item)
      <li @class([
        $item->classes,
        $inactive => ! $item->active,
        $active => $item->active,
      ])>
        <a href="{{ $item->url }}">
          {{ $item->label }}
        </a>

        @if ($item->children)
          <ul>
            @foreach ($item->children as $child)
              <li @class([
                $child->classes,
                $inactive => ! $child->active,
                $active => $child->active,
              ])>
                <a href="{{ $child->url }}">
                  {{ $child->label }}
                </a>
              </li>
            @endforeach
          </ul>
        @endif
      </li>
    @endforeach
  </ul>
@endif
 --}}