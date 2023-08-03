<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProceduresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProceduresTable Test Case
 */
class ProceduresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProceduresTable
     */
    protected $Procedures;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Procedures',
        'app.Procedurerequirements',
        'app.Requests',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Procedures') ? [] : ['className' => ProceduresTable::class];
        $this->Procedures = $this->getTableLocator()->get('Procedures', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Procedures);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ProceduresTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
