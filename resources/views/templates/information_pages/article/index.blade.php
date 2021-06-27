{{--  @if(!sizeof($article->displayArticles) && $article->featured_image == null)
<div class="container pageArticle beforeFooterWrap">
    <div class="row article">
        <div class="col-12">
            <h3>{{$article->title}}</h3>
            {!! $article->description !!}
        </div>
    </div>
</div>
@else  --}}
<div class="row article">

  <div class="col-12 col-md-6 col-lg-6 image">
    <div class="articleSlide">
      <div>
        @include( 'templates.placeholders.simple_image_placeholders',
          [
          'imgvar' => $article->featured_image, 'imgtitle' => $article->title,
          'imgclasses' => 'img-fluid',
          'class' => '', 'width' => 800,'height' => 600, 'text' => '+',
          'use_vault_logo' => true, 'use_placehold_it' => true
          ]
        )
        @forelse($article->displayArticles as $key => $art)
          @include( 'templates.placeholders.simple_image_placeholders',
            [
            'imgvar' => $art->featured_image, 'imgtitle' => $art->title,
            'imgclasses' => 'img-fluid',
            'class' => '', 'width' => 800,'height' => 600, 'text' => '+',
            'use_vault_logo' => true, 'use_placehold_it' => true
            ]
          )
        @empty
        @endforelse
      </div>
    </div>
  </div>

  <div class="col-12 col-md-6 col-lg-6 info">
    <h3>{{$article->title}}</h3>
    {!! $article->description !!}
  </div>

</div>
{{--  @endif  --}}
