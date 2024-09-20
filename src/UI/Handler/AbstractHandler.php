<?php

declare(strict_types=1);

namespace App\UI\Handler;

use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use AllowDynamicProperties;
use LogicException;

#[AllowDynamicProperties] abstract class AbstractHandler
{
//    /**
//     * @var FormFactoryInterface
//     */
//    private FormFactoryInterface $formFactory;
//
//    /**
//     * @var FormInterface
//     */
//    private FormInterface $form;
//
//    /**
//     * @param FormFactoryInterface $formFactory
//     *
//     * @return void
//     */
//    public function setFormFactory(FormFactoryInterface $formFactory): void
//    {
//        $this->formFactory = $formFactory;
//    }
//
//    /**
//     * @param $data
//     *
//     * @return void
//     */
//    abstract public function process($data = null): void;
//
//    /**
//     * @return string
//     */
//    abstract public function getFormType(): string;
//
//    /**
//     * @param Request $request
//     * @param mixed|null $data
//     *
//     * @return bool
//     */
//    public function handle(Request $request, mixed $data = null): bool
//    {
//        $this->form = $this->formFactory->create($this->getFormType(), $data)->handleRequest($request);
//
//        if ($this->form->isSubmitted() && $this->form->isValid()) {
//            $this->process($data);
//
//            return true;
//        }
//
//        return false;
//    }
//
//    /**
//     * @return FormView
//     */
//    public function createView(): FormView
//    {
//        return $this->form->createView();
//    }

    /**
     * @var FormFactoryInterface
     */
    protected FormFactoryInterface $formFactory; // Déclaration de la propriété

    /**
     * @var FormInterface
     */
    protected FormInterface $form;

    /**
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory; // Initialisation ici
    }

    /**
     * @param $data
     *
     * @return void
     */
    abstract public function process($data = null): void;

    /**
     * @return string
     */
    abstract public function getFormType(): string;

    public function handle(Request $request, mixed $data = null): bool
    {
        $this->form = $this->formFactory->create($this->getFormType(), $data)->handleRequest($request);

        if ($this->form->isSubmitted() && $this->form->isValid()) {
            $this->process($data);
            return true;
        }

        return false;
    }

    /**
     * @return FormView
     */
    public function createView(): FormView
    {
        if (!isset($this->form)) {
            throw new LogicException('Le formulaire doit être initialisé avant d\'utiliser createView()');
        }

        return $this->form->createView();
    }
}