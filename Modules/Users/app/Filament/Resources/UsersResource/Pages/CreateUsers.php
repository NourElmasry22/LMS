<?php

namespace Modules\Users\Filament\Resources\UsersResource\Pages;

use Modules\Users\Filament\Resources\UsersResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUsers extends CreateRecord
{
    protected static string $resource = UsersResource::class;
}
