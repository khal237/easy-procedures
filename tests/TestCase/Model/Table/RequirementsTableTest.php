<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequirementsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequirementsTable Test Case
 */
class RequirementsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RequirementsTable
     */
    protected $Requirements;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Requirements',
        'app.Requirementtypes',
        'app.Procedurerequirements',
        'app.Requirementproprieties',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Requirements') ? [] : ['className' => RequirementsTable::class];
        $this->Requirements = $this->getTableLocator()->get('Requirements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Requirements);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RequirementsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\RequirementsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
