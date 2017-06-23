<?php
$CONFIG = array (
  'instanceid' => 'oc0q372pmlr0',
  'passwordsalt' => '8h8sDVbauaYb+aKjvLcKs94kfCT3Gj',
  'secret' => 'U6/sYrUp77va+JZN9cehlLKfvdhHOyNlOY9uCkPofGDUJrln',
  'trusted_domains' =>
  array (
    0 => '127.0.0.1',
  ),
  'datadirectory' => '/var/www/html/data',
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
      'port' => 9000,
      'use_ssl' => false,
      'region' => 'us-east-1',
      'use_path_style' => true,
    ),
  ),
  'overwrite.cli.url' => 'http://127.0.0.1',
  'dbtype' => 'mysql',
  'version' => '12.0.0.29',
  'dbname' => 'nextcloud',
  'dbhost' => 'mysql',
  'dbport' => '',
  'dbtableprefix' => 'oc_',
  'dbuser' => 'oc_admin2',
  'dbpassword' => 'PX9Px0b6CUUhdTpu5/hqBa99oh+XKg',
  'installed' => true,
);
