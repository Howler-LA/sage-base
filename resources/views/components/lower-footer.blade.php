@props([
  'name' => null,
  'inactive' => 'hover:underline',
  'active' => 'underline',
])

@php($menu = Navi::build($name))

@if ($menu->isNotEmpty())
  <ul {{ $attributes }}>
    @foreach ($menu->all() as $item)
      <li @class([
        'underline-offset-4',
        $item->classes,
        $inactive => ! $item->active,
        $active => $item->active,
      ])>
        <a href="{{ $item->url }}">
          <x-body size="2" :message="$item->label" />
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
