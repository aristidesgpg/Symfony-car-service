<?php

namespace App\DataFixtures;

use App\Entity\MPIGroup;
use App\Entity\MPIItem;
use App\Entity\MPITemplate;
use App\Repository\MPIGroupRepository;
use App\Repository\MPIItemRepository;
use App\Repository\MPITemplateRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

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
     * @var MPIGroupRepository
     */
    private $mpiGroupRepo;

    /**
     * @var MPIItemRepository
     */
    private $mpiItemRepo;

    /**
     * CouponFixtures constructor.
     * @param Container $container
     * @param MPITemplateRepository $mpiTemplateRepo
     * @param MPIGroupRepository $mpiGroupRepo
     * @param MPIItemRepository $mpiItemRepo
     */
    public function __construct(Container $container, MPITemplateRepository $mpiTemplateRepo, MPIGroupRepository $mpiGroupRepo, MPIItemRepository $mpiItemRepo)
    {
        $this->container = $container;
        $this->mpiTemplateRepo = $mpiTemplateRepo;
        $this->mpiGroupRepo = $mpiGroupRepo;
        $this->mpiItemRepo = $mpiItemRepo;
    }

    public function load(ObjectManager $manager)
    {
        //read a csv file
        $filepath = $this->container->getParameter('csv_directory').'MPITemplates.csv';
        $csv = fopen($filepath, 'r');

        //load data from a csv file
        $i = 0;
        while (!feof($csv)) {
            $row = fgetcsv($csv);
            if (0 == $i++) {
                continue;
            }

            //insert if mpi template does not exist
            $mpiTemplate = $this->mpiTemplateRepo->findOneByName($row[0]);
            if (!$mpiTemplate) {
                $mpiTemplate = new MPITemplate();
                $mpiTemplate->setName($row[0]);
                $manager->persist($mpiTemplate);
                $manager->flush();
            }
            //insert if mpi group does not exist
            $mpiGroup = $this->mpiGroupRepo->findOneBy([
                'mpiTemplate' => $mpiTemplate->getId(),
                'name' => $row[1],
            ]);
            if (!$mpiGroup) {
                $mpiGroup = new MPIGroup();
                $mpiGroup->setName($row[1])->setMPITemplate($mpiTemplate);
                $manager->persist($mpiGroup);
                $manager->flush();
            }
            //insert if mpi item does not exist
            $mpiItem = new MPIItem();
            $mpiItem->setName($row[2])
                    ->setMPIGroup($mpiGroup)
                    ->setHasRange(intval($row[3]));
            //if mpi item has range
            if (intval($row[3])) {
                $rangeUnit = 'Brakes' == $row[1] ? 'mm' : ('Tires' == $row[1] ? 's' : '');
                $mpiItem->setRangeMaximum(10)
                        ->setRangeUnit($rangeUnit);
            }
            $manager->persist($mpiItem);
            $manager->flush();

            $this->addReference('MPITemplate_'.$i, $mpiTemplate, $mpiGroup, $mpiItem);
        }

        fclose($csv);
    }
}
