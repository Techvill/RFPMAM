﻿/*!
 Jssor Slider (MIT license)
 */
/* eslint-disable */
!function (i, h, m, f, d, k, e) {
    new (function () {
    });
    var c = {
        E: m.PI,
        m: m.max,
        k: m.min,
        K: m.ceil,
        M: m.floor,
        I: m.abs,
        ob: m.sin,
        ec: m.cos,
        Dd: m.tan,
        Ve: m.atan,
        gc: m.sqrt,
        n: m.pow,
        Nd: m.random,
        $Round: m.round
    }, g = i.$Jease$ = {
        $Swing: function (a) {
            return -c.ec(a * c.E) / 2 + .5
        }, $Linear: function (a) {
            return a
        }, $InQuad: function (a) {
            return a * a
        }, $OutQuad: function (a) {
            return -a * (a - 2)
        }, $InOutQuad: function (a) {
            return (a *= 2) < 1 ? 1 / 2 * a * a : -1 / 2 * (--a * (a - 2) - 1)
        }, $InCubic: function (a) {
            return a * a * a
        }, $OutCubic: function (a) {
            return (a -= 1) * a * a + 1
        }, $InOutCubic: function (a) {
            return (a *= 2) < 1 ? 1 / 2 * a * a * a : 1 / 2 * ((a -= 2) * a * a + 2)
        }, $InQuart: function (a) {
            return a * a * a * a
        }, $OutQuart: function (a) {
            return -((a -= 1) * a * a * a - 1)
        }, $InOutQuart: function (a) {
            return (a *= 2) < 1 ? 1 / 2 * a * a * a * a : -1 / 2 * ((a -= 2) * a * a * a - 2)
        }, $InQuint: function (a) {
            return a * a * a * a * a
        }, $OutQuint: function (a) {
            return (a -= 1) * a * a * a * a + 1
        }, $InOutQuint: function (a) {
            return (a *= 2) < 1 ? 1 / 2 * a * a * a * a * a : 1 / 2 * ((a -= 2) * a * a * a * a + 2)
        }, $InSine: function (a) {
            return 1 - c.ec(c.E / 2 * a)
        }, $OutSine: function (a) {
            return c.ob(c.E / 2 * a)
        }, $InOutSine: function (a) {
            return -1 / 2 * (c.ec(c.E * a) - 1)
        }, $InExpo: function (a) {
            return a == 0 ? 0 : c.n(2, 10 * (a - 1))
        }, $OutExpo: function (a) {
            return a == 1 ? 1 : -c.n(2, -10 * a) + 1
        }, $InOutExpo: function (a) {
            return a == 0 || a == 1 ? a : (a *= 2) < 1 ? 1 / 2 * c.n(2, 10 * (a - 1)) : 1 / 2 * (-c.n(2, -10 * --a) + 2)
        }, $InCirc: function (a) {
            return -(c.gc(1 - a * a) - 1)
        }, $OutCirc: function (a) {
            return c.gc(1 - (a -= 1) * a)
        }, $InOutCirc: function (a) {
            return (a *= 2) < 1 ? -1 / 2 * (c.gc(1 - a * a) - 1) : 1 / 2 * (c.gc(1 - (a -= 2) * a) + 1)
        }, $InElastic: function (a) {
            if (!a || a == 1)return a;
            var b = .3, d = .075;
            return -(c.n(2, 10 * (a -= 1)) * c.ob((a - d) * 2 * c.E / b))
        }, $OutElastic: function (a) {
            if (!a || a == 1)return a;
            var b = .3, d = .075;
            return c.n(2, -10 * a) * c.ob((a - d) * 2 * c.E / b) + 1
        }, $InOutElastic: function (a) {
            if (!a || a == 1)return a;
            var b = .45, d = .1125;
            return (a *= 2) < 1 ? -.5 * c.n(2, 10 * (a -= 1)) * c.ob((a - d) * 2 * c.E / b) : c.n(2, -10 * (a -= 1)) * c.ob((a - d) * 2 * c.E / b) * .5 + 1
        }, $InBack: function (a) {
            var b = 1.70158;
            return a * a * ((b + 1) * a - b)
        }, $OutBack: function (a) {
            var b = 1.70158;
            return (a -= 1) * a * ((b + 1) * a + b) + 1
        }, $InOutBack: function (a) {
            var b = 1.70158;
            return (a *= 2) < 1 ? 1 / 2 * a * a * (((b *= 1.525) + 1) * a - b) : 1 / 2 * ((a -= 2) * a * (((b *= 1.525) + 1) * a + b) + 2)
        }, $InBounce: function (a) {
            return 1 - g.$OutBounce(1 - a)
        }, $OutBounce: function (a) {
            return a < 1 / 2.75 ? 7.5625 * a * a : a < 2 / 2.75 ? 7.5625 * (a -= 1.5 / 2.75) * a + .75 : a < 2.5 / 2.75 ? 7.5625 * (a -= 2.25 / 2.75) * a + .9375 : 7.5625 * (a -= 2.625 / 2.75) * a + .984375
        }, $InOutBounce: function (a) {
            return a < 1 / 2 ? g.$InBounce(a * 2) * .5 : g.$OutBounce(a * 2 - 1) * .5 + .5
        }, $GoBack: function (a) {
            return 1 - c.I(2 - 1)
        }, $InWave: function (a) {
            return 1 - c.ec(a * c.E * 2)
        }, $OutWave: function (a) {
            return c.ob(a * c.E * 2)
        }, $OutJump: function (a) {
            return 1 - ((a *= 2) < 1 ? (a = 1 - a) * a * a : (a -= 1) * a * a)
        }, $InJump: function (a) {
            return (a *= 2) < 1 ? a * a * a : (a = 2 - a) * a * a
        }, $Early: c.K, $Late: c.M
    };
    var b = i.$Jssor$ = new function () {
        var j = this, xb = /\S+/g, K = 1, db = 2, gb = 3, fb = 4, jb = 5, L, r = 0, n = 0, B = 0, E = navigator,
            pb = E.appName, o = E.userAgent, q = parseFloat;

        function Gb() {
            if (!L) {
                L = {de: "ontouchstart" in i || "createTouch" in h};
                var a;
                if (E.pointerEnabled || (a = E.msPointerEnabled)) L.ge = a ? "msTouchAction" : "touchAction"
            }
            return L
        }

        function u(g) {
            if (!r) {
                r = -1;
                if (pb == "Microsoft Internet Explorer" && !!i.attachEvent && !!i.ActiveXObject) {
                    var e = o.indexOf("MSIE");
                    r = K;
                    n = q(o.substring(e + 5, o.indexOf(";", e)));
                    /*@cc_on@*/
                } else if (pb == "Netscape" && !!i.addEventListener) {
                    var d = o.indexOf("Firefox"), b = o.indexOf("Safari"), f = o.indexOf("Chrome"),
                        c = o.indexOf("AppleWebKit");
                    if (d >= 0) {
                        r = db;
                        n = q(o.substring(d + 8))
                    } else if (b >= 0) {
                        var h = o.substring(0, b).lastIndexOf("/");
                        r = f >= 0 ? fb : gb;
                        n = q(o.substring(h + 1, b))
                    } else {
                        var a = /Trident\/.*rv:([0-9]{1,}[\.0-9]{0,})/i.exec(o);
                        if (a) {
                            r = K;
                            n = q(a[1])
                        }
                    }
                    if (c >= 0) B = q(o.substring(c + 12))
                } else {
                    var a = /(opera)(?:.*version|)[ \/]([\w.]+)/i.exec(o);
                    if (a) {
                        r = jb;
                        n = q(a[2])
                    }
                }
            }
            return g == r
        }

        function v() {
            return u(K)
        }

        function zb() {
            return u(db)
        }

        function eb() {
            return u(gb)
        }

        function ib() {
            return u(jb)
        }

        function ab() {
            return eb() && B > 534 && B < 535
        }

        function H() {
            u();
            return B > 537 || n > 42 || r == K && n >= 11
        }

        function bb(a) {
            var b, c;
            return function (g) {
                if (!b) {
                    b = d;
                    var f = a.substr(0, 1).toUpperCase() + a.substr(1);
                    l([a].concat(["WebKit", "ms", "Moz", "O", "webkit"]), function (h, d) {
                        var b = a;
                        if (d) b = h + f;
                        if (g.style[b] != e)return c = b
                    })
                }
                return c
            }
        }

        function Z(b) {
            var a;
            return function (c) {
                a = a || bb(b)(c) || b;
                return a
            }
        }

        var M = Z("transform");

        function ob(a) {
            return {}.toString.call(a)
        }

        var lb = {};
        l(["Boolean", "Number", "String", "Function", "Array", "Date", "RegExp", "Object"], function (a) {
            lb["[object " + a + "]"] = a.toLowerCase()
        });
        function l(b, d) {
            var a, c;
            if (ob(b) == "[object Array]") {
                for (a = 0; a < b.length; a++)if (c = d(b[a], a, b))return c
            } else for (a in b)if (c = d(b[a], a, b))return c
        }

        function G(a) {
            return a == f ? String(a) : lb[ob(a)] || "object"
        }

        function mb(a) {
            for (var b in a)return d
        }

        function C(a) {
            try {
                return G(a) == "object" && !a.nodeType && a != a.window && (!a.constructor || {}.hasOwnProperty.call(a.constructor.prototype, "isPrototypeOf"))
            } catch (b) {
            }
        }

        function ub(b, a) {
            setTimeout(b, a || 0)
        }

        function kb(b, d, c) {
            var a = !b || b == "inherit" ? "" : b;
            l(d, function (c) {
                var b = c.exec(a);
                if (b) {
                    var d = a.substr(0, b.index), e = a.substr(b.index + b[0].length + 1, a.length - 1);
                    a = d + e
                }
            });
            a && (c += (!a.indexOf(" ") ? "" : " ") + a);
            return c
        }

        function qb(a, b) {
            if (a === e) a = b;
            return a
        }

        j.ie = Gb;
        j.je = v;
        j.Pf = zb;
        j.Lf = eb;
        j.Kf = H;
        bb("transform");
        j.cd = function () {
            return n
        };
        j.Rf = function () {
            u();
            return B
        };
        j.$Delay = ub;
        j.jb = qb;
        j.O = function (a, b) {
            b.call(a);
            return z({}, a)
        };
        function V(a) {
            a.constructor === V.caller && a.z && a.z.apply(a, V.caller.arguments)
        }

        j.z = V;
        j.$GetElement = function (a) {
            if (j.cg(a)) a = h.getElementById(a);
            return a
        };
        function t(a) {
            return a || i.event
        }

        j.Sd = t;
        j.$EvtSrc = function (b) {
            b = t(b);
            var a = b.target || b.srcElement || h;
            if (a.nodeType == 3) a = j.ed(a);
            return a
        };
        j.Td = function (a) {
            a = t(a);
            return a.which || ([0, 1, 3, 0, 2])[a.button] || a.charCode || a.keyCode
        };
        j.Wd = function (a) {
            a = t(a);
            return {x: a.pageX || a.clientX || 0, y: a.pageY || a.clientY || 0}
        };
        function w(c, d, a) {
            if (a !== e) c.style[d] = a == e ? "" : a; else {
                var b = c.currentStyle || c.style;
                a = b[d];
                if (a == "" && i.getComputedStyle) {
                    b = c.ownerDocument.defaultView.getComputedStyle(c, f);
                    b && (a = b.getPropertyValue(d) || b[d])
                }
                return a
            }
        }

        function X(b, c, a, d) {
            if (a === e) {
                a = q(w(b, c));
                isNaN(a) && (a = f);
                return a
            }
            if (a == f) a = ""; else d && (a += "px");
            w(b, c, a)
        }

        function m(c, a) {
            var d = a ? X : w, b;
            if (a & 4) b = Z(c);
            return function (e, f) {
                return d(e, b ? b(e) : c, f, a & 2)
            }
        }

        function Bb(a) {
            return q(a.style.opacity || "1")
        }

        function Db(b, a) {
            b.style.opacity = a == 1 ? "" : c.$Round(a * 100) / 100
        }

        var O = {
            $Rotate: ["rotate"],
            $RotateX: ["rotateX"],
            $RotateY: ["rotateY"],
            $SkewX: ["skewX"],
            $SkewY: ["skewY"]
        };
        if (!H()) O = z(O, {$ScaleX: ["scaleX", 2], $ScaleY: ["scaleY", 2], $TranslateZ: ["translateZ", 1]});
        function N(c, a) {
            var b = "";
            if (a) {
                if (v() && n && n < 10) {
                    delete a.$RotateX;
                    delete a.$RotateY;
                    delete a.$TranslateZ
                }
                l(a, function (d, c) {
                    var a = O[c];
                    if (a) {
                        var e = a[1] || 0;
                        if (P[c] != d) b += " " + a[0] + "(" + d + (["deg", "px", ""])[e] + ")"
                    }
                });
                if (H()) {
                    if (a.$TranslateX || a.$TranslateY || a.$TranslateZ != e) b += " translate3d(" + (a.$TranslateX || 0) + "px," + (a.$TranslateY || 0) + "px," + (a.$TranslateZ || 0) + "px)";
                    if (a.$ScaleX == e) a.$ScaleX = 1;
                    if (a.$ScaleY == e) a.$ScaleY = 1;
                    if (a.$ScaleX != 1 || a.$ScaleY != 1) b += " scale3d(" + a.$ScaleX + ", " + a.$ScaleY + ", 1)"
                }
            }
            c.style[M(c)] = b
        }

        j.rf = m("transformOrigin", 4);
        j.tf = m("backfaceVisibility", 4);
        m("transformStyle", 4);
        j.of = m("perspective", 6);
        j.kf = m("perspectiveOrigin", 4);
        j.jf = function (b, a) {
            if (v() && n < 9) b.style.zoom = a == 1 ? "" : a; else {
                var c = M(b), f = a == 1 ? "" : "scale(" + a + ")", e = b.style[c],
                    g = new RegExp(/[\s]*scale\(.*?\)/g), d = kb(e, [g], f);
                b.style[c] = d
            }
        };
        j.$AddEvent = function (a, c, d, b) {
            a = j.$GetElement(a);
            if (a.addEventListener) {
                c == "mousewheel" && a.addEventListener("DOMMouseScroll", d, b);
                a.addEventListener(c, d, b)
            } else if (a.attachEvent) {
                a.attachEvent("on" + c, d);
                b && a.setCapture && a.setCapture()
            }
        };
        j.$RemoveEvent = function (a, c, d, b) {
            a = j.$GetElement(a);
            if (a.removeEventListener) {
                c == "mousewheel" && a.removeEventListener("DOMMouseScroll", d, b);
                a.removeEventListener(c, d, b)
            } else if (a.detachEvent) {
                a.detachEvent("on" + c, d);
                b && a.releaseCapture && a.releaseCapture()
            }
        };
        j.$CancelEvent = function (a) {
            a = t(a);
            a.preventDefault && a.preventDefault();
            a.cancel = d;
            a.returnValue = k
        };
        j.$StopEvent = function (a) {
            a = t(a);
            a.stopPropagation && a.stopPropagation();
            a.cancelBubble = d
        };
        j.V = function (d, c) {
            var a = [].slice.call(arguments, 2), b = function () {
                var b = a.concat([].slice.call(arguments, 0));
                return c.apply(d, b)
            };
            return b
        };
        j.Df = function (a, b) {
            if (b == e)return a.textContent || a.innerText;
            var c = h.createTextNode(b);
            j.Fb(a);
            a.appendChild(c)
        };
        j.Ff = function (b) {
            var a = b.getBoundingClientRect();
            return {x: a.left, y: a.top, w: a.right - a.left, h: a.bottom - a.top}
        };
        j.tb = function (d, c) {
            for (var b = [], a = d.firstChild; a; a = a.nextSibling)(c || a.nodeType == 1) && b.push(a);
            return b
        };
        function nb(a, c, e, b) {
            b = b || "u";
            for (a = a ? a.firstChild : f; a; a = a.nextSibling)if (a.nodeType == 1) {
                if (D(a, b) == c)return a;
                if (!e) {
                    var d = nb(a, c, e, b);
                    if (d)return d
                }
            }
        }

        j.$FindChild = nb;
        function T(a, d, g, b) {
            b = b || "u";
            var c = [];
            for (a = a ? a.firstChild : f; a; a = a.nextSibling)if (a.nodeType == 1) {
                D(a, b) == d && c.push(a);
                if (!g) {
                    var e = T(a, d, g, b);
                    if (e.length) c = c.concat(e)
                }
            }
            return c
        }

        j.zf = function (b, a) {
            return b.getElementsByTagName(a)
        };
        j.Yb = function (a, f, d) {
            d = d || "u";
            var e;
            do {
                if (a.nodeType == 1) {
                    var c = D(a, d);
                    if (c && c == qb(f, c)) {
                        e = a;
                        break
                    }
                }
                a = b.ed(a)
            } while (a && a != h.body);
            return e
        };
        function z() {
            var f = arguments, d, c, b, a, h = 1 & f[0], g = 1 + h;
            d = f[g - 1] || {};
            for (; g < f.length; g++)if (c = f[g])for (b in c) {
                a = c[b];
                if (a !== e) {
                    a = c[b];
                    var i = d[b];
                    d[b] = h && (C(i) || C(a)) ? z(h, {}, i, a) : a
                }
            }
            return d
        }

        j.H = z;
        function W(f, g) {
            var d = {}, c, a, b;
            for (c in f) {
                a = f[c];
                b = g[c];
                if (a !== b) {
                    var e;
                    if (C(a) && C(b)) {
                        a = W(a, b);
                        e = !mb(a)
                    }
                    !e && (d[c] = a)
                }
            }
            return d
        }

        j.ne = function (a) {
            return G(a) == "function"
        };
        j.pe = function (a) {
            return G(a) == "array"
        };
        j.cg = function (a) {
            return G(a) == "string"
        };
        j.yc = function (a) {
            return !isNaN(q(a)) && isFinite(a)
        };
        j.c = l;
        j.oe = C;
        function R(a) {
            return h.createElement(a)
        }

        j.Lb = function () {
            return R("DIV")
        };
        j.Hg = function () {
            return R("SPAN")
        };
        j.Jg = function () {
        };
        function F(b, c, a) {
            if (a == e)return b.getAttribute(c);
            b.setAttribute(c, a)
        }

        function D(a, b) {
            return F(a, b) || F(a, "data-" + b)
        }

        j.q = F;
        j.T = D;
        j.B = function (d, b, c) {
            var a = j.Rd(D(d, b));
            if (isNaN(a)) a = c;
            return a
        };
        function x(b, a) {
            return F(b, "class", a) || ""
        }

        function tb(b) {
            var a = {};
            l(b, function (b) {
                if (b != e) a[b] = b
            });
            return a
        }

        function vb(b, a) {
            return b.match(a || xb)
        }

        function Q(b, a) {
            return tb(vb(b || "", a))
        }

        j.Bd = tb;
        j.Eg = vb;
        j.Ag = function (a) {
            a && (a = a.toLowerCase());
            return a
        };
        function Y(b, c) {
            var a = "";
            l(c, function (c) {
                a && (a += b);
                a += c
            });
            return a
        }

        function I(a, c, b) {
            x(a, Y(" ", z(W(Q(x(a)), Q(c)), Q(b))))
        }

        j.vd = Y;
        j.ed = function (a) {
            return a.parentNode
        };
        j.xb = function (a) {
            j.Ab(a, "none")
        };
        j.fb = function (a, b) {
            j.Ab(a, b ? "none" : "")
        };
        j.Kg = function (b, a) {
            b.removeAttribute(a)
        };
        j.Rg = function (d, a) {
            if (a) d.style.clip = "rect(" + c.$Round(a.$Top || a.L || 0) + "px " + c.$Round(a.$Right) + "px " + c.$Round(a.$Bottom) + "px " + c.$Round(a.$Left || a.N || 0) + "px)"; else if (a !== e) {
                var h = d.style.cssText,
                    g = [new RegExp(/[\s]*clip: rect\(.*?\)[;]?/i), new RegExp(/[\s]*cliptop: .*?[;]?/i), new RegExp(/[\s]*clipright: .*?[;]?/i), new RegExp(/[\s]*clipbottom: .*?[;]?/i), new RegExp(/[\s]*clipleft: .*?[;]?/i)],
                    f = kb(h, g, "");
                b.Md(d, f)
            }
        };
        j.Cb = function () {
            return +new Date
        };
        j.U = function (b, a) {
            b.appendChild(a)
        };
        j.Lg = function (b, a) {
            l(a, function (a) {
                j.U(b, a)
            })
        };
        j.Mb = function (b, a, c) {
            (c || a.parentNode).insertBefore(b, a)
        };
        j.Pg = function (b, a, c) {
            b.insertAdjacentHTML(a, c)
        };
        j.sb = function (b, a) {
            a = a || b.parentNode;
            a && a.removeChild(b)
        };
        j.kg = function (a, b) {
            l(a, function (a) {
                j.sb(a, b)
            })
        };
        j.Fb = function (a) {
            j.kg(j.tb(a, d), a)
        };
        function rb() {
            l([].slice.call(arguments, 0), function (a) {
                if (j.pe(a)) rb.apply(f, a); else a && a.$Destroy()
            })
        }

        j.$Destroy = rb;
        j.od = function (a, b) {
            var c = j.ed(a);
            if (b & 1) {
                j.R(a, (j.D(c) - j.D(a)) / 2);
                j.Hd(a, f)
            }
            if (b & 2) {
                j.W(a, (j.C(c) - j.C(a)) / 2);
                j.Jd(a, f)
            }
        };
        var S = {$Top: f, $Right: f, $Bottom: f, $Left: f, F: f, G: f};
        j.fg = function (a) {
            var b = j.Lb();
            s(b, {Cd: "block", Tb: j.mb(a), $Top: 0, $Left: 0, F: 0, G: 0});
            var d = j.td(a, S);
            j.Mb(b, a);
            j.U(b, a);
            var e = j.td(a, S), c = {};
            l(d, function (b, a) {
                if (b == e[a]) c[a] = b
            });
            s(b, S);
            s(b, c);
            s(a, {$Top: 0, $Left: 0});
            return c
        };
        j.Rd = q;
        j.nf = function (b, a) {
            var c = h.body;
            while (a && b !== a && c !== a)try {
                a = a.parentNode
            } catch (d) {
                return k
            }
            return b === a
        };
        function U(d, c, b) {
            var a = d.cloneNode(!c);
            !b && j.Kg(a, "id");
            return a
        }

        j.ab = U;
        j.Ub = function (e, f) {
            var a = new Image;

            function b(e, d) {
                j.$RemoveEvent(a, "load", b);
                j.$RemoveEvent(a, "abort", c);
                j.$RemoveEvent(a, "error", c);
                f && f(a, d)
            }

            function c(a) {
                b(a, d)
            }

            if (ib() && n < 11.6 || !e) b(!e); else {
                j.$AddEvent(a, "load", b);
                j.$AddEvent(a, "abort", c);
                j.$AddEvent(a, "error", c);
                a.src = e
            }
        };
        j.wg = function (d, a, e) {
            var c = d.length + 1;

            function b(b) {
                c--;
                if (a && b && b.src == a.src) a = b;
                !c && e && e(a)
            }

            l(d, function (a) {
                j.Ub(a.src, b)
            });
            b()
        };
        j.Ld = function (a, g, i, h) {
            if (h) a = U(a);
            var c = T(a, g);
            if (!c.length) c = b.zf(a, g);
            for (var f = c.length - 1; f > -1; f--) {
                var d = c[f], e = U(i);
                x(e, x(d));
                b.Md(e, d.style.cssText);
                b.Mb(e, d);
                b.sb(d)
            }
            return a
        };
        function Eb() {
            var a = this;
            b.O(a, p);
            var d, q = "", s = ["av", "pv", "ds", "dn"], f = [], r, n = 0, k = 0, g = 0;

            function m() {
                I(d, r, (f[g || k & 2 || k] || "") + " " + (f[n] || ""));
                j.hc(d, g ? "none" : "")
            }

            function c() {
                n = 0;
                a.Q(i, "mouseup", c);
                a.Q(h, "mouseup", c);
                a.Q(h, "touchend", c);
                a.Q(h, "touchcancel", c);
                a.Q(i, "blur", c);
                m()
            }

            function o(b) {
                if (g) j.$CancelEvent(b); else {
                    n = 4;
                    m();
                    a.a(i, "mouseup", c);
                    a.a(h, "mouseup", c);
                    a.a(h, "touchend", c);
                    a.a(h, "touchcancel", c);
                    a.a(i, "blur", c)
                }
            }

            a.sd = function (a) {
                if (a === e)return k;
                k = a & 2 || a & 1;
                m()
            };
            a.$Enable = function (a) {
                if (a === e)return !g;
                g = a ? 0 : 3;
                m()
            };
            a.z = function (e) {
                a.$Elmt = d = j.$GetElement(e);
                F(d, "data-jssor-button", "1");
                var c = b.Eg(x(d));
                if (c) q = c.shift();
                l(s, function (a) {
                    f.push(q + a)
                });
                r = Y(" ", f);
                f.unshift("");
                a.a(d, "mousedown", o);
                a.a(d, "touchstart", o)
            };
            b.z(a)
        }

        j.Cc = function (a) {
            return new Eb(a)
        };
        j.Sb = w;
        j.Rb = m("overflow");
        j.hc = m("pointerEvents");
        j.W = m("top", 2);
        j.Hd = m("right", 2);
        j.Jd = m("bottom", 2);
        j.R = m("left", 2);
        j.D = m("width", 2);
        j.C = m("height", 2);
        m("marginLeft", 2);
        m("marginTop", 2);
        j.mb = m("position");
        j.Ab = m("display");
        j.P = m("zIndex", 1);
        j.rg = function (b, a, c) {
            if (a != e) Db(b, a, c); else return Bb(b)
        };
        j.Md = function (a, b) {
            if (b != e) a.style.cssText = b; else return a.style.cssText
        };
        j.Ae = function (b, a) {
            if (a === e) {
                a = w(b, "backgroundImage") || "";
                var c = /\burl\s*\(\s*["']?([^"'\r\n,]+)["']?\s*\)/gi.exec(a) || [];
                return c[1]
            }
            w(b, "backgroundImage", a ? "url('" + a + "')" : "")
        };
        var J;
        j.Ie = J = {
            $Opacity: j.rg,
            $Top: j.W,
            $Right: j.Hd,
            $Bottom: j.Jd,
            $Left: j.R,
            F: j.D,
            G: j.C,
            Tb: j.mb,
            Cd: j.Ab,
            $ZIndex: j.P
        };
        j.td = function (c, b) {
            var a = {};
            l(b, function (d, b) {
                if (J[b]) a[b] = J[b](c)
            });
            return a
        };
        function s(b, i) {
            var a = H(), g = ab(), h = M(b);

            function d(l, a) {
                a = a || {};
                var g = a.$TranslateZ || 0, i = (a.$RotateX || 0) % 360, j = (a.$RotateY || 0) % 360,
                    k = (a.$Rotate || 0) % 360, c = a.$ScaleX, d = a.$ScaleY, f = a.Bh;
                if (c == e) c = 1;
                if (d == e) d = 1;
                if (f == e) f = 1;
                var b = new Ab(a.$TranslateX, a.$TranslateY, g);
                b.$Scale(c, d, f);
                b.Ke(a.$SkewX, a.$SkewY);
                b.$RotateX(i);
                b.$RotateY(j);
                b.Be(k);
                b.$Move(a.N, a.L);
                l.style[h] = b.De()
            }

            s = function (c, b) {
                b = b || {};
                var i = b.N, k = b.L, h;
                l(J, function (a, d) {
                    h = b[d];
                    h !== e && a(c, h)
                });
                j.Rg(c, b.$Clip);
                if (!a) {
                    i != e && j.R(c, (b.Od || 0) + i);
                    k != e && j.W(c, (b.Ed || 0) + k)
                }
                if (b.af)if (g) ub(j.V(f, N, c, b)); else if (a) d(c, b); else N(c, b)
            };
            j.X = s;
            s(b, i)
        }

        j.Ze = N;
        j.X = s;
        function Ab(j, k, o) {
            var d = this, b = [1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, j || 0, k || 0, o || 0, 1], i = c.ob, h = c.ec,
                l = c.Dd;

            function g(a) {
                return a * c.E / 180
            }

            function m(b, c, f, g, i, l, n, o, q, t, u, w, y, A, C, F, a, d, e, h, j, k, m, p, r, s, v, x, z, B, D, E) {
                return [b * a + c * j + f * r + g * z, b * d + c * k + f * s + g * B, b * e + c * m + f * v + g * D, b * h + c * p + f * x + g * E, i * a + l * j + n * r + o * z, i * d + l * k + n * s + o * B, i * e + l * m + n * v + o * D, i * h + l * p + n * x + o * E, q * a + t * j + u * r + w * z, q * d + t * k + u * s + w * B, q * e + t * m + u * v + w * D, q * h + t * p + u * x + w * E, y * a + A * j + C * r + F * z, y * d + A * k + C * s + F * B, y * e + A * m + C * v + F * D, y * h + A * p + C * x + F * E]
            }

            function e(c, a) {
                return m.apply(f, (a || b).concat(c))
            }

            d.$Scale = function (a, c, d) {
                if (a != 1 || c != 1 || d != 1) b = e([a, 0, 0, 0, 0, c, 0, 0, 0, 0, d, 0, 0, 0, 0, 1])
            };
            d.$Move = function (a, c, d) {
                b[12] += a || 0;
                b[13] += c || 0;
                b[14] += d || 0
            };
            d.$RotateX = function (c) {
                if (c) {
                    a = g(c);
                    var d = h(a), f = i(a);
                    b = e([1, 0, 0, 0, 0, d, f, 0, 0, -f, d, 0, 0, 0, 0, 1])
                }
            };
            d.$RotateY = function (c) {
                if (c) {
                    a = g(c);
                    var d = h(a), f = i(a);
                    b = e([d, 0, -f, 0, 0, 1, 0, 0, f, 0, d, 0, 0, 0, 0, 1])
                }
            };
            d.Be = function (c) {
                if (c) {
                    a = g(c);
                    var d = h(a), f = i(a);
                    b = e([d, f, 0, 0, -f, d, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1])
                }
            };
            d.Ke = function (a, c) {
                if (a || c) {
                    j = g(a);
                    k = g(c);
                    b = e([1, l(k), 0, 0, l(j), 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1])
                }
            };
            d.De = function () {
                return "matrix3d(" + b.join(",") + ")"
            }
        }

        var P = {
            Od: 0,
            Ed: 0,
            N: 0,
            L: 0,
            $Zoom: 1,
            $ScaleX: 1,
            $ScaleY: 1,
            $Rotate: 0,
            $RotateX: 0,
            $RotateY: 0,
            $TranslateX: 0,
            $TranslateY: 0,
            $TranslateZ: 0,
            $SkewX: 0,
            $SkewY: 0
        };
        j.nd = function (c, d) {
            var a = c || {};
            if (c)if (b.ne(c)) a = {jb: a}; else if (b.ne(c.$Clip)) a.$Clip = {jb: c.$Clip};
            a.jb = a.jb || d;
            if (a.$Clip) a.$Clip.jb = a.$Clip.jb || d;
            return a
        };
        function sb(c, a) {
            var b = {};
            l(c, function (c, d) {
                var f = c;
                if (a[d] != e)if (j.yc(c)) f = c + a[d]; else f = sb(c, a[d]);
                b[d] = f
            });
            return b
        }

        j.Xe = sb;
        j.Pd = function (o, j, s, t, D, E, p) {
            var a = j;
            if (o) {
                a = {};
                for (var i in j) {
                    var F = E[i] || 1, B = D[i] || [0, 1], h = (s - B[0]) / B[1];
                    h = c.k(c.m(h, 0), 1);
                    h = h * F;
                    var y = c.M(h);
                    if (h != y) h -= y;
                    var k = t.jb || g.$Linear, m, G = o[i], r = j[i];
                    if (b.yc(r)) {
                        k = t[i] || k;
                        var C = k(h);
                        m = G + r * C
                    } else {
                        m = z({sc: {}}, o[i]);
                        var A = t[i] || {};
                        l(r.sc || r, function (d, a) {
                            k = A[a] || A.jb || k;
                            var c = k(h), b = d * c;
                            m.sc[a] = b;
                            m[a] += b
                        })
                    }
                    a[i] = m
                }
                var x = l(j, function (b, a) {
                    return P[a] != e
                });
                x && l(P, function (c, b) {
                    if (a[b] == e && o[b] !== e) a[b] = o[b]
                });
                if (x) {
                    if (a.$Zoom) a.$ScaleX = a.$ScaleY = a.$Zoom;
                    a.$OriginalWidth = p.$OriginalWidth;
                    a.$OriginalHeight = p.$OriginalHeight;
                    if (v() && n >= 11 && (j.N || j.L) && s != 0 && s != 1) a.$Rotate = a.$Rotate || 1e-8;
                    a.af = d
                }
            }
            if (j.$Clip && p.$Move) {
                var q = a.$Clip.sc, w = (q.$Top || 0) + (q.$Bottom || 0), u = (q.$Left || 0) + (q.$Right || 0);
                a.$Left = (a.$Left || 0) + u;
                a.$Top = (a.$Top || 0) + w;
                a.$Clip.$Left -= u;
                a.$Clip.$Right -= u;
                a.$Clip.$Top -= w;
                a.$Clip.$Bottom -= w
            }
            if (a.$Clip && !a.$Clip.$Top && !a.$Clip.$Left && !a.$Clip.L && !a.$Clip.N && a.$Clip.$Right == p.$OriginalWidth && a.$Clip.$Bottom == p.$OriginalHeight) a.$Clip = f;
            return a
        }
    };

    function p() {
        var a = this, f, e = [], c = [];

        function k(a, b) {
            e.push({Ob: a, bc: b})
        }

        function j(a, c) {
            b.c(e, function (b, d) {
                b.Ob == a && b.bc === c && e.splice(d, 1)
            })
        }

        function h() {
            e = []
        }

        function g() {
            b.c(c, function (a) {
                b.$RemoveEvent(a.ud, a.Ob, a.bc, a.wd)
            });
            c = []
        }

        a.Ec = function () {
            return f
        };
        a.a = function (f, d, e, a) {
            b.$AddEvent(f, d, e, a);
            c.push({ud: f, Ob: d, bc: e, wd: a})
        };
        a.Q = function (f, d, e, a) {
            b.c(c, function (g, h) {
                if (g.ud === f && g.Ob == d && g.bc === e && g.wd == a) {
                    b.$RemoveEvent(f, d, e, a);
                    c.splice(h, 1)
                }
            })
        };
        a.Kd = g;
        a.$On = a.addEventListener = k;
        a.$Off = a.removeEventListener = j;
        a.j = function (a) {
            var c = [].slice.call(arguments, 1);
            b.c(e, function (b) {
                b.Ob == a && b.bc.apply(i, c)
            })
        };
        a.$Destroy = function () {
            if (!f) {
                f = d;
                g();
                h()
            }
        }
    }

    var l = function (C, F, h, m, T, O) {
        C = C || 0;
        var a = this, p, n, o, t, D = 0, Q = 1, M, N, L, E, B = 0, j = 0, r = 0, A, l, f, g, s, z, v = [], y, I = k, J,
            H = k;

        function U(a) {
            f += a;
            g += a;
            l += a;
            j += a;
            r += a;
            B += a
        }

        function x(x) {
            var k = x;
            if (s)if (!z && (k >= g || k < f) || z && k >= f) k = ((k - f) % s + s) % s + f;
            if (!A || t || j != k) {
                var i = c.k(k, g);
                i = c.m(i, f);
                if (h.$Reverse) i = g - i + f;
                if (!A || t || i != r) {
                    if (O) {
                        var w = (i - l) / (F || 1), o = b.Pd(T, O, w, M, L, N, h);
                        if (y) b.c(o, function (b, a) {
                            y[a] && y[a](m, b)
                        }); else b.X(m, o);
                        var n;
                        if (J) {
                            toDisablePointerEventsByAnimation = i > f && i < g;
                            if (toDisablePointerEventsByAnimation != H) n = H = toDisablePointerEventsByAnimation
                        }
                        if (!n && o.$Opacity != e) {
                            var p = o.$Opacity < .001;
                            if (p != I) n = I = p
                        }
                        if (n != e) {
                            n && b.hc(m, "none");
                            !n && b.hc(m, b.q(m, "data-events"))
                        }
                    }
                    var u = r, q = r = i;
                    b.c(v, function (b, c) {
                        var a = !A && z || k <= j ? v[v.length - c - 1] : b;
                        a.Z(i - B)
                    });
                    j = k;
                    A = d;
                    a.Lc(u - l, q - l);
                    a.ac(u, q)
                }
            }
        }

        function G(a, b, d) {
            b && a.$Shift(g);
            if (!d) {
                f = c.k(f, a.xc() + B);
                g = c.m(g, a.ub() + B)
            }
            v.push(a)
        }

        var u = i.requestAnimationFrame || i.webkitRequestAnimationFrame || i.mozRequestAnimationFrame || i.msRequestAnimationFrame;
        if (b.Lf() && b.cd() < 7 || !u) u = function (a) {
            b.$Delay(a, h.$Interval)
        };
        function P() {
            if (p) {
                var d = b.Cb(), e = c.k(d - D, h.ye), a = j + e * o * Q;
                D = d;
                if (a * o >= n * o) a = n;
                x(a);
                if (!t && a * o >= n * o) R(E); else u(P)
            }
        }

        function w(e, h, i) {
            if (!p) {
                p = d;
                t = i;
                E = h;
                e = c.m(e, f);
                e = c.k(e, g);
                n = e;
                o = n < j ? -1 : 1;
                a.Kc();
                D = b.Cb();
                u(P)
            }
        }

        function R(b) {
            if (p) {
                t = p = E = k;
                a.Mc();
                b && b()
            }
        }

        a.$Play = function (a, b, c) {
            w(a ? j + a : g, b, c)
        };
        a.wc = w;
        a.Ce = function (a, b) {
            w(g, a, b)
        };
        a.J = R;
        a.ue = function () {
            return j
        };
        a.me = function () {
            return n
        };
        a.s = function () {
            return r
        };
        a.Z = x;
        a.Re = function () {
            x(g, d)
        };
        a.$IsPlaying = function () {
            return p
        };
        a.Yd = function (a) {
            Q = a
        };
        a.$Shift = U;
        a.vd = G;
        a.Y = function (a, b) {
            G(a, 0, b)
        };
        a.ad = function (a) {
            G(a, 1)
        };
        a.md = function (a) {
            g += a
        };
        a.xc = function () {
            return f
        };
        a.ub = function () {
            return g
        };
        a.ac = a.Kc = a.Mc = a.Lc = b.Jg;
        a.pd = b.Cb();
        h = b.H({$Interval: 16, ye: 50}, h);
        m && (J = b.q(m, "data-inactive"));
        s = h.Dc;
        z = h.We;
        y = h.Ne;
        f = l = C;
        g = C + F;
        N = h.$Round || {};
        L = h.$During || {};
        M = b.nd(h.$Easing)
    };
    var n = {Me: "data-scale", Db: "data-autocenter", bd: "data-nofreeze", he: "data-nodrag"}, q = new function () {
        var a = this;
        a.jc = function (c, a, e, d) {
            (d || !b.q(c, a)) && b.q(c, a, e)
        };
        a.lc = function (a) {
            var c = b.B(a, n.Db);
            b.od(a, c)
        }
    }, s = i.$JssorSlideshowFormations$ = new function () {
        var h = this, b = 0, a = 1, f = 2, e = 3, s = 1, r = 2, t = 4, q = 8, w = 256, x = 512, v = 1024, u = 2048,
            j = u + s, i = u + r, o = x + s, m = x + r, n = w + t, k = w + q, l = v + t, p = v + q;

        function y(a) {
            return (a & r) == r
        }

        function z(a) {
            return (a & t) == t
        }

        function g(b, a, c) {
            c.push(a);
            b[a] = b[a] || [];
            b[a].push(c)
        }

        h.$FormationStraight = function (f) {
            for (var d = f.$Cols, e = f.$Rows, s = f.$Assembly, t = f.vc, r = [], a = 0, b = 0, p = d - 1, q = e - 1,
                     h = t - 1, c, b = 0; b < e; b++)for (a = 0; a < d; a++) {
                switch (s) {
                    case j:
                        c = h - (a * e + (q - b));
                        break;
                    case l:
                        c = h - (b * d + (p - a));
                        break;
                    case o:
                        c = h - (a * e + b);
                    case n:
                        c = h - (b * d + a);
                        break;
                    case i:
                        c = a * e + b;
                        break;
                    case k:
                        c = b * d + (p - a);
                        break;
                    case m:
                        c = a * e + (q - b);
                        break;
                    default:
                        c = b * d + a
                }
                g(r, c, [b, a])
            }
            return r
        };
        h.$FormationSwirl = function (q) {
            var x = q.$Cols, y = q.$Rows, B = q.$Assembly, w = q.vc, A = [], z = [], u = 0, c = 0, h = 0, r = x - 1,
                s = y - 1, t, p, v = 0;
            switch (B) {
                case j:
                    c = r;
                    h = 0;
                    p = [f, a, e, b];
                    break;
                case l:
                    c = 0;
                    h = s;
                    p = [b, e, a, f];
                    break;
                case o:
                    c = r;
                    h = s;
                    p = [e, a, f, b];
                    break;
                case n:
                    c = r;
                    h = s;
                    p = [a, e, b, f];
                    break;
                case i:
                    c = 0;
                    h = 0;
                    p = [f, b, e, a];
                    break;
                case k:
                    c = r;
                    h = 0;
                    p = [a, f, b, e];
                    break;
                case m:
                    c = 0;
                    h = s;
                    p = [e, b, f, a];
                    break;
                default:
                    c = 0;
                    h = 0;
                    p = [b, f, a, e]
            }
            u = 0;
            while (u < w) {
                t = h + "," + c;
                if (c >= 0 && c < x && h >= 0 && h < y && !z[t]) {
                    z[t] = d;
                    g(A, u++, [h, c])
                } else switch (p[v++ % p.length]) {
                    case b:
                        c--;
                        break;
                    case f:
                        h--;
                        break;
                    case a:
                        c++;
                        break;
                    case e:
                        h++
                }
                switch (p[v % p.length]) {
                    case b:
                        c++;
                        break;
                    case f:
                        h++;
                        break;
                    case a:
                        c--;
                        break;
                    case e:
                        h--
                }
            }
            return A
        };
        h.$FormationZigZag = function (p) {
            var w = p.$Cols, x = p.$Rows, z = p.$Assembly, v = p.vc, t = [], u = 0, c = 0, d = 0, q = w - 1, r = x - 1,
                y, h, s = 0;
            switch (z) {
                case j:
                    c = q;
                    d = 0;
                    h = [f, a, e, a];
                    break;
                case l:
                    c = 0;
                    d = r;
                    h = [b, e, a, e];
                    break;
                case o:
                    c = q;
                    d = r;
                    h = [e, a, f, a];
                    break;
                case n:
                    c = q;
                    d = r;
                    h = [a, e, b, e];
                    break;
                case i:
                    c = 0;
                    d = 0;
                    h = [f, b, e, b];
                    break;
                case k:
                    c = q;
                    d = 0;
                    h = [a, f, b, f];
                    break;
                case m:
                    c = 0;
                    d = r;
                    h = [e, b, f, b];
                    break;
                default:
                    c = 0;
                    d = 0;
                    h = [b, f, a, f]
            }
            u = 0;
            while (u < v) {
                y = d + "," + c;
                if (c >= 0 && c < w && d >= 0 && d < x && typeof t[y] == "undefined") {
                    g(t, u++, [d, c]);
                    switch (h[s % h.length]) {
                        case b:
                            c++;
                            break;
                        case f:
                            d++;
                            break;
                        case a:
                            c--;
                            break;
                        case e:
                            d--
                    }
                } else {
                    switch (h[s++ % h.length]) {
                        case b:
                            c--;
                            break;
                        case f:
                            d--;
                            break;
                        case a:
                            c++;
                            break;
                        case e:
                            d++
                    }
                    switch (h[s++ % h.length]) {
                        case b:
                            c++;
                            break;
                        case f:
                            d++;
                            break;
                        case a:
                            c--;
                            break;
                        case e:
                            d--
                    }
                }
            }
            return t
        };
        h.$FormationStraightStairs = function (q) {
            var u = q.$Cols, v = q.$Rows, e = q.$Assembly, t = q.vc, r = [], s = 0, c = 0, d = 0, f = u - 1, h = v - 1,
                x = t - 1;
            switch (e) {
                case j:
                case m:
                case o:
                case i:
                    var a = 0, b = 0;
                    break;
                case k:
                case l:
                case n:
                case p:
                    var a = f, b = 0;
                    break;
                default:
                    e = p;
                    var a = f, b = 0
            }
            c = a;
            d = b;
            while (s < t) {
                if (z(e) || y(e)) g(r, x - s++, [d, c]); else g(r, s++, [d, c]);
                switch (e) {
                    case j:
                    case m:
                        c--;
                        d++;
                        break;
                    case o:
                    case i:
                        c++;
                        d--;
                        break;
                    case k:
                    case l:
                        c--;
                        d--;
                        break;
                    case p:
                    case n:
                    default:
                        c++;
                        d++
                }
                if (c < 0 || d < 0 || c > f || d > h) {
                    switch (e) {
                        case j:
                        case m:
                            a++;
                            break;
                        case k:
                        case l:
                        case o:
                        case i:
                            b++;
                            break;
                        case p:
                        case n:
                        default:
                            a--
                    }
                    if (a < 0 || b < 0 || a > f || b > h) {
                        switch (e) {
                            case j:
                            case m:
                                a = f;
                                b++;
                                break;
                            case o:
                            case i:
                                b = h;
                                a++;
                                break;
                            case k:
                            case l:
                                b = h;
                                a--;
                                break;
                            case p:
                            case n:
                            default:
                                a = 0;
                                b++
                        }
                        if (b > h) b = h; else if (b < 0) b = 0; else if (a > f) a = f; else if (a < 0) a = 0
                    }
                    d = b;
                    c = a
                }
            }
            return r
        };
        h.$FormationRectangle = function (f) {
            var d = f.$Cols || 1, e = f.$Rows || 1, h = [], a, b, i;
            i = c.$Round(c.k(d / 2, e / 2)) + 1;
            for (a = 0; a < d; a++)for (b = 0; b < e; b++)g(h, i - c.k(a + 1, b + 1, d - a, e - b), [b, a]);
            return h
        };
        h.$FormationRandom = function (d) {
            for (var e = [], a,
                     b = 0; b < d.$Rows; b++)for (a = 0; a < d.$Cols; a++)g(e, c.K(1e5 * c.Nd()) % 13, [b, a]);
            return e
        };
        h.$FormationCircle = function (d) {
            for (var e = d.$Cols || 1, f = d.$Rows || 1, h = [], a, i = e / 2 - .5, j = f / 2 - .5,
                     b = 0; b < e; b++)for (a = 0; a < f; a++)g(h, c.$Round(c.gc(c.n(b - i, 2) + c.n(a - j, 2))), [a, b]);
            return h
        };
        h.$FormationCross = function (d) {
            for (var e = d.$Cols || 1, f = d.$Rows || 1, h = [], a, i = e / 2 - .5, j = f / 2 - .5,
                     b = 0; b < e; b++)for (a = 0; a < f; a++)g(h, c.$Round(c.k(c.I(b - i), c.I(a - j))), [a, b]);
            return h
        };
        h.$FormationRectangleCross = function (f) {
            for (var h = f.$Cols || 1, i = f.$Rows || 1, j = [], a, d = h / 2 - .5, e = i / 2 - .5, k = c.m(d, e) + 1,
                     b = 0; b < h; b++)for (a = 0; a < i; a++)g(j, c.$Round(k - c.m(d - c.I(b - d), e - c.I(a - e))) - 1, [a, b]);
            return j
        }
    };
    i.$JssorSlideshowRunner$ = function (m, r, o, u, z, A) {
        var a = this, v, h, e, y = 0, x = u.$TransitionsOrder, q, i = 8;

        function t(a) {
            if (a.$Top) a.L = a.$Top;
            if (a.$Left) a.N = a.$Left;
            b.c(a, function (a) {
                b.oe(a) && t(a)
            })
        }

        function j(h, e, f) {
            var a = {
                $Interval: e,
                $Duration: 1,
                $Delay: 0,
                $Cols: 1,
                $Rows: 1,
                $Opacity: 0,
                $Zoom: 0,
                $Clip: 0,
                $Move: k,
                $SlideOut: k,
                $Reverse: k,
                $Formation: s.$FormationRandom,
                $Assembly: 1032,
                $ChessMode: {$Column: 0, $Row: 0},
                $Easing: g.$Linear,
                $Round: {},
                kc: [],
                $During: {}
            };
            b.H(a, h);
            if (a.$Rows == 0) a.$Rows = c.$Round(a.$Cols * f);
            t(a);
            a.vc = a.$Cols * a.$Rows;
            a.$Easing = b.nd(a.$Easing, g.$Linear);
            a.Af = c.K(a.$Duration / a.$Interval);
            a.vf = function (c, b) {
                c /= a.$Cols;
                b /= a.$Rows;
                var f = c + "x" + b;
                if (!a.kc[f]) {
                    a.kc[f] = {F: c, G: b};
                    for (var d = 0; d < a.$Cols; d++)for (var e = 0; e < a.$Rows; e++)a.kc[f][e + "," + d] = {
                        $Top: e * b,
                        $Right: d * c + c,
                        $Bottom: e * b + b,
                        $Left: d * c
                    }
                }
                return a.kc[f]
            };
            if (a.$Brother) {
                a.$Brother = j(a.$Brother, e, f);
                a.$SlideOut = d
            }
            return a
        }

        function n(z, i, a, v, n, l) {
            var y = this, t, u = {}, h = {}, m = [], f, e, r, p = a.$ChessMode.$Column || 0, q = a.$ChessMode.$Row || 0,
                g = a.vf(n, l), o = B(a), C = o.length - 1, s = a.$Duration + a.$Delay * C, w = v + s, j = a.$SlideOut,
                x;
            w += 50;
            function B(a) {
                var b = a.$Formation(a);
                return a.$Reverse ? b.reverse() : b
            }

            y.le = w;
            y.Ac = function (d) {
                d -= v;
                var e = d < s;
                if (e || x) {
                    x = e;
                    if (!j) d = s - d;
                    var f = c.K(d / a.$Interval);
                    b.c(h, function (a, e) {
                        var d = c.m(f, a.k);
                        d = c.k(d, a.length - 1);
                        if (a.ve != d) {
                            if (!a.ve && !j) b.fb(m[e]); else d == a.m && j && b.xb(m[e]);
                            a.ve = d;
                            b.X(m[e], a[d])
                        }
                    })
                }
            };
            i = b.ab(i);
            A(i, 0, 0);
            b.c(o, function (i, m) {
                b.c(i, function (G) {
                    var I = G[0], H = G[1], v = I + "," + H, o = k, s = k, x = k;
                    if (p && H % 2) {
                        if (p & 3) o = !o;
                        if (p & 12) s = !s;
                        if (p & 16) x = !x
                    }
                    if (q && I % 2) {
                        if (q & 3) o = !o;
                        if (q & 12) s = !s;
                        if (q & 16) x = !x
                    }
                    a.$Top = a.$Top || a.$Clip & 4;
                    a.$Bottom = a.$Bottom || a.$Clip & 8;
                    a.$Left = a.$Left || a.$Clip & 1;
                    a.$Right = a.$Right || a.$Clip & 2;
                    var C = s ? a.$Bottom : a.$Top, z = s ? a.$Top : a.$Bottom, B = o ? a.$Right : a.$Left,
                        A = o ? a.$Left : a.$Right;
                    a.$Clip = C || z || B || A;
                    r = {};
                    e = {L: 0, N: 0, $Opacity: 1, F: n, G: l};
                    f = b.H({}, e);
                    t = b.H({}, g[v]);
                    if (a.$Opacity) e.$Opacity = 2 - a.$Opacity;
                    if (a.$ZIndex) {
                        e.$ZIndex = a.$ZIndex;
                        f.$ZIndex = 0
                    }
                    var K = a.$Cols * a.$Rows > 1 || a.$Clip;
                    if (a.$Zoom || a.$Rotate) {
                        var J = d;
                        if (J) {
                            e.$Zoom = a.$Zoom ? a.$Zoom - 1 : 1;
                            f.$Zoom = 1;
                            var N = a.$Rotate || 0;
                            e.$Rotate = N * 360 * (x ? -1 : 1);
                            f.$Rotate = 0
                        }
                    }
                    if (K) {
                        var i = t.sc = {};
                        if (a.$Clip) {
                            var w = a.$ScaleClip || 1;
                            if (C && z) {
                                i.$Top = g.G / 2 * w;
                                i.$Bottom = -i.$Top
                            } else if (C) i.$Bottom = -g.G * w; else if (z) i.$Top = g.G * w;
                            if (B && A) {
                                i.$Left = g.F / 2 * w;
                                i.$Right = -i.$Left
                            } else if (B) i.$Right = -g.F * w; else if (A) i.$Left = g.F * w
                        }
                        r.$Clip = t;
                        f.$Clip = g[v]
                    }
                    var L = o ? 1 : -1, M = s ? 1 : -1;
                    if (a.x) e.N += n * a.x * L;
                    if (a.y) e.L += l * a.y * M;
                    b.c(e, function (a, c) {
                        if (b.yc(a))if (a != f[c]) r[c] = a - f[c]
                    });
                    u[v] = j ? f : e;
                    var D = a.Af, y = c.$Round(m * a.$Delay / a.$Interval);
                    h[v] = new Array(y);
                    h[v].k = y;
                    h[v].m = y + D - 1;
                    for (var F = 0; F <= D; F++) {
                        var E = b.Pd(f, r, F / D, a.$Easing, a.$During, a.$Round, {
                            $Move: a.$Move,
                            $OriginalWidth: n,
                            $OriginalHeight: l
                        });
                        E.$ZIndex = E.$ZIndex || 1;
                        h[v].push(E)
                    }
                })
            });
            o.reverse();
            b.c(o, function (a) {
                b.c(a, function (c) {
                    var f = c[0], e = c[1], d = f + "," + e, a = i;
                    if (e || f) a = b.ab(i);
                    b.X(a, u[d]);
                    b.Rb(a, "hidden");
                    b.mb(a, "absolute");
                    z.Ig(a);
                    m[d] = a;
                    b.fb(a, !j)
                })
            })
        }

        function w() {
            var a = this, b = 0;
            l.call(a, 0, v);
            a.ac = function (c, a) {
                if (a - b > i) {
                    b = a;
                    e && e.Ac(a);
                    h && h.Ac(a)
                }
            };
            a.Nc = q
        }

        a.Bg = function () {
            var a = 0, b = u.$Transitions, d = b.length;
            if (x) a = y++ % d; else a = c.M(c.Nd() * d);
            b[a] && (b[a].fc = a);
            return b[a]
        };
        a.Pe = function (x, y, k, l, b, t) {
            a.Bb();
            q = b;
            b = j(b, i, t);
            var g = l.zd, f = k.zd;
            g["no-image"] = !l.dd;
            f["no-image"] = !k.dd;
            var p = g, s = f, w = b, d = b.$Brother || j({}, i, t);
            if (!b.$SlideOut) {
                p = f;
                s = g
            }
            var u = d.$Shift || 0;
            h = new n(m, s, d, c.m(u - d.$Interval, 0), r, o);
            e = new n(m, p, w, c.m(d.$Interval - u, 0), r, o);
            h.Ac(0);
            e.Ac(0);
            v = c.m(h.le, e.le);
            a.fc = x
        };
        a.Bb = function () {
            m.Bb();
            h = f;
            e = f
        };
        a.Le = function () {
            var a = f;
            if (e) a = new w;
            return a
        };
        if (z && b.Rf() < 537) i = 16;
        p.call(a);
        l.call(a, -1e7, 1e7)
    };
    var r = {Bc: 1};
    i.$JssorBulletNavigator$ = function () {
        var a = this, E = b.O(a, p), h, v, C, B, o, m = 0, g, s, l, z, A, i, k, u, t, x, j;

        function y(a) {
            j[a] && j[a].sd(a == m)
        }

        function w(b) {
            a.j(r.Bc, b * s)
        }

        a.Pc = function (a) {
            if (a != o) {
                var d = m, b = c.M(a / s);
                m = b;
                o = a;
                y(d);
                y(b)
            }
        };
        a.Xc = function (a) {
            b.fb(h, a)
        };
        a.Qc = function (H) {
            b.$Destroy(j);
            o = e;
            a.Kd();
            x = [];
            j = [];
            b.Fb(h);
            v = c.K(H / s);
            m = 0;
            var y = u + z, E = t + A, r = c.K(v / l) - 1;
            C = u + y * (!i ? r : l - 1);
            B = t + E * (i ? r : l - 1);
            b.D(h, C);
            b.C(h, B);
            for (var n = 0; n < v; n++) {
                var G = b.Hg();
                b.Df(G, n + 1);
                var p = b.Ld(k, "numbertemplate", G, d);
                b.mb(p, "absolute");
                var F = g.Vb && !i ? r - n : n;
                b.R(p, !i ? y * F : n % l * y);
                b.W(p, i ? E * F : c.M(n / (r + 1)) * E);
                b.U(h, p);
                x[n] = p;
                g.$ActionMode & 1 && a.a(p, "click", b.V(f, w, n));
                g.$ActionMode & 2 && a.a(p, "mouseenter", b.V(f, w, n));
                j[n] = b.Cc(p)
            }
            q.lc(h)
        };
        a.z = function (d, c) {
            a.$Elmt = h = b.$GetElement(d);
            a.jd = g = b.H({$SpacingX: 10, $SpacingY: 10, $ActionMode: 1}, c);
            k = b.$FindChild(h, "prototype");
            u = b.D(k);
            t = b.C(k);
            b.sb(k, h);
            s = g.$Steps || 1;
            l = g.$Rows || 1;
            z = g.$SpacingX;
            A = g.$SpacingY;
            i = g.$Orientation & 2;
            g.$AutoCenter && q.jc(h, n.Db, g.$AutoCenter)
        };
        a.$Destroy = function () {
            b.$Destroy(j, E)
        };
        b.z(a)
    };
    i.$JssorArrowNavigator$ = function () {
        var a = this, v = b.O(a, p), e, c, g, l, s, k, h, m, j, i;

        function o(b) {
            a.j(r.Bc, b, d)
        }

        function u(a) {
            b.fb(e, a);
            b.fb(c, a)
        }

        function t() {
            j.$Enable((g.$Loop || !l.gf(h)) && k > 1);
            i.$Enable((g.$Loop || !l.ef(h)) && k > 1)
        }

        a.Pc = function (c, a, b) {
            h = a;
            !b && t()
        };
        a.Xc = u;
        a.Qc = function (g) {
            k = g;
            h = 0;
            if (!s) {
                a.a(e, "click", b.V(f, o, -m));
                a.a(c, "click", b.V(f, o, m));
                j = b.Cc(e);
                i = b.Cc(c);
                b.q(e, n.bd, 1);
                b.q(c, n.bd, 1);
                s = d
            }
        };
        a.z = function (f, d, h, i) {
            a.jd = g = b.H({$Steps: 1}, h);
            e = f;
            c = d;
            if (g.Vb) {
                e = d;
                c = f
            }
            m = g.$Steps;
            l = i;
            if (g.$AutoCenter) {
                q.jc(e, n.Db, g.$AutoCenter);
                q.jc(c, n.Db, g.$AutoCenter)
            }
            q.lc(e);
            q.lc(c)
        };
        a.$Destroy = function () {
            b.$Destroy(j, i, v)
        };
        b.z(a)
    };
    i.$JssorThumbnailNavigator$ = function () {
        var i = this, E = b.O(i, p), h, B, a, y, C, m, l = [], A, z, g, o, s, w, v, x, t, u;

        function D() {
            var c = this;
            b.O(c, p);
            var h, e, n, l;

            function o() {
                n.sd(m == h)
            }

            function j(e) {
                if (e || !t.$LastDragSucceeded()) {
                    var c = g - h % g, a = t.ke((h + c) / g - 1), b = a * g + g - c;
                    if (a < 0) b += y % g;
                    if (a >= C) b -= y % g;
                    i.j(r.Bc, b, k, d)
                }
            }

            c.xe = o;
            c.z = function (g, i) {
                c.fc = h = i;
                l = g.Oe || g.dd || b.Lb();
                c.Fc = e = b.Ld(u, "thumbnailtemplate", l, d);
                n = b.Cc(e);
                a.$ActionMode & 1 && c.a(e, "click", b.V(f, j, 0));
                a.$ActionMode & 2 && c.a(e, "mouseenter", b.V(f, j, 1))
            };
            b.z(c)
        }

        i.Pc = function (a, e, d) {
            if (a != m) {
                var b = m;
                m = a;
                b != -1 && l[b].xe();
                l[a] && l[a].xe()
            }
            !d && t.$PlayTo(t.ke(c.M(a / g)))
        };
        i.Xc = function (a) {
            b.fb(h, a)
        };
        i.Qc = function (I, J) {
            b.$Destroy(t, l);
            m = e;
            l = [];
            var K = b.ab(B);
            b.Fb(h);
            a.Vb && b.q(h, "dir", "rtl");
            b.Lg(h, b.tb(K));
            var i = b.$FindChild(h, "slides", d);
            y = I;
            C = c.K(y / g);
            m = -1;
            var f = a.$Orientation & 1, r = w + (w + o) * (g - 1) * (1 - f), p = v + (v + s) * (g - 1) * f,
                E = (f ? c.m : c.k)(A, r), u = (f ? c.k : c.m)(z, p);
            x = c.K((A - o) / (w + o) * f + (z - s) / (v + s) * (1 - f));
            var G = r + (r + o) * (x - 1) * f, F = p + (p + s) * (x - 1) * (1 - f);
            E = c.k(E, G);
            u = c.k(u, F);
            b.D(i, E);
            b.C(i, u);
            b.od(i, 3);
            var n = [];
            b.c(J, function (k, e) {
                var h = new D(k, e), d = h.Fc, a = c.M(e / g), j = e % g;
                b.R(d, (w + o) * j * (1 - f));
                b.W(d, (v + s) * j * f);
                if (!n[a]) {
                    n[a] = b.Lb();
                    b.U(i, n[a])
                }
                b.U(n[a], d);
                l.push(h)
            });
            var H = b.H({
                $AutoPlay: 0,
                $NaviQuitDrag: k,
                $SlideWidth: r,
                $SlideHeight: p,
                $SlideSpacing: o * f + s * (1 - f),
                $MinDragOffsetToSlide: 12,
                $SlideDuration: 200,
                $PauseOnHover: 1,
                $Cols: x,
                $PlayOrientation: a.$Orientation,
                $DragOrientation: a.$NoDrag || a.$DisableDrag ? 0 : a.$Orientation
            }, a);
            t = new j(h, H);
            q.lc(h)
        };
        i.z = function (j, f, e) {
            h = j;
            i.jd = a = b.H({$SpacingX: 0, $SpacingY: 0, $Orientation: 1, $ActionMode: 1}, f);
            A = b.D(h);
            z = b.C(h);
            var c = b.$FindChild(h, "slides", d);
            u = b.$FindChild(c, "prototype");
            e = b.ab(e);
            b.Mb(e, c);
            w = b.D(u);
            v = b.C(u);
            b.sb(u, c);
            b.mb(c, "absolute");
            b.Rb(c, "hidden");
            g = a.$Rows || 1;
            o = a.$SpacingX;
            s = a.$SpacingY;
            a.$AutoCenter &= a.$Orientation;
            a.$AutoCenter && q.jc(h, n.Db, a.$AutoCenter);
            B = b.ab(h)
        };
        i.$Destroy = function () {
            b.$Destroy(t, l, E)
        };
        b.z(i)
    };
    function o(e, d, c) {
        var a = this;
        b.O(a, p);
        l.call(a, 0, c.$Idle);
        a.rc = 0;
        a.Ic = c.$Idle
    }

    o.Jc = 21;
    o.cc = 24;
    var t = i.$JssorCaptionSlideo$ = i.$JssorSlideo$ = function () {
        var a = this, db = b.O(a, p);
        l.call(a, 0, 0);
        var e, q,
            cb = [g.$Linear, g.$Swing, g.$InQuad, g.$OutQuad, g.$InOutQuad, g.$InCubic, g.$OutCubic, g.$InOutCubic, g.$InQuart, g.$OutQuart, g.$InOutQuart, g.$InQuint, g.$OutQuint, g.$InOutQuint, g.$InSine, g.$OutSine, g.$InOutSine, g.$InExpo, g.$OutExpo, g.$InOutExpo, g.$InCirc, g.$OutCirc, g.$InOutCirc, g.$InElastic, g.$OutElastic, g.$InOutElastic, g.$InBack, g.$OutBack, g.$InOutBack, g.$InBounce, g.$OutBounce, g.$InOutBounce, g.$Early, g.$Late],
            H = {}, J, D, w = new l(0, 0), K = [], u = [], F, n = 0;

        function L(d, c) {
            var a = {};
            b.c(d, function (d, f) {
                var e = H[f];
                if (e) {
                    if (b.oe(d)) d = L(d, c || f == "e"); else if (c)if (b.yc(d)) d = cb[d];
                    a[e] = d
                }
            });
            return a
        }

        function M(e, f) {
            var c = [], d = b.tb(e);
            b.c(d, function (d) {
                var h = J[b.B(d, "t")];
                h && c.push({$Elmt: d, Nc: h});
                var g = b.B(d, "play");
                if (g) {
                    var e = new t(d, q, {zg: g});
                    P.push(e);
                    a.a(e, o.Jc, V);
                    a.a(e, o.cc, R)
                } else c = c.concat(M(d, f + 1))
            });
            return c
        }

        function G(c, e) {
            var a = K[c];
            if (a == f) {
                a = K[c] = {qb: c, Oc: [], we: []};
                var d = 0;
                !b.c(u, function (a, b) {
                    d = b;
                    return a.qb > c
                }) && d++;
                u.splice(d, 0, a)
            }
            return a
        }

        function Z(p, q, g) {
            var a, e;
            if (D) {
                var k = D[b.B(p, "c")];
                if (k) {
                    a = G(k.r, 0);
                    a.Fg = k.e || 0
                }
            }
            b.c(q, function (h) {
                var f = b.H(d, {}, L(h)), i = b.nd(f.$Easing);
                delete f.$Easing;
                if (f.$Left) {
                    f.N = f.$Left;
                    i.N = i.$Left;
                    delete f.$Left
                }
                if (f.$Top) {
                    f.L = f.$Top;
                    i.L = i.$Top;
                    delete f.$Top
                }
                var m = {$Easing: i, $OriginalWidth: g.F, $OriginalHeight: g.G}, j = new l(h.b, h.d, m, p, g, f);
                n = c.m(n, h.b + h.d);
                if (a) {
                    if (!e) e = new l(h.b, 0);
                    e.Y(j)
                } else {
                    var k = G(h.b, h.b + h.d);
                    k.Oc.push(j)
                }
                g = b.Xe(g, f)
            });
            if (a && e) {
                e.Re();
                var h = e, j, i = e.xc(), m = e.ub(), o = c.m(m, a.Fg);
                if (a.qb < m) {
                    if (a.qb > i) {
                        h = new l(i, a.qb - i);
                        h.Y(e, d)
                    } else h = f;
                    j = new l(a.qb, o - i, {Dc: o - a.qb, We: d});
                    j.Y(e, d)
                }
                h && a.Oc.push(h);
                j && a.we.push(j)
            }
            return g
        }

        function Y(a) {
            b.c(a, function (f) {
                var a = f.$Elmt, e = b.D(a), d = b.C(a), c = {
                    $Left: b.R(a),
                    $Top: b.W(a),
                    N: 0,
                    L: 0,
                    $Opacity: 1,
                    $ZIndex: b.P(a) || 0,
                    $Rotate: 0,
                    $RotateX: 0,
                    $RotateY: 0,
                    $ScaleX: 1,
                    $ScaleY: 1,
                    $TranslateX: 0,
                    $TranslateY: 0,
                    $TranslateZ: 0,
                    $SkewX: 0,
                    $SkewY: 0,
                    F: e,
                    G: d,
                    $Clip: {$Top: 0, $Right: e, $Bottom: d, $Left: 0}
                };
                c.Od = c.$Left;
                c.Ed = c.$Top;
                Z(a, f.Nc, c)
            })
        }

        function bb(f, e, g) {
            var c = f.b - e;
            if (c) {
                var b = new l(e, c);
                b.Y(w, d);
                b.$Shift(g);
                a.Y(b)
            }
            a.md(f.d);
            return c
        }

        function ab(e) {
            var c = w.xc(), d = 0;
            b.c(e, function (e, f) {
                e = b.H({d: 3e3}, e);
                bb(e, c, d);
                c = e.b;
                d += e.d;
                if (!f || e.t == 2) {
                    a.rc = c;
                    a.Ic = c + e.d
                }
            })
        }

        function B(i, d, e) {
            var f = d.length;
            if (f > 4)for (var j = c.K(f / 4), a = 0; a < j; a++) {
                var g = d.slice(a * 4, c.k(a * 4 + 4, f)), h = new l(g[0].qb, 0);
                B(h, g, e);
                i.Y(h)
            } else b.c(d, function (a) {
                b.c(e ? a.we : a.Oc, function (a) {
                    e && a.md(n - a.ub());
                    i.Y(a)
                })
            })
        }

        var m, C, j, x, i, N, z, P = [], v = [], A, E, y;

        function X() {
            if (!z) {
                j & 8 && a.a(h, "keydown", I);
                if (j & 32) {
                    a.a(h, "mousedown", s);
                    a.a(h, "touchstart", s)
                }
                z = d
            }
        }

        function U() {
            a.Q(h, "keydown", I);
            a.Q(h, "mousedown", s);
            a.Q(h, "touchstart", s);
            z = k
        }

        function O(b) {
            a.J();
            b && a.Z(0);
            a.Yd(1);
            a.Ce();
            A = d;
            X();
            a.j(o.Jc, a)
        }

        function r() {
            if (!E && (A || a.s())) {
                a.J();
                a.ue() > a.rc && a.Z(a.rc);
                a.Yd(i || 1);
                a.wc(0);
                E = d
            }
        }

        function Q() {
            !y && r()
        }

        function I(a) {
            j & 8 && b.Td(a) == 27 && r()
        }

        function T() {
            y = k;
            j & 4 && b.$Delay(Q, 160)
        }

        function s(a) {
            j & 32 && !b.nf(e, b.$EvtSrc(a)) && r()
        }

        function S(c) {
            y = d;
            if (m & 2) {
                var a = b.Ff(e);
                c = b.Sd(c);
                c.clientX >= a.x && c.clientX <= a.x + a.w && c.clientY >= a.y && c.clientY <= a.y + a.h && O()
            }
        }

        function W() {
            O(d)
        }

        function V(b) {
            var a = b.Gg();
            childSlideoPlaying = v[a];
            childSlideoPlaying !== b && v[a] && v[a].yf();
            v[a] = b
        }

        function R(b, c) {
            a.j(o.cc, b, c)
        }

        a.Gg = function () {
            return N || ""
        };
        a.yf = r;
        a.Kc = function () {
            C && a.j(o.cc, a, 1)
        };
        a.Mc = function () {
            A = k;
            E = k;
            C && a.j(o.cc, a, -1);
            !a.s() && U()
        };
        a.ac = function () {
            !y && x && a.ue() > a.Ic && r()
        };
        a.z = function (l, g, f) {
            e = l;
            q = g;
            m = f.zg;
            F = f.xf;
            J = q.$Transitions;
            D = q.$Controls;
            var k = {
                $Top: "y",
                $Left: "x",
                $Bottom: "m",
                $Right: "t",
                $Rotate: "r",
                $RotateX: "rX",
                $RotateY: "rY",
                $ScaleX: "sX",
                $ScaleY: "sY",
                $TranslateX: "tX",
                $TranslateY: "tY",
                $TranslateZ: "tZ",
                $SkewX: "kX",
                $SkewY: "kY",
                $Opacity: "o",
                $Easing: "e",
                $ZIndex: "i",
                $Clip: "c"
            };
            b.c(k, function (b, a) {
                H[b] = a
            });
            Y(M(e, 1));
            B(w, u);
            if (m) {
                a.Y(w);
                F = d;
                x = b.B(e, "idle");
                (m & 1 || m & 32 && b.ie().de) && a.a(e, "click", W);
                if (m & 2 || x) {
                    a.a(e, "mouseenter", S);
                    a.a(e, "mouseleave", T)
                }
                j = b.B(e, "rollback");
                i = b.T(e, "speed") || "";
                if (i.substr(0, 1) == "x") i = i.substr(1);
                i = b.Rd(i);
                N = b.T(e, "group");
                C = b.B(e, "pause")
            }
            var h = q.$Breaks || [], c = h[b.B(e, "b")] || [];
            c = c.concat({b: n, d: c.length ? 0 : f.$Idle || x || 0});
            ab(c);
            F && a.md(1e8);
            n = a.ub();
            B(a, u, d);
            a.Z(-1)
        };
        a.$Destroy = function () {
            b.$Destroy(db, P);
            a.J();
            a.Z(-1)
        };
        b.z(a)
    }, j = i.$JssorSlider$ = (i.module || {}).exports = function () {
        var a = this, Ec = b.O(a, p), Mb = "data-jssor-slider", ic = "data-jssor-thumb", u, m, S, Bb, db, jb, X, J, O,
            M, Yb, Bc, Fc = 1, Ac = 1, kc = 1, qc = 1, mc = {}, x, R, Kb, ac, Xb, vb, yb, xb, gb, B = [], Qb, s = -1,
            sc, q, I, H, P, nb, ob, F, N, kb, T, y, W, mb, Z = [], vc, xc, nc, t, ub, Gb, qb, U, Y, rc, Fb, Ob, tc, G,
            Jb = 0, cb = 0, Q = Number.MAX_VALUE, K = Number.MIN_VALUE, D, lb, eb, V = 1, Wb, pb, A, Db, Rb, Sb, L, zb,
            Cb, C, ab, rb, z, Ab, bc = b.ie(), Eb = bc.de, w = [], E, hb, bb, Lb, hc, lc, ib;

        function Ib() {
            return !V && Y & 12
        }

        function Gc() {
            return Wb || !V && Y & 3
        }

        function Hb() {
            return !A && !Ib() && !z.$IsPlaying()
        }

        function Yc() {
            return !Gc() && Hb()
        }

        function jc() {
            return y || S
        }

        function Pc() {
            return jc() & 2 ? ob : nb
        }

        function Pb(a, c, d) {
            b.R(a, c);
            b.W(a, d)
        }

        function Dc(c, b) {
            var a = jc(), d = (nb * b + Jb) * (a & 1), e = (ob * b + Jb) * (a & 2) / 2;
            Pb(c, d, e)
        }

        function dc(b, f) {
            if (A && !(D & 1)) {
                var e = b, d;
                if (b < K) {
                    e = K;
                    d = -1
                }
                if (b > Q) {
                    e = Q;
                    d = 1
                }
                if (d) {
                    var a = b - e;
                    if (f) {
                        a = c.Ve(a) * 2 / c.E;
                        a = c.n(a * d, 1.6)
                    } else {
                        a = c.n(a * d, .625);
                        a = c.Dd(a * c.E / 2)
                    }
                    b = e + a * d
                }
            }
            return b
        }

        function Rc(a) {
            return dc(a, d)
        }

        function Mc(a) {
            return dc(a)
        }

        function wb(a, b) {
            if (!(D & 1)) {
                var c = a - Q + (b || 0), d = K - a + (b || 0);
                if (c > 0 && c > d) a = Q; else if (d > 0) a = K
            }
            return a
        }

        function yc(a) {
            return !(D & 1) && a - K < .0001
        }

        function wc(a) {
            return !(D & 1) && Q - a < .0001
        }

        function sb(a) {
            return !(D & 1) && (a - K < .0001 || Q - a < .0001)
        }

        function Tb(c, a, d) {
            !ib && b.c(Z, function (b) {
                b.Pc(c, a, d)
            })
        }

        function ec(b) {
            var a = b, d = sb(b);
            if (d) a = wb(a); else {
                b = v(b);
                a = b
            }
            a = c.M(a);
            a = c.m(a, 0);
            return a
        }

        function Jc(a) {
            if (a != s) {
                w[s];
                Qb = s;
                s = a;
                sc = w[s]
            }
        }

        function Vc() {
            y = 0;
            var b = C.s(), d = ec(b);
            Tb(d, b);
            if (sb(b) || b == c.M(b)) {
                if (t & 2 && (U > 0 && d == q - 1 || U < 0 && !d)) t = 0;
                Jc(d);
                a.j(j.$EVT_PARK, s, Qb)
            }
        }

        function oc(a, b) {
            if (q && (!b || !z.$IsPlaying())) {
                z.J();
                z.Tc(a, a)
            }
        }

        function tb(a) {
            if (q) {
                a = v(a);
                a = wb(a);
                oc(a)
            } else Tb(0, 0)
        }

        function bd() {
            var b = j.re || 0, a = lb;
            j.re |= a;
            return W = a & ~b
        }

        function Wc() {
            if (W) {
                j.re &= ~lb;
                W = 0
            }
        }

        function cd() {
            var a = b.Lb();
            b.X(a, gb);
            return a
        }

        function v(b, a) {
            a = a || q || 1;
            return (b % a + a) % a
        }

        function fc(c, a, b) {
            t & 8 && (t = 0);
            cc(c, Fb, a, b)
        }

        function Ub() {
            b.c(Z, function (a) {
                a.Xc(a.jd.$ChanceToShow <= V)
            })
        }

        function Lc() {
            if (!V) {
                V = 1;
                Ub();
                if (!A) {
                    Y & 12 && Hc();
                    w[s] && w[s].Uc()
                }
            }
            a.j(j.$EVT_MOUSE_LEAVE)
        }

        function Kc() {
            if (V) {
                V = 0;
                Ub();
                A || !(Y & 12) || Ic()
            }
            a.j(j.$EVT_MOUSE_ENTER)
        }

        function Oc() {
            b.c(B, function (a) {
                b.X(a, gb);
                b.Rb(a, "hidden");
                b.xb(a)
            });
            b.X(R, gb)
        }

        function Vb(b, a) {
            cc(b, a, d)
        }

        function cc(g, h, l, p) {
            if (q && (!A || m.$NaviQuitDrag) && !Ib()) {
                var f = C.s(), a = g;
                if (l) {
                    a = f + g;
                    if (D & 2) {
                        if (yc(f) && g < 0) a = Q;
                        if (wc(f) && g > 0) a = K
                    }
                }
                if (!(D & 1))if (p) a = v(a); else a = wb(a, .5);
                if (l && !sb(a)) a = c.$Round(a);
                var i = (a - f) % q;
                a = f + i;
                if (h == e) h = Fb;
                var b = c.I(i), j = 0;
                if (b) {
                    if (b < 1) b = c.n(b, .5);
                    if (b > 1) {
                        var o = Pc(), n = (S & 1 ? yb : xb) / o;
                        b = c.k(b, n * 1.5)
                    }
                    j = h * b
                }
                ib = d;
                z.J();
                ib = k;
                z.Tc(f, a, j)
            }
        }

        function Sc(e, h, o) {
            var l = this, i = {$Top: 2, $Right: 1, $Bottom: 2, $Left: 1},
                m = {$Top: "top", $Right: "right", $Bottom: "bottom", $Left: "left"}, g, a, f, j, k = {};
            l.$Elmt = e;
            l.$ScaleSize = function (q, l, u) {
                var p, s = q, r = l;
                if (!f) {
                    f = b.fg(e);
                    g = e.parentNode;
                    j = {$Scale: b.B(e, n.Me, 1), $AutoCenter: b.B(e, n.Db)};
                    b.c(m, function (c, a) {
                        k[a] = b.B(e, "data-scale-" + c, 1)
                    });
                    a = e;
                    if (h) {
                        a = b.ab(g, d);
                        b.X(a, {$Top: 0, $Left: 0});
                        b.U(a, e);
                        b.U(g, a)
                    }
                }
                if (o) {
                    p = c.m(q, l);
                    if (h)if (u >= 0 && u < 1) {
                        var w = c.k(q, l);
                        p = c.k(p / w, 1 / (1 - u)) * w
                    }
                } else s = r = p = c.n(O < M ? l : q, j.$Scale);
                var x = h ? 1.001 : 1, t = p * x;
                h && (qc = t);
                b.jf(a, t);
                b.D(g, f.F * s);
                b.C(g, f.G * r);
                var v = b.je() && b.cd() < 9 ? t : 1, y = (s - v) * f.F / 2, z = (r - v) * f.G / 2;
                b.R(a, y);
                b.W(a, z);
                b.c(f, function (d, a) {
                    if (i[a] && d) {
                        var e = (i[a] & 1) * c.n(q, k[a]) * d + (i[a] & 2) * c.n(l, k[a]) * d / 2;
                        b.Ie[a](g, e)
                    }
                });
                b.od(g, j.$AutoCenter)
            }
        }

        function gd() {
            var a = this;
            l.call(a, 0, 0, {Dc: q});
            b.c(w, function (b) {
                a.ad(b);
                b.$Shift(G / F)
            })
        }

        function fd() {
            var a = this, b = Ab.$Elmt;
            l.call(a, -1, 2, {$Easing: g.$Linear, Ne: {Tb: Dc}, Dc: q, $Reverse: Gb}, b, {Tb: 1}, {Tb: -2});
            a.Fc = b
        }

        function hd() {
            var b = this;
            l.call(b, -1e8, 2e8);
            b.ac = function (e, b) {
                if (c.I(b - e) > 1e-5) {
                    var g = b, f = b;
                    if (c.M(b) != b && b > e && (D & 1 || b > cb)) f++;
                    var h = ec(f);
                    Tb(h, g, d);
                    a.j(j.$EVT_POSITION_CHANGE, v(g), v(e), b, e)
                }
            }
        }

        function Uc(o, n) {
            var b = this, g, i, e, c, h;
            l.call(b, -1e8, 2e8, {ye: 100});
            b.Kc = function () {
                pb = d;
                a.j(j.$EVT_SWIPE_START, v(C.s()), ab.s())
            };
            b.Mc = function () {
                pb = k;
                c = k;
                a.j(j.$EVT_SWIPE_END, v(C.s()), ab.s());
                !A && Vc()
            };
            b.ac = function (f, b) {
                var a = b;
                if (c) a = h; else if (e) {
                    var d = b / e;
                    a = m.$SlideEasing(d) * (i - g) + g
                }
                a = Rc(a);
                ab.Z(a)
            };
            b.Tc = function (a, c, h, f) {
                A = k;
                e = h || 1;
                g = a;
                i = c;
                ib = d;
                ab.Z(a);
                ib = k;
                b.Z(0);
                b.wc(e, f)
            };
            b.Jf = function () {
                c = d;
                c && b.$Play(f, f, d)
            };
            b.If = function (a) {
                h = a
            };
            ab = new hd;
            ab.Y(o);
            ab.Y(n)
        }

        function Qc() {
            var c = this, a = cd();
            b.P(a, 0);
            c.$Elmt = a;
            c.Ig = function (c) {
                b.U(a, c);
                b.fb(a)
            };
            c.Bb = function () {
                b.xb(a);
                b.Fb(a)
            }
        }

        function ed(r, h) {
            var g = this, hb = b.O(g, p), x, T, ib = r, A = b.B(ib, "data-fillmode", m.$FillMode), B, u, z = [], S, J,
                O, M, i, n, y, P;
            l.call(g, -N, N + 1, {Dc: D & 1 ? q : e, $Reverse: Gb});
            function F(a) {
                x && x.$Destroy();
                Q(r, a, 0);
                M = d;
                x = new db.$Class(r, db, {$Idle: b.B(r, "idle", rc), xf: !t});
                x.$On(o.cc, X);
                x.Z(0)
            }

            function W() {
                x.pd < db.pd && F()
            }

            function X(b, a) {
                if (h == s) Wb += a
            }

            function L(n, p, m) {
                if (!J) {
                    J = d;
                    if (u && m) {
                        var e = m.width, c = m.height, l = e, i = c;
                        if (e && c && A) {
                            if (A & 3 && (!(A & 4) || e > I || c > H)) {
                                var f = k, o = I / H * c / e;
                                if (A & 1) f = o > 1; else if (A & 2) f = o < 1;
                                l = f ? e * H / c : I;
                                i = f ? H : c * I / e
                            }
                            b.D(u, l);
                            b.C(u, i);
                            b.W(u, (H - i) / 2);
                            b.R(u, (I - l) / 2)
                        }
                        b.mb(u, "absolute");
                        a.j(j.$EVT_LOAD_END, h)
                    }
                }
                p.ce(k);
                n && n(g)
            }

            function V(f, b, c, e) {
                if (e == y && s == h && t && Hb() && !g.Ec()) {
                    var a = v(f);
                    E.Pe(a, h, b, g, c, H / I);
                    b.Of();
                    rb.$Shift(a - rb.xc() - 1);
                    rb.Z(a);
                    oc(a, d)
                }
            }

            function Z(b) {
                if (b == y && s == h && Hb() && !g.Ec()) {
                    if (!i) {
                        var a = f;
                        if (E)if (E.fc == h) a = E.Le(); else E.Bb();
                        W();
                        i = new dd(r, h, a, x);
                        i.Mf(n);
                        Wb = 0
                    }
                    !i.$IsPlaying() && i.id()
                }
            }

            function G(a, d) {
                if (a == h) {
                    if (a != d) w[d] && w[d].ee();
                    n && n.$Enable();
                    y = b.Cb();
                    g.Ub(b.V(f, Z, y))
                } else {
                    var i = c.k(h, a), e = c.m(h, a), k = c.k(e - i, i + q - e), j = N + m.$LazyLoading - 1;
                    (!O || k <= j) && g.Ub()
                }
            }

            function ab() {
                if (s == h && i) {
                    i.J();
                    n && n.$Quit();
                    n && n.$Disable();
                    i.Ud()
                }
            }

            function cb() {
                s == h && i && i.J()
            }

            function Y(b) {
                !eb && a.j(j.$EVT_CLICK, h, b)
            }

            g.ce = function (a) {
                if (P != a) {
                    P = a;
                    a && b.U(r, B);
                    !a && b.sb(B)
                }
            };
            g.Ub = function (e, c) {
                c = c || g;
                if (z.length && !J) {
                    c.ce(d);
                    if (!S) {
                        S = d;
                        a.j(j.$EVT_LOAD_START, h);
                        b.c(z, function (a) {
                            if (!b.q(a, "src")) {
                                a.src = b.T(a, "src2") || "";
                                b.Ab(a, b.q(a, "data-display"))
                            }
                        })
                    }
                    b.wg(z, u, b.V(f, L, e, c))
                } else L(e, c)
            };
            g.ag = function () {
                if (Yc())if (q == 1) {
                    g.ee();
                    G(h, h)
                } else {
                    var a;
                    if (E) a = E.Bg(q);
                    if (a) {
                        y = b.Cb();
                        var c = h + U, d = w[v(c)];
                        return d.Ub(b.V(f, V, c, d, a, y), g)
                    } else(D || !sb(C.s()) || !sb(C.s() + U)) && Vb(U)
                }
            };
            g.Uc = function () {
                G(h, h)
            };
            g.ee = function () {
                n && n.$Quit();
                n && n.$Disable();
                g.Vd();
                i && i.Sf();
                i = f;
                F()
            };
            g.Of = function () {
                b.xb(r)
            };
            g.Vd = function () {
                b.fb(r)
            };
            function Q(a, h, c) {
                if (b.q(a, Mb))return;
                if (!M) {
                    b.q(a, "data-events", b.hc(a));
                    b.q(a, "data-display", b.Ab(a));
                    b.rf(a, b.T(a, "data-to"));
                    b.tf(a, b.T(a, "data-bf"));
                    b.of(a, b.B(a, "data-p"));
                    b.kf(a, b.T(a, "po"));
                    if (a.tagName == "IMG") {
                        z.push(a);
                        if (!b.q(a, "src")) {
                            O = d;
                            b.xb(a)
                        }
                    }
                    var e = b.Ae(a);
                    if (e) {
                        var f = new Image;
                        b.T(f, "src2", e);
                        z.push(f)
                    }
                    c && b.P(a, (b.P(a) || 0) + 1)
                }
                var g = b.tb(a);
                b.c(g, function (d) {
                    if (c < 2 && !u)if (b.T(d, "u") == "image") {
                        u = d;
                        u.border = 0;
                        b.X(u, gb);
                        b.X(a, gb)
                    }
                    Q(d, h, c + 1)
                })
            }

            g.Lc = function (c, b) {
                var a = N - b;
                Dc(T, a)
            };
            g.fc = h;
            var K = b.$FindChild(r, "thumb", d);
            if (K) {
                g.Oe = b.ab(K);
                b.xb(K)
            }
            b.fb(r);
            B = b.ab(R);
            b.P(B, 1e3);
            g.a(r, "click", Y);
            F(d);
            g.dd = u;
            g.zd = r;
            g.Fc = T = r;
            g.a(a, 203, G);
            g.a(a, 28, cb);
            g.a(a, 24, ab);
            g.$Destroy = function () {
                b.$Destroy(hb, x, i)
            }
        }

        function dd(F, g, n, q) {
            var c = this, D = b.O(c, p), i = 0, u = 0, f, r, h, e, m, x, v, y = w[g];
            l.call(c, 0, 0);
            function B() {
                c.id()
            }

            function C(a) {
                v = a;
                c.J();
                c.id()
            }

            function z() {
            }

            c.id = function () {
                if (!A && !pb && !v && s == g && !c.Ec()) {
                    var k = c.s();
                    if (!k)if (f && !m) {
                        m = d;
                        c.Ud(d);
                        a.j(j.$EVT_SLIDESHOW_START, g, u, i, u, f, e)
                    }
                    a.j(j.$EVT_STATE_CHANGE, g, k, i, r, h, e);
                    if (!Ib()) {
                        var l;
                        if (k == e) t && b.$Delay(y.ag, 20); else {
                            if (k == h) l = e; else if (!k) l = h; else l = c.me();
                            (k != h || !Gc()) && c.wc(l, B)
                        }
                    }
                }
            };
            c.Sf = function () {
                E && E.fc == g && E.Bb();
                var b = c.s();
                b < e && a.j(j.$EVT_STATE_CHANGE, g, -b - 1, i, r, h, e)
            };
            c.Ud = function (a) {
                n && b.Rb(T, a && n.Nc.$Outside ? "" : "hidden")
            };
            c.Lc = function (c, b) {
                if (m && b >= f) {
                    m = k;
                    y.Vd();
                    E.Bb();
                    a.j(j.$EVT_SLIDESHOW_END, g, f, i, u, f, e)
                }
                a.j(j.$EVT_PROGRESS_CHANGE, g, b, i, r, h, e)
            };
            c.Mf = function (a) {
                if (a && !x) {
                    x = a;
                    a.$On($JssorPlayer$.cf, C)
                }
            };
            c.a(q, o.Jc, z);
            n && c.ad(n);
            f = c.ub();
            c.ad(q);
            r = f + q.rc;
            e = c.ub();
            h = t ? f + q.Ic : e;
            c.$Destroy = function () {
                D.$Destroy();
                c.J()
            }
        }

        function pc() {
            Lb = pb;
            hc = z.me();
            bb = C.s();
            hb = Mc(bb)
        }

        function Ic() {
            pc();
            if (A || Ib()) {
                z.J();
                a.j(j.pf)
            }
        }

        function Hc(f) {
            if (Hb()) {
                var b = C.s(), a = hb, e = 0;
                if (f && c.I(L) >= m.$MinDragOffsetToSlide) {
                    a = b;
                    e = Cb
                }
                a = c.K(a);
                a = wb(a + e, .5);
                var d = c.I(a - b);
                if (d < 1 && m.$SlideEasing != g.$Linear) d = c.n(d, .5);
                if ((!eb || !f) && Lb) z.wc(hc); else if (b == a) sc.Uc(); else z.Tc(b, a, d * Fb)
            }
        }

        function gc(a) {
            !b.Yb(b.$EvtSrc(a), e, n.he) && b.$CancelEvent(a)
        }

        function zc(b) {
            Db = k;
            A = d;
            Ic();
            if (!Lb) y = 0;
            a.j(j.$EVT_DRAG_START, v(bb), bb, b)
        }

        function ad(a) {
            Cc(a, 1)
        }

        function Cc(c, d) {
            L = 0;
            zb = 0;
            Cb = 0;
            kc = qc;
            if (d) {
                var j = c.touches[0];
                Rb = j.clientX;
                Sb = j.clientY
            } else {
                var i = b.Wd(c);
                Rb = i.x;
                Sb = i.y
            }
            var f = b.$EvtSrc(c), g = b.Yb(f, "1", ic);
            if ((!g || g === u) && !W && (!d || c.touches.length == 1)) {
                mb = b.Yb(f, e, n.he) || !lb || !bd();
                a.a(h, d ? "touchmove" : "mousemove", Zb);
                Db = !mb && b.Yb(f, e, n.bd);
                !Db && !mb && zc(c, d)
            }
        }

        function Zb(a) {
            var e, f;
            a = b.Sd(a);
            if (a.type != "mousemove")if (a.touches.length == 1) {
                f = a.touches[0];
                e = {x: f.clientX, y: f.clientY}
            } else fb(); else e = b.Wd(a);
            if (e) {
                var i = e.x - Rb, j = e.y - Sb, g = c.I(i), h = c.I(j);
                if (y || g > 1.5 || h > 1.5)if (Db) zc(a, f); else {
                    if (c.M(hb) != hb) y = y || S & W;
                    if ((i || j) && !y) {
                        if (W == 3)if (h > g) y = 2; else y = 1; else y = W;
                        if (Eb && y == 1 && h > g * 2.4) mb = d
                    }
                    var l = i, k = nb;
                    if (y == 2) {
                        l = j;
                        k = ob
                    }
                    (L - zb) * qb < -1.5 && (Cb = 0);
                    (L - zb) * qb > 1.5 && (Cb = -1);
                    zb = L;
                    L = l;
                    lc = hb - L * qb / k / kc;
                    if (L && y && !mb) {
                        b.$CancelEvent(a);
                        z.Jf(d);
                        z.If(lc)
                    }
                }
            }
        }

        function fb() {
            Wc();
            a.Q(h, "mousemove", Zb);
            a.Q(h, "touchmove", Zb);
            eb = L;
            if (A) {
                eb && t & 8 && (t = 0);
                z.J();
                A = k;
                var b = C.s();
                a.j(j.$EVT_DRAG_END, v(b), b, v(bb), bb);
                Y & 12 && pc();
                Hc(d)
            }
        }

        function Nc(c) {
            var a = b.$EvtSrc(c), d = b.Yb(a, "1", Mb);
            if (u === d)if (eb) {
                b.$StopEvent(c);
                while (a && u !== a) {
                    (a.tagName == "A" || b.q(a, "data-jssor-button")) && b.$CancelEvent(c);
                    a = a.parentNode
                }
            } else t & 4 && (t = 0)
        }

        a.$SlidesCount = function () {
            return B.length
        };
        a.$CurrentIndex = function () {
            return s
        };
        a.$CurrentPosition = function () {
            return C.s()
        };
        a.$AutoPlay = function (a) {
            if (a == e)return t;
            if (a != t) {
                t = a;
                t && w[s] && w[s].Uc()
            }
        };
        a.$IsDragging = function () {
            return A
        };
        a.$IsSliding = function () {
            return pb
        };
        a.$IsMouseOver = function () {
            return !V
        };
        a.$LastDragSucceeded = function () {
            return eb
        };
        a.$OriginalWidth = function () {
            return O
        };
        a.$OriginalHeight = function () {
            return M
        };
        a.$ScaleHeight = function (b) {
            if (b == e)return Bc || M;
            a.$ScaleSize(b / M * O, b)
        };
        a.$ScaleWidth = function (b) {
            if (b == e)return Yb || O;
            a.$ScaleSize(b, b / O * M)
        };
        a.$ScaleSize = function (c, a, d) {
            b.D(u, c);
            b.C(u, a);
            Fc = c / O;
            Ac = a / M;
            b.c(mc, function (a) {
                a.$ScaleSize(Fc, Ac, d)
            });
            if (!Yb) {
                b.Mb(T, x);
                b.W(T, 0);
                b.R(T, 0)
            }
            Yb = c;
            Bc = a
        };
        a.gf = yc;
        a.ef = wc;
        a.$PlayTo = cc;
        a.$GoTo = tb;
        a.$Next = function () {
            Vb(1)
        };
        a.$Prev = function () {
            Vb(-1)
        };
        a.$Pause = function () {
            t = 0
        };
        a.$Play = function () {
            a.$AutoPlay(t || 1)
        };
        a.$SetSlideshowTransitions = function (a) {
            m.$SlideshowOptions.$Transitions = a
        };
        a.$SetCaptionTransitions = function (a) {
            db.$Transitions = a;
            db.pd = b.Cb()
        };
        a.ke = function (a) {
            a = v(a);
            if (D & 1) {
                var d = G / F, b = v(C.s()), e = v(a - b + d), f = v(c.I(a - b));
                if (e >= N) {
                    if (f > q / 2)if (a > b) a -= q; else a += q
                } else if (a > b && e < d) a -= q; else if (a < b && e > d) a += q
            }
            return a
        };
        function Zc() {
            bc.ge && b.Sb(x, bc.ge, ([f, "pan-y", "pan-x", "auto"])[lb] || "");
            a.a(u, "click", Nc, d);
            a.a(u, "mouseleave", Lc);
            a.a(u, "mouseenter", Kc);
            a.a(u, "mousedown", Cc);
            a.a(u, "touchstart", ad);
            a.a(u, "dragstart", gc);
            a.a(u, "selectstart", gc);
            a.a(i, "mouseup", fb);
            a.a(h, "mouseup", fb);
            a.a(h, "touchend", fb);
            a.a(h, "touchcancel", fb);
            a.a(i, "blur", fb);
            m.$ArrowKeyNavigation && a.a(h, "keydown", function (c) {
                var a = b.Td(c);
                if (a == 37 || a == 39) {
                    t & 8 && (t = 0);
                    fc(m.$ArrowKeyNavigation * (a - 38) * qb, d)
                }
            })
        }

        function uc(f) {
            Ec.Kd();
            B = [];
            w = [];
            var g = b.tb(x), j = b.Bd(["DIV", "A", "LI"]);
            b.c(g, function (a) {
                j[a.tagName.toUpperCase()] && !b.T(a, "u") && b.Ab(a) != "none" && B.push(a);
                b.P(a, (b.P(a) || 0) + 1)
            });
            q = B.length;
            if (q) {
                var a = S & 1 ? yb : xb;
                Oc();
                G = m.$Align;
                if (G == e) G = (a - F + P) / 2;
                kb = a / F;
                N = c.k(q, m.$Cols || q, c.K(kb));
                D = N < q ? m.$Loop : 0;
                if (q * F - P <= a) {
                    kb = q - P / F;
                    G = (a - F + P) / 2;
                    Jb = (a - F * q + P) / 2
                }
                if (Bb) {
                    Ob = Bb.$Class;
                    tc = !G && N == 1 && q > 1 && Ob && (!b.je() || b.cd() >= 9)
                }
                if (!(D & 1)) {
                    cb = G / F;
                    if (cb > q - 1) {
                        cb = q - 1;
                        G = cb * F
                    }
                    K = cb;
                    Q = K + q - kb - P / F
                }
                lb = (N > 1 || G ? S : -1) & m.$DragOrientation;
                if (tc) E = new Ob(Ab, I, H, Bb, Eb, Pb);
                for (var d = 0; d < B.length; d++) {
                    var h = B[d], i = new ed(h, d);
                    w.push(i)
                }
                rb = new fd;
                C = new gd;
                z = new Uc(C, rb);
                Zc()
            }
            b.c(Z, function (a) {
                a.Qc(q, w);
                f && a.$On(r.Bc, fc)
            })
        }

        function Nb(a, d, g) {
            b.pe(a) && (a = b.vd("", a));
            var c, f;
            if (q) {
                if (d == e) d = q;
                f = "beforebegin";
                c = B[d];
                if (!c) {
                    f = "afterend";
                    c = B[q - 1]
                }
            }
            b.$Destroy(w);
            a && b.Pg(c || x, f || "afterbegin", a);
            b.c(g, function (a) {
                b.sb(a)
            });
            uc()
        }

        a.$AppendSlides = function (f, a) {
            if (a == e) a = s + 1;
            var d = B[s];
            Nb(f, a);
            var c = 0;
            b.c(B, function (a, b) {
                a == d && (c = b)
            });
            tb(c)
        };
        a.$ReloadSlides = function (a) {
            Nb(a, f, B);
            tb(0)
        };
        a.$RemoveSlides = function (e) {
            var a = s, d = [];
            b.c(e, function (b) {
                if (b < q && b >= 0) {
                    d.push(B[b]);
                    b < s && a--
                }
            });
            Nb(f, f, d);
            a = c.k(a, q - 1);
            tb(a)
        };
        a.z = function (i, f) {
            a.$Elmt = u = b.$GetElement(i);
            O = b.D(u);
            M = b.C(u);
            m = b.H({
                $FillMode: 0,
                $LazyLoading: 1,
                $ArrowKeyNavigation: 1,
                $StartIndex: 0,
                $AutoPlay: 0,
                $Loop: 1,
                $HWA: d,
                $NaviQuitDrag: d,
                $AutoPlaySteps: 1,
                $AutoPlayInterval: 3e3,
                $PauseOnHover: 1,
                $SlideDuration: 500,
                $SlideEasing: g.$OutQuad,
                $MinDragOffsetToSlide: 20,
                $SlideSpacing: 0,
                $UISearchMode: 1,
                $PlayOrientation: 1,
                $DragOrientation: 1
            }, f);
            m.$HWA = m.$HWA && b.Kf();
            if (m.$Idle != e) m.$AutoPlayInterval = m.$Idle;
            if (m.$DisplayPieces != e) m.$Cols = m.$DisplayPieces;
            if (m.$ParkingPosition != e) m.$Align = m.$ParkingPosition;
            t = m.$AutoPlay & 63;
            !m.$UISearchMode;
            U = m.$AutoPlaySteps;
            Y = m.$PauseOnHover;
            Y &= Eb ? 10 : 5;
            rc = m.$AutoPlayInterval;
            Fb = m.$SlideDuration;
            S = m.$PlayOrientation & 3;
            ub = b.Ag(b.q(u, "dir")) == "rtl";
            Gb = ub && (S == 1 || m.$DragOrientation & 1);
            qb = Gb ? -1 : 1;
            Bb = m.$SlideshowOptions;
            db = b.H({$Class: o}, m.$CaptionSliderOptions);
            jb = m.$BulletNavigatorOptions;
            X = m.$ArrowNavigatorOptions;
            J = m.$ThumbnailNavigatorOptions;
            var c = b.tb(u);
            b.c(c, function (a, d) {
                var c = b.T(a, "u");
                if (c == "loading") R = a; else {
                    if (c == "slides") {
                        x = a;
                        b.Sb(x, "margin", 0);
                        b.Sb(x, "padding", 0)
                    }
                    if (c == "navigator") Kb = a;
                    if (c == "arrowleft") ac = a;
                    if (c == "arrowright") Xb = a;
                    if (c == "thumbnavigator") vb = a;
                    if (a.tagName != "STYLE" && a.tagName != "SCRIPT") mc[c || d] = new Sc(a, c == "slides", b.Bd(["slides", "thumbnavigator"])[c])
                }
            });
            R && b.sb(R);
            R = R || b.Lb(h);
            yb = b.D(x);
            xb = b.C(x);
            I = m.$SlideWidth || yb;
            H = m.$SlideHeight || xb;
            gb = {F: I, G: H, $Top: 0, $Left: 0, Cd: "block", Tb: "absolute"};
            P = m.$SlideSpacing;
            nb = I + P;
            ob = H + P;
            F = S & 1 ? nb : ob;
            Ab = new Qc;
            if (m.$HWA && (!b.Pf() || Eb)) Pb = function (a, c, d) {
                b.Ze(a, {$TranslateX: c, $TranslateY: d})
            };
            b.q(u, Mb, "1");
            b.P(x, b.P(x) || 0);
            b.mb(x, "absolute");
            T = b.ab(x, d);
            b.Sb(T, "pointerEvents", "none");
            b.Mb(T, x);
            b.U(T, Ab.$Elmt);
            b.Rb(x, "hidden");
            if (Kb && jb) {
                jb.Vb = ub;
                vc = new jb.$Class(Kb, jb, O, M);
                Z.push(vc)
            }
            if (X && ac && Xb) {
                X.Vb = ub;
                X.$Loop = m.$Loop;
                xc = new X.$Class(ac, Xb, X, a);
                Z.push(xc)
            }
            if (vb && J) {
                J.$StartIndex = m.$StartIndex;
                J.$ArrowKeyNavigation = J.$ArrowKeyNavigation || 0;
                J.Vb = ub;
                nc = new J.$Class(vb, J, R);
                !J.$NoDrag && b.q(vb, ic, "1");
                Z.push(nc)
            }
            uc(d);
            a.$ScaleSize(O, M);
            Ub();
            tb(v(m.$StartIndex));
            b.Sb(u, "visibility", "visible")
        };
        a.$Destroy = function () {
            t = 0;
            b.$Destroy(w, Z, Ec);
            b.Fb(u)
        };
        b.z(a)
    };
    j.$EVT_CLICK = 21;
    j.$EVT_DRAG_START = 22;
    j.$EVT_DRAG_END = 23;
    j.$EVT_SWIPE_START = 24;
    j.$EVT_SWIPE_END = 25;
    j.$EVT_LOAD_START = 26;
    j.$EVT_LOAD_END = 27;
    j.pf = 28;
    j.$EVT_MOUSE_ENTER = 31;
    j.$EVT_MOUSE_LEAVE = 32;
    j.$EVT_POSITION_CHANGE = 202;
    j.$EVT_PARK = 203;
    j.$EVT_SLIDESHOW_START = 206;
    j.$EVT_SLIDESHOW_END = 207;
    j.$EVT_PROGRESS_CHANGE = 208;
    j.$EVT_STATE_CHANGE = 209
}(window, document, Math, null, true, false)