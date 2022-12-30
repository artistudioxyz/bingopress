;(window.BINGOPRESS_THEME = {
	...window.BINGOPRESS_THEME,
	init: () => {
		window.BINGOPRESS_THEME.modalSearch(),
			window.BINGOPRESS_THEME.siteMobileNav()
	},
	bingopressCloseDialogs: () => {
		let o = window.BINGOPRESS_THEME.dialogs || {}
		for (let n in o) o[n].close()
	},
	modalSearch: () => {
		jQuery('.bingopress-search-button').click(function () {
			let o = '#bingopress-search-dom',
				n = {
					title: '',
					icon: jQuery(o).data('icon'),
					content: jQuery(o).children(':first'),
					draggable: !0,
					escapeKey: !0,
					backgroundDismiss: !0,
					closeIconClass: 'fas fa-times text-base',
					animation: 'fabcustomcloseanimation',
					closeAnimation: 'fabcustomcloseanimation',
					animationSpeed: '1000',
					onOpenBefore: function () {
						let o = jQuery('.jconfirm-box-container')
						o.hide(),
							setTimeout(function () {
								o.show(), o.addClass('jconfirm-animation-fabmodalopen')
							}, 1)
						let n = 'bingopress-search-modal jconfirm-medium '
						;(n += this.draggable
							? 'bingopress-modal-draggable '
							: 'bingopress-modal-notdraggable'),
							jQuery('.jconfirm').addClass(n)
					},
					onOpen: function () {
						jQuery('.jconfirm-closeIcon').before(
							'<ul class="jconfirm-navigation"></ul>'
						),
							jQuery('.jconfirm-closeIcon').attr('tabindex', 0),
							jQuery('.jconfirm-closeIcon').focus(function () {
								jQuery('.jconfirm-closeIcon').click()
							})
					},
					onClose: function () {
						jQuery('.jconfirm-box-container').addClass(
							'jconfirm-animation-fabmodalclose'
						)
						let n = { ...this.content }
						this.setContent(this.content.html()), jQuery(o).html(n)
					},
				}
			jQuery.dialog(n)
		})
	},
	siteMobileNav: () => {
		jQuery('.site-mobile-nav-show').click(function () {
			jQuery('#menu-nav').show()
		}),
			jQuery('.site-mobile-nav-hide').click(function () {
				jQuery('#menu-nav').hide()
			})
	},
}),
	jQuery(document).ready(function () {
		window.BINGOPRESS_THEME.init()
	})
