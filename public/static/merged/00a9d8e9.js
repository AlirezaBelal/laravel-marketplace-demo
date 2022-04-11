/*[PATH @digikala/supernova-digikala-desktop/assets/local/js/libs/flipclock.js]*/
/*
	Base.js, version 1.1a
	Copyright 2006-2010, Dean Edwards
	License: http://www.opensource.org/licenses/mit-license.php
*/

var Base = function() {
	// dummy
};

Base.extend = function(_instance, _static) { // subclass
	
	"use strict";
	
	var extend = Base.prototype.extend;
	
	// build the prototype
	Base._prototyping = true;
	
	var proto = new this();
	
	extend.call(proto, _instance);
	
	proto.base = function() {
	// call this method from any other method to invoke that method's ancestor
	};

	delete Base._prototyping;
	
	// create the wrapper for the constructor function
	//var constructor = proto.constructor.valueOf(); //-dean
	var constructor = proto.constructor;
	var klass = proto.constructor = function() {
		if (!Base._prototyping) {
			if (this._constructing || this.constructor == klass) { // instantiation
				this._constructing = true;
				constructor.apply(this, arguments);
				delete this._constructing;
			} else if (arguments[0] !== null) { // casting
				return (arguments[0].extend || extend).call(arguments[0], proto);
			}
		}
	};
	
	// build the class interface
	klass.ancestor = this;
	klass.extend = this.extend;
	klass.forEach = this.forEach;
	klass.implement = this.implement;
	klass.prototype = proto;
	klass.toString = this.toString;
	klass.valueOf = function(type) {
		//return (type == "object") ? klass : constructor; //-dean
		return (type == "object") ? klass : constructor.valueOf();
	};
	extend.call(klass, _static);
	// class initialisation
	if (typeof klass.init == "function") klass.init();
	return klass;
};

Base.prototype = {	
	extend: function(source, value) {
		if (arguments.length > 1) { // extending with a name/value pair
			var ancestor = this[source];
			if (ancestor && (typeof value == "function") && // overriding a method?
				// the valueOf() comparison is to avoid circular references
				(!ancestor.valueOf || ancestor.valueOf() != value.valueOf()) &&
				/\bbase\b/.test(value)) {
				// get the underlying method
				var method = value.valueOf();
				// override
				value = function() {
					var previous = this.base || Base.prototype.base;
					this.base = ancestor;
					var returnValue = method.apply(this, arguments);
					this.base = previous;
					return returnValue;
				};
				// point to the underlying method
				value.valueOf = function(type) {
					return (type == "object") ? value : method;
				};
				value.toString = Base.toString;
			}
			this[source] = value;
		} else if (source) { // extending with an object literal
			var extend = Base.prototype.extend;
			// if this object has a customised extend method then use it
			if (!Base._prototyping && typeof this != "function") {
				extend = this.extend || extend;
			}
			var proto = {toSource: null};
			// do the "toString" and other methods manually
			var hidden = ["constructor", "toString", "valueOf"];
			// if we are prototyping then include the constructor
			var i = Base._prototyping ? 0 : 1;
			while (key = hidden[i++]) {
				if (source[key] != proto[key]) {
					extend.call(this, key, source[key]);

				}
			}
			// copy each of the source object's properties to this object
			for (var key in source) {
				if (!proto[key]) extend.call(this, key, source[key]);
			}
		}
		return this;
	}
};

// initialise
Base = Base.extend({
	constructor: function() {
		this.extend(arguments[0]);
	}
}, {
	ancestor: Object,
	version: "1.1",
	
	forEach: function(object, block, context) {
		for (var key in object) {
			if (this.prototype[key] === undefined) {
				block.call(context, object[key], key, object);
			}
		}
	},
		
	implement: function() {
		for (var i = 0; i < arguments.length; i++) {
			if (typeof arguments[i] == "function") {
				// if it's a function, call it
				arguments[i](this.prototype);
			} else {
				// add the interface using the extend method
				this.prototype.extend(arguments[i]);
			}
		}
		return this;
	},
	
	toString: function() {
		return String(this.valueOf());
	}
});
/*jshint smarttabs:true */

var FlipClock;
	
/**
 * FlipClock.js
 *
 * @author     Justin Kimbrell
 * @copyright  2013 - Objective HTML, LLC
 * @licesnse   http://www.opensource.org/licenses/mit-license.php
 */
	
(function($) {
	
	"use strict";
	
	/**
	 * FlipFlock Helper
	 *
	 * @param  object  A jQuery object or CSS select
	 * @param  int     An integer used to start the clock (no. seconds)
	 * @param  object  An object of properties to override the default	
	 */
	 
	FlipClock = function(obj, digit, options) {
		if(digit instanceof Object && digit instanceof Date === false) {
			options = digit;
			digit = 0;
		}

		return new FlipClock.Factory(obj, digit, options);
	};

	/**
	 * The global FlipClock.Lang object
	 */

	FlipClock.Lang = {};
	
	/**
	 * The Base FlipClock class is used to extend all other FlipFlock
	 * classes. It handles the callbacks and the basic setters/getters
	 *	
	 * @param 	object  An object of the default properties
	 * @param 	object  An object of properties to override the default	
	 */

	FlipClock.Base = Base.extend({
		
		/**
		 * Build Date
		 */
		 
		buildDate: '2014-12-12',
		
		/**
		 * Version
		 */
		 
		version: '0.7.7',
		
		/**
		 * Sets the default options
		 *
		 * @param	object 	The default options
		 * @param	object 	The override options
		 */
		 
		constructor: function(_default, options) {
			if(typeof _default !== "object") {
				_default = {};
			}
			if(typeof options !== "object") {
				options = {};
			}
			this.setOptions($.extend(true, {}, _default, options));
		},
		
		/**
		 * Delegates the callback to the defined method
		 *
		 * @param	object 	The default options
		 * @param	object 	The override options
		 */
		 
		callback: function(method) {
		 	if(typeof method === "function") {
				var args = [];
								
				for(var x = 1; x <= arguments.length; x++) {
					if(arguments[x]) {
						args.push(arguments[x]);
					}
				}
				
				method.apply(this, args);
			}
		},
		 
		/**
		 * Log a string into the console if it exists
		 *
		 * @param 	string 	The name of the option
		 * @return	mixed
		 */		
		 
		log: function(str) {
			if(window.console && console.log) {
				console.log(str);
			}
		},
		 
		/**
		 * Get an single option value. Returns false if option does not exist
		 *
		 * @param 	string 	The name of the option
		 * @return	mixed
		 */		
		 
		getOption: function(index) {
			if(this[index]) {
				return this[index];
			}
			return false;
		},
		
		/**
		 * Get all options
		 *
		 * @return	bool
		 */		
		 
		getOptions: function() {
			return this;
		},
		
		/**
		 * Set a single option value
		 *
		 * @param 	string 	The name of the option
		 * @param 	mixed 	The value of the option
		 */		
		 
		setOption: function(index, value) {
			this[index] = value;
		},
		
		/**
		 * Set a multiple options by passing a JSON object
		 *
		 * @param 	object 	The object with the options
		 * @param 	mixed 	The value of the option
		 */		
		
		setOptions: function(options) {
			for(var key in options) {
	  			if(typeof options[key] !== "undefined") {
		  			this.setOption(key, options[key]);
		  		}
		  	}
		}
		
	});
	
}(jQuery));

/*jshint smarttabs:true */

/**
 * FlipClock.js
 *
 * @author     Justin Kimbrell
 * @copyright  2013 - Objective HTML, LLC
 * @licesnse   http://www.opensource.org/licenses/mit-license.php
 */
	
(function($) {
	
	"use strict";
	
	/**
	 * The FlipClock Face class is the base class in which to extend
	 * all other FlockClock.Face classes.
	 *
	 * @param 	object  The parent FlipClock.Factory object
	 * @param 	object  An object of properties to override the default	
	 */
	 
	FlipClock.Face = FlipClock.Base.extend({
		
		/**
		 * Sets whether or not the clock should start upon instantiation
		 */
		 
		autoStart: true,

		/**
		 * An array of jQuery objects used for the dividers (the colons)
		 */
		 
		dividers: [],

		/**
		 * An array of FlipClock.List objects
		 */		
		 
		factory: false,
		
		/**
		 * An array of FlipClock.List objects
		 */		
		 
		lists: [],

		/**
		 * Constructor
		 *
		 * @param 	object  The parent FlipClock.Factory object
		 * @param 	object  An object of properties to override the default	
		 */
		 
		constructor: function(factory, options) {
			this.dividers = [];
			this.lists = [];
			this.base(options);
			this.factory = factory;
		},
		
		/**
		 * Build the clock face
		 */
		 
		build: function() {
			if(this.autoStart) {
				this.start();
			}
		},
		
		/**
		 * Creates a jQuery object used for the digit divider
		 *
		 * @param	mixed 	The divider label text
		 * @param	mixed	Set true to exclude the dots in the divider. 
		 *					If not set, is false.
		 */
		 
		createDivider: function(label, css, excludeDots) {
			if(typeof css == "boolean" || !css) {
				excludeDots = css;
				css = label;
			}

			var dots = [
				'<span class="'+this.factory.classes.dot+' top"></span>',
				'<span class="'+this.factory.classes.dot+' bottom"></span>'
			].join('');

			if(excludeDots) {
				dots = '';	
			}

			label = this.factory.localize(label);

			var html = [
				'<span class="'+this.factory.classes.divider+' '+(css ? css : '').toLowerCase()+'">',
					'<span class="'+this.factory.classes.label+'">'+(label ? label : '')+'</span>',
					dots,
				'</span>'
			];	
			
			var $html = $(html.join(''));

			this.dividers.push($html);

			return $html;
		},
		
		/**
		 * Creates a FlipClock.List object and appends it to the DOM
		 *
		 * @param	mixed 	The digit to select in the list
		 * @param	object  An object to override the default properties
		 */
		 
		createList: function(digit, options) {
			if(typeof digit === "object") {
				options = digit;
				digit = 0;
			}

			var obj = new FlipClock.List(this.factory, digit, options);
		
			this.lists.push(obj);

			return obj;
		},
		
		/**
		 * Triggers when the clock is reset
		 */

		reset: function() {
			this.factory.time = new FlipClock.Time(
				this.factory, 
				this.factory.original ? Math.round(this.factory.original) : 0,
				{
					minimumDigits: this.factory.minimumDigits
				}
			);

			this.flip(this.factory.original, false);
		},

		/**
		 * Append a newly created list to the clock
		 */

		appendDigitToClock: function(obj) {
			obj.$el.append(false);
		},

		/**
		 * Add a digit to the clock face
		 */
		 
		addDigit: function(digit) {
			var obj = this.createList(digit, {
				classes: {
					active: this.factory.classes.active,
					before: this.factory.classes.before,
					flip: this.factory.classes.flip
				}
			});

			this.appendDigitToClock(obj);
		},
		
		/**
		 * Triggers when the clock is started
		 */
		 
		start: function() {},
		
		/**
		 * Triggers when the time on the clock stops
		 */
		 
		stop: function() {},
		
		/**
		 * Auto increments/decrements the value of the clock face
		 */
		 
		autoIncrement: function() {
			if(!this.factory.countdown) {
				this.increment();
			}
			else {
				this.decrement();
			}
		},

		/**
		 * Increments the value of the clock face
		 */
		 
		increment: function() {
			this.factory.time.addSecond();
		},

		/**
		 * Decrements the value of the clock face
		 */

		decrement: function() {
			if(this.factory.time.getTimeSeconds() == 0) {
	        	this.factory.stop()
			}
			else {
				this.factory.time.subSecond();
			}
		},
			
		/**
		 * Triggers when the numbers on the clock flip
		 */
		 
		flip: function(time, doNotAddPlayClass) {
			var t = this;

			$.each(time, function(i, digit) {
				var list = t.lists[i];

				if(list) {
					if(!doNotAddPlayClass && digit != list.digit) {
						list.play();	
					}

					list.select(digit);
				}	
				else {
					t.addDigit(digit);
				}
			});
		}
					
	});
	
}(jQuery));

/*jshint smarttabs:true */

/**
 * FlipClock.js
 *
 * @author     Justin Kimbrell
 * @copyright  2013 - Objective HTML, LLC
 * @licesnse   http://www.opensource.org/licenses/mit-license.php
 */
	
(function($) {
	
	"use strict";
	
	/**
	 * The FlipClock Factory class is used to build the clock and manage
	 * all the public methods.
	 *
	 * @param 	object  A jQuery object or CSS selector used to fetch
	 				    the wrapping DOM nodes
	 * @param 	mixed   This is the digit used to set the clock. If an 
	 				    object is passed, 0 will be used.	
	 * @param 	object  An object of properties to override the default	
	 */
	 	
	FlipClock.Factory = FlipClock.Base.extend({
		
		/**
		 * The clock's animation rate.
		 * 
		 * Note, currently this property doesn't do anything.
		 * This property is here to be used in the future to
		 * programmaticaly set the clock's animation speed
		 */		

		animationRate: 1000,

		/**
		 * Auto start the clock on page load (True|False)
		 */	
		 
		autoStart: true,
		
		/**
		 * The callback methods
		 */		
		 
		callbacks: {
			destroy: false,
			create: false,
			init: false,
			interval: false,
			start: false,
			stop: false,
			reset: false
		},
		
		/**
		 * The CSS classes
		 */		
		 
		classes: {
			active: 'flip-clock-active',
			before: 'flip-clock-before',
			divider: 'flip-clock-divider',
			dot: 'flip-clock-dot',
			label: 'flip-clock-label',
			flip: 'flip',
			play: 'play',
			wrapper: 'flip-clock-wrapper'
		},
		
		/**
		 * The name of the clock face class in use
		 */	
		 
		clockFace: 'HourlyCounter',
		 
		/**
		 * The name of the clock face class in use
		 */	
		 
		countdown: false,
		 
		/**
		 * The name of the default clock face class to use if the defined
		 * clockFace variable is not a valid FlipClock.Face object
		 */	
		 
		defaultClockFace: 'HourlyCounter',
		 
		/**
		 * The default language
		 */	
		 
		defaultLanguage: 'english',
		 
		/**
		 * The jQuery object
		 */		
		 
		$el: false,

		/**
		 * The FlipClock.Face object
		 */	
		 
		face: true,
		 
		/**
		 * The language object after it has been loaded
		 */	
		 
		lang: false,
		 
		/**
		 * The language being used to display labels (string)
		 */	
		 
		language: 'english',
		 
		/**
		 * The minimum digits the clock must have
		 */		

		minimumDigits: 0,

		/**
		 * The original starting value of the clock. Used for the reset method.
		 */		
		 
		original: false,
		
		/**
		 * Is the clock running? (True|False)
		 */		
		 
		running: false,
		
		/**
		 * The FlipClock.Time object
		 */		
		 
		time: false,
		
		/**
		 * The FlipClock.Timer object
		 */		
		 
		timer: false,
		
		/**
		 * The jQuery object (depcrecated)
		 */		
		 
		$wrapper: false,
		
		/**
		 * Constructor
		 *
		 * @param   object  The wrapping jQuery object
		 * @param	object  Number of seconds used to start the clock
		 * @param	object 	An object override options
		 */
		 
		constructor: function(obj, digit, options) {

			if(!options) {
				options = {};
			}

			this.lists = [];
			this.running = false;
			this.base(options);	

			this.$el = $(obj).addClass(this.classes.wrapper);

			// Depcrated support of the $wrapper property.
			this.$wrapper = this.$el;

			this.original = (digit instanceof Date) ? digit : (digit ? Math.round(digit) : 0);

			this.time = new FlipClock.Time(this, this.original, {
				minimumDigits: this.minimumDigits,
				animationRate: this.animationRate 
			});

			this.timer = new FlipClock.Timer(this, options);

			this.loadLanguage(this.language);
			
			this.loadClockFace(this.clockFace, options);

			if(this.autoStart) {
				this.start();
			}

		},
		
		/**
		 * Load the FlipClock.Face object
		 *
		 * @param	object  The name of the FlickClock.Face class
		 * @param	object 	An object override options
		 */
		 
		loadClockFace: function(name, options) {	
			var face, suffix = 'Face', hasStopped = false;
			
			name = name.ucfirst()+suffix;

			if(this.face.stop) {
				this.stop();
				hasStopped = true;
			}

			this.$el.html('');

			this.time.minimumDigits = this.minimumDigits;
			
			if(FlipClock[name]) {
				face = new FlipClock[name](this, options);
			}
			else {
				face = new FlipClock[this.defaultClockFace+suffix](this, options);
			}
			
			face.build();

			this.face = face;

			if(hasStopped) {
				this.start();
			}
			
			return this.face;
		},
				
		/**
		 * Load the FlipClock.Lang object
		 *
		 * @param	object  The name of the language to load
		 */
		 
		loadLanguage: function(name) {	
			var lang;
			
			if(FlipClock.Lang[name.ucfirst()]) {
				lang = FlipClock.Lang[name.ucfirst()];
			}
			else if(FlipClock.Lang[name]) {
				lang = FlipClock.Lang[name];
			}
			else {
				lang = FlipClock.Lang[this.defaultLanguage];
			}
			
			return this.lang = lang;
		},
					
		/**
		 * Localize strings into various languages
		 *
		 * @param	string  The index of the localized string
		 * @param	object  Optionally pass a lang object
		 */

		localize: function(index, obj) {
			var lang = this.lang;

			if(!index) {
				return null;
			}

			var lindex = index.toLowerCase();

			if(typeof obj == "object") {
				lang = obj;
			}

			if(lang && lang[lindex]) {
				return lang[lindex];
			}

			return index;
		},
		 

		/**
		 * Starts the clock
		 */
		 
		start: function(callback) {
			var t = this;

			if(!t.running && (!t.countdown || t.countdown && t.time.time > 0)) {
				t.face.start(t.time);
				t.timer.start(function() {
					t.flip();
					
					if(typeof callback === "function") {
						callback();
					}	
				});
			}
			else {
				t.log('Trying to start timer when countdown already at 0');
			}
		},
		
		/**
		 * Stops the clock
		 */
		 
		stop: function(callback) {
			this.face.stop();
			this.timer.stop(callback);
			
			for(var x in this.lists) {
				if (this.lists.hasOwnProperty(x)) {
					this.lists[x].stop();
				}
			}	
		},
		
		/**
		 * Reset the clock
		 */
		 
		reset: function(callback) {
			this.timer.reset(callback);
			this.face.reset();
		},
		
		/**
		 * Sets the clock time
		 */
		 
		setTime: function(time) {
			this.time.time = time;
			this.flip(true);		
		},
		
		/**
		 * Get the clock time
		 *
		 * @return  object  Returns a FlipClock.Time object
		 */
		 
		getTime: function(time) {
			return this.time;		
		},
		
		/**
		 * Changes the increment of time to up or down (add/sub)
		 */
		 
		setCountdown: function(value) {
			var running = this.running;
			
			this.countdown = value ? true : false;
				
			if(running) {
				this.stop();
				this.start();
			}
		},
		
		/**
		 * Flip the digits on the clock
		 *
		 * @param  array  An array of digits	 
		 */
		flip: function(doNotAddPlayClass) {	
			this.face.flip(false, doNotAddPlayClass);
		}
		
	});
		
}(jQuery));

/*jshint smarttabs:true */

/**
 * FlipClock.js
 *
 * @author     Justin Kimbrell
 * @copyright  2013 - Objective HTML, LLC
 * @licesnse   http://www.opensource.org/licenses/mit-license.php
 */
	
(function($) {
	
	"use strict";
	
	/**
	 * The FlipClock List class is used to build the list used to create 
	 * the card flip effect. This object fascilates selecting the correct
	 * node by passing a specific digit.
	 *
	 * @param 	object  A FlipClock.Factory object
	 * @param 	mixed   This is the digit used to set the clock. If an 
	 *				    object is passed, 0 will be used.	
	 * @param 	object  An object of properties to override the default	
	 */
	 	
	FlipClock.List = FlipClock.Base.extend({
		
		/**
		 * The digit (0-9)
		 */		
		 
		digit: 0,
		
		/**
		 * The CSS classes
		 */		
		 
		classes: {
			active: 'flip-clock-active',
			before: 'flip-clock-before',
			flip: 'flip'	
		},
				
		/**
		 * The parent FlipClock.Factory object
		 */		
		 
		factory: false,
		
		/**
		 * The jQuery object
		 */		
		 
		$el: false,

		/**
		 * The jQuery object (deprecated)
		 */		
		 
		$obj: false,
		
		/**
		 * The items in the list
		 */		
		 
		items: [],
		
		/**
		 * The last digit
		 */		
		 
		lastDigit: 0,
			
		/**
		 * Constructor
		 *
		 * @param  object  A FlipClock.Factory object
		 * @param  int     An integer use to select the correct digit
		 * @param  object  An object to override the default properties	 
		 */
		 
		constructor: function(factory, digit, options) {
			this.factory = factory;
			this.digit = digit;
			this.lastDigit = digit;
			this.$el = this.createList();
			
			// Depcrated support of the $obj property.
			this.$obj = this.$el;

			if(digit > 0) {
				this.select(digit);
			}

			this.factory.$el.append(this.$el);
		},
		
		/**
		 * Select the digit in the list
		 *
		 * @param  int  A digit 0-9	 
		 */
		 
		select: function(digit) {
			if(typeof digit === "undefined") {
				digit = this.digit;
			}
			else {
				this.digit = digit;
			}

			if(this.digit != this.lastDigit) {
				var $delete = this.$el.find('.'+this.classes.before).removeClass(this.classes.before);

				this.$el.find('.'+this.classes.active).removeClass(this.classes.active)
													  .addClass(this.classes.before);

				this.appendListItem(this.classes.active, this.digit);

				$delete.remove();

				this.lastDigit = this.digit;
			}	
		},
		
		/**
		 * Adds the play class to the DOM object
		 */
		 		
		play: function() {
			this.$el.addClass(this.factory.classes.play);
		},
		
		/**
		 * Removes the play class to the DOM object 
		 */
		 
		stop: function() {
			var t = this;

			setTimeout(function() {
				t.$el.removeClass(t.factory.classes.play);
			}, this.factory.timer.interval);
		},
		
		/**
		 * Creates the list item HTML and returns as a string 
		 */
		createListItem: function(css, value) {

			var id= ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
			var valStr = String( value );
			var perValue = valStr.replace(/[0-9]/g, function(w){
				return id[+w];
			});
			return [
				'<li class="'+(css ? css : '')+'">',
					'<a href="#">',
						'<div class="up">',
							'<div class="shadow"></div>',
							'<div class="inn">'+(value ? perValue : '')+'</div>',
						'</div>',
						'<div class="down">',
							'<div class="shadow"></div>',
							'<div class="inn">'+(value ? perValue : '')+'</div>',
						'</div>',
					'</a>',
				'</li>'
			].join('');
		},

		/**
		 * Append the list item to the parent DOM node 
		 */

		appendListItem: function(css, value) {
			var html = this.createListItem(css, value);

			this.$el.append(html);
		},

		/**
		 * Create the list of digits and appends it to the DOM object 
		 */
		 
		createList: function() {

			var lastDigit = this.getPrevDigit() ? this.getPrevDigit() : this.digit;

			var html = $([
				'<ul class="'+this.classes.flip+' '+(this.factory.running ? this.factory.classes.play : '')+'">',
					this.createListItem(this.classes.before, lastDigit),
					this.createListItem(this.classes.active, this.digit),
				'</ul>'
			].join(''));
					
			return html;
		},

		getNextDigit: function() {
			return this.digit == 9 ? 0 : this.digit + 1;
		},

		getPrevDigit: function() {
			return this.digit == 0 ? 9 : this.digit - 1;
		}

	});
	
	
}(jQuery));

/*jshint smarttabs:true */

/**
 * FlipClock.js
 *
 * @author     Justin Kimbrell
 * @copyright  2013 - Objective HTML, LLC
 * @licesnse   http://www.opensource.org/licenses/mit-license.php
 */
	
(function($) {
	
	"use strict";
	
	/**
	 * Capitalize the first letter in a string
	 *
	 * @return string
	 */
	 
	String.prototype.ucfirst = function() {
		return this.substr(0, 1).toUpperCase() + this.substr(1);
	};
	
	/**
	 * jQuery helper method
	 *
	 * @param  int     An integer used to start the clock (no. seconds)
	 * @param  object  An object of properties to override the default	
	 */
	 
	$.fn.FlipClock = function(digit, options) {	
		return new FlipClock($(this), digit, options);
	};
	
	/**
	 * jQuery helper method
	 *
	 * @param  int     An integer used to start the clock (no. seconds)
	 * @param  object  An object of properties to override the default	
	 */
	 
	$.fn.flipClock = function(digit, options) {
		return $.fn.FlipClock(digit, options);
	};
	
}(jQuery));

/*jshint smarttabs:true */

/**
 * FlipClock.js
 *
 * @author     Justin Kimbrell
 * @copyright  2013 - Objective HTML, LLC
 * @licesnse   http://www.opensource.org/licenses/mit-license.php
 */
	
(function($) {
	
	"use strict";
			
	/**
	 * The FlipClock Time class is used to manage all the time 
	 * calculations.
	 *
	 * @param 	object  A FlipClock.Factory object
	 * @param 	mixed   This is the digit used to set the clock. If an 
	 *				    object is passed, 0 will be used.	
	 * @param 	object  An object of properties to override the default	
	 */
	 	
	FlipClock.Time = FlipClock.Base.extend({
		
		/**
		 * The time (in seconds) or a date object
		 */		
		 
		time: 0,
		
		/**
		 * The parent FlipClock.Factory object
		 */		
		 
		factory: false,
		
		/**
		 * The minimum number of digits the clock face must have
		 */		
		 
		minimumDigits: 0,

		/**
		 * Constructor
		 *
		 * @param  object  A FlipClock.Factory object
		 * @param  int     An integer use to select the correct digit
		 * @param  object  An object to override the default properties	 
		 */
		 
		constructor: function(factory, time, options) {
			if(typeof options != "object") {
				options = {};
			}

			if(!options.minimumDigits) {
				options.minimumDigits = factory.minimumDigits;
			}

			this.base(options);
			this.factory = factory;

			if(time) {
				this.time = time;
			}
		},

		/**
		 * Convert a string or integer to an array of digits
		 *
		 * @param   mixed  String or Integer of digits	 
		 * @return  array  An array of digits 
		 */
		 
		convertDigitsToArray: function(str) {
			var data = [];
			
			str = str.toString();
			
			for(var x = 0;x < str.length; x++) {
				if(str[x].match(/^\d*$/g)) {
					data.push(str[x]);	
				}
			}
			
			return data;
		},
		
		/**
		 * Get a specific digit from the time integer
		 *
		 * @param   int    The specific digit to select from the time	 
		 * @return  mixed  Returns FALSE if no digit is found, otherwise
		 *				   the method returns the defined digit	 
		 */
		 
		digit: function(i) {
			var timeStr = this.toString();
			var length  = timeStr.length;
			
			if(timeStr[length - i])	 {
				return timeStr[length - i];
			}
			
			return false;
		},

		/**
		 * Formats any array of digits into a valid array of digits
		 *
		 * @param   mixed  An array of digits	 
		 * @return  array  An array of digits 
		 */
		 
		digitize: function(obj) {
			var data = [];

			$.each(obj, function(i, value) {
				value = value.toString();
				
				if(value.length == 1) {
					value = '0'+value;
				}
				
				for(var x = 0; x < value.length; x++) {
					data.push(value.charAt(x));
				}				
			});

			if(data.length > this.minimumDigits) {
				this.minimumDigits = data.length;
			}
			
			if(this.minimumDigits > data.length) {
				for(var x = data.length; x < this.minimumDigits; x++) {
					data.unshift('0');
				}
			}

			return data;
		},
		
		/**
		 * Gets a new Date object for the current time
		 *
		 * @return  array  Returns a Date object
		 */

		getDateObject: function() {
			if(this.time instanceof Date) {
				return this.time;
			}

			return new Date((new Date()).getTime() + this.getTimeSeconds() * 1000);
		},
		
		/**
		 * Gets a digitized daily counter
		 *
		 * @return  object  Returns a digitized object
		 */

		getDayCounter: function(includeSeconds) {
			var digits = [
				this.getDays(),
				this.getHours(true),
				this.getMinutes(true)
			];

			if(includeSeconds) {
				digits.push(this.getSeconds(true));
			}

			return this.digitize(digits);
		},

		/**
		 * Gets number of days
		 *
		 * @param   bool  Should perform a modulus? If not sent, then no.
		 * @return  int   Retuns a floored integer
		 */
		 
		getDays: function(mod) {
			var days = this.getTimeSeconds() / 60 / 60 / 24;
			
			if(mod) {
				days = days % 7;
			}
			
			return Math.floor(days);
		},
		
		/**
		 * Gets an hourly breakdown
		 *
		 * @return  object  Returns a digitized object
		 */
		 
		getHourCounter: function() {
			var obj = this.digitize([
				this.getHours(),
				this.getMinutes(true),
				this.getSeconds(true)
			]);
			
			return obj;
		},
		
		/**
		 * Gets an hourly breakdown
		 *
		 * @return  object  Returns a digitized object
		 */
		 
		getHourly: function() {
			return this.getHourCounter();
		},
		
		/**
		 * Gets number of hours
		 *
		 * @param   bool  Should perform a modulus? If not sent, then no.
		 * @return  int   Retuns a floored integer
		 */
		 
		getHours: function(mod) {
			var hours = this.getTimeSeconds() / 60 / 60;
			
			if(mod) {
				hours = hours % 24;	
			}
			
			return Math.floor(hours);
		},
		
		/**
		 * Gets the twenty-four hour time
		 *
		 * @return  object  returns a digitized object
		 */
		 
		getMilitaryTime: function(date, showSeconds) {
			if(typeof showSeconds === "undefined") {
				showSeconds = true;
			}

			if(!date) {
				date = this.getDateObject();
			}

			var data  = [
				date.getHours(),
				date.getMinutes()			
			];

			if(showSeconds === true) {
				data.push(date.getSeconds());
			}

			return this.digitize(data);
		},
				
		/**
		 * Gets number of minutes
		 *
		 * @param   bool  Should perform a modulus? If not sent, then no.
		 * @return  int   Retuns a floored integer
		 */
		 
		getMinutes: function(mod) {
			var minutes = this.getTimeSeconds() / 60;
			
			if(mod) {
				minutes = minutes % 60;
			}
			
			return Math.floor(minutes);
		},
		
		/**
		 * Gets a minute breakdown
		 */
		 
		getMinuteCounter: function() {
			var obj = this.digitize([
				this.getMinutes(),
				this.getSeconds(true)
			]);

			return obj;
		},
		
		/**
		 * Gets time count in seconds regardless of if targetting date or not.
		 *
		 * @return  int   Returns a floored integer
		 */
		 
		getTimeSeconds: function(date) {
			if(!date) {
				date = new Date();
			}

			if (this.time instanceof Date) {
				if (this.factory.countdown) {
					return Math.max(this.time.getTime()/1000 - date.getTime()/1000,0);
				} else {
					return date.getTime()/1000 - this.time.getTime()/1000 ;
				}
			} else {
				return this.time;
			}
		},
		
		/**
		 * Gets the current twelve hour time
		 *
		 * @return  object  Returns a digitized object
		 */
		 
		getTime: function(date, showSeconds) {
			if(typeof showSeconds === "undefined") {
				showSeconds = true;
			}

			if(!date) {
				date = this.getDateObject();
			}

			console.log(date);

			
			var hours = date.getHours();
			var merid = hours > 12 ? 'PM' : 'AM';
			var data   = [
				hours > 12 ? hours - 12 : (hours === 0 ? 12 : hours),
				date.getMinutes()			
			];

			if(showSeconds === true) {
				data.push(date.getSeconds());
			}

			return this.digitize(data);
		},
		
		/**
		 * Gets number of seconds
		 *
		 * @param   bool  Should perform a modulus? If not sent, then no.
		 * @return  int   Retuns a ceiled integer
		 */
		 
		getSeconds: function(mod) {
			var seconds = this.getTimeSeconds();
			
			if(mod) {
				if(seconds == 60) {
					seconds = 0;
				}
				else {
					seconds = seconds % 60;
				}
			}
			
			return Math.ceil(seconds);
		},

		/**
		 * Gets number of weeks
		 *
		 * @param   bool  Should perform a modulus? If not sent, then no.
		 * @return  int   Retuns a floored integer
		 */
		 
		getWeeks: function(mod) {
			var weeks = this.getTimeSeconds() / 60 / 60 / 24 / 7;
			
			if(mod) {
				weeks = weeks % 52;
			}
			
			return Math.floor(weeks);
		},
		
		/**
		 * Removes a specific number of leading zeros from the array.
		 * This method prevents you from removing too many digits, even
		 * if you try.
		 *
		 * @param   int    Total number of digits to remove 
		 * @return  array  An array of digits 
		 */
		 
		removeLeadingZeros: function(totalDigits, digits) {
			var total    = 0;
			var newArray = [];
			
			$.each(digits, function(i, digit) {
				if(i < totalDigits) {
					total += parseInt(digits[i], 10);
				}
				else {
					newArray.push(digits[i]);
				}
			});
			
			if(total === 0) {
				return newArray;
			}
			
			return digits;
		},

		/**
		 * Adds X second to the current time
		 */

		addSeconds: function(x) {
			if(this.time instanceof Date) {
				this.time.setSeconds(this.time.getSeconds() + x);
			}
			else {
				this.time += x;
			}
		},

		/**
		 * Adds 1 second to the current time
		 */

		addSecond: function() {
			this.addSeconds(1);
		},

		/**
		 * Substracts X seconds from the current time
		 */

		subSeconds: function(x) {
			if(this.time instanceof Date) {
				this.time.setSeconds(this.time.getSeconds() - x);
			}
			else {
				this.time -= x;
			}
		},

		/**
		 * Substracts 1 second from the current time
		 */

		subSecond: function() {
			this.subSeconds(1);
		},
		
		/**
		 * Converts the object to a human readable string
		 */
		 
		toString: function() {
			return this.getTimeSeconds().toString();
		}
		
		/*
		getYears: function() {
			return Math.floor(this.time / 60 / 60 / 24 / 7 / 52);
		},
		
		getDecades: function() {
			return Math.floor(this.getWeeks() / 10);
		}*/
	});
	
}(jQuery));

/*jshint smarttabs:true */

/**
 * FlipClock.js
 *
 * @author     Justin Kimbrell
 * @copyright  2013 - Objective HTML, LLC
 * @licesnse   http://www.opensource.org/licenses/mit-license.php
 */
	
(function($) {
	
	"use strict";
	
	/**
	 * The FlipClock.Timer object managers the JS timers
	 *
	 * @param	object  The parent FlipClock.Factory object
	 * @param	object  Override the default options
	 */
	
	FlipClock.Timer = FlipClock.Base.extend({
		
		/**
		 * Callbacks
		 */		
		 
		callbacks: {
			destroy: false,
			create: false,
			init: false,
			interval: false,
			start: false,
			stop: false,
			reset: false
		},
		
		/**
		 * FlipClock timer count (how many intervals have passed)
		 */		
		 
		count: 0,
		
		/**
		 * The parent FlipClock.Factory object
		 */		
		 
		factory: false,
		
		/**
		 * Timer interval (1 second by default)
		 */		
		 
		interval: 1000,

		/**
		 * The rate of the animation in milliseconds (not currently in use)
		 */		
		 
		animationRate: 1000,
				
		/**
		 * Constructor
		 *
		 * @return	void
		 */		
		 
		constructor: function(factory, options) {
			this.base(options);
			this.factory = factory;
			this.callback(this.callbacks.init);	
			this.callback(this.callbacks.create);
		},
		
		/**
		 * This method gets the elapsed the time as an interger
		 *
		 * @return	void
		 */		
		 
		getElapsed: function() {
			return this.count * this.interval;
		},
		
		/**
		 * This method gets the elapsed the time as a Date object
		 *
		 * @return	void
		 */		
		 
		getElapsedTime: function() {
			return new Date(this.time + this.getElapsed());
		},
		
		/**
		 * This method is resets the timer
		 *
		 * @param 	callback  This method resets the timer back to 0
		 * @return	void
		 */		
		 
		reset: function(callback) {
			clearInterval(this.timer);
			this.count = 0;
			this._setInterval(callback);			
			this.callback(this.callbacks.reset);
		},
		
		/**
		 * This method is starts the timer
		 *
		 * @param 	callback  A function that is called once the timer is destroyed
		 * @return	void
		 */		
		 
		start: function(callback) {		
			this.factory.running = true;
			this._createTimer(callback);
			this.callback(this.callbacks.start);
		},
		
		/**
		 * This method is stops the timer
		 *
		 * @param 	callback  A function that is called once the timer is destroyed
		 * @return	void
		 */		
		 
		stop: function(callback) {
			this.factory.running = false;
			this._clearInterval(callback);
			this.callback(this.callbacks.stop);
			this.callback(callback);
		},
		
		/**
		 * Clear the timer interval
		 *
		 * @return	void
		 */		
		 
		_clearInterval: function() {
			clearInterval(this.timer);
		},
		
		/**
		 * Create the timer object
		 *
		 * @param 	callback  A function that is called once the timer is created
		 * @return	void
		 */		
		 
		_createTimer: function(callback) {
			this._setInterval(callback);		
		},
		
		/**
		 * Destroy the timer object
		 *
		 * @param 	callback  A function that is called once the timer is destroyed
		 * @return	void
		 */		
		 	
		_destroyTimer: function(callback) {
			this._clearInterval();			
			this.timer = false;
			this.callback(callback);
			this.callback(this.callbacks.destroy);
		},
		
		/**
		 * This method is called each time the timer interval is ran
		 *
		 * @param 	callback  A function that is called once the timer is destroyed
		 * @return	void
		 */		
		 
		_interval: function(callback) {
			this.callback(this.callbacks.interval);
			this.callback(callback);
			this.count++;
		},
		
		/**
		 * This sets the timer interval
		 *
		 * @param 	callback  A function that is called once the timer is destroyed
		 * @return	void
		 */		
		 
		_setInterval: function(callback) {
			var t = this;
	
			t._interval(callback);

			t.timer = setInterval(function() {		
				t._interval(callback);
			}, this.interval);
		}
			
	});
	
}(jQuery));

(function($) {
	
	/**
	 * Twenty-Four Hour Clock Face
	 *
	 * This class will generate a twenty-four our clock for FlipClock.js
	 *
	 * @param  object  The parent FlipClock.Factory object
	 * @param  object  An object of properties to override the default	
	 */
	 
	FlipClock.TwentyFourHourClockFace = FlipClock.Face.extend({

		/**
		 * Constructor
		 *
		 * @param  object  The parent FlipClock.Factory object
		 * @param  object  An object of properties to override the default	
		 */
		 
		constructor: function(factory, options) {
			this.base(factory, options);
		},

		/**
		 * Build the clock face
		 *
		 * @param  object  Pass the time that should be used to display on the clock.	
		 */
		 
		build: function(time) {
			var t        = this;
			var children = this.factory.$el.find('ul');

			if(!this.factory.time.time) {
				this.factory.original = new Date();

				this.factory.time = new FlipClock.Time(this.factory, this.factory.original);
			}

			var time = time ? time : this.factory.time.getMilitaryTime(false, this.showSeconds);

			if(time.length > children.length) {
				$.each(time, function(i, digit) {
					t.createList(digit);
				});
			}
			
			this.createDivider();
			this.createDivider();

			$(this.dividers[0]).insertBefore(this.lists[this.lists.length - 2].$el);
			$(this.dividers[1]).insertBefore(this.lists[this.lists.length - 4].$el);
			
			this.base();
		},
		
		/**
		 * Flip the clock face
		 */
		 
		flip: function(time, doNotAddPlayClass) {
			this.autoIncrement();
			
			time = time ? time : this.factory.time.getMilitaryTime(false, this.showSeconds);
			
			this.base(time, doNotAddPlayClass);	
		}
				
	});
	
}(jQuery));
(function($) {
		
	/**
	 * Counter Clock Face
	 *
	 * This class will generate a generice flip counter. The timer has been
	 * disabled. clock.increment() and clock.decrement() have been added.
	 *
	 * @param  object  The parent FlipClock.Factory object
	 * @param  object  An object of properties to override the default	
	 */
	 
	FlipClock.CounterFace = FlipClock.Face.extend({
		
		/**
		 * Tells the counter clock face if it should auto-increment
		 */

		shouldAutoIncrement: false,

		/**
		 * Constructor
		 *
		 * @param  object  The parent FlipClock.Factory object
		 * @param  object  An object of properties to override the default	
		 */
		 
		constructor: function(factory, options) {

			if(typeof options != "object") {
				options = {};
			}

			factory.autoStart = options.autoStart ? true : false;

			if(options.autoStart) {
				this.shouldAutoIncrement = true;
			}

			factory.increment = function() {
				factory.countdown = false;
				factory.setTime(factory.getTime().getTimeSeconds() + 1);
			};

			factory.decrement = function() {
				factory.countdown = true;
				var time = factory.getTime().getTimeSeconds();
				if(time > 0) {
					factory.setTime(time - 1);
				}
			};

			factory.setValue = function(digits) {
				factory.setTime(digits);
			};

			factory.setCounter = function(digits) {
				factory.setTime(digits);
			};

			this.base(factory, options);
		},

		/**
		 * Build the clock face	
		 */
		 
		build: function() {
			var t        = this;
			var children = this.factory.$el.find('ul');
			var time 	 = this.factory.getTime().digitize([this.factory.getTime().time]);

			if(time.length > children.length) {
				$.each(time, function(i, digit) {
					var list = t.createList(digit);

					list.select(digit);
				});
			
			}

			$.each(this.lists, function(i, list) {
				list.play();
			});

			this.base();
		},
		
		/**
		 * Flip the clock face
		 */
		 
		flip: function(time, doNotAddPlayClass) {			
			if(this.shouldAutoIncrement) {
				this.autoIncrement();
			}

			if(!time) {		
				time = this.factory.getTime().digitize([this.factory.getTime().time]);
			}

			this.base(time, doNotAddPlayClass);
		},

		/**
		 * Reset the clock face
		 */

		reset: function() {
			this.factory.time = new FlipClock.Time(
				this.factory, 
				this.factory.original ? Math.round(this.factory.original) : 0
			);

			this.flip();
		}
	});
	
}(jQuery));
(function($) {

	/**
	 * Daily Counter Clock Face
	 *
	 * This class will generate a daily counter for FlipClock.js. A
	 * daily counter will track days, hours, minutes, and seconds. If
	 * the number of available digits is exceeded in the count, a new
	 * digit will be created.
	 *
	 * @param  object  The parent FlipClock.Factory object
	 * @param  object  An object of properties to override the default
	 */

	FlipClock.DailyCounterFace = FlipClock.Face.extend({

		showSeconds: true,

		/**
		 * Constructor
		 *
		 * @param  object  The parent FlipClock.Factory object
		 * @param  object  An object of properties to override the default
		 */

		constructor: function(factory, options) {
			this.base(factory, options);
		},

		/**
		 * Build the clock face
		 */

		build: function(time) {
			var t = this;
			var children = this.factory.$el.find('ul');
			var offset = 0;

			time = time ? time : this.factory.time.getDayCounter(this.showSeconds);

			if(time.length > children.length) {
				$.each(time, function(i, digit) {
					t.createList(digit);
				});
			}

			if(this.showSeconds) {
				$(this.createDivider('Seconds')).insertBefore(this.lists[this.lists.length - 2].$el);
			}
			else
			{
				offset = 2;
			}

			$(this.createDivider('Minutes')).insertBefore(this.lists[this.lists.length - 4 + offset].$el);
			$(this.createDivider('Hours')).insertBefore(this.lists[this.lists.length - 6 + offset].$el);
			$(this.createDivider('Days', true)).insertBefore(this.lists[0].$el);

			this.base();
		},

		/**
		 * Flip the clock face
		 */

		flip: function(time, doNotAddPlayClass) {
			if(!time) {
				time = this.factory.time.getDayCounter(this.showSeconds);
			}

			this.autoIncrement();

			this.base(time, doNotAddPlayClass);
		}

	});

}(jQuery));
(function($) {
			
	/**
	 * Hourly Counter Clock Face
	 *
	 * This class will generate an hourly counter for FlipClock.js. An
	 * hour counter will track hours, minutes, and seconds. If number of
	 * available digits is exceeded in the count, a new digit will be 
	 * created.
	 *
	 * @param  object  The parent FlipClock.Factory object
	 * @param  object  An object of properties to override the default	
	 */
	 
	FlipClock.HourlyCounterFace = FlipClock.Face.extend({
			
		// clearExcessDigits: true,

		/**
		 * Constructor
		 *
		 * @param  object  The parent FlipClock.Factory object
		 * @param  object  An object of properties to override the default	
		 */
		 
		constructor: function(factory, options) {
			this.base(factory, options);
		},
		
		/**
		 * Build the clock face
		 */
		
		build: function(excludeHours, time) {
			var t = this;
			var children = this.factory.$el.find('ul');
			
			time = time ? time : this.factory.time.getHourCounter();
			
			if(time.length > children.length) {
				$.each(time, function(i, digit) {
					t.createList(digit);
				});
			}
			
			$(this.createDivider('Seconds')).insertBefore(this.lists[this.lists.length - 2].$el);
			$(this.createDivider('Minutes')).insertBefore(this.lists[this.lists.length - 4].$el);
			
			if(!excludeHours) {
				$(this.createDivider('Hours', true)).insertBefore(this.lists[0].$el);
			}
			
			this.base();
		},
		
		/**
		 * Flip the clock face
		 */
		 
		flip: function(time, doNotAddPlayClass) {
			if(!time) {
				time = this.factory.time.getHourCounter();
			}	

			this.autoIncrement();
		
			this.base(time, doNotAddPlayClass);
		},

		/**
		 * Append a newly created list to the clock
		 */

		appendDigitToClock: function(obj) {
			this.base(obj);

			this.dividers[0].insertAfter(this.dividers[0].next());
		}
		
	});
	
}(jQuery));
(function($) {
		
	/**
	 * Minute Counter Clock Face
	 *
	 * This class will generate a minute counter for FlipClock.js. A
	 * minute counter will track minutes and seconds. If an hour is 
	 * reached, the counter will reset back to 0. (4 digits max)
	 *
	 * @param  object  The parent FlipClock.Factory object
	 * @param  object  An object of properties to override the default	
	 */
	 
	FlipClock.MinuteCounterFace = FlipClock.HourlyCounterFace.extend({

		clearExcessDigits: false,

		/**
		 * Constructor
		 *
		 * @param  object  The parent FlipClock.Factory object
		 * @param  object  An object of properties to override the default	
		 */
		 
		constructor: function(factory, options) {
			this.base(factory, options);
		},
		
		/**
		 * Build the clock face	
		 */
		 
		build: function() {
			this.base(true, this.factory.time.getMinuteCounter());
		},
		
		/**
		 * Flip the clock face
		 */
		 
		flip: function(time, doNotAddPlayClass) {
			if(!time) {
				time = this.factory.time.getMinuteCounter();
			}

			this.base(time, doNotAddPlayClass);
		}

	});
	
}(jQuery));
(function($) {
		
	/**
	 * Twelve Hour Clock Face
	 *
	 * This class will generate a twelve hour clock for FlipClock.js
	 *
	 * @param  object  The parent FlipClock.Factory object
	 * @param  object  An object of properties to override the default	
	 */
	 
	FlipClock.TwelveHourClockFace = FlipClock.TwentyFourHourClockFace.extend({
		
		/**
		 * The meridium jQuery DOM object
		 */
		 
		meridium: false,
		
		/**
		 * The meridium text as string for easy access
		 */
		 
		meridiumText: 'AM',
					
		/**
		 * Build the clock face
		 *
		 * @param  object  Pass the time that should be used to display on the clock.	
		 */
		 
		build: function() {
			var t = this;

			var time = this.factory.time.getTime(false, this.showSeconds);

			this.base(time);			
			this.meridiumText = this.getMeridium();			
			this.meridium = $([
				'<ul class="flip-clock-meridium">',
					'<li>',
						'<a href="#">'+this.meridiumText+'</a>',
					'</li>',
				'</ul>'
			].join(''));
						
			this.meridium.insertAfter(this.lists[this.lists.length-1].$el);
		},
		
		/**
		 * Flip the clock face
		 */
		 
		flip: function(time, doNotAddPlayClass) {			
			if(this.meridiumText != this.getMeridium()) {
				this.meridiumText = this.getMeridium();
				this.meridium.find('a').html(this.meridiumText);	
			}
			this.base(this.factory.time.getTime(false, this.showSeconds), doNotAddPlayClass);	
		},
		
		/**
		 * Get the current meridium
		 *
		 * @return  string  Returns the meridium (AM|PM)
		 */
		 
		getMeridium: function() {
			return new Date().getHours() >= 12 ? 'PM' : 'AM';
		},
		
		/**
		 * Is it currently in the post-medirium?
		 *
		 * @return  bool  Returns true or false
		 */
		 
		isPM: function() {
			return this.getMeridium() == 'PM' ? true : false;
		},

		/**
		 * Is it currently before the post-medirium?
		 *
		 * @return  bool  Returns true or false
		 */
		 
		isAM: function() {
			return this.getMeridium() == 'AM' ? true : false;
		}
				
	});
	
}(jQuery));
(function($) {

    /**
     * FlipClock Arabic Language Pack
     *
     * This class will be used to translate tokens into the Arabic language.
     *
     */

    FlipClock.Lang.Arabic = {

      'years'   : 'سال',
      'months'  : 'ماه',
      'days'    : 'روز',
      'hours'   : 'ساعت',
      'minutes' : 'دقیقه',
      'seconds' : 'ثانیه'

    };

    /* Create various aliases for convenience */

    FlipClock.Lang['ar']      = FlipClock.Lang.Arabic;
    FlipClock.Lang['ar-ar']   = FlipClock.Lang.Arabic;
    FlipClock.Lang['arabic']  = FlipClock.Lang.Arabic;

}(jQuery));
(function($) {
		
	/**
	 * FlipClock Danish Language Pack
	 *
	 * This class will used to translate tokens into the Danish language.
	 *	
	 */
	 
	FlipClock.Lang.Danish = {
		
		'years'   : 'År',
		'months'  : 'Måneder',
		'days'    : 'Dage',
		'hours'   : 'Timer',
		'minutes' : 'Minutter',
		'seconds' : 'Sekunder'	

	};
	
	/* Create various aliases for convenience */

	FlipClock.Lang['da']     = FlipClock.Lang.Danish;
	FlipClock.Lang['da-dk']  = FlipClock.Lang.Danish;
	FlipClock.Lang['danish'] = FlipClock.Lang.Danish;

}(jQuery));
(function($) {
		
	/**
	 * FlipClock German Language Pack
	 *
	 * This class will used to translate tokens into the German language.
	 *	
	 */
	 
	FlipClock.Lang.German = {
		
		'years'   : 'Jahre',
		'months'  : 'Monate',
		'days'    : 'Tage',
		'hours'   : 'Stunden',
		'minutes' : 'Minuten',
		'seconds' : 'Sekunden'	
 
	};
	
	/* Create various aliases for convenience */
 
	FlipClock.Lang['de']     = FlipClock.Lang.German;
	FlipClock.Lang['de-de']  = FlipClock.Lang.German;
	FlipClock.Lang['german'] = FlipClock.Lang.German;
 
}(jQuery));
(function($) {
		
	/**
	 * FlipClock English Language Pack
	 *
	 * This class will used to translate tokens into the English language.
	 *	
	 */
	 
	FlipClock.Lang.English = {
		
		'years'   : 'Years',
		'months'  : 'Months',
		'days'    : 'Days',
		'hours'   : 'Hours',
		'minutes' : 'Minutes',
		'seconds' : 'Seconds'	

	};
	
	/* Create various aliases for convenience */

	FlipClock.Lang['en']      = FlipClock.Lang.English;
	FlipClock.Lang['en-us']   = FlipClock.Lang.English;
	FlipClock.Lang['english'] = FlipClock.Lang.English;

}(jQuery));
(function($) {

	/**
	 * FlipClock Spanish Language Pack
	 *
	 * This class will used to translate tokens into the Spanish language.
	 *
	 */

	FlipClock.Lang.Spanish = {

		'years'   : 'Años',
		'months'  : 'Meses',
		'days'    : 'Días',
		'hours'   : 'Horas',
		'minutes' : 'Minutos',
		'seconds' : 'Segundos'

	};

	/* Create various aliases for convenience */

	FlipClock.Lang['es']      = FlipClock.Lang.Spanish;
	FlipClock.Lang['es-es']   = FlipClock.Lang.Spanish;
	FlipClock.Lang['spanish'] = FlipClock.Lang.Spanish;

}(jQuery));
(function($) {
		
	/**
	 * FlipClock Finnish Language Pack
	 *
	 * This class will used to translate tokens into the Finnish language.
	 *	
	 */
	 
	FlipClock.Lang.Finnish = {
		
		'years'   : 'Vuotta',
		'months'  : 'Kuukautta',
		'days'    : 'Päivää',
		'hours'   : 'Tuntia',
		'minutes' : 'Minuuttia',
		'seconds' : 'Sekuntia'	

	};
	
	/* Create various aliases for convenience */

	FlipClock.Lang['fi']      = FlipClock.Lang.Finnish;
	FlipClock.Lang['fi-fi']   = FlipClock.Lang.Finnish;
	FlipClock.Lang['finnish'] = FlipClock.Lang.Finnish;

}(jQuery));

(function($) {

  /**
   * FlipClock Canadian French Language Pack
   *
   * This class will used to translate tokens into the Canadian French language.
   *
   */

  FlipClock.Lang.French = {

    'years'   : 'Ans',
    'months'  : 'Mois',
    'days'    : 'Jours',
    'hours'   : 'Heures',
    'minutes' : 'Minutes',
    'seconds' : 'Secondes'

  };

  /* Create various aliases for convenience */

  FlipClock.Lang['fr']      = FlipClock.Lang.French;
  FlipClock.Lang['fr-ca']   = FlipClock.Lang.French;
  FlipClock.Lang['french']  = FlipClock.Lang.French;

}(jQuery));

(function($) {
		
	/**
	 * FlipClock Italian Language Pack
	 *
	 * This class will used to translate tokens into the Italian language.
	 *	
	 */
	 
	FlipClock.Lang.Italian = {
		
		'years'   : 'Anni',
		'months'  : 'Mesi',
		'days'    : 'Giorni',
		'hours'   : 'Ore',
		'minutes' : 'Minuti',
		'seconds' : 'Secondi'	

	};
	
	/* Create various aliases for convenience */

	FlipClock.Lang['it']      = FlipClock.Lang.Italian;
	FlipClock.Lang['it-it']   = FlipClock.Lang.Italian;
	FlipClock.Lang['italian'] = FlipClock.Lang.Italian;
	
}(jQuery));

(function($) {

  /**
   * FlipClock Latvian Language Pack
   *
   * This class will used to translate tokens into the Latvian language.
   *
   */

  FlipClock.Lang.Latvian = {

    'years'   : 'Gadi',
    'months'  : 'Mēneši',
    'days'    : 'Dienas',
    'hours'   : 'Stundas',
    'minutes' : 'Minūtes',
    'seconds' : 'Sekundes'

  };

  /* Create various aliases for convenience */

  FlipClock.Lang['lv']      = FlipClock.Lang.Latvian;
  FlipClock.Lang['lv-lv']   = FlipClock.Lang.Latvian;
  FlipClock.Lang['latvian'] = FlipClock.Lang.Latvian;

}(jQuery));
(function($) {

    /**
     * FlipClock Dutch Language Pack
     *
     * This class will used to translate tokens into the Dutch language.
     */

    FlipClock.Lang.Dutch = {

        'years'   : 'Jaren',
        'months'  : 'Maanden',
        'days'    : 'Dagen',
        'hours'   : 'Uren',
        'minutes' : 'Minuten',
        'seconds' : 'Seconden'

    };

    /* Create various aliases for convenience */

    FlipClock.Lang['nl']      = FlipClock.Lang.Dutch;
    FlipClock.Lang['nl-be']   = FlipClock.Lang.Dutch;
    FlipClock.Lang['dutch']   = FlipClock.Lang.Dutch;

}(jQuery));

(function($) {

	/**
	 * FlipClock Norwegian-Bokmål Language Pack
	 *
	 * This class will used to translate tokens into the Norwegian language.
	 *	
	 */

	FlipClock.Lang.Norwegian = {

		'years'   : 'År',
		'months'  : 'Måneder',
		'days'    : 'Dager',
		'hours'   : 'Timer',
		'minutes' : 'Minutter',
		'seconds' : 'Sekunder'	

	};

	/* Create various aliases for convenience */

	FlipClock.Lang['no']      = FlipClock.Lang.Norwegian;
	FlipClock.Lang['nb']      = FlipClock.Lang.Norwegian;
	FlipClock.Lang['no-nb']   = FlipClock.Lang.Norwegian;
	FlipClock.Lang['norwegian'] = FlipClock.Lang.Norwegian;

}(jQuery));

(function($) {

	/**
	 * FlipClock Portuguese Language Pack
	 *
	 * This class will used to translate tokens into the Portuguese language.
	 *
	 */

	FlipClock.Lang.Portuguese = {

		'years'   : 'Anos',
		'months'  : 'Meses',
		'days'    : 'Dias',
		'hours'   : 'Horas',
		'minutes' : 'Minutos',
		'seconds' : 'Segundos'

	};

	/* Create various aliases for convenience */

	FlipClock.Lang['pt']         = FlipClock.Lang.Portuguese;
	FlipClock.Lang['pt-br']      = FlipClock.Lang.Portuguese;
	FlipClock.Lang['portuguese'] = FlipClock.Lang.Portuguese;

}(jQuery));
(function($) {

  /**
   * FlipClock Russian Language Pack
   *
   * This class will used to translate tokens into the Russian language.
   *
   */

  FlipClock.Lang.Russian = {

    'years'   : 'лет',
    'months'  : 'месяцев',
    'days'    : 'дней',
    'hours'   : 'часов',
    'minutes' : 'минут',
    'seconds' : 'секунд'

  };

  /* Create various aliases for convenience */

  FlipClock.Lang['ru']      = FlipClock.Lang.Russian;
  FlipClock.Lang['ru-ru']   = FlipClock.Lang.Russian;
  FlipClock.Lang['russian']  = FlipClock.Lang.Russian;

}(jQuery));
(function($) {
		
	/**
	 * FlipClock Swedish Language Pack
	 *
	 * This class will used to translate tokens into the Swedish language.
	 *	
	 */
	 
	FlipClock.Lang.Swedish = {
		
		'years'   : 'År',
		'months'  : 'Månader',
		'days'    : 'Dagar',
		'hours'   : 'Timmar',
		'minutes' : 'Minuter',
		'seconds' : 'Sekunder'	

	};
	
	/* Create various aliases for convenience */

	FlipClock.Lang['sv']      = FlipClock.Lang.Swedish;
	FlipClock.Lang['sv-se']   = FlipClock.Lang.Swedish;
	FlipClock.Lang['swedish'] = FlipClock.Lang.Swedish;

}(jQuery));

(function($) {
		
	/**
	 * FlipClock Chinese Language Pack
	 *
	 * This class will used to translate tokens into the Chinese language.
	 *	
	 */
	 
	FlipClock.Lang.Chinese = {
		
		'years'   : '年',
		'months'  : '月',
		'days'    : '日',
		'hours'   : '时',
		'minutes' : '分',
		'seconds' : '秒'

	};
	
	/* Create various aliases for convenience */

	FlipClock.Lang['zh']      = FlipClock.Lang.Chinese;
	FlipClock.Lang['zh-cn']   = FlipClock.Lang.Chinese;
	FlipClock.Lang['chinese'] = FlipClock.Lang.Chinese;

}(jQuery));


/*[PATH @digikala/supernova-digikala-desktop/assets/local/js/libs/jquery.stick.in.parent.js]*/
'use strict';

/**
 * Copyright Marc J. Schmidt. See the LICENSE file at the top-level
 * directory of this distribution and at
 * https://github.com/marcj/css-element-queries/blob/master/LICENSE.
 */
(function (root, factory) {
    if (typeof define === "function" && define.amd) {
        define(factory);
    } else if (typeof exports === "object") {
        module.exports = factory();
    } else {
        root.ResizeSensor = factory();
    }
}(typeof window !== 'undefined' ? window : this, function () {

    // Make sure it does not throw in a SSR (Server Side Rendering) situation
    if (typeof window === "undefined") {
        return null;
    }
    // Only used for the dirty checking, so the event callback count is limited to max 1 call per fps per sensor.
    // In combination with the event based resize sensor this saves cpu time, because the sensor is too fast and
    // would generate too many unnecessary events.
    var requestAnimationFrame = window.requestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        function (fn) {
            return window.setTimeout(fn, 20);
        };

    /**
     * Iterate over each of the provided element(s).
     *
     * @param {HTMLElement|HTMLElement[]} elements
     * @param {Function}                  callback
     */
    function forEachElement(elements, callback) {
        var elementsType = Object.prototype.toString.call(elements);
        var isCollectionTyped = ('[object Array]' === elementsType
            || ('[object NodeList]' === elementsType)
            || ('[object HTMLCollection]' === elementsType)
            || ('[object Object]' === elementsType)
            || ('undefined' !== typeof jQuery && elements instanceof jQuery) //jquery
            || ('undefined' !== typeof Elements && elements instanceof Elements) //mootools
        );
        var i = 0, j = elements.length;
        if (isCollectionTyped) {
            for (; i < j; i++) {
                callback(elements[i]);
            }
        } else {
            callback(elements);
        }
    }

    /**
     * Get element size
     * @param {HTMLElement} element
     * @returns {Object} {width, height}
     */
    function getElementSize(element) {
        if (!element.getBoundingClientRect) {
            return {
                width: element.offsetWidth,
                height: element.offsetHeight
            };
        }

        var rect = element.getBoundingClientRect();
        return {
            width: Math.round(rect.width),
            height: Math.round(rect.height)
        };
    }

    /**
     * Class for dimension change detection.
     *
     * @param {Element|Element[]|Elements|jQuery} element
     * @param {Function} callback
     *
     * @constructor
     */
    var ResizeSensor = function (element, callback) {

        var observer;

        /**
         *
         * @constructor
         */
        function EventQueue() {
            var q = [];
            this.add = function (ev) {
                q.push(ev);
            };

            var i, j;
            this.call = function (sizeInfo) {
                for (i = 0, j = q.length; i < j; i++) {
                    q[i].call(this, sizeInfo);
                }
            };

            this.remove = function (ev) {
                var newQueue = [];
                for (i = 0, j = q.length; i < j; i++) {
                    if (q[i] !== ev) newQueue.push(q[i]);
                }
                q = newQueue;
            };

            this.length = function () {
                return q.length;
            };
        }

        /**
         *
         * @param {HTMLElement} element
         * @param {Function}    resized
         */
        function attachResizeEvent(element, resized) {
            if (!element) return;
            if (element.resizedAttached) {
                element.resizedAttached.add(resized);
                return;
            }

            element.resizedAttached = new EventQueue();
            element.resizedAttached.add(resized);

            element.resizeSensor = document.createElement('div');
            element.resizeSensor.dir = 'ltr';
            element.resizeSensor.className = 'resize-sensor';
            var style = 'position: absolute; left: -10px; top: -10px; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;';
            var styleChild = 'position: absolute; left: 0; top: 0; transition: 0s;';

            element.resizeSensor.style.cssText = style;
            element.resizeSensor.innerHTML =
                '<div class="resize-sensor-expand" style="' + style + '">' +
                '<div style="' + styleChild + '"></div>' +
                '</div>' +
                '<div class="resize-sensor-shrink" style="' + style + '">' +
                '<div style="' + styleChild + ' width: 200%; height: 200%"></div>' +
                '</div>';
            element.appendChild(element.resizeSensor);

            var position = window.getComputedStyle(element).getPropertyValue('position');
            if ('absolute' !== position && 'relative' !== position && 'fixed' !== position) {
                element.style.position = 'relative';
            }

            var expand = element.resizeSensor.childNodes[0];
            var expandChild = expand.childNodes[0];
            var shrink = element.resizeSensor.childNodes[1];

            var dirty, rafId;
            var size = getElementSize(element);
            var lastWidth = size.width;
            var lastHeight = size.height;
            var initialHiddenCheck = true, resetRAF_id;


            var resetExpandShrink = function () {
                expandChild.style.width = '100000px';
                expandChild.style.height = '100000px';

                expand.scrollLeft = 100000;
                expand.scrollTop = 100000;

                shrink.scrollLeft = 100000;
                shrink.scrollTop = 100000;
            };

            var reset = function () {
                // Check if element is hidden
                if (initialHiddenCheck) {
                    if (!expand.scrollTop && !expand.scrollLeft) {

                        // reset
                        resetExpandShrink();

                        // Check in next frame
                        if (!resetRAF_id) {
                            resetRAF_id = requestAnimationFrame(function () {
                                resetRAF_id = 0;

                                reset();
                            });
                        }

                        return;
                    } else {
                        // Stop checking
                        initialHiddenCheck = false;
                    }
                }

                resetExpandShrink();
            };
            element.resizeSensor.resetSensor = reset;

            var onResized = function () {
                rafId = 0;

                if (!dirty) return;

                lastWidth = size.width;
                lastHeight = size.height;

                if (element.resizedAttached) {
                    element.resizedAttached.call(size);
                }
            };

            var onScroll = function () {
                size = getElementSize(element);
                dirty = size.width !== lastWidth || size.height !== lastHeight;

                if (dirty && !rafId) {
                    rafId = requestAnimationFrame(onResized);
                }

                reset();
            };

            var addEvent = function (el, name, cb) {
                if (el.attachEvent) {
                    el.attachEvent('on' + name, cb);
                } else {
                    el.addEventListener(name, cb);
                }
            };

            addEvent(expand, 'scroll', onScroll);
            addEvent(shrink, 'scroll', onScroll);

            // Fix for custom Elements
            requestAnimationFrame(reset);
        }

        if (typeof ResizeObserver !== "undefined") {
            observer = new ResizeObserver(function (element) {
                forEachElement(element, function (elem) {
                    callback.call(
                        this,
                        {
                            width: elem.contentRect.width,
                            height: elem.contentRect.height
                        }
                    );
                });
            });
            if (element !== undefined) {
                forEachElement(element, function (elem) {
                    observer.observe(elem);
                });
            }
        }
        else {
            forEachElement(element, function (elem) {
                attachResizeEvent(elem, callback);
            });
        }

        this.detach = function (ev) {
            if (typeof ResizeObserver != "undefined") {
                forEachElement(element, function (elem) {
                    observer.unobserve(elem);
                });
            }
            else {
                ResizeSensor.detach(element, ev);
            }
        };

        this.reset = function () {
            element.resizeSensor.resetSensor();
        };
    };

    ResizeSensor.reset = function (element, ev) {
        forEachElement(element, function (elem) {
            elem.resizeSensor.resetSensor();
        });
    };

    ResizeSensor.detach = function (element, ev) {
        forEachElement(element, function (elem) {
            if (!elem) return;
            if (elem.resizedAttached && typeof ev === "function") {
                elem.resizedAttached.remove(ev);
                if (elem.resizedAttached.length()) return;
            }
            if (elem.resizeSensor) {
                if (elem.contains(elem.resizeSensor)) {
                    elem.removeChild(elem.resizeSensor);
                }
                delete elem.resizeSensor;
                delete elem.resizedAttached;
            }
        });
    };

    return ResizeSensor;

}));

(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? factory(exports) :
        typeof define === 'function' && define.amd ? define(['exports'], factory) :
            (factory((global.StickySidebar = {})));
}(this, (function (exports) {
    'use strict';

    var commonjsGlobal = typeof window !== 'undefined' ? window : typeof global !== 'undefined' ? global : typeof self !== 'undefined' ? self : {};


    function unwrapExports(x) {
        return x && x.__esModule && Object.prototype.hasOwnProperty.call(x, 'default') ? x['default'] : x;
    }

    function createCommonjsModule(fn, module) {
        return module = {exports: {}}, fn(module, module.exports), module.exports;
    }

    var stickySidebar = createCommonjsModule(function (module, exports) {
        (function (global, factory) {
            if (typeof undefined === "function" && undefined.amd) {
                undefined(['exports'], factory);
            } else {
                factory(exports);
            }
        })(commonjsGlobal, function (exports) {
            Object.defineProperty(exports, "__esModule", {
                value: true
            });

            function _classCallCheck(instance, Constructor) {
                if (!(instance instanceof Constructor)) {
                    throw new TypeError("Cannot call a class as a function");
                }
            }

            var _createClass = function () {
                function defineProperties(target, props) {
                    for (var i = 0; i < props.length; i++) {
                        var descriptor = props[i];
                        descriptor.enumerable = descriptor.enumerable || false;
                        descriptor.configurable = true;
                        if ("value" in descriptor) descriptor.writable = true;
                        Object.defineProperty(target, descriptor.key, descriptor);
                    }
                }

                return function (Constructor, protoProps, staticProps) {
                    if (protoProps) defineProperties(Constructor.prototype, protoProps);
                    if (staticProps) defineProperties(Constructor, staticProps);
                    return Constructor;
                };
            }();

            /**
             * Sticky Sidebar JavaScript Plugin.
             * @version 3.3.4
             * @author Ahmed Bouhuolia <a.bouhuolia@gmail.com>
             * @license The MIT License (MIT)
             */
            var StickySidebar = function () {

                // ---------------------------------
                // # Define Constants
                // ---------------------------------
                //
                var EVENT_KEY = '.stickySidebar';
                var DEFAULTS = {
                    /**
                     * Additional top spacing of the element when it becomes sticky.
                     * @type {Numeric|Function}
                     */
                    topSpacing: 0,

                    /**
                     * Additional bottom spacing of the element when it becomes sticky.
                     * @type {Numeric|Function}
                     */
                    bottomSpacing: 0,

                    /**
                     * Container sidebar selector to know what the beginning and end of sticky element.
                     * @type {String|False}
                     */
                    containerSelector: false,

                    /**
                     * Inner wrapper selector.
                     * @type {String}
                     */
                    innerWrapperSelector: '.inner-wrapper-sticky',

                    /**
                     * The name of CSS class to apply to elements when they have become stuck.
                     * @type {String|False}
                     */
                    stickyClass: 'is-affixed',

                    /**
                     * Detect when sidebar and its container change height so re-calculate their dimensions.
                     * @type {Boolean}
                     */
                    resizeSensor: true,

                    /**
                     * The sidebar returns to its normal position if its width below this value.
                     * @type {Numeric}
                     */
                    minWidth: false
                };

                // ---------------------------------
                // # Class Definition
                // ---------------------------------
                //
                /**
                 * Sticky Sidebar Class.
                 * @public
                 */

                var StickySidebar = function () {

                    /**
                     * Sticky Sidebar Constructor.
                     * @constructor
                     * @param {HTMLElement|String} sidebar - The sidebar element or sidebar selector.
                     * @param {Object} options - The options of sticky sidebar.
                     */
                    function StickySidebar(sidebar) {
                        var _this = this;

                        var options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};

                        _classCallCheck(this, StickySidebar);

                        this.options = StickySidebar.extend(DEFAULTS, options);

                        // Sidebar element query if there's no one, throw error.
                        this.sidebar = 'string' === typeof sidebar ? document.querySelector(sidebar) : sidebar;
                        if ('undefined' === typeof this.sidebar || !this.sidebar) throw new Error("There is no specific sidebar element.");

                        this.sidebarInner = false;
                        this.container = this.sidebar.parentElement;

                        // Current Affix Type of sidebar element.
                        this.affixedType = 'STATIC';
                        this.direction = 'down';
                        this.support = {
                            transform: false,
                            transform3d: false
                        };

                        this._initialized = false;
                        this._reStyle = false;
                        this._breakpoint = false;

                        // Dimensions of sidebar, container and screen viewport.
                        this.dimensions = {
                            translateY: 0,
                            maxTranslateY: 0,
                            topSpacing: 0,
                            lastTopSpacing: 0,
                            bottomSpacing: 0,
                            lastBottomSpacing: 0,
                            sidebarHeight: 0,
                            sidebarWidth: 0,
                            containerTop: 0,
                            containerHeight: 0,
                            viewportHeight: 0,
                            viewportTop: 0,
                            lastViewportTop: 0
                        };

                        // Bind event handlers for referencability.
                        ['handleEvent'].forEach(function (method) {
                            _this[method] = _this[method].bind(_this);
                        });

                        // Initialize sticky sidebar for first time.
                        this.initialize();
                    }

                    /**
                     * Initializes the sticky sidebar by adding inner wrapper, define its container,
                     * min-width breakpoint, calculating dimensions, adding helper classes and inline style.
                     * @private
                     */


                    _createClass(StickySidebar, [{
                        key: 'initialize',
                        value: function initialize() {
                            var _this2 = this;

                            this._setSupportFeatures();

                            // Get sticky sidebar inner wrapper, if not found, will create one.
                            if (this.options.innerWrapperSelector) {
                                this.sidebarInner = this.sidebar.querySelector(this.options.innerWrapperSelector);

                                if (null === this.sidebarInner) this.sidebarInner = false;
                            }

                            if (!this.sidebarInner) {
                                var wrapper = document.createElement('div');
                                wrapper.setAttribute('class', 'inner-wrapper-sticky');
                                this.sidebar.appendChild(wrapper);

                                while (this.sidebar.firstChild != wrapper) {
                                    wrapper.appendChild(this.sidebar.firstChild);
                                }
                                this.sidebarInner = this.sidebar.querySelector('.inner-wrapper-sticky');
                            }

                            // Container wrapper of the sidebar.
                            if (this.options.containerSelector) {
                                var containers = document.querySelectorAll(this.options.containerSelector);
                                containers = Array.prototype.slice.call(containers);

                                containers.forEach(function (container, item) {
                                    if (!container.contains(_this2.sidebar)) return;
                                    _this2.container = container;
                                });

                                if (!containers.length) throw new Error("The container does not contains on the sidebar.");
                            }

                            // If top/bottom spacing is not function parse value to integer.
                            if ('function' !== typeof this.options.topSpacing) this.options.topSpacing = parseInt(this.options.topSpacing) || 0;

                            if ('function' !== typeof this.options.bottomSpacing) this.options.bottomSpacing = parseInt(this.options.bottomSpacing) || 0;

                            // Breakdown sticky sidebar if screen width below `options.minWidth`.
                            this._widthBreakpoint();

                            // Calculate dimensions of sidebar, container and viewport.
                            this.calcDimensions();

                            // Affix sidebar in proper position.
                            this.stickyPosition();

                            // Bind all events.
                            this.bindEvents();

                            // Inform other properties the sticky sidebar is initialized.
                            this._initialized = true;
                        }
                    }, {
                        key: 'bindEvents',
                        value: function bindEvents() {
                            window.addEventListener('resize', this, {passive: true, capture: false});
                            window.addEventListener('scroll', this, {passive: true, capture: false});

                            this.sidebar.addEventListener('update' + EVENT_KEY, this);

                            if (this.options.resizeSensor && 'undefined' !== typeof ResizeSensor) {
                                new ResizeSensor(this.sidebarInner, this.handleEvent);
                                new ResizeSensor(this.container, this.handleEvent);
                            }
                        }
                    }, {
                        key: 'handleEvent',
                        value: function handleEvent(event) {
                            this.updateSticky(event);
                        }
                    }, {
                        key: 'calcDimensions',
                        value: function calcDimensions() {
                            if (this._breakpoint) return;
                            var dims = this.dimensions;

                            // Container of sticky sidebar dimensions.
                            dims.containerTop = StickySidebar.offsetRelative(this.container).top;
                            dims.containerHeight = this.container.clientHeight - 35;
                            dims.containerBottom = dims.containerTop + dims.containerHeight;

                            // Sidebar dimensions.
                            dims.sidebarHeight = this.sidebarInner.offsetHeight;
                            dims.sidebarWidth = this.sidebarInner.offsetWidth;

                            // Screen viewport dimensions.
                            dims.viewportHeight = window.innerHeight;

                            // Maximum sidebar translate Y.
                            dims.maxTranslateY = dims.containerHeight - dims.sidebarHeight;

                            this._calcDimensionsWithScroll();
                        }
                    }, {
                        key: '_calcDimensionsWithScroll',
                        value: function _calcDimensionsWithScroll() {
                            var dims = this.dimensions;

                            dims.sidebarLeft = StickySidebar.offsetRelative(this.sidebar).left;

                            dims.viewportTop = document.documentElement.scrollTop || document.body.scrollTop;
                            dims.viewportBottom = dims.viewportTop + dims.viewportHeight;
                            dims.viewportLeft = document.documentElement.scrollLeft || document.body.scrollLeft;

                            dims.topSpacing = this.options.topSpacing;
                            dims.bottomSpacing = this.options.bottomSpacing;

                            if ('function' === typeof dims.topSpacing) dims.topSpacing = parseInt(dims.topSpacing(this.sidebar)) || 0;

                            if ('function' === typeof dims.bottomSpacing) dims.bottomSpacing = parseInt(dims.bottomSpacing(this.sidebar)) || 0;

                            if ('VIEWPORT-TOP' === this.affixedType) {
                                // Adjust translate Y in the case decrease top spacing value.
                                if (dims.topSpacing < dims.lastTopSpacing) {
                                    dims.translateY += dims.lastTopSpacing - dims.topSpacing;
                                    this._reStyle = true;
                                }
                            } else if ('VIEWPORT-BOTTOM' === this.affixedType) {
                                // Adjust translate Y in the case decrease bottom spacing value.
                                if (dims.bottomSpacing < dims.lastBottomSpacing) {
                                    dims.translateY += dims.lastBottomSpacing - dims.bottomSpacing;
                                    this._reStyle = true;
                                }
                            }

                            dims.lastTopSpacing = dims.topSpacing;
                            dims.lastBottomSpacing = dims.bottomSpacing;
                        }
                    }, {
                        key: 'isSidebarFitsViewport',
                        value: function isSidebarFitsViewport() {
                            var dims = this.dimensions;
                            var offset = this.scrollDirection === 'down' ? dims.lastBottomSpacing : dims.lastTopSpacing;
                            return this.dimensions.sidebarHeight + offset < this.dimensions.viewportHeight;
                        }
                    }, {
                        key: 'observeScrollDir',
                        value: function observeScrollDir() {
                            var dims = this.dimensions;
                            if (dims.lastViewportTop === dims.viewportTop) return;

                            var furthest = 'down' === this.direction ? Math.min : Math.max;

                            // If the browser is scrolling not in the same direction.
                            if (dims.viewportTop === furthest(dims.viewportTop, dims.lastViewportTop)) this.direction = 'down' === this.direction ? 'up' : 'down';
                        }
                    }, {
                        key: 'getAffixType',
                        value: function getAffixType() {
                            this._calcDimensionsWithScroll();
                            var dims = this.dimensions;
                            var colliderTop = dims.viewportTop + dims.topSpacing;
                            var affixType = this.affixedType;

                            if (colliderTop <= dims.containerTop || dims.containerHeight <= dims.sidebarHeight) {
                                dims.translateY = 0;
                                affixType = 'STATIC';
                            } else {
                                affixType = 'up' === this.direction ? this._getAffixTypeScrollingUp() : this._getAffixTypeScrollingDown();
                            }

                            // Make sure the translate Y is not bigger than container height.
                            dims.translateY = Math.max(0, dims.translateY);
                            dims.translateY = Math.min(dims.containerHeight, dims.translateY);
                            dims.translateY = Math.round(dims.translateY);

                            dims.lastViewportTop = dims.viewportTop;

                            // console.log(dims.containerHeight, dims.containerTop, dims.containerBottom);

                            return affixType;
                        }
                    }, {
                        key: '_getAffixTypeScrollingDown',
                        value: function _getAffixTypeScrollingDown() {
                            var dims = this.dimensions;
                            var sidebarBottom = dims.sidebarHeight + dims.containerTop;
                            var colliderTop = dims.viewportTop + dims.topSpacing;
                            var colliderBottom = dims.viewportBottom - dims.bottomSpacing;
                            var affixType = this.affixedType;

                            if (this.isSidebarFitsViewport()) {
                                if (dims.sidebarHeight + colliderTop >= dims.containerBottom) {
                                    dims.translateY = dims.containerBottom - sidebarBottom;
                                    affixType = 'CONTAINER-BOTTOM';
                                } else if (colliderTop >= dims.containerTop) {
                                    dims.translateY = colliderTop - dims.containerTop;
                                    affixType = 'VIEWPORT-TOP';
                                }
                            } else {
                                if (dims.containerBottom <= colliderBottom) {
                                    dims.translateY = dims.containerBottom - sidebarBottom;
                                    affixType = 'CONTAINER-BOTTOM';
                                } else if (sidebarBottom + dims.translateY <= colliderBottom) {
                                    dims.translateY = colliderBottom - sidebarBottom;
                                    affixType = 'VIEWPORT-BOTTOM';
                                } else if (dims.containerTop + dims.translateY <= colliderTop && 0 !== dims.translateY && dims.maxTranslateY !== dims.translateY) {
                                    affixType = 'VIEWPORT-UNBOTTOM';
                                }
                            }

                            return affixType;
                        }
                    }, {
                        key: '_getAffixTypeScrollingUp',
                        value: function _getAffixTypeScrollingUp() {
                            var dims = this.dimensions;
                            var sidebarBottom = dims.sidebarHeight + dims.containerTop;
                            var colliderTop = dims.viewportTop + dims.topSpacing;
                            var colliderBottom = dims.viewportBottom - dims.bottomSpacing;
                            var affixType = this.affixedType;

                            if (colliderTop <= dims.translateY + dims.containerTop) {
                                dims.translateY = colliderTop - dims.containerTop;
                                affixType = 'VIEWPORT-TOP';
                            } else if (dims.containerBottom <= colliderBottom) {
                                dims.translateY = dims.containerBottom - sidebarBottom;
                                affixType = 'CONTAINER-BOTTOM';
                            } else if (!this.isSidebarFitsViewport()) {

                                if (dims.containerTop <= colliderTop && 0 !== dims.translateY && dims.maxTranslateY !== dims.translateY) {
                                    affixType = 'VIEWPORT-UNBOTTOM';
                                }
                            }

                            return affixType;
                        }
                    }, {
                        key: '_getStyle',
                        value: function _getStyle(affixType) {
                            if ('undefined' === typeof affixType) return;

                            var style = {inner: {}, outer: {}};
                            var dims = this.dimensions;

                            switch (affixType) {
                                case 'VIEWPORT-TOP':
                                    style.inner = {
                                        position: 'fixed', top: dims.topSpacing,
                                        left: dims.sidebarLeft - dims.viewportLeft, width: dims.sidebarWidth
                                    };
                                    break;
                                case 'VIEWPORT-BOTTOM':
                                    style.inner = {
                                        position: 'fixed', top: 'auto', left: dims.sidebarLeft,
                                        bottom: dims.bottomSpacing, width: dims.sidebarWidth
                                    };
                                    break;
                                case 'CONTAINER-BOTTOM':
                                case 'VIEWPORT-UNBOTTOM':
                                    var translate = this._getTranslate(0, dims.translateY + 'px');

                                    if (translate) style.inner = {transform: translate}; else style.inner = {
                                        position: 'absolute',
                                        top: dims.translateY,
                                        width: dims.sidebarWidth
                                    };
                                    break;
                            }

                            switch (affixType) {
                                case 'VIEWPORT-TOP':
                                case 'VIEWPORT-BOTTOM':
                                case 'VIEWPORT-UNBOTTOM':
                                case 'CONTAINER-BOTTOM':
                                    style.outer = {height: dims.sidebarHeight, position: 'relative'};
                                    break;
                            }

                            style.outer = StickySidebar.extend({height: '', position: ''}, style.outer);
                            style.inner = StickySidebar.extend({
                                position: 'relative', top: '', left: '',
                                bottom: '', width: '', transform: ''
                            }, style.inner);

                            return style;
                        }
                    }, {
                        key: 'stickyPosition',
                        value: function stickyPosition(force) {
                            if (this._breakpoint) return;

                            force = this._reStyle || force || false;

                            var offsetTop = this.options.topSpacing;
                            var offsetBottom = this.options.bottomSpacing;

                            var affixType = this.getAffixType();
                            var style = this._getStyle(affixType);

                            if ((this.affixedType != affixType || force) && affixType) {
                                var affixEvent = 'affix.' + affixType.toLowerCase().replace('viewport-', '') + EVENT_KEY;
                                StickySidebar.eventTrigger(this.sidebar, affixEvent);

                                if ('STATIC' === affixType) StickySidebar.removeClass(this.sidebar, this.options.stickyClass); else StickySidebar.addClass(this.sidebar, this.options.stickyClass);

                                for (var key in style.outer) {
                                    var unit = 'number' === typeof style.outer[key] ? 'px' : '';
                                    this.sidebar.style[key] = style.outer[key] + unit;
                                }

                                for (var _key in style.inner) {
                                    var _unit = 'number' === typeof style.inner[_key] ? 'px' : '';
                                    this.sidebarInner.style[_key] = style.inner[_key] + _unit;
                                }

                                var affixedEvent = 'affixed.' + affixType.toLowerCase().replace('viewport-', '') + EVENT_KEY;
                                StickySidebar.eventTrigger(this.sidebar, affixedEvent);
                            } else {
                                if (this._initialized) this.sidebarInner.style.left = style.inner.left;
                            }

                            this.affixedType = affixType;
                        }
                    }, {
                        key: '_widthBreakpoint',
                        value: function _widthBreakpoint() {

                            if (window.innerWidth <= this.options.minWidth) {
                                this._breakpoint = true;
                                this.affixedType = 'STATIC';

                                this.sidebar.removeAttribute('style');
                                StickySidebar.removeClass(this.sidebar, this.options.stickyClass);
                                this.sidebarInner.removeAttribute('style');
                            } else {
                                this._breakpoint = false;
                            }
                        }
                    }, {
                        key: 'updateSticky',
                        value: function updateSticky() {
                            var _this3 = this;

                            var event = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};

                            if (this._running) return;
                            this._running = true;

                            (function (eventType) {
                                requestAnimationFrame(function () {
                                    switch (eventType) {
                                        // When browser is scrolling and re-calculate just dimensions
                                        // within scroll.
                                        case 'scroll':
                                            _this3._calcDimensionsWithScroll();
                                            _this3.observeScrollDir();
                                            _this3.stickyPosition();
                                            break;

                                        // When browser is resizing or there's no event, observe width
                                        // breakpoint and re-calculate dimensions.
                                        case 'resize':
                                        default:
                                            _this3._widthBreakpoint();
                                            _this3.calcDimensions();
                                            _this3.stickyPosition(true);
                                            break;
                                    }
                                    _this3._running = false;
                                });
                            })(event.type);
                        }
                    }, {
                        key: '_setSupportFeatures',
                        value: function _setSupportFeatures() {
                            var support = this.support;

                            support.transform = StickySidebar.supportTransform();
                            support.transform3d = StickySidebar.supportTransform(true);
                        }
                    }, {
                        key: '_getTranslate',
                        value: function _getTranslate() {
                            var y = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;
                            var x = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;
                            var z = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 0;

                            if (this.support.transform3d) return 'translate3d(' + y + ', ' + x + ', ' + z + ')'; else if (this.support.translate) return 'translate(' + y + ', ' + x + ')'; else return false;
                        }
                    }, {
                        key: 'destroy',
                        value: function destroy() {
                            window.removeEventListener('resize', this, {capture: false});
                            window.removeEventListener('scroll', this, {capture: false});

                            this.sidebar.classList.remove(this.options.stickyClass);
                            this.sidebar.style.minHeight = '';

                            this.sidebar.removeEventListener('update' + EVENT_KEY, this);

                            var styleReset = {inner: {}, outer: {}};

                            styleReset.inner = {position: '', top: '', left: '', bottom: '', width: '', transform: ''};
                            styleReset.outer = {height: '', position: ''};

                            for (var key in styleReset.outer) {
                                this.sidebar.style[key] = styleReset.outer[key];
                            }
                            for (var _key2 in styleReset.inner) {
                                this.sidebarInner.style[_key2] = styleReset.inner[_key2];
                            }
                            if (this.options.resizeSensor && 'undefined' !== typeof ResizeSensor) {
                                ResizeSensor.detach(this.sidebarInner, this.handleEvent);
                                ResizeSensor.detach(this.container, this.handleEvent);
                            }
                        }
                    }], [{
                        key: 'supportTransform',
                        value: function supportTransform(transform3d) {
                            var result = false,
                                property = transform3d ? 'perspective' : 'transform',
                                upper = property.charAt(0).toUpperCase() + property.slice(1),
                                prefixes = ['Webkit', 'Moz', 'O', 'ms'],
                                support = document.createElement('support'),
                                style = support.style;

                            (property + ' ' + prefixes.join(upper + ' ') + upper).split(' ').forEach(function (property, i) {
                                if (style[property] !== undefined) {
                                    result = property;
                                    return false;
                                }
                            });
                            return result;
                        }
                    }, {
                        key: 'eventTrigger',
                        value: function eventTrigger(element, eventName, data) {
                            try {
                                var event = new CustomEvent(eventName, {detail: data});
                            } catch (e) {
                                var event = document.createEvent('CustomEvent');
                                event.initCustomEvent(eventName, true, true, data);
                            }
                            element.dispatchEvent(event);
                        }
                    }, {
                        key: 'extend',
                        value: function extend(defaults, options) {
                            var results = {};
                            for (var key in defaults) {
                                if ('undefined' !== typeof options[key]) results[key] = options[key]; else results[key] = defaults[key];
                            }
                            return results;
                        }
                    }, {
                        key: 'offsetRelative',
                        value: function offsetRelative(element) {
                            var result = {left: 0, top: 0};

                            do {
                                var offsetTop = element.offsetTop;
                                var offsetLeft = element.offsetLeft;

                                if (!isNaN(offsetTop)) result.top += offsetTop;

                                if (!isNaN(offsetLeft)) result.left += offsetLeft;
                                // console.log(element);
                                element = 'BODY' === element.tagName ? element.parentElement : element.offsetParent;
                            } while (element);
                            return result;
                        }
                    }, {
                        key: 'addClass',
                        value: function addClass(element, className) {
                            if (!StickySidebar.hasClass(element, className)) {
                                if (element.classList) element.classList.add(className); else element.className += ' ' + className;
                            }
                        }
                    }, {
                        key: 'removeClass',
                        value: function removeClass(element, className) {
                            if (StickySidebar.hasClass(element, className)) {
                                if (element.classList) element.classList.remove(className); else element.className = element.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
                            }
                        }
                    }, {
                        key: 'hasClass',
                        value: function hasClass(element, className) {
                            if (element.classList) return element.classList.contains(className); else return new RegExp('(^| )' + className + '( |$)', 'gi').test(element.className);
                        }
                    }, {
                        key: 'defaults',
                        get: function () {
                            return DEFAULTS;
                        }
                    }]);

                    return StickySidebar;
                }();

                return StickySidebar;
            }();

            exports.default = StickySidebar;


            // Global
            // -------------------------
            window.StickySidebar = StickySidebar;
        });
    });

    var stickySidebar$1 = unwrapExports(stickySidebar);

    exports['default'] = stickySidebar$1;
    exports.__moduleExports = stickySidebar;

    Object.defineProperty(exports, '__esModule', {value: true});

})));


/*[PATH @digikala/supernova-digikala-desktop/assets/local/js/controllers/digiclubController/indexAction.js]*/
var IndexAction = {
    displayName: "IndexAction",
    init: function() {
        var functions = [
            this.initCopyToClipboard,
            this.initMembershipActivation,
            this.initDropDown,
            this.initToggle,
        ];

        if(window.currentPage === 'index') {
            functions = functions.concat([
                this.initMainSlider,
                this.initPartnersSlider,
                this.initNewsletterSlider,
            ]);

            if(!isModuleActive('digiclub_game_center_content')) {
                functions.push(this.initVoucherSlider);
            }
        }

        else if(window.currentPage === 'rewards') {
            functions = functions.concat([
                this.initRewardBox,
                this.initRewardInteractions,
                this.initStopPropagation,
                this.initFilterDropDown,
                this.initListFilterInput,
                this.initSort,
                this.initHandleQueryParameters,
            ]);

        }

        else if(window.currentPage === 'history') {
            functions = functions.concat([
                this.initHistoryDetailsSwitch,
                this.initBoxTabsSwitch,
                this.initFilterDropDown,
                this.initSort,
                // this.initRemovePendingHistory,
            ]);
        }

        else if(window.currentPage === 'luckyDraw') {
            functions = functions.concat([
                this.initLuckyDrawPageCounter,
                this.initDCScrollToTerms,
                this.initShowWinners,
            ]);
            
            this.initLuckyDrawInteractions('dc-luckydraw-purchase', 10, window.endpoints.luckyDrawChanceAction);

        }

        else if(window.currentPage === 'luckySpinner') {
            functions = functions.concat([
                this.initSpin,
            ]);

            this.initLuckyDrawInteractions('lucky-spinner-add-chance', 10, window.endpoints.spinnerChanceAction);
        }

        window.Services.callListInTryCatch(functions, this);
    },

    initHandleQueryParameters: function() {
        var queryParams = Services.getQueryString(location.href),
            queryParamsObject = {};

        if(queryParams) queryParamsObject = Services.parseQueryString(queryParams);

        var triggerSource = queryParamsObject['trigger-source'];

        if(triggerSource) {
            var $dcSectionTarget = $('.js-digiclub-section[data-digiclub-section-name=' + triggerSource + ']'),
                dcRewardStickyHeaderHeight = $('.js-dc-reward-sticky-header').height();

            window.IndexAction.dcScrollToElement($dcSectionTarget, -dcRewardStickyHeaderHeight);
        }
    },

    initToggle: function() {
        $(document).on('click', '.js-dc-toggle-switch', function () {
            var $toggleSwitch = $(this),
                isActive = $toggleSwitch.hasClass('is-active'),
                $toggleBox = $toggleSwitch.closest('.js-dc-toggle-box'),
                $toggleContentAll = $toggleBox.find('.js-dc-toggle-content'),
                $toggleContentActive = $toggleContentAll.filter('[data-toggle-state="active"]'),
                $toggleContentInactive = $toggleContentAll.filter('[data-toggle-state="inactive"]');

            $toggleSwitch.toggleClass("is-active");
            $toggleContentAll.addClass("u-hidden");
            if (isActive) {
                $toggleContentInactive.removeClass("u-hidden");
            } else {
                $toggleContentActive.removeClass("u-hidden");
            }
        });
    },

    initDropDown: function() {
        var $dropdownAll = $(".js-dc-dropdown"),
            $dropdownTriggerAll = $dropdownAll.find(".js-dc-dropdown-trigger"),
            $dropdownContentAll = $dropdownAll.find(".js-dc-dropdown-content");

        $dropdownAll.each(function() {
            var $dropdownFilter = $(this),
                $dropdownTrigger = $dropdownFilter.find(".js-dc-dropdown-trigger"),
                $dropdownContent = $dropdownFilter.find(".js-dc-dropdown-content");

            $dropdownTrigger.on("click", function(event) {
                $dropdownTrigger.toggleClass("is-open");
                $dropdownContent.toggleClass("u-hidden");
                $dropdownTriggerAll.not($dropdownTrigger).removeClass("is-open");
                $dropdownContentAll.not($dropdownContent).addClass("u-hidden");
                event.stopPropagation();
            });
        });

        $(document).on("click", function(event) {
            if (!$(event.target).closest($dropdownAll).length) {
                $dropdownTriggerAll.removeClass("is-open");
                $dropdownContentAll.addClass("u-hidden");
            }
        });
    },

    initSpin: function() {
        var rewardsImg = $('.js-lucky-spinner-rewards'),
            luckySpinnerBtn = $('.js-lucky-spinner-button'),
            chances = $('.js-lucky-spinner-chances'),
            luckySpinnerModal = $('.js-lucky-spinner-modal'),
            modalTicketBackground = luckySpinnerModal.find('.js-lucky-spinner-ticket-background'),
            modalAmount = luckySpinnerModal.find('.js-lucky-spinner-modal-amount'),
            modalBrand = luckySpinnerModal.find('.js-lucky-spinner-modal-brand'),
            modalInstruction = luckySpinnerModal.find('.js-lucky-spinner-modal-instruction'),
            modalRewardType = luckySpinnerModal.find('.js-lucky-spinner-reward-type'),
            modalReward = luckySpinnerModal.find('.js-lucky-spinner-modal-reward'),
            csrf = luckySpinnerBtn.data('token'),
            color = 'white',
            wheelDeg = -15,
            reward,
            prevReward = 0;

        var luckySpinnerRespondModal = $('[data-remodal-id=lucky-spinner-response]').remodal({
            modifier: "remodal-lucky-spinner"
        });

        luckySpinnerBtn.on('click', function() {
            Services.ajaxPOSTRequestJSON(
                window.endpoints.spinAction,
                {
                    token: csrf
                },
                function (res) {
                    reward = res.prize;
                    wheelDeg += 3600 + (30 * reward) - prevReward;
                    prevReward = (30 * reward);
                    color = rewardsImg.find('#'+ res.prize).data('color');

                    rewardsImg.css('transform', 'translate(270px, 20px) rotate(' + -wheelDeg + 'deg)');

                    modalTicketBackground.css('color', color);
                    if(res.type === 'free-delivery') {
                        modalAmount.text('');
                        modalRewardType.text('ارسال رایگان');
                    } else {
                        modalAmount.text(Services.convertToFaDigit(Services.formatCurrency(res.amount, false, '')));
                        modalRewardType.text(res.type === 'percent' ? 'درصد' : 'تومان');
                    }
                    modalBrand.text(res.brand);
                    modalInstruction.text(res.instruction);
                    modalReward.text(res.voucherCode);

                    rewardsImg.on('transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd', function(){
                        luckySpinnerRespondModal.open();
                        chances.text(Services.convertToFaDigit(res.chances));
                        if(res.chances === 0) luckySpinnerBtn.addClass('disabled');

                        rewardsImg.off('transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd');
                    });


                },
                function (res) {
                    alert(res.data);
                }
            );
        })
    },

    initMembershipActivation: function() {
        var $termsModalElement = $('[data-remodal-id=dc-terms]'),
            $termsModalBtn = $('.js-terms-modal-trigger'),
            termsModal = $termsModalElement.remodal(),
            $activationBtn = $termsModalElement.find(".js-dc-activate-membership"),
            $termsCheckbox = $termsModalElement.find(".js-dc-terms-checkbox");

        $termsModalBtn.on('click', function() {
            termsModal.open();
        });

        $termsCheckbox.on('change', function() {
            if($termsCheckbox.is(':checked')) $activationBtn.removeClass('disabled');
            else $activationBtn.addClass('disabled');
        });

        $activationBtn.on('click', function () {
            Services.ajaxPOSTRequestJSON(
                activateUrl,
                {
                },
                function (res) {
                    window.location.reload();
                },
                function (res) {
                    console.log(res.errors);
                    alert('ERROR');
                })
        });
    },

    initMainSlider: function() {
        var $sliderElement = $(".js-main-slider"),
            sliderOptions = {
                loop: true,
                autoplay: {
                    delay: 5000
                },
                effect: "fade",
                centeredSlides: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true
                }
            },
            $swiper = new Swiper($sliderElement, sliderOptions);
    },

    initVoucherSlider: function() {
        var $sliderElement = $(".js-main-voucher-slider"),
            sliderOptions = {
                loop: true,
                slidesPerView: 4,
                loopedSlides: 1,
                navigation: {
                    nextEl: ".js-main-voucher-next",
                    prevEl: ".js-main-voucher-prev"
                }
            },
            $swiper = new Swiper($sliderElement, sliderOptions);
    },

    initLuckyDrawPageCounter: function() {
        var $dcLuckydrawCounter = $(".js-dc-luckydraw-counter"),
            endTime = Date.parse(window.digiclubLuckyDrawEndTime) / 1000,
            now = Date.now() / 1000,
            timeLeft = (endTime - now > 0)
                ? endTime - now
                : 0;

        $dcLuckydrawCounter.FlipClock(
            timeLeft,
            {
                clockFace: 'DailyCounter',
                countdown: true
        });
    },

    initLuckyDrawInteractions: function(remodalId, unitPoint, url) {
        var $luckyDrawModalElement = $('[data-remodal-id=' + remodalId + ']'),
            $luckyDrawModalBtn = $('.js-luckydraw-modal-trigger'),
            luckyDrawModal = $luckyDrawModalElement.remodal(),
            $dcCountInput = $luckyDrawModalElement.find('.js-dc-luckydraw-points-input'),
            $dcCountResult = $luckyDrawModalElement.find('.js-dc-luckydraw-points-result'),
            $dcPointsCurrent = $luckyDrawModalElement.find('.js-dc-points-current'),
            $dcPointsAfterPurchase = $luckyDrawModalElement.find('.js-dc-points-after-purchase'),
            $getluckydrawChanceBtn = $luckyDrawModalElement.find('.js-get-luckydraw-chance'),
            csrf = $getluckydrawChanceBtn.data('token'),
            count = null,
            pointsNeeded = null,
            pointsCurrent = null,
            pointsAfterPurchase = null;
        $luckyDrawModalBtn.on('click', function() {
            luckyDrawModal.open();
        });

        $luckyDrawModalElement.on('opened', function () {
            $dcCountInput.focus();
        });

        $dcCountInput.on('keypress', function(event) {
            var $this = $(this),
                keyNum = event.which,
                keyChar = event.key;

            event.preventDefault();

            if(isNumKeyPressed(keyNum)) {
                if(isTextSelected(this) || $this.val() === "") $this.val(Services.convertToFaDigit(keyChar));
                else $this.val($this.val().replace(/^0+|^۰+/, '') + Services.convertToFaDigit(keyChar));
            }

            $this.trigger('change');
        });

        $dcCountInput.on('change', function() {
            count = Services.convertToEnDigit($dcCountInput.val());
            pointsNeeded = multiply(count, unitPoint);
            pointsCurrent = Services.convertToEnDigit($dcPointsCurrent.text());
            pointsAfterPurchase = pointsCurrent - pointsNeeded;

            $dcCountResult.text(Services.convertToFaDigit(pointsNeeded));
            if(pointsAfterPurchase >= 0) {
                $dcPointsAfterPurchase.text(Services.convertToFaDigit(pointsAfterPurchase));
                $getluckydrawChanceBtn.removeClass('disabled');
            } else {
                $dcPointsAfterPurchase.text(Services.convertToFaDigit(0));
                $getluckydrawChanceBtn.addClass('disabled');
            }
            
        });

        $dcCountInput.trigger('change');

        $getluckydrawChanceBtn.on('click', function() {
            Services.ajaxPOSTRequestJSON(
                url,
                {
                    "count": count,
                    token: csrf
                },
                function (res) {
                    location.reload();
                },
                function (res) {
                    console.log(res.errors);
                    alert('ERROR');
                }
            )
        });

        function multiply(num1, num2) {
            return num1 * num2;
        }

        function isTextSelected(input) {
            if (typeof input.selectionStart == "number") {
                return input.selectionStart === 0 && input.selectionEnd === input.value.length;
            } else if (typeof document.selection != "undefined") {
                input.focus();
                return document.selection.createRange().text === input.value;
            }
        }

        function isNumKeyPressed(keyNum) {
            return 48 <= keyNum && keyNum <= 59 || 1775 <= keyNum && keyNum <= 1785
        }
    },

    initShowWinners: function () {
        $('.js-winners-see-more').on('click', function () {
            $(this).siblings('.js-winners-container').addClass('is-open');
            $(this).hide();
        })
    },

    initDCScrollToTerms: function() {
        var $luckyDrawInternalLink = $('.js-dc-terms-link'),
            selector = '#'+ $luckyDrawInternalLink.attr('target'),
            $terms = $(selector);

        $luckyDrawInternalLink.on('click', function(e){
            window.IndexAction.dcScrollToElement($terms);
            e.preventDefault();
        });
    },

    dcScrollToElement: function($element, alter) {
        if (!$element || !($element instanceof jQuery) ) return false;
        if (!alter) alter = 0;

        var headerHeight = $('.js-header-sticky').outerHeight() || 0,
            newPosition = $element.offset();

        $('html, body').stop().animate({ scrollTop: newPosition.top + (alter - headerHeight) }, 500);
    },

    initPartnersSlider: function() {
        var $sliderElement = $(".js-main-partners-slider"),
            sliderOptions = {
                loop: true,
                freeMode: true,
                mousewheel: true,
                spaceBetween: 30,
                slidesPerView: "auto"
            },
            $swiper = new Swiper($sliderElement, sliderOptions);

    },

    initNewsletterSlider: function() {
        var $sliderElement = $(".js-main-newsletter-slider"),
            sliderOptions = {
                loop: true,
                slidesPerView: 2,
                loopedSlides: 1,
                navigation: {
                    nextEl: ".js-main-newsletter-next",
                    prevEl: ".js-main-newsletter-prev"
                }
            },
            $swiper = new Swiper($sliderElement, sliderOptions);
    },

    initBoxTabsSwitch: function() {
        var $tabs = $(".js-box-tab");

        $tabs.on("click", function() {
            var $tab = $(this),
                tabId = $tab.data("id"),
                $box = $tab.closest(".js-box"),
                $tabs = $box.find(".js-box-tab"),
                $contents = $box.find(".js-box-content"),
                $content = $contents.filter("[data-id=\"" + tabId + "\"]");

            $tabs.removeClass("is-active");
            $tab.addClass("is-active");
            $contents.addClass("u-hidden");
            $content.removeClass("u-hidden");
            $box.trigger('tab-switch');
        });

    },

    initRemovePendingHistory: function() {
        var pendingHistoryTempItems = $('.js-dc-history-pending-temp'),
            pendingCountElement = $('.js-dc-pending-count'),
            pendingCount = pendingCountElement.data('pending-count') || 0;

        pendingCountElement.closest('.js-box').on('tab-switch', function() {
            var newPendingCount = Math.max(0, pendingCount - pendingHistoryTempItems.length);

            if(newPendingCount > 0) {
                pendingCountElement
                    .text(newPendingCount)
                    .data('pending-count', newPendingCount);
            } else {
                pendingCountElement.remove()
            }

            pendingHistoryTempItems.remove();
        })

    },

    initHistoryDetailsSwitch: function() {
        var $allShowMoreBtn = $(".js-dc-history-table-show-more"),
            $allDetails = $(".js-dc-history-table-details");

        $allShowMoreBtn.on("click", function() {
            var $showMoreBtn = $(this),
                $row = $showMoreBtn.closest(".js-dc-history-table-row"),
                $details = $row.find(".js-dc-history-table-details");

            if ($showMoreBtn.hasClass("is-open")) {
                $allShowMoreBtn.removeClass("is-open");
                $allDetails.addClass("u-hidden");
            } else {
                $allShowMoreBtn.removeClass("is-open");
                $allDetails.addClass("u-hidden");
                $showMoreBtn.addClass("is-open");
                $details.removeClass("u-hidden");
            }
        });
    },

    initRewardBox: function() {
        var rewardBox = $(".js-reward-box"),
            rewardContainer = rewardBox.find(".js-reward-container"),
            showMoreBtn = rewardBox.find(".js-reward-show-more-btn");

        showMoreBtn.on("click", function() {
            showMoreBtn.hide().off("click");
            rewardContainer.removeClass("c-dc-reward__container--reward-limited");
        });
    },

    initRewardInteractions: function() {
        var $dcRewardAll = $('.js-dc-reward'),
            $dcInfoModalElement = $('[data-remodal-id=dc-reward-info]'),
            $dcRewardModalElement = $('[data-remodal-id=dc-reward-code]'),
            $dcRewardTitle = $('.js-dc-modal-reward-title'),
            $dcRewardInstruction = $dcInfoModalElement.find('.js-de-modal-reward-instruction'),
            $dcInfoContainer = $dcInfoModalElement.find('.js-dc-info-modal-details'),
            $dcLinkContainer = $dcInfoModalElement.find('.js-dc-info-modal-link'),
            $dcInteractionAll = $dcInfoModalElement.find('.js-dc-reward-info-modal-interaction'),
            $dcGetRewardBox = $dcInfoModalElement.find('.js-dc-get-reward-box'),
            $dcGetRewardInstruction = $dcInfoModalElement.find('.js-dc-get-reward-instruction'),
            $dcGetCodeBox = $dcInfoModalElement.find('.js-dc-get-code-box'),
            $dcLogin = $dcInfoModalElement.find('.js-dc-login'),
            $dcInfoCodeContainer = $dcInfoModalElement.find('.js-dc-info-modal-code'),
            $dcRewardCodeContainer = $dcRewardModalElement.find('.js-dc-reward-modal-code'),
            $getReward = $dcInfoModalElement.find('.js-dc-get-reward'),
            csrf = $getReward.data('token'),
            dcInfoModal = $dcInfoModalElement.remodal(),
            dcRewardModal = $dcRewardModalElement.remodal(),
            rewardCode = null,
            rewardState = null,
            rewardType = null,
            rewardId = 0;
        $dcRewardAll.on('click', function() {
            var $dcReward = $(this);

            rewardId = $dcReward.data('reward-id');
            rewardType = $dcReward.data('reward-type');
            rewardState = $dcReward.data('reward-state');
            rewardCode = $dcReward.data('reward-code') || null;

            if(rewardState === "notLoggedIn") {
                $dcInteractionAll.addClass('u-hidden');
                $dcLogin.removeClass('u-hidden')
            } else if(rewardState === "boughtToday") {
                $dcInteractionAll.addClass('u-hidden');
                $dcGetCodeBox.removeClass('u-hidden');
                $dcInfoCodeContainer.text(rewardCode);
            } else if(rewardState === "notEnoughPoints") {
                $dcInteractionAll.addClass('u-hidden');
                $dcGetRewardInstruction.removeClass('u-hidden');
            } else {
                $dcInteractionAll.addClass('u-hidden');
                $dcGetRewardBox.removeClass('u-hidden');
            }

            Services.ajaxGETRequestJSON(
                window.endpoints.infoAction,
                {
                    "reward_id": rewardId,
                    "reward_type": rewardType
                },
                function (res) {
                    if(isModuleActive('digiclub_reward_ajax_modification')) {
                        $dcRewardInstruction.html(res.instruction);

                        if(rewardState === "available") {
                            $getReward.removeClass('disabled');
                        } else {
                            $getReward.addClass('disabled');
                        }
                    } else {
                        $dcRewardTitle.text(res.title);
                        $dcInfoContainer.html(res.details);
                        if (rewardState === "available") {
                            $getReward.removeClass('disabled');
                        } else {
                            $getReward.addClass('disabled');
                        }
                        if (rewardType === "product") {
                            $dcLinkContainer.attr('href', res.link).removeClass('u-hidden');
                        } else {
                            $dcLinkContainer.attr('href', '').addClass('u-hidden');
                        }
                    }

                    dcInfoModal.open();
                },
                function (res) {
                    console.log(res.errors);
                    alert('ERROR');
                }
            )
        });

        $getReward.on('click', function() {
            Services.ajaxGETRequestJSON(
                window.endpoints.rewardAction,
                {
                    "reward_id": rewardId,
                    "reward_type": rewardType,
                    token: csrf
                },
                function (res) {
                    $dcRewardCodeContainer.text(res.code);
                    dcRewardModal.open();
                },
                function (res) {
                    console.log(res.errors);
                    alert('ERROR');
                }
            )
        });

        $dcRewardModalElement.on('closing', function() {
            window.location.reload();
        })

    },

    initFilterDropDown: function() {
        var thiz = this,
            $filterForm = $('.js-dc-filter'),
            $dropdownFilterAll = $(".js-dc-dropdown"),
            emptyFilterFormOnLoad = $filterForm.find("input[type=checkbox]:checked.js-filter-checkbox").length > 0;

        $dropdownFilterAll.each(function() {

            var $dropdownFilter = $(this),
                $checkboxInput = $dropdownFilter.find(".js-filter-checkbox"),
                $submitBtn = $dropdownFilter.find(".js-filter-dropdown-submit"),
                $clearBtn = $dropdownFilter.find(".js-filter-dropdown-clear");

            if(emptyFilterFormOnLoad) {
                $submitBtn.removeClass("disabled");
            } else {
                $checkboxInput.on("change", function() {
                    if($checkboxInput.is(":checked")) {
                        $submitBtn.removeClass("disabled");
                    } else {
                        $submitBtn.addClass("disabled");
                    }
                });
            }

            $submitBtn.on('click', function() {
                thiz.submitFiltersAndSorts();
                // $filterForm.submit();
            });

            $clearBtn.on('click', function() {
                $checkboxInput.prop('checked', false);
                // $filterForm.submit();
            });

        });

    },

    initListFilterInput: function() {
        var $listFilterInputAll = $(".js-filter-input");

        $listFilterInputAll.each(function() {
            var $listFilterInput = $(this),
                $filterContent = $listFilterInput.closest(".js-filter-content"),
                $filterItemsAll = $filterContent.find(".js-filter-item"),
                $filterLabelsAll = $filterContent.find(".js-filter-label");

            $listFilterInput.on("keyup", function() {
                var val = $listFilterInput.val();

                if (val) {
                    $filterLabelsAll.each(function() {
                        var $filterLabel = $(this),
                            $filterItem = $filterLabel.closest(".js-filter-item");

                        if ($filterLabel.data("en").indexOf(val) >= 0 ||
                            $filterLabel.data("fa").indexOf(val) >= 0 ||
                            $filterLabel.data("search").indexOf(val) >= 0 ||
                            $filterItem.find(".js-filter-checkbox").is(":checked")) {
                            $filterItem.show();
                        } else {
                            $filterItem.hide();
                        }
                    });
                } else {
                    $filterItemsAll.show();
                }
            });

            var $cleanableInput = $filterContent.find(".js-cleanable-input"),
                $inputCleaner = $cleanableInput.siblings(".js-input-cleaner");

            $cleanableInput.on("keyup", function() {
                if ($cleanableInput.val()) {
                    $inputCleaner.css("display", "inline-flex");
                } else {
                    $inputCleaner.css("display", "none");
                }
            });

            $inputCleaner.on("click", function() {
                $inputCleaner.css("display", "none");
                $cleanableInput.val("");
                $cleanableInput.keyup();
            });
        })
    },

    initSort: function() {
        var thiz = this,
            $sortForm = $('.js-dc-sort, .js-dc-filter-radio'),
            $radioBtn = $sortForm.find('input[type=radio]');

        $radioBtn.on('change', function() {
            var triggerSrouce = $(this).closest('.js-digiclub-section').data('digiclub-section-name');
            thiz.submitFiltersAndSorts(triggerSrouce);
        });
    },

    submitFiltersAndSorts: function(triggerSource) {
        var origin   = location.origin,
            pathname = location.pathname,
            formsSerialized = $('.js-dc-filter, .js-dc-sort, .js-dc-filter-radio').serialize(),
            triggerSourceQueryParam = (triggerSource) ? '&trigger-source=' + triggerSource : '',
            newUrl = [ origin, pathname, '?', formsSerialized, triggerSourceQueryParam ].join('');

        $(location).attr('href', newUrl);
    },

    initCopyToClipboard: function() {
        $(document).on("click", ".js-copy", function(e) {
            e.stopPropagation();
            e.preventDefault();
            var $this = $(this);
            var txt = $this.text().trim();
            var code = $this.html();
            var hook = $this.closest("div");

            $this.removeClass("js-copy");
            copyToClipboard(txt, hook);
            $this.text("کپی شد");

            setTimeout(function() {
                $this.html(code);
                $this.addClass("js-copy");
            }, 2000);
        });

        function copyToClipboard(text, appendHook) {

            var aux = $(document.createElement("textarea"));
            aux.addClass("u-hidden-visually");
            aux.text(text);
            aux.attr("contenteditable", true); //IOS compatibility
            // aux.attr("readonly", true); //IOS compatibility
            appendHook.append(aux);
            aux[0].focus();
            aux[0].setSelectionRange(0, 999999); //IOS compatibility
            document.execCommand("copy");
            aux.remove();
        }
    },

    initStopPropagation: function() {
        $('.js-stop-propagation').on('click', function(e) {
            e.stopPropagation();
        })
    },
};

$(function() {
    IndexAction.init();
});