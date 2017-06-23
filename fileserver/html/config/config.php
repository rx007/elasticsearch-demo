<?php
$CONFIG = array (
  'instanceid' => 'ocgg7094ugg6',
  'passwordsalt' => 'Y2jEtAK0rLFsp4pVIsoTYilke/IWZH',
  'secret' => 'bxEDa/Ope7oae8WjmnPuhGOzOi4IrB99eZkaC9Va3ut2NgAG',
  'trusted_domains' =>
  array (
    0 => 'www.linux-toys.com',
  ),
  'datadirectory' => '/data',
  'objectstore' =>
  array (
    'class' => 'OC\\Files\\ObjectStore\\S3',
    'arguments' =>
    array (
      'bucket' => 'nextcloud',
      'autocreate' => true,
      'key' => 'accessKey1',
      'secret' => 'verySecretKey1',
      'hostname' => 'minio',
      'port' => 8000,
      'use_ssl' => false,
      'region' => 'us-east-1',
      'use_path_style' => true,
    ),
  ),
  'overwrite.cli.url' => 'http://127.0.0.1/',
  'dbtype' => 'mysql',
  'version' => '12.0.0.29',
  'dbname' => 'nextcloud',
  'dbhost' => 'mysql',
  'dbport' => '',
  'dbtableprefix' => 'oc_',
  'dbuser' => 'root',
  'dbpassword' => 'sql',
  'logtimezone' => 'UTC',
  'installed' => true,
  'updater.secret' => '$2y$10$GUWX/YDUYdWxxprA5seLXepH40If6PvAEP53jLEy0f2R2eFYn1n0a',
  'theme' => '',
  'filelocking.enabled' => false,
  'loglevel' => 0,
  'maintenance' => false,
);
