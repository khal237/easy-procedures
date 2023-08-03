<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequestrequirementproprietiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequestrequirementproprietiesTable Test Case
 */
class RequestrequirementproprietiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RequestrequirementproprietiesTable
     */
    protected $Requestrequirementproprieties;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Requestrequirementproprieties',
        'app.Requirementproprieties',
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
        $config = $this->getTableLocator()->exists('Requestrequirementproprieties') ? [] : ['className' => RequestrequirementproprietiesTable::class];
        $this->Requestrequirementproprieties = $this->getTableLocator()->get('Requestrequirementproprieties', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Requestrequirementproprieties);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RequestrequirementproprietiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\RequestrequirementproprietiesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
