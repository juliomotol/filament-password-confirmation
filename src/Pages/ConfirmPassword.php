<?php

namespace JulioMotol\FilamentPasswordConfirmation\Pages;

use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Pages\SimplePage;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

/**
 * @property Form $form
 */
class ConfirmPassword extends SimplePage
{
    use InteractsWithFormActions;

    protected static string $view = 'filament-password-confirmation::pages.confirm-password';

    public array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function getTitle(): string | Htmlable
    {
        return __('filament-password-confirmation::pages/password-confirmation.title');
    }

    public function getHeading(): string | Htmlable
    {
        return __('filament-password-confirmation::pages/password-confirmation.heading');
    }

    public function confirm(): void
    {
        $this->form->validate();

        Session::passwordConfirmed();

        $this->redirect(Session::pull('url.intended', Filament::getUrl()));
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('password')
                    ->label(__('filament-password-confirmation::pages/password-confirmation.form.password.label'))
                    ->password()
                    ->currentPassword()
                    ->required()
                    ->autofocus()
                    ->revealable(),
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('confirm')
                ->label(__('filament-password-confirmation::pages/password-confirmation.form.actions.confirm.label'))
                ->submit('confirm'),
        ];
    }

    public function backAction(): Action
    {
        return Action::make('back')
            ->link()
            ->label(__('filament-password-confirmation::pages/password-confirmation.actions.back.label'))
            ->icon(match (__('filament::layout.direction')) {
                'rtl' => 'heroicon-m-arrow-right',
                default => 'heroicon-m-arrow-left',
            })
            ->keyBindings('esc')
            ->url(
                ($previous = url()->previous()) !== Request::url()
                    ? $previous
                    : Filament::getUrl()
            );
    }

    protected function hasFullWidthFormActions(): bool
    {
        return true;
    }
}
