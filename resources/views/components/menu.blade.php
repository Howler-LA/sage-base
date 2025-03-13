@props([
  'name' => null,
  'inactive' => '',
  'active' => '',
])

@php($menu = Navi::build($name))

@if ($menu->isNotEmpty())
  <ul {{ $attributes }}>
    @foreach ($menu->all() as $item)
      <li @class([
        'group relative',
        // 'hover:bg-foreground/5',
        'rounded-lg',
        'py-1 px-4',
        'flex items-center gap-2',
        $item->classes,
        $inactive => ! $item->active,
        $active => $item->active,
      ])>
        <a class="leading-10 !no-underline" href="{{ $item->url }}">
          {{ $item->label }}
        </a>        

        @if ($item->children)
          <x-lucide-chevron-down class="h-4 w-4 stroke-2" />
          <ul 
            @class([
              'flex translate-y-1 flex-col absolute ring-1 ring-foreground/10 top-full rounded bg-background shadow-2xl -ml-4',
              'transition ease-in-out duration-300',
              'opacity-0 invisible',
              'group-hover:translate-y-0',
              'group-hover:opacity-100',
              'group-hover:visible',
            ])
          >
            @foreach ($item->children as $child)
              <li @class([
                'group/link',
                'border-b last:border-0 border-foreground/10',
                $child->classes,
                $inactive => ! $child->active,
                $active => $child->active,
              ])>
                <a 
                  class="leading-10 py-1 flex gap-4 justify-between px-4 !no-underline whitespace-nowrap items-center" 
                  href="{{ $child->url }}"
                >
                  {{ $child->label }}
                  <x-lucide-arrow-right 
                    @class([
                      'h-4 w-4 stroke-2 opacity-0 -translate-x-1 transition-all ease-in',
                      'group-hover/link:opacity-100 group-hover/link:translate-x-0'
                    ]) 
                  />
                </a>
              </li>
            @endforeach
          </ul>
        @endif
      </li>
    @endforeach
  </ul>
@endif
