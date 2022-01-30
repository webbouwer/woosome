jQuery(function($) {

      const poplist = Array();
      const pswpElement = document.querySelectorAll('.pswp')[0];
      var popcurrent = '';
      var idx = 0;

      $('.type-product').each(function() {
        if ($(this).css('display') != 'none') {
          $(this).attr("data-index", idx++);
          $(this).attr("data-product-id", $(this).find('.button').attr("data-product_id"));
          poplist.push($(this).find('.button').attr("data-product_id"));
        }
      });

      $('ul.products').on('click', '.type-product a', function(event) {
        event.preventDefault();
        event.stopPropagation();
        set_popup_item($(this).parent().data("product-id"));
        return false;
      });


      function set_popup_item(pid) {

        //var pidx = poplist.indexOf(pid);
        for(var i=0; i<poplist.length; i++){
          var xx = poplist[i];
          if(xx == pid){
            var pidx = i+1;
            break;
          }
        }

        data = {
          action: 'filter_postlist', // function to execute
          afp_nonce: afp_vars.afp_nonce, // wp_nonce
          postids: poplist, // post id
        };

        $.post(afp_vars.afp_ajax_url, data, function(response) {

          if (response.length > 0) {
            //console.log(response);
            // add content to window
            // photoswipe popups: https://github.com/dimsemenov/PhotoSwipe/issues/1319
          }

        }).done(function(data) {

          console.log(data);
          // !get more variations/thumbnails
          // ready loading ..
          var svi_items = [];
          // define options (if needed)
          var options = {
              index: pidx // start at current/first slide
          };
          // define items
          var obj = JSON.parse(data);

          $.each(obj,function(idx, val){

            svi_items.push({
              src: obj[idx]["thumb"][0],
              w: obj[idx]["thumb"][1],
              h: obj[idx]["thumb"][2],
              msrc: obj[idx]["thumb"][0],
              title: obj[idx]["post"].post_title
            });

          })
    
          var gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, svi_items, options);
          gallery.init();

        });
      }



/*
  $(window).load(function() {


    $('ul.products').on( 'click', '.type-product a', function(event){
      event.preventDefault();
      event.stopPropagation();
      //set_popup_item($(this));
      return false;
    });
    */

/*
    // detect click for popup item
    $('.productbox-container').on( 'click', '.product-item-box', function(event){
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
      $('.product-item-box').each(function(){
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



}); */

});
