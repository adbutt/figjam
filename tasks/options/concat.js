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
			'assets/js/src/navigation.js',
			'assets/js/src/dropdown.js',
			'assets/js/src/project.js'
		],
			dest: 'assets/js/project.js'
	}
};
