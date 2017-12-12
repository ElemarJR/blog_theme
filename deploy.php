<?php
/**
 * Deploy script using deployer.org.
 */
namespace Deployer;

require 'recipe/common.php';
require 'recipe/npm.php';
require 'app/recipe/bower.php';
require 'app/recipe/grunt.php';

host('107.22.150.147')
	->stage('staging')
	->user('elemarjr')
	->set('deploy_path', '/home/elemarjr')
	->set('http_user', 'www-data');

set('repository', 'git@github.com:ElemarJR/blog_theme.git');
set('branch', 'master');

set('ssh_multiplexing', false);

set('shared_files', [
	'.env'
]);

set('shared_dirs', [
	'web/wp-content/uploads'
]);

set('writable_dirs', [
	'web/wp-content/uploads'
]);

task('deploy:install', function () {
    run('cd {{release_path}} && bin/install');
});

task('deploy:notes', function () {
    writeln('Reload the PHP-FPM manually in the server');
});

task('deploy', [
	'deploy:prepare',
	'deploy:lock',
	'deploy:release',
	'deploy:update_code',
	'deploy:shared', // execute before installation to share .env file
	'npm:install',
	'deploy:vendors',
	'bower:install',
	'grunt:build',
	'deploy:install',
	'deploy:shared', // execute after installation beacause deploy:vendor overwrite the public directory
	'deploy:writable',
	'deploy:clear_paths',
	'deploy:symlink',
	'deploy:unlock',
	'deploy:notes',
	'cleanup',
	'success'
]);
