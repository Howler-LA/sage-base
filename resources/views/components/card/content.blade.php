@aware([
  'variant'   => 'color-card',
])

<div {{ $attributes->twMerge([
		'space-y-em flex flex-col flex-grow items-start',
		$variant == 'news-card' || $variant == 'news' ? null : 'p-card',
	]) }}>
	{!! $slot !!}
</div>