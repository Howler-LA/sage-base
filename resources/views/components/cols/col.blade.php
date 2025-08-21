@props([
	'contained' => null
])

@aware([
	'reversed' => null,
	'center' => null
])

<div 
	{{ 
		$attributes->twMerge([
			$center ? '' : 'h-full', 
			$reversed ? 'even:xl:order-first even:xl:h-full' : 'xl:order-last xl:h-full'
		])
	}}
>

	<div 
		@class([
			'column',
			'h-full',
			$contained ? 'xl:max-w-browser-half px-med xl:px-container' : '',
			$reversed && $contained ? 'mr-auto' : 'ml-auto', 
		])
	>
		{{ $slot }}
	</div>
</div>