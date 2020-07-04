<?php



use Symfony\Bridge\Doctrine\Tests\ManagerRegistryTest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Sale;
use App\Entity\Sale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry as ManagerRegistry;
use App\Repository\SaleRepository;
//use doctrine\orm\lib\Doctrine\ORM\QueryBuilder

class SaleReportController extends AbstractController
{
    /**
     * @Route("/sale/report", name="sale_report")
     */
    public function index()
    {
        return $this->render('sale_report/index.html.twig', [
            'controller_name' => 'SaleReportController',
        ]);
    }

    /**
     * @Route("/sale/report", name="calcSum", methods={"POST"})
     */
   /* public function calcSum(Request $request)
    {
        $sum = $request->request->getInt('numbers');;

        return $this->render('sale_report/index.html.twig', ['sum' => $sum]);
    } */

    public function showReport(Request $request1, Request $request2){
        //echo '';
        //$SaleRepository = new SaleRepository(new ManagerRegistry();
        //$SaleRepository->findByDateField($request1, $request2);
        $str = "Отчет за " . (string)$request1 . " месяц " . (string)$request2 . " года";
        return $this->render('sale_report/index.html.twig', ['answ' => $str]);
    }

    public function findByDateField($value1, $value2)
    {
        $sb = $this->createQueryBuilder('s')
            ->Where('(s.sale_date)->format(\'Y\') = :value1')
            ->andWhere('(s.sale_date)->format(\'m\') = :value2')
            ->setParameter('val1', $value1)
            ->setParameter('val2', $value2)
            ->orderBy('s.val2', 'ASC');
        $querysale = $sb->getQuery();
        return $querysale->execute();
    }

}
