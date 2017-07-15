module.exports = {
	options: {
		stripBanners: true,
		banner: '/*! <%= pkg.title %> - v<%= pkg.version %>\n' +
		' * <%= pkg.homepage %>\n' +
		' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
		' * Licensed GPL-2.0+' +
		' */\n'
	},
	main: {
		src: [
			'bower_components/modernizr/modernizr.js',
			'assets/js/vendor/imagesloaded.min.js',
			'bower_components/waypoints/lib/jquery.waypoints.min.js',
			'bower_components/jquery.stellar/jquery.stellar.min.js',
			'assets/js/src/project.js'
		],
		dest: 'assets/js/project.js'
	}
};
