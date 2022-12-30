;(window.BINGOPRESS_THEME = {
	...window.BINGOPRESS_THEME,
	init: () => {
		window.BINGOPRESS_THEME.siteMobileNav()
	},
	bingopressCloseDialogs: () => {
		let e = window.BINGOPRESS_THEME.dialogs || {}
		for (let i in e) e[i].close()
	},
	siteNav: () => {
		function e() {
			jQuery(this).parents('.sub-menu').addClass('sub-menu-active')
			let e = jQuery(this).next()
			e.hasClass('sub-menu') && e.addClass('sub-menu-active')
		}
		function i() {
			jQuery('.sub-menu').removeClass('sub-menu-active')
		}
		jQuery('#menu-primary a').focusin(e),
			jQuery('#menu-primary a').focusout(i),
			jQuery('#menu-primary a').mouseenter(e),
			jQuery('#menu-primary a').mouseout(i)
	},
	siteMobileNav: () => {
		jQuery(window).on('resize', function () {
			jQuery(window).width() >= 768 &&
				jQuery('#menu-mobile-nav').is(':visible') &&
				jQuery('#menu-mobile-nav').hide()
		}),
			jQuery('#menu-mobile-nav .sub-menu').each(function () {
				jQuery(this)
					.prev()
					.before(
						'<a href="#" class="mobile-sub-menu-toggle"><i class="fas fa-caret-down"></i></a>'
					)
			}),
			jQuery('.mobile-sub-menu-toggle').on('click', function () {
				let e = jQuery(this).siblings('.sub-menu').first(),
					i = jQuery(this).find('i').first()
				i.hasClass('fa-caret-down')
					? (i.removeClass('fa-caret-down').addClass('fa-caret-up'), e.show())
					: (i.removeClass('fa-caret-up').addClass('fa-caret-down'), e.hide())
			}),
			jQuery('.site-mobile-nav-show').click(function () {
				jQuery('#menu-mobile-nav').show()
			}),
			jQuery('.site-mobile-nav-hide').click(function () {
				jQuery('#menu-mobile-nav').hide()
			})
	},
}),
	jQuery(document).ready(function () {
		window.BINGOPRESS_THEME.init()
	})
