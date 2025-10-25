<?php

namespace Modules\Courses\Filament;

use Coolsam\Modules\Concerns\ModuleFilamentPlugin;
use Filament\Contracts\Plugin;
use Filament\Panel;

class CoursesPlugin implements Plugin
{
    use ModuleFilamentPlugin;

    public function getModuleName(): string
    {
        return 'Courses';
    }

    public function getId(): string
    {
        return 'courses';
    }

    public function boot(Panel $panel): void
    {
        // TODO: Implement boot() method.
    }
}
