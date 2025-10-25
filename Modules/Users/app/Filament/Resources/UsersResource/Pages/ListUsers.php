<?php

namespace Modules\Users\Filament\Resources\UsersResource\Pages;

use Modules\Users\Filament\Resources\UsersResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UsersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
