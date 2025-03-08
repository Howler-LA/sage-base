@aware(['title' => null])

<span {{ $attributes->merge(['class'=>'font-eyebrow font-medium uppercase text-sm tracking-wider']) }}>
  {!! $title ?? $slot !!}
</span>