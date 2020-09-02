{{--
  Template Name: FAQs Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile

  @foreach($faqs as $group)
    @php $z = 0; @endphp
    <div class="shadow mb-5 p-3">
    @if($group['visible'] == 'yes')
      <h2>{!!$group['group_name']!!}</h2>
      <p>{!!$group['group_description']!!}</p>

      @if($group['questions'])
        @php $i = 0; @endphp

        <div id="accordion{{$z}}" class="accordion mb-3">
        @foreach($group['questions'] as $question)

          @if($question['visible'] == 'yes')
          <div class="mb-3 border-bottom">
            <h3 class="d-flex justify-content-between align-items-center cursor-pointer" data-toggle="collapse" href="#collapse{{$i}}" role="button" aria-expanded="false" aria-controls="collapse{{$i}}">
              {!!$question['question']!!}
              <i class="fas fa-angle-down"></i>
            </h3>
            <p id="collapse{{$i}}" class="collapse m-0 pb-2" data-parent="#accordion{{$z}}">{!!$question['answer']!!}</p>
          </div>
          @endif
        
          @php $i++; @endphp
        @endforeach
        </div>

      @endif

    @endif
    </div>
    @php $z++; @endphp
  @endforeach
    
  @php
  //dd($faqs);
  @endphp

@endsection
