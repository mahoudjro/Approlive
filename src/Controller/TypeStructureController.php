<?php

namespace App\Controller;

use App\Entity\TypeStructure;
use App\Form\TypeStructureType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypeStructureController extends AbstractController
{
    /**
     * @Route("/liste/type-structure", name="liste_type_structure")
     */
    public function listeTypeStructure(Request $request)
    {
        // Liste des types de structure
        $em = $this->getDoctrine()->getManager();

        $listeTypeStructure = $em->getRepository(TypeStructure::class)
                              ->recupererTypeStructure();

        // Ajouter un nouveau type structure
        $typeStructure = new TypeStructure();
        $form = $this->createForm(TypeStructureType::class, $typeStructure);
        $form->handleRequest($request);

        if ($form->isSubmitted() and $form->isValid()) {

            if( $typeStructure->getHrch() == null ){

                $typeStructure->setHrch(null);

            }elseif( $typeStructure->getHrch() != null ){

                $typeStructure->setHrch($typeStructure->getHrch());
            }

            $em->persist($typeStructure);
            $em->flush();

            $this->addFlash('notification','Ajout effectué avec succès');

            return $this->redirectToRoute('liste_type_structure');
        }

        return $this->render('type_structure/liste_type_structure.html.twig',[
            'liste_type_structure' => $listeTypeStructure,
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/modifier/type-structure", name="modifier_type_structure", methods={"GET", "POST"})
     */
    public function modifierTypeStructure(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $id = (int) $request->query->get('id');

        $type = $em->getRepository(TypeStructure::class)->find($id);

        $autreType = $em->getRepository(TypeStructure::class)->recupererAutresTypes($id);

        if ($request->isMethod('POST') ) {

            $idType = (int) $request->request->get('type-id');
            $tousSaufTypeEnCours = $em->getRepository(TypeStructure::class)->recupererTypesEtParent($idType);
            $libelleType = (string) $request->request->get('type-libelle');
            $typeSuperieur = $request->request->get('type-hrch');

            $tousLesTypes = $em->getRepository(TypeStructure::class)->recupererTypesEtParent($idType);

            // Vérification de l'unicité du libellé des types structures
            $trouveLibelle = false ;
            foreach ($tousLesTypes as $typeEnCours){
                if( $typeEnCours->getLibType() == $libelleType ){
                    $trouveLibelle = true;
                    break;
                }
            }

            // Vérification de l'unicité du parent des types structures
            $trouveParent = false ;
            if( $typeSuperieur != '' ) {
                foreach ($tousSaufTypeEnCours as $typeCourant) {

                    if ($typeCourant->getHrch() == null) {
                        $trouveParent = false;
                    } else {
                        if ($typeCourant->getHrch()->getId() == (int)$typeSuperieur) {
                            $trouveParent = true;
                            break;
                        }
                    }
                }
            }

            if($trouveLibelle == true){
                $this->addFlash('notification','Le libellé "'. $libelleType . '" existe déjà.');
            }

            if($trouveParent == true){
                $structSup = $em->getRepository(TypeStructure::class)->find((int)$typeSuperieur);
                $this->addFlash('notification', '"'. $structSup->getLibType() . '" est déjà relié à un autre type structure.');
            }

            if( ($trouveLibelle == true) or ($trouveParent == true) ){
                return $this->redirectToRoute('liste_type_structure');

            }elseif( ($trouveLibelle == false) and ($trouveParent == false) ){

                // Modification du type structure
                $typeModifier = $em->getRepository(TypeStructure::class)->find($idType);
                $typeModifier->setLibType($libelleType);

                if($typeSuperieur == null){
                    $typeModifier->setHrch(null);

                }elseif ($typeSuperieur != null){
                    $typeModifier->setHrch($em->getRepository(TypeStructure::class)->find((int)$typeSuperieur));
                }

                $em->flush();

                $this->addFlash('notification','Modification effectuée avec succès');

                return $this->redirectToRoute('liste_type_structure');
            }
        }

        return $this->render('type_structure/modifier_type_structure.html.twig', [
            'type' => $type,
            'autre_type' => $autreType
        ]);
    }


    /**
     * @Route("/supprimer/type-structure", name="supprimer_type_structure")
     */
    public function supprimerTypeStructure(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        if($request->isXmlHttpRequest()){

            $idType = (int) $request->query->get('idType');

            if( $idType != null ){

                $typeStructure = $em->getRepository(TypeStructure::class)->find($idType);

                $em->remove($typeStructure);
                $em->flush();

                return new Response('succes');

            }else{

                return new Response('erreur');
            }
        }
    }
}
