<?php
/** Handle uncaught exceptions. */
abstract class ExceptionHandler {
	static private $_exception;
	
	/* If the MenuModel cause the exception we need to skip them. */
	static public function skipMenus() {
		$skip_menus = false;
		$e = self::$_exception;

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
	static public function handleException(Exception $e) {
		self::$_exception = $e;

		require_once('Pages/ExceptionsPage.php');
		$ep = new ExceptionsPage();
		return $ep->index($e);
	}
}
?>