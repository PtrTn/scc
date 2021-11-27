<?php

namespace App\Controller\Admin;

use PhpZip\Exception\ZipException;
use PhpZip\ZipFile;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeploymentController extends AbstractController
{
    private const CACHE_DIRECTORY = __DIR__ . '/../../../var/cache/prod';
    private const ZIPPED_VENDOR_FILEPATH = __DIR__.'/../../../deploy/vendor.zip';
    private const TEMP_VENDOR_DIRECTORY = __DIR__.'/../../../vendor_tmp';

    private LoggerInterface $logger;
    private Filesystem $filesystem;

    public function __construct(LoggerInterface $logger, Filesystem $filesystem)
    {
        $this->logger = $logger;
        $this->filesystem = $filesystem;
    }

    #[Route('/admin/deploy')]
    public function deploy(): Response
    {
        try {
            $this->filesystem->remove(self::TEMP_VENDOR_DIRECTORY);
            $this->filesystem->mkdir(self::TEMP_VENDOR_DIRECTORY);
        } catch (IOException $exception) {
            $this->logger->error('Unable to (re)create temporary vendor directory', ['exception' => $exception]);

            return $this->json('Failed to (re)create temporary vendor directory', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $zipFile = new ZipFile();
        try {
            $zipFile
                ->openFile(self::ZIPPED_VENDOR_FILEPATH)
                ->extractTo(self::TEMP_VENDOR_DIRECTORY);
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

    #[Route('/admin/clear-cache')]
    public function clearCache(): Response
    {
        try {
            $this->filesystem->remove(self::CACHE_DIRECTORY);
        } catch (IOException $exception) {
            $this->logger->error('Unable to remove cache directory', ['exception' => $exception]);

            return $this->json('Failed to clear cache', Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $this->json('Successfully removed cache');
    }
}
