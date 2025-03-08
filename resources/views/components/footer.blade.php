@props([
  'name' => null,
  'inactive' => '',
  'active' => '',
])

@php($menu = Navi::build($name))

@if ($menu->isNotEmpty())
  @foreach ($menu->all() as $item)
    <nav class="flex flex-col gap-1">
      <a href="{{ $item->url }}" class="pb-4 !no-underline border-b">
        <x-type.eyebrow.text title="{{ $item->label }}" />
      </a>
      <div 
        aria-label="Sub menu for {{ $item->label }}" 
        class="flex flex-col border-t border-inherit"
      >
        @foreach ($item->children as $child)
          <div class="font-light flex items-center justify-between border-b border-foreground/20 group">
            <a href="{{ $child->url }}" class="!no-underline py-4 block !no-underline">{{ $child->label }}</a>
            <x-button.arrow />
          </div>
        @endforeach
      </div>
    </nav>
  @endforeach
@endif