<?php

namespace App\Livewire;

use App\Models\Car;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use stdClass;

class MobeeCar extends Component implements HasTable, HasForms
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->striped()
            ->query(Car::query())
            ->columns([
                TextColumn::make('index')
                    ->label('No.')
                    ->getStateUsing(function (stdClass $rowLoop, HasTable $livewire): string {
                        $page = $livewire->paginators['page'];
                        $recordsPerPage = $livewire->tableRecordsPerPage;
                        return (string) ($rowLoop->iteration + ($recordsPerPage * ($page - 1)));
                    }),
                TextColumn::make('brand'),
                TextColumn::make('year'),
                TextColumn::make('model'),
                TextColumn::make('variant'),
                TextColumn::make('price')
                    ->label('Price')
                    ->formatStateUsing(fn (Model $record): string => "RM " . number_format($record->price, 2)),
            ])
            ->filters([
                Filter::make('brand')
                    ->form([
                        Select::make('brand')
                            ->placeholder('Select brand')
                            ->options(Car::query()->distinct()->pluck('brand')->toArray())
                            ->getSearchResultsUsing(fn (string $search): array => Car::where('brand', 'like', "%{$search}%")->distinct()->limit(50)->pluck('brand')->toArray())
                            ->native(false)
                    ])
                    ->query(function (Builder $query, $data): Builder {
                        if ($data['brand']) {
                            $query->where('brand', $data['brand']);
                            \Illuminate\Support\Facades\Log::info($query->toSql());
                        }
                        return $query;
                    }),

            ], layout: FiltersLayout::AboveContent)
            ->selectCurrentPageOnly(true);
    }

    public function render()
    {
        return view('livewire.mobee-car');
    }
}
