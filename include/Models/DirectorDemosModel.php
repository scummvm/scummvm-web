<?php
namespace ScummVM\Models;

use ScummVM\OrmObjects\DirectorDemo;
use ScummVM\OrmObjects\DirectorDemoQuery;

use Propel\Runtime\Collection\Collection;

/**
 * The DirectorDemosModel class will generate DirectorDemos objects.
 */
class DirectorDemosModel extends BasicModel
{
    /**
     * Get all the groups and their respective demos.
     *
     * @return array<?int, array{'name': string, 'href': ?int, 'demos': DirectorDemo[]}>
     */
    public function getAllGroupsAndDemos(): array
    {
        $groupedData = $this->getFromCache();
        if (is_null($groupedData)) {
            $demos = DirectorDemoQuery::create()
                ->orderByVersion()
                ->orderByTitle()
                ->find();
            $groupedData =  $this->createGroups($demos);
            $this->saveToCache($groupedData);
        }
        return $groupedData;
    }

    /**
     * @return array<?int, array{'name': string, 'href': ?int, 'demos': DirectorDemo[]}>
     */
    private function createGroups(Collection $demos): array
    {
        $groups = [];
        foreach ($demos as $demo) {
            $version = $demo->getVersion();
            if (!isset($groups[$version])) {
                $groups[$version] = [
                    'name' => "Version $version Demos",
                    'href' => $version,
                    'demos' => []
                ];
            }

            $groups[$version]['demos'][] = $demo;
        }

        return $groups;
    }
}
