@props([
	'contained' => null
])

@aware([
	'reversed' => null,
	'center' => null
])

<div {{ $attributes->twMerge([$center ? '' : 'h-full', $reversed ? 'even:xl:order-first' : 'xl:order-last']) }}>

	<div 
		@class([
			'h-full',
			$contained ? 'xl:max-w-browser-half px-med xl:px-container' : '',
			$reversed && $contained ? 'mr-auto' : 'ml-auto', 
		])
	>
		{{ $slot }}
	</div>
</div>