<?php
/**
 * Fires after the main content, before the footer is output.
 *
 * @since 3.10
 */
do_action( 'et_after_main_content' );

if ( 'on' === et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

	<span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>

			<footer id="main-footer">
				<?php get_sidebar( 'footer' ); ?>


		<?php
			if ( has_nav_menu( 'footer-menu' ) ) : ?>

				<div id="et-footer-nav">
					<div class="container">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-menu',
								'depth'          => '1',
								'menu_class'     => 'bottom-nav',
								'container'      => '',
								'fallback_cb'    => '',
							) );
						?>
					</div>
				</div> <!-- #et-footer-nav -->

			<?php endif; ?>

				<div id="footer-bottom">
					<div class="container clearfix">
				<?php
					if ( false !== et_get_option( 'show_footer_social_icons', true ) ) {
						get_template_part( 'includes/social_icons', 'footer' );
					}

					// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
					echo et_core_fix_unclosed_html_tags( et_core_esc_previously( et_get_footer_credits() ) );
					// phpcs:enable
				?>
					</div>	<!-- .container -->
				</div>
			</footer> <!-- #main-footer -->
		</div> <!-- #et-main-area -->

<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

	</div> <!-- #page-container -->

	<?php wp_footer(); ?>

<!-- Header -->
<script>
jQuery(document).ready(function(){
    jQuery("#field_2_19").hide();
                jQuery("#field_3_19").hide();
                
                jQuery("#input_3_9").on("change",function() {
                    if (this.value == "yes") {
                        jQuery("#field_3_19").show();
                    } else {
                        jQuery("#field_3_19").hide();
                    }
                });
                jQuery("#input_2_9").on("change", function() {
                    if (this.value == "oui") {
                        jQuery("#field_2_19").show();
                    } else {
                        jQuery("#field_2_19").hide();
                    }
                });
	if(jQuery(window).width()<=980) {
		jQuery(".logo-anjajavy").attr("src","https://anjajavy.com/wp-content/uploads/2023/12/logo-anjajavy-couleur-1.png");
                jQuery(".logo-relais").attr("src","https://anjajavy.com/wp-content/uploads/2023/12/logo-relais-chateaux-couleur.png");
	}
});
jQuery(window).scroll(function (event) {
    var scroll = jQuery(window).scrollTop();
    if (scroll > 0) {
      jQuery(".logo-anjajavy").attr("src","https://anjajavy.com/wp-content/uploads/2023/12/logo-anjajavy-couleur-1.png");
      jQuery(".logo-relais").attr("src","https://anjajavy.com/wp-content/uploads/2023/12/logo-relais-chateaux-couleur.png");
      jQuery("#main-header").addClass("et-fixed-header");
    }
    else if (jQuery(window).width()>980) {
      jQuery(".logo-anjajavy").attr("src","https://anjajavy.com/wp-content/uploads/2023/12/logo-anjajavy-blanc.png");
      jQuery(".logo-relais").attr("src","https://anjajavy.com/wp-content/uploads/2023/12/logo-relais-chateaux-blanc.png");
      jQuery("#main-header").removeClass("et-fixed-header");
    }
});
</script>
<!-- FIN Header -->

<!-- Animations -->
<script type="text/javascript">
	var animationTime=700;
	var animationDelay=300;
	jQuery(document).ready(function(){
		jQuery('.global-h2-title-text-module').each(function(){
			if ( checkVisible(jQuery(this))&& !jQuery(this).hasClass('global-h2-title-lines-text-module-animation')){                     	jQuery(this).addClass("global-h2-title-lines-text-module-animation");
		}
	});
	});
	jQuery(window).on('scroll load',function(){
		jQuery('.animation-type').each(function(){						 
			let elem = jQuery(this);						 						  
			if ( checkVisible(elem)&& !elem.hasClass('animation-type-trigger')){
				if(elem.hasClass("for-toRight")){
					fadeRight(elem);
				}
				if(elem.hasClass("for-toLeft")){
					fadeLeft(elem);
				}
				if(elem.hasClass("for-toTop")){
					fadeTop(elem);   
				}
				if(elem.hasClass("for-toBottom")){
					fadeBottom(elem);
				}				
				elem.addClass('animation-type-trigger');							
			}
		});
	});
	function fadeLeft(elem){
		elem.css({"position":"relative","opacity": 0, "left":"50px"});
		elem.delay(animationDelay).animate({left:0, opacity:1},animationTime);
	}
	function fadeRight(elem){
		elem.css({"position":"relative","opacity": 0, "left":"-50px"});
		elem.delay(animationDelay).animate({left:0, opacity:1},animationTime);
	}
	function fadeBottom(elem){
		elem.css({"position":"relative","opacity": 0, "top":"-50px"});
		elem.delay(animationDelay).animate({top:0, opacity:1},animationTime);
	}
	function fadeTop(elem){
		elem.css({"position":"relative","opacity": 0, "top ":"50px"});
		elem.delay(animationDelay).animate({left:0, opacity:1},animationTime);
	}
	function checkVisible( elm, evalType ) {
		evalType = evalType || "visible";
        var vpH = jQuery(window).height(), // Viewport Height
        st = jQuery(window).scrollTop(), // Scroll Top
        y = jQuery(elm).offset().top,
        elementHeight = jQuery(elm).height();
		if (evalType === "visible") return ((y < (vpH + st)) && (y > (st - elementHeight)));
        if (evalType === "above") return ((y < (vpH + st)));
	}
</script>
<!-- FIN Animations -->

<!-- Galerie -->
<script>
/*Galerie*/
	var init = false;
	jQuery(document).ready(function () {
		//debugger;
	/*	jQuery('.gallery-div-content').css('position','absolute');
		jQuery('.gallery-div-content').css('top', '-999999px');
		jQuery('.gallery-div-content').css('left', '-999999px');*/
		var hash = window.location.hash.substr(1);
		var base = "#gallery-div-content-";
		
		if(hash === "") {
		   jQuery(base + 'tout').addClass("gallery-div-trigger-open-first");
		}
		else {
			jQuery(base + hash).addClass("gallery-div-trigger-open-first");
		}
		
		jQuery('.gallery-div-trigger-open-first').first().trigger("click");
		init = true;
	});
	
	jQuery('.gallery-div-trigger').click(function (e) {
		//debugger;
		let div_trigger_clicked = jQuery(this);
		let scroll ="";
		if(jQuery(window).width()<=980){
			let offset = Math.round(div_trigger_clicked.offset().left)  + div_trigger_clicked.width()/2 ;
			if(offset<jQuery(window).width()/2){
				offset = Math.round(div_trigger_clicked.offset().left)  - div_trigger_clicked.width()/2 ;
				/*offset=-offset;*/
				if(offset - jQuery(window).width()/2 !=0){
					scroll= jQuery('.homepage-hotel-for-slider-buttons-row').scrollLeft()+(offset)-div_trigger_clicked.width()/2 ;
					jQuery('.homepage-hotel-for-slider-buttons-row').animate({
						scrollLeft:  scroll
					}, 1000);
				}
			}else{
				if(offset - jQuery(window).width()/2 !=0){
					scroll = jQuery('.homepage-hotel-for-slider-buttons-row').scrollLeft()+  offset - jQuery(window).width()/2
					jQuery('.homepage-hotel-for-slider-buttons-row').animate({
						scrollLeft: scroll
					}, 1000);
				}
			}
		}
		jQuery(".gallery-div-trigger").removeClass('active');
		jQuery(this).addClass('active');
        var tailleHeaderDesktop = 131; //Taille header  Desktop
        var tailleHeaderMobile = 70; //Taille header  Mobile
        let id = jQuery(this).attr('id');
        jQuery('.gallery-div-content').css('position','absolute');
        jQuery('.gallery-div-content').css('top', '-999999px');
        jQuery('.gallery-div-content').css('left', '-999999px');
        jQuery('.gallery-div-content').removeClass('show');
        jQuery('.' + id).addClass('show');
        jQuery('.'+id).css('position','relative');
        jQuery('.'+id).css('top','auto');
        jQuery('.'+id).css('left','auto');
		/*jQuery('.'+id).find(".on_last_row").each(function(i){
			 if(jQuery(window).width()>980){  
			if(i==0){
			   jQuery(this).css('left','0');
			}else if(i==1){
				jQuery(this).css('left','33.2813%');
			}else{
				jQuery(this).css('left','66.6406%');
			}
			 }
		});*/
        if (init) {
           if (jQuery('.show').is(":visible")) {                
           	jQuery('.'+id).css('position','relative');
           	jQuery('.'+id).css('top','auto');
           	jQuery('.'+id).css('left','auto');			
      
           } else {
			}	
			jQuery('.menu-from-left-trigger-animation').removeClass('menu-from-left');
           	jQuery('.menu-from-right-trigger-animation').removeClass('menu-from-right');
           	jQuery('.'+id).find('.menu-from-right-trigger-animation').addClass('menu-from-right');
           	jQuery('.'+id).find('.menu-from-left-trigger-animation').addClass('menu-from-left');
			if( jQuery(window).width() <= 980 ){
				//scrollDown(".show", tailleHeaderDesktop, tailleHeaderMobile);
			}            
        } else {
        	jQuery('.'+id).css('position','relative');
        	jQuery('.'+id).css('top','auto');
        	jQuery('.'+id).css('left','auto');         
      }
      init=true;
		/***** Fonction dans page Galerie *****/
		checkHeight();
		
		if(jQuery("#gallery-div-content-video").hasClass("active") === true) {
			jQuery(".gallery-see-more-button").css("display", "none");
		}
  });
</script>

<!-- Expériences -->
<script>
/*Expériences*/
	var init = false;
	jQuery(document).ready(function () {
		//debugger;
	/*	jQuery('.div-content').css('position','absolute');
		jQuery('.div-content').css('top', '-999999px');
		jQuery('.div-content').css('left', '-999999px');
		jQuery('.div-content').first().trigger("click");*/
		init = true;
	});
	
	jQuery('.div-trigger').click(function (e) {
		//debugger;
		let div_trigger_clicked = jQuery(this);
		let scroll ="";
		if(jQuery(window).width()<=980){
			let offset = Math.round(div_trigger_clicked.offset().left)  + div_trigger_clicked.width()/2 ;
			if(offset<jQuery(window).width()/2){
				offset = Math.round(div_trigger_clicked.offset().left)  - div_trigger_clicked.width()/2 ;
				/*offset=-offset;*/
				if(offset - jQuery(window).width()/2 !=0){
					scroll= jQuery('.homepage-hotel-for-slider-buttons-row').scrollLeft()+(offset)-div_trigger_clicked.width()/2 ;
					jQuery('.homepage-hotel-for-slider-buttons-row').animate({
						scrollLeft:  scroll
					}, 1000);
				}
			}else{
				if(offset - jQuery(window).width()/2 !=0){
					scroll = jQuery('.homepage-hotel-for-slider-buttons-row').scrollLeft()+  offset - jQuery(window).width()/2
					jQuery('.homepage-hotel-for-slider-buttons-row').animate({
						scrollLeft: scroll
					}, 1000);
				}
			}
		}
		jQuery(".div-trigger").removeClass('active');
		jQuery(this).addClass('active');
        var tailleHeaderDesktop = 131; //Taille header  Desktop
        var tailleHeaderMobile = 70; //Taille header  Mobile
        let id = jQuery(this).attr('id');
        jQuery('.div-content').css('position','absolute');
        jQuery('.div-content').css('top', '-999999px');
        jQuery('.div-content').css('left', '-999999px');
        jQuery('.div-content').removeClass('show');
        jQuery('.' + id).addClass('show');
        jQuery('.'+id).css('position','relative');
        jQuery('.'+id).css('top','auto');
        jQuery('.'+id).css('left','auto');
		jQuery('.'+id).find(".on_last_row").each(function(i){
			 if(jQuery(window).width()>980){  
			if(i==0){
			   jQuery(this).css('left','0');
			}else if(i==1){
				jQuery(this).css('left','33.2813%');
			}else{
				jQuery(this).css('left','66.6406%');
			}
			 }
		});
        if (init) {
           if (jQuery('.show').is(":visible")) {                
           	jQuery('.'+id).css('position','relative');
           	jQuery('.'+id).css('top','auto');
           	jQuery('.'+id).css('left','auto');			
      
           } else {
			}	
			jQuery('.menu-from-left-trigger-animation').removeClass('menu-from-left');
           	jQuery('.menu-from-right-trigger-animation').removeClass('menu-from-right');
           	jQuery('.'+id).find('.menu-from-right-trigger-animation').addClass('menu-from-right');
           	jQuery('.'+id).find('.menu-from-left-trigger-animation').addClass('menu-from-left');
			if( jQuery(window).width() <= 980 ){
				//scrollDown(".show", tailleHeaderDesktop, tailleHeaderMobile);
			}            
        } else {
        	jQuery('.'+id).css('position','relative');
        	jQuery('.'+id).css('top','auto');
        	jQuery('.'+id).css('left','auto');         
      }
      init=true;

		document.body.style.overflowY = 'hidden';
  });
	
	jQuery(".close-popup").click(function() {
		document.body.style.overflowY = 'scroll';
		jQuery(".div-content").removeClass("show");
	});
	
	//NETO MENU BIODIVERSITE ET INTEGRATION SOCIALE
	var initChaton = false;
    jQuery(document).ready(function () {        
    	/*jQuery('.div-content-2').css('position','absolute');
        jQuery('.div-content-2').css('top', '-999999px');
        jQuery('.div-content-2').css('left', '-999999px');*/
		jQuery('.div-content-2').hide();
		jQuery('.div-trigger-open-first-2').trigger("click");
       // initChaton = true;
	});
	
    jQuery('.div-trigger-2').click(function (e) {
		//debugger;
		let div_trigger_clicked = jQuery(this).closest('.div-trigger-2');
		console.log("div_trigger_clicked",div_trigger_clicked);
        let scroll ="";
        if(jQuery(window).width()<=980){              			
        	let offset = Math.round(div_trigger_clicked.offset().left)  + div_trigger_clicked.width()/2 ;              		
            if(offset<jQuery(window).width()/2){
            	offset = Math.round(div_trigger_clicked.offset().left)  - div_trigger_clicked.width()/2 ;              		
              	/*offset=-offset;*/
              	if(offset - jQuery(window).width()/2 !=0){
              		scroll= jQuery('.homepage-hotel-for-slider-buttons-row').scrollLeft()+(offset)-div_trigger_clicked.width()/2 ;
              		jQuery('.homepage-hotel-for-slider-buttons-row').animate({
              			scrollLeft:  scroll
              		}, 1000);   		
              	}
			}else{
				if(offset - jQuery(window).width()/2 !=0){
					scroll = jQuery('.homepage-hotel-for-slider-buttons-row').scrollLeft()+  offset - jQuery(window).width()/2 
              		jQuery('.homepage-hotel-for-slider-buttons-row').animate({
						scrollLeft: scroll
					}, 1000);
				}
			}
		}
		jQuery(this).closest('.neto-menu-section').find(".div-trigger-2").removeClass('active');
        div_trigger_clicked.addClass('active');
        var tailleHeaderDesktop = 80; //Taille header  Desktop
        var tailleHeaderMobile = 60; //Taille header  Mobile
        let id = div_trigger_clicked.attr('id');
       /* jQuery('.div-content-2').css('position','absolute');
        jQuery('.div-content-2').css('top', '-999999px');
        jQuery('.div-content-2').css('left', '-999999px');*/
		// jQuery('.div-content-2').css('position','absolute');        
		
        jQuery(this).closest('.neto-menu-section').find('.'+id).css('position','relative');
        jQuery(this).closest('.neto-menu-section').find('.'+id).css('top','auto');
        jQuery(this).closest('.neto-menu-section').find('.'+id).css('left','auto');
		jQuery(this).closest('.neto-menu-section').find('.'+id).show();        
        //jQuery('#div-to-show-2').show();
        if (initChaton && jQuery(window).width()>980 ) {
			jQuery(this).closest('.neto-menu-section').find('.'+id).css('height', 'auto');
			jQuery(this).closest('.neto-menu-section').find('.'+id).css('left', '0');
			if (jQuery(this).closest('.neto-menu-section').find('.show-2').is(":visible") && jQuery(this).closest('.neto-menu-section').find('.show-2').length) {
				jQuery(this).closest('.neto-menu-section').find('.div-content-2').removeClass('show-2');
                jQuery(this).closest('.neto-menu-section').find('.' + id).addClass('show-2');
				jQuery(this).closest('.neto-menu-section').find('.div-content-2').css('position','absolute');
                jQuery(this).closest('.neto-menu-section').find('.div-content-2').css('top', '-999999px');
                jQuery(this).closest('.neto-menu-section').find('.div-content-2').css('left', '-999999px');
				jQuery(this).closest('.neto-menu-section').find('.div-content-2').hide();
				jQuery(this).closest('.neto-menu-section').find('.'+id).css('position','relative');
				jQuery(this).closest('.neto-menu-section').find('.'+id).css('top','auto');
				jQuery(this).closest('.neto-menu-section').find('.'+id).css('left','auto');
				jQuery(this).closest('.neto-menu-section').find('.'+id).show();
			} else{
				jQuery(this).closest('.neto-menu-section').find('.div-content-2').removeClass('show-2');
            	jQuery(this).closest('.neto-menu-section').find('.' + id).addClass('show-2');
				jQuery(this).closest('.neto-menu-section').find('.div-content-2').hide();
/*				jQuery(this).closest('.neto-menu-section').find('.'+id).animate({
                    height: "toggle",
                    opacity: 1,
                }, 900, function () {
                    //display:"none";                    
                    initChaton=true;
                });		*/		
				jQuery('.show-2').show();
			}	
			jQuery('.menu-from-left-trigger-animation').removeClass('menu-from-left');
           	jQuery('.menu-from-right-trigger-animation').removeClass('menu-from-right');
           	jQuery('.'+id).find('.menu-from-right-trigger-animation').addClass('menu-from-right');
           	jQuery('.'+id).find('.menu-from-left-trigger-animation').addClass('menu-from-left');
			if( jQuery(window).width() <= 980  && initChaton){
				//scrollDown(".div-trigger-2", tailleHeaderDesktop, tailleHeaderMobile);
			}
           // jQuery("html, body").animate({ scrollTop: (jQuery("#div-to-show").offset().top ) - tailleHeader }, 800);
		} else {
			/*jQuery('.'+id).css('position','relative');
        	jQuery('.'+id).css('top','auto');
        	jQuery('.'+id).css('left','auto');
			jQuery('.show-2').show();*/
			
			jQuery(this).closest('.neto-menu-section').find('.div-content-2').removeClass('show-2');
			jQuery(this).closest('.neto-menu-section').find('.div-content-2').hide();
			jQuery(this).closest('.neto-menu-section').find('.' + id).addClass('show-2');
/*			jQuery(this).closest('.neto-menu-section').find('.show-2').animate({
                    height: "toggle",
                    opacity: 1,
                }, 900, function () {
                    //display:"none";       
                              
                    initChaton=true;
                }); */
				jQuery('.show-2').show();			
		}
		if( jQuery(window).width() <= 980  && initChaton){
				//jQuery("html, body").animate({ scrollTop: (jQuery(this).closest('.neto-menu-section').find('.div-trigger-2').offset().top ) - tailleHeaderMobile }, 700);
			}
		initChaton=true;
	});
    jQuery('.close-div-to-show-2').click(function () {		
		/*jQuery('.div-content-2').css('position','absolute');
		jQuery('.div-content-2').css('top', '-999999px');
		jQuery('.div-content-2').css('left', '-999999px');
		jQuery('.div-trigger-2').removeClass('button-active');*/
/*		jQuery(this).closest('.neto-menu-section').find('.show-2').animate({
                    height: "toggle",
                    opacity: 1,
                }, 900, function () {
                    //display:"none";
                    jQuery(this).closest('.neto-menu-section').find('.div-content-2').hide();   
                    initChaton=false;
                }); */
		//initChaton = false;
	});
	
	jQuery('.div-trigger-2').find('a').removeAttr('href');
	jQuery('.homepage-hotel-for-slider-button-module').removeAttr('href');
	jQuery('.column-button-cta-module').removeAttr('href');
	jQuery('.column-close-button-cta-module').removeAttr('href');
	jQuery('.neto-menu-cta-module .et_pb_button').removeAttr('href');
	//FIN NETO MENU BIODIVERSITE ET INTEGRATION SOCIALE
	
</script>
<!-- FIN Neto Menu -->
<!-- FIN Expériences -->

<script>
	jQuery(".mobile_menu_bar").click(function() {
		if(!jQuery(".mobile_nav").hasClass("opened")) {
			document.body.style.overflowY = 'hidden';
		}
		else {
			document.body.style.overflowY = 'scroll';
		}
	});
</script>

<!-- Switch lang -->
<script>
	var pathname = window.location.pathname.split("/");
	var switch_lang = document.getElementsByClassName("switch-lang")[0].firstChild;
	if(pathname[1] === "en") {
		switch_lang.href += pathname[2];
	}
	else {
		switch_lang.href += pathname[1];
	}
</script>
<!-- FIN Switch lang -->

<script>
	 var lastClass="";
	 var index ="";
	jQuery(".pics-container div").on('click',function(e){
	if(jQuery(this).hasClass('open-js')){
		  restart();
		  return false;
	  }
	  let item = this;
      var pics = jQuery(this).closest(".div-content").find(".pics-container div");
	  let container = jQuery(this).closest(".div-content").find(".pics-container");
      var picsNb = pics.length;
      index = pics.index(this);
	 jQuery(this).closest('.div-content').find('.accomodation-text-column-section').removeClass('show');
	 jQuery(jQuery(this).closest('.div-content').find('.accomodation-text-column-section')[index+1]).addClass('show');
	 console.log('aze',jQuery(jQuery(this).closest('.div-content').find('.accomodation-text-column-section')[index]));
		
		if(lastClass!=""){
		  container.removeClass(lastClass);
		}
		
		lastClass = "open-img-"+(index+1);
		container.addClass(lastClass);
	  console.log("index",index);
      console.log("pics",pics);
      container.addClass("open-img");
      
	  pics.removeClass("small-animation");
      pics.removeClass("move-Translate-1");
      pics.removeClass("move-Translate-2");
      
		container.addClass();
   		if(jQuery(".open").length > 0){
        jQuery(".open").addClass("small-animation");   
      }
        pics.removeClass("open");
        pics.removeClass("open-js");
        
        jQuery(item).addClass("open-js");
      	container.addClass("show");
      	jQuery(item).addClass("open");
      if(pics.index(item)>0 && (pics.index(item)+1)%2==0 ){
        if(pics.index(item) <= picsNb/2){
         		//jQuery(pics[pics.index(item)+1]).addClass("move-Translate-1");  
           }else{
            // jQuery(pics[pics.index(item)+1]).addClass("move-Translate-2");
           }         
        }
      
        for (i = 0; i < picsNb; i++) {
            if (pics[i].classList.contains("open-js")) {
              
                for (j = 0; j < i; j++) {
                		jQuery(pics[j]).attr("data-order",1);
                    //pics[j].style.order = "1";
                }
              
                for (j = (picsNb - 1); j > i; j--) {
                  jQuery(pics[i]).attr("data-order",3);
                   // pics[j].style.order = "3";
                }

                if ((((i % 2) == 1) && (i < picsNb / 2)) || (((i % 2) == 1) && (i > picsNb / 2))) {
                  jQuery(pics[i]).attr("data-order",1);	          
                }            
              
                container.find(".popup-text-row").removeClass("show");
                container.find(".popup-text-row-" + (i + 1)).addClass("show");
              
            }
        }           
	});
	
jQuery(document).ready(function(){
	if(jQuery(window).width()<=980) {
		jQuery('.pics-container div:nth-child(1)').click();
	}
});
	function restart(){
		console.log("azezae");
		jQuery('.open-img').removeClass('show');
		jQuery('.open-img').removeClass('open-img');
		jQuery('.open-img').removeClass('open-img-1');
		jQuery('.open-img').removeClass('open-img-2');
		jQuery('.open-img').removeClass('open-img-4');
		jQuery('.open-img').removeClass('open-img-5');
		jQuery('.open-js').removeClass('small-animation');
		jQuery('.open-js').removeClass('open');
		jQuery('.open-js').removeClass('open-js');
		jQuery('.popup-text-row').removeClass('show');
		jQuery('.popup-text-row.base').addClass('show');
	}

	
</script>
<!-- Global site tag (gtag.js) - Google Ads: 386079901 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-386079901"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-386079901');
</script>
<!-- Event snippet for Website traffic conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-386079901/NkkxCJisl_YCEJ25jLgB'});
</script>

<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '719751992699481');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=719751992699481&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-233467589-1">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-233467589-1');
</script>
</body>
</html>
