@props([
  'name' => null,
  'inactive' => 'hover:text-foreground/75',
  'active' => 'text-foreground/75',
])

@php($menu = Navi::build($name))

@if ($menu->isNotEmpty())
  <ul {{ $attributes->twMerge(['']) }}>
    @foreach ($menu->all() as $item)
      <li @class([
        'text-body-2',
        'font-meta-text',
        $item->classes,
        $inactive => ! $item->active,
        $active => $item->active,
      ])>
        <a href="{{ $item->url }}">
          <x-meta-text :message="$item->label" />
        </a>

        @if ($item->children)
          <ul class="hidden">
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
