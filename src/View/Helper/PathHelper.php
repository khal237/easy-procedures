<?php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Path helper
 */
class PathHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected $_defaultConfig = [];
    

    public function base_url(){
        return 'http://' . $_SERVER['HTTP_HOST'] . '/easy-procedures/';
    }


    public function template_path(){
        return $this->base_url() . 'template/';
    } 
    

}
