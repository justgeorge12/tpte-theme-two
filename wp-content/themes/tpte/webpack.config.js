/**
 * Webpack configuration for TPTE Theme
 *
 * This config bundles and minifies JS files for production.
 * Development mode includes source maps for debugging.
 */

const path = require('path');
const TerserPlugin = require('terser-webpack-plugin');

module.exports = (env, argv) => {
	const isProduction = argv.mode === 'production';

	return {
		entry: {
			// Main theme script - bundles all custom JS
			main: './assets/js/src/main.js',
		},
		output: {
			filename: '[name].min.js',
			path: path.resolve(__dirname, 'assets/js'),
			clean: false, // Don't clean - we want to keep vendor files
		},
		module: {
			rules: [
				{
					test: /\.js$/,
					exclude: /node_modules/,
					use: {
						loader: 'babel-loader',
						options: {
							presets: [
								[
									'@babel/preset-env',
									{
										targets: {
											browsers: ['last 2 versions', '> 1%', 'not dead'],
										},
									},
								],
							],
						},
					},
				},
			],
		},
		optimization: {
			minimize: isProduction,
			minimizer: [
				new TerserPlugin({
					terserOptions: {
						format: {
							comments: false,
						},
						compress: {
							drop_console: isProduction,
							drop_debugger: isProduction,
						},
					},
					extractComments: false,
				}),
			],
		},
		devtool: isProduction ? false : 'source-map',
		externals: {
			jquery: 'jQuery',
		},
		watch: argv.watch || false,
		watchOptions: {
			ignored: /node_modules/,
		},
	};
};