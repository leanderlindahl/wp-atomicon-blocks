import { __ } from '@wordpress/i18n';
import { registerBlockType } from '@wordpress/blocks';

registerBlockType( 'atomicon-blocks/atomicon-1', {
	title: __( 'Atomicon 1', 'atomicon-blocks' ),
	icon: 'smiley',
	category: 'layout',
	edit: () => <div>Editor: Hello World</div>,
	save: () => <div>Frontend: Hello World</div>
})