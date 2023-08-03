<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequirementproprietiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequirementproprietiesTable Test Case
 */
class RequirementproprietiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RequirementproprietiesTable
     */
    protected $Requirementproprieties;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Requirementproprieties',
        'app.Requirements',
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
        $config = $this->getTableLocator()->exists('Requirementproprieties') ? [] : ['className' => RequirementproprietiesTable::class];
        $this->Requirementproprieties = $this->getTableLocator()->get('Requirementproprieties', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Requirementproprieties);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RequirementproprietiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\RequirementproprietiesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
