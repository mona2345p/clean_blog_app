
            @foreach($posts as $post)
                <a href="post.html">
                    <h2 class="post-title">{{$post->title}}</h2>
                    <h3 class="post-subtitle">{{$post->content,10}}</h3>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="{{url('posts/'.$post->id)}}">{{$post->user->name}}</a>
                    on {{$post->created_at->format('F ,m, d')}}
                </p>
                <!-- Divider-->
                <hr class="my-4" />
            @endforeach
            <!-- Pager-->
           
    </div>
</div>