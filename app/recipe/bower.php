<?php

namespace Deployer;

set('bin/bower', function () {
    return run('which bower');
});

desc('Execute bower install command');
task('bower:install', function () {
    run("cd {{release_path}} && {{bin/bower}} install");
});
