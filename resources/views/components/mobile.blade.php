@props([
  'name' => null,
])

@php($menu = Navi::build($name))

@if ($menu->isNotEmpty())
  <nav {{ $attributes }}>
    @foreach ($menu->all() as $item)
      <div x-data="{subMenu:false}" class="border-b border-foreground/20 last:border-0">
        <{{ $item->children ? 'button' : 'a' }} 
          @class([
            '!no-underline',
            'cursor-pointer',
            'px-xs sm:px-sm md:px-md py-5 w-full',
            'flex justify-between items-center',
          ])
          @if($item->children)@click="subMenu=!subMenu"@endif
          href="{{ $item->url }}"
        >
          <span>{{ $item->label }}</span>
          <div class="size-sm rounded-full border border-foreground flex items-center justify-center">
            @if($item->children)
              <div class="transition ease duration-200" :class="subMenu ? 'rotate-45' : 'rotate-0'"><x-lucide-plus class="flex-none" /></div>
            @endif
            @if(!$item->children)<x-lucide-arrow-right class="flex-none" />@endif
          </div>
        </{{ $item->children ? 'button' : 'a' }}>
        @if($item->children)
          <div x-show="subMenu" data-theme="light" class="bg-background text-foreground">
            @foreach ($item->children as $child)
              <a 
                @class([
                  '!no-underline',
                  'cursor-pointer',
                  'border-b border-foreground/50 last:border-0',
                  'px-xs sm:px-sm md:px-md py-5 w-full',
                  'flex justify-between items-center',
                ])
                href="{{ $child->url }}"
              >
                <span>{{ $child->label }}</span>
                <div class="size-sm rounded-full border border-foreground flex items-center justify-center">
                  <x-lucide-arrow-right />
                </div>
              </a>
            @endforeach
          </div>
        @endif
      </div>
    @endforeach
  </nav>
@endif