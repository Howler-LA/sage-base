@set($width,'full')
@set($order,'right')

<section data-theme="{{ $config['block']['theme'] }}"  class="grid xl:grid-cols-2 relative bg-background text-foreground">
  <div 
    data-theme="{{ $config['block']['theme'] }}" 
    @class([
      'relative',
      'flex flex-col justify-center',
      'p-0 xl:p-lg',
      'xl:items-end' => $order == 'right',
    ])
  >
  	<div
  		@class([
        'xl:w-full',
        'p-lg xl:p-0',
        'max-w-browser',
        'mx-auto xl:mx-0',
        'xl:max-w-[calc(calc(calc(var(--sizing-browser-width)*.5)-calc(var(--spacing-large)*2))*1px)]'
      ])
  	>
	    <x-lockup
	      eyebrow="{!! $content['eyebrow'] !!}"
	      headline="{!! $content['headline'] !!}"
	      copy="{!! $content['copy'] !!}"
	    />
	    @if($content['links'])
	      <div
	        @class([
	        	'py-sm',
	          'flex items-center gap-min'
	        ])
	      >
	        @foreach($content['links'] as $key => $link)
	          <x-button 
	            href="{{ $link['link']['url'] }}"
	            style="{{ $link['config']['style'] }}"
	            format="{{ $link['config']['format'] }}"
	            label="{{ $link['link']['title'] }}" 
	            target="{{ $link['link']['target'] }}"
	          />
	        @endforeach
	      </div>
	    @endif
	  </div>
  </div>
  <div 
    @class([
      'p-0',
      '-ml-64',
      'xl:order-first' => $order == 'left'
    ])
  >
    @image($content['image'],'large',['class'=>'w-full h-auto'])
  </div>
</section>