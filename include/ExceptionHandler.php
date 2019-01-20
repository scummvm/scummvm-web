<?php
namespace ScummVM;

/** Handle uncaught exceptions. */
abstract class ExceptionHandler
{
    private static $exception;

    /* If the MenuModel cause the exception we need to skip them. */
    public static function skipMenus()
    {
        $skip_menus = false;
        $e = self::$exception;

        if (!is_null($e)) {
            if (basename($e->getFile() == 'MenuModel.php')) {
                $skip_menus = true;
            } else {
                foreach ($e->getTrace() as $t) {
                    if (basename($t['file']) == 'MenuModel.php') {
                        $skip_menus = true;
                        break;
                    }
                }
            }
        }

        return $skip_menus;
    }

    /* Handle exceptions. */
    public static function handleException($e)
    {
        self::$exception = $e;

        $ep = new \ScummVM\Pages\ExceptionsPage();
        return $ep->index($e);
    }
}
