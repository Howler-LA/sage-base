@props([
  'padding' => null,
  'tag' => 'section'
])

@php($class = match ($padding) {
  'none'  => 'py-zero',
  'tight' => 'py-em',
  'roomy' => 'py-x-large',
  default => 'py-section',
})

<{{ $tag }} {{ $attributes->twMerge([$class, 'space-y-med bg-background text-foreground relative']) }}>
	{{ $slot }}
</{{ $tag }}>