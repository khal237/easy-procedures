<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProcedurerequirementsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProcedurerequirementsTable Test Case
 */
class ProcedurerequirementsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProcedurerequirementsTable
     */
    protected $Procedurerequirements;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Procedurerequirements',
        'app.Procedures',
        'app.Requirements',
        'app.Requestrequirements',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Procedurerequirements') ? [] : ['className' => ProcedurerequirementsTable::class];
        $this->Procedurerequirements = $this->getTableLocator()->get('Procedurerequirements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Procedurerequirements);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ProcedurerequirementsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ProcedurerequirementsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
