window.BINGOPRESS_THEME = {
	...window.BINGOPRESS_THEME,
	init_setting: () => {
		jQuery('.field_option_animation_element').each(function () {
			let t = jQuery(this)
			t.select2({ data: window.BINGOPRESS_THEME.animateCSSAnimation }),
				t.data('selected') && (t.val(t.data('selected')), t.trigger('change'))
		}),
			jQuery('#setting-form .select2').select2(),
			window.BINGOPRESS_THEME.init_setting_design(),
			jQuery(document).on(
				'click',
				'.smooth-scroll',
				window.BINGOPRESS_THEME.smoothScroll
			),
			jQuery(document).on(
				'click',
				'.bingopress-container ul.nav-tab-general li.nav-nonurl',
				window.BINGOPRESS_THEME.triggerSectionTab
			),
			jQuery(document).on(
				'click',
				'.bingopress-container ul.nav-tab-jconfirm li',
				window.BINGOPRESS_THEME.triggerSectionTab
			),
			jQuery(document).on(
				'click',
				'.bingopress-container .bingopress-menu-responsive .menu-item',
				window.BINGOPRESS_THEME.triggerSectionTab
			),
			jQuery(document).on(
				'change.select2',
				'#setting-form .select2[name="field_option_animation_logo"]',
				window.BINGOPRESS_THEME.triggerSectionAnimateLogo
			),
			window.BINGOPRESS_THEME.triggerOptionSettingValue(),
			window.BINGOPRESS_THEME.triggerResetOptionButton()
	},
	init_setting_design: () => {
		let t = jQuery('#field_option_design_modal_size')
		t.select2({
			placeholder: '--choose--',
			data: [
				{ id: 'xsmall', text: 'XSmall' },
				{ id: 'small', text: 'Small' },
				{ id: 'medium', text: 'Medium' },
				{ id: 'large', text: 'Large' },
				{ id: 'xlarge', text: 'XLarge' },
				{ id: 'custom', text: 'Custom' },
			],
		}),
			t.val(t.data('selected')),
			t.on('select2:select', window.BINGOPRESS_THEME.triggerDesignSize),
			t.trigger('change'),
			window.BINGOPRESS_THEME.triggerDesignSize()
	},
	smoothScroll(t) {
		if ('' !== this.hash) {
			t.preventDefault()
			var e = this.hash
			jQuery('html, body').animate(
				{ scrollTop: jQuery(e).offset().top },
				800,
				function () {
					window.location.hash = e
				}
			)
		}
	},
	triggerSectionTab() {
		let t = `animate__animated animate__${window.BINGOPRESS_THEME.options.bingopress_animation.elements.tab}`
		window.BINGOPRESS_THEME.animate(jQuery('div', this), t)
		let e = jQuery(this).parent(),
			i = jQuery(this).attr('data-tab'),
			n = jQuery(`#${i}`)
		jQuery('li', e).removeClass('tab-active'),
			jQuery('.content .tab-content').removeClass('current'),
			jQuery(this).addClass('tab-active'),
			n.addClass('current'),
			window.BINGOPRESS_THEME.animate(
				n,
				`animate__animated animate__${window.BINGOPRESS_THEME.options.bingopress_animation.elements.content}`
			)
	},
	triggerSectionAnimateLogo(t) {
		let e = t.target.value
		jQuery('#setting-form .bg-cover-image img').attr(
			'class',
			`animate__animated animate__${e}`
		)
	},
	triggerOptionSettingValue() {
		jQuery('.option_settings').change(function () {
			let t = jQuery(this).data('option'),
				e = jQuery(this).is(':checked') ? 'true' : 'false'
			jQuery(`#${t}`).val(e)
		})
	},
	triggerDesignSize() {
		let t = jQuery('#setting_design_custom_size')
		'custom' === jQuery('#field_option_design_modal_size').val()
			? t.show()
			: t.hide()
	},
	triggerResetOptionButton() {
		jQuery('.reset-option').click(function () {
			jQuery.confirm({
				icon: 'fas fa-sync',
				closeIcon: !0,
				animation: 'scale',
				columnClass: 'j-small',
				title: 'Reset',
				content: jQuery('#clear-config').html(),
				buttons: {
					confirm: function () {
						jQuery('#clear-config-form ').submit()
					},
					cancel: function () {},
				},
			})
		})
	},
	animate: (t, e) => (
		jQuery(t).addClass(e),
		jQuery(t).on('animationend', () => {
			jQuery(t).removeClass(e)
		}),
		jQuery(t)
	),
	camelize: (t, e = '_') =>
		t
			.split(e)
			.map((t) => t.replace(/./, (t) => t.toUpperCase()))
			.join(),
	_autop_newline_preservation_helper: (t) =>
		t[0].replace('\n', '<WPPreserveNewline />'),
	isNumeric: (t) => 'string' == typeof t && !isNaN(t) && !isNaN(parseFloat(t)),
	validate_form: (t, e) => {
		let i = { status: !0, message: '' }
		const n = (t, e = '') => {
			let i = t.split('_')
			return (
				i.splice(0, 1),
				(i = window.BINGOPRESS_THEME.camelize(i.join('_')).replace(',', ' ')) +
					e
			)
		}
		return (
			t.required.some((o) => {
				let a = { position: -1, value: '' }
				return (
					e.some((t, e) => {
						if (t.name === o) return (a.position = e), (a.value = t.value), !0
					}),
					-1 !== a.position && a.value
						? !(
								!t.types ||
								!t.types[o] ||
								('email' !== t.types[o] ||
								window.BINGOPRESS_THEME.isEmail(a.value)
									? 'integer' !== t.types[o] ||
									  Number.isInteger(t.types[o]) ||
									  ((i.status = !1),
									  (i.message =
											t.messages && t.messages[o]
												? t.messages[o]
												: n(
														o,
														' field is not valid! Please input valid integer number!'
												  )))
									: ((i.status = !1),
									  (i.message =
											t.messages && t.messages[o]
												? t.messages[o]
												: n(
														o,
														' field is not valid! Please input valid email address!'
												  ))),
								i.status)
						  ) || void 0
						: ((i.status = !1),
						  (i.message =
								t.messages && t.messages[o]
									? t.messages[o]
									: n(o, ' field is required!')),
						  !0)
				)
			}),
			i
		)
	},
	animateCSSAnimation: [
		{
			text: 'Attention Seekers',
			children: [
				{ id: 'bounce', text: 'bounce' },
				{ id: 'flash', text: 'flash' },
				{ id: 'pulse', text: 'pulse' },
				{ id: 'rubberBand', text: 'rubberBand' },
				{ id: 'shakeX', text: 'shakeX' },
				{ id: 'shakeY', text: 'shakeY' },
				{ id: 'headShake', text: 'headShake' },
				{ id: 'swing', text: 'swing' },
				{ id: 'tada', text: 'tada' },
				{ id: 'wobble', text: 'wobble' },
				{ id: 'jello', text: 'jello' },
				{ id: 'heartBeat', text: 'heartBeat' },
			],
		},
		{
			text: 'Back entrances',
			children: [
				{ id: 'backInDown', text: 'backInDown' },
				{ id: 'backInLeft', text: 'backInLeft' },
				{ id: 'backInRight', text: 'backInRight' },
				{ id: 'backInUp', text: 'backInUp' },
			],
		},
		{
			text: 'Back exits',
			children: [
				{ id: 'backOutDown', text: 'backOutDown' },
				{ id: 'backOutLeft', text: 'backOutLeft' },
				{ id: 'backOutRight', text: 'backOutRight' },
				{ id: 'backOutUp', text: 'backOutUp' },
			],
		},
		{
			text: 'Bouncing entrances',
			children: [
				{ id: 'bounceIn', text: 'bounceIn' },
				{ id: 'bounceInDown', text: 'bounceInDown' },
				{ id: 'bounceInLeft', text: 'bounceInLeft' },
				{ id: 'bounceInRight', text: 'bounceInRight' },
				{ id: 'bounceInUp', text: 'bounceInUp' },
			],
		},
		{
			text: 'Bouncing exits',
			children: [
				{ id: 'bounceOut', text: 'bounceOut' },
				{ id: 'bounceOutDown', text: 'bounceOutDown' },
				{ id: 'bounceOutLeft', text: 'bounceOutLeft' },
				{ id: 'bounceOutRight', text: 'bounceOutRight' },
				{ id: 'bounceOutUp', text: 'bounceOutUp' },
			],
		},
		{
			text: 'Fading entrances',
			children: [
				{ id: 'fadeIn', text: 'fadeIn' },
				{ id: 'fadeInDown', text: 'fadeInDown' },
				{ id: 'fadeInDownBig', text: 'fadeInDownBig' },
				{ id: 'fadeInLeft', text: 'fadeInLeft' },
				{ id: 'fadeInLeftBig', text: 'fadeInLeftBig' },
				{ id: 'fadeInRight', text: 'fadeInRight' },
				{ id: 'fadeInRightBig', text: 'fadeInRightBig' },
				{ id: 'fadeInUp', text: 'fadeInUp' },
				{ id: 'fadeInUpBig', text: 'fadeInUpBig' },
				{ id: 'fadeInTopLeft', text: 'fadeInTopLeft' },
				{ id: 'fadeInTopRight', text: 'fadeInTopRight' },
				{ id: 'fadeInBottomLeft', text: 'fadeInBottomLeft' },
				{ id: 'fadeInBottomRight', text: 'fadeInBottomRight' },
			],
		},
		{
			text: 'Fading exits',
			children: [
				{ id: 'fadeOut', text: 'fadeOut' },
				{ id: 'fadeOutDown', text: 'fadeOutDown' },
				{ id: 'fadeOutDownBig', text: 'fadeOutDownBig' },
				{ id: 'fadeOutLeft', text: 'fadeOutLeft' },
				{ id: 'fadeOutLeftBig', text: 'fadeOutLeftBig' },
				{ id: 'fadeOutRight', text: 'fadeOutRight' },
				{ id: 'fadeOutRightBig', text: 'fadeOutRightBig' },
				{ id: 'fadeOutUp', text: 'fadeOutUp' },
				{ id: 'fadeOutUpBig', text: 'fadeOutUpBig' },
				{ id: 'fadeOutTopLeft', text: 'fadeOutTopLeft' },
				{ id: 'fadeOutTopRight', text: 'fadeOutTopRight' },
				{ id: 'fadeOutBottomRight', text: 'fadeOutBottomRight' },
				{ id: 'fadeOutBottomLeft', text: 'fadeOutBottomLeft' },
			],
		},
		{
			text: 'Flippers',
			children: [
				{ id: 'flip', text: 'flip' },
				{ id: 'flipInX', text: 'flipInX' },
				{ id: 'flipInY', text: 'flipInY' },
				{ id: 'flipOutX', text: 'flipOutX' },
				{ id: 'flipOutY', text: 'flipOutY' },
			],
		},
		{
			text: 'Lightspeed',
			children: [
				{ id: 'lightSpeedInRight', text: 'lightSpeedInRight' },
				{ id: 'lightSpeedInLeft', text: 'lightSpeedInLeft' },
				{ id: 'lightSpeedOutRight', text: 'lightSpeedOutRight' },
				{ id: 'lightSpeedOutLeft', text: 'lightSpeedOutLeft' },
			],
		},
		{
			text: 'Rotating entrances',
			children: [
				{ id: 'rotateIn', text: 'rotateIn' },
				{ id: 'rotateInDownLeft', text: 'rotateInDownLeft' },
				{ id: 'rotateInDownRight', text: 'rotateInDownRight' },
				{ id: 'rotateInUpLeft', text: 'rotateInUpLeft' },
				{ id: 'rotateInUpRight', text: 'rotateInUpRight' },
			],
		},
		{
			text: 'Rotating exits',
			children: [
				{ id: 'rotateOut', text: 'rotateOut' },
				{ id: 'rotateOutDownLeft', text: 'rotateOutDownLeft' },
				{ id: 'rotateOutDownRight', text: 'rotateOutDownRight' },
				{ id: 'rotateOutUpLeft', text: 'rotateOutUpLeft' },
				{ id: 'rotateOutUpRight', text: 'rotateOutUpRight' },
			],
		},
		{
			text: 'Specials',
			children: [
				{ id: 'hinge', text: 'hinge' },
				{ id: 'jackInTheBox', text: 'jackInTheBox' },
				{ id: 'rollIn', text: 'rollIn' },
				{ id: 'rollOut', text: 'rollOut' },
			],
		},
		{
			text: 'Zooming entrances',
			children: [
				{ id: 'zoomIn', text: 'zoomIn' },
				{ id: 'zoomInDown', text: 'zoomInDown' },
				{ id: 'zoomInLeft', text: 'zoomInLeft' },
				{ id: 'zoomInRight', text: 'zoomInRight' },
				{ id: 'zoomInUp', text: 'zoomInUp' },
			],
		},
		{
			text: 'Zooming exits',
			children: [
				{ id: 'zoomOut', text: 'zoomOut' },
				{ id: 'zoomOutDown', text: 'zoomOutDown' },
				{ id: 'zoomOutLeft', text: 'zoomOutLeft' },
				{ id: 'zoomOutRight', text: 'zoomOutRight' },
				{ id: 'zoomOutUp', text: 'zoomOutUp' },
			],
		},
		{
			text: 'Sliding entrances',
			children: [
				{ id: 'slideInDown', text: 'slideInDown' },
				{ id: 'slideInLeft', text: 'slideInLeft' },
				{ id: 'slideInRight', text: 'slideInRight' },
				{ id: 'slideInUp', text: 'slideInUp' },
			],
		},
		{
			text: 'Sliding exits',
			children: [
				{ id: 'slideOutDown', text: 'slideOutDown' },
				{ id: 'slideOutLeft', text: 'slideOutLeft' },
				{ id: 'slideOutRight', text: 'slideOutRight' },
				{ id: 'slideOutUp', text: 'slideOutUp' },
			],
		},
	],
}
