<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('title')
                ->label('Title')
                ->required()
                ->maxLength(255),

            FileUpload::make('image')
                ->image()
                ->directory('posts')
                ->disk('public')
                ->visibility('public'),

            RichEditor::make('content')
                ->label('Content')
                ->required()
                ->columnSpanFull(),

            Select::make('user_id')
                ->label('Author')
                ->relationship('user', 'name')
                ->searchable()
                ->required(),

            Select::make('category_id') 
                ->label('Category')
                ->relationship('category', 'name')
                ->searchable()
                ->required(),
        ]);
    }
}
