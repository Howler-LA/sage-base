@aware(['title' => null])

<span {{ $attributes->merge(['class'=>'font-eyebrow font-medium uppercase tracking-wider leading-8 text-xs sm:text-sm']) }}>
  {!! $title ?? $slot !!}
</span>