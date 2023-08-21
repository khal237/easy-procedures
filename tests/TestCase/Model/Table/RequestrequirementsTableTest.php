<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequestrequirementsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequestrequirementsTable Test Case
 */
class RequestrequirementsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RequestrequirementsTable
     */
    protected $Requestrequirements;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Requestrequirements',
        'app.Procedurerequirements',
        'app.Requests',
        'app.Requestrequirementproprieties',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Requestrequirements') ? [] : ['className' => RequestrequirementsTable::class];
        $this->Requestrequirements = $this->getTableLocator()->get('Requestrequirements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Requestrequirements);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RequestrequirementsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\RequestrequirementsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
