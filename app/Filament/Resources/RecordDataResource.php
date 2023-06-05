<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecordDataResource\Pages;
use App\Filament\Resources\RecordDataResource\RelationManagers;
use App\Models\CarrierType;
use App\Models\ContentType;
use App\Models\RecordData;
use App\Models\Location;
use App\Models\Language;
use App\Models\MediaType;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;
use Closure;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Contracts\HasTable;
use stdClass;

class RecordDataResource extends Resource
{
    protected static ?string $model = RecordData::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static ?string $label = "Record";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('title')->maxLength(200)->reactive(),
                    DatePicker::make('create_date')->lazy(),
                    TextInput::make('reference_code')->maxLength(20)->lazy(),
                    Select::make('location_id')->label('Location')
                        ->options(Location::all()->pluck('name','id'))
                        ->searchable()->required(),
                    Select::make('content_type_id')->label('Content Type')
                        ->options(ContentType::all()->pluck('name','id'))
                        ->searchable()->required(), 
                    Select::make('media_type_id')->label('Media Type')
                        ->options(MediaType::all()->pluck('name','id'))
                        ->searchable()->required(),   
                    Select::make('carrier_type_id')->label('Carrier Type')
                        ->options(CarrierType::all()->pluck('name','id'))
                        ->searchable()->required(), 
                    TextInput::make('creator')->maxLength(25)->lazy(),
                    TextInput::make('description')->maxLength(50)->lazy(),
                    Select::make('language_id')->label('Language')
                        ->options(Language::all()->pluck('name','id'))
                        ->searchable()->required(),
                    Select::make('parent_id')->label('Parent Record')
                        ->options(RecordData::all()->pluck('title','id'))->searchable(),
                    FileUpload::make('attachments')
                        ->multiple()->maxSize(10240)->enableDownload()
                        ->preserveFilenames()
                        ->directory("record-attachments")
                        //->visibility('private')
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // TextColumn::make('id')->sortable()->searchable(),
                TextColumn::make('no')->getStateUsing(
                    static function (stdClass $rowLoop, HasTable $livewire): string {
                        return (string) (
                            $rowLoop->iteration +
                            ($livewire->tableRecordsPerPage * (
                                $livewire->page - 1
                            ))
                        );
                    }
                ),
                TextColumn::make('title')->limit(50)->sortable()->searchable(),
                TextColumn::make('create_date')->date()->sortable()->searchable(),
                TextColumn::make('reference_code')->sortable()->searchable(),
                TextColumn::make('location.name')->sortable()->searchable(),
                TextColumn::make('contentType.name')->sortable()->searchable(),
                TextColumn::make('mediaType.name')->sortable()->searchable(),
                TextColumn::make('carrierType.name')->sortable()->searchable(),
                TextColumn::make('creator')->sortable()->searchable(),
                TextColumn::make('description')->limit(50)->sortable()->searchable(),
                TextColumn::make('language.name')->sortable()->searchable(),
                TextColumn::make('parent.title')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRecordData::route('/'),
            'create' => Pages\CreateRecordData::route('/create'),
            'edit' => Pages\EditRecordData::route('/{record}/edit'),
        ];
    }    
}
