 @switch($tag->name)
     @case('montagna')
         {{ 'chips-green' }}
     @break
     @case('variet√†')
         {{ 'chips-blue' }}
     @break
     @case('occhiali')
         {{ 'chips-dark-blue' }}
     @break
     @case('computers')
         {{ 'chips-purple' }}
     @break
     @case('idea')
         {{ 'chips-orange' }}
     @break
     @case('musica')
         {{ 'chips-red' }}
     @break
     @case('cultura')
         {{ 'chips-red' }}
     @break
     @case('vip')
         {{ 'chips-dark-red' }}
     @break
     @case('sostenibilit√†')
         {{ 'chips-dark-orange' }}
     @break
     @default
         {{ 'chips-dark-grey' }}
 @endswitch
