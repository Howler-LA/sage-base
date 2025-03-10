@props([
  'id'    => null,
  'size'  => 'large',
  'class' => 'w-full h-auto block'
])

@image($id,$size,['class'=>$attributes->class($class)])

