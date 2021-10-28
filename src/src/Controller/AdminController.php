<?php

namespace App\Controller;

use App\Service\ActivityClient\Client as ActivityClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    const PER_PAGE = 5;
    private ActivityClient $client;

    public function __construct(ActivityClient $client)
    {
        $this->client = $client;
    }

    /**
     * @Route(name="admin_activity", path="/admin/activity/{page<\d+>?1}")
     *
     * @param int $page
     * @return Response
     */
    public function activity(int $page): Response
    {
        $statistics = $this->client->getStatistic($page, self::PER_PAGE);
        return $this->render(
            "activity.html.twig",
            [
                "statistics" => $statistics,
                "total_pages" => ceil($statistics['total_rows'] / self::PER_PAGE),
                "current_page" => $page,
            ]);
    }
}