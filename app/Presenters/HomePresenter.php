<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use App\PigLatinTranslator;
use Nette\Application\UI\Form;

final class HomePresenter extends Nette\Application\UI\Presenter
{
    public function __construct(
        private PigLatinTranslator $translator,
    ) {
    }

    protected function createComponentPigLatinForm(): Form
    {
        $form = new Form;

        $form->addText('inputWord', 'Enter english word:')
            ->setRequired('Please enter some word.');

        $form->addSubmit('translate', 'Translate');

        $form->onSuccess[] = [$this, 'pigLatinFormSubmit'];

        return $form;
    }

    public function pigLatinFormSubmit(Form $form, $values)
    {
        $inputWord = $values['inputWord'];
        $translatedWord = $this->translator->translateToPigLatin($inputWord);

        $this->template->translatedWord = $translatedWord;
    }
}
