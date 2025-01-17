<?php

namespace Laravel\Vapor\Runtime;

class StorageDirectories
{
    /**
     * The storage path for the execution environment.
     *
     * @var string
     */
    public const PATH = '/tmp/storage';

    /**
     * Ensure the necessary storage directories exist.
     *
     * @return void
     */
    public static function create()
    {
        $directories = [
            self::PATH.'/app/public',
            self::PATH.'/logs',
            self::PATH.'/temp/builds',
            self::PATH.'/cms/cache',
            self::PATH.'/cms/twig',
            self::PATH.'/cms/combiner/assets',
            self::PATH.'/bootstrap/cache',
            self::PATH.'/framework/testing/disks',
            self::PATH.'/framework/cache',
            self::PATH.'/framework/sessions',
            self::PATH.'/framework/views',
        ];

        foreach ($directories as $directory) {
            if (! is_dir($directory)) {
                echo "Creating storage directory: $directory".PHP_EOL;

                mkdir($directory, 0755, true);
            }
        }
    }
}
