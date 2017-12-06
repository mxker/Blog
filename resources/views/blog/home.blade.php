@extends('layout.blog')

@section('content')
    <!-- Main -->
    <div id="main">

        <!-- Post -->
        @if(!empty($articleList))
            @foreach( $articleList as $key => $value)
                <article class="post">
                    <header>
                        <div class="title">
                            <h2><a href="#">{{ $value['art_name'] }}</a></h2>
                            <p>{{ $value['art_tag'] }}</p>
                        </div>
                        <div class="meta">
                            <time class="published" datetime="{{ date('M d, Y', $value['art_time']) }}">{{ date('M d, Y', $value['art_time']) }}</time>
                            <a href="#" class="author"><span class="name">{{ $value['art_editor'] }}</span><img src="{{ asset('blog/images/avatar.jpg') }}" alt="" /></a>
                        </div>
                    </header>
                    <a href="{{ url('article/').'/'.$value['art_id'] }}" class="image featured"><img width="840" height="340" src="{{ asset($value['artThumbUrl']) }}" alt="" /></a>
                    <p>{{ $value['art_desc'] }}</p>
                    <footer>
                        <ul class="actions">
                            <li><a href="{{ url('article/').'/'.$value['art_id'] }}" class="button big">阅读全文</a></li>
                        </ul>
                        <ul class="stats">
                            <li><a href="#">General</a></li>
                            <li><a href="#" class="icon fa-heart">{{ $value['art_view'] }}</a></li>
                            <li><a href="#" class="icon fa-comment">128</a></li>
                        </ul>
                    </footer>
                </article>
            @endforeach
        @endif

        <!-- Pagination -->
        <ul class="actions pagination">
            <li><a href="{{ $page -> previousPageUrl() }}" class="@if($page->currentPage() == 1)disabled @endif button big previous">上一页</a></li>
            <li><a href="{{ $page -> nextPageUrl() }}" class="@if($page->currentPage() == $page->lastPage())disabled @endif button big next">下一页</a></li>
        </ul>

    </div>

    <!-- Sidebar -->
    <section id="sidebar">

        <!-- Intro -->
        <section id="intro">
            <a href="#" class="logo"><img src="{{ asset('blog/images/logo.jpg') }}" alt="" /></a>
            <header>
                <h2>骑在大象背上的人生</h2>
                <p>Nothing venture,nothing have. <a href="http://blog.csdn.net/wmlml?ref=toolbar">MXKER CSDN`S BLOG</a></p>
            </header>
        </section>

        <!-- Mini Posts -->
        <section>
            <div class="mini-posts">

                <!-- Mini Post -->
                @if(!empty($hotArticle))
                    @foreach($hotArticle as $key => $value)
                        <article class="mini-post">
                            <header>
                                <h3><a href="{{ url('article/').'/'.$value['art_id'] }}">{{ $value['art_name'] }}</a></h3>
                                <time class="published" datetime="{{ date('Y-m-d', $value['art_time']) }}">{{ date('M d, Y', $value['art_time']) }}</time>
                                <a href="#" class="author"><img src="blog/images/avatar.jpg" alt="" /></a>
                            </header>
                            <a href="{{ url('article/').'/'.$value['art_id'] }}" class="image"><img src="blog/images/hot_0{{ rand(1,4) }}.jpg" alt="" /></a>
                        </article>
                    @endforeach
                @endif

            </div>
        </section>

        <!-- Posts List -->
        @if(!empty($markArticle))
            @foreach($markArticle as $value)
                <section>
                    <ul class="posts">
                        <li>
                            <article>
                                <header>
                                    <h3><a href="{{ url('article/').'/'.$value['art_id'] }}">{{ $value['art_name'] }}</a></h3>
                                    <time class="published" datetime="{{ date('Y-m-d', $value['art_time']) }}">{{ date('M d, Y', $value['art_time']) }}</time>
                                </header>
                                <a href="{{ url('article/').'/'.$value['art_id'] }}" class="image"><img src="blog/images/mark_0{{ rand(1,5) }}.jpg" alt="" /></a>
                            </article>
                        </li>
                    </ul>
                </section>
        @endforeach
    @endif

    <!-- About -->
        <section class="blurb">
            <h2>洗脑鸡汤</h2>
            <p>有志者，事竟成，破釜沉舟，百二秦关终属楚；苦心人，天不负，卧薪尝胆，三千越甲可吞吴。</p>
            <ul class="actions">
                <li><a href="https://0x9.me/4SnI8" class="button">新浪微博</a></li>
            </ul>
        </section>

        <!-- Footer -->
        <section id="footer">
            <ul class="icons">
                <li><a href="https://twitter.com/" class="fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="http://zh-tw.facebook.com/" class="fa-facebook"><span class="label">Facebook</span></a></li>
                <li><a href="https://github.com/cargic" class="fa-instagram"><span class="label">GitHub</span></a></li>
                <li><a href="http://blog.csdn.net/wmlml?ref=toolbar" class="fa-rss"><span class="label">CSDN</span></a></li>
                <li><a href="http://mail.163.com" class="fa-envelope"><span class="label">Email</span></a></li>
            </ul>
            <p class="copyright">&copy; Untitled. More Knowledge <a href="http://blog.csdn.net/wmlml?ref=toolbar" target="_blank" title="CSDN">CSDN博客</a>.</p>
        </section>

    </section>
@endsection