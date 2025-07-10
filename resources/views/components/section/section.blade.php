@props([
  'padding' => null,
  'tag' => 'div'
])

@php($class = match ($padding) {
  'none'  => 'py-zero',
  'tight' => 'py-em',
  'roomy' => 'py-x-large',
  default => 'py-section',
})

<{{ $tag }} {{ $attributes->twMerge([$class, 'gap-y-med flex flex-col bg-background text-foreground relative']) }}>
	{{ $slot }}
</{{ $tag }}>