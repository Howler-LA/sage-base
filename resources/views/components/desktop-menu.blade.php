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
        $item->classes,
        $inactive => ! $item->active,
        $active => $item->active,
      ])>
        <x-button variant="link" href="{{ $item->url }}">
          {{ $item->label }}
          @if ($item->children) <x-lucide-chevron-down /> @endif
        </x-button>

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
