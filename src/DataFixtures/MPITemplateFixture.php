<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use App\Entity\MPITemplate;
use App\Entity\InspectionGroup;
use App\Entity\MPIItem;
use App\Repository\MPITemplateRepository;
use App\Repository\InspectionGroupRepository;
use App\Repository\MPIItemRepository;

class MPITemplateFixture extends Fixture
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @var MPITemplateRepository
     */
    private $mpiTemplateRepo;

    /**
     * @var InspectionGroupRepository
     */
    private $inspectionGroupRepo;

    /**
     * @var MPIItemRepository
     */
    private $mpiItemRepo;

    /**
     * CouponFixtures constructor.
     *
     * @param Container $container
     */
    public function __construct (Container $container, MPITemplateRepository $mpiTemplateRepo, InspectionGroupRepository $inspectionGroupRepo, MPIItemRepository $mpiItemRepo) {
        $this->container           = $container;
        $this->mpiTemplateRepo     = $mpiTemplateRepo;
        $this->inspectionGroupRepo = $inspectionGroupRepo;
        $this->mpiItemRepo         = $mpiItemRepo;
    }

    public function load(ObjectManager $manager)
    {
        //read a csv file
        $filepath = $this->container->getParameter('csv_directory').'operationCode.csv';
        $csv      = fopen($filepath, 'r');

        //load data from a csv file
        $i = 0;
        while (!feof($csv)) {
            $row = fgetcsv($csv);
            if($i++ == 0){
                continue;
            }

            //insert if mpi template does not exist
            $mpiTemplate = $this->mpiTemplateRepo->findOneByName($row[0]);
            if(!$mpiTemplate){
                $mpiTemplate = new MPITemplate();
                $mpiTemplate->setName($row[0]);
                $manager->persist($mpiTemplate);
                $manager->flush();
            }
            //insert if mpi group does not exist
            $mpiGroup = $this->inspectionGroupRepo->findOneByName($row[1]);
            if(!$mpiGroup){
                $mpiGroup = new InspectionGroup();
                $mpiGroup->setName($row[1])->setMpiTemplateId($mpiTemplate->getId());
                $manager->persist($mpiGroup);
                $manager->flush();
            }
            //insert if mpi item does not exist
            $mpiItem = $this->mpiItemRepo->findOneByName($row[2]);
            if(!$mpiItem){
                $mpiItem = new MPIItem();
                $mpiItem->setName($row[2])->setMpiInspectionGroupId($mpiGroup->getId());
                $manager->persist($mpiItem);
                $manager->flush();
            }
            
            $this->addReference('MPITemplate_' . $i, $mpiTemplate, $mpiGroup, $mpiItem);
        }

        fclose($csv);
    }
}
