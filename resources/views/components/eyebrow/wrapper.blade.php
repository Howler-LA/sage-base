<div 
	@class([
		'bg-eyebrow-background text-eyebrow-foreground inline-flex',
		'py-min px-em',
		'rounded-tl-[30px] rounded-br-[30px] rounded-tr-[10px] rounded-bl-[10px]' => str_contains(get_bloginfo('wpurl'), 'youthjustice'),
	])
>
	{{ $slot }}
</div>
