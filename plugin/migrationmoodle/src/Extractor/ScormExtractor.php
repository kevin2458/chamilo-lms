<?php
/* For licensing terms, see /license.txt */

namespace Chamilo\PluginBundle\MigrationMoodle\Extractor;

use Chamilo\PluginBundle\MigrationMoodle\Task\CourseModulesScormTask;

/**
 * Class ScormExtractor.
 *
 * Extractor for scorms already extracted and loaded.
 *
 * @package Chamilo\PluginBundle\MigrationMoodle\Extractor
 */
class ScormExtractor extends FilterExtractor
{
    /**
     * ScormExtractor constructor.
     *
     * @param array $configuration
     */
    public function __construct(array $configuration)
    {
        parent::__construct($configuration);

        $this->calledClass = CourseModulesScormTask::class;
    }

    /**
     * Filter to avoid scorms not yet migrated.
     *
     * @param array $sourceData
     *
     * @return bool
     */
    public function filter(array $sourceData)
    {
        $scormId = $sourceData['scorm'];

        return !$this->existsExtracted($scormId);
    }
}
