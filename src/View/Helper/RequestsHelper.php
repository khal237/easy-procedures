<?php

declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;

/**
 * Path helper
 */
class RequestsHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected $_defaultConfig = [];

    /**
     * Get a Request requirement by requirement id
     */
    public function getRequestRequirement(string|int $proc_req_id, array|null $request_requirements)
    {
        if (empty($request_requirements)) {
            return null;
        }

        $requestRequirement = array_filter($request_requirements, function ($rr) use ($proc_req_id) {
            return $rr->procedurerequirement_id == $proc_req_id;
        });

        return count($requestRequirement) > 0 ? reset($requestRequirement) : null;
    }

    
    public function getPropertyValue($requirementpropriety_id, $requestrequirementproprieties)
    {
        if (empty($requestrequirementproprieties)) {
            return null;
        }
    
        $properties = array_filter($requestrequirementproprieties, function ($property) use ($requirementpropriety_id) {
            return $property->requirementpropriety_id == $requirementpropriety_id;
        });
    
        return count($properties) > 0 ? reset($properties)->value : null;
    }
}
