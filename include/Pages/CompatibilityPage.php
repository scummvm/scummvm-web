<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\CompatibilityModel;
use ScummVM\Models\LegacyCompatibilityModel;
use ScummVM\Models\VersionsModel;
use ScummVM\Objects\LegacyCompatGame;
use Composer\Semver\Comparator;

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
    }

    /* Display the index page. */
    public function index($args)
    {
        $version = $args['version'];
        $target = $args['game'];

        $versions = VersionsModel::getAllVersions();
        unset($versions['DEV']);

        /* Default to DEV */
        if (!in_array($version, $versions)) {
            $version = 'DEV';
        }

        // Remove versions with no compat file that don't use the new model
        $legacyModelVersions = LegacyCompatibilityModel::getAllVersions();
        foreach($versions as $key => $ver) {
            if (Comparator::greaterThanOrEqualTo($ver, COMPAT_NEW_MODEL)) {
                continue;
            }

            if (!array_key_exists($key, $legacyModelVersions)) {
                unset($versions[$key]);
            }
        }

        if ($version === 'DEV' || (Comparator::greaterThanOrEqualTo($version, COMPAT_LAYOUT_CHANGE))) {
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
        $compareVersion = $version === 'DEV' ? '9.9.9' : $version;
        if (Comparator::lessThan($compareVersion, COMPAT_NEW_MODEL)) {
            $game = LegacyCompatibilityModel::getGameData($version, $target);
        } else {
            $game = CompatibilityModel::getGameData($version, $target);
        }

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
                'game' => $game->toLegacyCompatGame(),
                'old_layout' => $oldLayout,
                'support_level_header' => $this->supportLevel,
                'support_level_description' => $this->supportLevelDescriptions,
                'support_level_class' => $this->supportLevelClass
            )
        );
    }

    /* We should show all the compatibility stats for a specific version. */
    public function getAll($version, $versions, $oldLayout)
    {
        /* Remove the current version from the versions array. */
        if ($version !== 'DEV') {
            $key = array_search($version, $versions);
            unset($versions[$key]);
        }

        $compareVersion = $version === 'DEV' ? '9.9.9' : $version;
        if (Comparator::lessThan($compareVersion, COMPAT_NEW_MODEL)) {
            $filename = DIR_COMPAT . "/compat-{$version}.xml";
            $compat_data = LegacyCompatibilityModel::getAllData($version);
        } else {
            $filename = DIR_DATA . "/compatibility.yaml";
            $compat_data = [];
            $data = CompatibilityModel::getAllData($version);

            foreach ($data as $compat) {
                $engine = $compat->getGame()->getEngine();
                $company = $compat->getGame()->getCompany();

                if ($engine->getEnabled()) {
                    $engineName = $engine->getName();
                    if (is_string($company)) {
                        $companyName = "Unknown";
                    } else {
                        $companyName = $company->getName();
                    }
                    if (!array_key_exists($companyName, $compat_data)) {
                        $compat_data[$companyName] = [];
                    }

                    $compat_data[$companyName][] = $compat->toLegacyCompatGame();

                }
            }
            $compat_data['Other'] = [];
            foreach ($compat_data as $key => $company) {
                \usort($compat_data[$key], array($this,"compatibilitySorter"));
                if (count($compat_data[$key]) < 3) {
                    $compat_data['Other'] = \array_merge($compat_data['Other'], $company);
                    unset($compat_data[$key]);
                }
            }
            \usort($compat_data['Other'], array($this,"compatibilitySorter"));
        }

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
                'old_layout' => $oldLayout,
                'support_level_header' => $this->supportLevel,
                'support_level_description' => $this->supportLevelDescriptions,
                'support_level_class' => $this->supportLevelClass
            )
        );
    }

    private function compatibilitySorter($compat1, $compat2)
    {
        return strnatcmp($compat1->getName(), $compat2->getName());
    }
}
