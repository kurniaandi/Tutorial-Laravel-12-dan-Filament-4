<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PostInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Post Information')
                ->columns(2)
                ->schema([
                    TextEntry::make('title')
                        ->label('Title')
                        ->weight('bold'),

                    ImageEntry::make('image')
                        ->label('Thumbnail')
                        ->disk('public')
                        ->visibility('public')
                        ->square(),
                ]),

            Section::make('Relations')
                ->columns(2)
                ->schema([
                    TextEntry::make('user.name')
                        ->label('Author'),

                    TextEntry::make('category.name')
                        ->label('Category'),
                ]),

            Section::make('Timestamps')
                ->columns(2)
                ->schema([
                    TextEntry::make('created_at')
                        ->label('Created At')
                        ->dateTime('d M Y H:i'),

                    TextEntry::make('updated_at')
                        ->label('Updated At')
                        ->dateTime('d M Y H:i'),
                ]),
        ]);
    }
}
