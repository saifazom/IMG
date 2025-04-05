(function(){
	function IMGScripts(){
		var _self = this;
		
		_self.$blogCategoriesWrap = jQuery('.c-blog__categories');
		
		// Methods
		
		// Manage sliders
		_self.manageSliders();
		
		// Manage Scroll Magic animations
		_self.manageScrollMagicAnimations();
		
		// Manage Accordion
		_self.manageFaqAccordion();
		
		// Manage Site Pre-loader
		_self.sitePreloader();
		
		// Manage on click actions
		_self.manageOnClickActions();
		
		// Manage On Hover Actions
		_self.manageOnHoverActions();
		
		// Manage On Scroll actions
		_self.manageOnScrollActions();
		
		// Manage blog page loading
		_self.manageBlogPage();
	}
	
	IMGScripts.prototype.manageBlogPage = function(){
		// Code goes here
		var _self = this;
		_self.$blogCategoriesWrap = jQuery('#blog-categories');
		_self.$blogPostsWrap = jQuery('#blog-posts-wrap');
		_self.$blogFooter = jQuery('#blog-footer');
		_self.$blogLoadMoreBtn = jQuery('.js-load-more-blog');
		_self.state = {
			category: 'all',
			current_index: 1,
			posts: []
		}
		
		jQuery('[data-blog-category]').on('click', function(e){
			e.preventDefault();
			
			// Assign variables
			var $handler = jQuery(this),
				categoryName = $handler.data('blog-category'),
				$handlerParent = $handler.parent('li');
			
			// Do nothing if we are already active
			if($handlerParent.hasClass('active')) return;
			
			
			// Change the clicked page as active
			_self.$blogCategoriesWrap.find('li').removeClass('active');
			$handlerParent.addClass('active');
			
			// Update State
			_self.state.category = categoryName;
			_self.state.current_index = 1;
			_self.state.posts = [];
			
			// Hide posts and show loader
			_self.showBlogLoader();
			
			// do the ajax call
			var blogPromise = jQuery.ajax({
				dataType: 'json',
				type: 'GET',
				data: {
					posts_per_page: _self.state.posts_per_page,
					current_index: _self.state.current_index,
					category: _self.state.category,
					type: 'by-category',
					action: 'load-posts-by-category'
				},
				url: js_vars.ajax_url
			});
			
			blogPromise.done(function(data){
				_self.$blogPostsWrap.html(data.html);
				
				// Hide posts and show loader
				if(data.show_button){
					_self.hideBlogLoader();	
				}
			});
		});
		
		
		_self.$blogLoadMoreBtn.on('click', function(e){
			e.preventDefault();
			
			var $handler = jQuery(this);
			
			// Change button text
			$handler.text('Loading more...');
			
			// State management
			_self.state.current_index = _self.state.current_index + 1;
			
			// do the ajax call
			var blogPromise = jQuery.ajax({
				dataType: 'json',
				type: 'GET',
				data: {
					current_index: _self.state.current_index,
					category: _self.state.category,
					type: 'by-on-load',
					action: 'load-posts-by-category'
				},
				url: js_vars.ajax_url
			});
			
			blogPromise.done(function(data){
				_self.$blogPostsWrap.append(data.html);
				
				// Use the previous button label
				$handler.text('Keep Exploring');
				
				// Hide posts and show loader
				if(!data.show_button){
					_self.$blogFooter.hide();
				}
			});
		});
	}
	
	// Show loader in blog page
	IMGScripts.prototype.showBlogLoader = function(){
		var _self = this;
		
		_self.$blogFooter.hide();
		_self.$blogPostsWrap.html(`<div class="loader"><div class="ball-pulse-sync"><div></div><div></div><div></div></div></div>`);
	};
	
	// hide loader in blog page
	IMGScripts.prototype.hideBlogLoader = function(){
		var _self = this;
		
		_self.$blogFooter.show();
	};
	
	IMGScripts.prototype.manageSliders = function(){
		jQuery('.js-brand-slider').slick({
			autoplay: true,
			dots: false,
			arrows: false,
			infinite: true,
			pauseOnHover: false,
			pauseOnFocus: false,
			speed: 900,
			autoplaySpeed: 2000,
			slidesToShow: 5,
			slidesToScroll: 1,
			// easing: 'easeOutSine',
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3
					}
				},
				{
					breakpoint: 767,
					settings: {
						slidesToShow: 2
					}
				},
				{
					breakpoint: 640,
					settings: {
						slidesToShow: 1,
						arrows: true,
						prevArrow: jQuery('.c-brand-slider__left-arrow'),
						nextArrow: jQuery('.c-brand-slider__right-arrow'),
					}
				}
			]
		});
	
		jQuery('.js-join-us-slider').slick({
			autoplay: true,
			dots: false,
			arrows: true,
			infinite: true,
			pauseOnHover: false,
			pauseOnFocus: false,
			speed: 900,
			autoplaySpeed: 3000,
			slidesToShow: 4,
			slidesToScroll: 1,
			// easing: 'easeOutSine',
			prevArrow: jQuery('#join-us-prev'),
			nextArrow: jQuery('#join-us-next'),
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3
					}
				},
				{
					breakpoint: 767,
					settings: {
						slidesToShow: 2
					}
				},
				{
					breakpoint: 640,
					settings: {
						slidesToShow: 1
					}
				}
			]
		});
	
		jQuery('.js-testimonials-slider').slick({
			autoplay: true,
			dots: false,
			arrows: true,
			infinite: true,
			pauseOnHover: false,
			pauseOnFocus: false,
			speed: 900,
			autoplaySpeed: 5000,
			slidesToShow: 3,
			slidesToScroll: 1,
			// easing: 'easeOutBounce',
			prevArrow: jQuery('#testimonial-prev'),
			nextArrow: jQuery('#testimonial-next'),
			rows: 0,
			responsive: [
				{
					breakpoint: 767,
					settings: {
						slidesToShow: 1
					}
				},{
					breakpoint: 1024,
					settings: {
						slidesToShow: 2
					}
				}
			]
		})
		.on('setPosition', function (event, slick) {
			slick.$slides.css('height', slick.$slideTrack.height() + 'px');
		});
	
		jQuery('.js-resources-videos').slick({
			autoplay: false,
			dots: false,
			arrows: true,
			infinite: true,
			pauseOnHover: false,
			pauseOnFocus: false,
			speed: 900,
			autoplaySpeed: 5000,
			slidesToShow: 2,
			slidesToScroll: 1,
			// easing: 'easeOutBounce',
			prevArrow: jQuery('#resources-videos-prev'),
			nextArrow: jQuery('#resources-videos-next'),
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 1
						// adaptiveHeight: true
					}
				}
			]
		});
	
		jQuery('.js-testimonials-blue-slider').slick({
			autoplay: false,
			dots: false,
			arrows: true,
			infinite: true,
			pauseOnHover: false,
			pauseOnFocus: false,
			speed: 900,
			autoplaySpeed: 5000,
			slidesToShow: 2,
			slidesToScroll: 1,
			// easing: 'easeOutBounce',
			prevArrow: jQuery('#testimonial-prev'),
			nextArrow: jQuery('#testimonial-next'),
			responsive: [
				{
					breakpoint: 767,
					settings: {
						slidesToShow: 1
					}
				},
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 2
					}
				},
				{
					breakpoint: 2300,
					settings: {
						slidesToShow: 2
					}
				},
				{
					breakpoint: 5000,
					settings: {
						slidesToShow: 3
					}
				}
			]
		})
		.on('setPosition', function (event, slick) {
			slick.$slides.css('height', slick.$slideTrack.height() + 'px');
		});
	
		jQuery('.js-testimonials-blue-slider2').slick({
			autoplay: false,
			dots: false,
			arrows: true,
			infinite: true,
			pauseOnHover: false,
			pauseOnFocus: false,
			speed: 900,
			autoplaySpeed: 5000,
			slidesToShow: 3,
			slidesToScroll: 1,
			// easing: 'easeOutBounce',
			prevArrow: jQuery('#testimonial-prev'),
			nextArrow: jQuery('#testimonial-next'),
			responsive: [
				{
					breakpoint: 767,
					settings: {
						slidesToShow: 1
					}
				},
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 2
					}
				},
				{
					breakpoint: 2300,
					settings: {
						slidesToShow: 3
					}
				}
			]
		})
		.on('setPosition', function (event, slick) {
			slick.$slides.css('height', slick.$slideTrack.height() + 'px');
		});
	
		jQuery('.js-culture-slider').slick({
			fade: true,
			autoplay: false,
			dots: false,
			arrows: true,
			infinite: true,
			pauseOnHover: false,
			pauseOnFocus: false,
			speed: 900,
			autoplaySpeed: 8000,
			slidesToShow: 1,
			slidesToScroll: 1,
			// easing: 'easeOutBounce',
			prevArrow: jQuery('#testimonial-prev'),
			nextArrow: jQuery('#testimonial-next')
		});
	}
	
	IMGScripts.prototype.manageScrollMagicAnimations = function(){
		var controller = new ScrollMagic.Controller();
		
		jQuery(window).on('load', function($){
			jQuery('.u-tweenmax-image').each(function(){
				var $tweenMaxImage = jQuery(this);
				var tweenMaxImageWidth = $tweenMaxImage.outerWidth();
				var tweenMaxImageHeight = $tweenMaxImage.outerHeight();
				
				TweenMax.set($tweenMaxImage,{clip:"rect("+tweenMaxImageHeight+"px "+Math.round(tweenMaxImageWidth)+"px "+tweenMaxImageHeight+"px 0px)"});
				
				var currentScreen = this;
				var featuredPostScene = new ScrollMagic.Scene({
					triggerElement: currentScreen,
					triggerHook: 0.9,
					reverse: false
				})
				.on('start', function(){
					var $handler = jQuery(this.triggerElement());
					
					TweenMax.to($tweenMaxImage,0.9,{clip:"rect(0px "+tweenMaxImageWidth+"px "+tweenMaxImageHeight+"px 0px)",delay:0.3, ease:Power3.easeOut,clearProps:"clip"});
				})
				.addTo(controller);
			}); 
			
			jQuery('.u-tweenmax-image-hero').each(function(){
				var $tweenMaxImage = jQuery(this);
				var tweenMaxImageWidth = $tweenMaxImage.outerWidth();
				var tweenMaxImageHeight = $tweenMaxImage.outerHeight();
				
				TweenMax.set($tweenMaxImage,{clip:"rect("+tweenMaxImageHeight+"px "+Math.round(tweenMaxImageWidth)+"px "+tweenMaxImageHeight+"px 0px)"});
				
				var currentScreen = this;
				var featuredPostScene = new ScrollMagic.Scene({
					triggerElement: currentScreen,
					triggerHook: 0.9,
					reverse: false
				})
				.on('start', function(){
					var $handler = jQuery(this.triggerElement());
					
					TweenMax.to($tweenMaxImage,0.9,{clip:"rect(0px "+tweenMaxImageWidth+"px "+tweenMaxImageHeight+"px 0px)",delay:1, ease:Power3.easeOut,clearProps:"clip"});
				})
				.addTo(controller);
			}); 
		});	
		
		// Whole site text load animation
		var $animationElementsOnButton = jQuery('.wow-load-on-more');
		var memberVisible = 4;
	
		TweenMax.set($animationElementsOnButton, {y:60});
		TweenMax.set($animationElementsOnButton, {opacity:0});
		
		jQuery('.c-our-team__more-link').on('click', function(e){
			e.preventDefault();
			
			var $handler = jQuery(this);
			var $teamParentWrap = $handler.parents('.c-our-team__section');
			var $teamParent = $teamParentWrap.find('.grid-x');
			var delay = 0.5;
			
			$teamItems = $teamParent.find('.wow-load-on-more');
			
			$teamItems.map(function(key, $teamItem){
				if(key < 40) {
					memberVisible = memberVisible + 1;
					jQuery($teamItem).removeClass('wow-load-on-more').show();
					delay = delay + 0.1;
					
					TweenMax.to($teamItem, 0.8, {y:0, ease:Power2.easeOut, delay: delay});
					TweenMax.to($teamItem, 0.9, {opacity:1, ease:Power2.easeOut, delay: delay});	
				}
			});
			
			if($teamParent.find('.c-our-team__col').length <= memberVisible ){
				$handler.hide();
			}
		});
		
		
		var $animationElements = jQuery('.wow.wow-visible');
	
		TweenMax.set($animationElements, {y:60});
		TweenMax.set($animationElements, {opacity:0});
	
		jQuery(window).on('load', function(){		
			jQuery('.wow.wow-visible').each(function(){
				var currentScreen = this;
				var animationScene = new ScrollMagic.Scene({
					triggerElement: currentScreen,
					triggerHook: 1,
					reverse: false
				})
				.on('start', function(){
					var $handler = jQuery(this.triggerElement());
					var itemDelay = 0.2;
					
					itemDelay = $handler.data('delay');
					
					TweenMax.to($handler, 0.8, {y:0, ease:Power2.easeOut, delay: itemDelay});
					TweenMax.to($handler, 0.9, {opacity:1, ease:Power2.easeOut, delay: itemDelay});
				})
				.addTo(controller);
			}); 
		});
		
		// Index page animations
		new ScrollMagic.Scene({
			triggerElement: ".c-why-img__image-wrap",
			triggerHook: 1,
			duration: "300%",
		})
		.setTween(TweenMax.fromTo(".u-fatty-image--index",1, {y: "0%"}, {y: "-13%", ease: Power3.easeOut}, 0))
		.addTo(controller);
		
		// Individuals & Family
		new ScrollMagic.Scene({
			triggerElement: ".u-fatty-hero-image-trigger--families",
			triggerHook: 0.5,
			duration: "300%",
		})
		.setTween(TweenMax.fromTo(".u-fatty-div--families",1, {y: "0%"}, {y: "-10%", ease: Power3.easeOut}, 0))
		.addTo(controller);
		
		new ScrollMagic.Scene({
			triggerElement: ".u-fatty-image-trigger--families",
			triggerHook: 1,
			duration: "300%",
		})
		.setTween(TweenMax.fromTo(".u-fatty-image--families",1, {y: "0%"}, {y: "-13%", ease: Power3.easeOut}, 0))
		.addTo(controller);
		
		new ScrollMagic.Scene({
			triggerElement: ".u-fatty-image-trigger--families-mobile",
			triggerHook: 1,
			duration: "300%",
		})
		.setTween(TweenMax.fromTo(".u-fatty-image--families-mobile",1, {y: "0%"}, {y: "-13%", ease: Power3.easeOut}, 0))
		.addTo(controller);
			
		// Business Page
		new ScrollMagic.Scene({
			triggerElement: ".u-fatty-hero-image-trigger",
			triggerHook: 0.5,
			duration: "300%",
		})
		.setTween(TweenMax.fromTo(".u-fatty-div--business",1, {y: "0%"}, {y: "-10%", ease: Power3.easeOut}, 0))
		.addTo(controller);
		
		new ScrollMagic.Scene({
			triggerElement: ".u-fatty-hero-mobile-image-trigger",
			triggerHook: 1,
			duration: "300%",
		})
		.setTween(TweenMax.fromTo(".u-fatty-div--business-mobile",1, {y: "0%"}, {y: "-13%", ease: Power3.easeOut}, 0))
		.addTo(controller);
		
		new ScrollMagic.Scene({
			triggerElement: ".u-fatty-image-trigger--business",
			triggerHook: 1,
			duration: "300%",
		})
		.setTween(TweenMax.fromTo(".u-fatty-image--business",1, {y: "0%"}, {y: "-13%", ease: Power3.easeOut}, 0))
		.addTo(controller);
		
		new ScrollMagic.Scene({
			triggerElement: ".u-fatty-image-trigger--business-mobile",
			triggerHook: 1,
			duration: "300%",
		})
		.setTween(TweenMax.fromTo(".u-fatty-image--business-mobile",1, {y: "0%"}, {y: "-13%", ease: Power3.easeOut}, 0))
		.addTo(controller);
		
			
		// Employers page
		new ScrollMagic.Scene({
			triggerElement: ".u-fatty-hero-image-trigger--employer",
			triggerHook: 0.5,
			duration: "300%",
		})
		.setTween(TweenMax.fromTo(".u-fatty-div--employer",1, {y: "0%"}, {y: "-10%", ease: Power3.easeOut}, 0))
		.addTo(controller);
		
		new ScrollMagic.Scene({
			triggerElement: ".u-fatty-hero-mobile-image-trigger--employer",
			triggerHook: 1,
			duration: "300%",
		})
		.setTween(TweenMax.fromTo(".u-fatty-div--employer-mobile",1, {y: "0%"}, {y: "-13%", ease: Power3.easeOut}, 0))
		.addTo(controller);
		
		new ScrollMagic.Scene({
			triggerElement: ".u-fatty-image-trigger--employer",
			triggerHook: 1,
			duration: "300%",
		})
		.setTween(TweenMax.fromTo(".u-fatty-image--employers",1, {y: "0%"}, {y: "-13%", ease: Power3.easeOut}, 0))
		.addTo(controller);
		
		new ScrollMagic.Scene({
			triggerElement: ".u-fatty-image-trigger--employer-mobile",
			triggerHook: 1,
			duration: "300%",
		})
		.setTween(TweenMax.fromTo(".u-fatty-image--employers-mobile",1, {y: "0%"}, {y: "-13%", ease: Power3.easeOut}, 0))
		.addTo(controller);
		
		// Careers page
		new ScrollMagic.Scene({
			triggerElement: ".u-fatty-image-trigger--careers",
			triggerHook: 0.9,
			duration: "300%",
		})
		.setTween(TweenMax.fromTo(".u-fatty-image--careers",1, {y: "0%"}, {y: "-13%", ease: Power3.easeOut}, 0))
		.addTo(controller);
	}
	
	// Manage Accordion
	IMGScripts.prototype.manageFaqAccordion = function(){
		jQuery(".js-accordion").on("click", ".js-accordion__header", function () {
			/* Config Section */
			var duration = 400;
			var easing = "swing";
			var scrollTo = true;
			var scrollToOffset = 167;
		
			var handler = jQuery(this);
			var allSection = jQuery(".js-accordion__section");
			var allContent = jQuery(".js-accordion__content");
			var choosedSection = handler.closest(".js-accordion__section");
			var choosedContent = choosedSection.find(".js-accordion__content");
			
			var targetOffset = choosedSection.offset().top - scrollToOffset;
	
			if (choosedSection.hasClass("active")) return;
		
			if (scrollTo == true) {
				allContent.slideUp(duration, easing);
				choosedContent.slideDown(duration, easing, function () {
					targetOffset = choosedSection.offset().top - scrollToOffset;
					jQuery("html,body").animate({
						scrollTop: targetOffset,
					});
					allSection.removeClass("active");
					choosedSection.addClass("active");
				});
			} else {
				allContent.slideUp(duration, easing);
				choosedContent.slideDown(duration, easing, function () {
					allSection.removeClass("active");
					choosedSection.addClass("active");
				});
			}
		
			return false;
		});
		
		jQuery(".js-accordion__section.active .icon").on("click", function () {
			var handler = jQuery(this);
			var choosedSection = handler.closest(".js-accordion__section");
			var choosedContent = choosedSection.find(".js-accordion__content");
				
			choosedContent.slideUp(function () {
				choosedSection.removeClass("active");
			});
		});
	}
	
	// Site Preloader
	IMGScripts.prototype.sitePreloader = function(){
		jQuery(window).on('load', function($){
			var $preloaderParent = jQuery('#the-preloader');
			var $body = jQuery('body, html');
		
			$preloaderParent.delay(350).fadeOut('slow');
			$body.delay(350).css({ 'overflow': 'visible' });
			
			if (window.location.hash) {
				var hash = window.location.hash;
			
				if (jQuery(hash).length) {
					setTimeout(function(){
						jQuery('html, body').animate({
							scrollTop: jQuery(hash).offset().top - 150
						}, 900, 'swing');	
					}, 600)
				}
			}
			
			if(jQuery('.c-our-locations__map-embed').length){
				jQuery('.c-our-locations__map-embed').prev().css('min-height', jQuery('.c-our-locations__map-embed').height()+'px');
			}
		});
		
		jQuery(window).on('resize', function(){
			if(jQuery('.c-our-locations__map-embed').length){
				jQuery('.c-our-locations__map-embed').prev().css('min-height', jQuery('.c-our-locations__map-embed').height()+'px');
			}
		});
	}
	
	// Manage On Click Actions
	IMGScripts.prototype.manageOnClickActions = function(){
		
		jQuery('#resource-categories').find('a').on('click', function(e){
			e.preventDefault();
			
			var $handler = jQuery(this),
				target = $handler.data('target');
				
			if($handler.parent('li').hasClass('active')) return;
			
			jQuery('#resource-categories').find('li').removeClass('active');
			$handler.parent('li').addClass('active');
			
			if(target == 'all'){
				jQuery('#resources-contents').find('.c-resources-video__item').show();
			}else{
				jQuery('#resources-contents').find('.c-resources-video__item').hide();
				jQuery('#resources-contents').find('.'+target).show();
			}
		});
		
		jQuery('.c-faq-main__category-item').on('click', function(e){
			e.preventDefault();
			
			if(jQuery(this).hasClass('active')){
				jQuery('.c-faq-main__category-item').removeClass('active');	
				jQuery('.c-faq-main-accordion__section').show();
				
				return;
			};
			
			jQuery(".js-accordion__content").hide();
			jQuery(".js-accordion__section").removeClass('active');
			
			jQuery('.c-faq-main__category-item').removeClass('active');
			jQuery(this).addClass('active');
			
			var tagid = jQuery(this).data('cat');
			jQuery('.c-faq-main-accordion__section').hide();
			jQuery('[data-faq-target="'+tagid+'"]').show();
		});
	
		jQuery('a[data-rel^=lightcase]').lightcase();
		
		jQuery(".js-scroll-btn, .js-down-btn").on("click", function (e) {
			e.preventDefault();
			if(jQuery(window).width() > 767){
				jQuery("html, body").animate({
					scrollTop: jQuery(jQuery.attr(this, "href")).offset().top - 150,
				}, 600);  
			}else{
				jQuery("html, body").animate({
					scrollTop: jQuery(jQuery.attr(this, "href")).offset().top - 50,
				}, 600);
			}
		});
		
		jQuery(".c-search-page__categories a").on("click", function(e){
			e.preventDefault();
			
			var $handler = jQuery(this);
			var $parent = $handler.parent('li');
			var $allParent = jQuery(".c-search-page__categories li");
			var $searchItem = jQuery('.c-search-page__result-item');
			var $noResultWrap = jQuery('.c-search-page__no-result-wrap');
			
			if(!$parent.hasClass('active')){
				var $target = $parent.data('target-type');
				
				$allParent.removeClass('active');
				$parent.addClass('active');
				
				if($target == 'all'){
					$searchItem.show();	
				}else{
					$searchItem.hide();	
					
					if(jQuery('[data-item-type="'+$target+'"]').length){
						jQuery('[data-item-type="'+$target+'"]').show();
						
						$noResultWrap.hide();
					}else{
						$noResultWrap.show();
					}
				}
			}
		});
		
		jQuery(".js-scroll-btn").on("click", function (e) {
			e.preventDefault();
			jQuery("html, body").animate({
				scrollTop: jQuery(jQuery.attr(this, "href")).offset().top - 150,
			}, 600);
		});
		
		jQuery(".js-scroll-btn2").on("click", function (e) {
			e.preventDefault();
			jQuery("html, body").animate({
				scrollTop: jQuery(jQuery.attr(this, "href")).offset().top,
			}, 600);
		});
		
		jQuery(".js-down-btn").on("click", function (e) {
			e.preventDefault();
			jQuery("html, body").animate({
				scrollTop: jQuery(jQuery.attr(this, "href")).offset().top - 150,
			}, 600);
		});
		
		jQuery(".sub-menu-item-industries-we-serve").on("click", function (e) {
			if(jQuery('body').hasClass('page-template-tpl-businesses')){
				e.preventDefault();
				jQuery("html, body").animate({
					scrollTop: jQuery('#bu-coverage-opt').offset().top - 150,
				}, 600);	
			}
		});
		
		function toggleHamburger() {
			jQuery(".js-hamburger-trgr,.c-hamburger__trgrs,.c-header").toggleClass("opend");
			jQuery(".c-hamburger").toggleClass("move-to-top");
			jQuery(".c-hamburger ul li").toggleClass("animated");
		}
		
		jQuery(".js-hamburger-trgr").on("click tap", function () {
			toggleHamburger();
		});
		
		jQuery(document).on('click', function (e) {
			if (e.keyCode === 27) {
				toggleHamburger();
			}
		});
		
		jQuery(".c-our-locations__item strong").on("click", function () {
			var $handler = jQuery(this);
			var mapIndex = $handler.parents(".c-our-locations__item").data("map-index");
		
			if(jQuery(window).width() <= 767){
				jQuery('html, body').animate({
					scrollTop: jQuery('.c-our-locations__map').offset().top - 70
				}, 600);
			}
			
			if (mapIndex && jQuery(".map-item-" + mapIndex).length) {
				jQuery(".c-our-locations__map-item").hide();
				jQuery(".map-item-" + mapIndex).show();
			}
		});
		
		jQuery(".c-our-locations__more").on("click", function () {
			if(jQuery(window).width() <= 767){
				jQuery('html, body').animate({
					scrollTop: jQuery('.c-our-locations__map').offset().top - 70
				}, 600);
			}
			
			jQuery(".c-our-locations__map-item").hide();
			jQuery(".map-item-all").show();
			
			return false;
		});
		
		jQuery(".c-hamburger,.c-search__wrap form,.js-search-trgr").on('click', function (e) {
			e.stopPropagation();
		});
		
		jQuery(".o-panel,.s-hamburger-menu li a").on('click', function () {
			jQuery(".c-hamburger").removeClass("move-to-top");
			jQuery(".js-hamburger-trgr,.c-hamburger__trgrs,.c-header").removeClass("opend");
		});
		
		jQuery(".js-search-trgr").on('click', function () {
			jQuery("#s-search-modal").fadeIn();
		});
		
		jQuery("body").on('click', function () {
			jQuery("#s-search-modal").fadeOut();
		});
	}
	
	// Manage On Hover Actions
	IMGScripts.prototype.manageOnHoverActions = function(){
		jQuery(".c-other-product__box").hover( function () {
			jQuery(this).parent('.c-other-product__col').css('z-index', '100');
			jQuery(this).addClass('is-hover');
			
			if (jQuery(window).width() > 1024) {
				jQuery(this).children(".c-other-product__text").slideDown('fast');
			}
		}, function(){
			var $handler = jQuery(this);
			if (jQuery(window).width() > 1024) {
				if(jQuery(this).children(".c-other-product__text").length){
					jQuery(this).children(".c-other-product__text").slideUp('fast', function(){
						$handler.parent('.c-other-product__col').css('z-index', '1');
						$handler.removeClass('is-hover');
					});	
				}else{
					$handler.parent('.c-other-product__col').css('z-index', '1');
					$handler.removeClass('is-hover');
				}
			}else{
				$handler.parent('.c-other-product__col').css('z-index', '1');
				$handler.removeClass('is-hover');
			}
		});
	}
	
	// Manage on scroll actions
	IMGScripts.prototype.manageOnScrollActions = function(){
		jQuery(window).on('scroll', function () {
			var scroll = jQuery(window).scrollTop();
		
			if (scroll >= 5) {
				jQuery("body").addClass("sticky");
			} else {
				jQuery("body").removeClass("sticky");
			}
		});
	}
	
	new IMGScripts();
}());