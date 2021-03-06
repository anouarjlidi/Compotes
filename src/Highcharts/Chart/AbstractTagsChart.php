<?php

declare(strict_types=1);

/*
 * This file is part of the Compotes package.
 *
 * (c) Alex "Pierstoval" Rock <pierstoval@gmail.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Highcharts\Chart;

use App\Entity\Operation;

abstract class AbstractTagsChart extends AbstractChart
{
    /** @var Operation[] */
    protected array $operations = [];

    /**
     * @param Operation[] $operations
     */
    public function __construct(array $operations)
    {
        foreach ($operations as $operation) {
            $this->addOperation($operation);
        }
    }

    protected function getOptions(): array
    {
        return [
            'chart' => [
                'type' => $type = 'column',
                'height' => 500,
            ],
            'legend' => [
                'align' => 'right',
                'layout' => 'vertical',
            ],
            'title' => ['text' => $this->getName()],
            'xAxis' => [
                'categories' => ['Tags'],
            ],
            'yAxis' => [
                'title' => ['text' => 'Total amount with each tags'],
            ],
            'plotOptions' => [
                $type => [
                    'pointWidth' => 25,
                    'borderWidth' => 0,
                    'groupPadding' => 0.01,
                ],
            ],
        ];
    }

    private function addOperation(Operation $operation): void
    {
        $this->operations[] = $operation;
    }
}
