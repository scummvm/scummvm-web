<?php
require_once('Controller.php');
require_once('Models/CompatibilityModel.php');
/**
 * The Compatibility page gets all the data from the CompatibilityModel and
 * either displays the full list of games, or specific details about one
 * game. It defaults to showing the compatibility list of the DEV-version.
 */
class CompatibilityPage extends Controller
{
    private $_template;
    private $_template_details;
    private $_supportLevelDesc;
    private $_supportLevelClass;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();
        global $Smarty;
        $this->_template = 'pages/compatibility.tpl';
        $this->_template_details = 'components/compatibility_details.tpl';
        $this->_supportLevelDesc = array(
            'untested' => $Smarty->getConfigVars('compatibilityUntested'),
            'broken' => $Smarty->getConfigVars('compatibilityBroken'),
            'bugged' => $Smarty->getConfigVars('compatibilityBugged'),
            'good' => $Smarty->getConfigVars('compatibilityGood'),
            'excellent' => $Smarty->getConfigVars('compatibilityExcellent')
        );
        $this->_supportLevelClass = array(
            'untested' => 'pctU',
            'broken' => 'pct0',
            'bugged' => 'pct50',
            'good' => 'pct75',
            'excellent' => 'pct100'
        );
    }

    /* Display the index page. */
    public function index()
    {
        $version = (!empty($_GET['v']) ? $_GET['v'] : 'DEV');
        $target = $_GET['t'];

        /* Default to DEV */
        $versions = CompatibilityModel::getAllVersions();
        if (!in_array($version, $versions)) {
            $version = 'DEV';
        }

        if ($version === 'DEV' || (CompatibilityModel::compareVersions($version, COMPAT_LAYOUT_CHANGE) >= 0)) {
            $oldLayout = 'no';
        } else {
            $oldLayout = 'yes';
        }

        if (!empty($target)) {
            return $this->getGame($target, $version, $oldLayout);
        } else {
            return $this->getAll($version, $versions, $oldLayout);
        }
    }

    /* We should show detailed information for a specific target. */
    public function getGame($target, $version, $oldLayout)
    {
        $game = CompatibilityModel::getGameData($version, $target);
        global $Smarty;
        
        return $this->renderPage(
            array(
                'title' => preg_replace('/{version}/', $version, $Smarty->getConfigVars('compatibilityTitle')),
                'content_title' => preg_replace('/{version}/', $version, $Smarty->getConfigVars('compatibilityContentTitle')),
                'version' => $version,
                'game' => $game,
                'old_layout' => $oldLayout,
                'support_level_desc' => $this->_supportLevelDesc,
                'support_level_class' => $this->_supportLevelClass
            ),
            $this->_template_details
        );
    }

    /* We should show all the compatibility stats for a specific version. */
    public function getAll($version, $versions, $oldLayout)
    {
        /* Remove the current version from the versions array. */
        if ($version != 'DEV') {
            $key = array_search($version, $versions);
            unset($versions[$key]);
        }
        $filename = DIR_COMPAT . "/compat-{$version}.xml";
        $last_updated = date("F d, Y", @filemtime($filename));
        $compat_data = CompatibilityModel::getAllData($version);

        global $Smarty;
        
        return $this->renderPage(
            array(
                'title' => preg_replace('/{version}/', $version, $Smarty->getConfigVars('compatibilityTitle')),
                'content_title' => preg_replace('/{version}/', $version, $Smarty->getConfigVars('compatibilityContentTitle')),
                'version' => $version,
                'compat_data' => $compat_data,
                'last_updated' => $last_updated,
                'versions' => $versions,
                'old_layout' => $oldLayout,
                'support_level_desc' => $this->_supportLevelDesc,
                'support_level_class' => $this->_supportLevelClass
            ),
            $this->_template
        );
    }
}
