@props([
  'name' => null,
  'inactive' => null,
  'active' => null,
])

@php($menu = Navi::build($name))

@if ($menu->isNotEmpty())
  <ul {{ $attributes->twMerge(['']) }}>
    @foreach ($menu->all() as $item)
      <li @class([
        'group',
        'text-body-2',
        'font-meta-text',
        'relative',
        'whitespace-nowrap',
        $item->classes,
        $inactive => ! $item->active,
        $active => $item->active,
      ])>
        <a href="{{ $item->url }}" class="flex items-center gap-1 hover:underline">
          <x-meta-text :message="$item->label" />
          @if ($item->children)
            <x-lucide-arrow-down />
          @endif    
        </a>

        @if ($item->children)
          <div class="opacity-0 invisible group-hover:opacity-100 group-hover:visible transition ease duration-300 absolute top-full pt-min z-10 left-0 -ml-em">
            <ul class="bg-foreground text-background px-em py-min rounded-card">
              @foreach ($item->children as $child)
                <li @class([
                  $child->classes,
                  $inactive => ! $child->active,
                  $active => $child->active,
                ])>
                  <a href="{{ $child->url }}" class="hover:underline block">
                    {{ $child->label }}
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
        @endif
      </li>
    @endforeach
  </ul>
@endif
