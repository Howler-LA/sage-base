@aware(['title' => null])

<span {{ $attributes->merge(['class'=>'font-eyebrow py-4 font-medium uppercase tracking-wider text-eyebrow leading-eyebrow']) }}>
  {!! $title ?? $slot !!}
</span>