<div class="left_part_blog">
                @foreach($blogs as $blog)
                <div class="our_blog_box">
                    <div class="blog_image"><a href="{{ route('blog.details', ['slug' => $blog->slug]) }}"><img src="{{ asset('storage/' . $blog->images->first()->path) }}" alt="" /></a></div>
                    <div class="blog_text">
                        <div class="text_one"><h2>{{$blog->name}}</h2>
                            <p><a href="{{ route('blog.details', ['slug' => $blog->slug]) }}" style="color: black;">{{$blog->title}}</a></p>
                        </div>
                        <div class="blog_tag_name">
                            <ul>
                                <li class="tagBox"><p>{{ $blog->tagname  }}</p></li>
                                <li class="blogdate"><img src="{{ asset('front/images/calendar.svg')}}" alt="" /><p>{{$blog->created_at->format('m/d/y')}}</p></li>
                                <li class="blogview"><img src="{{ asset('front/images/carbon_view.svg')}}" alt="" /><p>{{ $blog->views}}</p></li>
                                <li><a href="#;"><img src="{{ asset('front/images/ri_share-line.svg')}}" alt="" /></a></li>
                            </ul>
                            <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}" class="blogreadnow">Read Now</a>
                        </div>
                    </div>
                </div>
                @endforeach
</br>              
                <div class="pagination">
    @php
        $totalPages = ceil($totalBlogs / $perPage);
    @endphp

    @for ($page = 1; $page <= $totalPages; $page++)
        <a onClick=pageLoad({{$page}}) class="page-link {{ $currentPage == $page ? 'active' : '' }}">
            {{ $page }}
        </a>
    @endfor
</div>
</div>
@include('front.common.one-blog')
            