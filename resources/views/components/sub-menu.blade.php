@props([
  'name' => null,
  'inactive' => 'hover:text-foreground/75',
  'active' => 'text-foreground/75',
])

@php($menu = Navi::build($name))

@if ($menu->isNotEmpty())
  <ul {{ $attributes->twMerge(['border-t border-foreground/50 pt-min']) }}>
    @foreach ($menu->all() as $item)
      <li @class([
        'text-body-2',
        'font-button',
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
