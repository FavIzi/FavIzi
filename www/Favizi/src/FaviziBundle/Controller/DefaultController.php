<?php



namespace FaviziBundle\Controller;


use FaviziBundle\Entity\Utilisateur;
use FaviziBundle\Entity\Item;
use FaviziBundle\Entity\ItemPublic;
use FaviziBundle\Entity\ItemPrive;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FaviziBundle:Default:index.html.twig');
    }
	
	
	public function confirmUser( $pseudo , $pass)
	{
		$repository = $this ->getDoctrine() ->getManager() ->getRepository('FaviziBundle:Utilisateur');
		$user = $repository->findOneBy(array('pseudo' => $pseudo ));
		
		//si le pseudo est invalide
		if ( $user == null )
			return false;
		
		//si le password est valide on retourne OK
		if ( $user->getPassword() == $pass)
			return true;
		
		return false;
	}
	
	
	
	
	
	
	
	
	//retourn l'item créé
	public function createItem( $pseudo , $URL  , $nom)
	{
		$em = $this->getDoctrine()->getManager();
		$repository = $this ->getDoctrine() ->getManager() ->getRepository('FaviziBundle:Utilisateur');
		$user = $repository->findOneBy(array('pseudo' => $pseudo ));
		
		//création de l'item parent
		$item = new Item;
		
		
		$item->setNom( $nom );
		$item->setURL( str_replace( "::" , "/" , $URL ) );
		$item->setDateCreation( new \DateTime() );
		
		//fait les liens tsaéllou
		$item->setUtilisateur( $user );
		$user->addItem( $item );
		
		
		$em->persist($item);
		
		
		$em->flush();
		
		return $item;
	}
	
	
	
	//retourn l'item créé
	public function createPrivateItem( $pseudo , $URL  , $nom)
	{
		$em = $this->getDoctrine()->getManager();
		
		//cré l'item parent
		$item = $this->createItem( $pseudo , $URL  , $nom );
		
		
		$itemPrive = new ItemPrive;
		
		//établissement des liens
		$itemPrive->setItem( $item );
		$item->setItemPrive( $itemPrive );
		
		
		
		$em->persist($item);
		$em->persist($itemPrive);
		
		
		$em->flush();
	}
	
	
	
	public function createPublicItem( $pseudo , $URL  , $nom)
	{
		$em = $this->getDoctrine()->getManager();
		
		//cré l'item parent
		$item = $this->createItem( $pseudo , $URL  , $nom );
		
		$itemPublic = new ItemPublic;
		
		//établissement des liens
		$itemPublic->setItem( $item );
		$item->setItemPublic( $itemPublic );
		
		
		
		$em->persist($item);
		$em->persist($itemPublic);
		
		$em->flush();
	}
	
	
	
	
	
	
	
	public function deleteItem( $idItem )
	{
		
		$em = $this->getDoctrine()->getManager();
		$repository = $this ->getDoctrine() ->getManager() ->getRepository('FaviziBundle:Item');
		$item = $repository->find( $idItem );
		
		if ( $item == null )
			return -1;
		
		//si item publique
		$itemPub = $item->getItemPublic();
		if ( ! $itemPub == null )
		{
			$item->getItemPublic ( );
			$em->remove($itemPub);
		}
		
		
		//si item privé
		$itemPriv = $item->getItemPrive();
		if ( ! $itemPriv == null )
		{
			$item->supprItemPrive ( );
			$em->remove($itemPriv);
		}
		
		
		
		
		
		$em->remove($item);
		$em->flush();
	}
	
	
	
	
	
	/******************************************************************************************************************************************************************************************
	**** WEBSERVICE ***** WEBSERVICE ***** WEBSERVICE ***** WEBSERVICE ***** WEBSERVICE ***** WEBSERVICE ***** WEBSERVICE ***** WEBSERVICE ***** WEBSERVICE ***** WEBSERVICE ***** WEBSERVICE *
	*******************************************************************************************************************************************************************************************/
	
	
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// Les / des URL doivent etre remplacés par des ::
	
	
	
	
    public function confirm_loginAction( $pseudo , $pass)
    {
		
		if ( $this->confirmUser( $pseudo , $pass) )
		{
			return $this->render('FaviziBundle:Default:empty.html.twig' , array('message'  => "OK")   );
		}
		
        return $this->render('FaviziBundle:Default:empty.html.twig' , array('message'  => "No")   );
    }
	
	
	
	public function add_ItemAction ( $pseudo , $pass , $URL , $nom , $prive , $idCategory)
	{
		//confirme que l'utilisateur est bien loggé	
		if ( ! $this->confirmUser( $pseudo , $pass) )
		{
			return $this->render('FaviziBundle:Default:empty.html.twig' , array('message'  => "Wrong user !")   );
		}
		
		//crée prive / publique
		if ( $prive == "1")
		{
			$this->createPrivateItem( $pseudo , $URL , $nom );
		}
		else
		{
			$this->createPublicItem( $pseudo , $URL , $nom );
		}
		
		
		//si id category = -1 , insère à la catégory defaut
			
		
		
		
			return $this->render('FaviziBundle:Default:empty.html.twig' , array('message'  => "OK")   );
		
	}
	
	
	
	
	public function delete_itemAction( $pseudo , $pass , $idItem )
	{
			//confirme que l'utilisateur est bien loggé	
		if ( ! $this->confirmUser( $pseudo , $pass) )
		{
			return $this->render('FaviziBundle:Default:empty.html.twig' , array('message'  => "Wrong user !")   );
		}
		
		$this->deleteItem( $idItem );
		
		
		return $this->render('FaviziBundle:Default:empty.html.twig' , array('message'  => "OK")   );
	}
	
	
	//retourne les item en Json
	public function lister_itemAction( $pseudo , $pass )
	{
				//confirme que l'utilisateur est bien loggé	
		if ( ! $this->confirmUser( $pseudo , $pass) )
		{
			return $this->render('FaviziBundle:Default:empty.html.twig' , array('message'  => "Wrong user !")   );
		}
		
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/**************************************************************************************************************************************************************************************************
	*** WEB ***** WEB ***** WEB ***** WEB ***** WEB ***** WEB ***** WEB ***** WEB ***** WEB ***** WEB ***** WEB ***** WEB ***** WEB ***** WEB ***** WEB ***** WEB ***** WEB ***** WEB ***** WEB *******
	***************************************************************************************************************************************************************************************************/
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
