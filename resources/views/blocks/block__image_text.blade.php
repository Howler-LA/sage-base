@set($width,$config['media']['image_size'])
@set($order,$config['media']['reverse'])
@set($scaling,$config['media']['scaling'])

<x-section>
  <x-cols :reversed="$order" :contained="$scaling">
    <x-cols.col :contained="$scaling">
      <div class="aspect-[6/4] flex items-center justify-center font-medium text-sm text-pink-500 border-2 border-dashed">
        Text
      </div>
    </x-cols.col>
    <x-cols.col>
      @image($content['image'],'large',['class'=>'w-full aspect-[6/4] object-cover object-top'])
    </x-cols.col>
  </x-cols>
</x-section>