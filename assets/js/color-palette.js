(() => {
	const root = document.documentElement;
	const storageKey = 'juliepr-theme-deneb-palette';
	const modes = [ 'system', 'dark', 'light' ];
	const icons = { system: '◐', light: '☼', dark: '☽' };
	const labels = window.julieprThemeDenebSettings?.paletteToggleLabels || {
		system: 'Color scheme: System. Switch to dark mode.',
		dark: 'Color scheme: Dark. Switch to light mode.',
		light: 'Color scheme: Light. Follow system settings.',
	};
	const systemPalette = window.matchMedia( '(prefers-color-scheme: dark)' );
	let mode = 'system';
	let buttons = [];

	try {
		const savedMode = window.localStorage.getItem( storageKey );
		if ( modes.includes( savedMode ) ) {
			mode = savedMode;
		}
	} catch {
		// Follow the system when browser privacy settings deny storage access.
	}

	const applyPalette = () => {
		root.dataset.palette = mode === 'system' ? ( systemPalette.matches ? 'dark' : 'light' ) : mode;
		buttons.forEach( ( button ) => {
			button.textContent = icons[ mode ];
			button.setAttribute( 'aria-label', labels[ mode ] );
			button.setAttribute( 'title', labels[ mode ] );
			button.removeAttribute( 'aria-pressed' );
		} );
	};

	const saveMode = () => {
		try {
			if ( mode === 'system' ) {
				window.localStorage.removeItem( storageKey );
			} else {
				window.localStorage.setItem( storageKey, mode );
			}
		} catch {
			// The toggle still works for this page when preferences cannot be saved.
		}
	};

	// Resolve the palette in the head, before the page content is rendered.
	applyPalette();
	systemPalette.addEventListener( 'change', () => {
		if ( mode === 'system' ) {
			applyPalette();
		}
	} );

	const initializePaletteToggle = () => {
		buttons = Array.from( document.querySelectorAll( '.deneb-palette-toggle button' ) );
		applyPalette();
		buttons.forEach( ( button ) => {
			button.addEventListener( 'click', () => {
				mode = modes[ ( modes.indexOf( mode ) + 1 ) % modes.length ];
				applyPalette();
				saveMode();
			} );
		} );
	};

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', initializePaletteToggle );
	} else {
		initializePaletteToggle();
	}
})();
