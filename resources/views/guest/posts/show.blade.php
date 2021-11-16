@extends('layouts.guest')
@section('pageContent')

    <article class="blog-post">
        <article class="blog-post">
            <h1 class="blog-post-title">{{$post['title']}}</h1>
            
            <p class="blog-post-meta">{{$post->created_at->diffForHumans()}} by <a href="#">Jacob</a></p>
            <p>{{$post['content']}}</p>
        </article> 
    </article>

    <nav class="blog-pagination" aria-label="Pagination">
      <a class="btn btn-outline-primary" href="#">Older</a>
      <a class="btn btn-outline-secondary disabled">Newer</a>
    </nav>

  </div>

  <div class="col-md-4">
    <div class="position-sticky" style="top: 2rem;">
      <div class="p-4 mb-3 bg-light rounded">
        <h4 class="fst-italic">About</h4>
        <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
      </div>

      <div class="p-4">
        <h4 class="fst-italic">Archives</h4>
        <ol class="list-unstyled mb-0">
          <li><a href="#">March 2021</a></li>
          <li><a href="#">February 2021</a></li>
          <li><a href="#">January 2021</a></li>
          <li><a href="#">December 2020</a></li>
          <li><a href="#">November 2020</a></li>
          <li><a href="#">October 2020</a></li>
          <li><a href="#">September 2020</a></li>
        </ol>
      </div>
    </div>
  </div>
</div>
  
@endsection