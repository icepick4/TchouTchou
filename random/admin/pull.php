<?php echo shell_exec( 'cd /var/www/sae-sncf; git reset --hard origin/prod; git clean -d -f; git pull https://gitlab-ci-token:glpat-wFygfmCs9RddfneY2Zvo@forge.univ-lyon1.fr/p2103642/sae-sncf.git main'); ?>

