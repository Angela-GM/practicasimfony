<?php

namespace App\Controller;

// use Amp\Http\Client\Request;
use App\Entity\Proveedor;
use App\Entity\Tipo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;



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

    #[Route('/', name: 'all_proveedor')]
    public function allProveedor(): Response
    {
        $proveedores = $this->em->getRepository(Proveedor::class)->findAll();
       
        return $this->render('proveedor/index.html.twig', [
            'proveedores' => $proveedores
                
        ]);
    }
    
    #[Route('/proveedor/view/{id}', name: 'proveedor_id')]
    public function findForId($id): Response
    {
        $proveedor = $this->em->getRepository(Proveedor::class)->find($id);
        $custom_proveedor = $this->em->getRepository(Proveedor::class)->findProveedor($id);
       
        return $this->render('proveedor/proveedor.html.twig', [
            'proveedor' => $proveedor,
            'custom_proveedor' => $custom_proveedor
                
        ]);
    }

    #[Route('/proveedor/create', name: 'create_proveedor')]
    public function createProveedor(){
        $tipos = $this->em->getRepository(Tipo::class)->findAll();

       
        return $this->render('proveedor/formulario.html.twig', [
            'action' => 'Crear',
            'tipos' => $tipos
 
                
        ]);
       
        
    }
    #[Route('/proveedor/edit/{id}', name: 'edit_proveedor')]
    public function editProveedor($id){
        $proveedor = $this->em->getRepository(Proveedor::class)->findProveedor($id); 
        $tipo = $proveedor['tipo_id'];        
        
        $tipos = $this->em->getRepository(Tipo::class)->findAll($id);
  
        return $this->render('proveedor/formulario.html.twig', [
            'action' => 'Editar',
            'proveedor' => $proveedor,
            'id' => $id,
            'tipos' => $tipos,
            'tipo' => $tipo,
                
        ]);
       
        
    }

    #[Route('/proveedor/save', name: 'save_proveedor')]
    public function saveProveedor():Response{
        // print_r($_POST);
        // die();
        $proveedor = new Proveedor(nombre: $_POST['nombre'], correo: $_POST['correo'], telefono: $_POST['telefono'], activo: 1, tipo: $_POST['tipo']);
        // $proveedor = new Proveedor(nombre: 'este no', correo: 'correo@correo.com', telefono: '123456789', activo: 1, tipo: 2);
        $tipo = $this->em->getRepository(Tipo::class)->findOneBy(['id' => 1]); 
        $proveedor->setTipo($tipo);
        // $nombre = addslashes($_POST['nombre']);
        // $proveedor->setNombre($nombre);
        // $proveedor->setNombre('Nuevo proveedor');
        // $proveedor->setCorreo('Correo 1');
        // $proveedor->setTelefono('Telefono 1');
        // $proveedor->setTipo($tipo);
        // $proveedor->setFechaCreacion(new \DateTime());
        // $proveedor->setFechaActualizacion(new \DateTime());
        // $fecha_actualizacion = new \DateTime();
        $this->em->persist($proveedor);
        $this->em->flush();

        return new JsonResponse([
            'status' => 'ok',
            'message' => 'Proveedor creado correctamente',
            'proveedor' => $proveedor
        ]);



        
    }

    



    
}
