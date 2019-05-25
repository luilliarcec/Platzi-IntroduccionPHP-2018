<?php


namespace App\Controllers;


use App\Models\Job;
use App\Models\Project;
use Exception;
use Respect\Validation\Validator as validation;
use Zend\Diactoros\ServerRequest;

class ProjectsController extends BaseController
{
    public function getAddJobAction()
    {
        return ($this->renderHTML('addProject.twig'));
    }

    public function postAddJobAction(ServerRequest $request)
    {
        $postData = $request->getParsedBody();

        $projectValidator = validation::key('title', validation::stringType()->notEmpty())
            ->key('description', validation::stringType()->notEmpty());

        try {
            $projectValidator->assert($postData); // true

            $files = $request->getUploadedFiles();
            $image = $files['image'];;
            if ($image->getError() == UPLOAD_ERR_OK) {
                $fileName = $image->getClientFilename();
                $image->moveTo("uploads/$fileName");

                $project = new Project();
                $project->title = $postData['title'];
                $project->description = $postData['description'];
                $project->imageUrl = "uploads/$fileName";
                $project->save();
            }

            $responseMessage = 'Saved';
        } catch (Exception $e) {
            $responseMessage = $e->getMessage();
        }

        return ($this->renderHTML('addProject.twig', [
            'responseMessage' => $responseMessage
        ]));
    }
}