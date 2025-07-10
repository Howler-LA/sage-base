@props([
  'name' => null,
  'inactive' => 'hover:text-blue-500',
  'active' => 'text-blue-500',
])

@php($menu = Navi::build($name))

@if ($menu->isNotEmpty())
  @foreach ($menu->all() as $item)
    <div class="flex flex-col gap-1">
      <a href="{{ $item->url }}" class="border-b border-foreground pb-em">
        <x-eyebrow naked> {{ $item->label }}</x-eyebrow>
      </a>
      @if ($item->children)
        <ul class="divide-y divide-foreground border-t border-foreground">
          @foreach ($item->children as $child)
            <li class="py-min">
              <a href="{{ $child->url }}" class="flex items-center justify-between">
                <span>{{ $child->label }}</span>
              </a>
            </li>
          @endforeach
        </ul>
      @endif
    </div>
  @endforeach
@endif

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