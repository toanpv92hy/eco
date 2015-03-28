jQuery(document).ready(function(){
	jQuery("#select-menu-1").addClass('select-menu-hover');
	jQuery("#select-menu-1").hover(function(e){
		jQuery("#select-menu-4").removeClass('select-menu-hover');
		jQuery("#select-menu-3").removeClass('select-menu-hover');
		jQuery("#select-menu-2").removeClass('select-menu-hover');
		jQuery("#select-menu-1").addClass('select-menu-hover');
		
		var urlImage=jQuery("#img-menu-1").attr('src');
		console.log(urlImage);
		jQuery('.cha').css('background','url('+urlImage+') repeat scroll center center / 100% auto rgba(0, 0, 0, 0)');
	});
	jQuery("#select-menu-2").hover(function(e){
		jQuery("#select-menu-1").removeClass('select-menu-hover');
		jQuery("#select-menu-4").removeClass('select-menu-hover');
		jQuery("#select-menu-3").removeClass('select-menu-hover');
		jQuery("#select-menu-2").addClass('select-menu-hover');
		var urlImage=jQuery("#img-menu-2").attr('src');
		jQuery('.cha').css('background','url('+urlImage+') repeat scroll center center / 100% auto rgba(0, 0, 0, 0)');
	});
	jQuery("#select-menu-3").hover(function(e){
		jQuery("#select-menu-1").removeClass('select-menu-hover');
		jQuery("#select-menu-2").removeClass('select-menu-hover');
		jQuery("#select-menu-4").removeClass('select-menu-hover');
		jQuery("#select-menu-3").addClass('select-menu-hover');
		var urlImage=jQuery("#img-menu-3").attr('src');
		jQuery('.cha').css('background','url('+urlImage+') repeat scroll center center / 100% auto rgba(0, 0, 0, 0)');
	});
	jQuery("#select-menu-4").hover(function(e){
		jQuery("#select-menu-1").removeClass('select-menu-hover');
		jQuery("#select-menu-2").removeClass('select-menu-hover');
		jQuery("#select-menu-3").removeClass('select-menu-hover');
		jQuery("#select-menu-4").addClass('select-menu-hover');
		var urlImage=jQuery("#img-menu-4").attr('src');
		jQuery('.cha').css('background','url('+urlImage+') repeat scroll center center / 100% auto rgba(0, 0, 0, 0)');
	});
});