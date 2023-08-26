<?php

namespace App\Controller;

// use Amp\Http\Client\Request;
use App\Entity\Proveedor;
use App\Entity\Tipo;
use App\Form\ProveedorType;
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

    // Crear proveedor con formulario
    #[Route('/newcreate/proveedor', name: 'newcreate_proveedor')]
    public function index(Request $request): Response
    {
        // $proveedor = new Proveedor();
        $form = $this->createForm(ProveedorType::class);
        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid() ){
            $proveedor = $form->getData();
            $this->em->persist($proveedor);
            $this->em->flush();
            return $this->redirectToRoute('newcreate_proveedor');
        }
        return $this->render('proveedor/form2.html.twig', [
            'form' => $form->createView()
            
        ]);
    }

    // Editar proveedor con formulario
    #[Route('/edit/proveedor/{id}', name: 'edit_proveedor_form')]
    public function editProveedorForm(Request $request, $id): Response
    {
        $proveedor = $this->em->getRepository(Proveedor::class)->find($id);
        $form = $this->createForm(ProveedorType::class, $proveedor);
        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid() ){
            $proveedor = $form->getData();
            $this->em->persist($proveedor);
            $this->em->flush();
            return $this->redirectToRoute('all_proveedor');
        }
        return $this->render('proveedor/form2.html.twig', [
            'form' => $form->createView()
            
        ]);
    }

    // Mostrar todos los proveedores
    #[Route('/', name: 'all_proveedor')]
    public function allProveedor(): Response
    {
        $proveedores = $this->em->getRepository(Proveedor::class)->findAll();
       
        return $this->render('proveedor/index.html.twig', [
            'proveedores' => $proveedores
                
        ]);
    }
    
    // Mostrar proveedor por id
    #[Route('/proveedor/view/{id}', name: 'proveedor_id')]
    public function findForId($id): Response
    {
        $proveedor = $this->em->getRepository(Proveedor::class)->find($id);
        // $custom_proveedor = $this->em->getRepository(Proveedor::class)->findProveedor($id);
       
        return $this->render('proveedor/proveedor.html.twig', [
            'proveedor' => $proveedor,
            // 'custom_proveedor' => $custom_proveedor
                
        ]);
    }


    // #[Route('/proveedor/create', name: 'create_proveedor')]
    // public function createProveedor(){
    //     $tipos = $this->em->getRepository(Tipo::class)->findAll();

       
    //     return $this->render('proveedor/formulario.html.twig', [
    //         'action' => 'Crear',
    //         'tipos' => $tipos
 
                
    //     ]);
       
        
    // }
    // #[Route('/proveedor/edit/{id}', name: 'edit_proveedor')]
    // public function editProveedor($id){
    //     $proveedor = $this->em->getRepository(Proveedor::class)->findProveedor($id); 
    //     $tipo = $proveedor['tipo_id'];        
        
    //     $tipos = $this->em->getRepository(Tipo::class)->findAll($id);
  
    //     return $this->render('proveedor/formulario.html.twig', [
    //         'action' => 'Editar',
    //         'proveedor' => $proveedor,
    //         'id' => $id,
    //         'tipos' => $tipos,
    //         'tipo' => $tipo,
                
    //     ]);
       
        
    // }

    // #[Route('/proveedor/save', name: 'save_proveedor')]
    // public function saveProveedor():Response{
    //     // print_r($_POST);
    //     // die();
    //     $proveedor = new Proveedor(nombre: $_POST['nombre'], correo: $_POST['correo'], telefono: $_POST['telefono'], activo: 1, tipo: $_POST['tipo']);
    //     // $proveedor = new Proveedor(nombre: 'este no', correo: 'correo@correo.com', telefono: '123456789', activo: 1, tipo: 2);
    //     $tipo = $this->em->getRepository(Tipo::class)->findOneBy(['id' => 1]); 
    //     $proveedor->setTipo($tipo);
    //     // $nombre = addslashes($_POST['nombre']);
    //     // $proveedor->setNombre($nombre);
    //     // $proveedor->setNombre('Nuevo proveedor');
    //     // $proveedor->setCorreo('Correo 1');
    //     // $proveedor->setTelefono('Telefono 1');
    //     // $proveedor->setTipo($tipo);
    //     // $proveedor->setFechaCreacion(new \DateTime());
    //     // $proveedor->setFechaActualizacion(new \DateTime());
    //     // $fecha_actualizacion = new \DateTime();
    //     $this->em->persist($proveedor);
    //     $this->em->flush();

    //     return new JsonResponse([
    //         'status' => 'ok',
    //         'message' => 'Proveedor creado correctamente',
    //         'proveedor' => $proveedor
    //     ]);



       



        
    // }

    



    
}
