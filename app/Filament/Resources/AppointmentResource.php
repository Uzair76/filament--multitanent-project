<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentResource\Pages;
use App\Filament\Resources\AppointmentResource\RelationManagers;
use App\Models\Appointment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // 
                //                 $table->id();
                // $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
                // $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
                // $table->foreignId('clinic_id')->constrained('clinics')->onDelete('cascade');
                // $table->dateTime('appointment_date');
                // $table->time('appointment_time')->nullable();
                // $table->string('appoint_number')->unique()->nullable();
                // $table->timestamps();
                Forms\Components\Select::make('patient_id')
                    ->label('Patient')
                    ->relationship('patient', 'name')
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('clinic_id')
                    ->label('Clinic')
                    ->relationship('clinic', 'name')
                    ->required(),
                Forms\Components\DateTimePicker::make('appointment_date')
                    ->required(),
                Forms\Components\TimePicker::make('appointment_time')
                    ->nullable(),
                // should be random number 

                Forms\Components\TextInput::make('appoint_number')
                    ->unique()
                    ->nullable()
                    ->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('patient.name')
                    ->label('Patient')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('clinic.name')
                    ->label('Clinic')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('appointment_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('appointment_time')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('appoint_number')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit' => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }
}
