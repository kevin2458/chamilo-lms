<?php

/* For licensing terms, see /license.txt */

namespace Chamilo\CourseBundle\Repository;

use Chamilo\CoreBundle\Entity\Resource\ResourceInterface;
use Chamilo\CoreBundle\Repository\ResourceRepository;
use Chamilo\CoreBundle\Repository\ResourceWithLinkInterface;
use Symfony\Component\Routing\RouterInterface;

final class CLpCategoryRepository extends ResourceRepository implements ResourceWithLinkInterface
{
    public function getLink(ResourceInterface $resource, RouterInterface $router, $extraParams = []): string
    {
        $params = [
            'id' => $resource->getResourceIdentifier(),
            'name' => 'lp/lp_controller.php',
            'action' => 'view_category',
        ];
        if (!empty($extraParams)) {
            $params = array_merge($params, $extraParams);
        }

        return $router->generate('legacy_main', $params);
    }
}
