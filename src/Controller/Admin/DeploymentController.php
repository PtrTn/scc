<?php

namespace App\Controller\Admin;

use PhpZip\Exception\ZipException;
use PhpZip\ZipFile;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeploymentController extends AbstractController
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    #[Route('/admin/deploy')]
    public function index(): Response
    {
        $zipFile = new ZipFile();
        try {
            $zipFile
                ->openFile(__DIR__ . '/../../../deploy/vendor.zip')
                ->extractTo(__DIR__ . '/../../../vendor_tmp');
        }
        catch(ZipException $exception){
            $this->logger->error('Unable to unzip', ['exception' => $exception]);
            return $this->json('Failed to unzip vendor', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        finally{
            $zipFile->close();
        }

        return $this->json('Successfully unzipped vendor');
    }
}
