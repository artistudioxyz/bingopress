!(function (c) {
	function e(e) {
		var o, f
		'string' == typeof e.data && (e.data = { keys: e.data }),
			e.data &&
				e.data.keys &&
				'string' == typeof e.data.keys &&
				((o = e.handler),
				(f = e.data.keys.toLowerCase().split(' ')),
				(e.handler = function (a) {
					if (
						this === a.target ||
						!(
							/textarea|select/i.test(a.target.nodeName) ||
							(c.hotkeys.options.filterTextInputs &&
								-1 <
									c.inArray(a.target.type, c.hotkeys.textAcceptingInputTypes))
						)
					) {
						var s = 'keypress' !== a.type && c.hotkeys.specialKeys[a.which],
							e = String.fromCharCode(a.which).toLowerCase(),
							r = '',
							t = {}
						c.each(['alt', 'ctrl', 'shift'], function (e, t) {
							a[t + 'Key'] && s !== t && (r += t + '+')
						}),
							a.metaKey && !a.ctrlKey && 'meta' !== s && (r += 'meta+'),
							a.metaKey &&
								'meta' !== s &&
								-1 < r.indexOf('alt+ctrl+shift+') &&
								(r = r.replace('alt+ctrl+shift+', 'hyper+')),
							s
								? (t[r + s] = !0)
								: ((t[r + e] = !0),
								  (t[r + c.hotkeys.shiftNums[e]] = !0),
								  'shift+' === r && (t[c.hotkeys.shiftNums[e]] = !0))
						for (var i = 0, n = f.length; i < n; i++)
							if (t[f[i]]) return o.apply(this, arguments)
					}
				}))
	}
	;(c.hotkeys = {
		version: '0.8',
		specialKeys: {
			8: 'backspace',
			9: 'tab',
			10: 'return',
			13: 'return',
			16: 'shift',
			17: 'ctrl',
			18: 'alt',
			19: 'pause',
			20: 'capslock',
			27: 'esc',
			32: 'space',
			33: 'pageup',
			34: 'pagedown',
			35: 'end',
			36: 'home',
			37: 'left',
			38: 'up',
			39: 'right',
			40: 'down',
			45: 'insert',
			46: 'del',
			59: ';',
			61: '=',
			96: '0',
			97: '1',
			98: '2',
			99: '3',
			100: '4',
			101: '5',
			102: '6',
			103: '7',
			104: '8',
			105: '9',
			106: '*',
			107: '+',
			109: '-',
			110: '.',
			111: '/',
			112: 'f1',
			113: 'f2',
			114: 'f3',
			115: 'f4',
			116: 'f5',
			117: 'f6',
			118: 'f7',
			119: 'f8',
			120: 'f9',
			121: 'f10',
			122: 'f11',
			123: 'f12',
			144: 'numlock',
			145: 'scroll',
			173: '-',
			186: ';',
			187: '=',
			188: ',',
			189: '-',
			190: '.',
			191: '/',
			192: '`',
			219: '[',
			220: '\\',
			221: ']',
			222: "'",
		},
		shiftNums: {
			'`': '~',
			1: '!',
			2: '@',
			3: '#',
			4: '$',
			5: '%',
			6: '^',
			7: '&',
			8: '*',
			9: '(',
			0: ')',
			'-': '_',
			'=': '+',
			';': ': ',
			"'": '"',
			',': '<',
			'.': '>',
			'/': '?',
			'\\': '|',
		},
		textAcceptingInputTypes: [
			'text',
			'password',
			'number',
			'email',
			'url',
			'range',
			'date',
			'month',
			'week',
			'time',
			'datetime',
			'datetime-local',
			'search',
			'color',
			'tel',
		],
		options: { filterTextInputs: !0 },
	}),
		c.each(['keydown', 'keyup', 'keypress'], function () {
			c.event.special[this] = { add: e }
		})
})(jQuery || this.jQuery || window.jQuery)
