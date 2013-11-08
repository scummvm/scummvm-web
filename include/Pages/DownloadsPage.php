<?php
require_once('Controller.php');
require_once('Models/DownloadsModel.php');

class DownloadsPage extends Controller {
	private $_template;

	/* Constructor. */
	public function __construct() {
		parent::__construct();
		$this->_template = 'downloads.tpl';
	}

	function getRecommendedDownloadsJS(&$downloads) {
		$js = "var versions = {\n";
		
		foreach ($downloads as $dsection) {
			foreach ($dsection->getSubSections() as $dsubsection) {
				foreach ($dsubsection->getItems() as $curItem) {
					$userAgent = $curItem->getUserAgent();
					
					if ($userAgent != "") {
						$url = str_replace('{$release}', RELEASE, $curItem->getURL());
						sscanf($url, "http://prdownloads.sourceforge.net/scummvm/scummvm-%s", $versionStr);
						$version = substr($versionStr, 0, strpos($versionStr, "-"));
						$name = strip_tags($curItem->getName());
						$js .= "\t\t\t'{$userAgent}':\t{ 'os':\t'{$name}', 'ver':\t'{$version}', 'desc':\t'{$curItem->getExtraInfo()}', 'url':\t'{$url}'},\n";
					}
				}
			}
		}
		$js .= "};\n";
		
		return $js;
	}
	
	/* Display the index page. */
	public function index() {
		$downloads = DownloadsModel::getAllDownloads();
		$sections = DownloadsModel::getAllSections();
		$recommendedDownloadsJS = $this->getRecommendedDownloadsJS($downloads);

		$this->addCSSFiles('downloads.css');
		return $this->renderPage(
			array(
				'title' => 'Downloads',
				'content_title' => 'Download ScummVM',
				'downloads' => $downloads,
				'sections' => $sections,
				'release_tools' => RELEASE_TOOLS,
				'release_debian' => RELEASE_DEBIAN,
				'recommendedDownloadsJS' => $recommendedDownloadsJS
			),
			$this->_template
		);
	}
}
?>
