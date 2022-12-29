var app = (function () {
	'use strict'
	function t() {}
	function e(t) {
		return t()
	}
	function n() {
		return Object.create(null)
	}
	function r(t) {
		t.forEach(e)
	}
	function o(t) {
		return 'function' == typeof t
	}
	function l(t, e) {
		return t != t
			? e == e
			: t !== e || (t && 'object' == typeof t) || 'function' == typeof t
	}
	let c, u
	function a(t, e) {
		t.appendChild(e)
	}
	function s(t, e, n) {
		t.insertBefore(e, n || null)
	}
	function i(t) {
		t.parentNode && t.parentNode.removeChild(t)
	}
	function f(t) {
		return document.createElement(t)
	}
	function d() {
		return (t = ' '), document.createTextNode(t)
		var t
	}
	function p(t, e, n, r) {
		return t.addEventListener(e, n, r), () => t.removeEventListener(e, n, r)
	}
	function h(t, e, n) {
		null == n
			? t.removeAttribute(e)
			: t.getAttribute(e) !== n && t.setAttribute(e, n)
	}
	function g(t, e) {
		t.value = null == e ? '' : e
	}
	function m(t, e, n) {
		t.classList[n ? 'add' : 'remove'](e)
	}
	function $(t) {
		u = t
	}
	const b = [],
		y = [],
		v = [],
		x = [],
		_ = Promise.resolve()
	let w = !1
	function E(t) {
		v.push(t)
	}
	const k = new Set()
	let S = 0
	function N() {
		const t = u
		do {
			for (; S < b.length; ) {
				const t = b[S]
				S++, $(t), T(t.$$)
			}
			for ($(null), b.length = 0, S = 0; y.length; ) y.pop()()
			for (let t = 0; t < v.length; t += 1) {
				const e = v[t]
				k.has(e) || (k.add(e), e())
			}
			v.length = 0
		} while (b.length)
		for (; x.length; ) x.pop()()
		;(w = !1), k.clear(), $(t)
	}
	function T(t) {
		if (null !== t.fragment) {
			t.update(), r(t.before_update)
			const e = t.dirty
			;(t.dirty = [-1]),
				t.fragment && t.fragment.p(t.ctx, e),
				t.after_update.forEach(E)
		}
	}
	const j = new Set()
	function O(t, e) {
		;-1 === t.$$.dirty[0] &&
			(b.push(t), w || ((w = !0), _.then(N)), t.$$.dirty.fill(0)),
			(t.$$.dirty[(e / 31) | 0] |= 1 << e % 31)
	}
	function L(l, c, a, s, f, d, p, h = [-1]) {
		const g = u
		$(l)
		const m = (l.$$ = {
			fragment: null,
			ctx: [],
			props: d,
			update: t,
			not_equal: f,
			bound: n(),
			on_mount: [],
			on_destroy: [],
			on_disconnect: [],
			before_update: [],
			after_update: [],
			context: new Map(c.context || (g ? g.$$.context : [])),
			callbacks: n(),
			dirty: h,
			skip_bound: !1,
			root: c.target || g.$$.root,
		})
		p && p(m.root)
		let b = !1
		if (
			((m.ctx = a
				? a(l, c.props || {}, (t, e, ...n) => {
						const r = n.length ? n[0] : e
						return (
							m.ctx &&
								f(m.ctx[t], (m.ctx[t] = r)) &&
								(!m.skip_bound && m.bound[t] && m.bound[t](r), b && O(l, t)),
							e
						)
				  })
				: []),
			m.update(),
			(b = !0),
			r(m.before_update),
			(m.fragment = !!s && s(m.ctx)),
			c.target)
		) {
			if (c.hydrate) {
				const t = (function (t) {
					return Array.from(t.childNodes)
				})(c.target)
				m.fragment && m.fragment.l(t), t.forEach(i)
			} else m.fragment && m.fragment.c()
			c.intro && (y = l.$$.fragment) && y.i && (j.delete(y), y.i(v)),
				(function (t, n, l, c) {
					const { fragment: u, after_update: a } = t.$$
					u && u.m(n, l),
						c ||
							E(() => {
								const n = t.$$.on_mount.map(e).filter(o)
								t.$$.on_destroy ? t.$$.on_destroy.push(...n) : r(n),
									(t.$$.on_mount = [])
							}),
						a.forEach(E)
				})(l, c.target, c.anchor, c.customElement),
				N()
		}
		var y, v
		$(g)
	}
	class P {
		$destroy() {
			!(function (t, e) {
				const n = t.$$
				null !== n.fragment &&
					(r(n.on_destroy),
					n.fragment && n.fragment.d(e),
					(n.on_destroy = n.fragment = null),
					(n.ctx = []))
			})(this, 1),
				(this.$destroy = t)
		}
		$on(e, n) {
			if (!o(n)) return t
			const r = this.$$.callbacks[e] || (this.$$.callbacks[e] = [])
			return (
				r.push(n),
				() => {
					const t = r.indexOf(n)
					;-1 !== t && r.splice(t, 1)
				}
			)
		}
		$set(t) {
			var e
			this.$$set &&
				((e = t), 0 !== Object.keys(e).length) &&
				((this.$$.skip_bound = !0), this.$$set(t), (this.$$.skip_bound = !1))
		}
	}
	function M(t, e, n) {
		const r = t.slice()
		return (r[12] = e[n]), (r[14] = n), r
	}
	function A(e) {
		let n, r
		return {
			c() {
				var t, e, o, l, u, a
				;(n = f('img')),
					(t = n.src),
					(e = r =
						`${
							JSON.parse(window.BINGOPRESS_THEME.path).plugin_url
						}originalassets/img/loading.gif`),
					c || (c = document.createElement('a')),
					(c.href = e),
					t !== c.href && h(n, 'src', r),
					h(n, 'class', 'w-10 h-10 absolute right-4'),
					h(n, 'alt', 'Loading...'),
					(o = n),
					(l = 'z-index'),
					null === (u = '10')
						? o.style.removeProperty(l)
						: o.style.setProperty(l, u, a ? 'important' : '')
			},
			m(t, e) {
				s(t, n, e)
			},
			p: t,
			d(t) {
				t && i(n)
			},
		}
	}
	function C(e) {
		let n
		return {
			c() {
				;(n = f('div')),
					(n.textContent = 'Search Not Found!'),
					h(
						n,
						'class',
						'w-full flex justify-between p-4 border-t border-gray-200 cursor-pointer hover:bg-gray-100 text-red-400'
					)
			},
			m(t, e) {
				s(t, n, e)
			},
			p: t,
			d(t) {
				t && i(n)
			},
		}
	}
	function H(t) {
		let e,
			n,
			r = t[3],
			o = []
		for (let e = 0; e < r.length; e += 1) o[e] = B(M(t, r, e))
		let l = t[1] < t[2] && I && G(t)
		return {
			c() {
				e = f('div')
				for (let t = 0; t < o.length; t += 1) o[t].c()
				;(n = d()),
					l && l.c(),
					h(e, 'id', 'fab-search-results'),
					h(e, 'class', 'w-full border-t border-gray-200 svelte-11gyao7')
			},
			m(t, r) {
				s(t, e, r)
				for (let t = 0; t < o.length; t += 1) o[t].m(e, null)
				a(e, n), l && l.m(e, null)
			},
			p(t, c) {
				if (8 & c) {
					let l
					for (r = t[3], l = 0; l < r.length; l += 1) {
						const u = M(t, r, l)
						o[l] ? o[l].p(u, c) : ((o[l] = B(u)), o[l].c(), o[l].m(e, n))
					}
					for (; l < o.length; l += 1) o[l].d(1)
					o.length = r.length
				}
				t[1] < t[2] && I
					? l
						? l.p(t, c)
						: ((l = G(t)), l.c(), l.m(e, null))
					: l && (l.d(1), (l = null))
			},
			d(t) {
				t && i(e),
					(function (t, e) {
						for (let n = 0; n < t.length; n += 1) t[n] && t[n].d(e)
					})(o, t),
					l && l.d()
			},
		}
	}
	function B(t) {
		let e,
			n,
			r,
			o,
			l,
			c,
			u,
			p,
			g,
			$ = t[12].title + ''
		return {
			c() {
				;(e = f('div')),
					(n = f('a')),
					(r = f('span')),
					(l = d()),
					(c = f('div')),
					(u = f('a')),
					(p = f('em')),
					h(r, 'class', 'my-auto'),
					h(n, 'href', (o = t[12].url)),
					h(p, 'class', 'fas fa-external-link-alt text-gray-400'),
					h(u, 'href', (g = t[12].url)),
					h(u, 'target', '_blank'),
					h(u, 'rel', 'noreferrer'),
					h(c, 'class', 'my-auto pl-2'),
					h(
						e,
						'class',
						'w-full flex justify-between p-4 border-gray-200 hover:bg-gray-50'
					),
					m(e, 'border-b', t[14] < t[3].length - 1)
			},
			m(t, o) {
				s(t, e, o),
					a(e, n),
					a(n, r),
					(r.innerHTML = $),
					a(e, l),
					a(e, c),
					a(c, u),
					a(u, p)
			},
			p(t, l) {
				8 & l && $ !== ($ = t[12].title + '') && (r.innerHTML = $),
					8 & l && o !== (o = t[12].url) && h(n, 'href', o),
					8 & l && g !== (g = t[12].url) && h(u, 'href', g),
					8 & l && m(e, 'border-b', t[14] < t[3].length - 1)
			},
			d(t) {
				t && i(e)
			},
		}
	}
	function G(e) {
		let n, r, o
		return {
			c() {
				;(n = f('div')),
					(n.textContent = 'Load More...'),
					h(
						n,
						'class',
						'w-full flex justify-between p-4 cursor-pointer border-t border-gray-200 hover:bg-gray-100'
					)
			},
			m(t, l) {
				s(t, n, l), r || ((o = p(n, 'click', e[8])), (r = !0))
			},
			p: t,
			d(t) {
				t && i(n), (r = !1), o()
			},
		}
	}
	function q(e) {
		let n,
			o,
			l,
			c,
			u,
			m,
			$,
			b,
			y = e[4] && A()
		function v(t, e) {
			return t[3] && t[3].length ? H : t[0] && !t[4] ? C : void 0
		}
		let x = v(e),
			_ = x && x(e)
		return {
			c() {
				;(n = f('div')),
					(o = f('form')),
					y && y.c(),
					(l = d()),
					(c = f('div')),
					(u = f('input')),
					(m = d()),
					_ && _.c(),
					h(u, 'type', 'search'),
					h(u, 'id', 'fab-search'),
					h(u, 'name', 's'),
					h(u, 'class', 'w-full text-xl font-medium focus:outline-none'),
					h(u, 'placeholder', 'Keywords...'),
					h(u, 'autocomplete', 'off'),
					h(c, 'class', 'relative'),
					h(o, 'method', 'GET'),
					h(o, 'action', '/'),
					h(o, 'class', 'w-full p-4'),
					h(n, 'class', 'flex flex-wrap item-center relative')
			},
			m(t, r) {
				s(t, n, r),
					a(n, o),
					y && y.m(o, null),
					a(o, l),
					a(o, c),
					a(c, u),
					g(u, e[0]),
					a(n, m),
					_ && _.m(n, null),
					$ || ((b = [p(u, 'input', e[7]), p(u, 'keydown', e[6])]), ($ = !0))
			},
			p(t, [e]) {
				t[4]
					? y
						? y.p(t, e)
						: ((y = A()), y.c(), y.m(o, l))
					: y && (y.d(1), (y = null)),
					1 & e && g(u, t[0]),
					x === (x = v(t)) && _
						? _.p(t, e)
						: (_ && _.d(1), (_ = x && x(t)), _ && (_.c(), _.m(n, null)))
			},
			i: t,
			o: t,
			d(t) {
				t && i(n), y && y.d(), _ && _.d(), ($ = !1), r(b)
			},
		}
	}
	let I = !0
	function J(t, e, n) {
		let r,
			o,
			l,
			c,
			u,
			a,
			s = []
		const i = () => {
			let t = `${window.BINGOPRESS_THEME.rest_url}wp/v2/search`,
				e = { search: r, per_page: 10, page: l }
			;(t +=
				'?' +
				Object.keys(e)
					.map((t) => `${t}=${e[t]}`)
					.join('&')),
				fetch(t).then((t) =>
					(async function (t) {
						if (
							(n(2, (c = t.headers.get('X-WP-TotalPages'))),
							200 === t.status && r)
						) {
							let e = await t.text()
							;(e = JSON.parse(e).filter((t) => 'fab' !== t.subtype)),
								n(3, (s = [...s, ...e]))
						} else n(3, (s = []))
						n(4, (a = !1)), (o = r)
					})(t)
				)
		}
		return [
			r,
			l,
			c,
			s,
			a,
			i,
			() => {
				clearTimeout(u),
					(u = setTimeout(() => {
						r != o && (n(4, (a = !0)), n(3, (s = [])), n(1, (l = 1)), i())
					}, 500))
			},
			function () {
				;(r = this.value), n(0, r)
			},
			() => {
				n(1, (l += 1)), i()
			},
		]
	}
	return (app = new (class extends P {
		constructor(t) {
			super(), L(this, t, J, q, l, {})
		}
	})({ target: document.querySelector('#bingopress-search-dom') }))
})()
