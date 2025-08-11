<?php
namespace ScummVM;

use ScummVM\Pages\SimplePage;

/**
 * Handle uncaught exceptions.
 */
abstract class ExceptionHandler
{
    private static \Throwable $exception;

    /* If the MenuModel cause the exception we need to skip them. */
    public static function skipMenus(): bool
    {
        if (!isset(self::$exception)) {
            return false;
        }

        $e = self::$exception;

        if (basename($e->getFile()) == 'MenuModel.php') {
            return true;
        }

        foreach ($e->getTrace() as $t) {
            if (basename($t['file'] ?? '') == 'MenuModel.php') {
                return true;
            }
        }

        return false;
    }

    /* Handle exceptions. */
    public static function handleException(\Throwable $e): void
    {
        self::$exception = $e;

        $ep = new SimplePage('exception');
        $ep->index($e);
    }
}
