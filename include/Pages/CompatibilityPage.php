<?php
require_once('Controller.php');
require_once('Models/CompatibilityModel.php');
/**
 * The Compatibility page gets all the data from the CompatibilityModel and
 * either displays the full list of games, or specific details about one
 * game. It defaults to showing the compatibility list of the DEV-version.
 */
class CompatibilityPage extends Controller {
	private $_template;
	private $_template_details;

	/* Constructor. */
	public function __construct() {
		parent::__construct();
		$this->_template = 'compatibility.tpl';
		$this->_template_details = 'compatibility_details.tpl';
	}

	/* Display the index page. */
	public function index() {
		$version = (!empty($_GET['v']) ? $_GET['v'] : 'DEV');
		$target = $_GET['t'];

		if (!empty($target)) {
			return $this->getGame($target, $version);
		} else {
			return $this->getAll($version);
		}
	}

	/* We should show detailed information for a specific target. */
	public function getGame($target, $version) {
		$game = CompatibilityModel::getGameData($version, $target);

		$this->addCSSFiles(array('chart.css', 'compatibility.css'));
		return $this->renderPage(
			array(
				'title' => "Compatibility - {$version}",
				'content_title' => "{$version} Compatibility",
				'version' => $version,
				'game' => $game,
			),
			$this->_template_details
		);
	}

	/* We should show all the compatibility stats for a specific version. */
	public function getAll($version) {
		/* Default to DEV */
		$versions = CompatibilityModel::getAllVersions();
		if (!in_array($version, $versions)) {
			$version = 'DEV';
		}
		/* Remove the current version from the versions array. */
		if ($version != 'DEV') {
			$key = array_search($version, $versions);
			unset($versions[$key]);
		}
		$filename = DIR_COMPAT . "/compat-{$version}.xml";
		$last_updated = date("F d, Y", @filemtime($filename));
		$compat_data = CompatibilityModel::getAllData($version);

		$this->addCSSFiles(array('chart.css', 'compatibility.css'));
		return $this->renderPage(
			array(
				'title' => "Compatibility - {$version}",
				'content_title' => "{$version} Compatibility",
				'version' => $version,
				'compat_data' => $compat_data,
				'last_updated' => $last_updated,
				'versions' => $versions,
			),
			$this->_template
		);
	}
}
?>
