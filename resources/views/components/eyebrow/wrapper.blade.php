<div 
	@class([
		'bg-eyebrow-background text-eyebrow-foreground inline-flex',
		'py-min',
		'px-em',
		'border-eyebrow-border',
		'rounded-l pl-3 pr-0' => str_contains(get_bloginfo('wpurl'), 'initiatejustice'),
		'border px-em rounded-tl-[30px] rounded-br-[30px] rounded-tr-[10px] rounded-bl-[10px]' => str_contains(get_bloginfo('wpurl'), 'youthjustice'),
	])
>
	{{ $slot }}
</div>
