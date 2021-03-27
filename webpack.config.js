const defaultConfig = require("@wordpress/scripts/config/webpack.config");
const path = require('path');

module.exports = {
	...defaultConfig,
	entry: {
		'bricks-f': './assets/src/bricks.js'
	},
	output: {
		path: path.join(__dirname, './assets/dist/js'),
		filename: '[name].js'
	}
}