<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>


@if( getenv('WP_ENV') != 'development' )
    <div class="loading w-100 bg-white d-flex justify-content-center align-items-center">
      <span>
        <img style="width:150px;" src="@asset('images/c9ffaff3f15bd19379a360edb33080d5.gif')">
      </span>
    </div>
    <script>
      jQuery(document).ready(function() {
        const random_time = Math.floor(Math.random() * 550);
        setTimeout(function(){
          jQuery('body .loading').addClass('opacity-d-none');
          setTimeout(function(){
            jQuery('body .loading').removeClass('d-flex').addClass('d-none');
          }, random_time + 1500);
        }, random_time + 1100);
      });
    </script>
@endif

@php do_action('get_header') @endphp
    @include('partials.header')
    <div class="wrap {{ $container_class }}" role="document">
      <div class="content">
        <main class="main">
          @yield('content')
        </main>
        @if (App\display_sidebar())
          <aside class="sidebar">
            @include('partials.sidebar')
          </aside>
        @endif
      </div>
    </div>
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
  </body>
</html>
