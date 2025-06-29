<x-card data-aos="fade-up">
  @image(get_sub_field('content')['image'],'large',['class'=>'aspect-[5/4] object-cover'])
  <x-card.content>
  	<header>
  		<x-body class="font-bold">{{ get_sub_field('content')['headline'] }}</x-body>
  		<x-body class="font-normal" size="2">{{ get_sub_field('content')['subheadline'] }}</x-body>
  	</header>
  	<x-body class="font-normal">{!! get_sub_field('content')['copy'] !!}</x-body>
  	<x-card.footer>
	  	<x-button.group>
	      @foreach(get_sub_field('content')['links'] as $link)
	        <x-button 
	        	size="sm"
	          variant="outline"
	          label="{{ $link['link']['title'] }}"
	          title="{{ $link['link']['title'] }}"
	          href="{{ $link['link']['url'] }}"
	          target="{{ $link['link']['target'] }}"
	        />
	      @endforeach
	    </x-button.group>
	   </x-card.footer>
  </x-card.content>
</x-card>
