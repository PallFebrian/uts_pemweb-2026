<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Portfolio';

    protected static ?string $navigationLabel = 'Projects';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Project')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Project')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('slug')
                            ->label('Slug')
                            ->helperText('Boleh dikosongkan, nanti otomatis dibuat dari judul.')
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        Forms\Components\Textarea::make('short_description')
                            ->label('Deskripsi Singkat')
                            ->rows(3)
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi Lengkap')
                            ->rows(7)
                            ->columnSpanFull(),

                        Forms\Components\TagsInput::make('stack')
                            ->label('Tech Stack')
                            ->placeholder('Ketik stack lalu tekan Enter')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Progress Project')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'planning' => 'Planning',
                                'in_progress' => 'In Progress',
                                'completed' => 'Completed',
                            ])
                            ->default('planning')
                            ->required()
                            ->native(false),

                        Forms\Components\TextInput::make('progress')
                            ->label('Progress')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->suffix('%')
                            ->default(0)
                            ->required(),

                        Forms\Components\DatePicker::make('started_at')
                            ->label('Tanggal Mulai'),

                        Forms\Components\Toggle::make('featured')
                            ->label('Project Unggulan')
                            ->default(false),

                        Forms\Components\Toggle::make('is_published')
                            ->label('Publish')
                            ->default(true),
                    ])
                    ->columns(3),

                Forms\Components\Section::make('Link & Asset Project')
                    ->schema([
                        Forms\Components\TextInput::make('repository_url')
                            ->label('Repository URL')
                            ->url()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('demo_url')
                            ->label('Demo URL')
                            ->url()
                            ->maxLength(255),

                        FileUpload::make('erd_image')
                            ->label('ERD Image')
                            ->image()
                            ->disk('public')
                            ->directory('projects/erd')
                            ->visibility('public')
                            ->imageEditor()
                            ->downloadable()
                            ->openable()
                            ->helperText('Upload gambar ERD project. Format yang disarankan: PNG, JPG, JPEG, atau WebP.')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('erd_image')
                    ->label('ERD')
                    ->disk('public')
                    ->square()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'planning' => 'Planning',
                        'in_progress' => 'In Progress',
                        'completed' => 'Completed',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'planning' => 'gray',
                        'in_progress' => 'warning',
                        'completed' => 'success',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('progress')
                    ->label('Progress')
                    ->suffix('%')
                    ->sortable(),

                Tables\Columns\IconColumn::make('featured')
                    ->label('Featured')
                    ->boolean(),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Publish')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'planning' => 'Planning',
                        'in_progress' => 'In Progress',
                        'completed' => 'Completed',
                    ]),

                Tables\Filters\TernaryFilter::make('featured')
                    ->label('Featured'),

                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Publish'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}