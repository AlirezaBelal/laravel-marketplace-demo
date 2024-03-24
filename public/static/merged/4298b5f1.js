/*[PATH @digikala/supernova-digikala-marketplace/static/js/inputmask.js]*/
/*
 * Input Mask Core
 * http://github.com/RobinHerbots/jquery.inputmask
 * Copyright (c) 2010 -	Robin Herbots
 * Licensed under the MIT license (http://www.opensource.org/licenses/mit-license.php)
 * Version: 0.0.0-dev
 */
(function (factory) {
    if (typeof define === "function" && define.amd) {
        define(["./dependencyLibs/inputmask.dependencyLib", "./global/window", "./global/document"], factory);
    } else if (typeof exports === "object") {
        module.exports = factory(require("./dependencyLibs/inputmask.dependencyLib"), require("./global/window"), require("./global/document"));
    } else {
        window.Inputmask = factory(window.dependencyLib || jQuery, window, document);
    }
}
(function ($, window, document, undefined) {
    var ua = navigator.userAgent,
        mobile = /mobile/i.test(ua),
        iemobile = /iemobile/i.test(ua),
        iphone = /iphone/i.test(ua) && !iemobile,
        android = /android/i.test(ua) && !iemobile;

    function Inputmask(alias, options, internal) {
        //allow instanciating without new
        if (!(this instanceof Inputmask)) {
            return new Inputmask(alias, options, internal);
        }

        this.el = undefined;
        this.events = {};
        this.maskset = undefined;
        this.refreshValue = false; //indicate a refresh from the inputvalue is needed (form.reset)

        if (internal !== true) {
            //init options
            if ($.isPlainObject(alias)) {
                options = alias;
            } else {
                options = options || {};
                options.alias = alias;
            }
            this.opts = $.extend(true, {}, this.defaults, options);
            this.noMasksCache = options && options.definitions !== undefined;
            this.userOptions = options || {}; //user passed options
            this.isRTL = this.opts.numericInput;
            resolveAlias(this.opts.alias, options, this.opts);
        }
    }

    Inputmask.prototype = {
        dataAttribute: "data-inputmask", //data attribute prefix used for attribute binding
        //options default
        defaults: {
            placeholder: "_",
            optionalmarker: {
                start: "[",
                end: "]"
            },
            quantifiermarker: {
                start: "{",
                end: "}"
            },
            groupmarker: {
                start: "(",
                end: ")"
            },
            alternatormarker: "|",
            escapeChar: "\\",
            mask: null, //needs tobe null instead of undefined as the extend method does not consider props with the undefined value
            regex: null, //regular expression as a mask
            oncomplete: $.noop, //executes when the mask is complete
            onincomplete: $.noop, //executes when the mask is incomplete and focus is lost
            oncleared: $.noop, //executes when the mask is cleared
            repeat: 0, //repetitions of the mask: * ~ forever, otherwise specify an integer
            greedy: true, //true: allocated buffer for the mask and repetitions - false: allocate only if needed
            autoUnmask: false, //automatically unmask when retrieving the value with $.fn.val or value if the browser supports __lookupGetter__ or getOwnPropertyDescriptor
            removeMaskOnSubmit: false, //remove the mask before submitting the form.
            clearMaskOnLostFocus: true,
            insertMode: true, //insert the input or overwrite the input
            clearIncomplete: false, //clear the incomplete input on blur
            alias: null,
            onKeyDown: $.noop, //callback to implement autocomplete on certain keys for example. args => event, buffer, caretPos, opts
            onBeforeMask: null, //executes before masking the initial value to allow preprocessing of the initial value.	args => initialValue, opts => return processedValue
            onBeforePaste: function (pastedValue, opts) {
                return $.isFunction(opts.onBeforeMask) ? opts.onBeforeMask.call(this, pastedValue, opts) : pastedValue;
            }, //executes before masking the pasted value to allow preprocessing of the pasted value.	args => pastedValue, opts => return processedValue
            onBeforeWrite: null, //executes before writing to the masked element. args => event, opts
            onUnMask: null, //executes after unmasking to allow postprocessing of the unmaskedvalue.	args => maskedValue, unmaskedValue, opts
            showMaskOnFocus: true, //show the mask-placeholder when the input has focus
            showMaskOnHover: true, //show the mask-placeholder when hovering the empty input
            onKeyValidation: $.noop, //executes on every key-press with the result of isValid. Params: key, result, opts
            skipOptionalPartCharacter: " ", //a character which can be used to skip an optional part of a mask
            numericInput: false, //numericInput input direction style (input shifts to the left while holding the caret position)
            rightAlign: false, //align to the right
            undoOnEscape: true, //pressing escape reverts the value to the value before focus
            //numeric basic properties
            radixPoint: "", //".", // | ","
            radixPointDefinitionSymbol: undefined, //set the radixPoint definitionSymbol ~ used for awareness of the radixpoint
            groupSeparator: "", //",", // | "."
            //numeric basic properties
            keepStatic: null, //try to keep the mask static while typing. Decisions to alter the mask will be posponed if possible - null see auto selection for multi masks
            positionCaretOnTab: true, //when enabled the caret position is set after the latest valid position on TAB
            tabThrough: false, //allows for tabbing through the different parts of the masked field
            supportsInputType: ["text", "tel", "password"], //list with the supported input types
            //specify keyCodes which should not be considered in the keypress event, otherwise the preventDefault will stop their default behavior especially in FF
            ignorables: [8, 9, 13, 19, 27, 33, 34, 35, 36, 37, 38, 39, 40, 45, 46, 93, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 0, 229],
            isComplete: null, //override for isComplete - args => buffer, opts - return true || false
            canClearPosition: $.noop, //hook to alter the clear behavior in the stripValidPositions args => maskset, position, lastValidPosition, opts => return true|false/command object
            preValidation: null, //hook to preValidate the input.  Usefull for validating regardless the definition.	args => buffer, pos, char, isSelection, opts => return true/false/command object
            postValidation: null, //hook to postValidate the result from isValid.	Usefull for validating the entry as a whole.	args => buffer, currentResult, opts => return true/false/json
            staticDefinitionSymbol: undefined, //specify a definitionSymbol for static content, used to make matches for alternators
            jitMasking: false, //just in time masking ~ only mask while typing, can n (number), true or false
            nullable: true, //return nothing instead of the buffertemplate when the user hasn't entered anything.
            inputEventOnly: false, //dev option - testing inputfallback behavior
            noValuePatching: false, //disable value property patching
            positionCaretOnClick: "lvp", //none, lvp (based on the last valid position (default), radixFocus (position caret to radixpoint on initial click)
            casing: null, //mask-level casing. Options: null, "upper", "lower" or "title" or callback args => elem, test, pos, validPositions return charValue
            inputmode: "verbatim", //specify the inputmode  - already in place for when browsers will support it
            colorMask: false, //enable css styleable mask
            androidHack: false, //see README_android.md
            importDataAttributes: true //import data-inputmask attributes
        },
        definitions: {
            "9": { //\uFF11-\uFF19 #1606
                validator: "[0-9\uFF11-\uFF19]",
                cardinality: 1,
                definitionSymbol: "*"
            },
            "a": { //\u0410-\u044F\u0401\u0451\u00C0-\u00FF\u00B5 #76
                validator: "[A-Za-z\u0410-\u044F\u0401\u0451\u00C0-\u00FF\u00B5]",
                cardinality: 1,
                definitionSymbol: "*"
            },
            "*": {
                validator: "[0-9\uFF11-\uFF19A-Za-z\u0410-\u044F\u0401\u0451\u00C0-\u00FF\u00B5]",
                cardinality: 1
            }
        },
        aliases: {}, //aliases definitions => see jquery.inputmask.extensions.js
        masksCache: {},
        mask: function (elems) {
            var that = this;

            function importAttributeOptions(npt, opts, userOptions, dataAttribute) {
                if (opts.importDataAttributes === true) {
                    var attrOptions = npt.getAttribute(dataAttribute),
                        option, dataoptions, optionData, p;

                    function importOption(option, optionData) {
                        optionData = optionData !== undefined ? optionData : npt.getAttribute(dataAttribute + "-" + option);
                        if (optionData !== null) {
                            if (typeof optionData === "string") {
                                if (option.indexOf("on") === 0) optionData = window[optionData]; //get function definition
                                else if (optionData === "false") optionData = false;
                                else if (optionData === "true") optionData = true;
                            }
                            userOptions[option] = optionData;
                        }
                    }

                    if (attrOptions && attrOptions !== "") {
                        attrOptions = attrOptions.replace(new RegExp("'", "g"), '"');
                        dataoptions = JSON.parse("{" + attrOptions + "}");
                    }

                    //resolve aliases
                    if (dataoptions) { //pickup alias from dataAttribute
                        optionData = undefined;
                        for (p in dataoptions) {
                            if (p.toLowerCase() === "alias") {
                                optionData = dataoptions[p];
                                break;
                            }
                        }
                    }
                    importOption("alias", optionData); //pickup alias from dataAttribute-alias
                    if (userOptions.alias) {
                        resolveAlias(userOptions.alias, userOptions, opts);
                    }

                    for (option in opts) {
                        if (dataoptions) {
                            optionData = undefined;
                            for (p in dataoptions) {
                                if (p.toLowerCase() === option.toLowerCase()) {
                                    optionData = dataoptions[p];
                                    break;
                                }
                            }
                        }
                        importOption(option, optionData);
                    }
                }
                $.extend(true, opts, userOptions);

                //handle dir=rtl
                if (npt.dir === "rtl" || opts.rightAlign) {
                    npt.style.textAlign = "right";
                }

                if (npt.dir === "rtl" || opts.numericInput) {
                    npt.dir = "ltr";
                    npt.removeAttribute("dir");
                    opts.isRTL = true;
                }

                return opts;
            }

            if (typeof elems === "string") {
                elems = document.getElementById(elems) || document.querySelectorAll(elems);
            }
            elems = elems.nodeName ? [elems] : elems;
            $.each(elems, function (ndx, el) {
                var scopedOpts = $.extend(true, {}, that.opts);
                importAttributeOptions(el, scopedOpts, $.extend(true, {}, that.userOptions), that.dataAttribute);
                var maskset = generateMaskSet(scopedOpts, that.noMasksCache);
                if (maskset !== undefined) {
                    if (el.inputmask !== undefined) {
                        el.inputmask.opts.autoUnmask = true; //force autounmasking when remasking
                        el.inputmask.remove();
                    }
                    //store inputmask instance on the input with element reference
                    el.inputmask = new Inputmask(undefined, undefined, true);
                    el.inputmask.opts = scopedOpts;
                    el.inputmask.noMasksCache = that.noMasksCache;
                    el.inputmask.userOptions = $.extend(true, {}, that.userOptions);
                    el.inputmask.isRTL = scopedOpts.isRTL || scopedOpts.numericInput;
                    el.inputmask.el = el;
                    el.inputmask.maskset = maskset;

                    $.data(el, "_inputmask_opts", scopedOpts);

                    maskScope.call(el.inputmask, {
                        "action": "mask"
                    });
                }
            });
            return elems && elems[0] ? (elems[0].inputmask || this) : this;
        },
        option: function (options, noremask) { //set extra options || retrieve value of a current option
            if (typeof options === "string") {
                return this.opts[options];
            } else if (typeof options === "object") {
                $.extend(this.userOptions, options); //user passed options
                //remask
                if (this.el && noremask !== true) {
                    this.mask(this.el);
                }
                return this;
            }
        },
        unmaskedvalue: function (value) {
            this.maskset = this.maskset || generateMaskSet(this.opts, this.noMasksCache);
            return maskScope.call(this, {
                "action": "unmaskedvalue",
                "value": value
            });
        },
        remove: function () {
            return maskScope.call(this, {
                "action": "remove"
            });
        },
        getemptymask: function () { //return the default (empty) mask value, usefull for setting the default value in validation
            this.maskset = this.maskset || generateMaskSet(this.opts, this.noMasksCache);
            return maskScope.call(this, {
                "action": "getemptymask"
            });
        },
        hasMaskedValue: function () { //check wheter the returned value is masked or not; currently only works reliable when using jquery.val fn to retrieve the value
            return !this.opts.autoUnmask;
        },
        isComplete: function () {
            this.maskset = this.maskset || generateMaskSet(this.opts, this.noMasksCache);
            return maskScope.call(this, {
                "action": "isComplete"
            });
        },
        getmetadata: function () { //return mask metadata if exists
            this.maskset = this.maskset || generateMaskSet(this.opts, this.noMasksCache);
            return maskScope.call(this, {
                "action": "getmetadata"
            });
        },
        isValid: function (value) {
            this.maskset = this.maskset || generateMaskSet(this.opts, this.noMasksCache);
            return maskScope.call(this, {
                "action": "isValid",
                "value": value
            });
        },
        format: function (value, metadata) {
            this.maskset = this.maskset || generateMaskSet(this.opts, this.noMasksCache);
            return maskScope.call(this, {
                "action": "format",
                "value": value,
                "metadata": metadata //true/false getmetadata
            });
        },
        analyseMask: function (mask, regexMask, opts) {
            var tokenizer = /(?:[?*+]|\{[0-9\+\*]+(?:,[0-9\+\*]*)?\})|[^.?*+^${[]()|\\]+|./g,
                //Thx to https://github.com/slevithan/regex-colorizer for the regexTokenizer regex
                regexTokenizer = /\[\^?]?(?:[^\\\]]+|\\[\S\s]?)*]?|\\(?:0(?:[0-3][0-7]{0,2}|[4-7][0-7]?)?|[1-9][0-9]*|x[0-9A-Fa-f]{2}|u[0-9A-Fa-f]{4}|c[A-Za-z]|[\S\s]?)|\((?:\?[:=!]?)?|(?:[?*+]|\{[0-9]+(?:,[0-9]*)?\})\??|[^.?*+^${[()|\\]+|./g,
                escaped = false,
                currentToken = new MaskToken(),
                match,
                m,
                openenings = [],
                maskTokens = [],
                openingToken,
                currentOpeningToken,
                alternator,
                lastMatch,
                groupToken;

            function MaskToken(isGroup, isOptional, isQuantifier, isAlternator) {
                this.matches = [];
                this.openGroup = isGroup || false;
                this.alternatorGroup = false;
                this.isGroup = isGroup || false;
                this.isOptional = isOptional || false;
                this.isQuantifier = isQuantifier || false;
                this.isAlternator = isAlternator || false;
                this.quantifier = {
                    min: 1,
                    max: 1
                };
            }

            //test definition => {fn: RegExp/function, cardinality: int, optionality: bool, newBlockMarker: bool, casing: null/upper/lower, def: definitionSymbol, placeholder: placeholder, mask: real maskDefinition}
            function insertTestDefinition(mtoken, element, position) {
                position = position !== undefined ? position : mtoken.matches.length;
                var prevMatch = mtoken.matches[position - 1];
                if (regexMask) {
                    if (element.indexOf("[") === 0 || (escaped && /\\d|\\s|\\w]/i.test(element)) || element === ".") {
                        mtoken.matches.splice(position++, 0, {
                            fn: new RegExp(element, opts.casing ? "i" : ""),
                            cardinality: 1,
                            optionality: mtoken.isOptional,
                            newBlockMarker: prevMatch === undefined || prevMatch.def !== element,
                            casing: null,
                            def: element,
                            placeholder: undefined,
                            nativeDef: element
                        });
                    } else {
                        if (escaped) element = element[element.length - 1];
                        $.each(element.split(""), function (ndx, lmnt) {
                            prevMatch = mtoken.matches[position - 1];
                            mtoken.matches.splice(position++, 0, {
                                fn: null,
                                cardinality: 0,
                                optionality: mtoken.isOptional,
                                newBlockMarker: prevMatch === undefined || (prevMatch.def !== lmnt && prevMatch.fn !== null),
                                casing: null,
                                def: opts.staticDefinitionSymbol || lmnt,
                                placeholder: opts.staticDefinitionSymbol !== undefined ? lmnt : undefined,
                                nativeDef: lmnt
                            });
                        });
                    }
                    escaped = false;
                } else {
                    var maskdef = (opts.definitions ? opts.definitions[element] : undefined) || Inputmask.prototype.definitions[element];
                    if (maskdef && !escaped) {
                        var prevalidators = maskdef.prevalidator,
                            prevalidatorsL = prevalidators ? prevalidators.length : 0;
                        //handle prevalidators
                        for (var i = 1; i < maskdef.cardinality; i++) {
                            var prevalidator = prevalidatorsL >= i ? prevalidators[i - 1] : [],
                                validator = prevalidator.validator,
                                cardinality = prevalidator.cardinality;
                            mtoken.matches.splice(position++, 0, {
                                fn: validator ? typeof validator === "string" ? new RegExp(validator, opts.casing ? "i" : "") : new function () {
                                    this.test = validator;
                                } : new RegExp("."),
                                cardinality: cardinality ? cardinality : 1,
                                optionality: mtoken.isOptional,
                                newBlockMarker: prevMatch === undefined || prevMatch.def !== (maskdef.definitionSymbol || element),
                                casing: maskdef.casing,
                                def: maskdef.definitionSymbol || element,
                                placeholder: maskdef.placeholder,
                                nativeDef: element
                            });
                            prevMatch = mtoken.matches[position - 1];
                        }
                        mtoken.matches.splice(position++, 0, {
                            fn: maskdef.validator ? typeof maskdef.validator == "string" ? new RegExp(maskdef.validator, opts.casing ? "i" : "") : new function () {
                                this.test = maskdef.validator;
                            } : new RegExp("."),
                            cardinality: maskdef.cardinality,
                            optionality: mtoken.isOptional,
                            newBlockMarker: prevMatch === undefined || prevMatch.def !== (maskdef.definitionSymbol || element),
                            casing: maskdef.casing,
                            def: maskdef.definitionSymbol || element,
                            placeholder: maskdef.placeholder,
                            nativeDef: element
                        });
                    } else {
                        mtoken.matches.splice(position++, 0, {
                            fn: null,
                            cardinality: 0,
                            optionality: mtoken.isOptional,
                            newBlockMarker: prevMatch === undefined || (prevMatch.def !== element && prevMatch.fn !== null),
                            casing: null,
                            def: opts.staticDefinitionSymbol || element,
                            placeholder: opts.staticDefinitionSymbol !== undefined ? element : undefined,
                            nativeDef: element
                        });
                        escaped = false;
                    }
                }
            }

            function verifyGroupMarker(maskToken) {
                if (maskToken && maskToken.matches) {
                    $.each(maskToken.matches, function (ndx, token) {
                            var nextToken = maskToken.matches[ndx + 1];
                            if ((nextToken === undefined || (nextToken.matches === undefined || nextToken.isQuantifier === false)) && token && token.isGroup) { //this is not a group but a normal mask => convert
                                token.isGroup = false;
                                if (!regexMask) {
                                    insertTestDefinition(token, opts.groupmarker.start, 0);
                                    if (token.openGroup !== true) {
                                        insertTestDefinition(token, opts.groupmarker.end);
                                    }
                                }
                            }
                            verifyGroupMarker(token);
                        }
                    );
                }
            }

            function defaultCase() {
                if (openenings.length > 0) {
                    currentOpeningToken = openenings[openenings.length - 1];
                    insertTestDefinition(currentOpeningToken, m);
                    if (currentOpeningToken.isAlternator) { //handle alternator a | b case
                        alternator = openenings.pop();
                        for (var mndx = 0; mndx < alternator.matches.length; mndx++) {
                            alternator.matches[mndx].isGroup = false; //don't mark alternate groups as group
                        }
                        if (openenings.length > 0) {
                            currentOpeningToken = openenings[openenings.length - 1];
                            currentOpeningToken.matches.push(alternator);
                        } else {
                            currentToken.matches.push(alternator);
                        }
                    }
                } else {
                    insertTestDefinition(currentToken, m);
                }
            }

            function reverseTokens(maskToken) {
                function reverseStatic(st) {
                    if (st === opts.optionalmarker.start) st = opts.optionalmarker.end;
                    else if (st === opts.optionalmarker.end) st = opts.optionalmarker.start;
                    else if (st === opts.groupmarker.start) st = opts.groupmarker.end;
                    else if (st === opts.groupmarker.end) st = opts.groupmarker.start;

                    return st;
                }

                maskToken.matches = maskToken.matches.reverse();
                for (var match in maskToken.matches) {
                    if (maskToken.matches.hasOwnProperty(match)) {
                        var intMatch = parseInt(match);
                        if (maskToken.matches[match].isQuantifier && maskToken.matches[intMatch + 1] && maskToken.matches[intMatch + 1].isGroup) { //reposition quantifier
                            var qt = maskToken.matches[match];
                            maskToken.matches.splice(match, 1);
                            maskToken.matches.splice(intMatch + 1, 0, qt);
                        }
                        if (maskToken.matches[match].matches !== undefined) {
                            maskToken.matches[match] = reverseTokens(maskToken.matches[match]);
                        } else {
                            maskToken.matches[match] = reverseStatic(maskToken.matches[match]);
                        }
                    }
                }

                return maskToken;
            }

            if (regexMask) {
                opts.optionalmarker.start = undefined;
                opts.optionalmarker.end = undefined;
            }
            while (match = regexMask ? regexTokenizer.exec(mask) : tokenizer.exec(mask)) {
                m = match[0];

                if (regexMask) {
                    switch (m.charAt(0)) {
                        //Quantifier
                        case "?":
                            m = "{0,1}";
                            break;
                        case "+":
                        case "*":
                            m = "{" + m + "}";
                            break;
                    }
                }

                if (escaped) {
                    defaultCase();
                    continue;
                }
                switch (m.charAt(0)) {
                    case opts.escapeChar:
                        escaped = true;
                        if (regexMask) {
                            defaultCase();
                        }
                        break;
                    case opts.optionalmarker.end:
                    // optional closing
                    case opts.groupmarker.end:
                        // Group closing
                        openingToken = openenings.pop();
                        openingToken.openGroup = false; //mark group as complete
                        if (openingToken !== undefined) {
                            if (openenings.length > 0) {
                                currentOpeningToken = openenings[openenings.length - 1];
                                currentOpeningToken.matches.push(openingToken);
                                if (currentOpeningToken.isAlternator) { //handle alternator (a) | (b) case
                                    alternator = openenings.pop();
                                    for (var mndx = 0; mndx < alternator.matches.length; mndx++) {
                                        alternator.matches[mndx].isGroup = false; //don't mark alternate groups as group
                                        alternator.matches[mndx].alternatorGroup = false;
                                    }
                                    if (openenings.length > 0) {
                                        currentOpeningToken = openenings[openenings.length - 1];
                                        currentOpeningToken.matches.push(alternator);
                                    } else {
                                        currentToken.matches.push(alternator);
                                    }
                                }
                            } else {
                                currentToken.matches.push(openingToken);
                            }
                        } else defaultCase();
                        break;
                    case opts.optionalmarker.start:
                        // optional opening
                        openenings.push(new MaskToken(false, true));
                        break;
                    case opts.groupmarker.start:
                        // Group opening
                        openenings.push(new MaskToken(true));
                        break;
                    case opts.quantifiermarker.start:
                        //Quantifier
                        var quantifier = new MaskToken(false, false, true);

                        m = m.replace(/[{}]/g, "");
                        var mq = m.split(","),
                            mq0 = isNaN(mq[0]) ? mq[0] : parseInt(mq[0]),
                            mq1 = mq.length === 1 ? mq0 : (isNaN(mq[1]) ? mq[1] : parseInt(mq[1]));
                        if (mq1 === "*" || mq1 === "+") {
                            mq0 = mq1 === "*" ? 0 : 1;
                        }
                        quantifier.quantifier = {
                            min: mq0,
                            max: mq1
                        };
                        if (openenings.length > 0) {
                            var matches = openenings[openenings.length - 1].matches;
                            match = matches.pop();
                            if (!match.isGroup) {
                                groupToken = new MaskToken(true);
                                groupToken.matches.push(match);
                                match = groupToken;
                            }
                            matches.push(match);
                            matches.push(quantifier);
                        } else {
                            match = currentToken.matches.pop();
                            if (!match.isGroup) {
                                if (regexMask && match.fn === null) {
                                    if (match.def === ".") match.fn = new RegExp(match.def, opts.casing ? "i" : "");
                                }

                                groupToken = new MaskToken(true);
                                groupToken.matches.push(match);
                                match = groupToken;
                            }
                            currentToken.matches.push(match);
                            currentToken.matches.push(quantifier);
                        }
                        break;
                    case opts.alternatormarker:
                        if (openenings.length > 0) {
                            currentOpeningToken = openenings[openenings.length - 1];
                            var subToken = currentOpeningToken.matches[currentOpeningToken.matches.length - 1];
                            if (currentOpeningToken.openGroup && //regexp alt syntax
                                (subToken.matches === undefined || (subToken.isGroup === false && subToken.isAlternator === false))) { //alternations within group
                                lastMatch = openenings.pop();
                            } else {
                                lastMatch = currentOpeningToken.matches.pop();
                            }
                        } else {
                            lastMatch = currentToken.matches.pop();
                        }
                        if (lastMatch.isAlternator) {
                            openenings.push(lastMatch);
                        } else {
                            if (lastMatch.alternatorGroup) {
                                alternator = openenings.pop();
                                lastMatch.alternatorGroup = false;
                            } else {
                                alternator = new MaskToken(false, false, false, true);
                            }
                            alternator.matches.push(lastMatch);
                            openenings.push(alternator);
                            if (lastMatch.openGroup) { //regexp alt syntax
                                lastMatch.openGroup = false;
                                var alternatorGroup = new MaskToken(true);
                                alternatorGroup.alternatorGroup = true;
                                openenings.push(alternatorGroup);
                            }
                        }
                        break;
                    default:
                        defaultCase();
                }
            }

            while (openenings.length > 0) {
                openingToken = openenings.pop();
                currentToken.matches.push(openingToken);
            }
            if (currentToken.matches.length > 0) {
                verifyGroupMarker(currentToken);
                maskTokens.push(currentToken);
            }

            if (opts.numericInput || opts.isRTL) {
                reverseTokens(maskTokens[0]);
            }
            // console.log(JSON.stringify(maskTokens));
            return maskTokens;
        }
    };

    //apply defaults, definitions, aliases
    Inputmask.extendDefaults = function (options) {
        $.extend(true, Inputmask.prototype.defaults, options);
    };
    Inputmask.extendDefinitions = function (definition) {
        $.extend(true, Inputmask.prototype.definitions, definition);
    };
    Inputmask.extendAliases = function (alias) {
        $.extend(true, Inputmask.prototype.aliases, alias);
    };
    //static fn on inputmask
    Inputmask.format = function (value, options, metadata) {
        return Inputmask(options).format(value, metadata);
    };
    Inputmask.unmask = function (value, options) {
        return Inputmask(options).unmaskedvalue(value);
    };
    Inputmask.isValid = function (value, options) {
        return Inputmask(options).isValid(value);
    };
    Inputmask.remove = function (elems) {
        $.each(elems, function (ndx, el) {
            if (el.inputmask) el.inputmask.remove();
        });
    };
    Inputmask.escapeRegex = function (str) {
        var specials = ["/", ".", "*", "+", "?", "|", "(", ")", "[", "]", "{", "}", "\\", "$", "^"];
        return str.replace(new RegExp("(\\" + specials.join("|\\") + ")", "gim"), "\\$1");
    };
    Inputmask.keyCode = {
        ALT: 18,
        BACKSPACE: 8,
        BACKSPACE_SAFARI: 127,
        CAPS_LOCK: 20,
        COMMA: 188,
        COMMAND: 91,
        COMMAND_LEFT: 91,
        COMMAND_RIGHT: 93,
        CONTROL: 17,
        DELETE: 46,
        DOWN: 40,
        END: 35,
        ENTER: 13,
        ESCAPE: 27,
        HOME: 36,
        INSERT: 45,
        LEFT: 37,
        MENU: 93,
        NUMPAD_ADD: 107,
        NUMPAD_DECIMAL: 110,
        NUMPAD_DIVIDE: 111,
        NUMPAD_ENTER: 108,
        NUMPAD_MULTIPLY: 106,
        NUMPAD_SUBTRACT: 109,
        PAGE_DOWN: 34,
        PAGE_UP: 33,
        PERIOD: 190,
        RIGHT: 39,
        SHIFT: 16,
        SPACE: 32,
        TAB: 9,
        UP: 38,
        WINDOWS: 91,
        X: 88
    };

    function resolveAlias(aliasStr, options, opts) {
        var aliasDefinition = Inputmask.prototype.aliases[aliasStr];
        if (aliasDefinition) {
            if (aliasDefinition.alias) resolveAlias(aliasDefinition.alias, undefined, opts); //alias is another alias
            $.extend(true, opts, aliasDefinition); //merge alias definition in the options
            $.extend(true, opts, options); //reapply extra given options
            return true;
        } else //alias not found - try as mask
        if (opts.mask === null) {
            opts.mask = aliasStr;
        }

        return false;
    }

    function generateMaskSet(opts, nocache) {
        function generateMask(mask, metadata, opts) {
            var regexMask = false;
            if (mask === null || mask === "") {
                regexMask = opts.regex !== null;
                if (regexMask) {
                    mask = opts.regex;
                    mask = mask.replace(/^(\^)(.*)(\$)$/, "$2");
                } else {
                    regexMask = true;
                    mask = ".*";
                }
            }
            if (mask.length === 1 && opts.greedy === false && opts.repeat !== 0) {
                opts.placeholder = "";
            } //hide placeholder with single non-greedy mask
            if (opts.repeat > 0 || opts.repeat === "*" || opts.repeat === "+") {
                var repeatStart = opts.repeat === "*" ? 0 : (opts.repeat === "+" ? 1 : opts.repeat);
                mask = opts.groupmarker.start + mask + opts.groupmarker.end + opts.quantifiermarker.start + repeatStart + "," + opts.repeat + opts.quantifiermarker.end;
            }

            // console.log(mask);
            var masksetDefinition,
                maskdefKey = regexMask ? "regex_" + opts.regex : (opts.numericInput ? mask.split("").reverse().join("") : mask);
            if (Inputmask.prototype.masksCache[maskdefKey] === undefined || nocache === true) {
                masksetDefinition = {
                    "mask": mask,
                    "maskToken": Inputmask.prototype.analyseMask(mask, regexMask, opts),
                    "validPositions": {},
                    "_buffer": undefined,
                    "buffer": undefined,
                    "tests": {},
                    "metadata": metadata,
                    maskLength: undefined
                };
                if (nocache !== true) {
                    Inputmask.prototype.masksCache[maskdefKey] = masksetDefinition;
                    masksetDefinition = $.extend(true, {}, Inputmask.prototype.masksCache[maskdefKey]);
                }
            } else masksetDefinition = $.extend(true, {}, Inputmask.prototype.masksCache[maskdefKey]);

            return masksetDefinition;
        }

        var ms;

        if ($.isFunction(opts.mask)) { //allow mask to be a preprocessing fn - should return a valid mask
            opts.mask = opts.mask(opts);
        }
        if ($.isArray(opts.mask)) {
            if (opts.mask.length > 1) {
                opts.keepStatic = opts.keepStatic === null ? true : opts.keepStatic; //enable by default when passing multiple masks when the option is not explicitly specified
                var altMask = opts.groupmarker.start;
                $.each(opts.numericInput ? opts.mask.reverse() : opts.mask, function (ndx, msk) {
                    if (altMask.length > 1) {
                        altMask += opts.groupmarker.end + opts.alternatormarker + opts.groupmarker.start;
                    }
                    if (msk.mask !== undefined && !$.isFunction(msk.mask)) {
                        altMask += msk.mask;
                    } else {
                        altMask += msk;
                    }
                });
                altMask += opts.groupmarker.end;
                // console.log(altMask);
                return generateMask(altMask, opts.mask, opts);
            } else opts.mask = opts.mask.pop();
        }

        if (opts.mask && opts.mask.mask !== undefined && !$.isFunction(opts.mask.mask)) {
            ms = generateMask(opts.mask.mask, opts.mask, opts);
        } else {
            ms = generateMask(opts.mask, opts.mask, opts);
        }

        return ms;
    };


    //masking scope
    //actionObj definition see below
    function maskScope(actionObj, maskset, opts) {
        maskset = maskset || this.maskset;
        opts = opts || this.opts;
        var inputmask = this,
            el = this.el,
            isRTL = this.isRTL,
            undoValue,
            $el,
            skipKeyPressEvent = false, //Safari 5.1.x - modal dialog fires keypress twice workaround
            skipInputEvent = false, //skip when triggered from within inputmask
            ignorable = false,
            maxLength,
            mouseEnter = false,
            colorMask;

        //maskset helperfunctions
        function getMaskTemplate(baseOnInput, minimalPos, includeMode) {
            //includeMode true => input, undefined => placeholder, false => mask
            minimalPos = minimalPos || 0;
            var maskTemplate = [],
                ndxIntlzr, pos = 0,
                test, testPos, lvp = getLastValidPosition();
            do {
                if (baseOnInput === true && getMaskSet().validPositions[pos]) {
                    testPos = getMaskSet().validPositions[pos];
                    test = testPos.match;
                    ndxIntlzr = testPos.locator.slice();
                    maskTemplate.push(includeMode === true ? testPos.input : includeMode === false ? test.nativeDef : getPlaceholder(pos, test));
                } else {
                    testPos = getTestTemplate(pos, ndxIntlzr, pos - 1);
                    test = testPos.match;
                    ndxIntlzr = testPos.locator.slice();
                    if (opts.jitMasking === false || pos < lvp || (typeof opts.jitMasking === "number" && isFinite(opts.jitMasking) && opts.jitMasking > pos)) {
                        maskTemplate.push(includeMode === false ? test.nativeDef : getPlaceholder(pos, test));
                    }
                }
                pos++;
            } while ((maxLength === undefined || pos < maxLength) && (test.fn !== null || test.def !== "") || minimalPos > pos);
            if (maskTemplate[maskTemplate.length - 1] === "") {
                maskTemplate.pop(); //drop the last one which is empty
            }

            getMaskSet().maskLength = pos + 1;
            return maskTemplate;
        }

        function getMaskSet() {
            return maskset;
        }

        function resetMaskSet(soft) {
            var maskset = getMaskSet();
            maskset.buffer = undefined;
            if (soft !== true) {
                // maskset._buffer = undefined;
                maskset.validPositions = {};
                maskset.p = 0;
            }
        }

        function getLastValidPosition(closestTo, strict, validPositions) {
            var before = -1,
                after = -1,
                valids = validPositions || getMaskSet().validPositions; //for use in valhook ~ context switch
            if (closestTo === undefined) closestTo = -1;
            for (var posNdx in valids) {
                var psNdx = parseInt(posNdx);
                if (valids[psNdx] && (strict || valids[psNdx].generatedInput !== true)) {
                    if (psNdx <= closestTo) before = psNdx;
                    if (psNdx >= closestTo) after = psNdx;
                }
            }
            return (before !== -1 && (closestTo - before) > 1) || after < closestTo ? before : after;
        }

        function stripValidPositions(start, end, nocheck, strict) {
            function IsEnclosedStatic(pos) {
                var posMatch = getMaskSet().validPositions[pos];
                if (posMatch !== undefined && posMatch.match.fn === null) {
                    var prevMatch = getMaskSet().validPositions[pos - 1],
                        nextMatch = getMaskSet().validPositions[pos + 1];
                    return prevMatch !== undefined && nextMatch !== undefined;
                }
                return false;
            }

            var i, startPos = start,
                positionsClone = $.extend(true, {}, getMaskSet().validPositions), needsValidation = false;
            getMaskSet().p = start; //needed for alternated position after overtype selection

            for (i = end - 1; i >= startPos; i--) { //clear selection
                if (getMaskSet().validPositions[i] !== undefined) {
                    if (nocheck === true ||
                        ((getMaskSet().validPositions[i].match.optionality || !IsEnclosedStatic(i)) && opts.canClearPosition(getMaskSet(), i, getLastValidPosition(), strict, opts) !== false)) {
                        delete getMaskSet().validPositions[i];
                    }
                }
            }

            //clear buffer
            resetMaskSet(true);
            for (i = startPos + 1; i <= getLastValidPosition();) {
                while (getMaskSet().validPositions[startPos] !== undefined) startPos++;
                if (i < startPos) i = startPos + 1;
                if (getMaskSet().validPositions[i] !== undefined || !isMask(i)) {
                    var t = getTestTemplate(i);
                    if (needsValidation === false && positionsClone[startPos] && positionsClone[startPos].match.def === t.match.def) { //obvious match
                        getMaskSet().validPositions[startPos] = $.extend(true, {}, positionsClone[startPos]);
                        getMaskSet().validPositions[startPos].input = t.input;
                        delete getMaskSet().validPositions[i];
                        i++;
                    } else if (positionCanMatchDefinition(startPos, t.match.def)) {
                        if (isValid(startPos, t.input || getPlaceholder(i), true) !== false) {
                            delete getMaskSet().validPositions[i];
                            i++;
                            needsValidation = true;
                        }
                    } else if (!isMask(i)) {
                        i++;
                        startPos--;
                    }
                    startPos++;
                } else i++;
            }

            resetMaskSet(true);
        }

        function determineTestTemplate(tests, guessNextBest) {
            var testPos,
                testPositions = tests,
                lvp = getLastValidPosition(),
                lvTest = getMaskSet().validPositions[lvp] || getTests(0)[0],
                lvTestAltArr = (lvTest.alternation !== undefined) ? lvTest.locator[lvTest.alternation].toString().split(",") : [];
            for (var ndx = 0; ndx < testPositions.length; ndx++) {
                testPos = testPositions[ndx];

                if (testPos.match &&
                    (((opts.greedy && testPos.match.optionalQuantifier !== true) || (testPos.match.optionality === false || testPos.match.newBlockMarker === false) && testPos.match.optionalQuantifier !== true) &&
                        ((lvTest.alternation === undefined || lvTest.alternation !== testPos.alternation) ||
                            (testPos.locator[lvTest.alternation] !== undefined && checkAlternationMatch(testPos.locator[lvTest.alternation].toString().split(","), lvTestAltArr))))) {

                    if (guessNextBest !== true || (testPos.match.fn === null && !/[0-9a-bA-Z]/.test(testPos.match.def))) {
                        break;
                    }
                }
            }

            return testPos;
        }

        function getTestTemplate(pos, ndxIntlzr, tstPs) {
            return getMaskSet().validPositions[pos] || determineTestTemplate(getTests(pos, ndxIntlzr ? ndxIntlzr.slice() : ndxIntlzr, tstPs));
        }

        function getTest(pos) {
            if (getMaskSet().validPositions[pos]) {
                return getMaskSet().validPositions[pos];
            }
            return getTests(pos)[0];
        }

        function positionCanMatchDefinition(pos, def) {
            var valid = false,
                tests = getTests(pos);
            for (var tndx = 0; tndx < tests.length; tndx++) {
                if (tests[tndx].match && tests[tndx].match.def === def) {
                    valid = true;
                    break;
                }
            }
            return valid;
        }


        function getTests(pos, ndxIntlzr, tstPs) {
            var maskTokens = getMaskSet().maskToken,
                testPos = ndxIntlzr ? tstPs : 0,
                ndxInitializer = ndxIntlzr ? ndxIntlzr.slice() : [0],
                matches = [],
                insertStop = false,
                latestMatch,
                cacheDependency = ndxIntlzr ? ndxIntlzr.join("") : "";

            function resolveTestFromToken(maskToken, ndxInitializer, loopNdx, quantifierRecurse) { //ndxInitializer contains a set of indexes to speedup searches in the mtokens
                function handleMatch(match, loopNdx, quantifierRecurse) {
                    function isFirstMatch(latestMatch, tokenGroup) {
                        var firstMatch = $.inArray(latestMatch, tokenGroup.matches) === 0;
                        if (!firstMatch) {
                            $.each(tokenGroup.matches, function (ndx, match) {
                                if (match.isQuantifier === true) {
                                    firstMatch = isFirstMatch(latestMatch, tokenGroup.matches[ndx - 1]);
                                    if (firstMatch) return false;
                                }
                            });
                        }
                        return firstMatch;
                    }

                    function resolveNdxInitializer(pos, alternateNdx, targetAlternation) {
                        var bestMatch, indexPos;

                        if (getMaskSet().validPositions[pos - 1] && targetAlternation && getMaskSet().tests[pos]) { //detect altarnation offset
                            var vpAlternation = getMaskSet().validPositions[pos - 1].locator;
                            var tpAlternation = getMaskSet().tests[pos][0].locator;
                            for (var i = 0; i < targetAlternation; i++) {
                                if (vpAlternation[i] !== tpAlternation[i]) {
                                    return vpAlternation.slice(targetAlternation + 1);
                                }
                            }
                        }

                        if (getMaskSet().tests[pos] || getMaskSet().validPositions[pos]) {
                            $.each(getMaskSet().tests[pos] || [getMaskSet().validPositions[pos]], function (ndx, lmnt) {
                                var alternation = targetAlternation !== undefined ? targetAlternation : lmnt.alternation,
                                    ndxPos = lmnt.locator[alternation] !== undefined ? lmnt.locator[alternation].toString().indexOf(alternateNdx) : -1;
                                if ((indexPos === undefined || ndxPos < indexPos) && ndxPos !== -1) {
                                    bestMatch = lmnt;
                                    indexPos = ndxPos;
                                }
                            });
                        }
                        return bestMatch ?
                            bestMatch.locator.slice((targetAlternation !== undefined ? targetAlternation : bestMatch.alternation) + 1) :
                            targetAlternation !== undefined ? resolveNdxInitializer(pos, alternateNdx) : undefined;
                    }

                    function definitionCanMatchDefinition(source, target) {
                        return source.match.nativeDef === target.match.nativeDef || source.match.def === target.match.nativeDef || source.match.nativeDef === target.match.def;
                    }

                    function isSubsetOf(source, target) {
                        if (source.match.fn !== null && target.match.fn !== null) {//is regex a subset
                            //do we need a dfa for this?
                            //currently only a simplistic approach
                            return target.match.fn.test(source.match.def.replace(/[\[\]]/g, ""), getMaskSet(), pos, false, opts, false);
                        }
                        return false;
                    }

                    function staticCanMatchDefinition(source, target) {
                        return source.match.fn === null && target.match.fn !== null ? target.match.fn.test(source.match.def, getMaskSet(), pos, false, opts, false) : false;
                    }

                    if (testPos > 10000) {
                        throw "Inputmask: There is probably an error in your mask definition or in the code. Create an issue on github with an example of the mask you are using. " + getMaskSet().mask;
                    }
                    if (testPos === pos && match.matches === undefined) {
                        matches.push({
                            "match": match,
                            "locator": loopNdx.reverse(),
                            "cd": cacheDependency
                        });
                        return true;
                    } else if (match.matches !== undefined) {
                        if (match.isGroup && quantifierRecurse !== match) { //when a group pass along to the quantifier
                            match = handleMatch(maskToken.matches[$.inArray(match, maskToken.matches) + 1], loopNdx);
                            if (match) return true;
                        } else if (match.isOptional) {
                            var optionalToken = match;
                            match = resolveTestFromToken(match, ndxInitializer, loopNdx, quantifierRecurse);
                            if (match) {
                                latestMatch = matches[matches.length - 1].match;
                                if (isFirstMatch(latestMatch, optionalToken)) {
                                    insertStop = true; //insert a stop
                                    testPos = pos; //match the position after the group
                                } else return true;
                            }
                        } else if (match.isAlternator) {
                            var alternateToken = match,
                                malternateMatches = [],
                                maltMatches,
                                currentMatches = matches.slice(),
                                loopNdxCnt = loopNdx.length;
                            var altIndex = ndxInitializer.length > 0 ? ndxInitializer.shift() : -1;
                            if (altIndex === -1 || typeof altIndex === "string") {
                                var currentPos = testPos,
                                    ndxInitializerClone = ndxInitializer.slice(),
                                    altIndexArr = [],
                                    amndx;
                                if (typeof altIndex == "string") {
                                    altIndexArr = altIndex.split(",");
                                } else {
                                    for (amndx = 0; amndx < alternateToken.matches.length; amndx++) {
                                        altIndexArr.push(amndx);
                                    }
                                }
                                for (var ndx = 0; ndx < altIndexArr.length; ndx++) {
                                    amndx = parseInt(altIndexArr[ndx]);
                                    matches = [];
                                    //set the correct ndxInitializer
                                    ndxInitializer = resolveNdxInitializer(testPos, amndx, loopNdxCnt) || ndxInitializerClone.slice();
                                    match = handleMatch(alternateToken.matches[amndx] || maskToken.matches[amndx], [amndx].concat(loopNdx), quantifierRecurse) || match;
                                    if (match !== true && match !== undefined && (altIndexArr[altIndexArr.length - 1] < alternateToken.matches.length)) { //no match in the alternations (length mismatch) => look further
                                        var ntndx = $.inArray(match, maskToken.matches) + 1;
                                        if (maskToken.matches.length > ntndx) {
                                            match = handleMatch(maskToken.matches[ntndx], [ntndx].concat(loopNdx.slice(1, loopNdx.length)), quantifierRecurse);
                                            if (match) {
                                                altIndexArr.push(ntndx.toString());
                                                $.each(matches, function (ndx, lmnt) {
                                                    lmnt.alternation = loopNdx.length - 1;
                                                });
                                            }
                                        }
                                    }
                                    maltMatches = matches.slice();
                                    testPos = currentPos;
                                    matches = [];

                                    //fuzzy merge matches
                                    for (var ndx1 = 0; ndx1 < maltMatches.length; ndx1++) {
                                        var altMatch = maltMatches[ndx1], dropMatch = false;
                                        altMatch.alternation = altMatch.alternation || loopNdxCnt;
                                        for (var ndx2 = 0; ndx2 < malternateMatches.length; ndx2++) {
                                            var altMatch2 = malternateMatches[ndx2];
                                            //verify equality
                                            if (typeof altIndex !== "string" || $.inArray(altMatch.locator[altMatch.alternation].toString(), altIndexArr) !== -1) {
                                                if (definitionCanMatchDefinition(altMatch, altMatch2)) {
                                                    dropMatch = true;
                                                    if (altMatch.alternation === altMatch2.alternation &&
                                                        altMatch2.locator[altMatch2.alternation].toString().indexOf(altMatch.locator[altMatch.alternation]) === -1) {
                                                        altMatch2.locator[altMatch2.alternation] = altMatch2.locator[altMatch2.alternation] + "," + altMatch.locator[altMatch.alternation];
                                                        altMatch2.alternation = altMatch.alternation; //we pass the alternation index => used in determineLastRequiredPosition
                                                    }
                                                    if (altMatch.match.nativeDef === altMatch2.match.def) {
                                                        altMatch.locator[altMatch.alternation] = altMatch2.locator[altMatch2.alternation];
                                                        malternateMatches.splice(malternateMatches.indexOf(altMatch2), 1, altMatch);
                                                    }
                                                    break;
                                                } else if (altMatch.match.def === altMatch2.match.def) {
                                                    dropMatch = false;
                                                    break;
                                                } else if (staticCanMatchDefinition(altMatch, altMatch2) || isSubsetOf(altMatch, altMatch2)) {
                                                    // console.log("case 5");
                                                    if (altMatch.alternation === altMatch2.alternation &&
                                                        altMatch.locator[altMatch.alternation].toString().indexOf(altMatch2.locator[altMatch2.alternation].toString().split("")[0]) === -1) {

                                                        //no alternation marker
                                                        altMatch.na = altMatch.na || altMatch.locator[altMatch.alternation].toString();
                                                        if (altMatch.na.indexOf(altMatch.locator[altMatch.alternation].toString().split("")[0]) === -1) {
                                                            altMatch.na = altMatch.na + "," + altMatch.locator[altMatch2.alternation].toString().split("")[0];
                                                        }
                                                        //insert match above general match
                                                        dropMatch = true;
                                                        altMatch.locator[altMatch.alternation] = altMatch2.locator[altMatch2.alternation].toString().split("")[0] + "," + altMatch.locator[altMatch.alternation];
                                                        malternateMatches.splice(malternateMatches.indexOf(altMatch2), 0, altMatch);
                                                    }
                                                    break;
                                                }
                                            }
                                        }
                                        if (!dropMatch) {
                                            malternateMatches.push(altMatch);
                                        }
                                    }
                                }
                                if (typeof altIndex == "string") { //filter matches
                                    malternateMatches = $.map(malternateMatches, function (lmnt, ndx) {
                                        if (isFinite(ndx)) {
                                            var mamatch,
                                                alternation = lmnt.alternation,
                                                altLocArr = lmnt.locator[alternation].toString().split(",");
                                            lmnt.locator[alternation] = undefined;
                                            lmnt.alternation = undefined;

                                            for (var alndx = 0; alndx < altLocArr.length; alndx++) {
                                                mamatch = $.inArray(altLocArr[alndx], altIndexArr) !== -1;
                                                if (mamatch) { //rebuild the locator with valid entries
                                                    if (lmnt.locator[alternation] !== undefined) {
                                                        lmnt.locator[alternation] += ",";
                                                        lmnt.locator[alternation] += altLocArr[alndx];
                                                    } else lmnt.locator[alternation] = parseInt(altLocArr[alndx]);

                                                    lmnt.alternation = alternation;
                                                }
                                            }

                                            if (lmnt.locator[alternation] !== undefined) return lmnt;
                                        }
                                    });
                                }

                                matches = currentMatches.concat(malternateMatches);
                                testPos = pos;
                                insertStop = matches.length > 0; //insert a stopelemnt when there is an alternate - needed for non-greedy option
                                match = malternateMatches.length > 0; //set correct match state

                                //cloneback
                                ndxInitializer = ndxInitializerClone.slice();
                            } else {
                                // if (alternateToken.matches[altIndex]) { //if not in the initial alternation => look further
                                match = handleMatch(alternateToken.matches[altIndex] || maskToken.matches[altIndex], [altIndex].concat(loopNdx), quantifierRecurse);
                                // } else match = false;
                            }
                            if (match) return true;
                        } else if (match.isQuantifier && quantifierRecurse !== maskToken.matches[$.inArray(match, maskToken.matches) - 1]) {
                            var qt = match;
                            for (var qndx = (ndxInitializer.length > 0) ? ndxInitializer.shift() : 0; (qndx < (isNaN(qt.quantifier.max) ? qndx + 1 : qt.quantifier.max)) && testPos <= pos; qndx++) {
                                var tokenGroup = maskToken.matches[$.inArray(qt, maskToken.matches) - 1];
                                match = handleMatch(tokenGroup, [qndx].concat(loopNdx), tokenGroup); //set the tokenGroup as quantifierRecurse marker
                                if (match) {
                                    //get latest match
                                    latestMatch = matches[matches.length - 1].match;
                                    latestMatch.optionalQuantifier = qndx > (qt.quantifier.min - 1);
                                    if (isFirstMatch(latestMatch, tokenGroup)) { //search for next possible match
                                        if (qndx > (qt.quantifier.min - 1)) {
                                            insertStop = true;
                                            testPos = pos; //match the position after the group
                                            break; //stop quantifierloop
                                        } else return true;
                                    } else {
                                        return true;
                                    }
                                }
                            }
                        } else {
                            match = resolveTestFromToken(match, ndxInitializer, loopNdx, quantifierRecurse);
                            if (match) return true;
                        }
                    }

                    else {
                        testPos++;
                    }
                }

                for (var tndx = (ndxInitializer.length > 0 ? ndxInitializer.shift() : 0); tndx < maskToken.matches.length; tndx++) {
                    if (maskToken.matches[tndx].isQuantifier !== true) {
                        var match = handleMatch(maskToken.matches[tndx], [tndx].concat(loopNdx), quantifierRecurse);
                        if (match && testPos === pos) {
                            return match;
                        } else if (testPos > pos) {
                            break;
                        }
                    }
                }
            }

            function mergeLocators(tests) {
                var locator = [];
                if (!$.isArray(tests)) tests = [tests];
                if (tests.length > 0) {
                    if (tests[0].alternation === undefined) {
                        locator = determineTestTemplate(tests.slice()).locator.slice();
                        if (locator.length === 0) locator = tests[0].locator.slice();
                    }
                    else {
                        $.each(tests, function (ndx, tst) {
                            if (tst.def !== "") {
                                if (locator.length === 0) locator = tst.locator.slice();
                                else {
                                    for (var i = 0; i < locator.length; i++) {
                                        if (tst.locator[i] && locator[i].toString().indexOf(tst.locator[i]) === -1) {
                                            locator[i] += "," + tst.locator[i];
                                        }
                                    }
                                }
                            }
                        });
                    }
                }
                return locator;
            }

            function filterTests(tests) {
                if (opts.keepStatic && pos > 0) {
                    if (tests.length > 1 + (tests[tests.length - 1].match.def === "" ? 1 : 0)) {
                        if (tests[0].match.optionality !== true &&
                            tests[0].match.optionalQuantifier !== true &&
                            tests[0].match.fn === null && !/[0-9a-bA-Z]/.test(tests[0].match.def)) {
                            if (getMaskSet().validPositions[pos - 1] === undefined) {
                                return [determineTestTemplate(tests)];
                            }
                            else if (getMaskSet().validPositions[pos - 1].alternation === tests[0].alternation) {
                                return [determineTestTemplate(tests)];
                            } else if (getMaskSet().validPositions[pos - 1]) {
                                return [determineTestTemplate(tests)];
                            }
                        }
                    }
                }

                return tests;
            }

            if (pos > -1) {
                if (ndxIntlzr === undefined) { //determine index initializer
                    var previousPos = pos - 1,
                        test;
                    while ((test = getMaskSet().validPositions[previousPos] || getMaskSet().tests[previousPos]) === undefined && previousPos > -1) {
                        previousPos--;
                    }
                    if (test !== undefined && previousPos > -1) {
                        ndxInitializer = mergeLocators(test);
                        cacheDependency = ndxInitializer.join("");
                        testPos = previousPos;
                    }
                }
                if (getMaskSet().tests[pos] && getMaskSet().tests[pos][0].cd === cacheDependency) { //cacheDependency is set on all tests, just check on the first
                    //console.log("cache hit " + pos + " - " + ndxIntlzr);
                    return filterTests(getMaskSet().tests[pos]);
                }
                for (var mtndx = ndxInitializer.shift(); mtndx < maskTokens.length; mtndx++) {
                    var match = resolveTestFromToken(maskTokens[mtndx], ndxInitializer, [mtndx]);
                    if ((match && testPos === pos) || testPos > pos) {
                        break;
                    }
                }
            }
            if (matches.length === 0 || insertStop) {
                matches.push({
                    match: {
                        fn: null,
                        cardinality: 0,
                        optionality: true,
                        casing: null,
                        def: "",
                        placeholder: ""
                    },
                    locator: [],
                    cd: cacheDependency
                });
            }

            if (ndxIntlzr !== undefined && getMaskSet().tests[pos]) { //prioritize full tests for caching
                return filterTests($.extend(true, [], matches));
            }
            getMaskSet().tests[pos] = $.extend(true, [], matches); //set a clone to prevent overwriting some props
            // console.log(pos + " - " + JSON.stringify(matches));
            return filterTests(getMaskSet().tests[pos]);
        }

        function getBufferTemplate() {
            if (getMaskSet()._buffer === undefined) {
                //generate template
                getMaskSet()._buffer = getMaskTemplate(false, 1);
                if (getMaskSet().buffer === undefined) {
                    getMaskSet().buffer = getMaskSet()._buffer.slice();
                }
            }
            return getMaskSet()._buffer;
        }

        function getBuffer(noCache) {
            if (getMaskSet().buffer === undefined || noCache === true) {
                getMaskSet().buffer = getMaskTemplate(true, getLastValidPosition(), true);
            }
            return getMaskSet().buffer;
        }

        function refreshFromBuffer(start, end, buffer) {
            var i, p;
            if (start === true) {
                resetMaskSet();
                start = 0;
                end = buffer.length;
            } else {
                for (i = start; i < end; i++) {
                    delete getMaskSet().validPositions[i];
                }
            }
            p = start;
            for (i = start; i < end; i++) {
                resetMaskSet(true); //prevents clobber from the buffer
                if (buffer[i] !== opts.skipOptionalPartCharacter) {
                    var valResult = isValid(p, buffer[i], true, true);
                    if (valResult !== false) {
                        resetMaskSet(true);
                        p = valResult.caret !== undefined ? valResult.caret : valResult.pos + 1;
                    }
                }
            }
        }

        function casing(elem, test, pos) {
            switch (opts.casing || test.casing) {
                case "upper":
                    elem = elem.toUpperCase();
                    break;
                case "lower":
                    elem = elem.toLowerCase();
                    break;
                case "title":
                    var posBefore = getMaskSet().validPositions[pos - 1];
                    if (pos === 0 || posBefore && posBefore.input === String.fromCharCode(Inputmask.keyCode.SPACE)) {
                        elem = elem.toUpperCase();
                    } else {
                        elem = elem.toLowerCase();
                    }
                    break;
                default:
                    if ($.isFunction(opts.casing)) {
                        var args = Array.prototype.slice.call(arguments);
                        args.push(getMaskSet().validPositions);
                        elem = opts.casing.apply(this, args);
                    }
            }

            return elem;
        }

        function checkAlternationMatch(altArr1, altArr2, na) {
            var altArrC = opts.greedy ? altArr2 : altArr2.slice(0, 1),
                isMatch = false, naArr = na !== undefined ? na.split(",") : [],
                naNdx;

            //remove no alternate indexes from alternation array
            for (var i = 0; i < naArr.length; i++) {
                if ((naNdx = altArr1.indexOf(naArr[i])) !== -1) {
                    altArr1.splice(naNdx, 1);
                }
            }

            for (var alndx = 0; alndx < altArr1.length; alndx++) {
                if ($.inArray(altArr1[alndx], altArrC) !== -1) {
                    isMatch = true;
                    break;
                }
            }
            return isMatch;
        }

        function isValid(pos, c, strict, fromSetValid, fromAlternate, validateOnly) { //strict true ~ no correction or autofill
            function isSelection(posObj) {
                var selection = isRTL ? (posObj.begin - posObj.end) > 1 || ((posObj.begin - posObj.end) === 1) :
                    (posObj.end - posObj.begin) > 1 || ((posObj.end - posObj.begin) === 1);

                return selection && posObj.begin === 0 && posObj.end === getMaskSet().maskLength ? "full" : selection;
            }

            strict = strict === true; //always set a value to strict to prevent possible strange behavior in the extensions

            var maskPos = pos;
            if (pos.begin !== undefined) { //position was a position object - used to handle a delete by typing over a selection
                maskPos = isRTL && !isSelection(pos) ? pos.end : pos.begin;
            }

            function _isValid(position, c, strict) {
                var rslt = false;
                $.each(getTests(position), function (ndx, tst) {
                        var test = tst.match,
                            loopend = c ? 1 : 0,
                            chrs = "";
                        for (var i = test.cardinality; i > loopend; i--) {
                            chrs += getBufferElement(position - (i - 1));
                        }
                        if (c) {
                            chrs += c;
                        }

                        //make sure the buffer is set and correct
                        getBuffer(true);
                        //return is false or a json object => { pos: ??, c: ??} or true
                        rslt = test.fn != null ?
                            test.fn.test(chrs, getMaskSet(), position, strict, opts, isSelection(pos)) : (c === test.def || c === opts.skipOptionalPartCharacter) && test.def !== "" ? //non mask
                                {
                                    c: getPlaceholder(position, test, true) || test.def,
                                    pos: position
                                } : false;

                        if (rslt !== false) {
                            var elem = rslt.c !== undefined ? rslt.c : c;
                            elem = (elem === opts.skipOptionalPartCharacter && test.fn === null) ?
                                (getPlaceholder(position, test, true) || test.def) : elem;

                            var validatedPos = position,
                                possibleModifiedBuffer = getBuffer();

                            if (rslt.remove !== undefined) { //remove position(s)
                                if (!$.isArray(rslt.remove)) rslt.remove = [rslt.remove];
                                $.each(rslt.remove.sort(function (a, b) {
                                    return b - a;
                                }), function (ndx, lmnt) {
                                    stripValidPositions(lmnt, lmnt + 1, true);
                                });
                            }
                            if (rslt.insert !== undefined) { //insert position(s)
                                if (!$.isArray(rslt.insert)) rslt.insert = [rslt.insert];
                                $.each(rslt.insert.sort(function (a, b) {
                                    return a - b;
                                }), function (ndx, lmnt) {
                                    isValid(lmnt.pos, lmnt.c, true, fromSetValid);
                                });
                            }

                            if (rslt.refreshFromBuffer) {
                                var refresh = rslt.refreshFromBuffer;
                                // strict = true;
                                refreshFromBuffer(refresh === true ? refresh : refresh.start, refresh.end, possibleModifiedBuffer);
                                if (rslt.pos === undefined && rslt.c === undefined) {
                                    rslt.pos = getLastValidPosition();
                                    return false; //breakout if refreshFromBuffer && nothing to insert
                                }
                                validatedPos = rslt.pos !== undefined ? rslt.pos : position;
                                if (validatedPos !== position) {
                                    rslt = $.extend(rslt, isValid(validatedPos, elem, true, fromSetValid)); //revalidate new position strict
                                    return false;
                                }

                            } else if (rslt !== true && rslt.pos !== undefined && rslt.pos !== position) { //their is a position offset
                                validatedPos = rslt.pos;
                                refreshFromBuffer(position, validatedPos, getBuffer().slice());
                                if (validatedPos !== position) {
                                    rslt = $.extend(rslt, isValid(validatedPos, elem, true)); //revalidate new position strict
                                    return false;
                                }
                            }

                            if (rslt !== true && rslt.pos === undefined && rslt.c === undefined) {
                                return false; //breakout if nothing to insert
                            }

                            if (ndx > 0) {
                                resetMaskSet(true);
                            }

                            if (!setValidPosition(validatedPos, $.extend({}, tst, {
                                    "input": casing(elem, test, validatedPos)
                                }), fromSetValid, isSelection(pos))) {
                                rslt = false;
                            }
                            return false; //break from $.each
                        }
                    }
                );
                return rslt;
            }

            function alternate(pos, c, strict) {
                var validPsClone = $.extend(true, {}, getMaskSet().validPositions),
                    lastAlt,
                    alternation,
                    isValidRslt = false,
                    altPos, prevAltPos, i, validPos, lAltPos = getLastValidPosition(), altNdxs, decisionPos;
                //find last modified alternation
                prevAltPos = getMaskSet().validPositions[lAltPos];
                for (; lAltPos >= 0; lAltPos--) {
                    altPos = getMaskSet().validPositions[lAltPos];
                    if (altPos && altPos.alternation !== undefined) {
                        lastAlt = lAltPos;
                        alternation = getMaskSet().validPositions[lastAlt].alternation;
                        if (prevAltPos.locator[altPos.alternation] !== altPos.locator[altPos.alternation]) {
                            break;
                        }
                        prevAltPos = altPos;
                    }
                }
                if (alternation !== undefined) {
                    decisionPos = parseInt(lastAlt);
                    var decisionTaker = prevAltPos.locator[prevAltPos.alternation || alternation] !== undefined ? prevAltPos.locator[prevAltPos.alternation || alternation] : altNdxs[0]; //no match in the alternations (length mismatch)
                    if (decisionTaker.length > 0) { //no decision taken ~ take first one as decider
                        decisionTaker = decisionTaker.split(",")[0];
                    }
                    var possibilityPos = getMaskSet().validPositions[decisionPos],
                        prevPos = getMaskSet().validPositions[decisionPos - 1];
                    $.each(getTests(decisionPos, prevPos ? prevPos.locator : undefined, decisionPos - 1), function (ndx, test) {
                        altNdxs = test.locator[alternation] ? test.locator[alternation].toString().split(",") : [];
                        for (var mndx = 0; mndx < altNdxs.length; mndx++) {
                            var validInputs = [],
                                staticInputsBeforePos = 0,
                                staticInputsBeforePosAlternate = 0,
                                verifyValidInput = false;
                            if (decisionTaker < altNdxs[mndx] && (test.na === undefined || ($.inArray(altNdxs[mndx], test.na.split(",")) === -1 || $.inArray(decisionTaker.toString(), altNdxs) === -1))) {
                                getMaskSet().validPositions[decisionPos] = $.extend(true, {}, test);
                                var possibilities = getMaskSet().validPositions[decisionPos].locator;
                                getMaskSet().validPositions[decisionPos].locator[alternation] = parseInt(altNdxs[mndx]); //set forced decision
                                if (test.match.fn == null) {
                                    if (possibilityPos.input !== test.match.def) {
                                        verifyValidInput = true; //verify that the new definition matches the input
                                        if (possibilityPos.generatedInput !== true) {
                                            validInputs.push(possibilityPos.input);
                                        }
                                    }
                                    staticInputsBeforePosAlternate++;
                                    getMaskSet().validPositions[decisionPos].generatedInput = !/[0-9a-bA-Z]/.test(test.match.def);
                                    getMaskSet().validPositions[decisionPos].input = test.match.def;
                                } else {
                                    getMaskSet().validPositions[decisionPos].input = possibilityPos.input;
                                }
                                for (i = decisionPos + 1; i < getLastValidPosition(undefined, true) + 1; i++) {
                                    validPos = getMaskSet().validPositions[i];
                                    if (validPos && validPos.generatedInput !== true && /[0-9a-bA-Z]/.test(validPos.input)) {
                                        validInputs.push(validPos.input);
                                    } else if (i < pos) staticInputsBeforePos++;
                                    delete getMaskSet().validPositions[i];
                                }
                                if (verifyValidInput && validInputs[0] === test.match.def) {
                                    validInputs.shift();
                                }
                                resetMaskSet(true); //clear getbuffer
                                isValidRslt = true;
                                while (validInputs.length > 0) {
                                    var input = validInputs.shift();
                                    if (input !== opts.skipOptionalPartCharacter) {
                                        if (!(isValidRslt = isValid(getLastValidPosition(undefined, true) + 1, input, false, fromSetValid, true))) {
                                            break;
                                        }
                                    }
                                }

                                if (isValidRslt) {
                                    getMaskSet().validPositions[decisionPos].locator = possibilities; //reset forceddecision ~ needed for proper delete
                                    var targetLvp = getLastValidPosition(pos) + 1;
                                    for (i = decisionPos + 1; i < getLastValidPosition() + 1; i++) {
                                        validPos = getMaskSet().validPositions[i];
                                        if ((validPos === undefined || validPos.match.fn == null) && i < (pos + (staticInputsBeforePosAlternate - staticInputsBeforePos))) {
                                            staticInputsBeforePosAlternate++;
                                        }
                                    }
                                    pos = pos + (staticInputsBeforePosAlternate - staticInputsBeforePos);
                                    isValidRslt = isValid(pos > targetLvp ? targetLvp : pos, c, strict, fromSetValid, true);
                                }
                                if (!isValidRslt) {
                                    resetMaskSet();
                                    getMaskSet().validPositions = $.extend(true, {}, validPsClone);
                                } else return false; //exit $.each
                            }
                        }
                    });
                }

                return isValidRslt;
            }

            //set alternator choice on previous skipped placeholder positions
            function trackbackAlternations(originalPos, newPos) {
                var vp = getMaskSet().validPositions[newPos];
                if (vp) {
                    var targetLocator = vp.locator,
                        tll = targetLocator.length;

                    for (var ps = originalPos; ps < newPos; ps++) {
                        if (getMaskSet().validPositions[ps] === undefined && !isMask(ps, true)) {
                            var tests = getTests(ps).slice(),
                                bestMatch = determineTestTemplate(tests, true),
                                equality = -1;
                            if (tests[tests.length - 1].match.def === "") tests.pop();
                            $.each(tests, function (ndx, tst) { //find best matching
                                for (var i = 0; i < tll; i++) {
                                    if (tst.locator[i] !== undefined && checkAlternationMatch(tst.locator[i].toString().split(","), targetLocator[i].toString().split(","), tst.na)) {
                                        if (equality < i) {
                                            equality = i;
                                            bestMatch = tst;
                                        }
                                    } else {
                                        //check if alternationIndex is closer then the current bestmatch
                                        var targetAI = targetLocator[i],
                                            bestMatchAI = bestMatch.locator[i],
                                            tstAI = tst.locator[i];
                                        if ((targetAI - bestMatchAI) > Math.abs(targetAI - tstAI)) {
                                            bestMatch = tst;
                                        }
                                        break;
                                    }
                                }
                            });
                            bestMatch = $.extend({}, bestMatch, {
                                "input": getPlaceholder(ps, bestMatch.match, true) || bestMatch.match.def
                            });
                            bestMatch.generatedInput = true;
                            setValidPosition(ps, bestMatch, true);
                            //revalidate the new position to update the locator value
                            getMaskSet().validPositions[newPos] = undefined;
                            _isValid(newPos, vp.input, true);
                        }
                    }
                }
            }

            function setValidPosition(pos, validTest, fromSetValid, isSelection) {
                if (isSelection || (opts.insertMode && getMaskSet().validPositions[pos] !== undefined && fromSetValid === undefined)) {
                    //reposition & revalidate others
                    var positionsClone = $.extend(true, {}, getMaskSet().validPositions),
                        lvp = getLastValidPosition(undefined, true),
                        i;
                    for (i = pos; i <= lvp; i++) { //clear selection
                        delete getMaskSet().validPositions[i];
                    }
                    getMaskSet().validPositions[pos] = $.extend(true, {}, validTest);
                    var valid = true,
                        j, vps = getMaskSet().validPositions, needsValidation = false,
                        initialLength = getMaskSet().maskLength;
                    for (i = (j = pos); i <= lvp; i++) {
                        var t = positionsClone[i];
                        if (t !== undefined /*&& (t.generatedInput !== true || t.match.fn === null)*/) {
                            var posMatch = j;
                            while (posMatch < getMaskSet().maskLength && ((t.match.fn === null && vps[i] && (vps[i].match.optionalQuantifier === true || vps[i].match.optionality === true)) || t.match.fn != null)) {
                                posMatch++;
                                if (needsValidation === false && positionsClone[posMatch] && positionsClone[posMatch].match.def === t.match.def) { //obvious match
                                    getMaskSet().validPositions[posMatch] = $.extend(true, {}, positionsClone[posMatch]);
                                    getMaskSet().validPositions[posMatch].input = t.input;
                                    fillMissingNonMask(posMatch);
                                    j = posMatch;
                                    valid = true;
                                } else if (positionCanMatchDefinition(posMatch, t.match.def)) { //validated match
                                    var result = isValid(posMatch, t.input, true, true);
                                    valid = result !== false;
                                    j = (result.caret || result.insert) ? getLastValidPosition() : posMatch;
                                    needsValidation = true;
                                } else {
                                    valid = t.generatedInput === true;
                                    if (!valid && posMatch >= getMaskSet().maskLength - 1) break;
                                }
                                if (getMaskSet().maskLength < initialLength) getMaskSet().maskLength = initialLength; //a bit hacky but the masklength is corrected later on
                                if (valid) break;
                            }
                        }
                        if (!valid) break;
                    }

                    if (!valid) {
                        getMaskSet().validPositions = $.extend(true, {}, positionsClone);
                        resetMaskSet(true);
                        return false;
                    }
                }

                else {
                    getMaskSet().validPositions[pos] = $.extend(true, {}, validTest);
                }


                resetMaskSet(true);
                return true;
            }

            var result = true,
                positionsClone = $.extend(true, {}, getMaskSet().validPositions); //clone the currentPositions


            function fillMissingNonMask(maskPos) {
                //Check for a nonmask before the pos
                //find previous valid
                for (var pndx = maskPos - 1; pndx > -1; pndx--) {
                    if (getMaskSet().validPositions[pndx]) break;
                }
                ////fill missing nonmask and valid placeholders
                var testTemplate, testsFromPos;
                for (pndx++; pndx < maskPos; pndx++) {
                    if (getMaskSet().validPositions[pndx] === undefined && (opts.jitMasking === false || opts.jitMasking > pndx)) {
                        testsFromPos = getTests(pndx, getTestTemplate(pndx - 1).locator, pndx - 1).slice();
                        if (testsFromPos[testsFromPos.length - 1].match.def === "") testsFromPos.pop();
                        testTemplate = determineTestTemplate(testsFromPos);
                        if (testTemplate && (testTemplate.match.def === opts.radixPointDefinitionSymbol || !isMask(pndx, true) ||
                                ($.inArray(opts.radixPoint, getBuffer()) < pndx && testTemplate.match.fn && testTemplate.match.fn.test(getPlaceholder(pndx), getMaskSet(), pndx, false, opts)))) {
                            result = _isValid(pndx, getPlaceholder(pndx, testTemplate.match, true) || (testTemplate.match.fn == null ? testTemplate.match.def : (getPlaceholder(pndx) !== "" ? getPlaceholder(pndx) : getBuffer()[pndx])), true);
                            if (result !== false) {
                                getMaskSet().validPositions[result.pos || pndx].generatedInput = true;
                            }
                        }
                    }
                }
            }

            if ($.isFunction(opts.preValidation) && !strict && fromSetValid !== true && validateOnly !== true) {
                result = opts.preValidation(getBuffer(), maskPos, c, isSelection(pos), opts);
            }
            if (result === true) {
                fillMissingNonMask(maskPos);

                if (isSelection(pos)) {
                    handleRemove(undefined, Inputmask.keyCode.DELETE, pos, true, true);
                    maskPos = getMaskSet().p;
                }

                if (maskPos < getMaskSet().maskLength && (maxLength === undefined || maskPos < maxLength)) {
                    result = _isValid(maskPos, c, strict);
                    if ((!strict || fromSetValid === true) && result === false && validateOnly !== true) {
                        var currentPosValid = getMaskSet().validPositions[maskPos];
                        if (currentPosValid && currentPosValid.match.fn === null && (currentPosValid.match.def === c || c === opts.skipOptionalPartCharacter)) {
                            result = {
                                "caret": seekNext(maskPos)
                            };
                        } else if ((opts.insertMode || getMaskSet().validPositions[seekNext(maskPos)] === undefined) && !isMask(maskPos, true)) { //does the input match on a further position?
                            for (var nPos = maskPos + 1, snPos = seekNext(maskPos); nPos <= snPos; nPos++) {
                                // if (!isMask(nPos, true)) {
                                // 	continue;
                                // }
                                result = _isValid(nPos, c, strict);
                                if (result !== false) {
                                    trackbackAlternations(maskPos, result.pos !== undefined ? result.pos : nPos);
                                    maskPos = nPos;
                                    break;
                                }
                            }
                        }
                    }
                }
                if (result === false && opts.keepStatic && !strict && fromAlternate !== true) { //try fuzzy alternator logic
                    result = alternate(maskPos, c, strict);
                }
                if (result === true) {
                    result = {
                        "pos": maskPos
                    };
                }
            }
            if ($.isFunction(opts.postValidation) && result !== false && !strict && fromSetValid !== true && validateOnly !== true) {
                var postResult = opts.postValidation(getBuffer(true), result, opts);
                if (postResult.refreshFromBuffer && postResult.buffer) {
                    var refresh = postResult.refreshFromBuffer;
                    refreshFromBuffer(refresh === true ? refresh : refresh.start, refresh.end, postResult.buffer);
                }
                result = postResult === true ? result : postResult;
            }

            if (result && result.pos === undefined) {
                result.pos = maskPos;
            }

            if (result === false || validateOnly === true) {
                resetMaskSet(true);
                getMaskSet().validPositions = $.extend(true, {}, positionsClone); //revert validation changes
            }

            return result;
        }

        function isMask(pos, strict) {
            var test = getTestTemplate(pos).match;
            if (test.def === "") test = getTest(pos).match;

            if (test.fn != null) {
                return test.fn;
            }
            if (strict !== true && pos > -1) {
                var tests = getTests(pos);
                return tests.length > 1 + (tests[tests.length - 1].match.def === "" ? 1 : 0);
            }
            return false;
        }

        function seekNext(pos, newBlock) {
            var maskL = getMaskSet().maskLength;
            if (pos >= maskL) return maskL;
            var position = pos;
            if (getTests(maskL + 1).length > 1) {
                getMaskTemplate(true, maskL + 1, true);
                maskL = getMaskSet().maskLength;
            }
            while (++position < maskL &&
            ((newBlock === true && (getTest(position).match.newBlockMarker !== true || !isMask(position))) ||
                (newBlock !== true && !isMask(position)))) {
            }
            return position;
        }

        function seekPrevious(pos, newBlock) {
            var position = pos, tests;
            if (position <= 0) return 0;

            while (--position > 0 &&
            ((newBlock === true && getTest(position).match.newBlockMarker !== true) ||
                (newBlock !== true && !isMask(position) &&
                    (tests = getTests(position), tests.length < 2 || (tests.length === 2 && tests[1].match.def === ""))))) {
            }

            return position;
        }

        function getBufferElement(position) {
            return getMaskSet().validPositions[position] === undefined ? getPlaceholder(position) : getMaskSet().validPositions[position].input;
        }

        function writeBuffer(input, buffer, caretPos, event, triggerInputEvent) {
            if (event && $.isFunction(opts.onBeforeWrite)) {
                //    buffer = buffer.slice(); //prevent uncontrolled manipulation of the internal buffer
                var result = opts.onBeforeWrite.call(inputmask, event, buffer, caretPos, opts);
                if (result) {
                    if (result.refreshFromBuffer) {
                        var refresh = result.refreshFromBuffer;
                        refreshFromBuffer(refresh === true ? refresh : refresh.start, refresh.end, result.buffer || buffer);
                        buffer = getBuffer(true);
                    }
                    //only alter when intented !== undefined
                    if (caretPos !== undefined) caretPos = result.caret !== undefined ? result.caret : caretPos;
                }
            }
            if (input !== undefined) {
                input.inputmask._valueSet(buffer.join(""));
                if (caretPos !== undefined && (event === undefined || event.type !== "blur")) {
                    if (android && event && event.type === "input") {
                        setTimeout(function () {
                            caret(input, caretPos);
                        }, 0);
                    } else caret(input, caretPos);
                } else renderColorMask(input, caretPos, buffer.length === 0);
                if (triggerInputEvent === true) {
                    skipInputEvent = true;
                    $(input).trigger("input");
                }
            }
        }

        function getPlaceholder(pos, test, returnPL) {
            test = test || getTest(pos).match;
            if (test.placeholder !== undefined || returnPL === true) {
                return $.isFunction(test.placeholder) ? test.placeholder(opts) : test.placeholder;
            } else if (test.fn === null) {
                if (pos > -1 && getMaskSet().validPositions[pos] === undefined) {
                    var tests = getTests(pos),
                        staticAlternations = [],
                        prevTest;
                    if (tests.length > 1 + (tests[tests.length - 1].match.def === "" ? 1 : 0)) {
                        for (var i = 0; i < tests.length; i++) {
                            if (tests[i].match.optionality !== true && tests[i].match.optionalQuantifier !== true &&
                                (tests[i].match.fn === null || (prevTest === undefined || tests[i].match.fn.test(prevTest.match.def, getMaskSet(), pos, true, opts) !== false))) {
                                staticAlternations.push(tests[i]);
                                if (tests[i].match.fn === null) prevTest = tests[i];
                                if (staticAlternations.length > 1) {
                                    if (/[0-9a-bA-Z]/.test(staticAlternations[0].match.def)) {
                                        return opts.placeholder.charAt(pos % opts.placeholder.length);
                                    }
                                }
                            }
                        }
                    }
                }
                return test.def;
            }

            return opts.placeholder.charAt(pos % opts.placeholder.length);
        }

        var EventRuler = {
            on: function (input, eventName, eventHandler) {
                var ev = function (e) {
                    // console.log("triggered " + e.type);

                    if (this.inputmask === undefined && this.nodeName !== "FORM") { //happens when cloning an object with jquery.clone
                        var imOpts = $.data(this, "_inputmask_opts");
                        if (imOpts) (new Inputmask(imOpts)).mask(this);
                        else EventRuler.off(this);
                    } else if (e.type !== "setvalue" && this.nodeName !== "FORM" && (this.disabled || (this.readOnly && !(e.type === "keydown" && (e.ctrlKey && e.keyCode === 67) || (opts.tabThrough === false && e.keyCode === Inputmask.keyCode.TAB))))) {
                        e.preventDefault();
                    } else {
                        switch (e.type) {
                            case "input":
                                if (skipInputEvent === true) {
                                    skipInputEvent = false;
                                    return e.preventDefault();
                                }
                                break;
                            case "keydown":
                                //Safari 5.1.x - modal dialog fires keypress twice workaround
                                skipKeyPressEvent = false;
                                skipInputEvent = false;
                                break;
                            case "keypress":
                                if (skipKeyPressEvent === true) {
                                    return e.preventDefault();
                                }
                                skipKeyPressEvent = true;
                                break;
                            case "click":
                                if (iemobile || iphone) {
                                    var that = this, args = arguments;
                                    setTimeout(function () {
                                        eventHandler.apply(that, args);
                                    }, 0);
                                    return false;
                                }
                                break;
                        }
                        // console.log("executed " + e.type);
                        var returnVal = eventHandler.apply(this, arguments);
                        if (returnVal === false) {
                            e.preventDefault();
                            e.stopPropagation();
                        }
                        return returnVal;
                    }
                };
                //keep instance of the event
                input.inputmask.events[eventName] = input.inputmask.events[eventName] || [];
                input.inputmask.events[eventName].push(ev);

                if ($.inArray(eventName, ["submit", "reset"]) !== -1) {
                    if (input.form !== null) $(input.form).on(eventName, ev);
                } else {
                    $(input).on(eventName, ev);
                }
            },
            off: function (input, event) {
                if (input.inputmask && input.inputmask.events) {
                    var events;
                    if (event) {
                        events = [];
                        events[event] = input.inputmask.events[event];
                    } else {
                        events = input.inputmask.events;
                    }
                    $.each(events, function (eventName, evArr) {
                        while (evArr.length > 0) {
                            var ev = evArr.pop();
                            if ($.inArray(eventName, ["submit", "reset"]) !== -1) {
                                if (input.form !== null) $(input.form).off(eventName, ev);
                            } else {
                                $(input).off(eventName, ev);
                            }
                        }
                        delete input.inputmask.events[eventName];
                    });
                }
            }
        };
        var EventHandlers = {
            keydownEvent: function (e) {
                function isInputEventSupported(eventName) {
                    var el = document.createElement("input"),
                        evName = "on" + eventName,
                        isSupported = (evName in el);
                    if (!isSupported) {
                        el.setAttribute(evName, "return;");
                        isSupported = typeof el[evName] === "function";
                    }
                    el = null;
                    return isSupported;
                }

                var input = this,
                    $input = $(input),
                    k = e.keyCode,
                    pos = caret(input);

                //backspace, delete, and escape get special treatment
                if (k === Inputmask.keyCode.BACKSPACE || k === Inputmask.keyCode.DELETE || (iphone && k === Inputmask.keyCode.BACKSPACE_SAFARI) || (e.ctrlKey && k === Inputmask.keyCode.X && !isInputEventSupported("cut"))) { //backspace/delete
                    e.preventDefault(); //stop default action but allow propagation
                    handleRemove(input, k, pos);
                    writeBuffer(input, getBuffer(true), getMaskSet().p, e, input.inputmask._valueGet() !== getBuffer().join(""));
                    if (input.inputmask._valueGet() === getBufferTemplate().join("")) {
                        $input.trigger("cleared");
                    } else if (isComplete(getBuffer()) === true) {
                        $input.trigger("complete");
                    }
                } else if (k === Inputmask.keyCode.END || k === Inputmask.keyCode.PAGE_DOWN) { //when END or PAGE_DOWN pressed set position at lastmatch
                    e.preventDefault();
                    var caretPos = seekNext(getLastValidPosition());
                    if (!opts.insertMode && caretPos === getMaskSet().maskLength && !e.shiftKey) caretPos--;
                    caret(input, e.shiftKey ? pos.begin : caretPos, caretPos, true);
                } else if ((k === Inputmask.keyCode.HOME && !e.shiftKey) || k === Inputmask.keyCode.PAGE_UP) { //Home or page_up
                    e.preventDefault();
                    caret(input, 0, e.shiftKey ? pos.begin : 0, true);
                } else if (((opts.undoOnEscape && k === Inputmask.keyCode.ESCAPE) || (k === 90 && e.ctrlKey)) && e.altKey !== true) { //escape && undo && #762
                    checkVal(input, true, false, undoValue.split(""));
                    $input.trigger("click");
                } else if (k === Inputmask.keyCode.INSERT && !(e.shiftKey || e.ctrlKey)) { //insert
                    opts.insertMode = !opts.insertMode;
                    caret(input, !opts.insertMode && pos.begin === getMaskSet().maskLength ? pos.begin - 1 : pos.begin);
                } else if (opts.tabThrough === true && k === Inputmask.keyCode.TAB) {
                    if (e.shiftKey === true) {
                        if (getTest(pos.begin).match.fn === null) {
                            pos.begin = seekNext(pos.begin);
                        }
                        pos.end = seekPrevious(pos.begin, true);
                        pos.begin = seekPrevious(pos.end, true);
                    } else {
                        pos.begin = seekNext(pos.begin, true);
                        pos.end = seekNext(pos.begin, true);
                        if (pos.end < getMaskSet().maskLength) pos.end--;
                    }
                    if (pos.begin < getMaskSet().maskLength) {
                        e.preventDefault();
                        caret(input, pos.begin, pos.end);
                    }
                } else if (!e.shiftKey) {
                    if (opts.insertMode === false) {
                        if (k === Inputmask.keyCode.RIGHT) {
                            setTimeout(function () {
                                var caretPos = caret(input);
                                caret(input, caretPos.begin);
                            }, 0);
                        } else if (k === Inputmask.keyCode.LEFT) {
                            setTimeout(function () {
                                var caretPos = caret(input);
                                caret(input, isRTL ? caretPos.begin + 1 : caretPos.begin - 1);
                            }, 0);
                        }
                    }
                }
                opts.onKeyDown.call(this, e, getBuffer(), caret(input).begin, opts);
                ignorable = $.inArray(k, opts.ignorables) !== -1;
            },
            keypressEvent: function (e, checkval, writeOut, strict, ndx) {
                var input = this,
                    $input = $(input),
                    k = e.which || e.charCode || e.keyCode;

                if (checkval !== true && (!(e.ctrlKey && e.altKey) && (e.ctrlKey || e.metaKey || ignorable))) {
                    if (k === Inputmask.keyCode.ENTER && undoValue !== getBuffer().join("")) {
                        undoValue = getBuffer().join("");
                        // e.preventDefault();
                        setTimeout(function () {
                            $input.trigger("change");
                        }, 0);
                    }
                    return true;
                } else {
                    if (k) {
                        //special treat the decimal separator
                        if (k === 46 && e.shiftKey === false && opts.radixPoint !== "") k = opts.radixPoint.charCodeAt(0);
                        var pos = checkval ? {
                                begin: ndx,
                                end: ndx
                            } : caret(input),
                            forwardPosition, c = String.fromCharCode(k);

                        getMaskSet().writeOutBuffer = true;
                        var valResult = isValid(pos, c, strict);
                        if (valResult !== false) {
                            resetMaskSet(true);
                            forwardPosition = valResult.caret !== undefined ? valResult.caret : checkval ? valResult.pos + 1 : seekNext(valResult.pos);
                            getMaskSet().p = forwardPosition; //needed for checkval
                        }

                        if (writeOut !== false) {
                            setTimeout(function () {
                                opts.onKeyValidation.call(input, k, valResult, opts);
                            }, 0);
                            if (getMaskSet().writeOutBuffer && valResult !== false) {
                                var buffer = getBuffer();
                                writeBuffer(input, buffer, (opts.numericInput && valResult.caret === undefined) ? seekPrevious(forwardPosition) : forwardPosition, e, checkval !== true);
                                if (checkval !== true) {
                                    setTimeout(function () { //timeout needed for IE
                                        if (isComplete(buffer) === true) $input.trigger("complete");
                                    }, 0);
                                }
                            }
                        }

                        e.preventDefault();

                        if (checkval) {
                            if (valResult !== false) valResult.forwardPosition = forwardPosition;
                            return valResult;
                        }
                    }
                }
            },
            pasteEvent: function (e) {
                var input = this,
                    ev = e.originalEvent || e,
                    $input = $(input),
                    inputValue = input.inputmask._valueGet(true),
                    caretPos = caret(input),
                    tempValue;

                // console.log(inputValue);

                if (isRTL) {
                    tempValue = caretPos.end;
                    caretPos.end = caretPos.begin;
                    caretPos.begin = tempValue;
                }

                var valueBeforeCaret = inputValue.substr(0, caretPos.begin),
                    valueAfterCaret = inputValue.substr(caretPos.end, inputValue.length);

                if (valueBeforeCaret === (isRTL ? getBufferTemplate().reverse() : getBufferTemplate()).slice(0, caretPos.begin).join("")) valueBeforeCaret = "";
                if (valueAfterCaret === (isRTL ? getBufferTemplate().reverse() : getBufferTemplate()).slice(caretPos.end).join("")) valueAfterCaret = "";
                if (isRTL) {
                    tempValue = valueBeforeCaret;
                    valueBeforeCaret = valueAfterCaret;
                    valueAfterCaret = tempValue;
                }

                if (window.clipboardData && window.clipboardData.getData) { // IE
                    inputValue = valueBeforeCaret + window.clipboardData.getData("Text") + valueAfterCaret;
                } else if (ev.clipboardData && ev.clipboardData.getData) {
                    inputValue = valueBeforeCaret + ev.clipboardData.getData("text/plain") + valueAfterCaret;
                } else return true; //allow native paste event as fallback ~ masking will continue by inputfallback

                var pasteValue = inputValue;
                // console.log(inputValue);
                if ($.isFunction(opts.onBeforePaste)) {
                    pasteValue = opts.onBeforePaste.call(inputmask, inputValue, opts);
                    if (pasteValue === false) {
                        return e.preventDefault();
                    }
                    if (!pasteValue) {
                        pasteValue = inputValue;
                    }
                }
                checkVal(input, false, false, isRTL ? pasteValue.split("").reverse() : pasteValue.toString().split(""));
                writeBuffer(input, getBuffer(), seekNext(getLastValidPosition()), e, undoValue !== getBuffer().join(""));
                if (isComplete(getBuffer()) === true) {
                    $input.trigger("complete");
                }

                return e.preventDefault();
            },
            inputFallBackEvent: function (e) { //fallback when keypress is not triggered
                function repositionCaret(input, frontPart, backPart) {
                    var targetPos = caret(input).begin, currentValue = input.inputmask._valueGet(),
                        pos = currentValue.indexOf(frontPart), currentPos = targetPos;
                    if (pos === 0 && targetPos !== frontPart.length) {
                        targetPos = frontPart.length;
                    } else {
                        while (currentValue.match(Inputmask.escapeRegex(backPart) + "$") === null) {
                            backPart = backPart.substr(1);
                        }
                        var pos2 = currentValue.indexOf(backPart);
                        if (pos2 !== -1 && backPart !== "" && targetPos > pos2 && pos2 > pos) {
                            targetPos = pos2;
                        }
                    }

                    if (!isMask(targetPos)) targetPos = seekNext(targetPos);
                    if (currentPos !== targetPos) {
                        caret(input, targetPos);
                        if (android) { //caret is set by android after inputevent
                            setTimeout(function () {
                                caret(input, targetPos);
                            }, 0);
                        }
                    }
                }

                function radixPointHandler(input, inputValue, caretPos) {
                    //radixpoint tweak
                    if (inputValue.charAt(caretPos.begin - 1) === "." && opts.radixPoint !== "") {
                        inputValue = inputValue.split("");
                        inputValue[caretPos.begin - 1] = opts.radixPoint.charAt(0);
                        inputValue = inputValue.join("");
                    }

                    if (inputValue.charAt(caretPos.begin - 1) === opts.radixPoint && inputValue.length > getBuffer().length) {
                        var keypress = new $.Event("keypress");
                        keypress.which = opts.radixPoint.charCodeAt(0);
                        EventHandlers.keypressEvent.call(input, keypress, true, true, false, caretPos.begin - 1);
                        return false;

                    }
                }

                function ieMobileHandler(input, inputValue, caretPos) {
                    if (iemobile) { //iemobile just set the character at the end althought the caret position is correctly set
                        var inputChar = inputValue.replace(getBuffer().join(""), "");
                        if (inputChar.length === 1) {
                            var keypress = new $.Event("keypress");
                            keypress.which = inputChar.charCodeAt(0);
                            EventHandlers.keypressEvent.call(input, keypress, true, true, false, getMaskSet().validPositions[caretPos.begin - 1] ? caretPos.begin : caretPos.begin - 1);
                            return false;
                        }
                    }
                }

                var input = this,
                    inputValue = input.inputmask._valueGet();

                if (getBuffer().join("") !== inputValue) {
                    var caretPos = caret(input);
                    if (radixPointHandler(input, inputValue, caretPos) === false) return false;
                    inputValue = inputValue.replace(new RegExp("(" + Inputmask.escapeRegex(getBufferTemplate().join("")) + ")*"), "");
                    if (ieMobileHandler(input, inputValue, caretPos) === false) return false;

                    if (caretPos.begin > inputValue.length) {
                        caret(input, inputValue.length);
                        caretPos = caret(input);
                    }

                    var buffer = getBuffer().join(""),
                        frontPart = inputValue.substr(0, caretPos.begin),
                        backPart = inputValue.substr(caretPos.begin),
                        frontBufferPart = buffer.substr(0, caretPos.begin),
                        backBufferPart = buffer.substr(caretPos.begin);

                    //check if thare was a selection
                    var selection = caretPos, entries = "", isEntry = false;
                    if (frontPart !== frontBufferPart) {
                        selection.begin = 0;
                        var fpl = (isEntry = frontPart.length >= frontBufferPart.length) ? frontPart.length : frontBufferPart.length
                        for (var i = 0; frontPart.charAt(i) === frontBufferPart.charAt(i) && i < fpl; i++) {
                            selection.begin++;
                        }
                        if (isEntry) {
                            entries += frontPart.slice(selection.begin, selection.end);
                        }
                    }
                    if (backPart !== backBufferPart) {
                        if (backPart.length > backBufferPart.length) {
                            if (isEntry) {
                                selection.end = selection.begin;
                            }
                        } else {
                            if (backPart.length < backBufferPart.length) {
                                selection.end += backBufferPart.length - backPart.length;
                            }
                            else if (backPart.charAt(0) !== backBufferPart.charAt(0)) {
                                selection.end++;
                            }
                        }
                    }

                    writeBuffer(input, getBuffer(), selection);
                    if (entries.length > 0) {
                        $.each(entries.split(""), function (ndx, entry) {
                            var keypress = new $.Event("keypress");
                            keypress.which = entry.charCodeAt(0);
                            ignorable = false; //make sure ignorable is ignored ;-)
                            EventHandlers.keypressEvent.call(input, keypress);
                        });
                    } else {
                        if (selection.begin === selection.end - 1) {
                            caret(input, seekPrevious(selection.begin + 1), selection.end);
                        }
                        e.keyCode = Inputmask.keyCode.DELETE;
                        EventHandlers.keydownEvent.call(input, e);
                    }

                    e.preventDefault();
                }
            },
            setValueEvent: function (e) {
                this.inputmask.refreshValue = false;
                var input = this,
                    value = input.inputmask._valueGet(true);

                if ($.isFunction(opts.onBeforeMask)) value = opts.onBeforeMask.call(inputmask, value, opts) || value;
                value = value.split("");
                checkVal(input, true, false, isRTL ? value.reverse() : value);
                undoValue = getBuffer().join("");
                if ((opts.clearMaskOnLostFocus || opts.clearIncomplete) && input.inputmask._valueGet() === getBufferTemplate().join("")) {
                    input.inputmask._valueSet("");
                }
            }

            ,
            focusEvent: function (e) {
                var input = this,
                    nptValue = input.inputmask._valueGet();
                if (opts.showMaskOnFocus && (!opts.showMaskOnHover || (opts.showMaskOnHover && nptValue === ""))) {
                    if (input.inputmask._valueGet() !== getBuffer().join("")) {
                        writeBuffer(input, getBuffer(), seekNext(getLastValidPosition()));
                    } else if (mouseEnter === false) { //only executed on focus without mouseenter
                        caret(input, seekNext(getLastValidPosition()));
                    }
                }
                if (opts.positionCaretOnTab === true && mouseEnter === false && nptValue !== "") {
                    writeBuffer(input, getBuffer(), caret(input));
                    EventHandlers.clickEvent.apply(input, [e, true]);
                }
                undoValue = getBuffer().join("");
            }
            ,
            mouseleaveEvent: function (e) {
                var input = this;
                mouseEnter = false;
                if (opts.clearMaskOnLostFocus && document.activeElement !== input) {
                    var buffer = getBuffer().slice(),
                        nptValue = input.inputmask._valueGet();
                    if (nptValue !== input.getAttribute("placeholder") && nptValue !== "") {
                        if (getLastValidPosition() === -1 && nptValue === getBufferTemplate().join("")) {
                            buffer = [];
                        } else { //clearout optional tail of the mask
                            clearOptionalTail(buffer);
                        }
                        writeBuffer(input, buffer);
                    }
                }
            }
            ,
            clickEvent: function (e, tabbed) {
                function doRadixFocus(clickPos) {
                    if (opts.radixPoint !== "") {
                        var vps = getMaskSet().validPositions;
                        if (vps[clickPos] === undefined || (vps[clickPos].input === getPlaceholder(clickPos))) {
                            if (clickPos < seekNext(-1)) return true;
                            var radixPos = $.inArray(opts.radixPoint, getBuffer());
                            if (radixPos !== -1) {
                                for (var vp in vps) {
                                    if (radixPos < vp && vps[vp].input !== getPlaceholder(vp)) {
                                        return false;
                                    }
                                }
                                return true;
                            }
                        }
                    }
                    return false;
                }

                var input = this;
                setTimeout(function () { //needed for Chrome ~ initial selection clears after the clickevent
                    if (document.activeElement === input) {
                        var selectedCaret = caret(input);
                        if (tabbed) {
                            if (isRTL) {
                                selectedCaret.end = selectedCaret.begin;
                            }
                            else {
                                selectedCaret.begin = selectedCaret.end;
                            }
                        }
                        if (selectedCaret.begin === selectedCaret.end) {
                            switch (opts.positionCaretOnClick) {
                                case "none":
                                    break;
                                case "radixFocus":
                                    if (doRadixFocus(selectedCaret.begin)) {
                                        var radixPos = getBuffer().join("").indexOf(opts.radixPoint);
                                        caret(input, opts.numericInput ? seekNext(radixPos) : radixPos);
                                        break;
                                    }
                                default: //lvp:
                                    var clickPosition = selectedCaret.begin,
                                        lvclickPosition = getLastValidPosition(clickPosition, true),
                                        lastPosition = seekNext(lvclickPosition);
                                    if (clickPosition < lastPosition) {
                                        caret(input, !isMask(clickPosition, true) && !isMask(clickPosition - 1, true) ? seekNext(clickPosition) : clickPosition);
                                    } else {
                                        var lvp = getMaskSet().validPositions[lvclickPosition],
                                            tt = getTestTemplate(lastPosition, lvp ? lvp.match.locator : undefined, lvp),
                                            placeholder = getPlaceholder(lastPosition, tt.match);
                                        if ((placeholder !== "" && getBuffer()[lastPosition] !== placeholder && tt.match.optionalQuantifier !== true && tt.match.newBlockMarker !== true) || (!isMask(lastPosition, true) && tt.match.def === placeholder)) {
                                            var newPos = seekNext(lastPosition);
                                            if (clickPosition >= newPos || clickPosition === lastPosition) {
                                                lastPosition = newPos;
                                            }
                                        }
                                        caret(input, lastPosition);
                                    }
                                    break;
                            }
                        }
                    }
                }, 0);
            }
            ,
            dblclickEvent: function (e) {
                var input = this;
                setTimeout(function () {
                    caret(input, 0, seekNext(getLastValidPosition()));
                }, 0);
            }
            ,
            cutEvent: function (e) {
                var input = this,
                    $input = $(input),
                    pos = caret(input),
                    ev = e.originalEvent || e;

                //correct clipboardData
                var clipboardData = window.clipboardData || ev.clipboardData,
                    clipData = isRTL ? getBuffer().slice(pos.end, pos.begin) : getBuffer().slice(pos.begin, pos.end);
                clipboardData.setData("text", isRTL ? clipData.reverse().join("") : clipData.join(""));
                if (document.execCommand) document.execCommand("copy"); // copy selected content to system clipbaord

                handleRemove(input, Inputmask.keyCode.DELETE, pos);
                writeBuffer(input, getBuffer(), getMaskSet().p, e, undoValue !== getBuffer().join(""));

                if (input.inputmask._valueGet() === getBufferTemplate().join("")) {
                    $input.trigger("cleared");
                }
            }
            ,
            blurEvent: function (e) {
                var $input = $(this),
                    input = this;
                if (input.inputmask) {
                    var nptValue = input.inputmask._valueGet(),
                        buffer = getBuffer().slice();

                    if (nptValue !== "") {
                        if (opts.clearMaskOnLostFocus) {
                            if (getLastValidPosition() === -1 && nptValue === getBufferTemplate().join("")) {
                                buffer = [];
                            } else { //clearout optional tail of the mask
                                clearOptionalTail(buffer);
                            }
                        }
                        if (isComplete(buffer) === false) {
                            setTimeout(function () {
                                $input.trigger("incomplete");
                            }, 0);
                            if (opts.clearIncomplete) {
                                resetMaskSet();
                                if (opts.clearMaskOnLostFocus) {
                                    buffer = [];
                                } else {
                                    buffer = getBufferTemplate().slice();
                                }
                            }
                        }

                        writeBuffer(input, buffer, undefined, e);
                    }

                    if (undoValue !== getBuffer().join("")) {
                        undoValue = buffer.join("");
                        $input.trigger("change");
                    }
                }
            }
            ,
            mouseenterEvent: function (e) {
                var input = this;
                mouseEnter = true;
                if (document.activeElement !== input && opts.showMaskOnHover) {
                    if (input.inputmask._valueGet() !== getBuffer().join("")) {
                        writeBuffer(input, getBuffer());
                    }
                }
            }
            ,
            submitEvent: function (e) { //trigger change on submit if any
                if (undoValue !== getBuffer().join("")) {
                    $el.trigger("change");
                }
                if (opts.clearMaskOnLostFocus && getLastValidPosition() === -1 && el.inputmask._valueGet && el.inputmask._valueGet() === getBufferTemplate().join("")) {
                    el.inputmask._valueSet(""); //clear masktemplete on submit and still has focus
                }
                if (opts.removeMaskOnSubmit) {
                    el.inputmask._valueSet(el.inputmask.unmaskedvalue(), true);
                    setTimeout(function () {
                        writeBuffer(el, getBuffer());
                    }, 0);
                }
            }
            ,
            resetEvent: function (e) {
                el.inputmask.refreshValue = true; //indicate a forced refresh when there is a call to the value before leaving the triggering event fn
                setTimeout(function () {
                    $el.trigger("setvalue");
                }, 0);
            }
        };

        function checkVal(input, writeOut, strict, nptvl, initiatingEvent) {
            var inputValue = nptvl.slice(),
                charCodes = "",
                initialNdx = -1, result = undefined;

            // console.log(nptvl);

            function isTemplateMatch(ndx, charCodes) {
                var charCodeNdx = getBufferTemplate().slice(ndx, seekNext(ndx)).join("").indexOf(charCodes);
                return charCodeNdx !== -1 && !isMask(ndx) && getTest(ndx).match.nativeDef === charCodes.charAt(charCodes.length - 1);
            }

            resetMaskSet();
            if (!strict && opts.autoUnmask !== true) {
                var staticInput = getBufferTemplate().slice(0, seekNext(-1)).join(""),
                    matches = inputValue.join("").match(new RegExp("^" + Inputmask.escapeRegex(staticInput), "g"));
                if (matches && matches.length > 0) {
                    inputValue.splice(0, matches.length * staticInput.length);
                    initialNdx = seekNext(initialNdx);
                }
            } else {
                initialNdx = seekNext(initialNdx);
            }
            if (initialNdx === -1) {
                getMaskSet().p = seekNext(initialNdx);
                initialNdx = 0;
            } else getMaskSet().p = initialNdx;
            $.each(inputValue, function (ndx, charCode) {
                // console.log(charCode);
                if (charCode !== undefined) { //inputfallback strips some elements out of the inputarray.  $.each logically presents them as undefined
                    if (getMaskSet().validPositions[ndx] === undefined && inputValue[ndx] === getPlaceholder(ndx) && isMask(ndx, true) &&
                        isValid(ndx, inputValue[ndx], true, undefined, undefined, true) === false) {
                        getMaskSet().p++;
                    }
                    else {

                        var keypress = new $.Event("_checkval");
                        keypress.which = charCode.charCodeAt(0);
                        charCodes += charCode;
                        var lvp = getLastValidPosition(undefined, true),
                            lvTest = getMaskSet().validPositions[lvp],
                            nextTest = getTestTemplate(lvp + 1, lvTest ? lvTest.locator.slice() : undefined, lvp);
                        if (!isTemplateMatch(initialNdx, charCodes) || strict || opts.autoUnmask) {
                            var pos = strict ? ndx : (nextTest.match.fn == null && nextTest.match.optionality && (lvp + 1) < getMaskSet().p ? lvp + 1 : getMaskSet().p);
                            result = EventHandlers.keypressEvent.call(input, keypress, true, false, strict, pos);
                            initialNdx = pos + 1;
                            charCodes = "";
                        } else {
                            result = EventHandlers.keypressEvent.call(input, keypress, true, false, true, lvp + 1);
                        }
                        if (result !== false && !strict && $.isFunction(opts.onBeforeWrite)) {
                            var origResult = result;
                            result = opts.onBeforeWrite.call(inputmask, keypress, getBuffer(), result.forwardPosition, opts);
                            result = $.extend(origResult, result);
                            if (result && result.refreshFromBuffer) {
                                var refresh = result.refreshFromBuffer;
                                refreshFromBuffer(refresh === true ? refresh : refresh.start, refresh.end, result.buffer);
                                resetMaskSet(true);
                                if (result.caret) {
                                    getMaskSet().p = result.caret;
                                    result.forwardPosition = result.caret;
                                }
                            }
                        }
                    }
                }
            });
            if (writeOut) {
                var caretPos = undefined;
                if (document.activeElement === input && result) {
                    caretPos = opts.numericInput ? seekPrevious(result.forwardPosition) : result.forwardPosition;
                }

                writeBuffer(input, getBuffer(), caretPos, initiatingEvent || new $.Event("checkval"), initiatingEvent && initiatingEvent.type === "input");
            }
        }

        function unmaskedvalue(input) {
            if (input) {
                if (input.inputmask === undefined) {
                    return input.value;
                }
                if (input.inputmask && input.inputmask.refreshValue) { //forced refresh from the value form.reset
                    EventHandlers.setValueEvent.call(input);
                }
            }
            var umValue = [],
                vps = getMaskSet().validPositions;
            for (var pndx in vps) {
                if (vps[pndx].match && vps[pndx].match.fn != null) {
                    umValue.push(vps[pndx].input);
                }
            }
            var unmaskedValue = umValue.length === 0 ? "" : (isRTL ? umValue.reverse() : umValue).join("");
            if ($.isFunction(opts.onUnMask)) {
                var bufferValue = (isRTL ? getBuffer().slice().reverse() : getBuffer()).join("");
                unmaskedValue = opts.onUnMask.call(inputmask, bufferValue, unmaskedValue, opts);
            }
            return unmaskedValue;
        }

        function caret(input, begin, end, notranslate) {
            function translatePosition(pos) {
                if (notranslate !== true && isRTL && typeof pos === "number" && (!opts.greedy || opts.placeholder !== "")) {
                    var bffrLght = getBuffer().join("").length; //join is needed because sometimes we get an empty buffer element which must not be counted for the caret position (numeric alias)
                    pos = bffrLght - pos;
                }
                return pos;
            }

            var range;
            if (begin !== undefined) {
                if (begin.begin !== undefined) {
                    end = begin.end;
                    begin = begin.begin;
                }
                if (typeof begin === "number") {
                    begin = translatePosition(begin);
                    end = translatePosition(end);
                    end = (typeof end == "number") ? end : begin;
                    // if (!$(input).is(":visible")) {
                    // 	return;
                    // }

                    var scrollCalc = parseInt(((input.ownerDocument.defaultView || window).getComputedStyle ? (input.ownerDocument.defaultView || window).getComputedStyle(input, null) : input.currentStyle).fontSize) * end;
                    input.scrollLeft = scrollCalc > input.scrollWidth ? scrollCalc : 0;

                    if (!mobile && opts.insertMode === false && begin === end) end++; //set visualization for insert/overwrite mode
                    if (input.setSelectionRange) {
                        input.selectionStart = begin;
                        input.selectionEnd = end;
                    } else if (window.getSelection) {
                        range = document.createRange();
                        if (input.firstChild === undefined || input.firstChild === null) {
                            var textNode = document.createTextNode("");
                            input.appendChild(textNode);
                        }
                        range.setStart(input.firstChild, begin < input.inputmask._valueGet().length ? begin : input.inputmask._valueGet().length);
                        range.setEnd(input.firstChild, end < input.inputmask._valueGet().length ? end : input.inputmask._valueGet().length);
                        range.collapse(true);
                        var sel = window.getSelection();
                        sel.removeAllRanges();
                        sel.addRange(range);
                        //input.focus();
                    } else if (input.createTextRange) {
                        range = input.createTextRange();
                        range.collapse(true);
                        range.moveEnd("character", end);
                        range.moveStart("character", begin);
                        range.select();

                    }
                    renderColorMask(input, {begin: begin, end: end});
                }
            } else {
                if (input.setSelectionRange) {
                    begin = input.selectionStart;
                    end = input.selectionEnd;
                } else if (window.getSelection) {
                    range = window.getSelection().getRangeAt(0);
                    if (range.commonAncestorContainer.parentNode === input || range.commonAncestorContainer === input) {
                        begin = range.startOffset;
                        end = range.endOffset;
                    }
                } else if (document.selection && document.selection.createRange) {
                    range = document.selection.createRange();
                    begin = 0 - range.duplicate().moveStart("character", -input.inputmask._valueGet().length);
                    end = begin + range.text.length;
                }

                /*eslint-disable consistent-return */
                return {
                    "begin": translatePosition(begin),
                    "end": translatePosition(end)
                };
                /*eslint-enable consistent-return */
            }
        }

        function determineLastRequiredPosition(returnDefinition) {
            var buffer = getBuffer(),
                bl = buffer.length,
                pos, lvp = getLastValidPosition(),
                positions = {},
                lvTest = getMaskSet().validPositions[lvp],
                ndxIntlzr = lvTest !== undefined ? lvTest.locator.slice() : undefined,
                testPos;
            for (pos = lvp + 1; pos < buffer.length; pos++) {
                testPos = getTestTemplate(pos, ndxIntlzr, pos - 1);
                ndxIntlzr = testPos.locator.slice();
                positions[pos] = $.extend(true, {}, testPos);
            }

            var lvTestAlt = lvTest && lvTest.alternation !== undefined ? lvTest.locator[lvTest.alternation] : undefined;
            for (pos = bl - 1; pos > lvp; pos--) {
                testPos = positions[pos];
                if ((testPos.match.optionality ||
                        (testPos.match.optionalQuantifier && testPos.match.newBlockMarker) ||
                        (lvTestAlt &&
                            ((lvTestAlt !== positions[pos].locator[lvTest.alternation] && testPos.match.fn != null) ||
                                (testPos.match.fn === null && testPos.locator[lvTest.alternation] && checkAlternationMatch(testPos.locator[lvTest.alternation].toString().split(","), lvTestAlt.toString().split(",")) && getTests(pos)[0].def !== "")))) &&
                    buffer[pos] === getPlaceholder(pos, testPos.match)) {
                    bl--;
                } else break;
            }
            return returnDefinition ? {
                "l": bl,
                "def": positions[bl] ? positions[bl].match : undefined
            } : bl;
        }

        function clearOptionalTail(buffer) {
            var rl = determineLastRequiredPosition(),
                validPos, bl = buffer.length;

            var lv = getMaskSet().validPositions[getLastValidPosition()];
            while (rl < bl &&
            !isMask(rl, true) &&
            (validPos = (lv !== undefined ? getTestTemplate(rl, lv.locator.slice(""), lv) : getTest(rl))) &&
            validPos.match.optionality !== true &&
            ((validPos.match.optionalQuantifier !== true && validPos.match.newBlockMarker !== true) || (rl + 1 === bl &&
                (lv !== undefined ? getTestTemplate(rl + 1, lv.locator.slice(""), lv) : getTest(rl + 1)).match.def === ""))) {
                rl++;
            }

            //exceptionally strip from the validatedPositions
            while ((validPos = getMaskSet().validPositions[rl - 1]) && validPos && validPos.match.optionality && validPos.input === opts.skipOptionalPartCharacter) {
                rl--;
            }
            buffer.splice(rl);
            return buffer;
        }

        function isComplete(buffer) { //return true / false / undefined (repeat *)
            if ($.isFunction(opts.isComplete)) return opts.isComplete(buffer, opts);
            if (opts.repeat === "*") return undefined;
            var complete = false,
                lrp = determineLastRequiredPosition(true),
                aml = seekPrevious(lrp.l);

            if (lrp.def === undefined || lrp.def.newBlockMarker || lrp.def.optionality || lrp.def.optionalQuantifier) {
                complete = true;
                for (var i = 0; i <= aml; i++) {
                    var test = getTestTemplate(i).match;
                    if ((test.fn !== null && getMaskSet().validPositions[i] === undefined && test.optionality !== true && test.optionalQuantifier !== true) || (test.fn === null && buffer[i] !== getPlaceholder(i, test))) {
                        complete = false;
                        break;
                    }
                }
            }
            return complete;
        }


        function handleRemove(input, k, pos, strict, fromIsValid) {
            function generalize() {
                if (opts.keepStatic) {
                    var validInputs = [],
                        lastAlt = getLastValidPosition(-1, true),
                        positionsClone = $.extend(true, {}, getMaskSet().validPositions),
                        prevAltPos = getMaskSet().validPositions[lastAlt];
                    //find last alternation
                    for (; lastAlt >= 0; lastAlt--) {
                        var altPos = getMaskSet().validPositions[lastAlt];
                        if (altPos) {
                            if (altPos.generatedInput !== true && /[0-9a-bA-Z]/.test(altPos.input)) {
                                validInputs.push(altPos.input);
                            }
                            delete getMaskSet().validPositions[lastAlt];
                            if (altPos.alternation !== undefined && altPos.locator[altPos.alternation] !== prevAltPos.locator[altPos.alternation]) {
                                break;
                            }
                            prevAltPos = altPos;
                        }
                    }

                    if (lastAlt > -1) {
                        getMaskSet().p = seekNext(getLastValidPosition(-1, true));
                        while (validInputs.length > 0) {
                            var keypress = new $.Event("keypress");
                            keypress.which = validInputs.pop().charCodeAt(0);
                            // eslint-disable-next-line no-use-before-define
                            EventHandlers.keypressEvent.call(input, keypress, true, false, false, getMaskSet().p);

                        }
                    } else getMaskSet().validPositions = $.extend(true, {}, positionsClone); //restore original positions
                }
            }

            if (opts.numericInput || isRTL) {
                if (k === Inputmask.keyCode.BACKSPACE) {
                    k = Inputmask.keyCode.DELETE;
                } else if (k === Inputmask.keyCode.DELETE) {
                    k = Inputmask.keyCode.BACKSPACE;
                }

                if (isRTL) {
                    var pend = pos.end;
                    pos.end = pos.begin;
                    pos.begin = pend;
                }
            }

            if (k === Inputmask.keyCode.BACKSPACE && (pos.end - pos.begin < 1 || opts.insertMode === false)) {
                pos.begin = seekPrevious(pos.begin);
                if (getMaskSet().validPositions[pos.begin] !== undefined && getMaskSet().validPositions[pos.begin].input === opts.groupSeparator) {
                    pos.begin--;
                }
            } else if (k === Inputmask.keyCode.DELETE && pos.begin === pos.end) {
                pos.end = isMask(pos.end, true) && (getMaskSet().validPositions[pos.end] && getMaskSet().validPositions[pos.end].input !== opts.radixPoint  ) ?
                    pos.end + 1 :
                    seekNext(pos.end) + 1;
                if (getMaskSet().validPositions[pos.begin] !== undefined && getMaskSet().validPositions[pos.begin].input === opts.groupSeparator) {
                    pos.end++;
                }
            }

            stripValidPositions(pos.begin, pos.end, false, strict);
            if (strict !== true) {
                generalize(); //revert the alternation
            }
            var lvp = getLastValidPosition(pos.begin, true);
            if (lvp < pos.begin) {
                //if (lvp === -1) resetMaskSet();
                getMaskSet().p = seekNext(lvp);
            } else if (strict !== true) {
                getMaskSet().p = pos.begin;
                if (fromIsValid !== true) {
                    //put position on first valid from pos.begin ~ #1351
                    while (getMaskSet().p < lvp && getMaskSet().validPositions[getMaskSet().p] === undefined) {
                        getMaskSet().p++;
                    }
                }
            }
        }

        function initializeColorMask(input) {
            var computedStyle = (input.ownerDocument.defaultView || window).getComputedStyle(input, null);

            function findCaretPos(clientx) {
                //calculate text width
                var e = document.createElement("span"), caretPos;
                for (var style in computedStyle) { //clone styles
                    if (isNaN(style) && style.indexOf("font") !== -1) {
                        e.style[style] = computedStyle[style];
                    }
                }
                e.style.textTransform = computedStyle.textTransform;
                e.style.letterSpacing = computedStyle.letterSpacing;
                e.style.position = "absolute";
                e.style.height = "auto";
                e.style.width = "auto";
                e.style.visibility = "hidden";
                e.style.whiteSpace = "nowrap";

                document.body.appendChild(e);
                var inputText = input.inputmask._valueGet(), previousWidth = 0, itl;
                for (caretPos = 0, itl = inputText.length; caretPos <= itl; caretPos++) {
                    e.innerHTML += inputText.charAt(caretPos) || "_";
                    if (e.offsetWidth >= clientx) {
                        var offset1 = (clientx - previousWidth);
                        var offset2 = e.offsetWidth - clientx;
                        e.innerHTML = inputText.charAt(caretPos);
                        offset1 -= (e.offsetWidth / 3);
                        caretPos = offset1 < offset2 ? caretPos - 1 : caretPos;
                        break;
                    }
                    previousWidth = e.offsetWidth;
                }
                document.body.removeChild(e);
                return caretPos;
            }

            var template = document.createElement("div");
            template.style.width = computedStyle.width;
            template.style.textAlign = computedStyle.textAlign;
            colorMask = document.createElement("div");
            colorMask.className = "im-colormask";
            input.parentNode.insertBefore(colorMask, input);
            input.parentNode.removeChild(input);
            colorMask.appendChild(template);
            colorMask.appendChild(input);
            input.style.left = template.offsetLeft + "px";

            $(input).on("click", function (e) {
                caret(input, findCaretPos(e.clientX));
                return EventHandlers.clickEvent.call(input, [e]);
            });
            $(input).on("keydown", function (e) {
                if (!e.shiftKey && opts.insertMode !== false) {
                    setTimeout(function () {
                        renderColorMask(input);
                    }, 0);
                }
            });
        }

        Inputmask.prototype.positionColorMask = function (input, template) {
            input.style.left = template.offsetLeft + "px";
        }

        function renderColorMask(input, caretPos, clear) {
            var maskTemplate = "", isStatic = false, test, testPos, ndxIntlzr, pos = 0;

            function handleStatic() {
                if (!isStatic && (test.fn === null || testPos.input === undefined)) {
                    isStatic = true;
                    maskTemplate += "<span class='im-static'>"
                } else if (isStatic && ((test.fn !== null && testPos.input !== undefined) || test.def === "")) {
                    isStatic = false;
                    maskTemplate += "</span>"
                }
            }

            function handleCaret(force) {
                if ((force === true || pos === caretPos.begin) && document.activeElement === input) {
                    maskTemplate += "<span class='im-caret' style='border-right-width: 1px;border-right-style: solid;'></span>";
                }
            }

            if (colorMask !== undefined) {
                var buffer = getBuffer();
                if (caretPos === undefined) {
                    caretPos = caret(input);
                } else if (caretPos.begin === undefined) {
                    caretPos = {begin: caretPos, end: caretPos};
                }

                if (clear !== true) {
                    var lvp = getLastValidPosition();
                    do {
                        handleCaret();
                        if (getMaskSet().validPositions[pos]) {
                            testPos = getMaskSet().validPositions[pos];
                            test = testPos.match;
                            ndxIntlzr = testPos.locator.slice();
                            handleStatic();
                            maskTemplate += buffer[pos];
                        } else {
                            testPos = getTestTemplate(pos, ndxIntlzr, pos - 1);
                            test = testPos.match;
                            ndxIntlzr = testPos.locator.slice();
                            if (opts.jitMasking === false || pos < lvp || (typeof opts.jitMasking === "number" && isFinite(opts.jitMasking) && opts.jitMasking > pos)) {
                                handleStatic();
                                maskTemplate += getPlaceholder(pos, test);
                            }
                        }
                        pos++;
                    } while ((maxLength === undefined || pos < maxLength) && (test.fn !== null || test.def !== "") || lvp > pos || isStatic);
                    if (maskTemplate.indexOf("im-caret") === -1) handleCaret(true);
                    if (isStatic) handleStatic();
                }

                var template = colorMask.getElementsByTagName("div")[0];
                template.innerHTML = maskTemplate;
                input.inputmask.positionColorMask(input, template);
            }
        }

        function mask(elem) {
            function isElementTypeSupported(input, opts) {
                function patchValueProperty(npt) {
                    var valueGet;
                    var valueSet;

                    function patchValhook(type) {
                        if ($.valHooks && ($.valHooks[type] === undefined || $.valHooks[type].inputmaskpatch !== true)) {
                            var valhookGet = $.valHooks[type] && $.valHooks[type].get ? $.valHooks[type].get : function (elem) {
                                return elem.value;
                            };
                            var valhookSet = $.valHooks[type] && $.valHooks[type].set ? $.valHooks[type].set : function (elem, value) {
                                elem.value = value;
                                return elem;
                            };

                            $.valHooks[type] = {
                                get: function (elem) {
                                    if (elem.inputmask) {
                                        if (elem.inputmask.opts.autoUnmask) {
                                            return elem.inputmask.unmaskedvalue();
                                        } else {
                                            var result = valhookGet(elem);
                                            return getLastValidPosition(undefined, undefined, elem.inputmask.maskset.validPositions) !== -1 || opts.nullable !== true ? result : "";
                                        }
                                    } else return valhookGet(elem);
                                },
                                set: function (elem, value) {
                                    var $elem = $(elem),
                                        result;
                                    result = valhookSet(elem, value);
                                    if (elem.inputmask) {
                                        $elem.trigger("setvalue");
                                    }
                                    return result;
                                },
                                inputmaskpatch: true
                            };
                        }
                    }

                    function getter() {
                        if (this.inputmask) {
                            return this.inputmask.opts.autoUnmask ?
                                this.inputmask.unmaskedvalue() :
                                (getLastValidPosition() !== -1 || opts.nullable !== true ?
                                    (document.activeElement === this && opts.clearMaskOnLostFocus ?
                                        (isRTL ? clearOptionalTail(getBuffer().slice()).reverse() : clearOptionalTail(getBuffer().slice())).join("") :
                                        valueGet.call(this)) :
                                    "");
                        } else return valueGet.call(this);
                    }

                    function setter(value) {
                        valueSet.call(this, value);
                        if (this.inputmask) {
                            $(this).trigger("setvalue");
                        }
                    }

                    function installNativeValueSetFallback(npt) {
                        EventRuler.on(npt, "mouseenter", function (event) {
                            var $input = $(this),
                                input = this,
                                value = input.inputmask._valueGet();
                            if (value !== getBuffer().join("") /*&& getLastValidPosition() > 0*/) {
                                $input.trigger("setvalue");
                            }
                        });
                    }

                    if (!npt.inputmask.__valueGet) {
                        if (opts.noValuePatching !== true) {
                            if (Object.getOwnPropertyDescriptor) {
                                if (typeof Object.getPrototypeOf !== "function") {
                                    Object.getPrototypeOf = typeof "test".__proto__ === "object" ? function (object) {
                                        return object.__proto__;
                                    } : function (object) {
                                        return object.constructor.prototype;
                                    };
                                }

                                var valueProperty = Object.getPrototypeOf ? Object.getOwnPropertyDescriptor(Object.getPrototypeOf(npt), "value") : undefined;
                                if (valueProperty && valueProperty.get && valueProperty.set) {
                                    valueGet = valueProperty.get;
                                    valueSet = valueProperty.set;
                                    Object.defineProperty(npt, "value", {
                                        get: getter,
                                        set: setter,
                                        configurable: true
                                    });
                                } else if (npt.tagName !== "INPUT") {
                                    valueGet = function () {
                                        return this.textContent;
                                    };
                                    valueSet = function (value) {
                                        this.textContent = value;
                                    };
                                    Object.defineProperty(npt, "value", {
                                        get: getter,
                                        set: setter,
                                        configurable: true
                                    });
                                }
                            }
                            npt.inputmask.__valueGet = valueGet; //store native property getter
                            npt.inputmask.__valueSet = valueSet; //store native property setter
                        }
                        npt.inputmask._valueGet = function (overruleRTL) {
                            return isRTL && overruleRTL !== true ? valueGet.call(this.el).split("").reverse().join("") : valueGet.call(this.el);
                        };
                        npt.inputmask._valueSet = function (value, overruleRTL) { //null check is needed for IE8 => otherwise converts to "null"
                            valueSet.call(this.el, (value === null || value === undefined) ? "" : ((overruleRTL !== true && isRTL) ? value.split("").reverse().join("") : value));
                        };

                        if (valueGet === undefined) { //jquery.val fallback
                            valueGet = function () {
                                return this.value;
                            };
                            valueSet = function (value) {
                                this.value = value;
                            };
                            patchValhook(npt.type);
                            installNativeValueSetFallback(npt);
                        }
                    }
                }

                var elementType = input.getAttribute("type");
                var isSupported = (input.tagName === "INPUT" && $.inArray(elementType, opts.supportsInputType) !== -1) || input.isContentEditable || input.tagName === "TEXTAREA";
                if (!isSupported) {
                    if (input.tagName === "INPUT") {
                        var el = document.createElement("input");
                        el.setAttribute("type", elementType);
                        isSupported = el.type === "text"; //apply mask only if the type is not natively supported
                        el = null;
                    } else isSupported = "partial";
                }
                if (isSupported !== false) {
                    patchValueProperty(input);
                } else input.inputmask = undefined;
                return isSupported;
            }

            //unbind all events - to make sure that no other mask will interfere when re-masking
            EventRuler.off(elem);
            var isSupported = isElementTypeSupported(elem, opts);
            if (isSupported !== false) {
                el = elem;
                $el = $(el);

                //read maxlength prop from el
                maxLength = el !== undefined ? el.maxLength : undefined;
                if (maxLength === -1) maxLength = undefined;

                if (opts.colorMask === true) {
                    initializeColorMask(el);
                }

                if (android) {
                    if (el.hasOwnProperty("inputmode")) {
                        el.inputmode = opts.inputmode;
                        el.setAttribute("inputmode", opts.inputmode);
                    }
                    if (opts.androidHack === "rtfm") {
                        if (opts.colorMask !== true) {
                            initializeColorMask(el);
                        }
                        el.type = "password";
                    }
                }

                if (isSupported === true) {
                    //bind events
                    EventRuler.on(el, "submit", EventHandlers.submitEvent);
                    EventRuler.on(el, "reset", EventHandlers.resetEvent);

                    EventRuler.on(el, "mouseenter", EventHandlers.mouseenterEvent);
                    EventRuler.on(el, "blur", EventHandlers.blurEvent);
                    EventRuler.on(el, "focus", EventHandlers.focusEvent);
                    EventRuler.on(el, "mouseleave", EventHandlers.mouseleaveEvent);
                    if (opts.colorMask !== true) {
                        EventRuler.on(el, "click", EventHandlers.clickEvent);
                    }
                    EventRuler.on(el, "dblclick", EventHandlers.dblclickEvent);
                    EventRuler.on(el, "paste", EventHandlers.pasteEvent);
                    EventRuler.on(el, "dragdrop", EventHandlers.pasteEvent);
                    EventRuler.on(el, "drop", EventHandlers.pasteEvent);
                    EventRuler.on(el, "cut", EventHandlers.cutEvent);
                    EventRuler.on(el, "complete", opts.oncomplete);
                    EventRuler.on(el, "incomplete", opts.onincomplete);
                    EventRuler.on(el, "cleared", opts.oncleared);
                    if (!android && opts.inputEventOnly !== true) {
                        EventRuler.on(el, "keydown", EventHandlers.keydownEvent);
                        EventRuler.on(el, "keypress", EventHandlers.keypressEvent);
                    } else el.removeAttribute("maxLength");
                    EventRuler.on(el, "compositionstart", $.noop);
                    EventRuler.on(el, "compositionupdate", $.noop);
                    EventRuler.on(el, "compositionend", $.noop);
                    EventRuler.on(el, "keyup", $.noop);
                    EventRuler.on(el, "input", EventHandlers.inputFallBackEvent);
                    EventRuler.on(el, "beforeinput", $.noop); //https://github.com/w3c/input-events - to implement
                }
                EventRuler.on(el, "setvalue", EventHandlers.setValueEvent);

                //apply mask
                undoValue = getBufferTemplate().join(""); //initialize the buffer and getmasklength
                if (el.inputmask._valueGet(true) !== "" || opts.clearMaskOnLostFocus === false || document.activeElement === el) {
                    var initialValue = $.isFunction(opts.onBeforeMask) ? (opts.onBeforeMask.call(inputmask, el.inputmask._valueGet(true), opts) || el.inputmask._valueGet(true)) : el.inputmask._valueGet(true);
                    if (initialValue !== "") checkVal(el, true, false, isRTL ? initialValue.split("").reverse() : initialValue.split(""));
                    var buffer = getBuffer().slice();
                    undoValue = buffer.join("");
                    // Wrap document.activeElement in a try/catch block since IE9 throw "Unspecified error" if document.activeElement is undefined when we are in an IFrame.
                    if (isComplete(buffer) === false) {
                        if (opts.clearIncomplete) {
                            resetMaskSet();
                        }
                    }
                    if (opts.clearMaskOnLostFocus && document.activeElement !== el) {
                        if (getLastValidPosition() === -1) {
                            buffer = [];
                        } else {
                            clearOptionalTail(buffer);
                        }
                    }
                    writeBuffer(el, buffer);
                    if (document.activeElement === el) { //position the caret when in focus
                        caret(el, seekNext(getLastValidPosition()));
                    }
                }
            }
        }

//action object
        var valueBuffer;
        if (actionObj !== undefined) {
            switch (actionObj.action) {
                case "isComplete":
                    el = actionObj.el;
                    return isComplete(getBuffer());
                case "unmaskedvalue":
                    if (el === undefined || actionObj.value !== undefined) {
                        valueBuffer = actionObj.value;
                        valueBuffer = ($.isFunction(opts.onBeforeMask) ? (opts.onBeforeMask.call(inputmask, valueBuffer, opts) || valueBuffer) : valueBuffer).split("");
                        checkVal(undefined, false, false, isRTL ? valueBuffer.reverse() : valueBuffer);
                        if ($.isFunction(opts.onBeforeWrite)) opts.onBeforeWrite.call(inputmask, undefined, getBuffer(), 0, opts);
                    }
                    return unmaskedvalue(el);
                case "mask":
                    mask(el);
                    break;
                case "format":
                    valueBuffer = ($.isFunction(opts.onBeforeMask) ? (opts.onBeforeMask.call(inputmask, actionObj.value, opts) || actionObj.value) : actionObj.value).split("");
                    checkVal(undefined, true, false, isRTL ? valueBuffer.reverse() : valueBuffer);
                    if (actionObj.metadata) {
                        return {
                            value: isRTL ? getBuffer().slice().reverse().join("") : getBuffer().join(""),
                            metadata: maskScope.call(this, {
                                "action": "getmetadata"
                            }, maskset, opts)
                        };
                    }

                    return isRTL ? getBuffer().slice().reverse().join("") : getBuffer().join("");
                case "isValid":
                    if (actionObj.value) {
                        valueBuffer = actionObj.value.split("");
                        checkVal(undefined, true, true, isRTL ? valueBuffer.reverse() : valueBuffer);
                    } else {
                        actionObj.value = getBuffer().join("");
                    }
                    var buffer = getBuffer();
                    var rl = determineLastRequiredPosition(),
                        lmib = buffer.length - 1;
                    for (; lmib > rl; lmib--) {
                        if (isMask(lmib)) break;
                    }
                    buffer.splice(rl, lmib + 1 - rl);

                    return isComplete(buffer) && actionObj.value === getBuffer().join("");
                case "getemptymask":
                    return getBufferTemplate().join("");
                case "remove":
                    if (el && el.inputmask) {
                        $el = $(el);
                        //writeout the value
                        el.inputmask._valueSet(opts.autoUnmask ? unmaskedvalue(el) : el.inputmask._valueGet(true));
                        //unbind all events
                        EventRuler.off(el);
                        //restore the value property
                        var valueProperty;
                        if (Object.getOwnPropertyDescriptor && Object.getPrototypeOf) {
                            valueProperty = Object.getOwnPropertyDescriptor(Object.getPrototypeOf(el), "value");
                            if (valueProperty) {
                                if (el.inputmask.__valueGet) {
                                    Object.defineProperty(el, "value", {
                                        get: el.inputmask.__valueGet,
                                        set: el.inputmask.__valueSet,
                                        configurable: true
                                    });
                                }
                            }
                        }
                        //clear data
                        el.inputmask = undefined;
                    }
                    return el;
                    break;
                case "getmetadata":
                    if ($.isArray(maskset.metadata)) {
                        var maskTarget = getMaskTemplate(true, 0, false).join("");
                        $.each(maskset.metadata, function (ndx, mtdt) {
                            if (mtdt.mask === maskTarget) {
                                maskTarget = mtdt;
                                return false;
                            }
                        });
                        return maskTarget;
                    }

                    return maskset.metadata;
            }
        }
    }

//make inputmask available
    return Inputmask;
}))
;



/*[PATH @digikala/supernova-digikala-marketplace/assets/local/js/controllers/RD-profileController/profileAction.js]*/
const profileUtils = {
    /**
     * A very simple template engine for JS
     *
     * @method templateEngine
     * @return {String}
     */

    etta: function(template, data, index) {
        return template.replace(/\{([\w\. \|]*)\}/g, function(str, key) {
            var keys;
            var v;
            var filters = [];
            if (key.indexOf("|") > -1) {
                filters = key.replace(/\s/g, "").split("|");
                keys = filters[0];
            }
            keys = !keys ? key.split(".") : keys.split(".");
            if (filters.length > 0) {
                v = typeof data[keys[0]] === "number" ? parseInt(data[keys.shift()]) : data[keys.shift()];

                for (var i = 1; i < filters.length; i++) {
                    var fn = Services[filters[i]];
                    if (typeof fn === "function") {
                        for (var y = 0, l = keys.length; y < l; y++) {
                            if (v && v[keys[y]] && v[keys[y]] !== null && v[keys[y]] !== undefined) {
                                v = v[keys[y]];
                            } else {
                                v = null;
                            }
                        }
                        v = fn(v, false, "");
                    } else {
                        v = data[keys.shift()];
                    }
                }
            } else {
                v = data[keys.shift()];

                for (var yy = 0, ll = keys.length; yy < ll; yy++) v = v && v[keys[yy]];
            }
            key == "index" ? (v = index) : "";

            return typeof v !== "undefined" && v !== null ? v : "";
        });
    },
    pagination: function(template, params) {
        var container = "";
        var pageNumbers = Math.ceil(params.data.totalNumber / params.data.pageSize);
        var prevButtonEL = $(template).closest(params.classes.prevButton);
        params.data.initPage === 1
            ? $(prevButtonEL)
                  .children("a")
                  .addClass(params.classes.prevDisable)
            : "";
        var numbersEL = $(template).closest(params.classes.numberTag);
        var ellipsisText = $(template).closest(params.classes.ellipsisTag);
        var nextButtonEL = $(template).closest(params.classes.nextButton);
        var beginFrom = parseInt((params.data.initPage - 1) / params.data.batchPage) * params.data.batchPage + 1;

        if (params.data.pageSize < params.data.totalNumber) {
            for (var i = beginFrom; i <= pageNumbers; i++) {
                if (i == beginFrom && params.data.showPrevious) {
                    params.data.initPage === 1
                        ? $(prevButtonEL)
                              .children("a")
                              .addClass(params.classes.prevDisable)
                        : "";
                    container += $(prevButtonEL)
                        .wrap("<p/>")
                        .parent()
                        .html();
                }
                if (beginFrom > 1 && i === beginFrom && pageNumbers > 7) {
                    $(ellipsisText)
                        .children("a")
                        .text("...");
                    $(ellipsisText)
                        .children("a")
                        .attr("data-page", beginFrom - params.data.batchPage);
                    container += $(ellipsisText)
                        .wrap("<p/>")
                        .parent()
                        .html();
                }
                if (pageNumbers <= 7) {
                    setCurrentPage();
                    $(numbersEL)
                        .children("a")
                        .text(i);
                    $(numbersEL)
                        .children("a")
                        .data("page", i);
                    $(numbersEL)
                        .children("a")
                        .attr("data-page", i);
                    container += $(numbersEL)
                        .wrap("<p/>")
                        .parent()
                        .html();
                } else if (i <= beginFrom + params.data.batchPage - 1) {
                    setCurrentPage();
                    $(numbersEL)
                        .children("a")
                        .text(i);
                    $(numbersEL)
                        .children("a")
                        .data("page", i);
                    $(numbersEL)
                        .children("a")
                        .attr("data-page", i);
                    container += $(numbersEL)
                        .wrap("<p/>")
                        .parent()
                        .html();
                } else if (i == pageNumbers) {
                    setCurrentPage();
                    $(ellipsisText)
                        .children("a")
                        .text("...");
                    $(ellipsisText)
                        .children("a")
                        .attr("data-page", beginFrom + params.data.batchPage);
                    container += $(ellipsisText)
                        .wrap("<p/>")
                        .parent()
                        .html();
                    $(numbersEL)
                        .children("a")
                        .text(i);
                    $(numbersEL)
                        .children("a")
                        .attr("data-page", i);
                    container += $(numbersEL)
                        .wrap("<p/>")
                        .parent()
                        .html();
                }
                if (i == pageNumbers && params.data.showNext && pageNumbers > 7) {
                    params.data.initPage === pageNumbers
                        ? $(nextButtonEL)
                              .children("a")
                              .addClass(params.classes.nextDisable)
                        : "";
                    container += $(nextButtonEL)
                        .wrap("<p/>")
                        .parent()
                        .html();
                }
            }
        }

        return container;

        function setCurrentPage() {
            if (params.data.initPage === i) {
                $(numbersEL).addClass(params.classes.pageNumberActive);
                $(numbersEL)
                    .children("a")
                    .addClass(params.classes.tagNumberActive);
            } else if ($(numbersEL).hasClass(params.classes.pageNumberActive)) {
                $(numbersEL).removeClass(params.classes.pageNumberActive);
                $(numbersEL)
                    .children("a")
                    .removeClass(params.classes.tagNumberActive);
            }
        }
    },
    useSpinner: function(state, el) {
        var $spinnerElement = '<div class="c-loading" style="background-color: hsla(0,0%,100%,1);"><div class="c-loading__container"><div class="c-loading__loading-img"></div></div>';
        if (state) {
            $("." + el).append($spinnerElement);
        } else {
            $("." + el)
                .find("div.c-loading")
                .remove();
        }
    },
    removeDuplicates: function(arr,identifier = "id") {
        var newArray = [];
        $.each(arr, function(key, value) {
            var exists = false;
            $.each(newArray, function(k, val2) {
                if (!value || value[identifier] == val2[identifier]) {
                    exists = true;
                }
            });
            if (exists == false && value && value[identifier] != "") {
                newArray.push(value);
            }
        });

        return newArray;
    },
    setter: {
        get: "",
        getTabClone: "",
        getWarehousesTable: "",
        getContactTable: "",
        getContactDeleteModal: "",
        getCategoryFilter: "",
        getProductStatusFilter: "",
        getModalPageNumbers: "",
        set tabClone(value) {
            this.getTabClone = value;
        },
        set warehousesForm(value) {
            this.getWarehousesTable = value;
        },
        set contactForm(value) {
            this.getContactTable = value;
        },
        set contactDeleteModal(value) {
            this.getContactDeleteModal = value;
        },
        set productActivationFilter(value) {
            this.getProductActivationFilter = value;
        },
        set categoryFilter(value) {
            this.getCategoryFilter = value;
        },
        set productStatusFilter(value) {
            this.getProductStatusFilter = value;
        },
        set cache(value) {
            this.get = value;
        }
    },
    parseForSelect2: function(obj) {
        var arr = [{ id: "", text: "انتخاب همه" }];
        Object.entries(obj).forEach(function(val) {
            arr.push({
                id: val[0],
                text: val[1]
            });
        });
        return arr;
    },
    chunk: function(size, array) {
        return array.reduce(function(previous, current) {
            var chunk;
            if (previous.length === 0 || previous[previous.length - 1].length === size) {
                chunk = [];
                previous.push(chunk);
            } else {
                chunk = previous[previous.length - 1];
            }
            chunk.push(current);
            return previous;
        }, []);
    },
    objectify: function(data) {
        const obj = {},
            regex = /{\s*(.*?)\s*:\s*(.*?)\s*}/g;
        let temp;
        while ((temp = regex.exec(data))) {
            obj[temp[1]] = temp[2];
        }
        return obj;
    }
};

const ProfileAction = {
    tabInfo: {
        name: "businessInfo"
    },
    currentSectionData: { data: {} },

    state: {
        selectedWorkDayToDelete: { id: null, type: null },
        isSBSActive: null,
    },

    init: function() {
        ProfileAction.state.isSBSActive = $('#workCalendar').attr('data-is-sbs-active');
        this.initSelectedPage();
        this.initCoordinatesControls();
        this.initInputsWithFaDigits();
        if (isModuleActive('marketplace_profile_description_and_logo_changes')) {
            this.initAboutSellerLetterCount();
        }
        if (isModuleActive('marketplace_profile_commitment_download_link')) {
            this.initDownloadLinkOnDocsPage();
        }
        this.handleWorkCalendarTabs();
    },

    handleWorkCalendarTabs: function() {
        $(document).on('click', '.js-calendar-table-tab-item', function () {
            $('.js-calendar-table-tab-item').removeClass('c-ship-by-seller__tab-option--active');
            $('.js-calendar-table-tab-content').addClass('uk-hidden');
            $(this).addClass('c-ship-by-seller__tab-option--active');
            $('#' + $(this).data('content-id')).removeClass('uk-hidden');
        });
    },


    formEditMode: function (e, tabId,element = '') {
        e.stopImmediatePropagation();
        e.preventDefault();

        const $tabInfo = $("#" + tabId +' ' + element);
        const $cancel = $("#" + tabId +' ' + element + " .js-profile-cancel-edit-form");
        const $formAction = $("#" + tabId +' ' + element + " .js-profile-form-action");
        let elementName = "input[name^=" + tabId + "],select[name^=" + tabId + "],textarea[name^=" + tabId + "]";

        if (
            !$("#" + tabId + " .js-profile-edit-form")
                .parent()
                .hasClass("uk-hidden")
        ) {
            $(this)
                .parent()
                .addClass("uk-hidden");
            $cancel.removeClass("uk-hidden");
            $formAction.removeClass("uk-hidden");
        }

        $('#logoCriteria').toggleClass('uk-hidden');
        $('#aboutSellerSampleButton')
            .toggleClass('uk-hidden')
            .on('click', function () {
                UIkit.modal('#aboutSellerSampleModal').show();
                $('.js-sample-modal-close')
                    .on('click', function () {
                        UIkit.modal('#aboutSellerSampleModal').hide();
                    })
            });

        $($tabInfo)
            .find(elementName)
            .each(function () {
                
                let that = $(this);
                let accessElem = $(this).data("noAccess");
                let beDisable = false;
                if (accessElem) {
                    let condition = profileUtils.objectify(accessElem);

                    Object.entries(condition).some(function (entry) {
                        if (entry[0].indexOf(".") > -1) {
                            let splitKey = entry[0].split(".");
                            entry[1] == 'true' ? entry[1] = entry[1] === 'true' : '';
                            (ProfileAction.currentSectionData.data[splitKey[0]] && ProfileAction.currentSectionData.data[splitKey[0]][splitKey[1]]
                                && ProfileAction.currentSectionData.data[splitKey[0]][splitKey[1]] == entry[1]) ?
                                (beDisable = true) : "";
                        } else {
                            (entry[0] === "disable" && entry[1] == "true") ||
                            (ProfileAction.currentSectionData.data[entry[0]]
                                && ProfileAction.currentSectionData.data[entry[0]] == entry[1]) ?
                                (beDisable = true) : "";

                        }
                    });
                }

                if ((that.attr("readonly") || that.attr("disabled")) && !beDisable) {
                    that.attr("readonly", false);
                    that.removeAttr("disabled");
                }
            });

        if (tabId === 'docUpload') {
            $(".js-profile-docUpload-select-type option:selected").prop('disabled', false);
        }
    },

    formReadMode: function (e, tabId, tabClone) {
        if (!tabClone) {
            return;
        }

        e && e.preventDefault();
        let $cancel = $(".js-profile-cancel-edit-form");
        let $formAction = $(".js-profile-form-action");
        let $editAction = $(".js-profile-edit-form");
        $cancel.addClass("uk-hidden");
        $cancel.siblings($editAction).removeClass("uk-hidden");
        $formAction.addClass("uk-hidden");
        $("#" + tabId).empty();
        tabClone.appendTo($("#" + tabId));
        profileUtils.setter.tabClone = $("#" + tabId).children().clone();
    },

    formGatherData: function (e, tabId, elem, cb) {
        e.preventDefault();
        if ($("#" + tabId).find('.c-ui-input.has-error').length > 0) {
            window.UIkit.notification("لطفا خطاهای فیلد ها را برطرف نمایید.", {
                status: "danger",
                pos: "bottom-right",
                timeout: 5000
            });
            return;
        }

        var hasEnteredWrongPostalCode = false;
        $("input[name^='contactInfo[warehouses.postal_code']").each(function () {
            if ( Services.convertToEnDigit($(this).val()) === '0000000000' )
                hasEnteredWrongPostalCode = true;
        });
        if ( hasEnteredWrongPostalCode ) {
            window.UIkit.notification("لطفا کد پستی صحیح را وارد نمایید.", {
                status: "danger",
                pos: "bottom-right",
                timeout: 5000
            });
            return;
        }

        const $elem = elem || $("#" + tabId);
        const elementName = "textarea[name^=" + tabId + "]:not([readonly]) , input[name^=" + tabId + "]:not([readonly]:checked) , select[name^=" + tabId + "]:not(:disabled)";
        const fileNameRegex = /[^[]+(?=])/;
        let model = {};

        $($elem)
            .find(elementName)
            .each(function () {
                let that = $(this);
                let key = fileNameRegex.test(that.attr("name")) && fileNameRegex.exec(that.attr("name"))[0];

                let id;
                $(this).attr("type") === "checkbox" ? $(this).val($(this).is(":checked")) : "";

                if (($(this).attr("type") === "radio" && $(this).is(":checked")) || ($(this).attr("type") !== "radio")) {
                    if (key.indexOf("#") > -1) {
                        let splitIndex = key.split("#");
                        key = splitIndex[0];
                        id = splitIndex[1];
                    }
                    if (key.indexOf(".") > -1) {
                        let splitKey = key.split(".");
                        if (splitKey[0] in ProfileAction.currentSectionData.data) {
                            !ProfileAction.currentSectionData.data[splitKey[0]] ? ProfileAction.currentSectionData.data[splitKey[0]] = {} : ''
                            id ? (ProfileAction.currentSectionData.data[splitKey[0]][id][splitKey[1]] = $(this).val()) : ((ProfileAction.currentSectionData.data[splitKey[0]][splitKey[1]] = $(this).val()));
                        } else {
                            if (id) {
                                model[splitKey[0]], model[splitKey[0]][id], (model[splitKey[0]][id][splitKey[1]] = $(this).val());
                            } else {
                                model[splitKey[0]], (model[splitKey[0]][splitKey[1]] = $(this).val());
                            }
                        }
                    } else {
                        if (key in ProfileAction.currentSectionData.data) {
                            ProfileAction.currentSectionData.data[key] = $(this).val();
                        } else {
                            model[key] = $(this).val();
                        }
                    }
                }
            });
        cb && cb(model);
    },

    visibilityFormHook: function (contentName, formElement , model) {
        var self = this;
        $(`#${contentName} ${formElement}, ${formElement}`)
            .find("*[data-show],*[data-hide]")
            .each(function() {
                let elem = $(this).data("show") || $(this).data("hide");
                let condition = profileUtils.objectify(elem);
                let beHide = true;
                let myCondition = Object.entries(condition);
                let myModel = model || self.currentSectionData.data
                if ($(this).data("show")) {
                    myCondition.some(function(entry) {
                        if (entry[0].indexOf(".") > -1) {
                            let keys = entry[0].split(".");
                            let v = myModel[keys.shift()];
                            for (var yy = 0, ll = keys.length; yy < ll; yy++) v = v && v[keys[yy]];
                            v >= entry[1] ? (beHide = false) : "";
                        } else {
                            ((entry[1] == "true" || entry[1] == "false") && myModel[entry[0]]) || (myModel[entry[0]] && myModel[entry[0]] == entry[1]) ? (beHide = false) : "";
                        }
                    });
                    beHide ? $(this).hide() : "";
                } else {
                    for (var i in myCondition) {
                        if (!myModel[myCondition[i][0]].toString() || myModel[myCondition[i][0]].toString() != myCondition[i][1]) {
                            beHide = false;
                            break;
                        }
                    }
                    beHide ? $(this).hide() : "";
                }
            });
    },

    initSelectedPage: function() {
        const navBar = $(".js-profile-navbar");
        const profileContent = $(".js-profile-content");
        const contentHashName = location.hash.split("#")[1];
        const self = this;
        const citiesArray = window.cities;
        let tabClone = {};
        tabClone["businessInfo"] = $("#businessInfo")
            .children()
            .clone(true, true);
        tabClone["bankInfo"] = $("#bankInfo")
            .children()
            .clone(true, true);
        tabClone["contactInfo"] = $("#contactInfo").clone(true, true);
        tabClone["contractInfo"] = $("#contractInfo").clone(true, true);
        tabClone["docUpload"] = $("#docUpload").clone(true, true);
        tabClone["workCalendar"] = $("#workCalendar").clone(true, true);
        // $(".js-profile-select")
        // .select2()
        // .data('select2')
        // .$dropdown.addClass('c-ui-select__dropdown');
        let tabsHistory;
        // let currentSection = {}
        if (contentHashName) {
            goToSection(contentHashName);
        } else {
            goToSection(self.tabInfo.name);
        }

        navBar.on("click", goToSection);

        $(".js-profile-content").on("click", ".js-profile-contract-again-review", self.initContractDetailsForm.bind(self));

        function goToSection(name) {
            self.tabInfo.name = name;
            let contentName = $(this).data("content") || name;
            if (tabsHistory !== contentName) {
                self.formReadMode("", tabsHistory, tabClone[tabsHistory]);
            } 
            tabsHistory = contentName;
            navBar.each(function() {
                let $that = $(this);
                if ($(this).data("content") === contentName) {
                    profileUtils.useSpinner(true, "js-profile-content-spinner");
                    switch (contentName) {
                        case "businessInfo": {
                            tabClone[contentName] = $("#" + contentName)
                                .children()
                                .clone(true, true);

                            self.getSellerDataPage(function(cb) {
                                profileUtils.useSpinner(false, "js-profile-page");
                                self.currentSectionData = cb;
                                let vatModel = {};

                                if (isModuleActive('marketplace_profile_description_and_logo_changes')) {
                                    if (self.currentSectionData.data.seller_page) {
                                        self.currentSectionData.data.sellerPageDescriptionStatus = self.currentSectionData.data.seller_page.description_status;
                                        self.currentSectionData.data.sellerPageLogoStatus = self.currentSectionData.data.seller_page.logo_status;
                                    }
                                }
                                self.visibilityFormHook(contentName, ".js-profile-business-info-form-section");
                                let formScope = $("#" + contentName + " .js-profile-business-info-form-section").html();
                                self.currentSectionData.data.birthDate ? (self.currentSectionData.data.birthDate = new persianDate(new Date(self.currentSectionData.data.birthDate)).format("YYYY/MM/DD")) : "";
                                self.currentSectionData.data.subjectedToVatDocument ? (self.currentSectionData.data.subjectedToVatDocument.expireDateMain = new persianDate(new Date(self.currentSectionData.data.subjectedToVatDocument.expireDate)).format("YYYY/MM/DD")) : "";
                                self.currentSectionData.data.subjectedToVatDocument && self.currentSectionData.data.subjectedToVatDocument.expireDate == "2071-03-21" ? self.currentSectionData.data.subjectedToVatDocument.expireDate = '' : ''
                                self.currentSectionData.data.subjectedToVatDocument && self.currentSectionData.data.subjectedToVatDocument.expireDate ? (self.currentSectionData.data.subjectedToVatDocument.expireDate = new persianDate(new Date(self.currentSectionData.data.subjectedToVatDocument.expireDate)).format("YYYY/MM/DD")) : "";

                                $("#" + contentName + " .js-profile-business-info-form-section").empty();
                                $("#" + contentName + " .js-profile-business-info-form-section").append(profileUtils.etta(formScope, self.currentSectionData.data, 0));
                                self.currentSectionData.data.logo ? $("#" + contentName + " .js-profile-business-info-logo-preview").removeClass("uk-hidden").attr("src", self.currentSectionData.data.logo) : "";
                              
                                self.currentSectionData.data.subjectedToVatDocument && self.currentSectionData.data.subjectedToVatDocument.isExpireAtUnlimited ? $("#" + contentName + " .js-unlimited-expiration-date").attr("checked" , true) : "";
                                if(self.currentSectionData.data.subjectedToVatDocument && self.currentSectionData.data.subjectedToVatDocument.image) {
                                    $("#" + contentName + " .js-profile-business-info-vat-logo-preview").removeClass("uk-hidden")
                                    $("#" + contentName + " .js-profile-business-info-vat-logo-preview").attr("src", self.currentSectionData.data.subjectedToVatDocument.image)
                                } 
                                self.currentSectionData.data.subjectedToVatDocument
                                    ? $("#" + contentName + " .js-profile-business-info-vat-logo")
                                          .parent()
                                          .hide()
                                    : "";
                                if (isModuleActive('marketplace_profile_description_and_logo_changes')) {
                                    if (self.currentSectionData.data.seller_page) {
                                        self.currentSectionData.data.seller_page.logo
                                            ? $("#" + contentName + " .js-profile-business-info-logo")
                                                .parent()
                                                .hide()
                                            : $("#" + contentName + " .js-profile-business-info-logo-preview").addClass("uk-hidden");
                                    }
                                } else {
                                    self.currentSectionData.data.logo
                                        ? $("#" + contentName + " .js-profile-business-info-logo")
                                            .parent()
                                            .hide()
                                        : $("#" + contentName + " .js-profile-business-info-logo-preview").addClass("uk-hidden");
                                }
                                $(".js-profile-business-info-vat-select")
                                    .select2({
                                        minimumResultsForSearch: Infinity,
                                        data: [
                                            { id: 1, text: "بله" },
                                            { id: 2, text: "خیر" }
                                        ]
                                    })
                                    .val(self.currentSectionData.data.isSubjectedToVat ? 1 : 2)
                                    .trigger("change");

                                    //TODO: fix this shit by better solution
                                    setTimeout(function() {
                                        $(".js-profile-business-info-vat-select[data-active=false]").attr('disabled', 'disabled');
                                    }, 300);

                                    $(".js-profile-business-info-gender-select")
                                    .select2({
                                        minimumResultsForSearch: Infinity,
                                        data: [
                                            { id: "male", text: "مرد" },
                                            { id: "female", text: "زن" }
                                        ]
                                    })
                                    .val(self.currentSectionData.data.gender)
                                    .trigger("change");

                                    if(isModuleActive("new_economic_profile")) {
                                        var options = [];
                                        $.each(self.currentSectionData.data.companyTypes, function (index, item) {
                                            var option = {id: index, text: item};
                                            options.push(option);
                                        });
                                        $(".js-profile-business-company-type-select")
                                            .select2({
                                                minimumResultsForSearch: Infinity,
                                                data: options
                                            })
                                            .val(self.currentSectionData.data.companyType)
                                            .trigger("change");
                                    }

                                    if(!ProfileAction.currentSectionData.data.isBankAccountOwnerNameValid) {
                                        window.UIkit.notification("توجه کنید نام و نام خانوادگی در اطلاعات فروشنده باید با شماره شبا در بخش اطلاعات بانکی همخوانی داشته باشد.", {
                                            status: "danger",
                                            pos: "bottom-right",
                                            timeout: 5000
                                        });
                                    }
                                delete ProfileAction.currentSectionData.data.id 
                                
                                let docScope = $("#" + contentName + " .js-profile-business-info-docs-section").html();
                                $("#" + contentName + " .js-profile-business-info-docs-section").empty();
                                $.each(self.currentSectionData.data.documents, function(index, docs) {
                                    $("#" + contentName + " .js-profile-business-info-docs-section").append(profileUtils.etta(docScope, docs, index));
                                    docs.image ? $("#" + contentName + " .js-profile-info-docs-images-" + index).attr("src", docs.image) : "";
                                    self.visibilityFormHook(contentName,".js-profile-business-info-docs-section div[data-index='" + index + "']",docs);
                                   
                                });
                                profileUtils.setter.tabClone = $("#" + contentName)
                                    .children()
                                    .clone();

                                $("#" + contentName).on("click", ".js-profile-edit-form", function(e) {
                                    if (isModuleActive('marketplace_profile_description_and_logo_changes')) {
                                        $('textarea[name="businessInfo[sellerPageDescription]"]').trigger('input');
                                        $('.js-letter-count').parent('').removeClass('uk-hidden');
                                    }

                                    $("#" + contentName + " .js-profile-business-info-logo-preview").siblings().css("cursor","pointer");
                                    $("#" + contentName + " .js-profile-business-info-logo-preview").siblings().css("background-color","#4fcce9");
                                    $("#" + contentName + " .js-profile-business-info-logo-preview").siblings().css("color","#ffffff");
                                    $("#" + contentName + " .js-profile-business-info-logo-preview").siblings().css("box-shadow","0 6px 12px 0 rgba(79, 204, 233, 0.2)");

                                    $(".js-profile-business-info-vat-select")
                                    .select2("destroy")
                                    .select2({
                                        minimumResultsForSearch: Infinity,
                                        data: [
                                            { id: 1, text: "بلی" },
                                            { id: 2, text: "خیر" }
                                        ]
                                    })
                                    .val(self.currentSectionData.data.isSubjectedToVat ? 1 : 2)
                                    .trigger("change");

                                    //TODO: fix this shit by better solution
                                    setTimeout(function() {
                                        $(".js-profile-business-info-vat-select[data-active=false]").attr('disabled', 'disabled');
                                    }, 300);


                                    self.destroySelect2(contentName,".js-profile-business-info-vat-select")
                                    $("#" + contentName + " .js-profile-business-info-gender-select")
                                    .select2({
                                        minimumResultsForSearch: Infinity,
                                        data: [
                                            { id: "male", text: "مرد" },
                                            { id: "female", text: "زن" }
                                        ]
                                    })
                                    .val(self.currentSectionData.data.gender)
                                    .trigger("change");

                                    if(isModuleActive("new_economic_profile")) {
                                        $("#" + contentName + " .js-profile-business-company-type-select")
                                            .select2({
                                                minimumResultsForSearch: Infinity,
                                            })
                                            .val(self.currentSectionData.data.companyType)
                                            .trigger("change");
                                    }

                                    self.destroySelect2(contentName,".js-profile-business-info-gender-select")
                                    if(isModuleActive("new_economic_profile")) {
                                        self.destroySelect2(contentName, ".js-profile-business-company-type-select");
                                    }
                                    // $("#businessInfo .select2-container--disabled").remove()
                                    self.initDatePicker(".js-profile-business-info-vat-date");
                                    self.initDatePicker(".js-profile-business-info-birth-date");
                                    self.uploadDocument(contentName, ".js-profile-business-info-logo", "#logo-upload-input" , ".js-profile-business-info-logo-preview" , "js-profile-content-spinner");
                                    self.uploadDocument(contentName, ".js-profile-business-info-vat-logo", "#vat-upload-input" , ".js-profile-business-info-vat-logo-preview" , "js-profile-content-spinner");

                                    self.formEditMode.apply(this, [e, contentName]);
                                    if (self.currentSectionData.data.isVerifiedByHoda === true) {
                                        $('input[name="businessInfo[firstName]"]').attr('readonly', true);
                                        $('input[name="businessInfo[lastName]"]').attr('readonly', true);
                                        $('input[name="businessInfo[birthDate]"]').attr('readonly', true);
                                        $('input[name="businessInfo[nationalIdentityNumber]"]').attr('readonly', true);
                                    }
                                });
                                $("#" + contentName).on("input", "#seller-business-name", function(e) {
                                    $('div[data-show="{sellerType:business}"]').find('#seller-business-name').val($(this).val());
                                });

                                $("#" + contentName).on("click", ".js-profile-cancel-edit-form", function(e) {
                                    $("#" + contentName + " .js-profile-business-info-logo-preview").siblings().css("cursor","default");
                                    $("#" + contentName + " .js-profile-business-info-logo-preview").siblings().css("background-color","#ffffff");
                                    $("#" + contentName + " .js-profile-business-info-logo-preview").siblings().css("color","#4fcce9");
                                    
                                    self.formReadMode(e, contentName, profileUtils.setter.getTabClone);
                                });
                                $("#" + contentName).on("click", ".js-profile-submit-changes", function(e) {
                                    e.stopImmediatePropagation();
                                    e.preventDefault();

                                    self.formGatherData(e, contentName, '', function(params) {
                                        params.logoImageId ? self.currentSectionData.data.logoImageId = params.logoImageId : ''
                                        if (isModuleActive('marketplace_profile_description_and_logo_changes')) {
                                            self.currentSectionData.data.sellerPageDescription = params.sellerPageDescription;
                                            self.currentSectionData.data.logoInput = params.logoInput;
                                        }
                                        self.submitSellerData(vatModel,params, function() {
                                            self.formReadMode(e, contentName, tabClone[contentName]);
                                            goToSection("businessInfo");
                                        });
                                    });
                                });

                                $("#" + contentName).on("change", ".js-profile-business-info-vat-select", function(e) {
                                    vatModel.document_id = $(this).val() == 1 ? 18 : self.currentSectionData.data.sellerType == "business" ? 20 : "";

                                    if($(this).val() == true) {
                                        if(self.currentSectionData.data.sellerType == "business") {
                                            $(this).parent().parent().siblings(":first").show();
                                        }
                                        $(this).parent().parent().siblings().each(function() {
                                            $(this)
                                           .children(":first")
                                           .show();
                                           })
                                    } else if(self.currentSectionData.data.sellerType == "business") {
                                        $(this).parent().parent().siblings(":first").hide();
                                    } else {
                                        $(this).parent().parent().siblings().each(function() {
                                         $(this)
                                        .children(":first")
                                        .hide();
                                        })
                                    }
                                   
                                    vatModel.document_id == 20
                                    ? $("#" + contentName + " .js-unlimited-expiration-date")
                                    .parent()
                                    .hide()
                                    : $("#" + contentName + " .js-unlimited-expiration-date")
                                    .parent()
                                    .show();
                                    !vatModel.document_id ? vatModel = {} : ''
                                });
                                $("#" + contentName).on("change",".js-unlimited-expiration-date", function(e) {
                                    e.stopImmediatePropagation()
                                    e.preventDefault()
                                    if ($(this).is(":checked")) {
                                        $(this).val(true);
                                        $(".js-profile-business-info-vat-date").attr("disabled", true);
                                        $(".js-profile-business-info-vat-date").val("");
                                    } else {
                                        $(".js-profile-business-info-vat-date").attr("disabled", false);
                                        $(".js-profile-business-info-vat-date").attr("readonly", false);
                                    }
                                });

                                $(".js-enroll-training").on("click", function() {

                                    UIkit.modal("#training-enrollment").show();
                                    let days = self.currentSectionData.data.trainingValidTimes.days.webinar
                                    let hours = self.currentSectionData.data.trainingValidTimes.hours.webinar
                                    daysArr = []
                                    $.each(days,function(id,item) {
                                        daysArr.push({
                                            id: id,
                                            text: item
                                        })

                                    })
                                    $("#training-enrollment"+ " .js-profile-business-training-day")
                                    .select2({
                                        placeholder: "انتخاب",
                                        data: daysArr
                                    })
                                    .data("select2")
                                    .$dropdown.addClass("c-ui-select__dropdown");

                                      $("#training-enrollment"+ " .js-profile-business-training-hour")
                                    .select2({
                                        placeholder: "انتخاب",
                                    })
                                    .data("select2")
                                    .$dropdown.addClass("c-ui-select__dropdown");


                                    $(".js-final-training-enrollment").on("click", function(e) {
                                        e.preventDefault();
                                        self.formGatherData(e, contentName, "#training-enrollment", function(params) {
                                            self.enrollTraining(params, function() {
                                                UIkit.modal("#training-enrollment").hide();
                                                self.formReadMode(e, contentName, tabClone[contentName]);
                                                goToSection("businessInfo");
                                            });
                                           
                                        });
                                    });
                                    $("#training-enrollment").on("change", ".js-profile-business-training-day", function(e) {
                                        e.preventDefault();
                                        let id = $(this).val();
                                        selectHours($(`.js-profile-business-training-hour`), hours[id]);
                                    });
                                });

                            
                                

                                self.uploadDocument(contentName, ".js-profile-business-info-vat-logo", "#vat-upload-input" , ".js-profile-business-info-vat-logo-preview" , "js-profile-content-spinner");

                               
                                $("#" + contentName).on("click",".js-profile-business-info-vat-logo-preview",function() {
                                    
                                    $(".js-profile-business-info-vat-logo").trigger("click");
                                });

                                
                                self.uploadDocument(contentName, ".js-profile-business-info-logo", "#logo-upload-input" , ".js-profile-business-info-logo-preview" , "js-profile-content-spinner");
                                
                                $("#" + contentName).on("click" , ".js-profile-business-info-logo-preview" ,function() {
                                    $(".js-profile-business-info-logo").trigger("click");
                                });

                               
            
                                $("#profile-form").validate(self.getValidationObject(contentName))

                               
                                self.initDatePicker(".js-profile-business-info-birth-date");
                                self.initDatePicker(".js-profile-business-info-vat-date");
                                $that.css( 'pointer-events', 'none' );
                                $that.children("div").show();
                                $that.children('a').css('cssText', 'color:  #62666d !important');
                            });
                            break;
                        }
                        case "bankInfo": {
                            tabClone[contentName] = $("#" + contentName)
                                .children()
                                .clone(true, true);
                                
                                self.getBankInfo(function(cb) {
                                profileUtils.useSpinner(false, "js-profile-page");
                                let elementScope = $("#" + contentName + " .js-profile-bank-info-form").html();
                                let ibanModal = $("#approve-bank-info .js-profile-bank-info-iban").html();

                                $("#" + contentName + " .js-profile-bank-info-form").empty();
                                self.currentSectionData = cb;
                                $("#" + contentName + " .js-profile-bank-info-form").append(profileUtils.etta(elementScope, self.currentSectionData.data, 0));
                                self.currentSectionData.data.isVerified ? $(".js-vrified-sheba-num").removeClass("uk-hidden") : ''
                                self.currentSectionData.data.status == "new" ? $(".js-new-sheba-num").removeClass("uk-hidden") : ''
                                self.currentSectionData.data.status == "rejected" ? $(".js-conflict-sheba-num").removeClass("uk-hidden") : ''
                                
                                
                                profileUtils.setter.tabClone = $("#" + contentName)
                                    .children()
                                    .clone();
                                $("#" + contentName).on("click", ".js-profile-edit-form", function(e) {
                                    self.formEditMode.apply(this, [e, contentName]);
                                });
                                

                                $("#" + contentName).on("click", ".js-profile-cancel-edit-form", function(e) {
                                    self.formReadMode(e, contentName, profileUtils.setter.getTabClone);
                                });

                                $("#" + contentName).on("click", ".js-profile-submit-changes", function(e) {
                                    e.stopImmediatePropagation();
                                    e.preventDefault();
                                    profileUtils.useSpinner(true, "js-profile-content-spinner");
                                    e.preventDefault();

                                    
                                    self.formGatherData(e, contentName, '', function(params) {
                                       
                                        params.shabaNumber ? self.currentSectionData.data.shabaNumber = params.shabaNumber : '' 

                                        
                                    });
                                    self.checkBankInfo("check_iban", self.currentSectionData.data.shabaNumber,function (type,data) {
                                       if(data.status) {
                                           if(type == "check_iban") {
                                            profileUtils.useSpinner(false, "js-profile-content");

                                            $("#approve-bank-info .js-profile-bank-info-iban").empty();
                                            $("#approve-bank-info .js-profile-bank-info-iban").append(profileUtils.etta(ibanModal, data.data, 0))
                                               UIkit.modal("#approve-bank-info").show();
                                            } else {
                                                UIkit.modal("#js-profile-bank-info-save-iban").show();
                                                self.formReadMode(e, contentName, tabClone[contentName]);
                                                goToSection(contentName);
                                           }

                                       } else {
                                        profileUtils.useSpinner(false, "js-profile-content");
                                        switch (data.data && data.data.iban) {
                                            case "bankAccount.validation.error.invalid.accountOwner": {
                                                $(".js-conflict-sheba-num").removeClass("uk-hidden");
                                                $(".js-conflict-sheba-num")
                                                    .siblings()
                                                    .addClass("uk-hidden");
                                            }
                                            case "bankAccount.validation.error.invalid.iban": {
                                                $(".js-invalid-sheba-num").removeClass("uk-hidden");
                                                $(".js-invalid-sheba-num")
                                                    .siblings()
                                                    .addClass("uk-hidden");
                                            }
                                            case "bankAccount.validation.error.iban.not.verified": {
                                                $(".js-invalid-sheba-num").removeClass("uk-hidden");
                                                $(".js-invalid-sheba-num")
                                                    .siblings()
                                                    .addClass("uk-hidden");
                                            }
                                        }
                                       }
                                    }) 

                                    $("#approve-bank-info").on("click" , ".js-profile-bank-info-iban-verify" , function(e) {
                                    e.stopImmediatePropagation();
                                    e.preventDefault();
                                    profileUtils.useSpinner(true, "js-profile-content-spinner");
                                    self.checkBankInfo("verify_iban", self.currentSectionData.data.shabaNumber,function (type,data) {
                                      if(data.status) {
                                        UIkit.modal("#approve-bank-info").hide();
                                        UIkit.modal("#js-profile-bank-info-save-iban").show();
                                        self.formReadMode(e, contentName, tabClone[contentName]);
                                        goToSection(contentName);
                                      } else {
                                        profileUtils.useSpinner(false, "js-profile-content");

                                      }
                                    })

                                    })
                                    
                                    
                                });
                                self.initInputMask();
                                let validator = $("#profile-form").validate(self.getValidationObject(contentName))

                                $that.css( 'pointer-events', 'none' );
                                $that.children("div").show();
                                $that.children('a').css('cssText', 'color:  #62666d !important');
                                // self.initEditBankCard();
                            });
                            break;
                        }
                        case "contactInfo": {
                            tabClone[contentName] = $("#" + contentName)
                                .children()
                                .clone(true, true);
                                self.getWarehouseDataPage(function(cb) {
                                    profileUtils.useSpinner(false, "js-profile-page");
                                    
                                    self.currentSectionData = cb;
                                    
                                let validator;
                                let warehouseFormScope = `#${contentName} .js-profile-warehouse-form`;
                                let contactFormScope = `#${contentName} .js-profile-contact-form`;
                                let warehouseReturnButtonClass = "js-profile-warehouse-retrun-button";
    
                                !profileUtils.setter.getWarehousesTable ? (profileUtils.setter.warehousesForm = $(warehouseFormScope).html()) : "";
                                !profileUtils.setter.getContactTable ? (profileUtils.setter.contactForm = $(contactFormScope).html()) : "";
                                !profileUtils.setter.getContactDeleteModal ? (profileUtils.setter.contactDeleteModal = $("#" + contentName + " #profile-warehouse-delete").html()) : "";
                                self.visibilityFormHook(contentName, ".js-profile-contact-form");
                                if(self.currentSectionData.data.phone && self.currentSectionData.data.phone[0] == "0" && self.currentSectionData.data.phone.indexOf("-") < 0) {
                                    self.currentSectionData.data.phone = self.currentSectionData.data.phone.insert(3, "-");
                                }
                                $(contactFormScope).empty();
                                $(contactFormScope).append(profileUtils.etta(profileUtils.setter.getContactTable, self.currentSectionData.data, 0));
                                $(".js-profile-contact-state-select")
                                .select2()
                                .val(self.currentSectionData.data.address.state.id);

                            $(".js-profile-contact-state-select")
                                .select2()
                                .data("select2")
                                .$dropdown.addClass("c-ui-select__dropdown");
                            selectCity($(`.js-profile-contact-city-select`), self.currentSectionData.data.address.state.id);
                                $(warehouseFormScope).empty();
                                $.each(self.currentSectionData.data.warehouses, function(index, item) {
                                    item.row = index + 1;
                                    $(warehouseFormScope).append(profileUtils.etta(profileUtils.setter.getWarehousesTable, item, index));
                                    item.title ? $(`.js-profile-contact-warehouse-title-${index}`).text(item.title) : "";
                                    item.return_address === true ? $(`.${warehouseReturnButtonClass}-${index}`).attr("checked", true) : "";
                                    $(".js-profile-warehouse-state-select-" + index)
                                        .select2()
                                        .val(item.state.id);

                                    $(".js-profile-warehouse-state-select-" + index)
                                        .select2()
                                        .data("select2")
                                        .$dropdown.addClass("c-ui-select__dropdown");
                                    selectCity($(`.js-profile-warehouse-city-select-${index}`), item.state.id);
                                });

                               
                                profileUtils.setter.tabClone = $("#" + contentName)
                                    .children()
                                    .clone();


                                $("#" + contentName).on("click", ".js-profile-contact-form .js-profile-edit-form", function(e) {

                                if ( isModuleActive('marketplace_profile_user_location') ) {

                                    let $locationInput = $("#" + contentName).find(".js-profile-contact-form .js-coordinates-input ");
                                    let lat = self.currentSectionData.data.address.latitude;
                                    let lng = self.currentSectionData.data.address.longitude;
                                    let registerStatus = self.currentSectionData.data.registerStatus;
                                    if (!(Number(lat) || Number(lng)) && registerStatus == 'approved') {
                                        $locationInput.attr("readonly", false);
                                        $locationInput.attr("disabled", false);
                                    }
                                }

                                if(self.currentSectionData.data.seller_type == "business") {
                                    $(contactFormScope)
                                        .find(".js-profile-contact-address-tootip")
                                        .removeClass("uk-hidden")
                                    } 
                                    $(".js-profile-contact-state-select")
                                    .select2()
                                    .val(self.currentSectionData.data.address.state.id);
                                    self.destroySelect2(contentName,".js-profile-contact-state-select")
    
                                $(".js-profile-contact-state-select")
                                    .select2()
                                    .data("select2")
                                    .$dropdown.addClass("c-ui-select__dropdown");
                                    self.destroySelect2(contentName,".js-profile-contact-state-select")

                                selectCity($(`.js-profile-contact-city-select`), self.currentSectionData.data.address.state.id);
                                self.destroySelect2(contentName,`.js-profile-contact-city-select`)

                                $("#" + contentName).find(".js-warehouse-form .js-profile-edit-form").parent().hide()                                    
                                self.formEditMode.apply(this, [e, contentName,".js-profile-contact-form"]);
                                });
                                
                                
                                $("#" + contentName).on("click", ".js-profile-contact-address-change", function(e) {
                                    e.preventDefault();
                                    let href = $(this).attr("href");
                                    self.formReadMode(e, contentName, tabClone[contentName]);
                                    window.open(href,"_self");
                                    goToSection("docUpload");
                                    
                                });

                                $("#" + contentName).on("click", ".js-profile-contact-form .js-profile-cancel-edit-form", function(e) {
                                    $("#" + contentName).find(".js-warehouse-form .js-profile-edit-form").parent().show()
                                    
                                    self.formReadMode(e, contentName, profileUtils.setter.getTabClone);
                                });
    
                                $("#" + contentName).on("click", ".js-profile-contact-form .js-profile-submit-changes", function(e) {
                                    e.stopImmediatePropagation();
                                    e.preventDefault()
                                    self.formGatherData(e, contentName,'',function(params) {
                                       Object.assign(self.currentSectionData.data, params);
                                        self.submitContactData("update", "", function() {
                                            self.formReadMode(e, contentName, tabClone[contentName]);
                                            goToSection("contactInfo");
                                        });
                                    });
                                });

                                $("#" + contentName).on("click", ".js-warehouse-form .js-profile-edit-form", function(e) {
                                    $("#" + contentName).find(".js-profile-contact-form .js-profile-edit-form").parent().hide()
                                    
                                    $("#" + contentName)
                                        .find(".js-profile-contact-warehouse-add")
                                        .parent()
                                        .show();

                                    $(warehouseFormScope)
                                        .find(".js-profile-delete-warehouse")
                                        .each(function() {
                                            $(this)
                                                .parent()
                                                .removeClass("uk-hidden");
                                        });
                                        
                                        $.each(self.currentSectionData.data.warehouses, function(index, item) {
                                            $(".js-profile-warehouse-state-select-" + index)
                                                .select2()
                                                .val(item.state.id);
        
                                            $(".js-profile-warehouse-state-select-" + index)
                                                .select2()
                                                .data("select2")
                                                .$dropdown.addClass("c-ui-select__dropdown");
                                                self.destroySelect2(contentName,".js-profile-warehouse-state-select-" + index)

                                            selectCity($(`.js-profile-warehouse-city-select-${index}`), item.state.id);
                                            self.destroySelect2(contentName,`.js-profile-warehouse-city-select-${index}`)

                                            
                                        });

                                    $("#profile-form").validate().destroy();
                                    $("#profile-form").validate(self.getValidationObject(contentName));

                                    self.formEditMode.apply(this, [e, contentName,".js-warehouse-form"]);
                                });

                                $("#" + contentName).on("click", ".js-warehouse-form .js-profile-cancel-edit-form", function(e) {
                                    $("#" + contentName).find(".js-profile-contact-form .js-profile-edit-form").parent().hide()
                                    if($(".js-warehouse-form").find("input").length != $(profileUtils.setter.getTabClone).find(".js-warehouse-form").find("input").length){
                                        self.formReadMode(e, contentName, tabClone[contentName]);
                                        goToSection("contactInfo");
                                    } else {
                                    $("#" + contentName)
                                        .find(".js-profile-contact-warehouse-add")
                                        .parent()
                                        .hide();
                                    $(warehouseFormScope)
                                        .find(".js-profile-delete-warehouse")
                                        .each(function() {
                                            $(this)
                                                .parent()
                                                .addClass("uk-hidden");
                                        });
                                        
                                        
                                    warehouseCount = $(profileUtils.setter.getTabClone).find('[data-contacts-validation]').length
                                    if(warehouseCount != self.currentSectionData.data.warehouses.length) {
                                        self.currentSectionData.data.warehouses.splice(warehouseCount);
                                    }
                                    self.formReadMode(e, contentName, profileUtils.setter.getTabClone);
                                }
                                });
                                $("#" + contentName).on("click", ".js-warehouse-form .js-profile-submit-changes", function(e) {
                                    e.stopImmediatePropagation();
                                    e.preventDefault();

                                    $("#profile-form").validate().destroy();
                                    $("#profile-form").validate(self.getValidationObject(contentName));
                                    $('#profile-form').valid();

                                    self.formGatherData(e, contentName , '' , function(params){
                                        self.submitWarhouseData("update", "", function(data) {
                                            if(data.status){
                                                self.formReadMode(e, contentName, tabClone[contentName]);
                                                goToSection("contactInfo");
                                            }
                                        });
                                    });
                                });
                                
                                $("#" + contentName).on("click", ".js-profile-delete-warehouse", function(e) {
                                    e.stopImmediatePropagation();
                                    e.preventDefault();
                                    let wareHouseRow = $(this).data("row");
                                    let name = { title: $(this).data("name") || `انبار شماره ${wareHouseRow}` };
                                    
                                    $("#profile-warehouse-delete").empty();
                                    $("#profile-warehouse-delete").append(profileUtils.etta(profileUtils.setter.getContactDeleteModal, name, 0));
                                   
                                    profileUtils.setter.cache = wareHouseRow
                                    UIkit.modal("#profile-warehouse-delete").show();
                                });
                                $(document).on("click","#profile-warehouse-delete .js-profile-delete-warehouse-btn",function(e) {
                                    e.stopImmediatePropagation();
                                    e.preventDefault();
                                    let wareHouseRow = profileUtils.setter.get
                                    let index = self.currentSectionData.data.warehouses.findIndex(wh => wh && wh.row == profileUtils.setter.get)
                                    let selectedWarehouse = $("#" + contentName + " .js-profile-warehouse-form").find(`[data-warehouse-id='${index}']`);
                                    if(self.currentSectionData.data.warehouses[index].id) {
                                    self.submitWarhouseData("delete", wareHouseRow, function(cb) {
                                        UIkit.modal("#profile-warehouse-delete").hide();
                                        if (cb.status) {
                                            selectedWarehouse.remove();
                                            delete self.currentSectionData.data.warehouses[index];
                                        }
                                    });
                                    } else {
                                        UIkit.modal("#profile-warehouse-delete").hide();
                                        // UIkit.modal("#profile-warehouse-delete").toggle();
                                        selectedWarehouse.remove();
                                        delete self.currentSectionData.data.warehouses[index];
                                    }
                                });
                                $("#" + contentName).on("click", ".js-profile-contact-warehouse-add:first", function(e) {
                                    e.stopImmediatePropagation();
                                    e.preventDefault();

                                    self.formGatherData(e, contentName , '' , function(params){
                                    ProfileAction.currentSectionData.data.warehouses = profileUtils.removeDuplicates(ProfileAction.currentSectionData.data.warehouses,"row");
                                       
                                    
                                    if(self.currentSectionData.data.warehouses.length > 0) {

                                        self.currentSectionData.data.warehouses.push(self.currentSectionData.data.warehouses[self.currentSectionData.data.warehouses.length - 1]);
                                    } else {
                                        self.currentSectionData.data.warehouses.push({
                                            seller_id: "",
                                            title: "",
                                            latitude: "",
                                            longitude: "",
                                            description: "",
                                            postal_code: "",
                                            address: "",
                                            city: "",
                                            state: "[]",
                                            return_address: "",
                                            phone: ""
                                        })
                                    }
                                    let warehouse = JSON.parse(JSON.stringify(self.currentSectionData.data.warehouses));
                                    Object.entries(warehouse[warehouse.length - 1]).forEach(function(item) {
                                        item[0] === "id" ? delete warehouse[warehouse.length - 1][item[0]] : (warehouse[warehouse.length - 1][item[0]] = "");
                                    });
                                    warehouse[warehouse.length - 1]["row"] = warehouse.length;
                                    self.currentSectionData.data.warehouses = warehouse;
                                    $(warehouseFormScope).empty();
                                    $.each(self.currentSectionData.data.warehouses, function(index, item) {
                                        item.row = index + 1;
                                        if(item.legal_coordinates) {
                                            item.latitude = item.legal_coordinates.split(";")[0]
                                            item.longitude = item.legal_coordinates.split(";")[1]
                                        }
                                        if(item.city_id){
                                            item.city = {};
                                            item.city.id = item.city_id
                                        } 
                                        $(warehouseFormScope).append(profileUtils.etta(profileUtils.setter.getWarehousesTable, item, index));
                                        item.title ? $(`.js-profile-contact-warehouse-title-${index}`).text(item.title) : "";
                                        let value = 'true';
                                        let returnAddress = value === item.return_address;
                                        returnAddress ? $(`.${warehouseReturnButtonClass}-${index}`).attr("checked", true) : "";
                                        $(".js-profile-warehouse-state-select-" + index)
                                            .select2()
                                            .val(item.state_id);
    
                                        $(".js-profile-warehouse-state-select-" + index)
                                            .select2()
                                            .data("select2")
                                            .$dropdown.addClass("c-ui-select__dropdown");
                                        selectCity($(`.js-profile-warehouse-city-select-${index}`), item.state_id);
                                        $(warehouseFormScope)
                                        .find(".js-profile-delete-warehouse")
                                        .each(function() {
                                            $(this)
                                                .parent()
                                                .removeClass("uk-hidden");
                                        });
                                        validator.destroy();
                                        validator = $("#profile-form").validate(self.getValidationObject(contentName))
                                        

                                        self.formEditMode.apply(this, [e, contentName,".js-warehouse-form"]);
                                    });
                                    });

                                });

                                $("#" + contentName).on("change", "select[class*='js-profile-warehouse-state-select-']", function(e) {
                                    e.preventDefault();
                                    let provinceCode = $(this).children("option:selected").data("code");
                                    let index = $(this).data("index");
                                    let stateId = $(this).val();
                                    self.inputMaskWarehousePhone(provinceCode,index);
                                    selectCity($(`.js-profile-warehouse-city-select-${index}`), stateId);
                                });
                                
                                
                                $("#" + contentName).on("change", "select[class*='js-profile-contact-state-select']", function(e) {
                                    e.preventDefault();
                                    let provinceCode = $(this).children("option:selected").data("code");
                                    let stateId = $(this).val();stateId
                                    self.inputMaskContactPhone(provinceCode);
                                    selectCity($(`.js-profile-contact-city-select`), stateId);
                                });
                                

                                validator = $("#profile-form").validate(self.getValidationObject(contentName))
                                Main.initOnlyDigits()
                                $that.css( 'pointer-events', 'none' );
                                $that.children("div").show();
                                $that.children('a').css('cssText', 'color:  #62666d !important');
                            });

                            break;
                        }
                        case "contractInfo": {
                            tabClone[contentName] = $("#" + contentName)
                                .children()
                                .clone(true, true);
                            self.getContractPage(function (cb) {
                                profileUtils.useSpinner(false, "js-profile-page");
                                let elementScope = $("#contractInfo").html();
                                $("#contractInfo").empty();
                                self.currentSectionData = cb;
                                self.currentSectionData.data.startDate = self.currentSectionData.data.startDate && new persianDate(new Date(self.currentSectionData.data.startDate)).format("DD MMMM YYYY");
                                self.currentSectionData.data.endDate = self.currentSectionData.data.endDate && new persianDate(new Date(self.currentSectionData.data.endDate)).format("DD MMMM YYYY");

                                $("#contractInfo").append(profileUtils.etta(elementScope, self.currentSectionData.data, 0));
                                self.currentSectionData.data.status === "confirmed" ? $(".js-profile-contract-again-review").addClass("hidden") : false;
                                $(".js-profile-contract-download").attr("href", self.currentSectionData.data.download_link);
                                if (cb.data.status === "confirmed") {
                                    $(".js-confirmed-contract").removeClass("uk-hidden");
                                } else {
                                    $(".js-rejected-contract").removeClass("uk-hidden");
                                }

                                $that.css('pointer-events', 'none');
                                $that.children("div").show();
                                $that.children('a').css('cssText', 'color:  #62666d !important');
                            });
                            break;
                        }

                        case 'docUpload': {
                            tabClone[contentName] = $("#" + contentName)
                                .children()
                                .clone(true, true);
                            let $tableBody = $('.js-doc-upload-body');
                            let $tableRow = $tableBody.html();
                            let selectType = $('.js-profile-docUpload-select-type');
                            let isInEditMode = false;
                            let docUploadModel = {};
                            const expireDateInput = $('.js-upload-date');

                            ProfileAction.getDocUpload(function (cb) {
                                renderUploadDocTab();

                                // Initialized after tab render
                                const tabElement = $("#" + contentName);

                                prepareEventsAndInputs();

                                // I don't know exactly what does it do.
                                profileUtils.setter.tabClone = tabElement
                                    .children()
                                    .clone();


                                ProfileAction.uploadDocument(
                                    contentName,
                                    ".js-profile-docUpload-upload",
                                    "#upload-input" ,
                                    ".js-profile-docUpload-preview" ,
                                    "js-profile-content-spinner"
                                );

                                // eslint-disable-next-line no-undef
                                Main.initOnlyDigits();
                                $that.css('pointer-events', 'none');
                                $that.children("div").show();
                                $that.children('a').css('cssText', 'color:  #62666d !important');


                                // Functions Section
                                function prepareEventsAndInputs()
                                {
                                    expireDateInput.persianDatepicker({
                                        initialValue: false,
                                        observer: true,
                                        format: "YYYY/MM/DD",
                                        autoClose: true,
                                        minDate: new persianDate().add("month", 1).valueOf(),
                                        onSelect: function () {
                                            $(this.model.inputElement);
                                        }
                                    });

                                    $(".js-unlimited-expiration-date").on("change", function () {
                                        if ($(this).is(":checked")) {
                                            $(this).val(true);
                                            expireDateInput.attr("disabled", true);
                                            expireDateInput.val("");
                                        } else {
                                            expireDateInput.attr("disabled", false);
                                        }
                                    });

                                    tabElement.on("click", ".js-profile-edit-form", function (e) {
                                        if (!isInEditMode) {
                                            isInEditMode = true;
                                            openUploadSection.call(this,e);
                                        }
                                    });

                                    tabElement.on("click", ".js-profile-cancel-edit-form", function (e) {
                                        if (isInEditMode) {
                                            isInEditMode = false;
                                            closeUploadSection.call(this,e);
                                        }
                                    });

                                    tabElement.on("click",".js-profile-docUpload-preview",function () {
                                        $(".js-profile-docUpload-upload").trigger("click");
                                    });

                                    tabElement
                                        .on("change", "select[class*='js-profile-doc-upload-state-select']", function () {
                                            let provinceCode = $(this).children("option:selected").data("code");
                                            let stateId = $(this).val();
                                            ProfileAction.inputMaskDocUploadPhone(provinceCode);
                                            selectCity($(`.js-profile-doc-upload-city-select`), stateId);
                                        });

                                    tabElement.on("click", ".js-profile-submit-changes", onSubmitChanges);
                                    tabElement.on("click", ".js-profile-docUpload-edit", onEditDocClick);
                                    tabElement.on("change", ".js-profile-docUpload-select-type", onDocTypeSelectChange);
                                }

                                function onEditDocClick(e)
                                {
                                    e.preventDefault();
                                    isInEditMode = true;
                                    const docUploadPreviewElement = $(".js-profile-docUpload-preview");
                                    let id = $(this).data("index");

                                    docUploadModel = self.currentSectionData.data.documents[id];
                                    let elementName = "input[name^=" + contentName + "],select[name^=" + contentName + "],textarea[name^=" + contentName + "]";
                                    let fileNameRegex = /[^[]+(?=])/;

                                    if (docUploadModel.unlimited) {
                                        tabElement.find(".js-unlimited-expiration-date").attr("checked",true)
                                        tabElement.find(".js-upload-date").attr("disabled", true);

                                    } else {
                                        tabElement.find(".js-unlimited-expiration-date").attr("checked",false)
                                        tabElement.find(".js-upload-date").attr("disabled", false);

                                    }
                                    docUploadModel["document_expires_at"] = docUploadModel["expires_at_persian"] !== 'نامحدود' ?
                                        Services.convertToFaDigit(docUploadModel["expires_at_persian"]) : '';

                                    tabElement
                                        .find(elementName)
                                        .each(function () {
                                            let key = fileNameRegex.test($(this).attr("name")) && fileNameRegex.exec($(this).attr("name"))[0];
                                            $(this).val(docUploadModel[key]);
                                        });
                                    $(".js-profile-docUpload-upload")
                                        .parent("label")
                                        .addClass("uk-hidden");
                                    docUploadPreviewElement.attr("src", docUploadModel["image_src"]);
                                    docUploadPreviewElement.removeClass("uk-hidden");
                                    openUploadSection.apply($("#" + contentName + " .js-profile-edit-form"),[e, docUploadModel.document_id,docUploadModel.unlimited]);
                                }

                                function onSubmitChanges(e)
                                {
                                    e.stopImmediatePropagation();
                                    e.preventDefault();

                                    ProfileAction.formGatherData(e, contentName, '', function (data) {
                                        let formattedDate;
                                        let integerFormattedDate = [];
                                        let regExSlash = /\d{4}[/]\d{2}[/]\d{2}/;

                                        Object.entries(data).forEach(function (entry) {
                                            docUploadModel[entry[0]] = entry[1];
                                        });

                                        docUploadModel.document_expires_at = docUploadModel.document_expires_at &&
                                            Services.convertToEnDigit(docUploadModel.document_expires_at);


                                        let expireDateIsNotGoodEnough = false;

                                        if (regExSlash.test(docUploadModel.document_expires_at)) {
                                            formattedDate = docUploadModel.document_expires_at.split("/");
                                            integerFormattedDate = [];
                                            $.each(formattedDate, function (index, item) {
                                                integerFormattedDate.push(+item);
                                            });

                                            // eslint-disable-next-line no-undef
                                            docUploadModel.document_expires_at = new persianDate(integerFormattedDate)
                                                .toCalendar("gregorian")
                                                .toLocale("en")
                                                .format("YYYY-MM-DD");
                                        }

                                        const dayInMilliseconds = (3600 * 24 * 1000);
                                        const remainingDaysToExpire = Math.ceil(
                                            (new Date(docUploadModel.document_expires_at) - new Date())
                                            / dayInMilliseconds
                                        );

                                        if (remainingDaysToExpire <= 30) {
                                            expireDateIsNotGoodEnough = true;
                                        }

                                        const expireInputContainer = expireDateInput
                                            .parents('.js-expire-input-container')
                                            .eq(0)
                                        ;
                                        const expireTextError = $('#expireTextError');

                                        if (expireDateIsNotGoodEnough && expireTextError.prop('id')) {
                                            expireInputContainer.addClass('c-profile-docs-upload-expire-date--has-error');
                                            expireTextError.removeClass('uk-hidden');
                                        } else {
                                            expireTextError.addClass('uk-hidden');
                                            expireInputContainer.removeClass('c-profile-docs-upload-expire-date--has-error');
                                            ProfileAction.submitDocumentData(docUploadModel,function () {
                                                ProfileAction.formReadMode(e, contentName, tabClone[contentName]);
                                                goToSection("docUpload");
                                            });
                                        }
                                    });
                                }

                                function onDocTypeSelectChange()
                                {
                                    if ( isModuleActive('profile_hide_expire_date_improvement') ) {
                                        var selectedItemValue = Number($(this).val());
                                        var hasExpireDate =  cb.data['document_types'].filter(function(item) {
                                            if ( Number(item.id) === selectedItemValue )
                                                return item;
                                        })[0]['has_expired_date'];

                                        if ( !hasExpireDate ) {
                                            $('.js-expire-date-wrapper').hide();
                                        } else {
                                            $('.js-expire-date-wrapper').show();
                                        }
                                    }

                                    let that = this;
                                    (!docUploadModel.id && !docUploadModel.image_src) ? docUploadModel = {} : '';
                                    $(".js-profile-docUpload-newpaper-section")
                                        .find("input,select")
                                        .each(function () {
                                            if ($(that).val() == 19) {
                                                $(this).attr("readonly", false);
                                                $(this).attr("disabled", false);
                                            } else {
                                                $(this).attr("disabled", true);
                                                $(this).attr("readonly", true);
                                            }
                                        });
                                    if ($(that).val() == 18) {
                                        $(".js-unlimited-expiration-date").attr("readonly", false);
                                        $(".js-unlimited-expiration-date")
                                            .parent()
                                            .fadeIn();
                                    } else {
                                        $(".js-unlimited-expiration-date").attr("readonly", true);
                                        $(".js-unlimited-expiration-date")
                                            .parent()
                                            .fadeOut();
                                    }

                                    if ($(this).val() == 19) {
                                        self.inputMaskDocUploadPhone();
                                        $(".js-profile-doc-upload-state-select")
                                            .select2()
                                            .data("select2")
                                            .$dropdown.addClass("c-ui-select__dropdown");
                                        selectCity($(`.js-profile-doc-upload-city-select`), 1);
                                        $("#" + contentName + " .js-profile-docUpload-newpaper-section").fadeIn();
                                    } else {
                                        $("#" + contentName + " .js-profile-docUpload-newpaper-section").fadeOut();
                                    }
                                }


                                function closeUploadSection(e)
                                {
                                    $(".js-upload-space").addClass("uk-hidden");
                                    selectType.select2("destroy");
                                    self.formReadMode(e, contentName, profileUtils.setter.getTabClone);
                                }

                                function openUploadSection(e, documentId,unlimited)
                                {
                                    e.preventDefault();
                                    const docsSelectElement = $("#" + contentName + " .js-profile-docUpload-select-type");

                                    ProfileAction.uploadDocument(
                                        contentName,
                                        ".js-profile-docUpload-upload",
                                        "#upload-input" ,
                                        ".js-profile-docUpload-preview",
                                        "js-profile-content-spinner"
                                    );

                                    expireDateInput.persianDatepicker({
                                        initialValue: false,
                                        observer: true,
                                        format: "YYYY/MM/DD",
                                        autoClose: true,
                                        minDate: new persianDate().add("day", 1).valueOf(),
                                        onSelect: function () {
                                            $(this.model.inputElement);
                                        }
                                    });

                                    ProfileAction.formEditMode.apply(this, [e, contentName]);
                                    unlimited ? $("#" + contentName).find(".js-upload-date").attr("disabled", true) : '';


                                    $(".js-upload-space").removeClass("uk-hidden");

                                    docsSelectElement
                                        .select2({
                                            placeholder: "انتخاب",
                                            data: self.currentSectionData.data.document_types
                                        })
                                        .data("select2")
                                        .$dropdown.addClass("c-ui-select__dropdown");
                                    documentId
                                        ? docsSelectElement
                                            .val(documentId)
                                            .trigger("change")
                                        : "";

                                    $.each(
                                        ProfileAction.currentSectionData.data.documents,
                                        function (index, item) {
                                            handleExistingDocsInSelect(index, item)
                                        }
                                    );

                                    docsSelectElement
                                        .select2(
                                            {
                                                placeholder: 'انتخاب',
                                                templateResult: formatSelectOptions,
                                            }
                                        )
                                        .data("select2")
                                        .$dropdown.addClass("c-ui-select__dropdown");
                                }

                                function formatSelectOptions(result)
                                {

                                    if (result.disabled) {
                                        return $(
                                            `<div class="uk-flex">
                                                ${result.text}
                                                <span class="c-profile-select2-existed-option">
                                                    موجود در لیست
                                                </span>
                                            </div>`
                                        );
                                    } else {
                                        return result.text
                                    }
                                }

                                function handleExistingDocsInSelect(index, item)
                                {
                                    $("#" + contentName + " .js-profile-docUpload-select-type option")
                                        .each(function (i, option) {

                                            if ($(option) && $(item) && !$(option).prop('selected')
                                                && $(option).val().toString() === item.document_id.toString()
                                                && (item.status_en === 'new' || item.status_en === 'rejected')
                                            ) {
                                                $(option).prop('disabled', true);
                                            }
                                        })
                                }

                                function renderUploadDocTab()
                                {
                                    profileUtils.useSpinner(false, "js-profile-page");
                                    ProfileAction.currentSectionData = cb;

                                    $tableBody.empty();
                                    $.each(ProfileAction.currentSectionData.data.documents, function (index, item) {
                                        item.row = index + 1;
                                        item && item.expires_at_persian === "1450/01/01" ? item.expires_at_persian = 'نامحدود' : '';
                                        $(".js-doc-upload-body").append(profileUtils.etta($tableRow, item, index));
                                        item.image_src ? $("#" + contentName + " .js-doc-upload-table-image-"+index).attr("src", item.image_src) : "";
                                        ProfileAction.visibilityFormHook(contentName,".js-doc-upload-body tr[data-index='" + index + "']",item);
                                    });
                                }
                            });
                            break;
                        }

                        case "workCalendar": {
                            tabClone[contentName] = $("#" + contentName)
                                .children()
                                .clone(true, true);
                            let tableElement = $(".js-profile-workCalendar-table").html();
                            let workdaysTableElement = $(".js-profile-workdays-table").html();
                            let addModalElement = $("#workCalendarAddModal").html();
                            let calenderHTML = $(".js-profile-workCalendar-calendar .js-workCalendar-top-info").html();
                            let calendarRow = $(".js-profile-workCalendar-calendar .js-calendar-days-row").html();

                            let selectedDate;

                            function getWorkCalendar(month, year, loader)
                            {
                                loader ? profileUtils.useSpinner(true, "js-profile-workCalendar-calendar") : "";
                                return self.getworkCalendar(
                                    function(cb) {
                                        self.currentSectionData = cb;
                                        let calendar = self.currentSectionData.data;
                                        fillCalendar(".js-profile-workCalendar-calendar", calenderHTML, calendarRow, calendar, contentName);
                                        self.initTooltips();
                                        loader ? profileUtils.useSpinner(false, "js-profile-workCalendar-calendar") : "";
                                    },
                                    month,
                                    year
                                );
                            }

                            function getSellerHolidays(type, tableElement, loader) {
                                loader ? profileUtils.useSpinner(true, "js-profile-workCalendar-table-section") : "";
                                $(".js-profile-workCalendar-table-view tbody").show();
                                $(".js-profile-workCalendar-table-empty-view").addClass("uk-hidden");
                                $(".js-profile-workCalendar-table-empty-view #message-ahead").hide();
                                $(".js-profile-workCalendar-table-empty-view #message-past").hide();
                                $(".js-profile-workCalendar-table-empty-view #message-deleted").hide();
                                return self.getSellerHoliday(function(holidaysData) {
                                    self.currentSectionData.holidaysData = holidaysData.data;
                                    if (self.currentSectionData.holidaysData.items.length > 0) {
                                        $(".js-profile-workCalendar-table").empty();
                                        $.each(self.currentSectionData.holidaysData.items, function(index, item) {
                                            item.count = self.currentSectionData.holidaysData.items.length;
                                            item.type = type;
                                            $(".js-profile-workCalendar-table").append(profileUtils.etta(tableElement, item, index));
                                            $(".js-profile-workCalendar-table-count").text((type === "ahead_holidays" ?  Services.convertToFaDigit(item.count) : ""));
                                            $(".js-calendar-table-count-label").text((type === "ahead_holidays" ?  "تعداد تعطیلات پیش رو" : ""));
                                            self.visibilityFormHook(contentName, ".js-profile-workCalendar-table",item);
                                        });
                                    } else {
                                        // clear holiday count label
                                        $(".js-profile-workCalendar-table-count").text((type === "ahead_holidays" ?  '۰' : ""));
                                        $(".js-calendar-table-count-label").text((type === "ahead_holidays" ?  "تعداد تعطیلات پیش رو" : ""));

                                        $(".js-profile-workCalendar-table-view tbody").hide();
                                        $(".js-profile-workCalendar-table-empty-view").removeClass("uk-hidden");
                                        type == "ahead_holidays" ? $(".js-profile-workCalendar-table-empty-view #message-ahead").show() : "";
                                        type == "past_holidays" ? $(".js-profile-workCalendar-table-empty-view #message-past").show() : "";
                                        type == "removed_holidays" ? $(".js-profile-workCalendar-table-empty-view #message-deleted").show() : "";
                                    }
                                    $(".js-profile-workCalendar-search-filter")
                                        .find("input[value='ahead_holidays']")
                                        .attr("checked", true);
                                    loader ? profileUtils.useSpinner(false, "js-profile-workCalendar-table-section") : "";
                                }, type);
                            }


                            function getSellerWorkDays(type, tableElement, loader) {
                                loader ? profileUtils.useSpinner(true, "js-profile-workdays-table-section") : "";
                                $(".js-profile-workdays-table-view tbody").show();
                                $(".js-profile-workdays-table-empty-view").addClass("uk-hidden");
                                $(".js-profile-workdays-table-empty-view #message-ahead").hide();
                                $(".js-profile-workdays-table-empty-view #message-past").hide();
                                $(".js-profile-workdays-table-empty-view #message-deleted").hide();
                                return self.getSellerWorkDays(function(workdays) {
                                    self.currentSectionData.workdaysData = workdays.data.items ? {items:workdays.data.items} :  { items: [] };
                                    console.log(self.currentSectionData.workdaysData)
                                    if (self.currentSectionData.workdaysData.items.length > 0) {
                                        $(".js-profile-workdays-table").empty();
                                        const shipmentTitleByType = {
                                            ship_by_seller: '(ارسال توسط فروشنده)',
                                            ship_by_digikala: '(ارسال توسط دیجیکالا)'
                                        };

                                        $.each(self.currentSectionData.workdaysData.items, function(index, item) {
                                            item.count = self.currentSectionData.workdaysData.items.length;
                                            item.shipment_type = item.type;
                                            item.type = type;
                                            item.date = `${Services.persianDate(item.date)} ${item.type ? shipmentTitleByType[item.shipment_type] : ''}`;
                                            $(".js-profile-workdays-table").append(profileUtils.etta(workdaysTableElement, item, index));
                                            $(".js-profile-workdays-table-count").text((type === "ahead_workdays" ?  Services.convertToFaDigit(item.count) : ""));
                                            $(".js-workdays-table-count-label").text((type === "ahead_workdays" ?  "تعداد روز کاری پیش رو" : ""));
                                        });
                                        type === "ahead_workdays" ? $('.js-profile-workCalendar-delete-workday').show() : $('.js-profile-workCalendar-delete-workday').hide();
                                    } else {
                                        // clear holiday count label
                                        $(".js-profile-workdays-table-count").text((type === "ahead_workdays" ?  '۰' : ""));
                                        $(".js-workdays-table-count-label").text((type === "ahead_workdays" ?  "تعداد روز کاری پیش رو" : ""));

                                        $(".js-profile-workdays-table-view tbody").hide();
                                        $(".js-profile-workdays-table-empty-view").removeClass("uk-hidden");
                                        type === "ahead_workdays" && $(".js-profile-workdays-table-empty-view #message-ahead").show();
                                        type === "past_workdays" && $(".js-profile-workdays-table-empty-view #message-past").show();
                                        type === "removed_workdays" && $(".js-profile-workdays-table-empty-view #message-deleted").show();
                                    }
                                    loader ? profileUtils.useSpinner(false, "js-profile-workdays-table-section") : "";
                                }, type);
                            }

                            if ( isModuleActive('marketplace_add_work_day')  ) {
                                $.when(
                                    getWorkCalendar(),
                                    (() => {
                                        if ( isModuleActive('marketplace_add_work_day_digikala') || ProfileAction.state.isSBSActive ) {
                                            getSellerWorkDays("ahead_workdays", workdaysTableElement);
                                        }
                                        return {};
                                    })(),
                                    getSellerHolidays("ahead_holidays", tableElement),
                                ).done(function(a1, a2) {
                                    if (a1 && a2) {
                                        setTimeout(function(){
                                            profileUtils.setter.tabClone = $("#" + contentName)
                                                .children()
                                                .clone();
                                        },5000)

                                        profileUtils.useSpinner(false, "js-profile-page");
                                        $that.css( 'pointer-events', 'none' );
                                        $that.children("div").show();
                                    }
                                });
                            } else {
                                $.when(
                                    getWorkCalendar(),
                                    getSellerHolidays("ahead_holidays", tableElement),
                                ).done(function(a1, a2) {
                                    if (a1 && a2) {
                                        setTimeout(function(){
                                            profileUtils.setter.tabClone = $("#" + contentName)
                                                .children()
                                                .clone();
                                        },5000)
                                        profileUtils.useSpinner(false, "js-profile-page");
                                        $that.css( 'pointer-events', 'none' );
                                        $that.children("div").show();
                                    }
                                });
                            }


                            $(".js-profile-workCalendar-search-button").on("click", function() {
                                let type = $(this).val();
                                getSellerHolidays(type, tableElement, true);
                            });

                            $(".js-profile-workdays-search-button").on("click", function() {
                                getSellerWorkDays($(this).val(), workdaysTableElement, true);
                            });

                            $("#" + contentName).on("click", ".js-calendar-add-holiday", function() {
                                selectedDate = $(this).data("date");
                                let addModel = {
                                    totalCount: ($(this).data("orders") && Services.convertToEnDigit($(this).data("orders"))) || 0,
                                    shipBySellerCount: ($(this).data("ship-by-seller") && Services.convertToEnDigit($(this).data("ship-by-seller"))) || 0,
                                    ShipByDigikalaCount: ($(this).data("ship-by-digikala") && Services.convertToEnDigit($(this).data("ship-by-digikala"))) || 0,
                                    today: new persianDate(new Date(selectedDate)).format("DD MMMM YYYY")
                                };

                                $("#workCalendarAddModal").empty();
                                $("#workCalendarAddModal").append(profileUtils.etta(addModalElement, addModel, 0));
                                self.visibilityFormHook(contentName, "#workCalendarAddModal",addModel);
                                UIkit.modal("#workCalendarAddModal").show();
                            });

                            $("#workCalendarAddModal").on("click", ".js-profile-agree-checkbox", function() {
                                if ($(this).is(":checked")) {
                                    $("#workCalendarAddModal .js-submit-modal").removeClass("c-RD-profile__approve-btn--disable");
                                } else {
                                    $("#workCalendarAddModal .js-submit-modal").addClass("c-RD-profile__approve-btn--disable");
                                }
                            });

                            $("#workCalendarAddModal").on("click", ".js-submit-modal", function(e) {
                                // disable button to prevent multiple clicks
                                $(this).prop('disabled', 'disabled');
                                $(this).addClass("c-RD-profile__approve-btn--disable");

                                e.stopImmediatePropagation();
                                e.preventDefault();
                                let isoDate = new persianDate(selectedDate)
                                    .toLocale("en")
                                    .toCalendar("gregorian")
                                    .format("YYYY-MM-DD");
                                let finalModel = {
                                    action: "add",
                                    dates: [isoDate]
                                };

                                self.sellerHolidayActions(finalModel, function() {
                                    var dateInfoElement = $('.js-calendar-current');
                                    getWorkCalendar(dateInfoElement.data('monthIndex'), dateInfoElement.data('year'), true);
                                    getSellerHolidays("ahead_holidays", tableElement, true);
                                    UIkit.modal("#workCalendarAddModal").hide();
                                });
                            });

                            $(document).on('change', '.js-workday-type', function () {
                                var checkedTypes = 0;
                                $(".js-workday-type").each(function () {
                                    if ( $(this).prop('checked') )
                                        checkedTypes++;
                                });
                                $( '.js-submit-add-workday').prop('disabled', !Boolean(checkedTypes));
                            });

                            $(document).on('click', '.js-submit-add-workday', function () {
                                const $btn = $(this);
                                $btn.attr('disabled', 'disabled');
                                const type = [];
                                $(".js-workday-type").each(function () {
                                    if ( $(this).prop('checked') )
                                        type.push($(this).val());
                                });
                                try {
                                    const reqData = {
                                        dates: [$(this).attr('data-date')],
                                        action: 'add_work_day',
                                        type: isModuleActive('marketplace_add_work_day_digikala') ? type : 'ship_by_seller',
                                    };
                                    Services.ajaxPOSTRequestJSON('/ajax/profile/new/update/seller-work-day-data/', reqData, function () {
                                        var dateInfoElement = $('.js-calendar-current');
                                        $btn.prop('disabled', false);
                                        getWorkCalendar(dateInfoElement.data('monthIndex'), dateInfoElement.data('year'), true);
                                        getSellerWorkDays("ahead_workdays", workdaysTableElement, true);
                                        UIkit.modal("#workCalendarAddWorkDayModal").hide();
                                    }, function (e) {
                                        $btn.prop('disabled', false);
                                        window.UIkit.notification(e.join('<br />'), {
                                            status: "danger",
                                            pos: "bottom-right",
                                            timeout: 8000
                                        });
                                    });
                                } catch (e) {
                                    $btn.prop('disabled', false);
                                    window.UIkit.notification('مشکلی در درخواست شما وجود دارد. لطفا مجددا تلاش نمایید', {
                                        status: "danger",
                                        pos: "bottom-right",
                                        timeout: 8000
                                    });
                                }
                            });

                            $("#" + contentName).on("click", ".js-calendar-add-workday", function() {
                                const $btn = $(this);
                                const selectedDate = new window.persianDate(new Date($btn.data('date'))).format("DD MMMM YYYY");
                                $('.js-selected-workday').text(selectedDate);
                                $('.js-submit-add-workday').attr('data-date', $btn.data('date'));
                                if ( isModuleActive('marketplace_add_work_day_digikala') ) {
                                    $(".js-workday-type").each(function () {
                                        if ( $(this).val() === $btn.attr('data-selected-shipment') ) {
                                            $(this).prop('disabled', true);
                                            $(this).prop('checked', false);
                                        } else {
                                            $(this).prop('disabled', false);
                                        }
                                    });
                                }
                                UIkit.modal("#workCalendarAddWorkDayModal").show();
                            });

                            $("#" + contentName).on("click", ".js-calendar-next,.js-calendar-prev", function() {
                                let arrow = $(this).data("command");
                                dataMonth = $(this)
                                    .siblings("span")
                                    .data("monthIndex");
                                dataYear = $(this)
                                    .siblings("span")
                                    .data("year");
                                let month = arrow == "prev" ? dataMonth == 1 ? 12 : dataMonth - 1 : dataMonth == 12 ? 1 : dataMonth + 1;
                                let year = arrow == "next" && dataMonth == 12
                                    ? dataYear + 1
                                    : dataMonth == 1 && arrow == "prev"
                                    ? dataYear - 1
                                    : dataYear;
                                getWorkCalendar(month, year, true);
                            });

                            $("#" + contentName).on("click", ".js-profile-workCalendar-delete-holiday", function(e) {
                                e.stopImmediatePropagation();
                                e.preventDefault();
                                let id = $(this).data("id");
                                profileUtils.setter.cache = id

                                let selectDate = new Date($(this).data("date"));
                                let today = new Date(ProfileAction.currentSectionData.data.calendarInfo.today)
                                let diffDays = (selectDate.getTime() - today.getTime()) / (1000 * 3600 * 24);
                               
                                if(diffDays >= 2) {
                                    $(".js-profile-holiday-delete-notice").hide()
                                } else {
                                    $(".js-profile-holiday-delete-notice").show()

                                }
                                UIkit.modal("#workCalendarDeleteHoliday").show();
                                $(".js-profile-workCalendar-delete-warehouse-btn").on("click", function(e) {
                                    e.stopImmediatePropagation();
                                    e.preventDefault();
                                    let finalModel = {
                                        action: "remove",
                                        ids: [profileUtils.setter.get]
                                    };

                                    self.sellerHolidayActions(finalModel, function() {
                                        UIkit.modal("#workCalendarDeleteHoliday").hide();
                                        var dateInfoElement = $('.js-calendar-current');
                                        getWorkCalendar(dateInfoElement.data('monthIndex'), dateInfoElement.data('year'), true);
                                        getSellerHolidays("ahead_holidays", tableElement, true);
                                    });
                                });
                            });

                            $("#" + contentName).on("click", ".js-profile-workCalendar-delete-workday", function() {
                                ProfileAction.state.selectedWorkDayToDelete.id = $(this).data('id');
                                ProfileAction.state.selectedWorkDayToDelete.type = $(this).data('shipment-type');
                                window.UIkit.modal('#workCalendarDeleteWorkdayModal', { esClose: true, bgClose: true }).show();
                            });

                            $(document).on("click", ".js-profile-submit-workday-deletion", function(e) {
                                try {
                                    const reqData = {
                                        ids: [ProfileAction.state.selectedWorkDayToDelete.id],
                                        action: 'remove_work_day',
                                        type: isModuleActive('marketplace_add_work_day_digikala') ? [ProfileAction.state.selectedWorkDayToDelete.type] : 'ship_by_seller',
                                    };
                                    const $btn = $(this);
                                    $btn.prop('disabled', true);
                                    $btn.text('لطفا صبر کنید');
                                    const dateInfoElement = $('.js-calendar-current');
                                    Services.ajaxPOSTRequestJSON('/ajax/profile/new/update/seller-work-day-data/', reqData, function () {
                                        getWorkCalendar(dateInfoElement.data('monthIndex'), dateInfoElement.data('year'), true);
                                        getSellerWorkDays("ahead_workdays", workdaysTableElement, true);
                                        $btn.prop('disabled', false);
                                        window.UIkit.modal('#workCalendarDeleteWorkdayModal').hide();
                                        $btn.text('حذف روز کاری');
                                    }, function (err) {
                                        $btn.prop('disabled', false);
                                        $btn.text('حذف روز کاری');
                                        UIkit.notification('مشکلی به وجود آمده است. لطفا مجددا تلاش نمایید', {
                                            status: "danger",
                                            pos: "bottom-right",
                                            timeout: 8000
                                        });
                                    });
                                } catch(e) {
                                    console.log(e);
                                }
                            });

                            $("#" + contentName).on("click", ".js-calendar-month", function(e) {
                                let hideTimer;
                                const dropdownBox = $(this).siblings("div");
                                e.preventDefault();
                                showMonthTootip(e);
                                $(this).mouseout(function() {
                                    hideTimer = setTimeout(function(){
                                        $(dropdownBox).addClass("uk-hidden");
                                    }, 333 );
                                });
                                    $(dropdownBox).mouseover(function() {
                                        clearTimeout( hideTimer );
                                    });
                                    
                                    // set a timer to hide the DIV
                                    $(dropdownBox).mouseout(function() {
                                        hideTimer = setTimeout(function(){
                                            $(dropdownBox).addClass("uk-hidden");
                                        }, 333 );
                                    });
                          
                            });
                            
                            
                            $("#" + contentName).on("click", ".js-calendar-select-month", function(e) {
                               
                                let month = $(this).data("month");
                                let year = $(this).data("year");
                                $(this).parent().hide()
                                getWorkCalendar(month,year, true);
                                
                            });
                            

                            // profileUtils.useSpinner(false, "js-profile-page");
                            // $that.children("div").show();

                            break;
                        }

                        default:
                            profileUtils.useSpinner(false, "js-profile-page");
                            $(this)
                                .children("div")
                                .show();
                            $that.children('a').css('cssText', 'color: #62666d !important');
                            break;
                    }
                } else {
                    $that.css( 'pointer-events', 'all' );
                    $that
                        .children("div")
                        .hide();
                    $that.children('a').css('cssText', 'color: #a1a3a8 !important');

                }
            });
            profileContent.children().each(function() {
                if ($(this).data("name") == contentName) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

            
        }

        function showMonthTootip(e) {
            const target = e.currentTarget;
            const dropdownBox = $(target).siblings("div");
            const boxHalfMaxWidth = 235 / 2;
            const targetHalfWidth = target.offsetWidth / 2;
            const targetPosition = target.getBoundingClientRect();
           
            $(dropdownBox).removeClass("uk-hidden");

            if (targetPosition.left + boxHalfMaxWidth + targetHalfWidth >= document.body.clientWidth) {
                dropdownBox.addClass("c-mod-tooltip--left");
            } else if (targetPosition.left + targetHalfWidth - boxHalfMaxWidth <= 0) {
                dropdownBox.addClass("c-mod-tooltip--right");
            }

            if (targetPosition.top + targetPosition.height + dropdownBox.offsetHeight >= document.body.clientHeight) {
                dropdownBox.addClass("c-mod-tooltip--top");
                dropdownBox.css("top", targetPosition.top - dropdownBox.offsetHeight + "px");
            } else {
                dropdownBox.css("top", targetPosition.top + targetPosition.height + "px");
            }

            dropdownBox.css("left", targetPosition.left + target.offsetWidth / 2 + "px");
            dropdownBox.css("opacity", 1);
            
           
           
    
        }

        function fillCalendar(el, calenderHTML, calendarRow, data, tabId)
        {
            $(el + " .js-workCalendar-top-info").empty();
            $(el + " .js-workCalendar-top-info").append(profileUtils.etta(calenderHTML, data.calendarInfo, 0));
            const beginAddingAfterNow = 1;
            const endAddingAfterNow = 180;
            let startDate = new Date(data.calendarInfo.persian.firstDayOfMonth.date);
            let endDate = new Date(data.calendarInfo.persian.lastDayOfMonth.date);
            let officialHolidays = data.officialHolidays;
            let sellerHolidays = data.sellerHolidays;
            let orderCommitmentDetails = data.orderCommitmentDetails;
            let daysIndex = data.calendarInfo.persian.days;
            let currentDate = data.calendarInfo.today;
            let sellerWorkDays = data.sellerWorkDays || [];
            let days = generateDaysOfMonth(startDate, endDate, currentDate, daysIndex, officialHolidays, sellerHolidays, orderCommitmentDetails, sellerWorkDays);
            days = profileUtils.chunk(7, days);
            $(el + " .js-calendar-days-row").empty();
            let nextDay = false;

            // handle holiday numbers
            const currentMonthIndex = Number(Services.convertToEnDigit( new window.persianDate(new Date(data['calendarInfo'].today)).format("YYYY/MM/DD").split('/')[1]));
            const currentYear = Number(Services.convertToEnDigit( new window.persianDate(new Date(data['calendarInfo'].today)).format("YYYY/MM/DD").split('/')[0]));

            const hasMonthPassed = data['calendarInfo']['persian']['year'] > currentYear  ? false :  data['calendarInfo']['persian']['monthIndex'] < currentMonthIndex ;

            if ( hasMonthPassed ) {
                $('.js-month-remaining-holiday').hide();
            } else {
                $('.js-used-holiday-count').html(Services.convertToFaDigit(data['remainingHolidays']['in_year'].remaining));
                $('.js-total-holiday-count').html(Services.convertToFaDigit(data['remainingHolidays']['in_year'].total));
                $('.js-month-used-holiday-count').html(Services.convertToFaDigit(data['remainingHolidays']['in_month'].remaining));
                $('.js-month-total-holiday-count').html(Services.convertToFaDigit(data['remainingHolidays']['in_month'].total));
            }

            $.each(days, function(i, item) {
                let fakeData = {
                    day: "{day | convertToFaDigit}",
                    date: "{date}",
                    iterator: "{iterator}",
                    orderCommitmentDetail: {
                        totalCount: "{orderCommitmentDetail.totalCount | convertToFaDigit}",
                        shipBySellerCount: "{orderCommitmentDetail.shipBySellerCount | convertToFaDigit}",
                        ShipByDigikalaCount: "{orderCommitmentDetail.ShipByDigikalaCount | convertToFaDigit}"
                    }
                };
                $(el + " .js-calendar-days-row").append(profileUtils.etta(calendarRow, fakeData, i));

                let calendarTile = $(el + " .js-calendar-days-tile-" + i).html();
                $(el + " .js-calendar-days-tile-" + i).empty();

                $.each(item, function(ii, subItems) {
                    const isPast = (new Date(subItems.date)) < (new Date());
                    let diffDayTillNow = subItems.date && getDiffDays(new Date(currentDate), new Date(subItems.date));

                    subItems.today ? (nextDay = true) : "";
                    subItems.iterator = i + "" + ii;

                    $(".js-calendar-days-tile-" + i).append(profileUtils.etta(calendarTile, subItems, 0));

                    !subItems.day
                        ? $(".js-calendar-day-" + i + "" + ii)
                              .children()
                              .addClass("uk-hidden")
                        : "";

                    nextDay || (diffDayTillNow > beginAddingAfterNow && diffDayTillNow < endAddingAfterNow)
                        ? $(".js-calendar-day-" + i + "" + ii)
                              .children()
                              .removeClass("c-RD-profile__holiday-text--gray-light")
                              .addClass("c-RD-profile__holiday-text--gray")
                        : "";

                    subItems.today
                        ? $(".js-calendar-day-" + i + "" + ii)
                              .children()
                              .addClass("c-RD-profile__holiday-text--dark")
                        : "";

                    // calendar ui improvements
                    subItems.today
                        ? $(".js-calendar-day-" + i + "" + ii)
                            .children()
                            .addClass('c-profile-calendar-current-day')
                        : "";

                    !subItems.today && isPast
                        ? $(".js-calendar-day-" + i + "" + ii)
                            .children()
                            .addClass('c-profile-calendar-past-date')
                        : !subItems.today && $(".js-calendar-day-" + i + "" + ii)
                        .children()
                        .addClass('c-profile-calendar-future-date');


                    subItems.officialHoliday
                        ? $(".js-calendar-day-" + i + "" + ii)
                              .children()
                              .addClass("c-calendar__day-wrapper--official-holiday")
                        : "";

                    if ( isModuleActive('marketplace_add_work_day') ) {
                        if ( isModuleActive('marketplace_add_work_day_digikala') || ProfileAction.state.isSBSActive ) {
                            subItems.sellerHoliday && !subItems.officialHoliday ? $(".js-calendar-day-" + i + "" + ii + " .c-calendar__day-wrapper")
                                .addClass("o-border-seller-error-1")
                                .addClass("o-color-seller-error-5") : "";
                        } else {
                            subItems.sellerHoliday && !subItems.officialHoliday ? $(".js-calendar-day-" + i + "" + ii).addClass("holiday") : "";
                        }
                    } else {
                        subItems.sellerHoliday && !subItems.officialHoliday ? $(".js-calendar-day-" + i + "" + ii).addClass("holiday") : "";
                    }

                    if (diffDayTillNow && !subItems.officialHoliday && !subItems.sellerHoliday && diffDayTillNow > beginAddingAfterNow && diffDayTillNow < endAddingAfterNow) {
                        $(".js-calendar-day-" + i + "" + ii)
                            .find("span:eq(0)")
                            .addClass("c-calendar__add-holiday");
                    }

                    if ((diffDayTillNow > 0 && diffDayTillNow <= beginAddingAfterNow) || diffDayTillNow > endAddingAfterNow) {
                        $(".js-calendar-day-" + i + "" + ii)
                            .find("span:eq(1)")
                            .addClass("c-calendar__add-holiday");
                    }

                    if ( subItems.sellerHoliday ) {
                        $(".js-calendar-day-" + i + "" + ii)
                            .find("span:eq(1)")
                            .removeClass("c-calendar__add-holiday");
                    }

                    if ( subItems.officialHoliday && !subItems.officialHoliday.isPast ) {
                        $(".js-calendar-day-" + i + "" + ii)
                            .find("span.js-calendar-add-workday")
                            .addClass("c-calendar__add-holiday")
                            .attr('data-date', subItems.officialHoliday.date);
                        $(".js-calendar-day-" + i + "" + ii).find('.c-calendar__day-wrapper').css('opacity', '1');
                    }

                    if ( isModuleActive('marketplace_add_work_day') ) {
                        if ( (isModuleActive('marketplace_add_work_day_digikala') || ProfileAction.state.isSBSActive) && subItems.sellerWorkDay ) {
                            const $element = $(".js-calendar-day-" + i + "" + ii);
                            $element.attr('data-shipment', `${$element.attr('data-shipment')}_`)
                            $element.find(".c-calendar__day-wrapper")
                                .addClass("o-color-seller-secondary-10")
                                .addClass('o-border-seller-secondary-2');
                            $element.find(".js-official-holiday-text")
                                .addClass('o-text-color-seller-secondary');

                            if ( isModuleActive('marketplace_add_work_day_digikala')) {
                                if ( subItems.sellerWorkDay.has_both ) {
                                    $element.find(".js-calendar-add-holiday").remove();
                                    $element.find('.js-calendar-add-workday').removeClass('c-calendar__add-holiday');
                                } else {
                                    $element.find(".js-calendar-add-workday").attr('data-selected-shipment', subItems.sellerWorkDay.type );
                                }
                            } else {
                                $element.find('.js-calendar-add-workday').removeClass('c-calendar__add-holiday');
                                $element.find(".js-calendar-add-holiday").remove();
                            }


                        }
                    }

                    $(".js-calendar-day-" + i + "" + ii)
                        .find("*[data-show]")
                        .each(function () {
                            let elem = $(this).data("show");
                            let condition = profileUtils.objectify(elem);
                            let beHide = true;
                            Object.entries(condition).some(function(entry) {
                                if (entry[0].indexOf(".") > -1) {
                                    let keys = entry[0].split(".");
                                    let v = subItems[keys.shift()];
                                    for (var yy = 0, ll = keys.length; yy < ll; yy++) v = v && v[keys[yy]];
                                    v >= entry[1] ? (beHide = false) : "";
                                } else {
                                    ((entry[1] == "true" || entry[1] == "false") && subItems[entry[0]]) || (subItems[entry[0]] && subItems[entry[0]] == entry[1]) ? (beHide = false) : "";
                                }
                            });
                            beHide ? $(this).hide() : "";
                        });
                });
            });
        }

        function generateDaysOfMonth(start, end, currentDate, daysIndex, officialHolidays, sellerHolidays, orderCommitmentDetails, sellerWorkDays) {
            let days = [];
            let officialHolidaysDay = {};
            let sellerHoliday = {};
            let orderCommitmentDetail = {};
            let sellerWorkDay = {};
            let startDay = start.getDay() + 2;
            let endDate = end.getDay() + 2;
            let diffDaysOfMonth = getDiffDays(start, end);
            let today = new Date(currentDate);
            $.each(officialHolidays, function(ind, item) {
                officialHolidaysDay[getDiffDays(start, new Date(item.date))] = item;
            });
            $.each(sellerHolidays, function(ind, item) {
                sellerHoliday[getDiffDays(start, new Date(item.date))] = item;
            });
            $.each(orderCommitmentDetails, function(ind, item) {
                orderCommitmentDetail[getDiffDays(start, new Date(item.date))] = item;
            });
            $.each(sellerWorkDays, function(ind, item) {
                sellerWorkDay[getDiffDays(start, new Date(item.date))] = item;
            });
            startDay == 8 ? (startDay = 1) : "";
            endDate == 8 ? (endDate = 1) : "";
            let day = 1;
            for (let i = 1; i < 43; i++) {
                if (i >= startDay && i < daysIndex + startDay) {
                    let thisDay = new Date(new Date(new Date(start.getTime()).setHours(0, 0, 0, 0)));
                    let thisDayUNIX = thisDay.setDate(thisDay.getDate() + (day - 1));
                    let todayUNIX = new Date(new Date(new Date(today.getTime()).setHours(0, 0, 0, 0)));
                    days.push({
                        day: day,
                        officialHoliday: officialHolidaysDay[day],
                        sellerHoliday: sellerHoliday[day],
                        orderCommitmentDetail: orderCommitmentDetail[day],
                        sellerWorkDay: sellerWorkDay[day],
                        today: todayUNIX.setDate(todayUNIX.getDate()) == thisDayUNIX,
                        date: thisDayUNIX
                    });
                    day++;
                } else {
                    days.push({
                        day: ""
                    });
                }
            }
            return days;
        }

        function getDiffDays(start, end) {
            return parseInt((end - start) / (1000 * 60 * 60 * 24), 10) + 1;
        }

        function selectCity($citySelect, value) {
            $citySelect.html("");
            $citySelect.append("<option></option>");
            $.each(citiesArray[value], function(_, city) {
                if (city.id == $citySelect.attr("data-id")) {
                    $citySelect.append('<option value="' + city.id + '" selected>' + city.label + "</option>");
                } else {
                    $citySelect.append('<option value="' + city.id + '">' + city.label + "</option>");
                }
            });

            $citySelect
                .select2()
                .data("select2")
                .$dropdown.addClass("c-ui-select__dropdown");
        }
        
        function selectHours(hourSelect, value) {
            hourSelect.html("");
            hourSelect.append("<option></option>");
            $.each(value, function(_, hour) {
                hourSelect.append('<option value="' + hour.value + '">' + hour.label + "</option>");
            });

            hourSelect
                .select2()
                .data("select2")
                .$dropdown.addClass("c-ui-select__dropdown");
        }
    },
    destroySelect2 : function(contentName, selector) {
        let $elem = $(`#${contentName} ${selector}`)
        let select2Class = "span.select2.select2-container.select2-container--default.select2-container--disabled"
        $elem.siblings(select2Class).length > 1 ? $elem.siblings(select2Class).get(1).remove() : ''
    },
    getDocUpload: function(cb) {
        try {
            $.ajax({
                url: "/ajax/profile/new/update/documents-data/",
                type: "get",
                success: function(data) {
                    cb && cb(data);
                },
                error(dta) {
                    UIkit.modal.alert(dta);
                }
            });
        } catch (error) {}
    },

    getContractPage: function(cb) {
        try {
            $.ajax({
                url: "/ajax/profile/new/update/contract-data/",
                type: "get",
                success: function(data) {
                    cb && cb(data);
                },
                error(dta) {
                    UIkit.modal.alert(dta);
                }
            });
        } catch (error) {}
    },

    againReviewContract: function(payload, cb) {
        try {
            $.ajax({
                url: "/profile/new/verify/contract/",
                type: "post",
                data: JSON.stringify({ action: payload }),
                dataType: "json",
                headers: {
                    "Content-Type": "application/json"
                },
                success: function(data) {
                    cb && cb(data);
                    if (data.status) {
                        window.UIkit.notification("قرارداد با موفقیت ارسال شد", {
                            status: "success",
                            pos: "bottom-right",
                            timeout: 5000
                        });
                    } else {
                        $.each(data.data, function(key, item) {
                            window.UIkit.notification(item, {
                                status: "danger",
                                pos: "bottom-right",
                                timeout: 5000
                            });
                        });
                    }
                },
                error(dta) {
                    UIkit.modal.alert(dta);
                }
            });
        } catch (error) {}
    },

    enrollTraining: function(model,cb) {
      
        try {
            $.ajax({
                url: "/ajax/profile/new/update/training-data/",
                type: "post",
                data: model,
                dataType: "json",
                success: function(data) {
                    if (data.status) {
                        window.UIkit.notification("کلاس آموزشی با موفقیت ثبت نام شد", {
                            status: "success",
                            pos: "bottom-right",
                            timeout: 5000
                        });
                        cb && cb();
                    } else {
                        $.each(data.data, function(key, item) {
                            window.UIkit.notification(item, {
                                status: "danger",
                                pos: "bottom-right",
                                timeout: 5000
                            });
                        });
                    }
                },
                error(dta) {
                    UIkit.modal.alert(dta);
                }
            });
        } catch (error) {}
    },

    initContractDetailsForm: function() {
        const that = this;
        const $econtractModal = $(document.querySelector("#new-electronic-contract"));

        if (!$econtractModal.length) {
            return;
        }

        const approveContract = document.querySelector('[name="register[econtract]"][value="1"]');
        const rejectContract = document.querySelector('[name="register[econtract]"][value="0"]');
        const formContractAgreement = document.querySelector("#econtract-action");

        const $rejectContractBtn = $econtractModal.find("button.js-reject-contract:not(.uk-close)");
        const $approveContractBtn = $econtractModal.find(".js-approve-contract");

        $(".js-reject-contract").on("click", rejectElectronicContract);

        $(approveContract).on("change", checkContractAgreement);
        $(rejectContract).on("change", checkContractAgreement);

        function checkContractAgreement() {
            const isUserAgree = approveContract.checked;
            formContractAgreement.value = isUserAgree ? "confirm" : "reject";
            if (isUserAgree) {
                $rejectContractBtn.addClass("uk-hidden");
                $approveContractBtn.removeClass("uk-hidden");
                $approveContractBtn.prop("disabled", false);
            } else {
                $rejectContractBtn.removeClass("uk-hidden");
                $approveContractBtn.addClass("uk-hidden");
            }
        }

        function approveEcontract() {
            const $loader = $econtractModal.find(".c-card__loading");
            const $contractContainer = $econtractModal.find("#econtract-content");

            $approveContractBtn.removeClass("uk-hidden");
            $approveContractBtn.prop("disabled", true);
            $rejectContractBtn.addClass("uk-hidden");
            $contractContainer.removeClass("scrolled");
            approveContract.disabled = true;
            checkTooltip(approveContract.closest(".c-ui-tooltip__anchor"), true);
            formContractAgreement.value = "reject";

            $loader.addClass("is-active");
            UIkit.modal($econtractModal).show();

            $contractContainer.html("");
            Services.ajaxGETRequestHTML(
                "/ajax/profile/new/contract-content/",
                null,
                function(data) {
                    $loader.removeClass("is-active");
                    $contractContainer.html(data);

                    $contractContainer.on("scroll", checkContractView);
                },
                true,
                false
            );
        }

        $approveContractBtn.on("click", function(e) {
            e.preventDefault();
            that.againReviewContract("confirm");
        });

        function checkContractView() {
            const $this = $(this);

            if (!$this.hasClass("scrolled")) {
                const gaps = parseInt($this.css("padding-top")) + parseInt($this.css("padding-bottom"));
                const SAFE_EXTRA_GAP = 20;

                if ($this.scrollTop() + $this.height() >= $this[0].scrollHeight - gaps - SAFE_EXTRA_GAP) {
                    $this.addClass("scrolled");
                    $this.off("scroll", checkContractView);
                    approveContract.disabled = false;

                    checkTooltip(approveContract.closest(".c-ui-tooltip__anchor"), false);
                }
            }
        }

        function rejectElectronicContract(e) {
            e.preventDefault();
            UIkit.modal($econtractModal).hide();
            Services.commonModalNotification('<span class="c-modal-notification__danger-text">توجه!</span>', "فروشنده عزیز، عدم توافق با مفاد قرارداد همکاری به منزله عدم تمایل شما به همکاری با دیجی‌کالا تلقی شده و فرایند ثبت نام متوقف خواهد شد. در صورت تمایل به لغو ثبت نام روی دکمه توقف فرآیند ثبت نام و در غیر اینصورت روی دکمه بازگشت به فرم قرارداد کلیک کنید.", false, [
                {
                    text: "توقف فرآیند ثبت نام",
                    classes: ["secondary"],
                    cb: cancelRegistration
                },
                {
                    text: "بازگشت به فرم قرارداد",
                    cb: approveEcontract
                }
            ]);
        }

        function cancelRegistration(e) {
            e.preventDefault();
            formContractAgreement.value = "reject";
            const $econtractForm = formContractAgreement.closest("form");
            $econtractForm.submit();
        }

        function checkTooltip(el, isDisabled) {
            if (!el) {
                return;
            }

            const $el = $(el);
            const elTooltipText = $el.data("ui-back-tooltip") || $el.data("ui-tooltip");

            if (elTooltipText) {
                if (!isDisabled) {
                    $el.removeAttr("data-ui-tooltip");
                    $el.data("ui-back-tooltip", elTooltipText);
                } else {
                    $el.removeData("ui-back-tooltip");
                    $el.attr("data-ui-tooltip", elTooltipText);
                }
            }
        }
        approveEcontract();
    },

    getSellerDataPage: function(cb) {
        try {
            $.ajax({
                url: "/ajax/profile/new/update/seller-data/",
                type: "get",
                success: function(data) {
                    cb && cb(data);
                },
                error(dta) {
                    UIkit.modal.alert(dta);
                }
            });
        } catch (error) {}
    },

    submitSellerData: function(vatModel,params, cb) {
        vatModel.document_image_id = params.document_image_id || ProfileAction.currentSectionData.data.document_image_id;
        vatModel.unlimited =  params.unlimited || ProfileAction.currentSectionData.data.unlimited;
        vatModel.document_id = vatModel.document_id || ProfileAction.currentSectionData.data.isSubjectedToVat == true ? 18 : ProfileAction.currentSectionData.data.sellerType == "business" ? 20 : "";

        var formatedDate;
        var integerFormatedDate = [];
        var regExSlash = /\d{4}[/]\d{2}[/]\d{2}/;
        let subjectedToVatDocument = ProfileAction.currentSectionData.data.subjectedToVatDocument
        !subjectedToVatDocument.isExpireAtUnlimited ? subjectedToVatDocument.isExpireAtUnlimited = false : ''
        vatModel.document_expires_at = ProfileAction.currentSectionData.data.subjectedToVatDocument && ProfileAction.currentSectionData.data.subjectedToVatDocument.expireDate && Services.convertToEnDigit(ProfileAction.currentSectionData.data.subjectedToVatDocument.expireDate);
        if (regExSlash.test(vatModel.document_expires_at)) {
            formatedDate = vatModel.document_expires_at.split("/");
            integerFormatedDate = [];
            $.each(formatedDate, function(index, item) {
                integerFormatedDate.push(+item);
            });
            vatModel.document_expires_at = new persianDate(integerFormatedDate)
                .toCalendar("gregorian")
                .toLocale("en")
                .format("YYYY-MM-DD");
        }

            vatModel.image_src = subjectedToVatDocument.image
            vatModel.id = subjectedToVatDocument.id
                Object.assign(ProfileAction.currentSectionData.data,vatModel)
                sendProfileForm();

        function sendProfileForm() {
            let model = ProfileAction.currentSectionData.data
            model.identityCardNumber ? model.nationalIdentityNumber = Services.convertToEnDigit(model.nationalIdentityNumber) : ''
            model.nationalIdentityNumber ? model.identityCardNumber = Services.convertToEnDigit(model.identityCardNumber) : ''
            model.isSubjectedToVat == 1 ? model.isSubjectedToVat = true : model.isSubjectedToVat == 2 ? model.isSubjectedToVat = false : '';
            (model.gender && ( model.gender == 'زن' || model.gender == 'مرد')) ? model.gender == 'زن' ? model.gender = "female" : model.gender = "male" : ''
            let regExSlash = /\d{4}[/]\d{2}[/]\d{2}/;
            model.birthDate ? model.birthDate = Services.convertToEnDigit(model.birthDate) : '';

            if (regExSlash.test(model.birthDate)) {
                formatedDate = model.birthDate.split("/");
                integerFormatedDate = [];
                $.each(formatedDate, function(index, item) {
                    integerFormatedDate.push(+item);
                });
                model.birthDate = new persianDate(integerFormatedDate)
                    .toCalendar("gregorian")
                    .toLocale("en")
                    .format("YYYY-MM-DD");
            }
            // ProfileAction.currentSectionData.data.isSubjectedToVat = ProfileAction.currentSectionData.data.isSubjectedToVat == 1 ? true : false;

            // remove expire date information for VAT document
            if ( isModuleActive('profile_hide_expire_date_improvement') ) {
                delete model.subjectedToVatDocument.expireDate;
                delete model.subjectedToVatDocument.expireDateMain;
                delete model.subjectedToVatDocument.isExpireAtUnlimited;
            }

            try {
                return $.ajax({
                    url: "/ajax/profile/new/update/seller-data/",
                    type: "post",
                    data: JSON.stringify(model),
                    dataType: "json",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    success: function(data) {
                        if (data.status) {
                            window.UIkit.notification("پروفایل با موفقیت ویرایش شد", {
                                status: "success",
                                pos: "bottom-right",
                                timeout: 5000
                            });
                            cb && cb();
                        } else {
                            $.each(data.data, function(key, item) {
                                    window.UIkit.notification(item, {
                                        status: "danger",
                                        pos: "bottom-right",
                                        timeout: 5000
                                    });
                            });
                        }
                    },
                    error(dta) {
                        UIkit.modal.alert(dta);
                    }
                });
            } catch (error) {
                ////console.log(error);
            }
        }
    },

    getWarehouseDataPage: function(cb) {
        try {
            $.ajax({
                url: "/ajax/profile/new/update/contact-data/",
                type: "get",
                success: function(data) {
                    cb && cb(data);
                },
                error(dta) {
                    UIkit.modal.alert(dta);
                }
            });
        } catch (error) {}
    },

    submitWarhouseData: function(action, row, cb) {
        let warehouses;
        let model;
        ProfileAction.currentSectionData.data.warehouses = profileUtils.removeDuplicates(ProfileAction.currentSectionData.data.warehouses,"row");
        if (action == "update") {
            ProfileAction.currentSectionData.data.action = action;
            warehouses = ProfileAction.currentSectionData.data.warehouses.map(function(item) {
                let latLNG = item.legal_coordinates && item.legal_coordinates.split(";");
                item.latitude = latLNG[0];
                item.longitude = latLNG[1];
                item.phone = item.phone.indexOf("-") > -1 ? item.phone.split("-")[1] : item.phone;
                return item;
            });
            model = JSON.parse(JSON.stringify(ProfileAction.currentSectionData.data));
            model.action = action;
            delete model.warehouses;
            model.warehouses = warehouses;
        } else if (action == "delete") {
            let index = ProfileAction.currentSectionData.data.warehouses.findIndex(wh=> wh && wh.row == row)
            let id = ProfileAction.currentSectionData.data.warehouses[index].id;
            model = {
                id: id,
                action: action
            };
        }

        try {
            $.ajax({
                url: "/ajax/profile/new/update/warehouse-data/",
                type: "post",
                data: model,
                dataType: "json",
                success: function(data) {
                    if (data.status) {
                        window.UIkit.notification("عملیات با موفقیت انجام شد", {
                            status: "success",
                            pos: "bottom-right",
                            timeout: 5000
                        });
                    } else {
                        $.each(data.data, function(key, item) {
                                window.UIkit.notification(item, {
                                    status: "danger",
                                    pos: "bottom-right",
                                    timeout: 5000
                                });
                        });
                    }
                    cb && cb(data);

                },
                error(dta) {
                    // UIkit.modal.alert(dta);
                }
            });
        } catch (error) {
        }
    },
    
    submitContactData: function(action, index, cb) {
       
        let model;
  
            ProfileAction.currentSectionData.data.action = action;
            let contact = ProfileAction.currentSectionData.data;
            if(contact.legal_coordinates){
                let latLNG = contact.legal_coordinates.split(";");
                contact.latitude = latLNG[0];
                contact.longitude = latLNG[1];
            }
                contact.phone = contact.phone.indexOf("-") > -1 ? contact.phone.split("-")[1] : contact.phone;
               
            model = JSON.parse(JSON.stringify(ProfileAction.currentSectionData.data));
            model.action = action;
            delete model.warehouses;
        try {
            $.ajax({
                url: "/ajax/profile/new/update/contact-data/",
                type: "post",
                data: model,
                dataType: "json",
                success: function (data) {
                    if (data.status) {
                        window.UIkit.notification("عملیات با موفقیت انجام شد", {
                            status: "success",
                            pos: "bottom-right",
                            timeout: 5000
                        });
                        cb && cb(data);
                    } else {
                        $.each(data.data, function (key, item) {
                                window.UIkit.notification(item, {
                                    status: "danger",
                                    pos: "bottom-right",
                                    timeout: 5000
                                });
                        });
                    }
                },
                error() {
                }
            });
        } catch (error) {
        }
    },

    uploadDocument(tabId, elem, data, preview, loader) {
        let xhrRequest;
        let docHasError = false;

        function checkDocPictureSize()
        {
            $('#upload-input :input')
                .on(
                    'change',
                    function (event) {
                        event.preventDefault();
                        const image = $(this).prop('files')[0];
                        const logoErrorContainer = $('#uploadLogoError');

                        if (image && image.size > 2000000) {
                            docHasError = true;
                            const fileReader = new FileReader();
                            fileReader.onload = function () {
                                $("#"+tabId + " " + preview).attr("src", fileReader.result).removeClass('uk-hidden');
                                logoErrorContainer.removeClass('uk-hidden');
                                logoErrorContainer.siblings('label').eq(0).addClass('uk-hidden');
                                $('#uploadLogoTextError').removeClass('uk-hidden');
                                if (isModuleActive('marketplace_profile_commitment_download_link')) {
                                    $('.js-docs-download-link').addClass('uk-hidden');
                                }
                            }
                            fileReader.readAsDataURL(image);
                        }

                        logoErrorContainer
                            .on('click', function () {
                                $(this).siblings('label').eq(0).removeClass('uk-hidden');
                                $(this).addClass('uk-hidden');
                                $('.js-profile-docUpload-preview').addClass('uk-hidden');
                                $('#uploadLogoTextError').addClass('uk-hidden');
                                if (isModuleActive('marketplace_profile_commitment_download_link')) {
                                    $('.js-docs-download-link').removeClass('uk-hidden');
                                }
                            });

                    }
                )
            ;
        }

        checkDocPictureSize();

        if (!docHasError) {
            UIkit.upload(data, {
                url: "/ajax/image/upload/document/",
                multiple: false,
                method: "POST",
                beforeSend: function (env) {
                    xhrRequest = env.xhr;
                },
                loadStart: function () {
                    profileUtils.useSpinner(true, loader);
                },
                loadEnd: function () {
                    profileUtils.useSpinner(false, "js-profile-page");
                },
                error: function (error) {
                    console.warn(error);
                },
                complete: function (data) {
                    if (JSON.parse(data.response).status) {
                        const resultData = $.parseJSON(data.response);
                        $(elem).parent("label")
                            .addClass("uk-hidden");
                        resultData.data.url ? $("#"+tabId + " " + preview).attr("src",resultData.data.url) : ''
                        resultData.data.url ? $("#"+tabId + " " + preview).removeClass("uk-hidden") : '';
                        $(elem).siblings("input").val(resultData.data.id);
                    } else {
                        $.each(JSON.parse(data.response).data, function (key, item) {
                            window.UIkit.notification(item, {
                                status: "danger",
                                pos: "bottom-right",
                                timeout: 5000
                            });
                        });
                    }
                },
                abort: function () {
                    xhrRequest.abort();
                }
            })
        }
    },

    submitDocumentData: function (data, cb) {
        if (data.legal_coordinates) {
            let latLNG = data.legal_coordinates.split(";");
            data.latitude = latLNG[0];
            data.longitude = latLNG[1];
        }
        data.phone ? data.phone = data.phone.indexOf("-") > -1 ? data.phone.split("-")[1] : data.phone : '';
        try {
            $.ajax({
                url: "/ajax/profile/new/update/documents-data/",
                type: "post",
                data: data,
                dataType: "json",
                success: function (data) {
                    if (data.status) {
                        window.UIkit.notification("مدرک با موفقیت ارسال شد", {
                            status: "success",
                            pos: "bottom-right",
                            timeout: 5000
                        });
                        cb && cb(data);
                    } else {
                        $.each(data.data, function (key, item) {
                                window.UIkit.notification(item, {
                                    status: "danger",
                                    pos: "bottom-right",
                                    timeout: 5000
                                });
                        });
                    }
                },
                error() {
                }
            });
        } catch (error) {
            ////console.log(error);
        }
    },

    getworkCalendar: function(cb, month, year) {
        try {
            return $.ajax({
                url: `/ajax/profile/new/update/calendar-data/${month ? "?month=" + month + "&year=" + year : ""}`,
                type: "get",
                success: function(data) {
                    cb && cb(data);
                },
                error(dta) {
                    UIkit.modal.alert(dta);
                }
            });
        } catch (error) {}
    },

    getSellerHoliday: function(cb, type = "ahead_holidays") {
        try {
            return $.ajax({
                url: `/ajax/profile/new/update/seller-holiday-data/?search[filter]=${type}&page=1&items=30`,
                type: "get",
                success: function(data) {
                    cb && cb(data);
                },
                error(dta) {
                    UIkit.modal.alert(dta);
                }
            });
        } catch (error) {}
    },

    getSellerWorkDays: function(callback, type = 'ahead_workdays') {
        try {
            return $.ajax({
                url: `/ajax/profile/new/update/seller-work-day-data/?search[filter]=${type}&page=1&items=30`,
                type: "get",
                success: function(data) {
                    callback && callback(data);
                },
                error(dta) {
                    UIkit.modal.alert(dta);
                }
            });
        } catch (error) {
            console.log(error);
        }
    },

    sellerHolidayActions: function(model, cb) {
        try {
            $.ajax({
                url: `/ajax/profile/new/update/seller-holiday-data/`,
                type: "post",
                data: model,
                dataType: "json",
                success: function(data) {
                    cb && cb(data);
                    if (data.status) {
                        let txt = "عملیات با موفقیت انجام شد.";
                        if (model.action === "add") {
                            txt = `تاریخ ${new persianDate(new Date(model.dates[0])).format("DD MMMM YYYY")} به عنوان تعطیلی ثبت شد و سفارشات شما در حال پردازش هستند.`;
                        }
                        window.UIkit.notification(txt, {
                            status: "success",
                            pos: "bottom-right",
                            timeout: 5000
                        });
                    } else {
                        $.each(data.data, function(key, item) {
                                window.UIkit.notification(item, {
                                    status: "danger",
                                    pos: "bottom-right",
                                    timeout: 5000
                                });
                        });
                    }
                },
                error(dta) {
                    UIkit.modal.alert(dta);
                }
            });
        } catch (error) {}
    },
    
    
    
    checkBankInfo: function(type ,sheba, cb) {
        try {
            if(type === "check_iban") {
                saveBankInfo(type,function (res) {
                    if(res.status && !res.data.id) {
                        cb && cb(type,res);
                    } else if(res.status && res.data.id) {
                        cb && cb("verify_iban",res);
                        
                    } else {
                        cb && cb("verify_iban",res);
                        $.each(res.data, function(key, item) {
                                window.UIkit.notification(item, {
                                    status: "danger",
                                    pos: "bottom-right",
                                    timeout: 5000
                                });
                        });
                    }
                })
            } else {
                saveBankInfo(type)
            }
            
        } catch (error) {}

        function saveBankInfo(type,callback) {
            $.ajax({
                url: `/ajax/profile/new/update/bank-account-data/`,
                type: "post",
                data: {
                    action: type,
                    iban: sheba
                },
                dataType: "json",
                success: function(data) {
                    if (data.status) {
                        if (type === "check_iban") {
                            callback && callback(data)
                        } else {
                            let txt = "عملیات با موفقیت انجام شد.";
                            window.UIkit.notification(txt, {
                                status: "success",
                                pos: "bottom-right",
                                timeout: 5000
                            });
                            cb && cb(type,data);
                        }
                    } else {
                        if(type === "check_iban") {
                            callback && callback(data)
                        } else {
                            $.each(data.data, function(key, item) {
                                    window.UIkit.notification(item, {
                                        status: "danger",
                                        pos: "bottom-right",
                                        timeout: 5000
                                    });
                            });
                            cb && cb(type,data);

                        }
                    }
                },
                error(dta) {
                    UIkit.modal.alert(dta);
                }
            });
        }
    },
    
    getBankInfo: function (cb) {
        try {
            $.ajax({
                url: `/ajax/profile/new/update/bank-account-data/`,
                type: "get",
                success: function(data) {
                    cb && cb(data);
                },
                error(dta) {
                    UIkit.modal.alert(dta);
                }
            });
        } catch (error) {}
    },

    getValidationObject: function (contentNam) {
        const validationObj = {
            rules: {
                [`${contentNam}[businessName]`]: {
                    required: true,
                    maxlength: 255,
                    validate_persian_and_numbers: true
                },
                [`${contentNam}[phone]`]: {
                    required: true,
                    minlength: 8,
                    maxlength: 8
                },
                [`${contentNam}[address]`]: {
                    required: true,
                    maxlength: 255
                },
                 [`${contentNam}[postal_code]`]: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    validate_persian_and_english_digits: true
                },
                [`${contentNam}[post_code]`]: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    validate_persian_and_english_digits: true
                },
                [`${contentNam}[firstName]`]: {
                    required: true,
                    maxlength: 255,
                    validate_persian_and_numbers: true
                },
                [`${contentNam}[lastName]`]: {
                    required: true,
                    maxlength: 255,
                    validate_persian_and_numbers: true
                },
                [`${contentNam}[nationalIdentityNumber]`]: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    // national_identity_number_international: true
                    // unique_national_id: true,
                },
                [`${contentNam}[identityCardNumber]`]: {
                    required: true,
                    minlength: 1,
                    maxlength: 10,
                    // validate_persian_and_english_digits: true
                },
                [`${contentNam}[shabaNumber]`]: {
                    required: true,
                    minlength: 26,
                    maxlength: 26
                },
                [`${contentNam}[companyEconomicNumber]`]: {
                    required: true,
                    digits: true,
                    minlength: 12,
                    maxlength: 12,
                    company_economic_number: true
                },
                [`${contentNam}[companyNationalIdentityNumber]`]: {
                    required: true,
                    digits: true,
                    minlength: 11,
                    maxlength: 11,
                    company_national_identity_number: true
                    // unique_company_national_id: true,
                },
                [`${contentNam}[companyRegistrationNumber]`]: {
                    required: true,
                    maxlength: 20
                },
                [`${contentNam}[company_authorized_representative]`]: {
                    required: true,
                    maxlength: 255,
                    validate_persian_textonly: true
                },
                [`${contentNam}[phone]`]: {
                    // validate_persian_and_english_digits: true,
                    minlength: 12,
                    maxlength: 12
                },
                [`${contentNam}[warehouse_address]`]: {
                    required: true,
                    maxlength: 255,
                    validate_address: true
                }
            },
            messages: {
                [`${contentNam}[businessName]`]: {
                    required: 'وارد نمودن نام تجاری اجباری است',
                    maxlength: 'نام تجاری میبایست حداکثر ۲۵۵ حرف باشد',
                    validate_persian_and_numbers: 'تنها حروف فارسی مجاز است',
                    unique_name: 'این نام تجاری قبلا ثبت شده است',
                    validate_business_name_symbols: 'لطفا نام فروشگاه را بدون استفاده از کاراکتر فاصه اضافی، وارد نمایید'
                },
                [`${contentNam}[phone]`]: {
                    required: 'وارد نمون مقدار تلفن اجباری است',
                    validate_persian_and_english_digits: 'فقط عدد مجاز است',
                    minlength: 'شماره تلفن ثابت باید 8 رقمی باشد',
                    maxlength: 'شماره تلفن ثابت باید 8 رقمی باشد'
                },
                [`${contentNam}[address]`]: {
                    required: 'وارد نمودن آدرس اجباری است',
                    maxlength: 'حداکثر ۲۵۵ حرف وارد نمایید',
                    validate_persian_and_numbers: 'فقط کاراکترهای فارسی، عدد مجاز است'
                },
                [`${contentNam}[postal_code]`]: {
                    required: 'وارد نمودن کدپستی اجباری است',
                    validate_persian_and_english_digits: 'کدپستی فقط شامل عدد می‌باشد',
                    minlength: 'کدپستی باید 10 رقمی‌باشد',
                    maxlength: 'کدپستی باید 10 رقمی‌باشد'
                },
                [`${contentNam}[post_code]`]: {
                    required: 'وارد نمودن کدپستی اجباری است',
                    validate_persian_and_english_digits: 'کدپستی فقط شامل عدد می‌باشد',
                    minlength: 'کدپستی باید 10 رقمی‌باشد',
                    maxlength: 'کدپستی باید 10 رقمی‌باشد'
                },
                [`${contentNam}[firstName]`]: {
                    required: 'وارد نمودن نام اجباری است',
                    maxlength: 'این مقدار میبایست حداکثر ۲۵۵ حرف باشد',
                    validate_persian_and_numbers: 'تنها حروف فارسی مجاز است'
                },
                [`${contentNam}[lastName]`]: {
                    required: 'وارد نمودن نام خانوادگی اجباری است',
                    maxlength: 'این مقدار میبایست حداکثر ۲۵۵ حرف باشد',
                    validate_persian_and_numbers: 'تنها حروف فارسی مجاز است'
                },
                [`${contentNam}[identityCardNumber]`]: {
                    required: 'وارد نمودن شماره شناسنامه اجباری است',
                    minlength: 'شماره شناسنامه میبایست حداقل ۱ رقم باشد',
                    maxlength: 'شماره شناسنامه میبایست حداکثر ۱۰ رقم باشد',
                    validate_persian_and_english_digits: 'لطفا اعداد انگلیسی وارد نمایید'
                },
                [`${contentNam}[nationalIdentityNumber]`]: {
                    required: 'وارد کردن کد ملی اجباری است',
                    digits: 'لطفا اعداد انگلیسی وارد نمایید',
                    minlength: 'کد ملی میبایست حداقل ۱۰ رقم باشد',
                    maxlength: 'کد ملی می بایست ۱۰ رقم باشد',
                    national_identity_number: 'کد ملی نامعتبر است',
                    unique_national_id: 'کد ملی وارد شده، تکراری است'
                },
                [`${contentNam}[shabaNumber]`]: {
                    required: 'وارد کردن کد شبا الزامی است',
                    minlength: 'وارد کردن کد شبا الزامی است',
                    maxlength: 'وارد کردن کد شبا الزامی است'
                    // unique_sheba: 'شماره شبا وارد شده تکراری است'
                },
                [`${contentNam}[companyEconomicNumber]`]: {
                    required: 'وارد نمودن کد اقتصادی اجباری است',
                    digits: 'لطفا اعداد انگلیسی وارد نمایید',
                    minlength: 'کد اقتصادی میبایست حداقل 12 رقم باشد',
                    maxlength: 'کد اقتصادی میبایست حداکثر 12 رقم باشد',
                    company_economic_number: 'کد اقتصادی وارد شده معتبر نمی باشد'
                },
                [`${contentNam}[companyNationalIdentityNumber]`]: {
                    required: 'وارد نمودن شناسه ملی اجباری است',
                    digits: 'لطفا اعداد انگلیسی وارد نمایید',
                    minlength: 'شناسه ملی میبایست حداقل 11 رقم باشد',
                    maxlength: 'شناسه ملی حداکثر باید 11 رقم باشد',
                    company_national_identity_number: 'شناسه ملی وارد شده معتبر نمی باشد',
                    unique_company_national_id: 'این شناسه ملی قبلا استفاده شده است'
                },
                [`${contentNam}[company_registration_number]`]: {
                    required: 'وارد نمودن شماره ثبت اجباری است',
                    maxlength: 'این فیلد می بایست حداقل 3 و حد اکثر 20 رقم باشد'
                },
                [`${contentNam}[company_authorized_representative]`]: {
                    required: 'وارد نمودن نام صاحبان حق امضاء اجباری است',
                    maxlength: 'مقدار نام صاحبان حق امضاء میبایست حداکثر ۲۵۵ حرف باشد',
                    validate_persian_textonly: 'فقط کاراکترهای فارسی، عدد مجاز است'
                },
                [`${contentNam}[phone]`]: {
                    required: 'وارد نمون مقدار تلفن اجباری است',
                    // validate_persian_and_english_digits: 'فقط عدد مجاز است',
                    minlength: 'شماره تلفن انبار میبایست حداقل ۸ رقم باشد',
                    maxlength: 'شماره تلفن انبار میبایست حداکثر ۸ رقم باشد'
                },
                [`${contentNam}[warehouse_address]`]: {
                    required: 'وارد نمودن آدرس اجباری است',
                    maxlength: 'حداکثر ۲۵۵ حرف وارد نمایید',
                    validate_address: 'تنها حروف فارسی و اعداد فارسی و اعداد انگلیسی مجاز است'
                }
            },

            ignore: ":disabled"
        };

            const $warehouses = $('[data-contacts-validation]:not(.uk-hidden)');

            $warehouses.each(function () {
                let whName = $(this).find("input[name^='contactInfo[warehouses.title']");
                let state = $(this).find("select[name^='contactInfo[warehouses.state_id']");
                let city = $(this).find("select[name^='contactInfo[warehouses.city_id']");
                let address = $(this).find("input[name^='contactInfo[warehouses.address']");
                let coordinates = $(this).find("input[name^='contactInfo[warehouses.coordinates']");
                let postcode = $(this).find("input[name^='contactInfo[warehouses.postal_code']");
                let phone = $(this).find("input[name^='contactInfo[warehouses.phone']");

                if (whName) {
                    validationObj.rules[whName.attr("name")] = {
                        required: true,
                        maxlength: 20
                    };
                    validationObj.messages[whName.attr("name")] = {
                        required: 'وارد نمودن نام انبار الزامی است',
                        maxlength: 'نام انبار نمیتواند بیشتر از 20 حرف باشد.'
                    };
                }

                validationObj.rules[state.attr("name")] = {
                    required: true
                };
                validationObj.messages[state.attr("name")] = {
                    required: 'انتخاب استان اجباری است'
                };

                validationObj.rules[city.attr("name")] = {
                    required: true
                };
                validationObj.messages[city.attr("name")] = {
                    required: 'انتخاب شهر اجباری است'
                };

                validationObj.rules[address.attr("name")] = {
                    required: true,
                    maxlength: 255,
                    validate_address: true,
                };
                validationObj.messages[address.attr("name")] = {
                    required: 'وارد نمودن آدرس اجباری است',
                    maxlength: 'حداکثر ۲۵۵ حرف وارد نمایید',
                    validate_address: 'تنها حروف فارسی و اعداد فارسی و اعداد انگلیسی مجاز است'
                };

                validationObj.rules[coordinates.attr("name")] = {
                    // required: true
                };
                validationObj.messages[coordinates.attr("name")] = {
                    required: 'وارد نمودن موقعیت مکانی آدرس اجباری است'
                };

                validationObj.rules[postcode.attr("name")] = {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    validate_persian_and_english_digits: true
                };
                validationObj.messages[postcode.attr("name")] = {
                    required: 'وارد نمودن کدپستی اجباری است',
                    validate_persian_and_english_digits: 'کدپستی فقط شامل عدد می‌باشد',
                    minlength: 'کدپستی باید 10 رقمی‌باشد',
                    maxlength: 'کدپستی باید 10 رقمی‌باشد'
                };

                validationObj.rules[phone.attr("name")] = {
                    required: true,
                    minlength: 12,
                    maxlength: 12
                };
                validationObj.messages[phone.attr("name")] = {
                    required: 'وارد نمون مقدار تلفن اجباری است',
                    // validate_persian_and_english_digits: 'فقط عدد مجاز است',
                    minlength: 'شماره تلفن انبار میبایست حداقل ۸ رقم باشد',
                    maxlength: 'شماره تلفن انبار میبایست حداکثر ۸ رقم باشد'
                };
            });

        return validationObj;
    },

    initInputMask: function () {
        const $shebaField = $("input[name^='bankInfo[shabaNumber]']");

        if (window.Inputmask && $shebaField.length) {
            window.Inputmask(
                'IR999999999999999999999999',
                {placeholder: 'IR________________________'}
            ).mask($shebaField);
        }
    },

    inputMaskWarehousePhone: function(code,index) {
        const phoneField = $("input[name^='contactInfo[warehouses.phone#"+index+"]']");
      if(window.Inputmask && phoneField.length > 0) {

            window.Inputmask(`${code}-99999999`).mask(phoneField);

        }
    },
    
    inputMaskContactPhone: function(code) {
        const phoneField = $("input[name='contactInfo[phone]']");
        
      if(window.Inputmask && phoneField.length > 0) {

            window.Inputmask(`${code}-99999999`).mask(phoneField);

        }
    },
    
    inputMaskDocUploadPhone: function(code) {
        const phoneField = $("input[name='docUpload[phone]']");
        
      if(window.Inputmask && phoneField.length > 0) {

            window.Inputmask(`${code || 999}-99999999`).mask(phoneField);

        }
    },

    initDatePicker(element, cb) {
        $(element).persianDatepicker({
            initialValue: false,
            observer: true,
            format: "YYYY/MM/DD",
            autoClose: true,
            onSelect: function() {
                var self = $(this.model.inputElement);
                cb && cb(self);
            }
        });
    },
    initRatingChart: function() {
        if (document.querySelector("#rating-gauge")) {
            const gaugeRate = window.dashboardRate || 0;
            const isDataEmpty = !!gaugeRate === false;
            const gaugeColor = isDataEmpty ? "#f3f5f9" : "#37bc9b";
            const emptyClass = isDataEmpty ? "c-rating-chart__empty-gauge" : "";
            const chartTitleClass = "c-rating-chart__center-gauge " + emptyClass;

            // The rating gauge
            const gaugeOptions = {
                chart: {
                    type: "solidgauge",
                    margin: [0, 0, 0, 0],
                    backgroundColor: "transparent",
                    height: "100%"
                },
                title: null,
                xAxis: {
                    title: {
                        text: ""
                    }
                },
                yAxis: {
                    min: 0,
                    max: 100,
                    title: {
                        text: ""
                    },
                    minColor: "#37bc9b",
                    maxColor: "#48cfad",
                    lineWidth: 0,
                    tickWidth: 0,
                    minorTickLength: 0,
                    minTickInterval: 500,
                    labels: {
                        enabled: false
                    },
                    distance: 100
                },
                pane: {
                    size: "95%",
                    center: ["50%", "60%"],
                    startAngle: -90,
                    endAngle: 90,
                    background: {
                        borderWidth: 20,
                        backgroundColor: "#f3f5f9",
                        shape: "arc",
                        borderColor: "#f3f5f9",
                        outerRadius: "90%",
                        innerRadius: "90%"
                    }
                },
                tooltip: {
                    enabled: false
                },
                plotOptions: {
                    solidgauge: {
                        borderColor: gaugeColor,
                        borderWidth: 20,
                        radius: 90,
                        innerRadius: "90%",
                        dataLabels: {
                            y: 5,
                            borderWidth: 0,
                            useHTML: true
                        }
                    }
                },
                series: [
                    {
                        name: "rating",
                        data: [
                            {
                                y: gaugeRate
                            }
                        ],
                        dataLabels: {
                            formatter: function() {
                                return '<div class="' + chartTitleClass + '">٪' + window.Services.convertToFaDigit(this.y) + "</div>";
                            }
                        },
                        tooltip: {
                            valueSuffix: "%"
                        },
                        dataGrouping: {
                            groupPixelWidth: 30
                        }
                    }
                ],

                credits: {
                    enabled: false
                }
            };

            window.Highcharts.chart("rating-gauge", gaugeOptions);

            const svg = document.querySelector(".c-rating-chart svg");

            if (svg) {
                const path = svg.getElementsByTagName("path");

                if (path.length > 1) {
                    // First path is gauge background
                    path[0].setAttributeNS(null, "stroke-linejoin", "round");
                    // Second path is gauge value
                    path[1].setAttributeNS(null, "stroke-linejoin", "round");
                }
            }
        }
    },

    initTrainingSignUp: function callTraining() {
        $('[data-target="training-sign-up"]').each(function() {
            $(this).on("click", function(e) {
                e.preventDefault();

                UIkit.modal("#training-sign-up").show();
            });
        });
    },

    initTrainingSelect: function() {
        const $trainingSignUp = $("#training-sign-up");
        if (!$trainingSignUp.length) {
            return;
        }

        let $form = $("#training-form");
        const $modalBody = $form.closest(".uk-modal-body");
        const $loadingProgress = $form.siblings(".c-loading");

        $form
            .validate({
                rules: {
                    "register[training_day]": {
                        required: true
                    },
                    "register[training_hour]": {
                        required: true
                    }
                },
                messages: {
                    "register[training_day]": {
                        required: 'لطفا روز مورد نظر خود را انتخاب کنید.'
                    },
                    "register[training_hour]": {
                        required: 'لطفا ساعت مورد نظر خود را انتخاب کنید.'
                    }
                }
            })
            .showBackendErrors();

        $("#btnSubmit").click(function(e) {
            e.preventDefault();
            $form.submit();
        });

        $(document).on("click", "#closeAndRefresh", function() {
            window.location.reload();
        });

        $form.on("submit", function(e) {
            e.preventDefault();

            if (!$form.valid()) {
                return false;
            }
            $loadingProgress.addClass("is-active");
            window.Services.ajaxPOSTRequestJSON(
                window.training_ajax_url,
                $form.serialize(),
                function() {
                    const template = '<div class="c-modal-notification">' +
                        '<div class="c-modal-notification__content c-modal-notification__content--limited">' +
                        '<div class="c-modal-notification__bg-img c-modal-notification__bg-img--success"></div>' +
                        '<h2 class="c-modal-notification__header">فروشنده گرامی،</h2>' +
                        '<p class="c-modal-notification__text">ثبت‌نام شما در دوره آموزشی مرکز فروشندگان با موفقیت انجام شد.</p>' +
                        '<button class="c-modal-notification__btn" id="closeAndRefresh">تایید</button>' +
                        "</div>" +
                        "</div>";
                    $modalBody.html("").append(template);
                },
                function(data) {
                    $loadingProgress.removeClass("is-active");
                    $form
                        .validate({
                            rules: {
                                "register[training_day]": {
                                    required: true
                                },
                                "register[training_hour]": {
                                    required: true
                                }
                            },
                            messages: {
                                "register[training_day]": {
                                    required: 'لطفا روز مورد نظر خود را انتخاب کنید.'
                                },
                                "register[training_hour]": {
                                    required: 'لطفا ساعت مورد نظر خود را انتخاب کنید.'
                                }
                            }
                        })
                        .showErrors(data);
                },
                true
            );

            return false;
        });

        if ($trainingSignUp.length) {
            const context = this;
            const $inputs = $(".c-ui-select--training");
            const selectedType = $('[name="register[training_type]"]:checked').val();
            const $daysSelect = $('[name="register[training_day]"]');
            const $hoursSelect = $('[name="register[training_hour]"]');
            const chosenDay = $daysSelect.attr("data-id");

            $inputs.each(function() {
                let $input = $(this);

                let inputPlaceholder = $input.attr("placeholder");
                let hasSearch = $input.hasClass("c-ui-select--search");

                $input
                    .select2({
                        placeholder: inputPlaceholder,
                        minimumResultsForSearch: hasSearch ? 0 : Infinity,
                        language: {
                            noResults: function() {
                                return 'نتیجه ای پیدا نشد';
                            },
                            searching: function() {
                                return 'form.general.select.search.searching';
                            }
                        }
                    })
                    .data("select2")
                    .$dropdown.addClass("c-ui-select__dropdown");
            });

            if (window.days) {
                context.loadSelector(selectedType, $daysSelect, chosenDay, window.days);

                $('[name="register[training_type]"]').on("change", function() {
                    $hoursSelect.html("");
                    context.loadSelector(this.value, $daysSelect, chosenDay, window.days);
                    $daysSelect.prop("disabled", false);
                });
            }

            if (chosenDay.length > 0 && $hoursSelect[selectedType] && $hoursSelect[selectedType][chosenDay]) {
                $.each($hoursSelect[selectedType][chosenDay], function(index, hour) {
                    if ($hoursSelect.attr("data-id") === hour.value) {
                        $hoursSelect.append('<option value="' + hour.value + '" selected>' + hour.label + "</option>");
                    } else {
                        $hoursSelect.append('<option value="' + hour.value + '">' + hour.label + "</option>");
                    }
                });
            }

            $daysSelect.on("change", function() {
                const selectedType2 = $('[name="register[training_type]"]:checked').val();

                $hoursSelect.html("");
                $hoursSelect.prop("disabled", false);
                if (window.hours) {
                    context.loadSelector(this.value, $hoursSelect, false, window.hours[selectedType2]);
                    $daysSelect.prop("disabled", false);
                }
            });
        }
    },

    loadSelector: function(value, selector, defaultValue, values) {
        selector.html("");
        selector.append("<option></option>");
        if (values) {
            $.each(values[value], function(index, day) {
                if (day instanceof Object) {
                    if (defaultValue === day.value) {
                        selector.append('<option value="' + day.value + '" selected>' + day.label + "</option>");
                    } else {
                        selector.append('<option value="' + day.value + '">' + day.label + "</option>");
                    }
                } else {
                    if (defaultValue === index) {
                        selector.append('<option value="' + index + '" selected>' + day + "</option>");
                    } else {
                        selector.append('<option value="' + index + '">' + day + "</option>");
                    }
                }
            });
        }
    },

    initDocumentLoader: function() {
        const loaderClass = "c-ui-upload";
        const $loaders = $("." + loaderClass);

        $loaders.each(function() {
            const $loader = $(this);
            const $loaderWrapper = $loader.parent();

            const $loaderSpinner = $loader.children(".c-loading");
            const $loaderImg = $loader.children("." + loaderClass + "__img");
            const $loaderHint = $loaderImg.length && $loader.find("." + loaderClass + "__img-hint");

            const $input = $loader.find("input:file");

            const inputId = $input.data("id");
            const url = $loader.data("url") || "/ajax/file/upload/";

            const hiddenInput = $loader.find("#" + inputId);
            const hiddenInputTemp = $loader.find("#" + inputId + "-temp");

            UIkit.upload("#" + $loader.attr("id"), {
                url: url,
                multiple: false,

                beforeSend: function() {},

                complete: function(data) {
                    const resultData = $.parseJSON(data.response);
                    const $validationError = $loaderWrapper.children(".error");

                    if (!!resultData.status === false) {
                        if ($validationError.length) {
                            $validationError.text(resultData.data.error);
                        } else {
                            const errorTemplate = '<div class="error c-reg-form__error">' + resultData.data.error + "</div>";

                            $loaderWrapper.append(errorTemplate);
                            hiddenInputTemp.length && hiddenInputTemp.val(0);
                        }
                    } else if (resultData.data.id && resultData.data.url) {
                        $loaderImg.css("background-image", "url(" + resultData.data.url + ")");
                        hiddenInput.val(resultData.data.id);

                        if (hiddenInputTemp.length && !!resultData.data.tempFile === true) {
                            hiddenInputTemp.val(1);
                        }

                        $loaderHint && $loaderHint.length && $loaderHint.addClass("uk-hidden");
                        $validationError.length && $validationError.remove();
                    } else {
                        const field = $input.closest(".c-card__body--form").find(".c-ui-input > .c-ui-input__status");

                        $input
                            .parent()
                            .find("label")
                            .addClass("uk-hidden");
                        if (field.hasClass("c-ui-input__status--warning")) {
                            field.removeClass("c-ui-input__status--warning").addClass("c-ui-input__status--success");
                        }
                    }
                },

                loadStart: function() {
                    if ($loaderSpinner.length) {
                        $loaderSpinner.removeClass("uk-hidden");
                    }
                },

                loadEnd: function() {
                    if ($loaderSpinner.length) {
                        $loaderSpinner.addClass("uk-hidden");
                    }
                },

                error: function(error) {
                    const errorTemplate = '<div class="error c-reg-form__error">' + error + "</div>";

                    $("#" + inputId).val("");
                    $loaderWrapper.append(errorTemplate);

                    if ($loaderSpinner.length) {
                        $loaderSpinner.addClass("uk-hidden");
                    }
                }
            });
        });
    },

    initCoordinatesControls: function() {
        const thiz = this;
        let isFirstInit = false;
        let coordinatesInput;
        thiz.confirmCoordinates = document.querySelector(".js-coordinates-confirm");

        $(document).on("click", ".js-coordinates-btn", showMapCoordinates);

        function showMapCoordinates(e) {
            thiz.formCoordinatesBtn = this;
            if (
                $(this)
                    .siblings('input[type="text"]')
                    .attr("readonly") === "readonly"
            )
                return;
            e.preventDefault();

            coordinatesInput = $(this).siblings("input[type=text]");

            let value = coordinatesInput.val();
            let latLNGRegex = /^(\-?\d+(\.\d+)?),\s*(\-?\d+(\.\d+)?)$/;
            latLNGRegex.test(value) ? "" : (value = null);
            let position;

            if (!isFirstInit) {
                thiz.markerDetails = document.querySelector(".js-place-details");
            } else {
                thiz.markerDetails.classList.remove("is-active");
            }

            if (value) {
                const latAndLng = value.split(";");
                position = {
                    lat: Number(latAndLng[0]),
                    lng: Number(latAndLng[1])
                };
            }

            thiz.dropMarker(thiz.marker);

            if (position) {
                if (isFirstInit) {
                    thiz.addMarker(position, thiz.map, true);
                } else {
                    thiz.hasInitialPosition = true;
                }

                thiz.confirmCoordinates.textContent = "ویرایش";
            } else {
                thiz.confirmCoordinates.textContent = "ثبت";
            }

            thiz.confirmCoordinates.disabled = true;

            if (thiz.searchInput) {
                thiz.searchInput.value = "";
                thiz.searchInput.parentNode.classList.remove("has-error");
            }

            if (!isFirstInit) {
                isFirstInit = true;
                document
                    .querySelector("#coordinates-popup")
                    .querySelector(".c-card__loading")
                    .classList.add("is-active");
                thiz.initGoogleMap("coordinates-popup-map", position);
            }

            UIkit.modal("#coordinates-popup").show();
        }

        thiz.confirmCoordinates.addEventListener("click", function(e) {
            e.preventDefault();

            coordinatesInput.val(thiz.coordinates);
            thiz.formCoordinatesBtn.classList.add("is-filled");
            $(coordinatesInput).valid();
            UIkit.modal("#coordinates-popup").hide();
        });
    },

    dropMarker: function(marker) {
        /** @function marker.setMap */
        if (marker) {
            marker.setMap(null);
            marker = null;
        }
    },

    formLocationValue: function(location, divider) {
        let lat, lng;
        divider = divider || ";";
        if (typeof location.lat === "function") {
            lat = location.lat();
            lng = location.lng();
        } else if (location.lat) {
            lat = location.lat;
            lng = location.lng;
        }

        return lat + divider + lng;
    },

    showMarkerLocation: function(location) {
        const thiz = this;
        if (thiz.markerDetails) {
            if (location) {
                const latLng = thiz.formLocationValue(location, ", ");
                thiz.markerDetails.innerHTML = '<div class="c-modal-map__address-details">' + latLng + "</div>";
                thiz.markerDetails.classList.add("is-active");
            } else {
                thiz.markerDetails.classList.remove("is-active");
                thiz.markerDetails.innerHTML = "";
            }
        }
    },

    addMarker: function(location, map, isCenter) {
        const thiz = this;
        const google = window.google;
        thiz.dropMarker(thiz.marker);

        /** @param google.maps.Animation.DROP */
        thiz.marker = new google.maps.Marker({
            position: location,
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP
        });

        if (thiz.marker) {
            thiz.marker.addListener("dragend", markerHandleDragEvent);
        }

        /** @function thiz.map.setCenter */
        if (isCenter) {
            thiz.map.setCenter(thiz.marker.getPosition());
        }

        thiz.confirmCoordinates.disabled = false;

        if (typeof location.lat !== "function") {
            location = thiz.marker.getPosition();
        }

        if (location) {
            thiz.coordinates = thiz.formLocationValue(location);
            thiz.showMarkerLocation(location);
        }

        function markerHandleDragEvent(e) {
            const lat = e.latLng.lat();
            const lng = e.latLng.lng();
            const updatedLatAndLng = lat + ";" + lng;

            if (updatedLatAndLng !== thiz.coordinatesValue) {
                thiz.coordinates = updatedLatAndLng;
                thiz.showMarkerLocation({
                    lat: lat,
                    lng: lng
                });
                thiz.confirmCoordinates.disabled = false;
            }
        }
    },

    initGoogleMap: function(id, position) {
        const google = window.google;
        const thiz = this;
        position = position || {
            lat: 0,
            lng: 0
        };

        function initMapInner(position) {
            thiz.searchInput = document.querySelector("#google-map-search");
            // const searchForm = document.querySelector('#coordinates-search-form');

            thiz.map = new google.maps.Map(document.getElementById(id), {
                center: {
                    lat: parseFloat(position.lat),
                    lng: parseFloat(position.lng)
                },
                zoom: 15,
                fullscreenControl: false,
                streetViewControl: false,
                mapTypeControl: false,
                scaleControl: false,
                gestureHandling: "greedy"
            });

            google.maps.event.addListener(thiz.map, "click", function(event) {
                thiz.addMarker(event.latLng, thiz.map);
                thiz.marker.addListener("click", toggleBounce);
            });

            if (thiz.hasInitialPosition) {
                thiz.addMarker(position, thiz.map);
            }

            thiz.map.addListener("click", function(e) {
                e.stop();
            });

            /** @param google.maps.ControlPosition.TOP_RIGHT */
            // thiz.map.controls[google.maps.ControlPosition.TOP_RIGHT].push(searchForm);

            /** @param google.maps.places */
            const autocompleteBox = new google.maps.places.Autocomplete(thiz.searchInput);
            autocompleteBox.setFields(["geometry", "address_components"]);
            /** @function autocompleteBox.bindTo */
            autocompleteBox.bindTo("bounds", thiz.map);

            autocompleteBox.addListener("place_changed", function() {
                /** @function autocompleteBox.getPlace */
                const place = autocompleteBox.getPlace();

                if (!(place && place.geometry)) {
                    thiz.searchInput.parentNode.classList.add("has-error");
                    Services.logToConsole("No details available for input: '" + place.name + "'");
                    return;
                }

                thiz.searchInput.parentNode.classList.remove("has-error");

                if (place.geometry.viewport) {
                    thiz.map.fitBounds(place.geometry.viewport);
                } else {
                    thiz.map.setCenter(place.geometry.location);
                    thiz.map.setZoom(17);
                }
            });

            document
                .querySelector("#coordinates-popup")
                .querySelector(".c-card__loading")
                .classList.remove("is-active");

            thiz.searchInput.focus();
        }

        if (parseInt(position.lat) === 0 || parseInt(position.lng) === 0) {
            navigator.geolocation.getCurrentPosition(
                function(pos) {
                    position.lat = pos.coords.latitude;
                    position.lng = pos.coords.longitude;
                    initMapInner(position);
                },
                function() {
                    if (parseInt(position.lat) === 0) {
                        position.lat = 35.7013221;
                    }
                    if (parseInt(position.lng) === 0) {
                        position.lng = 51.3353777;
                    }
                    initMapInner(position);
                }
            );
        } else {
            initMapInner(position);
        }

        function toggleBounce() {
            /** @func thiz.marker.getAnimation */
            /** @param google.maps.Animation.BOUNCE */
            if (thiz.marker.getAnimation() !== null) {
                thiz.marker.setAnimation(null);
            } else {
                thiz.marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        }
    },


    initTooltips: function() {
        const $tooltipContainers = $(".js-tooltip");

        if ($tooltipContainers.length > 0) {
            $tooltipContainers.on("mouseenter", this.showTooltip);
        }
    },

    showTooltip: function(e) {
        const target = e.currentTarget;
        const tooltipText = $(target).data("tooltip");
        const createTooltip = function(id, text) {
            const tooltip = $("<div/>");

            if (id && text) {
                tooltip.addClass("c-mod-tooltip c-mod-tooltip--popover");
                tooltip.attr("id", id);
                tooltip.html(text);
            }

            return tooltip;
        };

        if (tooltipText) {
            const tooltipHalfMaxWidth = 235 / 2;
            const targetHalfWidth = target.offsetWidth / 2;
            const tooltipId = "tooltip-block";
            const targetPosition = target.getBoundingClientRect();
            const tooltip = createTooltip(tooltipId, tooltipText);

            const removeTooltip = function() {
                tooltip.remove();
                target.removeEventListener("mouseleave", removeTooltip);
                window.removeEventListener("scroll", removeTooltip);
            };

            $("body").append(tooltip);

            if (targetPosition.left + tooltipHalfMaxWidth + targetHalfWidth >= document.body.clientWidth) {
                tooltip.addClass("c-mod-tooltip--left");
            } else if (targetPosition.left + targetHalfWidth - tooltipHalfMaxWidth <= 0) {
                tooltip.addClass("c-mod-tooltip--right");
            }

            if (targetPosition.top + targetPosition.height + tooltip.offsetHeight >= document.body.clientHeight) {
                tooltip.addClass("c-mod-tooltip--top");
                tooltip.css("top", targetPosition.top - tooltip.offsetHeight + "px");
            } else {
                tooltip.css("top", targetPosition.top + targetPosition.height + "px");
            }

            tooltip.css("left", targetPosition.left + target.offsetWidth / 2 + "px");
            tooltip.css("opacity", 1);

            target.addEventListener("mouseleave", removeTooltip);
            window.addEventListener("scroll", removeTooltip);
        }
    },

    initLocationSelects: function() {
        /** @var cities */
        const citiesArray = window.cities;
        const $inputs = $(".c-ui-select");

        $inputs.each(function() {
            const $input = $(this);
            const inputPlaceholder = $input.attr("placeholder");
            const hasSearch = $input.hasClass("c-ui-select--search");
            const value = $input.attr("data-id");

            if (value) {
                $input.val(value);
            }

            $input
                .select2({
                    placeholder: inputPlaceholder,
                    minimumResultsForSearch: hasSearch ? 0 : Infinity,
                    language: Services.selectSearchLanguage
                })
                .data("select2")
                .$dropdown.addClass("c-ui-select__dropdown");

            $input.on("change", function() {
                $(this).valid();
            });
        });

        const $stateSelects = $(".js-state-select");

        $stateSelects.each(changeCities);

        $(document).on("change", ".js-state-select", changeCities);

        function changeCities() {
            const $select = $(this);
            const $selectsContainer = $select.closest(".js-location-container");
            const $citySelect = $selectsContainer.find("select.js-city-select");
            const $cityCode = $selectsContainer.find("input.js-city-code");

            const value = $select.val();
            const placeholder = $select.attr("placeholder");

            if (value === "") {
                $citySelect
                    .select2({
                        placeholder: placeholder,
                        language: Services.selectSearchLanguage
                    })
                    .data("select2")
                    .$dropdown.addClass("c-ui-select__dropdown");
                // $citySelect.prop('disabled', true);
            } else if (citiesArray[value]) {
                $citySelect.html("");
                $citySelect.append("<option></option>");
                $.each(citiesArray[value], function fillOptions(_, city) {
                    if (city.id == $citySelect.attr("data-id")) {
                        $citySelect.append('<option value="' + city.id + '" selected>' + city.label + "</option>");
                    } else {
                        $citySelect.append('<option value="' + city.id + '">' + city.label + "</option>");
                    }
                });

                $citySelect
                    .select2({
                        placeholder: placeholder,
                        language: Services.selectSearchLanguage
                    })
                    .data("select2")
                    .$dropdown.addClass("c-ui-select__dropdown");

                $cityCode.val($select.find(":selected").data("code"));
            }
        }
    },


    initInputsWithFaDigits: function() {
        $(document).on('input', '.js-input-with-fa-number', function () {
            $(this).val(Services.convertToFaDigit($(this).val()));
        });
    },

    initAboutSellerLetterCount() {
        $(document).on('input', 'textarea[name="businessInfo[sellerPageDescription]"]', function () {
            if (($(this).val().split(' ').length - 1) <= 150) {
                $('.js-letter-count').text(Services.convertToFaDigit($(this).val().split(' ').length - 1));
            } else {
                var trimmed = $(this).val().split(/\s+/, 150).join(' ');
                $(this).val(trimmed);
                $('.js-letter-count').text('۱۵۰');
                return false;
            }
        });
    },
    initDownloadLinkOnDocsPage() {
        $(document).on('change', 'select[name="docUpload[document_id]"]', function () {
            if ($(this).val() === "17") {
                $('.js-docs-download-link').removeClass('uk-hidden');
            } else {
                $('.js-docs-download-link').addClass('uk-hidden');
            }
        });
    },
};

$(function() {
    Services.sellerTypeDetect = function(data) {
        if (data === "private") {
            return "حقیقی";
        }
        return "حقوقی";
    };
    Services.booleanTranslator = function(data) {
        if (data === false) {
            return "مشمول";
        }
        return "معاف";
    };
    Services.genderTranslator = function(data) {
        if (data === "male") {
            return "مرد";
        }
        return "زن";
    };
    Services.convertToFaDigit = function(a) {
        var b = "" + a;
        for (var c = 48; c <= 57; c++) {
            var d = String.fromCharCode(c);
            var e = String.fromCharCode(c + 1728);
            b = b.replace(new RegExp(d.toString(), "g"), e.toString());
        }
        if (b === null || b === undefined || b === "null") b = "";
        return b;
    };

    Services.documentTranslate = function(a) {
        var b;
        switch (a) {
            case "vat_certificate":
                b = "گواهی مالیات بر ارزش افزوده";
                break;
            case "vat_free_certificate":
                b = "گواهی معافیت از مالیات بر ارزش افزوده";
                break;
            case "company_registration":
                b = "روزنامه رسمی ثبت شرکت";
                break;
            case "identity_card_front":
                b = "تصویر جلوی کارت ملی";
                break;
            case "identity_card_back":
                b = "تصویر پشت کارت ملی";
                break;
            case "unknown":
                b = "فایل ناشناخته";
                break;

            default:
                b = a;
                break;
        }
        return b;
    };

    Services.holidayStatus = function(a) {
        var b;
        switch (a) {
            case "active":
                b = "پیش رو";
                break;
            case "applied":
                b = "گذشته";
                break;
            case "deleted":
                b = "پاک شده";
                break;

            default:
                b = a;
                break;
        }
        return b;
    };

    Services.workDayStatus = function(status) {
        const workDaysByStatus = {
            active: 'پیش رو',
            applied: 'گذشته',
            deleted: 'پاک شده'
        };
        return workDaysByStatus[status];
    };

    Services.persianDate = function(a) {
        return new persianDate(new Date(a)).format("DD MMMM YYYY");
    };
    String.prototype.insert = function(index, string) {
        if (index > 0)
        {
          return this.substring(0, index) + string + this.substring(index, this.length);
        }
      
        return string + this;
      };

    ProfileAction.init();
});