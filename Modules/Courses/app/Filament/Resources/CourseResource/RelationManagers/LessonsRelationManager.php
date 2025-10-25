<?php

namespace Modules\Courses\Filament\Resources\CourseResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class LessonsRelationManager extends RelationManager
{
    protected static string $relationship = 'lessons'; // علاقة hasMany في Course model

    protected static ?string $recordTitleAttribute = 'title';

    public function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->rows(2),

                Toggle::make('is_free_preview')
                    ->label('Free Preview')
                    ->default(false),

                TextInput::make('video_url')
                    ->label('Video URL')
                    ->url()
                    ->nullable(),
            ]);
    }

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable(),
                IconColumn::make('is_free_preview')
                    ->label('Free')
                    ->boolean(),
                TextColumn::make('created_at')->dateTime()->label('Created'),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
