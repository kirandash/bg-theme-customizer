(function($){
	$(function(){
		
		wp.customize('kdtheme_header_color', function(value){
			value.bind(function(to){
				$('h1, h2, h3, h4, h5, h6').css('color',to);
			});
		});
		
		wp.customize('kdtheme_heading_font_size', function(value){
			value.bind(function(to){
				$('h1').css('font-size',to);
			});
		});
		
	});
}(jQuery))

