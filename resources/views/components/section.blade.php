@props([
  'tag' => 'section',
  'padding' => null,
])

@php($class = match ($padding) {
  'xl'    => 'py-xl',
  default => 'py-lg',
})

<section
  {{ $attributes->class([
    get_row_layout(),
    'bg-background text-foreground overflow-hidden',
    'relative',
    $class,
  ]) }}
>
  {{-- @if(get_sub_field('config')['block']['background_image'])
    <div class="absolute inset-0">
      @image(get_sub_field('config')['block']['background_image'],'full',['class'=>'w-full h-full object-cover'])
    </div>
  @endif --}}
  <div class="relative">
    {!! $slot !!}
  </div>
</section>

