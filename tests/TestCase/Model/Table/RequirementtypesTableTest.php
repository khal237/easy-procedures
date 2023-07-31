<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequirementtypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequirementtypesTable Test Case
 */
class RequirementtypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RequirementtypesTable
     */
    protected $Requirementtypes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Requirementtypes',
        'app.Requirements',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Requirementtypes') ? [] : ['className' => RequirementtypesTable::class];
        $this->Requirementtypes = $this->getTableLocator()->get('Requirementtypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Requirementtypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RequirementtypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
