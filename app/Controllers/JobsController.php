<?php

namespace App\Controllers;

use App\Models\Job;
use Exception;
use Respect\Validation\Validator as validation;

class JobsController extends BaseController
{
    public function getAddJobAction($request)
    {
        $responseMessage = null;
        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();

            $jobValidator = validation::key('title', validation::stringType()->notEmpty())
                ->key('description', validation::stringType()->notEmpty());

            try {
                $jobValidator->assert($postData); // true


                $job = new Job();
                $job->title = $postData['title'];
                $job->description = $postData['description'];
                $job->save();

                $responseMessage = 'Saved';
            } catch (Exception $e) {
                $responseMessage = $e->getMessage();
            }
        }

        return ($this->renderHTML('addJob.twig', [
            'responseMessage' => $responseMessage
        ]));
    }
}