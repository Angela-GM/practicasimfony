<?php

namespace App\Controller;

use App\Entity\Proveedor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


class ProveedorController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    
    // #[Route('/proveedor', name: 'app_proveedor')]
    // public function index(Proveedor $proveedores): Response
    // {
    //     return $this->render('proveedor/index.html.twig', [
    //         'controller_name' => 'ProveedorController',
    //         'proveedores' => $proveedores->findAll()
    //     ]);
    // }

    // #[Route('/proveedor/{id}', name: 'proveedor_id')]
    // public function allProveedor(Proveedor $proveedor): Response
    // {
    //     dump($proveedor);
    //     return $this->render('proveedor/index.html.twig', [
    //         'controller_name' => 'ProveedorController',
    //         'proveedor' => $proveedor
                
    //     ]);
    // }

    #[Route('/proveedores', name: 'all_proveedor')]
    public function allProveedor(): Response
    {
        $proveedores = $this->em->getRepository(Proveedor::class)->findAll();
       
        return $this->render('proveedor/index.html.twig', [
            'proveedores' => $proveedores
                
        ]);
    }
    
    #[Route('/proveedor/{id}', name: 'proveedor_id')]
    public function findForId($id): Response
    {
        $proveedor = $this->em->getRepository(Proveedor::class)->find($id);
       
        return $this->render('proveedor/proveedor.html.twig', [
            'proveedor' => $proveedor
                
        ]);
    }



    
}
