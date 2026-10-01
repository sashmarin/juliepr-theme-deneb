const root = document.documentElement;
const storageKey = 'juliepr-theme-deneb-palette';
const paletteToggleLabel = window.julieprThemeDenebSettings?.paletteToggleLabel || 'Toggle color scheme';

const setPalette = (palette) => {
	root.dataset.palette = palette;
	localStorage.setItem( storageKey, palette );
};

setPalette( localStorage.getItem( storageKey ) || 'light' );

const initializePaletteToggle = () => {
	const button = document.querySelector( '.deneb-palette-toggle button' );

	if ( ! button ) {
		return;
	}

	button.setAttribute( 'aria-label', paletteToggleLabel );
	button.setAttribute( 'aria-pressed', String( root.dataset.palette === 'dark' ) );
	button.addEventListener( 'click', () => {
		const palette = root.dataset.palette === 'dark' ? 'light' : 'dark';
		setPalette( palette );
		button.setAttribute( 'aria-pressed', String( palette === 'dark' ) );
	} );
};

if ( document.readyState === 'loading' ) {
	document.addEventListener( 'DOMContentLoaded', initializePaletteToggle );
} else {
	initializePaletteToggle();
}
