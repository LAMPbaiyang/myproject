/*!
 *  jsModern v7.1.0
 *  Copyright (C) 2017-2018, Frank Chao
 *  Released under the MIT license
 */

!(function ( global, factory ) {

    if ( typeof define === "function" && define.amd ) { 
        define("jsmodern", ["jquery"], factory);
    } else if ( typeof module !== "undefined" && typeof exports === "object" ) {
        module.exports = factory(require("jquery"));
    } else {
        global.jsModern = factory(global.jQuery);
    }

})( typeof window !== "undefined" ? window : this, function ( $ ) {

	"use strict";

	// jQuery 相关检测
	if ( typeof jQuery === "undefined" ) {
        throw new Error("jsModern\'s JavaScript requires jQuery !!!");
    }
    var version = $.fn.jquery.split(".");
    if ( ~~version[0] === 1 && ~~version[1] < 11 ) {
        throw new Error("jsModern\'s JavaScript requires at least jQuery v1.11.0 !!!");
    }

    // 内部变量与函数
    var $document = $(document),
        $window = $(window),
        $html = $("html"),
        $head = $("head"),
        $body;
    var _ua = navigator.userAgent.toLowerCase(),
        _screenWidth = screen.width,
        _screenHeight = screen.height,
        _interval = 13,
        _jsmodern = window.jsModern,
        _ie10 = !!_ua.match("msie"),
        _mobile = !!(_ua.match(/(ios|iphone|ipod|ipad|mobile|android|symbianos|ucweb|mqqbrowser|iemobile|webos|windows phone|windows mobile|opera mini|opera mobl|nexus|series|nokia|blackberry|meego|playbook|fennec|tablet)/) && "ontouchend" in document);
    var Fn = {
    	type: function ( obj ) {
    		return {}.toString.call(obj).replace(/(\[object |\])/g, "").toLowerCase();
    	},
    	string: function ( str ) {
    		return !!(Fn.type(str) === "string" && str !== "");
    	},
    	number: function ( num ) {
    		return !!(Fn.type(num) === "number" && Math.abs(num) !== Infinity && Math.floor(num) === num && num >= 0);
    	},
    	boolean: function ( bool ) {
    		return !!(Fn.type(bool) === "boolean");
    	},
    	true: function ( bool ) {
    		return !!(Fn.boolean(bool) && bool);
    	},
    	false: function ( bool ) {
    		return !!(Fn.boolean(bool) && !bool);
    	},
    	function: function ( fn ) {
    		return !!(Fn.type(fn) === "function" && typeof fn.nodeType !== "number");
    	},
    	toStringRandom: function () {
    		return Math.random().toString(21).substr(2);
    	},
    	fullScreenIn: function ( target ) {
    		target = target || document.documentElement;  
	        if ( target.webkitRequestFullScreen ) { 
	            target.webkitRequestFullScreen(); 
	        } else if ( target.mozRequestFullScreen ) { 
	            target.mozRequestFullScreen(); 
	        } else if ( target.msRequestFullscreen ) { 
	            target.msRequestFullscreen(); 
	        } else if ( target.requestFullScreen ) { 
	            target.requestFullScreen(); 
	        }
    	},
    	fullScreenOut: function ( target ) {
    		target = target || document;  
	        if ( target.webkitExitFullscreen ) {
	            target.webkitExitFullscreen();
	        } else if ( target.mozCancelFullScreen ) {
	            target.mozCancelFullScreen();
	        } else if ( target.msExitFullscreen ) {  
                target.msExitFullscreen();  
            } else if ( target.exitFullscreen ) {
	            target.exitFullscreen();
	        }
    	},
    	createScript: function ( src, id ) {
    		var script = document.createElement("script");
	        script.src = src + (_ie10 ? ("?" + Fn.toStringRandom()) : "");
	        script.type = "text/javascript";
	        script.id = id;
	        document.head.appendChild(script);
	        return script;
    	},
    	scopedCSS: function () {
    		var $style = $body.find("style").filter("[scoped]");
	        if ( !$style.length ) {
	            return;
	        }
	        $style.each(function () {
	            var $this = $(this),
	                $parent = $this.parent();
	            var styleHTML = $this.html().replace(/\s+/g, " ").trim();
	            if ( styleHTML ) {
	                var randomString = "spd_" + Fn.toStringRandom().substring(0, 7);
	                $parent.find("*").addBack().not("style").attr(randomString, "");
	                var css = styleHTML
	                    .replace(/\/\*(.*)\*\//g, "")
	                    .replace(/(\s)([>+~,=;:"'])/g, "$2")
	                    .replace(/([>+~,=;:"'])(\s)/g, "$1")
	                    .replace(/\[/g, "[" + randomString + "][")
	                    .replace(/(\w)([>+~,])/g, "$1[" + randomString + "]$2")
	                    .replace(/\{/g, " {")
	                    .replace(/((\s)\[)|(\[(\s))/g, "[")
	                    .replace(/(\s)\]/g, "]")
	                    .replace(/(\s)\)/g, ")")
	                    .replace(/(\((\s))|((\s)\()/g, "(")
	                    .replace(/(\s)\}/g, "}")
	                    .replace(/(\w)(\s)/g, "$1[" + randomString + "] ")
	                    .replace(/(\w)\./g, "$1[" + randomString + "].")
	                    .replace(/\s+/g, " ");
	                var special = ["link", "visited", "active", "hover", "focus", "first-letter", "first-line", "first-child", "before", "after", "first-of-type", "last-of-type", "only-of-type", "only-child", "last-child", "nth-of-type", "nth-last-child", "nth-of-type", "nth-child", "nth-last-of-type", "empty", "not", "selection", "enabled", "disabled", "checked", "target", ":-webkit-input-placeholder", "-ms-input-placeholder", "-moz-placeholder", ":-webkit-scrollbar", ":-webkit-scrollbar-thumb", ":-webkit-scrollbar-track", ":-webkit-scrollbar-button", ":-webkit-scrollbar-track-piece", ":-webkit-scrollbar-corner", ":-webkit-resizer"];
	                $.each(special, function ( i, v ) {
	                    if ( css.indexOf(v) > -1 ) { 
	                        css = css.replace(new RegExp(":" + v + "\\[" + randomString + "\\]", "g"), ":" + v).replace(new RegExp("([\\w])\\:" + v, "g"), "$1[" + randomString + "]:" + v);
	                    }
	                })
	                css = css.replace(new RegExp("\\(\\[" + randomString + "\\]", "g"), "(");
	                $.each(css.match(/\{(.*?)\}/g), function ( i, v ) {
	                    css = css.replace(v, v.replace(new RegExp("\\[" + randomString + "\\]", "g"), ""));
	                })
	                css = css.replace(/([>+~])/g, " $1 ").replace(/,/g, ", ");
	                $this.html(css).removeAttr("scoped");
	            }
	        })
    	},
    	scopedCssListener: function () {
    		window.setInterval(Fn.scopedCSS, _interval);
    	},
        modal: function ( type, title, content ) {
            globalVar.modal = true;

            // 基础参数
            var _title = content ? title : decodeURI("%E6%9D%A5%E8%87%AA%E7%BD%91%E9%A1%B5%E7%9A%84%E6%B6%88%E6%81%AF"),
                _content = content || title;
            var time = 300;
            var $body = $("body");
            var modalTemplate = '<section class="jmn-modal-container"><div class="jmn-modal-box"><p class="jmn-modal-title"></p><div class="jmn-modal-content"></div><div class="jmn-modal-sure">' + decodeURI("%E7%A1%AE%E5%AE%9A") + '</div><div class="jmn-modal-cancel">' + decodeURI("%E5%8F%96%E6%B6%88") + '</div></div></section>';

            // 添加弹框 ( 页面中同一时间只能有一个弹框存在 )
            if ( !$(".jmn-modal-container").length ) {
                $body.append(modalTemplate);

                // 获取元素
                var $container = $(".jmn-modal-container"),
                    $box = $container.children(),
                    $title = $box.find(".jmn-modal-title"),
                    $content = $title.next(),
                    $sure = $content.next(),
                    $cancel = $sure.next();

                // 获取配置信息
                var config = globalVar.modalConfig;

                // 设置宽度
                var w = config.width;
                if ( w ) {
                    $box.innerWidth(w > $window.width() - 40 ? $window.width() - 40 : w);
                }

                // 添加标题和内容
                $title.html(_title.replace(/<script.*?>.*?<\/script>/gi, ""));
                $content.html(_content.replace(/<script.*?>.*?<\/script>/gi, ""));

                 // alert 弹框去掉 "取消" 按钮
                if ( type === "alert" ) {
                    $cancel.remove();   
                }

                // prompt 弹框添加文本框
                if ( type === "prompt" ) {
                    $content.append('<input type="text" autocomplete="off" maxlength="200" class="jmn-modal-prompt">');
                    $(".jmn-modal-prompt").on("input", function () {
                        globalVar.promptVal = $(this).val();
                    })
                }

                // 隐藏按钮
                var button = config.button;
                var h = 0;
                if ( Fn.false(button) ) {
                    $sure.add($cancel).remove();
                    h = 26 + 13;
                }

                // 限定内容区域最大高度
                var maxHeight = $window.height() - 20 * 2 - 15 * 2 - 26 - 13 - 10 - $title.height() + h;
                if ( $content.height() > maxHeight ) {
                    $content.height(maxHeight).addClass("jmn-modal-contentscroll");
                }

                // 显示动画
                var position = config.position;
                (function show () {
                    $container._animate_({
                        opacity: 1
                    }, time, "ease", function () {
                        var auto = config.autoClose;
                        if ( Fn.number(auto) ) {
                            $box.append('<div class="jmn-modal-autoclose"></div>');
                            $(".jmn-modal-autoclose")._animate_({
                                transform: "scale(1)"
                            }, time + auto, "linear", function () {
                                Fn.closeModal($container, $box, time, position);
                            })
                        }
                    })
                    switch ( position ) {
                        case "center":
                            $box.css({
                                top: "50%",
                                marginTop: "-30px",
                                transform: "translate(-50%, -50%)"
                            }).animate({
                                opacity: 1,
                                marginTop: 0
                            }, time);
                            break;
                        case "bottom":
                            $box.css({
                                bottom: 0,
                                transform: "translate(-50%, 30px)"
                            }).animate({
                                opacity: 1,
                                marginBottom: "50px"
                            }, time);
                            break;
                        default:
                            $box.css("transform", "translate(-50%, -30px)").animate({
                                opacity: 1,
                                marginTop: "50px"
                            }, time);
                    }
                })();

                // 移除弹框     
                $sure.add($cancel).on("click", function () {
                    Fn.closeModal($container, $box, time, position);
                })
                jsModern.keyCode([13, 27], function () {
                    Fn.closeModal($container, $box, time, position);
                })
            }
        },
        closeModal: function ( $container, $box, time, position ) {
            $container.animate({
                opacity: 0
            }, time, function () {
                $container.remove();
                globalVar.modalConfig = {};
                globalVar.promptVal = "";
                globalVar.modal = false;
            });
            switch ( position ) {
                case "center":
                    $box.animate({
                        marginTop: "-30px",
                        opacity: 0
                    }, time);
                    break;
                case "bottom":
                    $box.animate({
                        marginBottom: "30px",
                        opacity: 0
                    }, time);
                    break;
                default:
                    $box.animate({
                        marginTop: 0,
                        opacity: 0
                    }, time);
            }
        }
    };

    // 创建一个随机变量保存数据信息
    var globalVar = window["Global" + Fn.toStringRandom() + Fn.toStringRandom()] = {
        loading: {},
        scrollBar: {},
        modalConfig: {},
        modal: false,
        promptVal: ""
    };

    $(function () {
        $body = $("body");

        // 页面初始化后开启局部样式解析功能
        // 页面初始化后开启实时监听局部样式解析功能
        Fn.scopedCSS();
        Fn.scopedCssListener();
    })
    
    // 内部扩展
    function triggerEvent ( obj, eventType, event ) {
        var originalType = event.type;
        event.type = eventType;
        $.event.dispatch.call(obj, event);
        event.type = originalType;
    }
    $.event.special._wheelUp_ = {
        setup: function () {
            var _this = this;
            $(_this).on("mousewheel DOMMouseScroll", function ( event ) {
                var orgEvent = event.originalEvent;
                var delta;
                if ( orgEvent.wheelDelta ) {
                    delta = orgEvent.wheelDelta > 0 ? "up" : "down";
                } else if ( orgEvent.detail ) {
                    delta = orgEvent.detail < 0 ? "up" : "down";
                }
                orgEvent.preventDefault();
                if ( delta === "up" ) {
                    triggerEvent(_this, "_wheelUp_", event);
                }
            })
        }   
    };
    $.event.special._wheelDown_ = {
        setup: function () {
            var _this = this;
            $(_this).on("mousewheel DOMMouseScroll", function ( event ) {
                var orgEvent = event.originalEvent;
                var delta;
                if ( orgEvent.wheelDelta ) {
                    delta = orgEvent.wheelDelta > 0 ? "up" : "down";
                } else if ( orgEvent.detail ) {
                    delta = orgEvent.detail < 0 ? "up" : "down";
                }
                orgEvent.preventDefault();
                if ( delta === "down" ) {
                    triggerEvent(_this, "_wheelDown_", event);
                }
            })
        }   
    };
    $.each(["_wheelUp_", "_wheelDown_"], function ( i, v ) {
        $.fn[v] = function ( callback ) {
            return this.on(v, callback);
        }
    })
    $.fn.extend({
    	_removeCSS_: function ( names ) {
    		return this.each(function () {
    			var that = this;
    			$.each(names.split(" "), function ( i, v ) {
    				that.style.removeProperty(v);
    			})
    		})
    	},
    	_delay_: function ( time ) {
    		return this.each(function () {
    			$(this).css("transitionDelay", time + "ms");
    		})
    	},
    	_animate_: function ( props, time, easing, callback ) {
    		return this.each(function () {
    			var $this = $(this);
    			$this.css("transitionDuration", (time || 400) + "ms");
    			if ( easing ) {
    				props.transitionTimingFunction = easing || "ease";
    			}
    			setTimeout(function () {
    				$this.css(props);
    			}, _interval);
    			var end = true;
    			$this.on("transitionend", function () {
    				if ( end ) {
    					end = false;
    					$(this)._removeCSS_("transition-delay transition-duration transition-timing-function");
    					callback && callback.call($(this)[0]);
    				}
    			})
    		})
    	},
    	_xyz_: function ( distance, time, easing, callback  ) {
    		return this.each(function () {
    			$(this)._animate_({
    				transform: "translate3d(" + distance + ")"
    			}, time, easing, callback);
    		})
    	}
    });

    // 创建 jsModern
    var jsModern = {
    	version: "7.1.0",
    	isMobile: function () {
            return _mobile;
        },
        random: function ( a, b ) {
            var number = "0123456789",
                en = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ",
                numEN = number + en,
                result = "";
            var A_num = Fn.number(a),
                B_num = Fn.number(b);
            function create ( min, max ) {
                return Math.floor(Math.random() * (max - min + 1) + min);
            }

            // 传入两个参数并且参数均为数字
            // 则生成两个数字之间的任意数字
            // 生成结果的范围包括两个边界值
            if ( A_num && B_num ) {
                result = Number(create(a, b));
            }

            // 传入两个参数
            // 第一个参数是数字
            // 第二个参数是布尔值且为 true
            // 则生成指定长度的可能含有数字或大小写英文字母组成的随机字符串
            if ( A_num && Fn.true(b) ) {
                while ( result.length < a ) {
                    result += numEN[create(0, 61)];
                }
            }

            // 传入两个参数
            // 第一个参数是数字
            // 第二个参数是布尔值且为 false
            // 则生成指定长度的由大小写英文字母组成的随机字符串
            if ( A_num && Fn.false(b) ) {
                while ( result.length < a ) {
                    result += en[create(0, 51)];
                }
            }

            // 只传入一个大于 0 的整数作为参数
            // 则生成指定长度的纯数字随机数
            if ( b === undefined && A_num && a > 0 ) {
                while ( result.length < a ) {
                    result += number[create(0, 9)];
                }
                result = Number(result); 
                var resultSize = result.toString().length;
                if ( resultSize < a ) {
                    var n = "";
                    for ( var i = 0; i < a - resultSize; i++ ) {
                        n += create(0, 9);
                    }
                    result = result + n;
                }
                result = Number(result); 
            }

            // 传入一个 Object 类型的参数
            // 则生成自定义字符串集合中的指定长度的随机字符串
            if ( b === undefined && $.isPlainObject(a) ) {
            	var result = "";
            	var string = jsModern.unique(a.string),
            		size = parseInt(a.length); 
            	var length = string.length;
            	if ( size > length ) {
            		size = length;
            	}
            	if ( size < 0 ) {
            		size = 0;
            	}
            	for ( var i = 0; i < size; i++ ) {
            		result += a.string[create(0, a.string.length - 1)];
            	}
            }

            // 无参数则返回 0-1 之间的随机数
            if ( arguments.length == 0 ) {
                result = Math.random();
            }

            return result;
        },
        uuid: function () {
            var en = "abcdef",
                str = "", 
                uuid = [];
            for ( var i = 0; i < 14; i++ ) {
        
                // 生成一个由 a-f 组成的 14 位长度的随机字符串
                str += en[jsModern.random(0, 5)];
            }
             
            // 生成一个保留 16 个小数位的随机数
            // 将整数和小数点替换成随机字符串
            // 最终得到一个 32 位长度的字符串
            var result = (Math.random().toFixed(16).replace("0.", jsModern.random(10, 99)) + str).split("");
            
            // 将上面得到的 32 位字符串打乱顺序重新组合
            // uuid 的总长度是 36 ( 含有 4 个横线 )
            for ( var i = 0; i < 36; i++ ) {
                var r = jsModern.random(0, 31);
                uuid[i] = result[r];
                result.slice(r, 1); 
            }
            uuid[8] = uuid[13] = uuid[18] = uuid[23] = "-";

            return uuid.join("");
        },
        time: function ( time, delimiter ) {

            // 无参数时直接返回 Date.now()
            if ( !arguments.length ) {
                return Date.now();
            }

            // 年月日分隔符默认采用 "-"
            delimiter = delimiter || "-";

            // 将传入的 "毫秒数" 时间进行转换
            time = new Date(time);
            var set = {
                yy: time.getFullYear(),
                mm: time.getMonth() + 1,
                dd: time.getDate(),
                h: time.getHours(),
                m: time.getMinutes(),
                s: time.getSeconds()
            };

            // 月份和日期如果不足两位数则自动补零
            for ( var t in set ) {
                var v = set[t];
                set[t] = v < 10 ? "0" + v : v;
            }
            return set.yy + delimiter + set.mm + delimiter + set.dd + " " + set.h + ":" + set.m + ":" + set.s;
        },
        cookie: function ( name, value, expires ) {
            var length = arguments.length;

            // 获取 cookie
            if ( length == 1 && Fn.string(name) ) {
                var allCookies = document.cookie.replace(/[=]/g, "; ").split("; ");
                var result = "";
                $.each(allCookies, function ( i, v ) { 
                    if ( v === name ) {
                        result = allCookies[i + 1];
                    }
                })
                return result !== "" ? result : null;
            }

            // 设置 cookie
            if ( length >= 2 ) {
                document.cookie = name + "=" + value + (length == 3 ? ";expires=" + expires : "");
                return this;
            }
            if ( length == 1 && $.isPlainObject(name) ) {
                $.each(name, function ( i, v ) {
                    document.cookie = i + "=" + v;
                })
                return this;
            }   
        },
        removeCookie: function ( name ) {
            var pass = "=; expires=Thu, 01 Jan 1970 00:00:00 GMT;";
            if ( name ) {
                name.replace(/\s+/g, " ").trim().split(" ").forEach(function ( v ) {
                    document.cookie = v + pass;
                })
            } else {
                var allCookies = document.cookie.replace(/[=]/g, "; ").split("; ");
                if ( allCookies ) { 
                    allCookies.forEach(function ( v ) {
                        document.cookie = v + pass;
                    })
                }
            }
            return this;
        },
        session: function ( name, value ) {
            
            // 设置 sessionStorage
            if ( name && value ) {
                sessionStorage.setItem(name, value);
                return this;
            }
            if ( $.isPlainObject(name) && !value ) {
                $.each(name, function ( i, v ) {
                    sessionStorage.setItem(i, v);
                })
                return this;
            }
            
            // 获取 sessionStorage
            if ( Fn.string(name) && !value ) {
                return sessionStorage.getItem(name);
            }
        },
        removeSession: function ( name ) {
            if ( !name ) {
                sessionStorage.clear();
            } else {
                name.replace(/\s+/g, " ").trim().split(" ").forEach(function ( v ) {
                    sessionStorage.removeItem(v);
                })
            }
            return this;
        },
        local: function ( name, value ) {
            
            // 设置 localStorage
            if ( name && value ) {
                localStorage.setItem(name, value);
                return this;
            }
            if ( $.isPlainObject(name) && !value ) {
                $.each(name, function ( i, v ) {
                    localStorage.setItem(i, v);
                })
                return this;
            }
            
            // 获取 localStorage
            if ( Fn.string(name) && !value ) {
                return localStorage.getItem(name);
            }
        },
        removeLocal: function ( name ) {
            if ( !name ) {
                localStorage.clear();
            } else {
                name.replace(/\s+/g, " ").trim().split(" ").forEach(function ( v ) {
                    localStorage.removeItem(v);
                })
            }
            return this;
        },
        toBase64: function ( src, callback ) {
            var results = [];

            // 图片以数组形式处理
            if ( !Array.isArray(src) ) {
                src = [src];
            }
            var size = src.length;
            (function loadImg ( i ) {
                var img = new Image();
                img.crossOrigin = "anonymous";
                img.src = i;
                img.onload = function () {
                	var dataURL = "";

                	// 获取图片真实宽高和格式
                    var width = this.width,
                        height = this.height,
                        type = i.substring(i.lastIndexOf(".") + 1).toLowerCase().replace(/\?(.*)/, ""); 

                    // 创建 canvas
                    var canvas = document.createElement("canvas");
                    canvas.width = width;
                    canvas.height = height;

                    // 写入图片获取数据
                    canvas.getContext("2d").drawImage(img, 0, 0, width, height);
                    dataURL = canvas.toDataURL("image/" + (type === "png" ? "png" : "jpeg"), 1.0);
                    results.push(dataURL);
                    src.splice(0, 1);
                    if ( src.length ) {
                    	loadImg(src[0]);
                    } else {
                    	if ( callback && Fn.function(callback) ) {
	                        callback(Fn.string(src) ? results[0] : results);
	                    }
                    }
                }
            })( src[0] );
            return this;
        },
        preloadImage: function ( images, callback ) {

            // 图片参数只能是数组形式
            if ( !Array.isArray(images) ) {
                return this;
            }

            // 必须至少传入一张图片
            var size = images.length;
            if ( !size ) {
                return this;
            }

            // 检测图片格式
            function check ( src ) {
                return !!(src.substr(src.lastIndexOf(".") + 1, 4).replace(/\?(.*)/, "").match(/(jpg|jpeg|png|ico|bmp|gif)/i));
            }

            !(function preload ( image ) {

                // 格式符合要求
                if ( check(image) ) {
                    var img = new Image();
                    img.src = image;
                    img.onload = function () {
                        size--;
                        images.splice(0, 1);
                        if ( size ) {
                            preload(images[0]);
                        } else {
                            callback && callback();
                        }
                    }
                }
            })( images[0] );
            return this;
        },
        keyCode: function ( keycode, callback ) {
            if ( !Array.isArray(keycode) ) {
                keycode = [keycode];
            }
            $document.on("keyup", function ( event ) {
                var code = event.keyCode;
                if ( keycode.indexOf(code) > -1 ) {
                    callback();
                }
            })
            return this;
        },
        textBind: function ( selector, target ) {
            function setVal ( v ) {
                $(target).each(function () {
                    $(this)[(this.nodeName.match(/input/i) ? "val" : "text")](v);
                })
            }
            $(selector).each(function () {
                var $this = $(this);
                $this.on("input", function () {
                    setVal($this.val());
                })
            })
            return this;
        },
        getScript: function ( src, callback ) {
            src = Fn.string(src) ? [src] : src;
            if ( Array.isArray(src) ) {
                var size = src.length;
                var complete = 0;
                src.forEach(function ( v ) {
                    Fn.createScript(v).onload = function () {
                        complete++;
                        if ( complete == size ) {
                            callback && callback();
                        }
                    }
                })
            }
            return this;
        },
        handlebars: function ( options ) {
            var template = $.trim(options.template),
                target = options.appendTo,
                data = options.data;

            // 必须设置了模板 / 目标元素 / 数据
            if ( !template || !target || !data ) {
                return this;
            }

            // 判断是否已经引入了 handlebars 文件
            // 如果没有引入则调用来自 bootcdn 的在线资源
            if ( typeof Handlebars === "undefined" ) {
                jsModern.getScript("https://cdn.bootcss.com/handlebars.js/4.0.11/handlebars.min.js", function () {
                    startCompile();
                })
            } else {
                startCompile();
            }

            // 解析函数
            function startCompile () {
                var compiled = {};
                if ( !compiled[template] ) {
                    compiled[template] = Handlebars.compile(template);
                }
                if ( options.helper ) {
                    $.each(options.helper, function ( i, v ) {
                        Handlebars.registerHelper(i, v);
                    })
                }
                $(target).append(compiled[template](data));
            }
            return this;
        },
        unique: function ( obj ) {
            if ( Array.isArray(obj) ) {
                return Array.from ? Array.from(new Set(obj)) : (function () {
                    var set = {},
                        result = [];
                    for ( var i = 0, j = obj.length; i < j; i++ ) {
                        var each = obj[i];
                        var type = Type(each);
                        if ( !set[each + type] ) {
                            result.push(each);
                            set[each + type] = true;
                        }
                    }
                    return result;
                })();
            } else if ( Fn.string(obj) || Fn.number(obj) ) {
                var _obj = String(obj);
                var result = "";
                for ( var i = 0, j = _obj.length; i < j; i++ ) {
                    if ( result.indexOf(_obj[i]) === -1 ) {
                        result += _obj[i];
                    }
                }
                return Fn.string(obj) ? result : Number(result);
            } else {
                return obj;
            }
        },
        fullScreenIn: function () {
        	Fn.fullScreenIn();
        	return this;
        },
        fullScreenOut: function () {
        	Fn.fullScreenOut();
        	return this;
        },
        limit: function ( input, target, options ) {
            var max = ~~options.max,
                inLimit = options.inLimit,
                outLimit = options.outLimit;
            var $input = $(input),
                $target = $(target);
            $target.text(max);
            $input.attr("maxlength", max).on("input", function () {
                var surplus = max - $(this).val().length;
                $target.text(surplus);
                if ( surplus <= 0 ) {
                    outLimit && outLimit();
                } else {
                    inLimit && inLimit();
                }
            })
            return this;
        },
        noConflict: function () {
            window.jsModern = _jsmodern;
            return jsModern;
        },
        share: function ( target, options ) {
            var webURL = encodeURIComponent(window.location.href),
                title = document.title;
            var $qrcodeCache;

            // 二维码生成函数
            function createQrcode ( type ) {
                if ( !$(".jmn-share-layer").length && !$qrcodeCache ) {

                    // 添加二维码结构层
                    $("body").append('<section class="jmn-share-layer jmn-noselect" style="display:none;"><b><svg width="9" height="9" version="1.1"><line x1="1" y1="1" x2="8" y2="8" stroke-linecap="round" stroke-linecap="round" stroke="#FFF" stroke-width="1.5"/><line x1="8" y1="1" x2="1" y2="8" stroke-linecap="round" stroke-linecap="round" stroke="#FFF" stroke-width="1.5"/></svg></b><p>' + decodeURI("%E7%BD%91%E7%AB%99%E4%BA%8C%E7%BB%B4%E7%A0%81") + '</p><a href="' + window.location.href + '"><section></section></a></section>');
                    var $layer = $(".jmn-share-layer"),
                        $qrcode = $layer.find("section");

                    // 二维码生成操作借助于第三方开源程序库 "jquery.qrcode"
                    // 资源获取自 BootCDN ( 官网链接 http://www.bootcdn.cn/ )
                    Fn.createScript("https://cdn.bootcss.com/jquery.qrcode/1.0/jquery.qrcode.min.js", "jmn-share-qrcode").onload = function () {
                        $qrcode.qrcode({
                            render: "canvas",
                            text: decodeURIComponent(webURL),
                            width: $qrcode.width(),
                            height: $qrcode.height(),
                            background: "#FFF",
                            foreground: "#000"
                        });
                        $layer.show();
                        $qrcodeCache = $(".jmn-share-layer");
                        $("#jmn-share-qrcode").remove();
                        (type === "load") && $layer.remove();
                    }
                }
            }

            // 网页所有资源加载完毕后
            // 自动进行二维码生成操作
            $window.on("load", function () { 
                createQrcode("load");
            })

            var firefox = _ua.match("firefox");

            // 生成分享按钮
            var en_name = ["qrcode", "douban", "qzone", "sina", "qq"],
                cn_name = ["%E6%89%AB%E4%B8%80%E6%89%AB%E5%88%86%E4%BA%AB", "%E5%88%86%E4%BA%AB%E5%88%B0%E8%B1%86%E7%93%A3%E7%BD%91", "%E5%88%86%E4%BA%AB%E5%88%B0QQ%E7%A9%BA%E9%97%B4", "%E5%88%86%E4%BA%AB%E5%88%B0%E6%96%B0%E6%B5%AA%E5%BE%AE%E5%8D%9A", "%E5%88%86%E4%BA%AB%E7%BB%99QQ%E5%A5%BD%E5%8F%8B"];
            var $target = $(target);
            $target.empty().html('<i jmn-share><svg viewBox="0 0 1024 1024" width="20" height="20" version="1.1"><path d="M62.996776 484.061694l423.162696 0L486.159472 60.900022 62.996776 60.900022 62.996776 484.061694zM168.788218 166.69044l211.580836 0 0 211.580836L168.788218 378.271276 168.788218 166.69044zM539.055193 60.900022l0 423.162696 423.162696 0L962.217888 60.900022 539.055193 60.900022zM856.426447 378.271276 644.845611 378.271276 644.845611 166.69044l211.580836 0L856.426447 378.271276zM221.682915 325.376579l105.790418 0L327.473333 219.585137 221.682915 219.585137 221.682915 325.376579zM62.996776 960.120111l423.162696 0L486.159472 536.957415 62.996776 536.957415 62.996776 960.120111zM168.788218 642.747833l211.580836 0 0 211.580836L168.788218 854.328669 168.788218 642.747833zM803.531749 219.585137 697.740308 219.585137l0 105.790418 105.790418 0L803.530726 219.585137zM539.055193 960.120111l105.790418 0L644.845611 854.329692 539.055193 854.329692 539.055193 960.120111zM644.845611 642.747833l0 211.580836 105.790418 0L750.636029 642.747833 644.845611 642.747833zM856.426447 854.329692 750.636029 854.329692 750.636029 960.120111l211.580836 0L962.216865 748.538251 856.426447 748.538251 856.426447 854.329692zM856.426447 642.747833l105.790418 0L962.216865 536.957415 856.426447 536.957415 856.426447 642.747833zM539.055193 536.957415l0 105.790418 105.790418 0L644.845611 536.957415 539.055193 536.957415zM221.682915 801.433972l105.790418 0L327.473333 695.643554 221.682915 695.643554 221.682915 801.433972z" fill="#FFF"></path></svg></i><i jmn-share><svg viewBox="0 0 1024 1024" width="20" height="20" version="1.1"><path d="M881.777778 113.777778 170.666667 113.777778l0 85.333333 711.111111 0L881.777778 113.777778zM824.888889 625.777778 824.888889 284.444444 227.555556 284.444444l0 341.333333L824.888889 625.777778zM312.888889 369.777778l426.666667 0 0 170.666667L312.888889 540.444444 312.888889 369.777778zM711.111111 796.444444c27.505778-42.126222 45.056-81.436444 69.091556-136.874667l-91.960889-33.507556C664.348444 691.740444 657.464889 742.286222 625.777778 796.444444l-170.666667 0c-26.510222-70.172444-66.730667-120.689778-100.295111-170.353778l-84.565333 33.507556C305.123556 711.907556 348.216889 751.104 369.777778 796.444444L142.222222 796.444444l0 85.333333 768 0 0-85.333333L711.111111 796.444444z" fill="#FFF"></path></svg></i><i jmn-share><svg viewBox="0 0 1024 1024" width="20" height="20" version="1.1"><path d="M992.5 394.289c0-10.631 0-7.748-10.631-7.748H694.53l-42.644-75.859L534.884 85.748h-21.322L407.131 310.682l-42.584 75.859H31.5v4.865l60.063 42.584 168.415 149.075-38.2 340.795c0 10.631 2.162 10.631 23.484 10.631l277.789-170.397 277.248 170.397c10.691 0 10.991 0 21.562-10.631l-53.095-340.795 159.706-137.003 64.027-51.774z m-702.431 326.5L598.73 469.247l-287.339-49.251h436.414L481.668 660.907l276.708 59.882H290.069z" fill="#FFF"></path></svg></i><i jmn-share><svg viewBox="0 0 1024 1024" width="20" height="20" version="1.1"><path d="M424.9 217.9c-71.5-6-237.6 48.3-392.7 301.1 0 0-113.8 204.4 117.8 327.2 0 0 193.3 114.8 466.2 34.2 0 0 276.9-91.6 251.7-283.9 0 0-21.1-79.5-118.8-102.7 0 0-30.2-4-13.1-34.2 0 0 43.3-88.6-41.3-124.9 0 0-75.5-18.1-167.1 28.2 0 0-60.4 34.2-31.2-40.3C495.3 321.6 509.4 224.9 424.9 217.9L424.9 217.9zM700.7 632.7c0 104.7-134.9 219.5-300.1 219.5-194.3 0-300.1-84.6-300.1-190.3 0-104.7 153-205.4 319.2-205.4C585 456.5 700.7 528 700.7 632.7z" p-id="5209" fill="#ffffff"></path><path d="M533.6 669c-5 76.5-69.5 135.9-155.1 139-103.7 4-172.2-43.3-160.1-136.9 9.1-76.5 75.5-141 160.1-141C464.1 530 539.6 576.3 533.6 669L533.6 669zM431.9 648.8c0-11.1-9.1-20.1-20.1-20.1s-20.1 9.1-20.1 20.1 9.1 20.1 20.1 20.1C422.8 670 431.9 660.9 431.9 648.8L431.9 648.8zM377.5 697.2c0-27.2-25.2-49.3-53.4-45.3s-55.4 25.2-55.4 52.4 23.2 47.3 52.4 47.3C350.3 752.6 377.5 724.4 377.5 697.2z" p-id="5210" fill="#ffffff"></path><path d="M694.7 186.7c5-2 9.1-3 14.1-4s10.1-2 16.1-3c-17.1 2-3 1 0 0 4 0 8.1-1 13.1-1 8.1 0 16.1 0 25.2 0 5 0 9.1 1 14.1 1-13.1-2-4-1-1 0s6 1 10.1 2c10.1 2 20.1 5 30.2 9.1 3 1 5 2 8.1 3-10.1-4-1 0 1 0 6 3 12.1 6 19.1 10.1 5 3 11.1 7 16.1 10.1 3 2 5 4 8.1 6-8.1-6 1 1 2 2 11.1 9.1 21.1 19.1 31.2 30.2 1 1 8.1 10.1 1 1 2 2 3 5 5 7 3 5 6 10.1 9.1 14.1 3 5 5 10.1 7 15.1 4 9.1-3-9.1 0 0 1 3 2 6 4 10.1 3 9.1 5 19.1 7 29.2 0 2 1 5 1 7-2-13.1-1-5 0-2 1 5 1 10.1 1 16.1 0 8.1 0 17.1-1 25.2 0 4-1 8.1-1 12.1 2-16.1 0 0-1 3-2 11.1-5 21.1-8.1 31.2-2 6-9.1 21.1-1 3-9.1 20.1-6 44.3 15.1 56.4 18.1 10.1 47.3 6 56.4-15.1 25.2-55.4 30.2-121.8 13.1-181.2C979.7 177.6 874.9 105.1 767.2 96.1c-30.2-2-63.4 0-91.6 10.1-21.1 7-35.2 28.2-29.2 50.3C649.4 178.6 673.6 194.7 694.7 186.7L694.7 186.7z" p-id="5211" fill="#ffffff"></path><path d="M715.8 301.5c3-1 5-1 8.1-2 9.1-2-5 0 3 0 4 0 9.1-1 13.1-1 16.1 0 34.2 4 47.3 16.1 2 2 4 4 7 6 0 0 6 7 3 4 2 2 3 5 4 7s2 3 2 5c-1-2-1-2 0 1 2 5 3 10.1 4 15.1 2 8.1 0-5 0 2 0 3 0 6 0 9.1 0 4 0 8.1 0 12.1 0 2 0 4-1 5 1-9.1 0-1 0 0-1 3-1 6-2 9.1-4 14.1 5 30.2 19.1 33.2 15.1 4 29.2-5 33.2-19.1 14.1-45.3 3-98.7-33.2-129.9-32.2-29.2-82.6-39.3-124.9-27.2C667.5 258.2 682.6 310.5 715.8 301.5L715.8 301.5z" fill="#FFF"></path></svg></i><i jmn-share><svg viewBox="0 0 1024 1024" width="20" height="20" version="1.1"><path d="M828 340q0-128-94-220t-228-92q-132 0-226 92t-94 220q0 46 12 88-202 158-132 346 54-4 98-84 22 78 74 138-84 24-84 74 0 86 162 86 96 0 144-44 26 4 46 4t48-4q46 44 142 44 164 0 164-86 0-50-86-74 54-62 74-138 44 80 100 84 68-188-134-346 14-44 14-88l0 0z" fill="#FFF"></path></svg></i>').on("click", "i", function () {
                switch ( $(this).index() ) {
                    case 0:
                        !$qrcodeCache ? createQrcode() : (!$(".jmn-share-layer").length && $("body").append($qrcodeCache)); 
                        break;
                    case 1:
                        (function(){var d=document,e=encodeURIComponent,s1=window.getSelection,s2=d.getSelection,s3=d.selection,s=s1?s1():s2?s2():s3?s3.createRange().text:'',r='https://www.douban.com/recommend/?url='+e(webURL)+'&title='+e(title)+'&sel='+e(s)+'&v=1',w=450,h=330,x=function(){if(!window.open(r,'douban'))location.href=r+'&r=1'};if(firefox){window.setTimeout(x,0)}else{x()}})();
                        break;
                    case 2:
                        window.open('http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=' + webURL + '&title=' + title);
                        break;
                    case 3:
                        (function(s,d,e){try{}catch(e){}var f='http://v.t.sina.com.cn/share/share.php?',u=d.location.href,p=['url=',e(u),'&title=',e(title),'&appkey=2924220432','&pic=',e(webURL)].join('');function a(){if(!window.open([f,p].join(''),'mb'))u.href=[f,p].join('');};if(firefox){window.setTimeout(a,0)}else{a()}})(screen,document,encodeURIComponent);
                        break;
                    case 4:
                        window.open('http://connect.qq.com/widget/shareqq/index.html?url=' + webURL + '&title=' + title + '&desc=' + title);
                        break;
                }
            }).children().each(function ( i ) {
                $(this).attr("jmn-" + en_name[i], "").append("<i>" + decodeURI(cn_name[i]) + "<i></i></i>");
            }).find("i").each(function () {
                $(this).css("backgroundColor", $(this).parent().css("backgroundColor"));
            }).hide();

            // 关闭二维码弹框
            $document.on("click", ".jmn-share-layer b", function () {
                $(this).parent().remove();
            })

            // 配置参数
            if ( options ) {
                $.each(options, function ( i, v ) {
                    if ( i === "tip" && !_mobile ) {
                        if ( Fn.true(v) ) {
                            $target.on("mouseenter", "i", function () {
                                $(this).find("i").show();
                            }).on("mouseleave", "i", function () {
                                $(this).find("i").hide();
                            })
                        }
                    } else {
                        if ( Fn.false(v) ) {
                            $target.find("i[jmn-" + i + "]").remove();
                        }
                    }
                })
            }
            return this;
        },
        top: function () {
            var $htmlBody = $("html, body");
            var arg_0 = arguments[0],
                arg_1 = arguments[1];

            function top ( selector, theme, time, distance ) {
                var $top = $(selector).first();

                // 使用内置主题
                if ( Fn.string(theme) && theme.match(/(A|B)/) ) {
                    $top.empty().hide().addClass("jmn-top");
                    if ( theme === "A" ) {
                        $top.append('<svg width="20" height="12" version="1.1"><line x1="10" y1="1" x2="1" y2="10" stroke-linecap="round" stroke="#FFF" stroke-width="1.5"/><line x1="10" y1="1" x2="19" y2="10" stroke-linecap="round" stroke="#FFF" stroke-width="1.5"/></svg>');
                    }
                    if ( theme === "B" ) {
                        $top.css({
                            height: "40px",
                            borderRadius: "20px"
                        }).append('<svg width="20" height="18" version="1.1"><line x1="10" y1="1" x2="3" y2="8" stroke-linecap="round" stroke="#FFF" stroke-width="1.5"/><line x1="10" y1="1" x2="17" y2="8" stroke-linecap="round" stroke="#FFF" stroke-width="1.5"/><line x1="10" y1="1" x2="10" y2="17" stroke-linecap="round" stroke="#FFF" stroke-width="1.5"/></svg>');
                    }
                }

                // 若元素默认处于隐藏状态
                // 则监听 window 对象的 scroll 事件
                if ( $top.is(":hidden") ) {
                    var scrollFn = function () {
                        var top = $(this).scrollTop();
                        if ( top > (distance || 300) ) {
                            $top.stop().fadeIn(100);
                        }
                        if ( top === 0 ) {
                            $top.stop().fadeOut(100);
                        }
                    }
                    $window.on("scroll", scrollFn);
                }

                // 返回顶部按钮事件
                var opacity = $top.css("opacity");
                $top.on({
                    click: function () {
                        $top.css("transition", "0s");
                        $htmlBody.stop().animate({
                            scrollTop: 0
                        }, time || 300); 
                    },
                    mouseenter: function () {
                        $top.css({
                            transition: ".2s",
                            opacity: .85
                        });
                    },
                    mouseleave: function () {
                        $top.css("opacity", opacity);
                    }
                });
            }

            // 如果传入的第一个参数是 true
            // 则直接生成一个返回顶部按钮
            // 样式采用 theme: "B"
            // 其他参数据采用默认配置
            if ( Fn.true(arg_0) ) {
                var str = "jmn-" + jsModern.random(10, false);
                $("body").append('<div id="' + str + '" style="display:none;"></div>');
                top("#" + str, "B", arg_1, null);
            }

            // 如果传入的第一个参数是 false
            // 则转变成实现 "去往底部" 的功能方法
            if ( Fn.false(arg_0) ) {
                if ( arguments.length == 1 ) {
                    $window.scrollTop($document.height());
                } else {
                    $htmlBody.animate({
                        scrollTop: $document.height()
                    }, arg_1);
                }
                return this;
            }

            // 第一个参数是选择器
            var time, distance, theme;

            // 第二个参数是 object 类型
            if ( $.isPlainObject(arg_1) ) {
                time = arg_1.time;
                distance = arg_1.distance;
                theme = arg_1.theme;
                top(arg_0, theme, time, distance);
            }

            // 第二个参数是正整数
            if ( !Fn.boolean(arg_0) && Fn.number(arg_1) ) {
                top(arg_0, null, arg_1, null);
            }

            // 只传入选择器
            if ( arguments.length == 1 && !Fn.boolean(arg_0) ) {
                top(arg_0, null, null, null);
            }
            return this;
        },
        lazyload: function ( images, options ) {

            // 可选参数: 占位图 / 显示效果 / 临界值 / 方向
            var placeholder,
                effect,
                threshold,
                axis;
            if ( options ) {
                placeholder = options.placeholder;
                effect = options.effect && options.effect.replace(/\s+/g, "");
                threshold = options.threshold;
                axis = options.axis;
                if ( Fn.true(placeholder) ) {
                    placeholder = "data:img/jpg;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAMAAAAoyzS7AAAAA1BMVEXd3d3u346CAAAADUlEQVR42gECAP3/AAAAAgABUyucMAAAAABJRU5ErkJggg==";
                }
            }
            if ( !effect ) {
                effect = "show";
            }
            function showImg ( elem, isImg, src, srcset ) {
                if ( srcset && isImg ) {
                    elem.attr("srcset", srcset);
                }
                $("<img/>").attr("src", src).on("load", function () {
                    $(this).remove();
                    isImg ? elem.attr("src", src) : elem.css("background-image", "url(" + src + ")");
                    elem.removeAttr("data-src data-srcset").data("jmnLazyloadShow", true);
                    var effectName = effect.substring(0, 6),
                        effectSpeed = effect.match(/\((.*)\)/); 
                    if ( effectName === "fadeIn" ) {
                        elem.hide()[effectName](effectSpeed ? (parseInt(effectSpeed[1]) || 400) : 400);
                    }
                })
            }
            $(images).each(function () {
                var $this = $(this),
                    isImg = !!(this.nodeName.toLowerCase() === "img");
                var src = $this.attr("data-src"),
                    srcset = $this.attr("data-srcset"); 
                if ( placeholder ) {
                    isImg ? $this.attr("src", placeholder) : $this.css("background-image", "url(" + placeholder + ")");
                } 
                function check () {
                    if ( !$this.data("jmnLazyloadShow") && $this.css("display") !== "none" ) {
                        var bound = $this[0].getBoundingClientRect(); 
                        if ( axis === "y" || !axis ) {
                            if ( $window.height() > bound.top - (threshold || 0) ) {
                                showImg($this, isImg, src, srcset);
                            }
                        }
                        if ( axis === "x" ) {
                            if ( $window.width() > bound.left - (threshold || 0) ) {
                                showImg($this, isImg, src, srcset);
                            }
                        }
                    }
                }
                check();
                $window.on({
                    scroll: check,
                    resize: check
                });
            })
            return this;
        },
        picture: function ( target, images, options ) {
            var size = images.length;

            // 配置参数
            var arrows = true, 
                dots = true, 
                autoplay = false,
                type = "slide";
            if ( options && !$.isEmptyObject(options) ) {
                arrows = options.arrow;
                dots = options.dot;
                autoplay = options.autoplay;
                type = options.type || "slide";
            }

            // 解析图片
            if ( !Array.isArray(images) ) {
                return this;
            }
            var img = "",
                dot = "";
            $.each(images, function ( i, v ) {
                dot += "<i></i>";
                if ( Fn.string(v) ) {
                    img += '<div><img src="' + v + '"></div>';
                }
                if ( $.isPlainObject(v) ) {
                    img += '<div><a href="' + (v.href || "") + '"><img src="' + (v.src || "") + '"><p><span>' + (v.title || "") + '</span></p></a></div>';
                }
            })
            if ( type === "slide" ) {
                img = '<div class="jmn-picture-inner">' + img.substring(img.lastIndexOf('<div>')) + img + img.substring(0, img.indexOf("</div>") + 6) + '</div>';
            }
            if ( type === "fade" ) {
                img = '<div class="jmn-picture-inner">' + img + '</div>';
            }
            img = img + ('<div class="jmn-picture-dot">' + dot + '</div>') + ('<div class="jmn-picture-arrow"><svg viewBox="0 0 1024 1024" version="1.1" width="32" height="32"><path d="M532.526499 904.817574L139.506311 511.797385 532.526499 118.777197c12.258185-12.258185 12.432147-32.892131-0.187265-45.51052-12.707416-12.707416-32.995485-12.703323-45.511543-0.187265L75.166957 484.739123c-7.120165 7.120165-10.163477 17.065677-8.990768 26.624381-1.500167 9.755178 1.5104 20.010753 8.990768 27.491121l411.660734 411.660734c12.258185 12.258185 32.892131 12.432147 45.511543-0.187265 12.707416-12.707416 12.7023-32.995485 0.187265-45.51052z" fill="#FFF"></path></svg></div><div class="jmn-picture-arrow"><svg viewBox="0 0 1024 1024" version="1.1" width="32" height="32"><path d="M492.675886 904.817574L885.696074 511.797385 492.675886 118.777197c-12.258185-12.258185-12.432147-32.892131 0.187265-45.51052 12.707416-12.707416 32.995485-12.703323 45.511543-0.187265l411.660734 411.660734c7.120165 7.120165 10.163477 17.065677 8.990768 26.624381 1.500167 9.755178-1.5104 20.010753-8.990768 27.491121L538.374694 950.515359c-12.258185 12.258185-32.892131 12.432147-45.511543-0.187265-12.707416-12.707416-12.703323-32.995485-0.187265-45.51052z" fill="#FFF"></path></svg></div>');

            $(target).each(function () {
                var $this = $(this);
                var width = $this.innerWidth(),
                    height = $this.innerHeight();

                // 设置定位
                if ( $this.css("position") === "static" ) {
                    $this.css("position", "relative");
                }

                $this.css("overflow", "hidden").empty().html(img).on("selectstart", function () {
                    return false;
                }).data("jmnPictureIndex", 0);

                var $inner = $this.children().first(),
                    $div = $inner.children(),
                    $a = $div.find("a"),
                    $img = $div.find("img"),
                    $p = $div.find("p"),
                    $dot = $inner.next(),
                    $i = $dot.children(),
                    $arrow = $this.find(".jmn-picture-arrow");

                // 设置尺寸
                $inner.height(height);
                if ( type === "slide" ) {
                    $inner.width(width * (size + 2)).css("transform", "translate3d(-" + width + "px, 0, 0)");
                }
                if ( type === "fade" ) {
                    $inner.width(width);
                    $div.css("position", "absolute").hide().first().show();
                }
                $div.add($a).add($img).width(width).height(height);
                $p.width(width);

                // 调整按钮位置
                $dot.css($p.length ? {right:"10px"} : {left:"50%",transform:"translateX(-50%)"});
                $i.first().addClass("active");

                // 去除无用链接和标题
                $a.each(function () {
                    if ( !$(this).attr("href") ) {
                        $(this).find("img").unwrap();
                    }
                })
                $p.each(function () {
                    if ( !$(this).children().html() ) {
                        $(this).remove();
                    }
                })

                // 根据传入的参数判断是否显示按钮和箭头
                if ( Fn.false(arrows) ) { 
                    $arrow.remove();
                }
                if ( Fn.false(dots) ) {
                    $dot.remove();
                }

                // 切换函数
                var animated = false;
                var Animation = function ( i ) {
                    if ( !animated ) { 
                        animated = true;
                        if ( type === "slide" ) {
                            $inner.css({
                                transition: "all .7s cubic-bezier(0.55, 0, 0.175, 1) 0s",
                                transform: "translate3d(-" + (width * i + width) + "px, 0, 0)",
                            })
                            var timer = window.setTimeout(function () {
                                animated = false;
                                $inner.css("transition", "0s");
                                if ( i == -1 ) {
                                    $inner.css("transform", "translate3d(-" + (width * size) + "px, 0, 0)");
                                    i = size - 1;
                                }
                                if ( i == size ) {
                                    $inner.css("transform", "translate3d(-" + width + "px, 0, 0)");
                                    i = 0;
                                }
                                dotSwitch(i);
                                $this.data("jmnPictureIndex", i);
                                window.clearTimeout(timer);
                            }, 700);
                        }
                        if ( type === "fade" ) { 
                            if ( i > size - 1 ) {
                                i = 0;
                            }
                            if ( i < 0 ) {
                                i = size - 1;
                            }
                            $div.eq(i).stop().fadeIn(700, function () {
                                animated = false;
                                dotSwitch(i);
                                $this.data("jmnPictureIndex", i);
                            }).siblings().stop().fadeOut(700);
                        }
                    }
                }

                // 按钮状态切换函数
                var dotSwitch = function ( i ) {
                    $i.eq(i).addClass("active").siblings().removeClass("active");
                }

                // 按钮切换和箭头切换
                $i.on("click", function () { 
                    var index = $(this).index();
                    Animation(index);
                    $this.data("jmnPictureIndex", index);        
                })
                $arrow.first().on("click", function () { 
                    var index = $this.data("jmnPictureIndex");
                    index--;
                    Animation(index);
                }).next().on("click", function () { 
                    var index = $this.data("jmnPictureIndex");
                    index++
                    Animation(index);
                })
                
                // 自动执行动画
                if ( Fn.number(autoplay) ) {
                    var autoAnimate = window.setInterval(function () {
                        var getIndex = $this.data("jmnPictureIndex");
                        getIndex++;
                        Animation(getIndex);
                    }, autoplay);
                    $this.on({
                        mouseenter: function () {
                            window.clearInterval(autoAnimate);
                        },
                        mouseleave: function () {
                            autoAnimate = window.setInterval(function () {
                                var getIndex = $this.data("jmnPictureIndex");
                                getIndex++;
                                Animation(getIndex);
                            }, autoplay);
                        }
                    });
                }
            })
            return this;
        },
        imageView: function ( selector, options ) {

            // 基础参数
            var hasScale, hasSwitch, hasRotate;
            if ( options ) {
                hasScale = options.scale;
                hasSwitch = options.switch;
                hasRotate = options.rotate;
            }

            // 存储图片名称和宽度
            var srcArray = [],
                widthArray = [];

            // 设置 view 结构
            var tmpl = '<div class="jmn-imageview"><img src="" ondragstart="return false"><div class="jmn-imageview-control jmn-noselect"><i class="jmn-imageview-scale"><i><svg viewBox="0 0 1024 1024" version="1.1" width="16" height="16"><path d="M576 419.84h-102.4v-102.4c0-15.36-10.24-25.6-25.6-25.6s-25.6 10.24-25.6 25.6v102.4h-102.4c-15.36 0-25.6 5.12-25.6 17.92 0 15.36 10.24 33.28 25.6 33.28h102.4v102.4c0 15.36 10.24 25.6 25.6 25.6s25.6-10.24 25.6-25.6v-102.4h102.4c15.36 0 25.6-10.24 25.6-25.6 0-12.8-10.24-25.6-25.6-25.6z m337.92 458.24l-212.48-207.36c56.32-61.44 89.6-140.8 89.6-227.84 0-186.88-153.6-337.92-345.6-337.92C256 102.4 102.4 253.44 102.4 440.32s153.6 337.92 345.6 337.92c81.92 0 158.72-28.16 217.6-76.8l212.48 209.92c10.24 10.24 28.16 10.24 38.4 0 7.68-7.68 7.68-23.04-2.56-33.28z m-465.92-148.48c-161.28 0-291.84-128-291.84-286.72C156.16 284.16 286.72 153.6 448 153.6c161.28 0 291.84 128 291.84 286.72 0 158.72-130.56 289.28-291.84 289.28z" fill="#FFF"></path></svg></i></i><i class="jmn-imageview-scale"><i><svg viewBox="0 0 1024 1024" version="1.1" width="16" height="16"><path d="M581.12 419.84h-256c-12.8 0-25.6 10.24-25.6 25.6 0 12.8 10.24 25.6 25.6 25.6h256c12.8 0 25.6-10.24 25.6-25.6s-12.8-25.6-25.6-25.6z m332.8 458.24l-212.48-207.36c56.32-61.44 89.6-140.8 89.6-227.84 0-186.88-153.6-337.92-345.6-337.92S102.4 253.44 102.4 440.32s153.6 337.92 345.6 337.92c81.92 0 158.72-28.16 217.6-76.8l212.48 209.92c10.24 10.24 28.16 10.24 38.4 0 7.68-7.68 7.68-23.04-2.56-33.28z m-465.92-148.48c-161.28 0-291.84-128-291.84-286.72C156.16 284.16 286.72 153.6 448 153.6c161.28 0 291.84 128 291.84 286.72 0 158.72-130.56 289.28-291.84 289.28z" fill="#FFF"></path></svg></i></i><i class="jmn-imageview-switch"><i><svg viewBox="0 0 1024 1024" version="1.1" width="16" height="16"><path d="M862.485 481.154H234.126l203.3-203.3c12.497-12.497 12.497-32.758 0-45.255s-32.758-12.497-45.255 0L135.397 489.373c-12.497 12.497-12.497 32.758 0 45.254l256.774 256.775c6.249 6.248 14.438 9.372 22.627 9.372s16.379-3.124 22.627-9.372c12.497-12.497 12.497-32.759 0-45.255l-203.3-203.301h628.36c17.036 0 30.846-13.81 30.846-30.846s-13.81-30.846-30.846-30.846z" fill="#FFF"></path></svg></i></i><i class="jmn-imageview-switch"><i><svg viewBox="0 0 1024 1024" version="1.1" width="16" height="16"><path d="M885.113 489.373L628.338 232.599c-12.496-12.497-32.758-12.497-45.254 0-12.497 12.497-12.497 32.758 0 45.255l203.3 203.3H158.025c-17.036 0-30.846 13.811-30.846 30.846 0 17.036 13.811 30.846 30.846 30.846h628.36L583.084 746.147c-12.497 12.496-12.497 32.758 0 45.255 6.248 6.248 14.438 9.372 22.627 9.372s16.379-3.124 22.627-9.372l256.775-256.775a31.999 31.999 0 0 0 0-45.254z" fill="#FFF"></path></svg></i></i><i class="jmn-imageview-rotate" style="transform:scaleX(-1)"><i><svg viewBox="0 0 1024 1024" version="1.1" width="16" height="16"><path d="M857.146343 390.039297c-10.937097 4.6366-23.552415-0.463558-28.189016-11.44875C775.105838 250.806209 650.71069 168.174234 512.004605 168.174234c-189.5511 0-343.830883 154.247037-343.830883 343.830883 0 189.567473 154.279782 343.830883 343.830883 343.830883 138.626267 0 263.021415-82.535785 316.90565-210.257701 4.621251-10.952446 17.251919-16.053628 28.124548-11.416004 10.952446 4.588505 16.1007 17.188474 11.464099 28.157293-60.582797 143.66298-200.568015 236.495272-356.494297 236.495272-213.263152 0-386.809743-173.530219-386.809743-386.809743 0-213.263152 173.546591-386.809743 386.809743-386.809743 156.037822 0 295.974945 92.929506 356.590488 236.719376C873.198947 372.851846 868.082416 385.467165 857.146343 390.039297L857.146343 390.039297zM877.35664 404.589688 640.941186 404.589688c-11.864212 0-21.457708-9.641591-21.457708-21.521153 0-11.864212 9.593496-21.457708 21.457708-21.457708l214.894302 0 0-214.894302c0-11.879562 9.641591-21.521153 21.521153-21.521153s21.457708 9.641591 21.457708 21.521153l0 236.352009C898.814348 394.948097 889.236202 404.589688 877.35664 404.589688L877.35664 404.589688z" fill="#FFF"></path></svg></i></i><i class="jmn-imageview-rotate"><i><svg viewBox="0 0 1024 1024" version="1.1" width="16" height="16"><path d="M857.146343 390.039297c-10.937097 4.6366-23.552415-0.463558-28.189016-11.44875C775.105838 250.806209 650.71069 168.174234 512.004605 168.174234c-189.5511 0-343.830883 154.247037-343.830883 343.830883 0 189.567473 154.279782 343.830883 343.830883 343.830883 138.626267 0 263.021415-82.535785 316.90565-210.257701 4.621251-10.952446 17.251919-16.053628 28.124548-11.416004 10.952446 4.588505 16.1007 17.188474 11.464099 28.157293-60.582797 143.66298-200.568015 236.495272-356.494297 236.495272-213.263152 0-386.809743-173.530219-386.809743-386.809743 0-213.263152 173.546591-386.809743 386.809743-386.809743 156.037822 0 295.974945 92.929506 356.590488 236.719376C873.198947 372.851846 868.082416 385.467165 857.146343 390.039297L857.146343 390.039297zM877.35664 404.589688 640.941186 404.589688c-11.864212 0-21.457708-9.641591-21.457708-21.521153 0-11.864212 9.593496-21.457708 21.457708-21.457708l214.894302 0 0-214.894302c0-11.879562 9.641591-21.521153 21.521153-21.521153s21.457708 9.641591 21.457708 21.521153l0 236.352009C898.814348 394.948097 889.236202 404.589688 877.35664 404.589688L877.35664 404.589688z" fill="#FFF"></path></svg></i></i></div><i class="jmn-imageview-close"><i></i></i></div>';

            $(selector).each(function () {

                // 将图片信息保存进数组
                $(this).find("[data-imageview]").each(function () {
                    var src = $(this).attr("data-imageview");
                    var img = document.createElement("img");
                    img.src = src;
                    srcArray.push(src);  
                    img.onload = function () {
                        widthArray.push(img.width); 
                    }
                })
            }).on("click", "[data-imageview]", function () {
                var src = $(this).attr("data-imageview");
                var item = srcArray.indexOf(src);
                var width = widthArray[item];
                if ( !$(".jmn-imageview").length ) {
                    $("body").prepend(tmpl.replace('""', '"' + src + '"'));
                    var $view = $(".jmn-imageview"),
                        $img = $view.find("img"),
                        $control = $view.find(".jmn-imageview-control"),
                        $close = $control.next();

                    // 根据配置来决定显示哪些功能按钮
                    if ( options ) {
                        var num = 6;
                        if ( Bool(hasScale) && !hasScale ) {
                            $control.find(".jmn-imageview-scale").hide();
                            num -= 2;
                        }
                        if ( Bool(hasSwitch) && !hasSwitch ) {
                            $control.find(".jmn-imageview-switch").hide();
                            num -= 2;
                        }
                        if ( Bool(hasRotate) && !hasRotate ) {
                            $control.find(".jmn-imageview-rotate").hide();
                            num -= 2;
                        }
                        !num ? $control.remove() : $control.width(num * 44);
                    }

                    $view.fadeIn(400);

                    var load = false;
                    $img.width(width < 900 ? width : 900).on("load", function () { 

                        if ( load ) {
                            return;
                        } else {
                            load = !load;
                        }

                        // 设置位置
                        $img.css({
                            marginTop: ($window.height() - $img.height()) / 2 + "px",
                            marginLeft: ($window.width() - $img.width()) / 2 + "px"
                        });
                    
                        var rotate = 0;
                        var scale = 1;

                        // 放大缩小
                        function bigger () {
                            if ( scale < 5 ) {
                                scale += .2;
                                $img.css("transform", "scale(" + scale + ") rotate(" + rotate + "deg)");
                            }
                        }
                        function smaller () {
                            if ( scale > 1 ) {
                                scale -= .2;
                                $img.css("transform", "scale(" + scale + ") rotate(" + rotate + "deg)");
                            }
                        }

                        // 切换图片
                        function changeImg ( x ) { 
                            function change ( item ) {
                                $img.attr("src", srcArray[item]).css("transform", "scale(1) rotate(0deg)").on("load", function () {
                                    $(this).css({
                                        marginTop: ($window.height() - $(this).height()) / 2 + "px",
                                        marginLeft: ($window.width() - $(this).width()) / 2 + "px"
                                    });
                                });
                                rotate = 0;
                                scale = 1;
                            }
                            if ( x === "prev" ) {
                                if ( item > 0 ) {
                                    item--;
                                    change(item);
                                }
                            } else {
                                if ( item < srcArray.length - 1 ) {
                                    item++;
                                    change(item);
                                }
                            }
                        }
                        
                        // 按钮
                        $control.on("click", "> i", function () {
                            $img.css("transition", ".3s");
                            switch ( $(this).index() ) {
                                case 0: 
                                    bigger();
                                    break;
                                case 1: 
                                    smaller();
                                    break;
                                case 2:
                                    changeImg("prev");
                                    break;
                                case 3:
                                    changeImg("next");
                                    break;
                                case 4:
                                    rotate -= 90;
                                    $img.css("transform", "scale(" + scale + ") rotate(" + rotate + "deg)");
                                    break;
                                case 5:
                                    rotate += 90;
                                    $img.css("transform", "scale(" + scale + ") rotate(" + rotate + "deg)");
                                    break;
                            }
                        })

                        // 鼠标缩放
                        var delta;
                        $img.on({
                            _wheelUp_: function () {
                                $img.css("transition", ".2s");
                                bigger();
                            },
                            _wheelDown_: function () {
                                $img.css("transition", ".2s");
                                smaller();
                            }
                        })

                        // 拖拽
                        $img.on("mousedown", function ( event ) {
                            var l = event.pageX - parseFloat($img.css("marginLeft")),
                                t = event.pageY - parseFloat($img.css("marginTop"));
                            $img.css("transition", "0s");
                            $document.on("mousemove", function ( event ) {
                                var left = event.pageX - l,
                                    top = event.pageY - t;
                                event.preventDefault();
                                $img.css({
                                    marginLeft: left + "px",
                                    marginTop: top + "px"
                                });
                            })
                            $document.on("mouseup", function () {
                                $(this).off("mousemove");
                            })
                        })

                        // 关闭
                        $close.on("click", function () {
                            $view.fadeOut(300, function () {
                                $view.remove();
                            })
                        })
                    });
                }
            })
            return this;
        },
        video: function ( target, options ) {
            var ie = _ua.match(/(msie|trident)/);
            var src = options.src,
                end = options.end,
                poster = options.poster,
                preload = options.preload;

            // 构建 video 
            var control = '<div class="jmn-video-center"><svg viewBox="0 0 1024 1024" version="1.1" width="70" height="70"><path d="M512 0C229.256533 0 0 229.239467 0 512c0 282.760533 229.256533 512 512 512 282.7776 0 512-229.239467 512-512C1024 229.239467 794.7776 0 512 0z m219.9552 540.450133l-291.157333 168.0896a28.125867 28.125867 0 0 1-42.1888-24.354133V347.989333a28.125867 28.125867 0 0 1 42.1888-24.354133l291.157333 168.0896c18.756267 10.820267 18.756267 37.888 0 48.725333z" fill="#333"></path></svg></div><section class="jmn-video-panel jmn-noselect"><div class="jmn-video-panelinner" style="opacity:0"><div class="jmn-video-playpause"><i class="jmn-video-play"><svg viewBox="0 0 1024 1024" version="1.1" width="22" height="22"><path d="M882.734114 459.147258l0.024559-0.024559L244.016061 21.12718l-0.199545 0.188288C230.582097 8.748245 212.62819 1.014096 192.840518 1.014096c-40.704051 0-73.699536 32.66905-73.699536 72.996524 0 22.148439-0.954745 65.513086 0 64.572668l0 373.422851 0 393.071354c0 0.325411 0 25.249057 0 44.935422 0 40.302915 32.995485 72.972988 73.699536 72.972988 19.862373 0 37.892005-7.78429 51.125401-20.466124l0.050142 0.025583 638.742613-437.982216-0.024559-0.038886c13.886265-13.270235 22.549575-31.889291 22.549575-52.531424 0-0.050142 0-0.088004 0-0.150426 0-0.050142 0-0.11154 0-0.149403C905.28369 491.048829 896.620379 472.41647 882.734114 459.147258z" fill="#FFF"></path></svg></i><i class="jmn-video-pause"><svg viewBox="0 0 1024 1024" version="1.1" width="22" height="22"><path d="M757.52 73.107h-62.493c-34.526 0-62.498 27.984-62.498 62.511v749.948c0 34.526 27.974 62.493 62.498 62.493h62.493c34.516 0 62.502-27.968 62.502-62.493v-749.953c-0.001-34.524-27.984-62.509-62.502-62.509z" fill="#FFF"></path><path d="M320.054 73.107h-62.502c-34.526 0-62.498 27.984-62.498 62.511v749.948c0 34.526 27.974 62.493 62.498 62.493h62.502c34.505 0 62.493-27.968 62.493-62.493v-749.953c-0.001-34.524-27.984-62.509-62.493-62.509z" fill="#FFF"></path></svg></i></div><span class="jmn-video-start">00:00</span><span class="jmn-video-time">/</span><span class="jmn-video-end">00:00</span><div class="jmn-video-linebox"><div class="jmn-video-linebg"></div><div class="jmn-video-linepass"></div><div class="jmn-video-dot"></div></div><div class="jmn-video-volume"><i class="jmn-video-voice"><svg viewBox="0 0 1024 1024" version="1.1" width="22" height="22"><path d="M689.085 335.699c-18.785-18.785-49.239-18.785-68.023 0s-18.785 49.239 0 68.023c56.355 56.355 56.355 147.717 0 204.069-18.785 18.785-18.785 49.239 0 68.023 18.785 18.785 49.239 18.785 68.023 0 93.92-93.92 93.92-246.199 0-340.125z" fill="#FFF"></path><path d="M463.835 159.435v0l-205.238 153.931h-128.336c-35.674 0-64.067 28.451-64.067 63.543v257.721c0 34.619 28.684 63.543 64.067 63.543h128.336l205.238 153.931c28.537 21.398 51.299 9.69 51.299-25.82v-641.027c0-35.062-22.971-47.065-51.299-25.82z" fill="#FFF"></path><path d="M825.132 199.656c-18.785-18.785-49.239-18.785-68.023 0s-18.785 49.239 0 68.023c131.492 131.492 131.492 344.682 0 476.174-18.785 18.785-18.785 49.239 0 68.023 18.785 18.785 49.239 18.785 68.023 0v-0.001c169.060-169.060 169.060-443.158 0-612.221z" fill="#FFF"></path></svg></i><i class="jmn-video-muted" style="transform:scale(0.95)"><svg viewBox="0 0 1024 1024" version="1.1" width="22" height="22"><path d="M469.726 139.266v0l-217.47 163.104h-135.985c-37.804 0-67.889 30.141-67.889 67.327v273.082c0 36.683 30.397 67.327 67.889 67.327h135.985l217.47 163.104c30.237 22.675 54.353 10.267 54.353-27.359v-679.232c0-37.152-24.338-49.873-54.353-27.359z" fill="#FFF"></path><path d="M887.187 538.378l69.126-69.126c22.907-22.907 22.907-60.044 0-82.958v0c-22.907-22.907-60.044-22.907-82.958 0l-69.126 69.126-69.126-69.126c-22.907-22.907-60.044-22.907-82.958 0s-22.907 60.044 0 82.958l69.126 69.126-69.126 69.126c-22.907 22.907-22.907 60.044 0 82.958v0c22.907 22.907 60.044 22.907 82.958 0l69.126-69.126 69.126 69.126c22.907 22.907 60.044 22.907 82.958 0v0c22.907-22.907 22.907-60.044 0-82.958l-69.126-69.126z" fill="#FFF"></path></svg></i></div><div class="jmn-video-volumebox"><div class="jmn-video-volumebg"></div><div class="jmn-video-volumepass"></div><div class="jmn-video-volumedot"></div></div><div class="jmn-video-full"><i class="jmn-video-fullin"><svg viewBox="0 0 1024 1024" version="1.1" width="22" height="22"><path d="M222.018 162.249l126.816-0.511c18.752 0.468 36.146-12.523 38.988-34.663v-23.91c-0.477-18.786-15.962-34.319-34.718-34.737l-242.147 1.433c-0.358-0.035-0.599-0.17-0.921-0.17l-16.985-0.377c-9.376-0.226-17.772 3.442-23.762 9.523-6.081 6.041-8.324 14.478-8.075 23.91l1.808 17.019c0 0.339-1.26 0.561-1.26 0.94l0.941 243.333c0.412 18.752 15.909 30.005 34.717 30.426h25.23c18.752 0.412 33.645-15.909 33.226-34.643l-1.056-132.333 166.961 164.283c18.151 18.183 47.516 18.183 65.67 0 18.096-18.19 18.096-47.58 0-65.782l-165.434-163.755z" fill="#FFF"></path><path d="M943.446 899.13l-0.975-239.587c-0.477-18.736-15.964-29.95-34.718-30.364l-23.853-0.037c-18.698-0.429-33.645 15.945-33.172 34.697l1.056 129.491-166.961-165.354c-18.151-18.19-47.479-18.19-65.633 0-18.126 18.183-18.126 47.574 0 65.764l166.94 165.227-126.646 0.511c-18.752-0.42-36.111 11.105-38.99 33.249v23.91c0.477 18.786 16.023 34.32 34.718 34.793l239.049-1.453c0.377 0 0.598 0.15 0.965 0.15l16.944 0.412c9.375 0.226 17.825-3.443 23.814-9.547 6.117-5.987 8.298-14.453 8.114-23.888l-1.861-16.985c-0.033-0.42 1.227-0.661 1.227-0.982z" fill="#FFF"></path><path d="M387.393 627.968c-18.129-18.19-47.516-18.19-65.645 0l-166.977 164.281 1.076-130.284c0.412-18.786-14.477-35.169-33.187-34.695h-25.23c-18.805 0.468-34.298 11.634-34.717 30.426l-0.976 241.379c0 0.339 1.26 0.562 1.26 0.941l-1.808 16.985c-0.207 9.433 1.98 17.903 8.060 23.888 5.987 6.097 14.443 9.77 23.762 9.546l16.986-0.412c0.339 0 0.561-0.15 0.941-0.15l242.135 1.453c18.752-0.477 34.265-16.004 34.717-34.789v-23.91c-2.823-22.142-20.218-33.658-38.933-33.249l-128.27-0.412 166.827-165.227c18.102-18.126 18.102-47.58-0.002-65.764z" fill="#FFF"></path><path d="M619.286 391.784c18.151 18.183 47.479 18.183 65.633 0l166.961-165.303-1.076 133.347c-0.45 18.734 14.501 35.114 33.188 34.697h23.853c18.754-0.477 34.245-11.689 34.718-30.426l0.965-243.394c0-0.377-1.249-0.599-1.249-0.941l1.849-17.019c0.187-9.431-1.989-17.869-8.114-23.91-5.988-6.080-14.443-9.751-23.801-9.488l-16.944 0.377c-0.377 0-0.599 0.132-0.975 0.187l-242.512-1.453c-18.752 0.433-34.245 15.964-34.717 34.755l-0.054 23.91c2.88 22.177 20.299 35.114 38.988 34.697l128.682 0.51-165.341 163.756c-18.19 18.115-18.19 47.501-0.054 65.686z" fill="#FFF"></path></svg></i><i class="jmn-video-fullout"><svg viewBox="0 0 1024 1024" version="1.1" width="22" height="22"><path d="M400.595 345.365l-0.948-245.022c-0.42-18.881-16.018-30.215-34.956-30.637h-25.406c-18.88-0.42-33.874 16.018-33.457 34.881l1.061 133.251-168.117-165.421c-18.274-18.311-47.844-18.311-66.119 0-18.218 18.314-18.218 47.907 0 66.236l166.575 164.885-127.697 0.512c-18.88-0.477-36.394 12.606-39.26 34.899v24.080c0.477 18.917 16.077 34.558 34.957 34.972l243.826-1.438c0.362 0.035 0.608 0.171 0.928 0.171l17.1 0.378c9.441 0.226 17.9-3.467 23.923-9.593 6.124-6.083 8.382-14.58 8.131-24.078l-1.821-17.138c0.001-0.335 1.27-0.562 1.27-0.945z" fill="#FFF"></path><path d="M766.211 701.451l127.524-0.512c18.88 0.421 36.357-11.183 39.26-33.474v-24.077c-0.478-18.922-16.134-34.558-34.957-35.037l-240.702 1.458c-0.378 0-0.605-0.151-0.967-0.151l-17.062-0.42c-9.441-0.226-17.95 3.469-23.98 9.611-6.159 6.030-8.361 14.559-8.173 24.057l1.881 17.1c0.033 0.42-1.234 0.661-1.234 0.986l0.986 241.248c0.477 18.863 16.078 30.162 34.957 30.576l24.017 0.037c18.827 0.433 33.874-16.055 33.403-34.941l-1.062-130.388 168.117 166.502c18.276 18.314 47.809 18.314 66.085 0 18.255-18.31 18.255-47.906 0-66.218l-168.095-166.366z" fill="#FFF"></path><path d="M392.992 618.855c-6.028-6.14-14.541-9.834-23.923-9.61l-17.104 0.42c-0.346 0-0.566 0.151-0.948 0.151l-243.81-1.458c-18.881 0.478-34.503 16.112-34.956 35.034v24.078c2.843 22.292 20.357 33.892 39.206 33.474l129.158 0.42-167.983 166.37c-18.234 18.255-18.234 47.906 0 66.218 18.256 18.314 47.845 18.314 66.102 0l168.137-165.418-1.079 131.185c-0.42 18.922 14.579 35.413 33.424 34.938h25.406c18.937-0.477 34.54-11.713 34.956-30.637l0.987-243.050c0-0.346-1.267-0.571-1.267-0.949l1.821-17.104c0.206-9.495-1.993-18.025-8.116-24.053z" fill="#FFF"></path><path d="M615.434 387.559c6.030 6.123 14.541 9.819 23.965 9.553l17.060-0.378c0.378 0 0.608-0.132 0.986-0.19l244.19 1.457c18.88-0.434 34.482-16.078 34.956-34.994l0.058-24.078c-2.898-22.331-20.439-35.355-39.26-34.939l-129.573-0.511 166.483-164.893c18.31-18.235 18.31-47.83 0.054-66.143-18.276-18.311-47.809-18.311-66.084 0l-168.117 166.447 1.079-134.276c0.454-18.863-14.598-35.355-33.424-34.939h-24.017c-18.881 0.477-34.484 11.773-34.957 30.637l-0.967 245.075c0 0.378 1.251 0.608 1.251 0.948l-1.859 17.138c-0.192 9.499 2.007 17.991 8.173 24.078z" fill="#FFF"></path></svg></i></div></div></section>';
            function buildVideo ( videoSrc, width, height ) {
                var video = '<video width="' + width + '" height="' + height + '"></video>';
                if ( poster ) {
                    video = video.replace(">", ' poster="' + poster + '">');
                }
                if ( preload ) {
                    video = video.replace(">", ' preload="' + preload + '">');
                }
                if ( Fn.string(videoSrc) ) {
                    video = video.replace(">", ' src="' + videoSrc + '">');
                }
                if ( $.isPlainObject(videoSrc) ) {
                    var source = "";
                    $.each(videoSrc, function ( i, v ) {
                        source += '<source src="' + v + '" type="video/' + i + '">';
                    })
                    video = video.replace("><", ">" + source + "<");
                }
                return '<section class="jmn-video-container">' + video + control + '</section>';
            }

            $(target).each(function () {
                var $this = $(this);
                var width = $this.innerWidth(),
                    height = $this.innerHeight();

                // 设置定位
                if ( $this.css("position") === "static" ) {
                    $this.css("position", "relative");
                }

                $this.empty().html(buildVideo(src, width, height)).css({
                    overflow: "hidden",
                    background: "#000"
                });

                // 获取元素
                var $container = $this.children(),
                    container = $container[0],
                    $panel = $container.find(".jmn-video-panel"),
                    $inner = $panel.find(".jmn-video-panelinner"),
                    $child = $inner.children(),
                    $playPause = $inner.find(".jmn-video-playpause").children(),
                    $start = $inner.find(".jmn-video-start"),
                    $end = $inner.find(".jmn-video-end"),
                    $linebox = $inner.find(".jmn-video-linebox"),
                    $pass = $inner.find(".jmn-video-linepass"),
                    $lineDot = $pass.next(),
                    $volume = $inner.find(".jmn-video-volume"),
                    $volumebox = $inner.find(".jmn-video-volumebox"),
                    $volumePass = $volumebox.find(".jmn-video-volumepass"),
                    $volumeDot = $volumebox.find(".jmn-video-volumedot"),
                    $voice = $volume.children().first(),
                    $full = $inner.find(".jmn-video-full"),
                    $fullBtn = $full.children(),
                    $center = $this.find(".jmn-video-center"),
                    $video = $container.find("video"),
                    video = $video[0];
                var loading;

                var otherWidth = 0;
                var dotWidth = parseInt($lineDot.width()) / 2;
                $video.addClass("jmn-video-opacity");

                // 当视频外框的宽度不大于 400px 时
                // 将自动隐藏音量控制条
                if ( width <= 400 ) {
                    $volume.add($volumebox).remove();
                }

                // 禁用右键
                $this.on("contextmenu", function () {
                    return false;
                })

                // 计算进度条总宽度
                $child.each(function () {
                    otherWidth += $(this).outerWidth(true);
                })
                var lineLeft = parseFloat($linebox.css("marginLeft")) - 5;
                var lineWidth = width - otherWidth - lineLeft;
                $linebox.width(lineWidth).data("jsmodernVideoLineWidth", lineWidth);

                // 相关数值计算完毕后
                // 将控制条显示出来
                $inner.removeAttr("style");

                // 时间数字补零函数
                function addZero ( time ) {
                    var m = parseInt(time / 60),
                        s = parseInt(time % 60);
                    m = m < 10 ? ("0" + m) : m;
                    s = s < 10 ? ("0" + s) : s;
                    return m + ":" + s;
                }

                // 计算视频总时长
                var allTime;
                $video.on("durationchange", function () {      
                    var duration = video.duration;
                    allTime = duration;
                    $end.text(addZero(duration));
                });

                // 视频播放函数
                function videoPlay () {
                    $playPause.add($center).toggle();
                    $video.toggleClass("jmn-video-opacity");
                    video.paused ? video.play() : video.pause();
                }

                // 控制播放和暂停
                $playPause.add($center).on("click", function () {
                    videoPlay();
                })

                // 视频已播时间
                function process ( _w ) {
                    $video.on("timeupdate", function () {  
                        if ( !$lineDot.data("jsmodernVideoMove") ) {
                            var surplus;         
                            if ( !isNaN(video.duration) ) {
                                surplus = video.currentTime;
                                $start.text(addZero(surplus));
                            }
                            var endTime = ($end.text()).replace(":", "");
                            var distance = surplus / allTime * _w;
                            $pass.width(distance);
                            $lineDot.css("marginLeft", distance - dotWidth + "px");
                        }
                    })
                }
                process(lineWidth);

                // 播放时间控制函数
                function setTime ( _w ) { 
                    var toTime = parseFloat(_w) / $linebox.width() * allTime; 
                    $start.text(addZero(toTime));
                    video.currentTime = toTime;
                }

                // 点击播放条改变视频播放进度
                $linebox.on("click", function ( event ) {
                    var left = $(this).offset().left;
                    var width = event.pageX - left;
                    $pass.width(width);
                    $lineDot.css("marginLeft", width - dotWidth + "px");
                    setTime(width);
                })

                // 控制条按钮拖动
                $lineDot.on("mousedown", function () {
                    var _this = $(this);
                    var parentLeft = $linebox.offset().left;   
                    $document.on("mousemove", function ( event ) {
                        var left = event.pageX - parentLeft - dotWidth;  
                        event.preventDefault();
                        _this.data("jsmodernVideoMove", true);
                        (left < -dotWidth) && (left = -dotWidth);
                        (left > $linebox.width() - dotWidth) && (left = $linebox.width() - dotWidth);
                        _this.css("marginLeft", left + "px");
                        $pass.width(left);
                        setTime(left);
                    })
                    $document.on("mouseup", function () {
                        $(this).off("mousemove");
                        _this.removeData("jsmodernVideoMove");
                    })
                })

                // 音量图标控制
                video && (video.volume = 0.5);
                $volume.on("click", function () {
                    $(this).children().toggle();
                    video.muted = !video.muted;
                    if ( !video.muted ) { 
                        $volumeDot.css("marginLeft", $volume.data("jsmodernVideoVolumeDot"));
                        $volumePass.width($volume.data("jsmodernVideoVolumePass"));
                    } else {
                        $volume.data({
                            jsmodernVideoVolumeDot: $volumeDot.css("marginLeft"),
                            jsmodernVideoVolumePass: $volumePass.width()
                        });
                        $volumeDot.css("marginLeft", "-5px");
                        $volumePass.width(0);
                    }   
                })

                // 音量控制条点击事件
                var volumeWidth = $volumebox.width();
                $volumebox.on("click", function ( event ) {
                    var left = $(this).offset().left;
                    if ( event.pageX - left > 0 && event.pageX - left <= volumeWidth ) {
                        video.muted = false;
                        $voice.show().next().hide();
                        var w = event.pageX - left;
                        $volumePass.width(w);
                        $volumeDot.css("marginLeft", (w - dotWidth) + "px");
                        video.volume = w/volumeWidth; 
                    }
                })

                // 音量按钮拖动事件
                $volumeDot.on("mousedown", function () {
                    var _this = $(this);
                    var parentLeft = _this.parent().offset().left;     
                    $document.on("mousemove", function ( event ) {
                        var left = event.pageX - parentLeft - dotWidth;  
                        event.preventDefault();
                        if ( left <= -dotWidth ) {
                            left = -dotWidth;
                            video.muted = true;
                            $voice.hide().next().show();
                        }
                        if ( left > volumeWidth - dotWidth ) {
                            left = volumeWidth - dotWidth;
                            video.muted = false;
                            $voice.show().next().hide();
                        }
                        if ( left > 0 && left <= volumeWidth - dotWidth ) {
                            video.muted = false;
                            $voice.show().next().hide();
                        }
                        _this.css("marginLeft", left + "px");
                        $volumePass.width(left);
                        var realVolume = left / volumeWidth;
                        video.volume = realVolume < 0 ? 0 : realVolume;
                    })
                })
                $document.on("mouseup", function () {
                    $(this).off("mousemove");
                })

                // 事件监听
                var x = 0;
                var mouseTimer;
                $video.on({
                    waiting: function () {
                        if ( $center.is(":hidden") && !ie ) {
                            loading = jsModern.loading($this, {
                                theme: "B",
                                scale: .6
                            });
                        } 
                    },
                    canplay: function () {
                        jsModern.removeLoading(loading);
                    },
                    play: function () {
                        $panel.hide();
                        $this.on({
                            mouseleave: function () {
                                $this.data("jsmodernVideoOut", true);
                                !video.paused && $panel.hide();
                            },
                            mouseenter: function () {
                                $this.removeData("jsmodernVideoOut");
                                $panel.show();
                            },
                            mousemove: function () {
                                x = 1;
                                $panel.show();
                            }
                        });
                        mouseTimer = window.setInterval(function () {
                            if ( !$this.data("jsmodernVideoOut") ) {
                                $panel[x ? "show" : "hide"]();
                            }
                            x = 0;
                        }, 2000);
                        jsModern.removeLoading(loading);
                    },
                    pause: function () {
                        $this.data("jsmodernVideoPlaying", false);
                        $panel.show();
                        window.clearInterval(mouseTimer);
                    },
                    ended: function () {
                        $this.data("jsmodernVideoPlaying", false);
                        $panel.show();
                        window.clearInterval(mouseTimer);
                        $pass.width(0);
                        $lineDot.css("marginLeft",  - dotWidth);
                        video.currentTime = 0;
                        video.pause();
                        $playPause.add($center).toggle();
                        $video.addClass("jmn-video-opacity");
                        if ( end && Fn.function(end) ) {
                            end.call(video);
                        }
                    }
                });

                // 全屏切换 (不提供对 IE 的支持)
                if ( ie ) {
                    $full.addClass("jmn-video-fullno");
                } else {
                    var fullIn = function () {
                        $panel.hide().delay(300).fadeIn(200);
                        Fn.fullScreenIn(container);
                    }
                    var fullOut = function () {
                        $panel.hide().delay(300).fadeIn(200);
                        Fn.fullScreenOut();
                    }
                    var isFullNow = function () {
                        var widthNow = _screenWidth - otherWidth - lineLeft;
                        $container.add($video).width(_screenWidth).height(_screenHeight);
                        $linebox.width(widthNow);
                        $fullBtn.toggle();
                        process(widthNow);
                    }
                    var notFullNow = function () {
                        $container.add($video).width(width).height(height);
                        $linebox.width($linebox.data("jsmodernVideoLineWidth"));
                        $fullBtn.toggle();
                        process(lineWidth);
                    }
                    var checkFull = function () {
                        (document.fullscreen || document.mozFullScreen || document.webkitIsFullScreen) ? fullOut() : fullIn();
                    }
                    $document.on("fullscreenChange webkitfullscreenchange mozfullscreenchange", function () {
                        if ( video.paused ) {
                            video.play();
                            video.pause();
                        }
                        (document.fullscreen || document.mozFullScreen || document.webkitIsFullScreen) ? isFullNow() : notFullNow();
                    })
                    $video.dblclick(function () {
                        checkFull();
                    })
                    $fullBtn.on("click", function () {
                        checkFull();
                    })
                }
            })
        },
        loading: function ( selector, options ) {

            // 基本参数
            var mark = Fn.toStringRandom();
            var theme, scale, background, color, title;
            if ( options ) {
                theme = options.theme;
                scale = options.scale;
                background = options.background;
                color = options.color;
                title = options.title;
            }

            // 设置 loading 结构层
            var loading = '<section class="jmn-noselect jmn-loading" style="display:none;"><div class="jmn-loading-box"><div class="jmn-loading-body"></div><div class="jmn-loading-title"></div></div></section>';

            $(selector).each(function () {
                var $this = $(this);
                var width = $this.innerWidth(),
                    height = $this.innerHeight();

                // 判断是否已经有 loading 存在
                // 确保同一区域只能有一个 loading
                if ( $this.find(".jmn-loading").length ) {
                    return;
                }

                // 设置定位
                if ( $this.css("position") === "static" ) {
                    $this.css("position", "relative");
                }

                // 添加 loading
                $this.append(loading);
                var $loading = $this.find(".jmn-loading"),
                    $box = $this.find(".jmn-loading-box"),
                    $child = $box.children().first(),
                    $title = $child.next();

                // 缓存 loading 标识
                $loading.data("jsmodernLoading", mark);

                // 处理标题
                title ? $title.text(title) : $title.remove();

                // 主题 "A" (圆点形)
                var dots;
                if ( theme === "A" ) {
                    var dots = "";
                    for ( var i = 0; i < 8; i++ ) {
                        dots += "<i></i>";
                    }               
                }

                // 主题 "B" (圆环形)
                var circle;
                if ( theme  === "B" ) {
                    circle = '<div class="jmn-loading-circle"><canvas width="800" height="800" style="transform:scale(0.1);transform-origin:left top;"></canvas></div>';
                }

                // 自定义颜色
                if ( background ) {
                    $loading.css("background", background);
                }
                if ( color ) {
                    if ( dots ) {
                        dots = dots.replace(/<i>/g, '<i style="background:' + color + '">');
                    }
                    $title.css("color", color);
                    if ( color.match("#") ) {
                        if ( color.length == 4 ) {
                            color = "#" + color[1] + color[1] + color[2] + color[2] + color[3] + color[3];
                        }
                    }
                }

                // 自定义缩放
                if ( scale && scale !== 1 ) { 
                    $box.css("transform", "translate(-50%, -50%) scale(" + scale + ")");
                }

                // 添加图形
                $child.append(circle ? circle : dots);
                if ( $child.find("canvas").length ) {
                    var ctx = $child.find("canvas")[0].getContext("2d");

                    // 对于圆环形图案的背景圆环进行颜色解析
                    var _color = color;
                    if ( color ) {
                        if ( color.match("rgba") ) {
                            _color = color;
                        }
                        if ( color.match(/rgb\(/) ) {
                            _color = color.replace(")", ",.2)");
                        }
                        if ( color[0] === "#" ) {
                            var c = [];
                            for ( var i = 1; i < 7; i += 2) {
                                c.push(parseInt("0x" + color.slice(i, i + 2)));    
                            }
                            _color = "rgba(" + c.join(",") + ", .2)";
                        }
                    }

                    // 背景圆环
                    ctx.save();  
                    ctx.beginPath();  
                    ctx.lineWidth = 50; 
                    ctx.strokeStyle = color ? _color : "rgba(255, 255, 255, .2)";  
                    ctx.arc(400, 400, 370, 0, Math.PI * 2, false);  
                    ctx.stroke();  
                    ctx.closePath();  
                    ctx.restore();

                    // 前景圆环
                    ctx.save();  
                    ctx.beginPath();
                    ctx.lineWidth = 50;  
                    ctx.lineCap = "round";
                    ctx.strokeStyle = color ? color : "#FFF";   
                    ctx.arc(400, 400, 370, -Math.PI * 0.5, -Math.PI * 0.2, false);
                    ctx.stroke();  
                    ctx.closePath();  
                    ctx.restore();  
                }

                // 显示 loading 层
                $loading.show();

                // 存储 loading 数据 
                var cache = {
                    elem: $loading
                };
                globalVar.loading[mark] = cache;
            })

            // 返回 loading 数据
            return globalVar.loading[mark];
        },
        removeLoading: function ( target, time ) {
            if ( target ) {
                var remove = function () {
                    delete globalVar.loading[target.elem.data("jsmodernLoading")];
                    target.elem.remove();
                }
                if ( Fn.number(time) ) {
                    target.elem.fadeOut(time, function () {
                        remove();
                    })
                } else {
                    remove();
                }
            }
            return this;
        },
        notice: function ( a, b ) {

            // 基本参数
            var time = 200;
            var title, content, icon, autoClose, type;
            if ( a && b ) {
                title = a;
                content = b;
            }
            if ( a && !$.isPlainObject(a) && !b ) {
                title = a;
            }
            if ( $.isPlainObject(a) ) {
                title = a.title;
                content = a.content;
                icon = a.icon;
                autoClose = a.autoClose;
                type = a.type;
            }

            // 设置结构
            var tmpl = '<div class="jmn-notice"><div class="jmn-notice-icon"></div><div class="jmn-notice-box"><p class="jmn-notice-title"></p><p class="jmn-notice-content"></p></div><div class="jmn-notice-close"><svg viewBox="0 0 1024 1024" width="14" height="14" version="1.1"><path d="M887.132284 833.893244 560.497039 507.257999l320.308143-320.314283c12.085246-12.087293 12.085246-31.670304 0-43.756573-12.08627-12.085246-31.68463-12.085246-43.756573 0L516.740466 463.500403l-326.639339-326.640362c-12.025894-12.025894-31.535227-12.025894-43.561122 0-12.040221 12.025894-12.040221 31.54853 0 43.575448l326.633199 326.633199L136.905578 843.339384c-12.079106 12.08627-12.079106 31.668257 0 43.754526 12.08627 12.087293 31.677467 12.087293 43.763736 0l336.261487-336.266603 326.642408 326.642408c12.025894 12.025894 31.518854 12.025894 43.559075 0C899.159202 865.442798 899.159202 845.919139 887.132284 833.893244z"></path></svg></div></div>';

            // 获取当前页面中的 notice 及其个数
            var $noticeNow = $(".jmn-notice");
            var size = $noticeNow.length;

            // 添加 notice 
            $("body").append(tmpl);
            var $notice = $(".jmn-notice").last(),
                $icon = $notice.find(".jmn-notice-icon"),
                $title = $notice.find(".jmn-notice-title"),
                $content = $title.next(),
                $close = $notice.find(".jmn-notice-close");

            // 添加标题, 内容和图标
            $title.html(title ? title : "&nbsp;");
            content ? $content.html(content) : $content.remove();
            if ( icon ) { 
                $notice.addClass("jmn-notice-self");
                $icon.css("backgroundImage", "url(" + icon + ")");
            }
            $notice.addClass(type ? ("jmn-notice-" + type ) : "");
            if ( !icon && !type ) {
                $notice.addClass("jmn-notice-info");
                $icon.remove();
            }
            $(".jmn-notice-error .jmn-notice-icon").html('<svg viewBox="0 0 1024 1024" width="40" height="40" version="1.1"><path d="M512 960a448 448 0 1 1 448-448 448 448 0 0 1-448 448z m190.4-593.28a32 32 0 0 0-45.248-44.8L512 466.56 366.848 321.92a32 32 0 0 0-45.248 44.8L466.752 512l-145.152 145.28a32 32 0 0 0 45.248 44.8L512 557.44l145.152 144.64a32 32 0 0 0 45.248-44.8L557.248 512z" fill="#FF5050"></path></svg>');
            $(".jmn-notice-warn .jmn-notice-icon").html('<svg viewBox="0 0 1024 1024" width="40" height="40" version="1.1"><path d="M511.333 64c-247.424 0-448 200.576-448 448s200.576 448 448 448 448-200.576 448-448-200.576-448-448-448z m0 691.241c-22.145 0-40.097-17.952-40.097-40.097s17.952-40.097 40.097-40.097 40.097 17.952 40.097 40.097-17.952 40.097-40.097 40.097z m53.301-436.968l-19.46 276.393c-0.951 15.811-15.812 28.203-33.823 28.203-18.011 0-32.872-12.391-33.823-28.203l-19.495-276.981c-0.976-16.223 7.755-31.716 23.028-40.862 17.65-10.57 40.801-10.764 58.678-0.494l1.024 0.588c15.772 9.061 24.866 24.816 23.871 41.356z" fill="#FFB244"></path></svg>');
            $(".jmn-notice-success .jmn-notice-icon").html('<svg viewBox="0 0 1024 1024" width="40" height="40" version="1.1"><path d="M512 64.2C264.7 64.2 64.2 264.7 64.2 512S264.7 959.8 512 959.8 959.8 759.3 959.8 512 759.3 64.2 512 64.2z m232.3 317.2L505.5 679.9c-5.3 6.6-13.2 10.7-21.7 11.1-0.6 0-1.1 0.1-1.7 0.1-7.9 0-15.5-3.1-21.1-8.7L311.8 533.1c-11.7-11.7-11.7-30.6 0-42.2 11.7-11.7 30.6-11.7 42.2 0l125.7 125.7 218-272.5c10.3-12.8 29.1-15 42-4.7 12.8 10.3 14.9 29.1 4.6 42z" fill="#58C96B"></path></svg>');
            var innerHeight = $notice.innerHeight();

            // 若当前页面中存在未清除的 notice
            // 则依次排列显示
            if ( size ) {
                var dis = 0;
                $noticeNow.each(function () {
                    dis += $(this).innerHeight() + 10;
                })
                $notice.css("marginBottom", dis + 10 + "px");
            } 

            // 显示 notice
            $notice.animate({
                opacity: 1,
                marginRight: 0
            }, time);

            // 移除 notice
            function removeNotice ( $target, otherFn ) {
                var height = $target.innerHeight() + 10;
                $target.animate({
                    marginRight: -$target.outerWidth() + "px",
                    opacity: 0
                }, time, function () {
                    $target.remove();
                    otherFn && otherFn(height);
                })
            }
            $document.on("click", ".jmn-notice-close", function () {
                var $parent = $(this).parent(),
                    $nextAll = $parent.nextAll(".jmn-notice");
                removeNotice($parent, function ( h ) {
                    $nextAll.each(function () {
                        $(this).animate({
                             marginBottom: parseFloat($(this).css("marginBottom")) - h + "px"
                        }, time);
                    })
                })
            })

            // 按下 esc 键清除全部 notice
            jsModern.keyCode(27, function () {
                removeNotice($(".jmn-notice"));
            })

            // 定时自动清除 notice
            if ( Fn.number(autoClose) ) {
                $notice.append('<b class="jmn-notice-autoclose"></b>');
                var $auto = $notice.find(".jmn-notice-autoclose");
                if ( $notice.hasClass("jmn-notice-error") ) {
                    $auto.css("background", "#FF5050");
                }
                if ( $notice.hasClass("jmn-notice-warn") ) {
                    $auto.css("background", "#FFB244");
                }
                if ( $notice.hasClass("jmn-notice-success") ) {
                    $auto.css("background", "#58C96B");
                }
                $auto.animate({
                    width: $notice.innerWidth() + "px"
                }, autoClose, function () {
                    $(this).prev().trigger("click");
                });
            }
            return this;
        },
        scrollBar: function ( target, options ) {
            var axis = options.axis,
                track = options.track,
                thumb = options.thumb;
            var random = "";
            $(target).each(function () {
                var $this = $(this),
                    $children = $this.children();

                // 滚动容器内只能有一个子元素用来包裹滚动内容
                if ( $children.length == 1 ) {
                    $this.css({
                        overflow: "hidden",
                        padding: 0
                    });
                    $children.addClass("jmn-scrollbar-box");
                    var width = $this.innerWidth(),
                        height = $this.innerHeight();

                    // 设置定位
                    if ( $this.css("position") === "static" ) {
                        $this.css("position", "relative");
                    }
                    if ( $children.css("position") === "static" ) {
                        $children.css("position", "absolute");
                    }

                    // 设置滚动条
                    var bar = '<div class="jmn-scrollbar-track jmn-scrollbar-' + ((axis === "x" && "x") || (axis === "y" && "y")) + '"><div class="jmn-scrollbar-thumb"></div></div>';
                    $this.append(bar);
                    var $bar = $this.children().last().children();

                    // 自定义样式
                    track && $bar.parent().css(track);
                    thumb && $bar.css(thumb);

                    // 缓存数据
                    $bar.data({
                        jsmodernBarX: 0,
                        jsmodernBarCacheX: 0,
                        jsmodernBarY: 0,
                        jsmodernBarCacheY: 0
                    });

                    // 初始值
                    var barWidth = 0, 
                        barHeight = 0, 
                        maxTop = 0,
                        maxLeft = 0,
                        allWidth = 0,
                        allHeight = 0;
                    var scrollFn = function () {
                        
                        // 获取总宽高
                        allWidth = $children.outerWidth(true),
                        allHeight = $children.outerHeight(true);   

                        if ( axis === "x" ) { 
                            barWidth = (width * width) / allWidth;
                            $bar.width(barWidth);
                            maxLeft = width - barWidth;
                        }
                        if ( axis === "y" ) { 
                            barHeight = (height * height) / allHeight;
                            $bar.height(barHeight);
                            maxTop = height - barHeight;
                        }
                    }

                    // 实时监听内容宽高的变化
                    window.setInterval(scrollFn, _interval);

                    // 初始化执行一次数据查询
                    scrollFn();

                    // 滚动条拖动事件
                    $bar.on("mousedown", function ( event ) {
                        $this.addClass("jmn-noselect");
                        $children.add($bar).css("transition", "0s");
                        $children.css("pointerEvents", "none");
                        var x = event.pageX - $bar.position().left - $bar.data("jsmodernBarX");
                        var y = event.pageY - $bar.position().top - $bar.data("jsmodernBarY"); 
                        $document.on("mousemove", function ( event ) {
                            var top = event.pageY - y;  
                            var left = event.pageX - x;
                            event.preventDefault();
                            (top < 0) && (top = 0);
                            (top > maxTop) && (top = maxTop);
                            (left < 0) && (left = 0);
                            (left > maxLeft) && (left = maxLeft);
                            (axis === "x") && $bar.css("transform", "translate(" + left + "px, 0)").data("jsmodernBarCacheX", left);
                            (axis === "y") && $bar.css("transform", "translate(0, " + top + "px)").data("jsmodernBarCacheY", top);
                            var topDis = (allHeight / height) * top;
                            var leftDis = (allWidth / width) * left;
                            (axis === "x") && $children.css("transform", "translate(-" + leftDis + "px, 0)");
                            (axis === "y") && $children.css("transform", "translate(0, -" + topDis + "px)");
                        })
                    })

                    // 鼠标滑轮事件
                    var dis = 0;
                    var step = 20;
                    var outerWidth = $bar.outerWidth(),
                        outerHeight = $bar.outerHeight();
                    var delta = "";
                    $this.on("mousewheel DOMMouseScroll", function ( event ) { 
                        var orgEvent = event.originalEvent;
                        if ( orgEvent.wheelDelta ) {
                            delta = orgEvent.wheelDelta > 0 ? "up" : "down";
                        } else if ( orgEvent.detail ) {
                            delta = orgEvent.detail < 0 ? "up" : "down";
                        }
                        orgEvent.preventDefault();
                        var getX = $bar.data("jsmodernBarCacheX"),
                            getY = $bar.data("jsmodernBarCacheY");
                        if ( delta === "down" ) {
                            if ( axis === "x" ) {
                                dis = getX + outerWidth / step;
                                (dis > maxLeft) && (dis = maxLeft);
                            } else {
                                dis = getY + outerHeight / step;
                                (dis > maxTop) && (dis = maxTop);
                            }
                        } else {
                            if ( axis === "x" ) {
                                dis = getX - outerWidth / step;
                                (dis < 0) && (dis = 0);
                            } else {
                                dis = getY - outerHeight / step;
                                (dis < 0) && (dis = 0);
                            }
                        }
                        $bar.add($children).css("transition", ".12s");
                        if ( axis === "x" ) {
                            $bar.css("transform", "translate(" + dis + "px, 0)").data("jsmodernBarCacheX", dis);
                            $children.css("transform", "translate(-" + (allWidth / width) * dis + "px, 0)");
                        }
                        if ( axis === "y" ) {
                            $bar.css("transform", "translate(0, " + dis + "px)").data("jsmodernBarCacheY", dis);
                            $children.css("transform", "translate(0, -" + (allHeight / height) * dis + "px)");
                        }
                    })

                    // 松开鼠标
                    $document.on("mouseup", function () {
                        $(this).off("mousemove");
                        $this.removeClass("jmn-noselect");
                        $children.css("pointerEvents", "auto");
                    })

                    // 添加标识
                    random = jsModern.random(15, false);
                    globalVar.scrollBar[random] = { 
                        selector: target,
                        axis: axis,
                        track: track,
                        thumb: thumb,
                        toBottom: function () {
                            if ( this.axis === "y" ) {
                                $bar.css("transform", "translate(0, " + maxTop + "px)").data("jsmodernBarCacheY", maxTop);
                                $children.css("transform", "translate(0, -" + (allHeight / height) * maxTop + "px)");
                            }
                        },
                        toRight: function () {
                            if ( this.axis === "x" ) {
                                $bar.css("transform", "translate(" + maxLeft + "px, 0)").data("jsmodernBarCacheX", maxLeft);
                                $children.css("transform", "translate(-" + (allWidth / width) * maxLeft + "px, 0)");
                            }
                        }
                    };
                }
            })
            return globalVar.scrollBar[random];
        },
        select: function ( selector, options ) {
            $(selector).each(function () {

                // 基础参数
                var maxHeight = options ? options.maxHeight : 400,   
                    callback = options ? options.callback : $.noop,
                    option = "",
                    _default = "",
                    item = 0;
                var $this = $(this),
                    $option = $this.find("option");
                var width = $this.innerWidth(),
                    height = $this.innerHeight();

                // 隐藏初始状态下的内容
                $this.children().hide();

                // 设置定位
                if ( $this.css("position") === "static" ) {
                    $this.css("position", "relative");
                }

                // 构建列表
                if ( $option.length ) {
                    _default = $option.first().val();
                    $option.each(function ( i, v ) {
                        option += '<div class="jmn-select-option">' + $(this).val() + '</div>';
                        if ( $(this).prop("selected") ) {
                            _default = $(this).val();
                            item = i;
                        }
                    })
                } else {
                    _default = options.option[0];
                    options.option.forEach(function ( v, i ) {
                        option += '<div class="jmn-select-option">' + v + '</div>';
                        if ( options ) {
                            if ( v === options.defaultVal ) {
                                _default = v
                                item = i;
                            }
                        }
                    })
                }
                
                // 创建下拉框
                $this.append('<div class="jmn-select jmn-noselect" style="width:' + (width - 2) + 'px;height:' + (height - 2) + 'px;line-height:' + (height - 2) + 'px;"><span>' + _default + '</span><i style="width:' + (height - 2) + 'px;"><i><svg width="100%" height="100%" version="1.1"><polygon points="0,0 10,0 5,10" style="fill:#777;stroke:#777;stroke-width:1;"/></svg></i></i></div><div class="jmn-select-list jmn-noselect"><div>' + option + '</div></div>');
                var $select = $this.children(".jmn-select"),
                    $icon = $select.children("i"),
                    $list = $this.find(".jmn-select-list"),
                    $child = $list.children(),
                    $span = $select.children("span");

                // 默认选中第一个选项
                $child.children().first().addClass("active");

                // 手动设置默认值
                if ( _default ) {
                    $span.text(_default);
                    $child.children().eq(item).addClass("active").siblings().removeClass("active");
                }

                // 初始回调
                callback && callback.call(this, item, _default);

                // 保存值
                $this.data("jsmodernSelectValue", _default);

                // 超出部分使用滚动条
                if ( $child.outerHeight(true) > maxHeight ) {
                    $list.height(maxHeight);
                    jsModern.scrollBar($list, {
                        axis: "y",
                        track: {
                            width: "4px"
                        },
                        thumb: {
                            width: "4px",
                            border: "none",
                            borderRadius: "2px",
                            background: "rgba(0, 0, 0, .45)"
                        }
                    });
                }

                // 显示下拉框函数
                function selectShow () {
                    $(".jmn-select i").removeClass("active");
                    $(".jmn-select-list").removeClass("show");
                    $list.addClass("show");
                    $icon.addClass("active");
                }

                // 隐藏下拉框函数
                function selectHide () {
                    $icon.removeClass("active");
                    $list.removeClass("show");
                }

                // 切换下拉框
                $select.on("click", function ( event ) {
                    $list.hasClass("show") ? selectHide() : selectShow();
                    $document.on("click", function ( event ) {
                        (!event.ctrlKey && !$(event.target).is(".jmn-scrollbar-thumb")) && selectHide();
                    });
                    event.stopPropagation();
                })

                // 选择
                var multiple;
                if ( options ) {
                    multiple = options.multiple;
                }
                $this.on("click", ".jmn-select-option", function ( event ) {
                    var _this = $(this);
                    var thisText = _this.text();
                    function same ( t ) {
                        callback && callback.call(_this[0], _this.index(), t); 
                        $this.data("jsmodernSelectValue", t);
                        _this.addClass("active").siblings().removeClass("active");
                        $select.children("span").text(_this.text());
                        selectHide();
                    }
                    if ( Fn.true(multiple) ) { 

                        // 多选模式
                        if ( event.ctrlKey ) {
                            _this.toggleClass("active");
                            var text = $span.text();
                            text = (!_this.hasClass("active") ? text.replace(thisText, "") : (text + " , " + thisText)).replace(/( \, ){2,}/, " , ").replace(/(^ \, )|( \, $)/g, "");
                            $span.text(text);
                            callback && callback.call(_this[0], _this.index(), text); 
                            $this.data("jsmodernSelectValue", text.split(" , "));
                        } else {
                            same(thisText);
                        }
                    } else {
                        same(thisText);
                    }
                })
            })
            return this;
        },
        selectVal: function ( selector ) {
            return $(selector).data("jsmodernSelectValue");
        },
        page: function ( options ) {
            var type = options.type,
                $content = $(options.content),
                $buttons = $(options.buttons),
                url = options.url,
                total = options.total,
                every = options.every,
                max = ~~options.max || 10,
                success = options.success;

            // 生成分页按钮
            var perPage = "";
            var pages = total/every;
            pages = pages >= 1 ? (total % every > 0 ? ~~pages + 1 : pages) : pages; 
            if ( pages < 1 ) {
                pages = 1;
            }
            for ( var i = 1; i <= pages; i++ ) {
                perPage += '<i class="jmn-page-num"><span>' + i + '</span></i>';
            }
            perPage = "<div><div>" + perPage + "</div></div>";
            $buttons.empty().html('<div><i class="jmn-page-first">«</i><i class="jmn-page-prev">‹</i>' + perPage + '<i class="jmn-page-next">›</i><i class="jmn-page-last">»</i></div>').addClass("jmn-page jmn-noselect");
            var $page = $buttons.children(),
                $div = $page.find("div > div"), 
                $every = $page.find(".jmn-page-num"),
                $first = $page.find(".jmn-page-first"),
                $last = $page.find(".jmn-page-last"),
                $prev = $page.find(".jmn-page-prev"),
                $next = $page.find(".jmn-page-next");

            // 添加标记, 内容清空
            $content.data("jsmodernPageIndex", 1).empty();

            // 初始状态下第一个按钮处于激活状态
            $every.first().addClass("active");

            // 按钮数量超过 10
            // 超出的按钮将以滑动的形式出现
            // 页面最多显示 10 个页码按钮
            function moreScroll ( param ) {
                if ( max > pages ) {
                    max = pages;
                }
                if ( max == 0 ) {
                    max = 1;
                }
                var num = pages - max;
                var time = 100;
                var basicNum = 40;
                $div.parent().width(basicNum * max);
                $div.css("width", basicNum * pages + "px");
                var left = parseInt($div.css("transform").replace("matrix(1, 0, 0, 1, ", "").replace(". 0", "")); 
                switch ( param ) {
                    case "next": 
                        if ( left > -num * basicNum ) {
                            $div.css("transform", "translateX(" + (left - basicNum) + "px)");
                        }
                        break;
                    case "prev":
                        if ( left < 0 ) {
                            $div.css("transform", "translateX(" + (left + basicNum) + "px)");
                        }
                        break;
                    case "first":
                        $div.css("transform", "translateX(0)");
                        break;
                    case "last":
                        $div.css("transform", "translateX(" + (-num * basicNum) + "px)");
                        break;  
                }
            }
            moreScroll();

            // 判断数据加载类型
            if ( type === "local" ) {

                // 仅发送一次 ajax 获取所有数据并保存到本地
                if ( url && Fn.string(url) ) {
                    $.ajax(url).done(function ( getData ) {
                        getData = JSON.parse(getData);
                        var result = "";

                        // 将获取到的数据附加到模板中
                        // 并全部存储到缓存中
                        var dataset = [];
                        for ( var name in getData ) {
                            dataset.push(success(getData[name])); 
                        }

                        // 第一页和初始化
                        var firstPage = "";
                        for ( var i = 0; i < every; i++ ) {
                            result += dataset[i];
                        }
                        firstPage = result;
                        $content.empty().html(result);

                        // 切换事件
                        var switchFn = function ( index ) {
                            result = "";
                            for ( var i = (index - 1) * every; i < index * every; i++ ) {
                                if ( dataset[i] ) {
                                    result += dataset[i];
                                }
                            }
                            $content.empty().html(result).data("jsmodernPageIndex", index);

                            // 按钮激活
                            $every.eq(index - 1).addClass("active").siblings().removeClass("active");
                        }

                        var getIndex = function () {
                            return $content.data("jsmodernPageIndex");
                        }

                        // 页码切换
                        $page.on("click", "i", function () {
                            var $this = $(this);
                            if ( $this.is(".jmn-page-num") ) {
                                switchFn($(this).index() + 1);
                                moreScroll("every");
                            }
                            if ( $this.is(".jmn-page-prev") ) {
                                var index = getIndex();
                                if ( index > 1 ) {
                                    index--;
                                    switchFn(index);
                                    moreScroll("prev");
                                }
                            }
                            if ( $this.is(".jmn-page-next") ) {
                                var index = getIndex();
                                if ( index < pages ) {
                                    index++;
                                    switchFn(index);
                                    moreScroll("next");
                                }
                            }
                            if ( $this.is(".jmn-page-first") ) {
                                if ( getIndex() !== 1 ) {
                                    switchFn(1);
                                    moreScroll("first");
                                }
                            }
                            if ( $this.is(".jmn-page-last") ) {
                                if ( getIndex() !== pages ) {
                                    switchFn(pages);
                                    moreScroll("last");
                                }
                            }
                        });
                    })
                }
            }
            if ( type === "ajax" ) {

                // 每次点击都通过 ajax 获取数据
                // url 必须是函数形式
                if ( url && Fn.function(url) ) {

                    // 设置内部缓存
                    var ajaxCache = {};

                    // 切换事件
                    var switchFn = function ( index ) {

                        // 当数据已经加载过一次
                        // 则直接从数据缓存中直接获取数据
                        // 避免了再一次发送 ajax 请求
                        // 实现本地直接读取
                        if ( ajaxCache[index] ) {
                            $content.html(ajaxCache[index]);
                        } else {
                            var result = "";
                            $.ajax(url(index)).done(function ( getData ) {  
                                getData = JSON.parse(getData);
                                for ( var name in getData ) {
                                    var eachSet = getData[name]; 
                                    result += success(eachSet); 
                                }

                                // 将加载过的数据保存到本地缓存中
                                // 下一次直接从本地读取数据
                                ajaxCache[index] = result;
                                $content.html(result);
                            })
                        }
                        $content.data("jsmodernPageIndex", index);
                        $every.eq(index - 1).addClass("active").siblings().removeClass("active");
                    }
                    switchFn(1);

                    var getIndex = function () {
                        return $content.data("jsmodernPageIndex");
                    }

                    // 页码切换
                    $page.on("click", "i", function () {
                        var $this = $(this);
                        if ( $this.is(".jmn-page-num") ) {
                            switchFn($(this).index() + 1);
                            moreScroll("every");
                        }
                        if ( $this.is(".jmn-page-prev") ) {
                            var index = getIndex() - 1;
                            if ( index > 0 ) {
                                switchFn(index);
                                moreScroll("prev");
                            }
                        }
                        if ( $this.is(".jmn-page-next") ) {
                            var index = getIndex() + 1;
                            if ( index < pages + 1 ) {
                                switchFn(index);
                                moreScroll("next");
                            }
                        }
                        if ( $this.is(".jmn-page-first") ) {
                            if ( getIndex() !== 1 ) {
                                switchFn(1);
                                moreScroll("first"); 
                            }
                        }
                        if ( $this.is(".jmn-page-last") ) {
                            if ( getIndex() !== pages ) {
                                switchFn(pages);
                                moreScroll("last");
                            }
                        }
                    });
                }
            }
            return this;
        },
        modalConfig: function ( options ) {
            $.each(options, function ( i, v ) {
                globalVar.modalConfig[i] = v;
            })
            return this;
        },
        alert: function ( title, content ) {
            Fn.modal("alert", title, content);
            return this;
        },
        confirm: function ( title, content ) {
            Fn.modal("confirm", title, content);
            return this;
        },
        prompt: function ( title, content ) {
            Fn.modal("prompt", title, content);
            return this;
        },
        closeModal: function () {
            if ( globalVar.modal ) {
                Fn.closeModal($(".jmn-modal-container"), $(".jmn-modal-box"), 300, globalVar.modalConfig.position);
            }
        },
        sure: function ( callback ) {
            $(".jmn-modal-sure").on("click", function () {
                callback();
            })
        },
        cancel: function ( callback ) {
            $(".jmn-modal-cancel").on("click", function () {
                callback();
            })
        },
        promptVal: function () {
            return globalVar.promptVal;
        },
        fullPage: function ( selector, options ) {

            // 配置参数
            var backgroundColor = options.backgroundColor,
                backgroundImage = options.backgroundImage,
                axis = options.axis || "y",
                keyboard = options.keyboard || true,
                navigation = options.navigation || true,
                easing = options.easing || "cubic-bezier(0.55, 0, 0.175, 1)",
                time = options.time || 700,
                enter = options.enter,
                leave = options.leave;
            var isX = !!(axis === "x"),
                isY = !!(axis === "y");
            var html = [];
            var dots = "";

            $(selector).css("overflow", "hidden").each(function () {
                var $this = $(this),
                    $child = $this.children();
                var width = $this.innerWidth(),
                    height = $this.innerHeight();
                var size = $child.length;
                var index = 0;

                // 处理内部区块
                $child.addClass("jmn-fullpage-part jmn-fullpage-" + ((isX && "x") || (isY && "y")) + "").wrapAll('<div class="jmn-fullpage-wrapper"></div>');
                var $wrapper = $this.children(),
                    $part = $wrapper.children();
                $part.each(function ( i ) {
                    $(this).css((isX && "left") || (isY && "top"), i * 100 + "%");
                })

                // 默认导航按钮
                for ( var i = 0; i < size; i++ ) {
                    dots += "<i></i>";
                }
                dots = (Fn.true(navigation)) ? ('<div class="jmn-fullpage-dot">' + dots + '</div>') : navigation;
                $wrapper.after(dots);
                var $dot = $this.children().last(),
                    $i = $dot.find("i");
                var defaultSize = $(".jmn-fullpage-dot i").outerWidth();
                isX && $dot.addClass("jmn-fullpage-dotX").height(defaultSize).width(18 * size - 8);
                isY && $dot.addClass("jmn-fullpage-dotY").width(defaultSize);
                $i.first().addClass("active");

                // 设置定位
                if ( $this.css("position") === "static" ) {
                    $this.css("position", "relative");
                }

                // 设置背景
                if ( options.backgroundColor ) {
                    $.each(options.backgroundColor, function ( i, v ) {
                        $child.eq(i).css("backgroundColor", v);
                    })
                }
                if ( options.backgroundImage ) {
                    $.each(options.backgroundImage, function ( i, v ) {
                        $child.eq(i).css("backgroundImage", "url(" + v + ")");
                    })
                }

                // 横向滚动则左浮动
                if ( isX ) {
                    $child.css("float", "left");
                }

                // 滚动函数
                var inAnimate = false;
                function ScrollAnimation ( i ) {
                    if ( !inAnimate ) {
                        var end = true;
                        inAnimate = true;
                        $wrapper.css("transitionName", "transform");
                        if ( isX ) {
                            $wrapper._xyz_("-" + (width * i) + "px, 0, 0", time, easing);
                        }
                        if ( isY ) {
                            $wrapper._xyz_("0, -" + (height * i) + "px, 0", time, easing);
                        }
                        $wrapper.on("transitionend", function () {
                            if ( end ) {
                                end = false
                                inAnimate = false;
                                if ( leave ) {
                                    leave[index].call($child.eq(index), index);
                                }
                                index = i;
                                Dot(i);
                                if ( enter ) {
                                    Callback(i);
                                }
                            }
                        })
                    }
                }

                // 回调函数
                function Callback ( i ) {
                    enter && enter[i].call($child.eq(i), i);
                }
                Callback(0);

                // 方向切换函数
                function Direction ( i ) {
                    var _i = index;
                    if ( !inAnimate ) {
                        if ( i ) {

                            // 下滑或右滑
                            _i++;
                            if ( _i < size ) {
                                ScrollAnimation(_i);
                            }
                        } else {

                            // 上滑或左滑
                            _i--;
                            if ( _i > -1 ) {
                                ScrollAnimation(_i);
                            }
                        }
                    }
                }

                // 按钮状态函数
                function Dot ( i ) {
                    $i.css("transition", ".2s").eq(i).addClass("active").siblings().removeClass("active");
                }

                // 实现滚动
                $dot.on("click", "i", function () {
                    ScrollAnimation($(this).index());
                })
                $wrapper.on({
                    _wheelUp_: function () {
                        Direction();
                    },
                    _wheelDown_: function () {
                        Direction(1);
                    }
                });
                if ( keyboard ) {
                    if ( isX ) {
                        jsModern.keyCode(37, function () {
                            Direction();
                        })
                        jsModern.keyCode(39, function () {
                            Direction(1);
                        })
                    }
                    if ( isY ) {
                        jsModern.keyCode(38, function () {
                            Direction();
                        })
                        jsModern.keyCode(40, function () {
                            Direction(1);
                        })
                    }
                }
            })
        }
    };

    Object.freeze(jsModern);
    return jsModern;

});