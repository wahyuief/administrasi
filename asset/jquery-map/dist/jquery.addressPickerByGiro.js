/*!
 * jQuery / jqLite Address Picker ByGiro
 *
 * varsion 0.1.0
 * Copyright 2015, G. Tomaselli
 * Licensed under the MIT license.
 *
 */

 
// compatibility for jQuery / jqLite
var bg = bg || false;
if(!bg){
	if(typeof jQuery != 'undefined'){
		bg = jQuery;
	} else if(typeof angular != 'undefined'){
		bg = angular.element;
		bg.extend = angular.extend;	
		
		bg.prototype.closest = function (selector){
			var el = this,matchesSelector = el.matches || el.matchesSelector || el.msMatchesSelector || el.mozMatchesSelector || el.webkitMatchesSelector || el.oMatchesSelector;
			
			while (el) {
			  if (matchesSelector.call(el,selector)) {
				return el;
			  } else {
				el = el.parentNode;
			  }
			}
			return false;
		}
		
		bg.prototype.is = function (selector){
			for(var i=0;i<this.length;i++){
				var el = this[i];
				if((el.matches || el.matchesSelector || el.msMatchesSelector || el.mozMatchesSelector || el.webkitMatchesSelector || el.oMatchesSelector).call(el, selector)) return true;
			}
			return false;
		}
		
		bg.prototype.find = function (selector){
			var context = this[0],matches = [];
			// Early return if context is not an element or document
			if (!context || (context.nodeType !== 1 && context.nodeType !== 9) || typeof selector != 'string') {
				return [];
			}
			
			for(var i=0;i<this.length;i++){
				var elm = this[i],
				nodes = bg(elm.querySelectorAll(selector));
				matches.push.apply(matches, nodes.slice());
			}
			
			return bg(matches);
		};
		
		
		function size(element,type){
			if(typeof element == 'undefined') return null;
			
			var paddingA = 'paddingTop',
			paddingB = 'paddingBottom',
			method = 'offsetHeight',
			computedStyle,result;
			if(type == 'width'){
				paddingA = 'paddingLeft';
				paddingB = 'paddingRight';
				method = 'offsetWidth';
			}

			computedStyle = getComputedStyle(element);
			result = element[method];
			if (computedStyle)
				result -= parseFloat(computedStyle[paddingA]) + parseFloat(computedStyle[paddingB]);
			return result;				
		}
			
		bg.prototype.width = function () {
			return size(this[0],'width');
		};
		
		bg.prototype.height = function () {
			size(this[0]);
		};
	}
}

;(function ($) {
    "use strict";
	var methods;

	var timer = {};
	function delay (callback, ms, type){
		clearTimeout (timer[type]);
		timer[type] = setTimeout(callback, ms);
	}
		
	function updateElements(data){			
		var that = this, data = data || this.addressMapping[this.$element.val()],$sel, resetTask = false;
		if(!data) resetTask = true;
		
		for ( var k in this.settings.boundElements) {
			var dataProp = this.settings.boundElements[k];
			
			var newValue = '';
			if(typeof dataProp == 'function'){
				newValue = dataProp.call(that,data);
				
				continue;
			}

			$sel = $(dataProp);
			if(!resetTask && ($sel.length < 0 || !data.cleanData)) continue;
			
			if(!resetTask){				
				if(k == 'address_components'){
					newValue = JSON.stringify(data.cleanData);
				} else {
					newValue = data.cleanData[k];				
				}
			}
	
			
			var listCount = $sel.length;
			for ( var i = 0; i < listCount; i ++){
				var method = 'val',
				it = $sel.eq(i);
				if(!it.is('input, select, textarea')){
					method = 'text';
				};
				it[method](newValue || '');
			}

		}
		
		that.removeSuggestions();
		if(!resetTask) that.$element.triggerHandler('selected.addressPickerByGiro', data);		
	}
	
	function createMarker(){
		var that = this,
		opts = that.settings,
		mapOptions = $.extend({}, opts.mapOptions);
		mapOptions.center = new google.maps.LatLng(mapOptions.center[0], mapOptions.center[1]);
		
		var markerOptions = {
			position: mapOptions.center,
			draggable: true,
			raiseOnDrag: true,
			map: that.gmap,
			labelContent: opts.text.you_are_here,
			labelAnchor: new google.maps.Point(0, 0),
			labelClass: opts.markerLabelClass,
			labelStyle: {
				opacity: 1
			}
		};
		
		// marker
		if (opts.markerType == 'styled' && typeof StyledMarker == "function"){
			// styled marker
			var styleIcon = new StyledIcon(StyledIconTypes.BUBBLE,{color:"#51A351",fore:'#ffffff',text:opts.text.you_are_here});
			markerOptions.styleIcon = styleIcon;				
			that.gmarker = new StyledMarker(markerOptions);				
		} else if (opts.markerType == 'labeled' && typeof MarkerWithLabel == "function"){
			// labeled marker
			that.gmarker = new MarkerWithLabel(markerOptions);
		} else {
			// default marker
			that.gmarker = new google.maps.Marker(markerOptions);
		}				
		
		// event triggered when marker is dragged and dropped
		google.maps.event.addListener(that.gmarker, "dragend", function () {
			that.geocodeLookup(that.gmarker.getPosition(), false, "latLng", true);
		});
		// event triggered when map is clicked
		google.maps.event.addListener(that.gmap, "click", function (event) {
			that.gmarker.setPosition(event.latLng);
			that.geocodeLookup(event.latLng, false, "latLng", true);
			that.resizeMap();
		});		
		
		this.gmarker.setVisible(false);
	}
	
	function createCircle(){		
		var that = this,
		opts = that.settings,
		radius,
		mapOptions = $.extend({}, opts.mapOptions);
		
		mapOptions.center = new google.maps.LatLng(mapOptions.center[0], mapOptions.center[1]);
		
		if(radius){
			radius = radius * 1000; // Km -> m
		}
		
		radius = radius || opts.distanceWidgetRadius;
		var circle =  new google.maps.Circle({
			center: mapOptions.center,
			radius: radius, // Km
			strokeColor: "#005DE0",
			strokeOpacity: 0.8,
			strokeWeight: 2,
			fillColor: "#005DE0",
			fillOpacity: 0.25,
			map: that.gmap
		}),
		handleMouseEnter = function ( event ) {
			circle.setEditable( true );
		},
		handleMouseLeave = function ( event ) {
			circle.setEditable( false );
		};
				
		that.gcircle = circle;
		that.gcircle.setVisible(false);	
		
		google.maps.event.addListener(that.gcircle, 'radius_changed', function(){
			that.updater();
		});
		google.maps.event.addListener( that.gcircle, 'mouseover', handleMouseEnter );
		google.maps.event.addListener( that.gcircle, 'mouseout' , handleMouseLeave );
		
		// bind circle to marker dragging
		that.gcircle.bindTo('center', that.gmarker, 'position');
	}	

    methods = {
        init: function ($element, options) {
            var that = this;
			
			that.defaults = {
				showMap: false,
                map: false,
                mapId: false,
				mapWidth: '100%',
				mapHeight: '300px',
                mapOptions: {
                    zoom: 7,
					zoomNoValue: 1,
                    center: [51.751724, -1.255284],
                    scrollwheel: false,
                    mapTypeId: "roadmap"
                },
				markerType: 'labeled', //false, /* labeled, styled */
				distanceWidget: false,
				distanceWidgetRadius: 30000,  /* meters */
                appendToAddressString: '',
                geocoderOptions: {
					language: "en"
                },
				searchInitialValue: true,
                boundElements: {},
				
				// internationalization
				text: {
					you_are_here: "You are here!",
					valid: "Valid Gmaps address",
					invalid: "Invalid Gmaps address"
				},
				map_rendered: false,
            };
			
            that.$element = $element;
            that.settings = $.extend({}, that.defaults, options);
			var opts = that.settings;
						
            // hash to store geocoder results keyed by address
            that.addressMapping = {};
            that.currentItem = '';
            that.geocoder = new google.maps.Geocoder();

			// let's add a container to the addresspicker
			that.$element.wrap('<div class="ap-container '+ (opts.showMap ? '' : 'ap-type-hidden') +'"></div>');

			// let's add a container to the input only
			that.$element.wrap('<div class="ap-input-cont"></div>');			
			
			// add icon/text valid address
			that.$element.after('<span class="ap-status-address"><span class="icon-ap"></span><span class="text-ap"></span></span>');
			
			that.$mainCont = that.$element.parent().parent();
			
            that.initMap.call(that);
			var ele = that.$mainCont[0],
			cont = that.$mainCont;
			
			function onEvent(e){				
				showHideMap(true, e);
			}
			
			function offEvent(e){				
				showHideMap(false, e);
			}
			
			function showHideMap(show, e){
				if(typeof show == 'undefined') return;
				
				delay(function(){
					if(show){
						cont.addClass('mouseishover');
						if(!that.$element.is(':focus')) return;
						
						that.$mapBox.addClass('map-active');
						that.resizeMap();
						
						if(that.$element.val() != '' && cont.hasClass('invalid-address')){
							that.showSuggestions();
						}
					} else {
						if(e.type == 'mouseout') cont.removeClass('mouseishover');
						
						if(cont.hasClass('mouseishover') || that.$element.is(':focus')) return;

						that.removeSuggestions();
						that.$mapBox.removeClass('map-active');
					}
				}, 50, 'showHide');			
			}

			ele.addEventListener("focus", onEvent, true);
			ele.addEventListener("blur", offEvent, true);
			ele.addEventListener("mouseover", onEvent, true);
			ele.addEventListener("mouseout", offEvent, true);
			
			cont
			.on('keyup',function(){
				var method = 'addClass',
				txt = opts.text.invalid,
				val = that.$element.val(),
				isValid = false;
				
				if(that.address && val.trim() == that.address.formatted_address) return;
				
				cont.removeClass('valid-address');
				if(val == ''){
					method = 'removeClass';
					txt = '';
					isValid = undefined;
				}
				cont[method]('invalid-address');					
				cont.find('.ap-status-address .text-ap').text(txt);
				
				// set we have an invalid address
				that.valid = isValid;
				
				// delete the current address value
				delete(that.address);
		
				that.showSuggestions();
			})
			.on('click',function(e){
				var li = $(e.target);

				if(!li.is('.suggestions-container li')){
					onEvent(e);
					return;
				}
				
				that.geocodeLookup(li.text(), false, '', true);	
				e.stopPropagation();
				
				that.removeSuggestions();
			});
			
			$(document).on('click', function(e){				
				var target = $(e.target);
				if(target.is('.suggestions-container li')) return;
				
				var thisAPicker = target.closest(cont[0]);
				if(!thisAPicker.length || !thisAPicker.is(cont[0])){
					that.removeSuggestions();
				}
			});
			
			// load current address if any
			if(opts.searchInitialValue && that.$element.val() != ''){
				that.geocodeLookup(that.$element.val(), false, '', true);
			}
        },
        initMap: function () {
			var that = this,
			opts = that.settings,mapBox,
			mapOptions, markerOptions;
            if (!opts.mapId && !(opts.map instanceof google.maps.Map)){
                // create map and hide it
				opts.mapId = (new Date).getTime() + Math.floor((Math.random() * 9999999) + 1);
				that.$mapBox = $('<div class="map-box" style="width: '+ opts.mapWidth +'; height: '+ opts.mapHeight +';" id="'+ opts.mapId +'"></div>');
				that.$mainCont.append(that.$mapBox);
            } else {
				that.$mapBox = $(opts.mapId);
			}
			mapBox = that.$mapBox.removeClass('map-active');
			
            if (that.map_rendered == true) {
                that.resizeMap.call(that);
                return;
            }
			
            mapOptions = opts.mapOptions = $.extend({}, that.defaults.mapOptions, opts.mapOptions);

			if(!(this.settings.map instanceof google.maps.Map)){
				mapOptions.center = new google.maps.LatLng(mapOptions.center[0], mapOptions.center[1]);
				this.gmap = new google.maps.Map(mapBox[0], mapOptions);
			} else {
				this.gmap = this.settings.map;
			}
			
			// create marker
			createMarker.call(this);

			// create circle
			if (this.settings.distanceWidget){
				createCircle.call(this);
			}
			
			that.map_rendered = true;
        },
        removeSuggestions: function () {
            this.$mainCont.find('.suggestions-container').remove();
		},
        showSuggestions: function () {
            var that = this;			
			
			delay(function(){
				that.geocodeLookup(that.$element.val(), function (geocoderResults){
					var html = '<div class="suggestions-container"><ul>',
					suggestionContainer = that.$mainCont.find('.suggestions-container');
					
					for(var a in this.addressMapping){
						html += '<li>'+ a +'</li>';
					}
					
					html += '</ul></div>';

					if(suggestionContainer.length){
						suggestionContainer.remove();
					}
					
					// add suggestions container
					that.$element.parent().after(html);
				}, false,false,true);
			}, 250, 'source');
			
        },
        updater: function (item) {
            var that = this,opts = that.settings, item = item || that.$element.val(),
			data = this.addressMapping[item] || false,
			propertiesMap,cleanData = {},latLng;

            if (!data) {
                return;
            }
			latLng = data.geometry.location;
			
			// cleanData
			propertiesMap = {
				'country': {
					'long_name': 'country',
					'short_name': 'country_code'
				},
				'administrative_area_level_1': {
					'long_name': 'region',
					'short_name': 'region_code'
				},
				'administrative_area_level_2': {
					'long_name': 'county',
					'short_name': 'county_code'
				},
				'locality': {
					'long_name': 'city'
				},
				'sublocality': {
					'long_name': 'city_district'
				},
				'postal_code': {
					'long_name': 'zip'
				},
				'route': {
					'long_name': 'street'
				},
				'street_number': {
					'long_name': 'street_number'
				}
			};		

			if(data.address_components){
				for(var a=0;a<data.address_components.length;a++){
					var adr = data.address_components[a];
					for(var p in propertiesMap){
						if(adr.types.indexOf(p) >= 0){
							for(var pp in propertiesMap[p]){
								if(typeof adr[pp] != 'undefined'){
									cleanData[propertiesMap[p][pp]] = adr[pp];
								}								
							}
						}
					}
				}
			}
			cleanData.latitude = Number(latLng.lat().toFixed(8));
			cleanData.longitude = Number(latLng.lng().toFixed(8));
			cleanData.formatted_address = data.formatted_address;

            if (that.gmarker) {
                that.gmarker.setPosition(data.geometry.location);
                that.gmarker.setVisible(true);

            }
			
			if(that.gcircle){
				that.gcircle.setCenter(data.geometry.location);
				that.gcircle.setVisible(true);

				cleanData.radius = Math.round(that.gcircle.getRadius()) / 1000;
			}

			if(that.gcircle){				
				that.gmap.fitBounds(that.gcircle.getBounds());
			} else {
				that.gmap.fitBounds(data.geometry.viewport);
			}

			that.address = data.cleanData = cleanData;
			
			that.$mainCont
				.addClass('valid-address')
				.removeClass('invalid-address')
				.find('.ap-status-address .text-ap').text(opts.text.valid);			
			
			that.valid = true;
			
			updateElements.call(that,data);

            return item;
        },
        getAddress: function(){
			return this.address;
        },
        reloadAddress: function(){
			this.setAddress(this.$element.val());
        },
        setAddress: function(address){
			this.geocodeLookup(address, false, '', true);
        },
        isValid: function(){
			return this.valid;
        },
        geocodeLookup: function (query, callback, type, updateUi, forceCall) {
			updateUi = updateUi || false;
			type = type || '';
			var that=this,
			opts = that.settings,
			request = $.extend({},opts.geocoderOptions);
			
			// immediately reset the input if we are going to perform a geocode lookup
			if(updateUi){
				// clean previous data
				updateElements.call(that);
			}				
			if(type == 'latLng'){
				if (typeof query == "string") {
					query = query.split(",");
					query = new google.maps.LatLng(query[0], query[1]);
				}
				request.latLng = query;
			} else {
				request.address = query + opts.appendToAddressString;
	
				// if we already have the address, we don't need to call google
				if(!forceCall && typeof callback == 'function' && typeof that.addressMapping[query] != 'undefined'){
					if(updateUi){
						that.updater(query);
					}					
					return;
				}				
			}

            this.geocoder.geocode(request, function (geocoderResults, status) {
                if(status !== google.maps.GeocoderStatus.OK) return;
				
				that.addressMapping = {};
				for ( var i = 0; (i < geocoderResults.length && i<9); i ++){ // limit to max 9 suggestions
					var element = geocoderResults[i];
					that.addressMapping[element.formatted_address] = element;
				}
				
				if (typeof callback == 'function') {
                    callback.call(that, geocoderResults);
                }
				
				if(updateUi){
					var address = geocoderResults[0].formatted_address;
					
					that.$element.val(address);
					// set we have a valid address
					that.addressMapping[address] = geocoderResults[0];
					that.updater(address);
				}
            });
        },
        resizeMap: function (latitude, longitude) {
			var that = this;
			delay(function(){
				var lastCenter,
				opts = that.settings,
				map_cont = that.$mapBox ? that.$mapBox.parent() : $("#" + opts.mapId).parent();
				
				if(!map_cont.length) return;
				
				var parent_map_cont = map_cont.parent(),
				h = parent_map_cont.height(),
				w = parent_map_cont.width();
				
				//map_cont.css("height", h);
				//map_cont.css("width", w);
				if (typeof latitude != "undefined" && typeof longitude != "undefined") {
						lastCenter = new google.maps.LatLng(latitude, longitude);
					} else {
						lastCenter = that.gmap.getCenter();
				}

				var zoom = !that.$element.val() ? opts.mapOptions.zoomNoValue : opts.mapOptions.zoom;
				that.gmap.setZoom(zoom);
				
				google.maps.event.trigger(that.gmap, "resize");
				that.gmap.setCenter(lastCenter);
			},300,'resize');			
        },
		setRadius: function(radius){ // in km
			var that = this;
			if(!that.gcircle) return;
			
			that.gcircle.setRadius(radius *1000);
			that.gmap.fitBounds(that.gcircle.getBounds());
		}
    };

    var main = function (method) {
		var addressPickerByGiro = this.data('addressPickerByGiro');
        if (addressPickerByGiro) {

			addressPickerByGiro.reloadAddress();	

			addressPickerByGiro.resizeMap();

            if (typeof method === 'string' && addressPickerByGiro[method]) {
                return addressPickerByGiro[method].apply(addressPickerByGiro, Array.prototype.slice.call(arguments, 1));
            }
            return console.log('Method ' +  method + ' does not exist on jQuery.addressPickerByGiro');
        } else {
            if (!method || typeof method === 'object') {
				
				var listCount = this.length;
				for ( var i = 0; i < listCount; i ++) {
					var $this = $(this[i]);
                    addressPickerByGiro = $.extend({}, methods);
                    addressPickerByGiro.init($this, method);
                    $this.data('addressPickerByGiro', addressPickerByGiro);
				};

				return this;
            }
            return console.log('jQuery.addressPickerByGiro is not instantiated. Please call $("selector").addressPickerByGiro({options})');
        }
    };

	// plugin integration
	if($.fn){
		$.fn.addressPickerByGiro = main;
	} else {
		$.prototype.addressPickerByGiro = main;
	}
}(bg));
