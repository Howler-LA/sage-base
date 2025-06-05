@props([
  'id'    => null,
  'size'  => 'large',
  'class' => 'w-full h-auto block'
])

@if($id)
  @image($id,$size,['class'=>$class])
@endif

