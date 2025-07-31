@props([
  'name' => null,
  'inactive' => 'hover:text-blue-500',
  'active' => 'text-blue-500',
])

@php($menu = Navi::build($name))

@if ($menu->isNotEmpty())
  @foreach ($menu->all() as $item)
    <div class="flex flex-col gap-1">
      <a href="{{ $item->url }}" class="border-b border-border pb-em">
        <x-eyebrow naked> {{ $item->label }}</x-eyebrow>
      </a>
      @if ($item->children)
        <ul class="border-t border-border">
          @foreach ($item->children as $child)
            <li class="py-min border-b border-border">
              <a href="{{ $child->url }}" class="text-center lg:text-left flex items-center justify-between">
                <x-body size="2" :message="$child->label" />
                <x-lucide-arrow-up-right />
              </a>
            </li>
          @endforeach
        </ul>
      @endif
    </div>
  @endforeach
@endif