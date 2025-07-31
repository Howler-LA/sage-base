@set($align, $content['align'])
@set($scaling,$align == 'center' ? true : false)
@set($order,false)

@include('blocks.block__hero_special-' . $align)
