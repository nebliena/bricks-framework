import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, InspectorControls, InnerBlocks } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

registerBlockType('bricks-f/section', {

    title		: __('Section', 'bricks-f'),
    description	: __('Bricks Section block', 'bricks-f'),
    icon		: 'tagcloud',
    category	: 'bricks-f-layout',
    keywords	: [
        __('Bricks', 'bricks-f'),
        __('Section', 'bricks-f')
    ],
    attributes: {
        content: {
            type 	: 'array',
            source 	: 'children',
            selector: 'section',
        },
    },
    edit: function ({ attributes, setAttributes, className, isSelected }) {

        return (
			<section className={className}>
				<InnerBlocks />
			</section>

        );
    },
    save: function( { className } ) {
        return (
			<section className={className}>
				<InnerBlocks.Content />
			</section>
        );
    }
});