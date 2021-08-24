<?php
namespace ScummVM\Models;

use ScummVM\OrmObjects\DirectorDemoQuery;

/**
 * The DirectorDemosModel class will generate DirectorDemos objects.
 */
class DirectorDemosModel extends BasicModel
{
    /* Get all the groups and their respective demos. */
    public function getAllGroupsAndDemos()
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

    private function createGroups($demos)
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
