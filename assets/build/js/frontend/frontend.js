;(window.BINGOPRESS_THEME = {
	...window.BINGOPRESS_THEME,
	init: () => {
		window.BINGOPRESS_THEME.siteDesktopNav(),
			window.BINGOPRESS_THEME.siteMobileNav()
	},
	siteDesktopNav: () => {
		jQuery('#menu-nav .sub-menu').each(function () {
			jQuery(this)
				.prev()
				.after(
					'<a href="#" class="sub-menu-desktop-toggle"><i class="fas fa-caret-down"></i></a>'
				)
		}),
			jQuery('#menu-nav .sub-menu-desktop-toggle').on('click', function () {
				let e = jQuery(this).siblings('.sub-menu').first(),
					s = jQuery(this).find('i').first()
				if (s.hasClass('fa-caret-down')) {
					e
						.parent()
						.siblings()
						.find('i')
						.removeClass('fa-caret-up')
						.addClass('fa-caret-down'),
						e
							.parent()
							.siblings()
							.find('.sub-menu')
							.removeClass('sub-menu-active'),
						e.show(),
						e.addClass('sub-menu-active')
					let i = e.find('a').first()
					setTimeout(function () {
						i.get(0).focus()
					}, 100),
						s.removeClass('fa-caret-down').addClass('fa-caret-up')
				} else e.hide(), e.removeClass('sub-menu-active'), s.removeClass('fa-caret-up').addClass('fa-caret-down')
			}),
			jQuery('#body-content').focusin(function () {
				let e = jQuery('#site-nav')
				e.find('i').removeClass('fa-caret-up').addClass('fa-caret-down'),
					e.find('.sub-menu').removeClass('sub-menu-active')
			})
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
					.after(
						'<a href="#" class="sub-menu-mobile-toggle"><i class="fas fa-caret-down"></i></a>'
					)
			}),
			jQuery('#menu-mobile-nav .sub-menu-mobile-toggle').on(
				'click',
				function () {
					let e = jQuery(this).siblings('.sub-menu').first(),
						s = jQuery(this).find('i').first()
					s.hasClass('fa-caret-down')
						? (e
								.parent()
								.siblings()
								.find('i')
								.removeClass('fa-caret-up')
								.addClass('fa-caret-down'),
						  e.parent().siblings().find('.sub-menu').hide(),
						  s.removeClass('fa-caret-down').addClass('fa-caret-up'),
						  e.show(),
						  e.find('a').first().get(0).focus())
						: (s.removeClass('fa-caret-up').addClass('fa-caret-down'), e.hide())
				}
			),
			jQuery('.site-mobile-nav-show').click(function () {
				let e = jQuery('#menu-mobile-nav')
				e.show(), e.find('.menu_primary a').first().get(0).focus()
			}),
			jQuery('.site-mobile-nav-hide').click(function () {
				jQuery('#menu-mobile-nav').hide()
			}),
			jQuery('body').on('keyup', '#menu-mobile-nav', function (e) {
				if (9 == e.which) {
					if ('last-menu-mobile-nav' === jQuery(':focus').attr('id')) {
						e.preventDefault(),
							jQuery('#site-mobile-nav-close-button').get(0).focus()
					}
				}
			})
	},
}),
	jQuery(document).ready(function () {
		window.BINGOPRESS_THEME.init()
	})
