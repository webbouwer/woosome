jQuery(function($) {


  $(window).load(function() {


    $('.products.columns-8').on( 'click', '.type-product', function(event){
          event.stopPropagation();
          //indexing_items();
          //set_popup_item($(this));
          //let imgurl = $(this).find('img').attr('src');
          alert( 'check!' );
          return false;
        });


        /*
    // detect click for popup item
    $('ul.products').on( 'click', '.woocommerce-loop-product__link', function(event){
      event.stopPropagation();
      indexing_items();
      set_popup_item($(this));
      return false;
    });

    $('body').on('click touchend', '.popupbg, .closebutton', function(){
      $('.popupbg').fadeOut('slow', function(){ $(this).remove() });
    });
    $('body').on('click touchend', '.popupbox', function(){
  	return false;
    });

  $('body').on( 'click touchstart', 'a.nxtbut,a.prvbut', function(){
  	var but = $(this);
  	$('#itempopbox').fadeOut('fast', function(){
  		$('.popupbg').append('<div class="popuploading"><span>Loading..</span></div>');
  		loadpopupitem( but.attr('data-id') );
  	});
  	return false;
  });

    // define index popup items
    function indexing_items(){
      var idx = 0;
      $('.type-product').each(function(){
          //if ( $(this).css('display') != 'none' ){
          $(this).attr( "data-index", idx++ );
          //}
      });
    }
    		// set popupbox content
    		function set_popup_item(item){
      			if( $('.popupbox').length < 1 ){
          		$('body').append('<div class="popupbg" style="display:none;position:absolute;width:100%;min-height:'+$(document).height()+'px;top:0px;left:0px;z-index:99;"><div class="popuploading"><span>Loading..</span></div><div id="itempopbox" class="popupbox" style="display:none;"></div></div>');
          		$('html, body').animate({ scrollTop: $("#topcontainer").offset().top }, 500);
          		$('.popupbg').fadeIn('slow');
      			}
      			loadpopupitem( item.attr('data-id') );
    		}

  		function set_popup_navi($postid){
  			var idx = parseFloat( $('.product-item-box[data-id*='+$postid+']').attr('data-index') );
  			var inx = get_id_by_index(idx+1),
  			ipr = get_id_by_index(idx-1);
  			//alert ( ipr +' < | > '+ inx);
  			$('#itempopbox div.infobox').append('<div class="navibox"><a class="prvbut" data-id="'+ ipr +'" href="#" title="'+$('.product-item-box[data-id*='+ipr+']').find('h6').html()+'"><span> < </span></a><a class="nxtbut" data-id="'+ inx +'" href="#" title="'+$('.product-item-box[data-id*='+inx+']').find('h6').html()+'"><span> > </span></a></div>');
  		}
  		function get_id_by_index(ix){
  			if(ix < 0){
  			ix = parseFloat( $('.product-item-box:last').attr('data-index') );
  			}
  			if(ix > parseFloat( $('.product-item-box:last').attr('data-index') ) ){
  			ix = 0;
  			}
  			return parseFloat( $('.product-item-box[data-index*='+ix+']').attr('data-id') );
  		}

  		function loadpopupitem($postid){
    			data = {
            		action: 'filter_posts', // function to execute
            		afp_nonce: afp_vars.afp_nonce, // wp_nonce
            		postid:  $postid, // post id
          		};

          		$.post( afp_vars.afp_ajax_url, data, function(response) {

            		if( response.length > 0 ){
  				$('#itempopbox').html( response );
  			}
          		}).done(function( data ) {
  				$('.popuploading').fadeOut('fast', function(){
  				$(this).remove();
  				});
  				$('#itempopbox').fadeIn('fast');
  				set_popup_navi($postid);
            		});
  		}


*/
});
});
