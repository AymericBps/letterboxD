<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClassificationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClassificationsTable Test Case
 */
class ClassificationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClassificationsTable
     */
    protected $Classifications;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Classifications',
        'app.Movies',
        'app.Genres',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Classifications') ? [] : ['className' => ClassificationsTable::class];
        $this->Classifications = $this->getTableLocator()->get('Classifications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Classifications);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ClassificationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ClassificationsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
