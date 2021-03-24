class BricksBlock {

	constructor(name, slug, title, icon, category) {
		this.name 		= name;
		this.slug 		= slug;
		this.title 		= title;
		this.icon 		= icon;
		this.category 	= category;

		this.registerBrickBlock();
	}

	registerBrickBlock() {
		let __ 					= wp.i18n.__; 
		let el 					= wp.element.createElement;
		let Editable 			= wp.blocks.Editable;
		let children 			= wp.blocks.source.children;
		let registerBlockType 	= wp.blocks.registerBlockType;

		registerBlockType( this.name, { 
			title: __( this.title, this.slug ),
			icon: this.icon,
			category: this.category,

			attributes: {
				content: children( 'p' ),
			},

			edit: function( props ) {
				var content = props.attributes.content;
				let focus = props.focus;

				function onChangeContent( newContent ) {
					props.setAttributes( { content: newContent } );
				}

				return el(
					Editable,
					{
						tagName: 'p',
						className: props.className,
						onChange: onChangeContent,
						value: content,
						focus: focus,
						onFocus: props.setFocus
					}
				);
			},

			save: function( props ) {
				var content = props.attributes.content;

				return el( 'p',  {
						className: props.className,
					},
					content,
				);
			},
		} )
	}
}

module.exports.BricksBlock = BricksBlock;