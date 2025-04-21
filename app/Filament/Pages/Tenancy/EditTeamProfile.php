<?php

namespace App\Filament\Pages\Tenancy;

use Filament\Forms\Form;
use Filament\Forms\Components\Split;
use Filament\Support\Enums\Alignment;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Tenancy\EditTenantProfile;

class EditTeamProfile extends EditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Team profile';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make('Companu profile')
                        ->description('Update your team profile information.')
                        ->schema([
                            TextInput::make('name')
                                ->label('Team Name')
                                ->inlineLabel()
                                ->required(),

                        ]),
                    Section::make('User Profile')
                        ->description('Update your team profile information.')
                        ->schema([
                            TextInput::make('userProfile.name')
                                ->label('Owner Name')
                                ->inlineLabel()
                                ->required(),
                            // ...

                        ]),
                ])->from('md')
                ,

            ]);
    }
}
