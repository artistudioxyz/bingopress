window.BINGOPRESS_THEME = {
	...window.BINGOPRESS_THEME,
	init_setting: () => {
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
			)
	},
	smoothScroll(e) {
		if ('' !== this.hash) {
			e.preventDefault()
			var n = this.hash
			jQuery('html, body').animate(
				{ scrollTop: jQuery(n).offset().top },
				800,
				function () {
					window.location.hash = n
				}
			)
		}
	},
	triggerSectionTab() {
		let e = `animate__animated animate__${window.BINGOPRESS_THEME.options.bingopress_animation.elements.tab}`
		window.BINGOPRESS_THEME.animate(jQuery('div', this), e)
		let n = jQuery(this).parent(),
			t = jQuery(this).attr('data-tab'),
			i = jQuery(`#${t}`)
		jQuery('li', n).removeClass('tab-active'),
			jQuery('.content .tab-content').removeClass('current'),
			jQuery(this).addClass('tab-active'),
			i.addClass('current'),
			window.BINGOPRESS_THEME.animate(
				i,
				`animate__animated animate__${window.BINGOPRESS_THEME.options.bingopress_animation.elements.content}`
			)
	},
	animate: (e, n) => (
		jQuery(e).addClass(n),
		jQuery(e).on('animationend', () => {
			jQuery(e).removeClass(n)
		}),
		jQuery(e)
	),
}
