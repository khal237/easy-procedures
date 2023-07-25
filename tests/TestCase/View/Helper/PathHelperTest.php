<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Helper;

use App\View\Helper\PathHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\PathHelper Test Case
 */
class PathHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\View\Helper\PathHelper
     */
    protected $Path;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->Path = new PathHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Path);

        parent::tearDown();
    }
}
