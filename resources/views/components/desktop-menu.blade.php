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
        $item->classes,
        $inactive => ! $item->active,
        $active => $item->active,
      ])>
        <a 
          class="text-body-1 leading-none"
          href="{{ $item->url }}"
        >
          {{ $item->label }}
        </a>

        @if ($item->children)
          <div class="opacity-0 invisible group-hover:visible group-hover:opacity-100 absolute -mt-px pt-min">
            <ul class="drop-shadow-2xl bg-background rounded-card p-card -ml-min w-72 transition ease-in-out duration-300 translate-y-min group-hover:translate-y-0">
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
          </div>
        @endif
      </li>
    @endforeach
  </ul>
@endif
