@aware(['title' => null])

<span {{ $attributes->merge(['class'=>'font-eyebrow font-medium uppercase tracking-wider leading-eyebrow']) }}>
  {!! $title ?? $slot !!}
</span>