            
           
            @if(isset($article->image))
            <ul class="horizontal-list">
                @forelse($article->image as $image)
                      
                          <li class="item">
                        
                            <img src="{{ asset('/storage/app/' . $image->name) }}" class="image_base" width="230 heigh="230"/>
                                             
                        </li>
                    @empty
                      
                   @endforelse
                </ul>
            @else
            <p>イメージはありません</p>
            @endif
    
