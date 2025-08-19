@props([
  'name' => null,
  'inactive' => 'hover:underline underline-offset-4',
  'active' => 'underline underline-offset-4',
])

@php($menu = Navi::build($name))

@if ($menu->isNotEmpty())
  <ul {{ $attributes }}>
    @foreach ($menu->all() as $item)
      <li @class([
        'group',
        'relative',
        $item->classes,
        $inactive => ! $item->active,
        $active => $item->active,
      ])>
        <a 
          @class([
            'font-body text-small-text leading-small-text leading-none flex items-center',
            'gap-min' => $item->children
          ])
          href="{{ $item->url }}"
        >
          <span>{{ $item->label }}</span>
          <x-dynamic-component class="size--em" :component="$item->children ? 'lucide-arrow-down' : 'empty'" /> 
        </a>

        @if ($item->children)
          <div class="invisible opacity-0 group-hover:visible group-hover:opacity-100 top-full absolute -mt-px pt-em">
            <ul data-theme="White" class="drop-shadow-2xl bg-background text-foreground rounded -ml-min w-72 transition ease-in-out duration-300 translate-y-min group-hover:translate-y-0">
              @foreach ($item->children as $child)
                <li @class([
                  'font-body',
                  'text-body-1',
                  'border-b last:border-0 border-border',
                  $child->classes,
                  $inactive => ! $child->active,
                  $active => $child->active,
                ])>
                  <a 
                    class="px-btn-horiz-l py-btn-vert-l block"
                    href="{{ $child->url }}"
                  >
                    {{ $child->label }}
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
        @endif
      </li>
    @endforeach
  </ul>
@endif
