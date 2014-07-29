/**
 * @version		$Id$
 * @author		NooTheme
 * @package		Joomla.Site
 * @subpackage	mod_noo_ticker
 * @copyright	Copyright (C) 2013 NooTheme. All rights reserved.
 * @license		License GNU General Public License version 2 or later; see LICENSE.txt, see LICENSE.php
 */

!function ($) {

  "use strict"

  var Nooticker = function (_e, _o) {
	
    this.$element = $(_e)
    this.options = _o
    this.am = new Array()
	this.am2 = new Array()
    this.options.items = $(".noo-ticker-item",this.$element)
    if(!this.options.items)
    	return
    	
    this.$element.css('height',this.options.items[0].offsetHeight)
    
    this.options.items.each(function(index,item){
    	if($(item).css('visibility') == "hidden"){
			$(item).css({
				visibility: 'visible',
				opacity: 0
			})
		}
    })
    var self = this

	this.onRunning = this.options.onRunning
	
	 if( isNaN(this.options.startItem) 
			|| (this.options.startItem > this.options.items.length || this.options.startItem < 0 ) ){
		this.options.startItem = 0 		 
	 }
	
	var maxWidth = 0
	this.options.items.each(function( index, _item){  
		// set z-index for each item in the list.							 
		 $(_item).css('z-index', self.options.items.length - index)
		
		 
		 $(_item).css('width', _item.offsetWidth)
		 
		  if( _item.offsetWidth > maxWidth ){
			  maxWidth = _item.offsetWidth
		  }
		  self.am2[index] = $(_item)
		  self.am2[index].offsetWidth= _item.offsetWidth
//			
		 if( self.options.mode != 'opacity' ) { 
			 self.am[index] = $(_item)
		 }
	})
	
	if(this.$element.offsetWidth <= 0 ){
	
		this.$element.css('width', maxWidth)
		// this.options.size = maxWidth
	}
	if( this.options.mode == 'vertical_up' ||   this.options.mode == 'vertical_down' ){
		this.options.msize = _e.offsetHeight	
	} else {
		this.options.msize = _e.offsetWidth	
	}
	// define list buttons drivent.
	this.buttons = {previous: [], next: [], play: [], playback: [], stop: []}
	this.options.autoRun = true
	// _options.buttons ={ next:} 
	if(_o.buttons ){
		for( var action in _o.buttons ) {
			this.bindingButtonsEvent( action, typeOf(_o.buttons[action])=='array' ? _o.buttons[action] : [_o.buttons[action]] )	
		}
	}	
	// if auto run
	if( this.options.autoRun ) {
		this.play( this.options.interval,'next',true )	
	}
	// process when mouse over and mouse out.
	
	this.$element.bind("mouseenter", function(){
		self.stop()									 
	})
	this.$element.bind("mouseleave", function(){										 	
		self.play(self.options.interval,'next',true)							 
	})
  }

Nooticker.prototype = {
	previous: function(manual) {
		this.options.currentIndex += this.options.currentIndex > 0 ? -1 : this.options.items.length-1
		this.running( null, manual, 'previous' )	
	},
	next:function(manual){ 	
		this.options.currentIndex += (this.options.currentIndex < this.options.items.length-1) ? 1 : (1 - this.options.items.length)
		this.running( null, manual, 'next' )
	},
	play: function( delay, direction, wait ){
		this.stop() 
		if(!wait){
			this[direction](false)
		}
		this.options.autoRun = this[direction].periodical(delay,this,false)
	},
	stop:function(){
		clearTimeout(this.options.autoRun)	
	},
	running: function( item, manual, runningMode ){ 	
		this.options.previousIndex = this.options.currentIndex + (this.options.currentIndex > 0 ? -1 : this.options.items.length-1)

		this.options.nextIndex = this.options.currentIndex + (this.options.currentIndex < this.options.items.length-1 ? 1 : 1-this.options.items.length)
		//
		// if next item then hide previous element
		//
		
		if( this.options.mode != 'opacity' ) {
			var size1
			var size2
			var m1 = {}
			var m2 = {}
			var c = this.options.modes[this.options.mode];
			if( this.options.mode == 'horizontal_right' || this.options.mode == 'vertical_up' ){
				size1 =  -(this.options.msize)
				size2 = this.options.msize
			} else {
				size1 = (this.options.msize)
				size2 =  -(this.options.msize)	
			}
			
			
			
			//window.console.log(m)
			if( runningMode == 'next' ) {
				switch ( this.options.mode) {
					case 'horizontal_left':
					case 'horizontal_right':
						m1 = {left:size1}
						m2 = {left:0}
						break
					case 'vertical_up':
					case 'vertical_down':
						m1 = {top:size1}
						m2 = {top:0}
						break
				}
				this.am2[this.options.previousIndex].css('opacity',1).animate({opacity:0},this.options.anOptions)
				this.am[this.options.previousIndex].css(c , 0).animate(m1,this.options.anOptions)
				this.am2[this.options.currentIndex].css('opacity',0).animate({opacity:1},this.options.anOptions)
				this.am[this.options.currentIndex].css(c ,+size2).animate(m2,this.options.anOptions)
				
			} else if( runningMode == 'previous') {
				switch ( this.options.mode) {
					case 'horizontal_left':
					case 'horizontal_right':
						m1 = {left:-(this.options.msize)}
						m2 = {left:0}
						break
					case 'vertical_up':
					case 'vertical_down':
						m1 = {top:-(this.options.msize)}
						m2 = {top:0}
						break
				}
				this.am2[this.options.nextIndex].css('opacity',1).animate({opacity:0},this.options.anOptions)
				this.am[this.options.nextIndex].css(c , 0 ).animate(m1,this.options.anOptions)
				
				this.am2[this.options.currentIndex].css('opacity',0).animate({opacity:1},this.options.anOptions)
				this.am[this.options.currentIndex].css( c , +(this.options.msize)).animate(m2,this.options.anOptions)
				

			}  
		} else {
			if( runningMode == 'next' ) {
				this.am2[this.options.previousIndex].css('opacity',1).animate({opacity:0},this.options.anOptions)
				this.am2[this.options.currentIndex].css('opacity',0).animate({opacity:1},this.options.anOptions)
				this.am2[this.options.previousIndex].css('z-index', 1)
				this.am2[this.options.currentIndex].css('z-index', this.options.items.length + 10)
			} else {
				this.am2[this.options.nextIndex].css('opacity',1).animate({opacity:0},this.options.anOptions)
				this.am2[this.options.currentIndex].css('opacity',0).animate({opacity:1},this.options.anOptions)
				this.am2[this.options.nextIndex].css('z-index', 1)
				this.am2[this.options.currentIndex].css('z-index', this.options.items.length + 10)
			}
		}

		if( manual ){ this.stop() }
		// if using callback method.
		if(this.onRunning){ 
			this.onRunning( this.options.items[this.options.currentIndex],(this.buttons ? this.buttons[this.options.currentIndex]:null) ) 
		}
		
		if( manual && this.options.autoRun ){ 
			this.play( this.options.interval,'next', true )
		}
	},
	bindingButtonsEvent:function( action, buttons ){ 
		for(var i=0; i<buttons.length; i++){
			switch(action){
				case 'next': 
					$(buttons[i]).bind(this.options.buttonEvent,this.previous.bind(this,true)); 
				break;
				case 'previous': 	
					$(buttons[i]).bind(this.options.buttonEvent,this.next.bind(this,true));
					break;
				case 'play':
					$(buttons[i]).bind(this.options.buttonEvent, this.play.bind( this,[this.options.interval,'next',false]) ); 
					break;
				case 'playback': 
					$(buttons[i]).bind( this.options.buttonEvent, 
					this.play.bind(this,[this.options.interval,'previous',false]));
						break;
				case 'stop':
					$(buttons[i]).bind(this.options.buttonEvent, this.stop.bind(this) ); break;
			}
			this.buttons[action].push(buttons[i]);
		}
	}
	
}


  $.fn.nooticker = function (option) {
    return this.each(function () {
      var $this = $(this)
        , data = $this.data('nooticker')
        , options = $.extend({}, $.fn.nooticker.defaults, typeof option == 'object' && option)
      if (!data) 
    	  $this.data('nooticker', (data = new Nooticker(this, options)))
    })
  }

$.fn.nooticker.defaults = {
    modes: {horizontal_left:'left',horizontal_right:'left', vertical_up:'top', vertical_down:'top'},
	msize:250,
	mode: 'horizontal_left',
	buttonEvent:'click',
	handlerEvent:'click',
	interval: 5000,
	autoRun:true,
	previousIndex:null,
	nextIndex: null,
	currentIndex:0,
	startItem: 0,
	onRunning:null
}
  $.fn.nooticker.Constructor = Nooticker
}(window.jQuery)