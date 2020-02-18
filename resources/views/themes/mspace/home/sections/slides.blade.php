@section('after_css')
<link rel="stylesheet" type="text/css" href="{{App\Helpers\Theme::assetsPath('assets/css/demo.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{App\Helpers\Theme::assetsPath('assets/css/slicebox.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{App\Helpers\Theme::assetsPath('assets/css/custom.css')}}" />
		<script type="text/javascript" src="{{App\Helpers\Theme::assetsPath('assets/js/modernizr.custom.46884.js')}}"></script>
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-7243260-2']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
@endsection
<div class="wrapper wrap-nav">
@include('themes.mspace.home.sections.menu')
    <ul id="sb-slider" class="sb-slider">
        @foreach($slides as $item)
        <li class="blockPlay">
            <a href="javascript:void(0)"><img src="{{$item->image}}"
                    alt="image1" /></a>
            <div class="sb-description text-center">
			<h3 class="text-slide">{{$item->description}}</h3>
            </div>
        </li>
        @endforeach
    </ul>

    <div id="shadow" class="shadow"></div>

    <div id="nav-arrows" class="nav-arrows">
        <a style="background: #cbbfae url({{App\Helpers\Theme::assetsPath('assets/images/nav.png')}}) no-repeat top right;" href="#">Next</a>
        <a style="background: #cbbfae url({{App\Helpers\Theme::assetsPath('assets/images/nav.png')}}) no-repeat top left;" href="#">Previous</a>
    </div>

</div>
@section('after_js')
		<script type="text/javascript" src="{{App\Helpers\Theme::assetsPath('assets/js/jquery.slicebox.js')}}"></script>
		<script type="text/javascript">
			$(function() {
				var Page = (function() {
					var $navArrows = $( '#nav-arrows' ).hide(),
						$shadow = $( '#shadow' ).hide(),
						slicebox = $( '#sb-slider' ).slicebox( {
							onReady : function() {
								$navArrows.show();
								$shadow.show();
							},
							orientation : 'r',
							cuboidsRandom : true,
							disperseFactor : 30,
							speed : 2000,
							interval: 6000,
						} ),
						init = function() {
							initEvents();
						},
						initEvents = function() {
							// add navigation events
							slicebox.play();
                            $('.blockPlay').on('click', function(){
								slicebox.pause();
								return false;
                            })
							$navArrows.children( ':first' ).on( 'click', function() {
								// slicebox.next();
								slicebox.play();
								return false;
							} );
							$navArrows.children( ':last' ).on( 'click', function() {
								// slicebox.previous();
								slicebox.play();
								return false;
							} );
						};
						return { init : init };
				})();
				Page.init();
			});
		</script>
		<script src="{{App\Helpers\Theme::assetsPath('assets/js/demoad.js')}}"></script>
@endsection
