@props([
  'name' => null,
  'inactive' => 'hover:text-blue-500',
  'active' => 'text-blue-500',
])

@php($menu = Navi::build($name))

@if ($menu->isNotEmpty())
  <ul {{ $attributes }}>
    @foreach ($menu->all() as $item)
      <li @class([
        'flex flex-col gap-1',
        $item->classes,
        $inactive => ! $item->active,
        $active => $item->active,
      ])>
        <a 
          class="!no-underline font-medium border-b pb-4 block" 
          href="{{ $item->url }}"
        >
          {{ $item->label }}
        </a>

        @if ($item->children)
          <ul class="flex flex-col border-t border-inherit">
            @foreach ($item->children as $child)
              <li @class([
                'font-light flex items-center justify-between border-b border-foreground/20',
                $child->classes,
                $inactive => ! $child->active,
                $active => $child->active,
              ])>
                <a class="!no-underline py-4 block !no-underline" href="{{ $child->url }}">
                  {{ $child->label }}
                </a>
                <x-lucide-arrow-up-right class="opacity-50" />
              </li>
            @endforeach
          </ul>
        @endif
      </li>
    @endforeach
  </ul>
@endif
