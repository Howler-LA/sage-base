@if($config['block']['background'] != null)
	<div class="absolute inset-0">
		@image($config['block']['background'],'large',['class'=>'w-full h-full object-cover object-top', 'alt'=> $content['headline'] ])
	</div>
@endif