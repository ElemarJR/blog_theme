<?php

namespace Deployer;

set('bin/grunt', function () {
    return run('which grunt');
});

desc('Execute grunt build task');
task('grunt:build', function () {
    run("cd {{release_path}} && {{bin/grunt}}");
});
