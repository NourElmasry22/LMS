<?php

namespace Modules\Lessons\Filament;

use Coolsam\Modules\Concerns\ModuleFilamentPlugin;
use Filament\Contracts\Plugin;
use Filament\Panel;

class LessonsPlugin implements Plugin
{
    use ModuleFilamentPlugin;

    public function getModuleName(): string
    {
        return 'Lessons';
    }

    public function getId(): string
    {
        return 'lessons';
    }

    public function boot(Panel $panel): void
    {
        // TODO: Implement boot() method.
    }
}
