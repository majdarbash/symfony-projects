<?php
/**
 * Created by PhpStorm.
 * User: majdarbash
 * Date: 6/30/18
 * Time: 10:13 AM
 */

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class TaskController extends Controller
{


    /**
     * @Route("/task/new")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function new(Request $request)
    {
        $task = new Task();
        $task->setTask("Here is the new task");
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class)
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Task'])
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();

            return $this->redirectToRoute('task_success');
        }

        return $this->render('task/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

}