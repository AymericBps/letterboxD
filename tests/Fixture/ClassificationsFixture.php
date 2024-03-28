<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ClassificationsFixture
 */
class ClassificationsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'movie_id' => 1,
                'genre_id' => 1,
                'created' => '2024-03-28 15:36:13',
                'modified' => '2024-03-28 15:36:13',
            ],
        ];
        parent::init();
    }
}
