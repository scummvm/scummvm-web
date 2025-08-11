<?php
namespace ScummVM\Models;

use ScummVM\OrmObjects\Demo;
use ScummVM\OrmObjects\DemoQuery;

use Propel\Runtime\Collection\Collection;

/**
 * The GameDemosModel class will generate Demo objects.
 */
class GameDemosModel extends BasicModel
{
    /**
     * Get all the groups and their respective demos.
     *
     * @return array<?int, array{'name': string, 'href': ?int, 'demos': Demo[]}>
     */
    public function getAllGroupsAndDemos(): array
    {
        $groupedData = $this->getFromCache();
        if (is_null($groupedData)) {
            $demos = DemoQuery::create()
                ->useGameQuery()
                ->orderByName()
                ->endUse()
            ->find();
            $groupedData =  $this->createGroups($demos);
            $this->saveToCache($groupedData);
        }
        return $groupedData;
    }

    /**
     * @return array<?int, array{'name': string, 'href': ?int, 'demos': Demo[]}>
     */
    private function createGroups(Collection $demos): array
    {
        $groups = [];
        foreach ($demos as $demo) {
            $company = $demo->getGame()->getCompany();

            if ($company === null) {
                $companyName = "Unknown";
            } else {
                $companyName = $company->getName();
            }
            $companyId = $company->getId();
            if (!isset($groups[$companyId])) {
                $groups[$companyId] = [
                    'name' => "$companyName Demos",
                    'href' => $companyId,
                    'demos' => []
                ];
            }

            $groups[$companyId]['demos'][] = $demo;
        }
        \sort($groups);

        $groups['other'] = [
            'name' => "Miscellaneous Demos",
            'href' => 'other',
            'demos' => []
        ];
        foreach ($groups as $key => $group) {
            if (count($groups[$key]['demos']) <= 10) {
                $groups['other']['demos'] = \array_merge($groups['other']['demos'], $groups[$key]['demos']);
                unset($groups[$key]);
            }
        }
        \sort($groups['other']['demos'], SORT_STRING);
        return $groups;
    }
}
