<?php
namespace ScummVM\Pages;

use ScummVM\Controller;
use ScummVM\Models\CompatibilityModel;
use ScummVM\OrmObjects\VersionQuery;

/**
 * The Compatibility page gets all the data from the CompatibilityModel and
 * either displays the full list of games, or specific details about one
 * game. It defaults to showing the compatibility list of the DEV-version.
 */
class CompatibilityPage extends Controller
{
    // Would be useful for PHPStan
    //private const LEVELS = ['untested', 'broken', 'bugged', 'good', 'excellent'];

    /** @var array<value-of<self::LEVELS>, ?string> */
    private array $supportLevel;
    /** @var array<value-of<self::LEVELS>, ?string> */
    private array $supportLevelDescriptions;
    /** @var array<value-of<self::LEVELS>, ?string> */
    private array $supportLevelClass;
    private CompatibilityModel $compatibilityModel;

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

        $this->compatibilityModel = new CompatibilityModel();
    }

    /**
     * Display the index page.
     *
     * @param array{'version'?: string, 'game'?: string} $args
     */
    public function index($args): void
    {
        $version = $args['version'] ?? null;
        $target = $args['game'] ?? null;

        $versions = VersionQuery::create() // @phpstan-ignore method.notFound
            ->orderByMajor('desc')
            ->orderByMinor('desc')
            ->orderByPatch('desc')
            ->select('id')
            ->find()->toArray();

        /* Default to DEV */
        if (!in_array($version, $versions)) {
            $version = 'DEV';
        }

        if (!empty($target)) {
            $this->getGame($target, $version);
        } else {
            $this->getAll($version, $versions);
        }
    }

    /* We should show detailed information for a specific target. */
    public function getGame(string $target, string $version): void
    {
        $game = $this->compatibilityModel->getGameData($version, $target);
        // Redirect to main compatibility page if the requested game doesn't exist
        if ($game->getId() === null) {
            // TODO make this more resilient with support for languages and local domains
            header('Location: https://scummvm.org/compatibility', true, 307);
            die();
        }

        $this->template = 'components/compatibility_details.tpl';

        $this->renderPage(
            array(
                'title' => preg_replace('/{version}/', $version, $this->getConfigVars('compatibilityTitle')),
                'subtitle' => $game->getGame()->getName(),
                'description' => $this->supportLevelDescriptions[$game->getSupport()],
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
    /**
     * @param string[] $versions
     */
    public function getAll(string $version, array $versions): void
    {

        $compat_data = $this->compatibilityModel->getAllDataGroups($version);

        $last_updated = $this->compatibilityModel->getLastUpdated();
        $this->template = 'pages/compatibility.tpl';

        $this->renderPage(
            [
                'title' => preg_replace('/{version}/', $version, $this->getConfigVars('compatibilityTitle')),
                'description' => $this->getConfigVars('compatibilityIntro'),
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
            ]
        );
    }
}
