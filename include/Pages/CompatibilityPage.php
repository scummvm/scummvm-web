<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\CompatibilityModel;
use ScummVM\Models\VersionsModel;

/**
 * The Compatibility page gets all the data from the CompatibilityModel and
 * either displays the full list of games, or specific details about one
 * game. It defaults to showing the compatibility list of the DEV-version.
 */
class CompatibilityPage extends Controller
{
    private $supportLevel;
    private $supportLevelDescriptions;
    private $supportLevelClass;
    private $versionsModel;
    private $compatibilityModel;

    /* Constructor. */
    public function __construct()
    {
        parent::__construct();

        $this->supportLevel = array(
            'untested' => $this->getConfigVars('compatibilityUntested'),
            'broken' => $this->getConfigVars('compatibilityBroken'),
            'bugged' => $this->getConfigVars('compatibilityBugged'),
            'good' => $this->getConfigVars('compatibilityGood'),
            'excellent' => $this->getConfigVars('compatibilityExcellent')
        );

        $this->supportLevelDescriptions = array(
            'untested' => $this->getConfigVars('compatibilityUntestedDescription'),
            'broken' => $this->getConfigVars('compatibilityBrokenDescription'),
            'bugged' => $this->getConfigVars('compatibilityBuggedDescription'),
            'good' => $this->getConfigVars('compatibilityGoodDescription'),
            'excellent' => $this->getConfigVars('compatibilityExcellentDescription')
        );

        $this->supportLevelClass = array(
            'untested' => 'pctU',
            'broken' => 'pct0',
            'bugged' => 'pct50',
            'good' => 'pct75',
            'excellent' => 'pct100'
        );

        $this->versionsModel = new VersionsModel();
        $this->compatibilityModel = new CompatibilityModel();
    }

    /* Display the index page. */
    public function index($args)
    {
        $version = $args['version'];
        $target = $args['game'];

        $versions = $this->versionsModel->getAllVersions();
        unset($versions['DEV']);

        /* Default to DEV */
        if (!in_array($version, $versions)) {
            $version = 'DEV';
        }

        if (!empty($target)) {
            return $this->getGame($target, $version, $oldLayout);
        } else {
            return $this->getAll($version, $versions, $oldLayout);
        }
    }

    /* We should show detailed information for a specific target. */
    public function getGame($target, $version)
    {
        $game = $this->compatibilityModel->getGameData($version, $target);

        $this->template = 'components/compatibility_details.tpl';

        return $this->renderPage(
            array(
                'title' => preg_replace('/{version}/', $version, $this->getConfigVars('compatibilityTitle')),
                'content_title' => preg_replace(
                    '/{version}/',
                    $version,
                    $this->getConfigVars('compatibilityContentTitle')
                ),
                'version' => $version,
                'game' => $game,
                'support_level_header' => $this->supportLevel,
                'support_level_description' => $this->supportLevelDescriptions,
                'support_level_class' => $this->supportLevelClass
            )
        );
    }

    /* We should show all the compatibility stats for a specific version. */
    public function getAll($version, $versions)
    {

        $filename = DIR_DATA . "/compatibility.yaml";
        $compat_data = $this->compatibilityModel->getAllDataGroups($version);

        $last_updated = filemtime($filename);
        $this->template = 'pages/compatibility.tpl';

        return $this->renderPage(
            array(
                'title' => preg_replace('/{version}/', $version, $this->getConfigVars('compatibilityTitle')),
                'content_title' => preg_replace(
                    '/{version}/',
                    $version,
                    $this->getConfigVars('compatibilityContentTitle')
                ),
                'version' => $version,
                'compat_data' => $compat_data,
                'last_updated' => $last_updated,
                'versions' => $versions,
                'support_level_header' => $this->supportLevel,
                'support_level_description' => $this->supportLevelDescriptions,
                'support_level_class' => $this->supportLevelClass
            )
        );
    }
}
