;(window.BINGOPRESS_THEME = {
	...window.BINGOPRESS_THEME,
	init: () => {
		window.BINGOPRESS_THEME.modalSearch(),
			window.BINGOPRESS_THEME.siteMobileNav()
	},
	jQueryConfirmBINGOPRESS: () => {
		jQuery('.bingopress-container .bingopress-links').each(function () {
			'link' != jQuery(this).data('type') &&
				jQuery(this).click(function () {
					let e = window.BINGOPRESS_THEME.dialogs || {},
						n = jQuery(this).data('modal'),
						o = `#${n}`,
						i = jQuery(o).data('title'),
						t = jQuery(this).data('hotkey')
					t &&
						(i += `<div \n                                class="inline-block absolute hidden md:block ml-4 text-xs rounded-md border border-gray-200"\n                                style="background-color: #f6f6f6; padding: .45rem .5rem; font-size: 0.75rem; top:1.9rem; right:6rem;" \n                                >${(t =
							(t = (t = (t = t.replace('ctrl', '⌃')).replace(
								'alt',
								'⌥'
							)).replace('shift', '⇧')).replace(
								'+',
								' '
							)).toUpperCase()}</div>`)
					let r = `j-${window.BINGOPRESS_THEME.options.bingopress_design.size.type}`
					;(e[n] = jQuery.dialog({
						title: i,
						icon: jQuery(o).data('icon'),
						columnClass: r,
						content: jQuery(o).html(),
						escapeKey: !0,
						backgroundDismiss: !0,
						onOpen: function () {
							let e = this,
								n = jQuery(e.content)
							;(n = (n = void 0 !== n[0] ? jQuery(n[0]) : jQuery(n)).data(
								'id'
							)),
								new (window.MutationObserver || window.WebKitMutationObserver)(
									function () {
										let o = jQuery(`#${n}`).html()
										e.setContent(o)
									}
								).observe(document.getElementById(n), {
									subtree: !0,
									attributes: !0,
								})
						},
					})),
						(window.BINGOPRESS_THEME.dialogs = e),
						setTimeout(function () {
							jQuery('.jconfirm-closeIcon').html('esc')
						}, 100)
				})
		})
	},
	bingopressCloseDialogs: () => {
		let e = window.BINGOPRESS_THEME.dialogs || {}
		for (let n in e) e[n].close()
	},
	bingopressHotkeysInit: () => {
		jQuery('.bingopress-links').each(function () {
			let e = jQuery(this).data('hotkey')
			if (e) {
				let n = jQuery(this).attr('id')
				jQuery(document).bind('keydown', e.toString(), function () {
					window.BINGOPRESS_THEME.bingopressCloseDialogs()
					let e = jQuery(`#${n}`)
					e.attr('href')
						? '_blank' === e.attr('target')
							? window.open(e.attr('href'))
							: (window.location = e.attr('href'))
						: e.trigger('click')
				})
			}
		})
	},
	modalSearch: () => {
		jQuery('.bingopress-search-button').click(function () {
			let e = '#bingopress-search-dom',
				n = {
					title: '',
					icon: jQuery(e).data('icon'),
					content: jQuery(e).children(':first'),
					draggable: !0,
					escapeKey: !0,
					backgroundDismiss: !0,
					closeIconClass: 'fas fa-times text-base',
					animation: 'fabcustomcloseanimation',
					closeAnimation: 'fabcustomcloseanimation',
					animationSpeed: '1000',
					onOpenBefore: function () {
						let e = jQuery('.jconfirm-box-container')
						e.hide(),
							setTimeout(function () {
								e.show(), e.addClass('jconfirm-animation-fabmodalopen')
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
							jQuery('.jconfirm-closeIcon').prepend('<div>&nbsp;</div>')
					},
					onClose: function () {
						jQuery('.jconfirm-box-container').addClass(
							'jconfirm-animation-fabmodalclose'
						)
						let n = { ...this.content }
						this.setContent(this.content.html()), jQuery(e).html(n)
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
