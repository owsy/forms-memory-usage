<?php

namespace App\Controller;

use App\Form\Type\RootType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FormController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $preFormMemoryUsage = memory_get_peak_usage();

        $data = [
            'locations' => [
                [
                    'subLocations' => array_fill(0, 20, [
                        'buildings' => array_fill(0, 20, [])
                    ]),
                ],
            ],
        ];

        $form = $this->createForm(RootType::class, $data);

        $postFormMemoryUsage = memory_get_peak_usage();

        return $this->render('form/index.html.twig', [
            'form' => $form,
            'pre_form_memory_usage'  => $preFormMemoryUsage,
            'post_form_memory_usage' => $postFormMemoryUsage,
        ]);
    }
}
