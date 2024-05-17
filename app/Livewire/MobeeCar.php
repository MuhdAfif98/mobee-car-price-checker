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
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use stdClass;

class MobeeCar extends Component implements HasTable, HasForms
{
    use InteractsWithForms;
    use InteractsWithTable;

    public $brand;
    public $brands;

    public $year;
    public $years;

    public $model;
    public $models;

    public $variant;
    public $variants;

    public $price;

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
                SelectFilter::make('brand')
                    ->options([
                        'Proton' => 'Proton',
                        'Perodua' => 'Perodua',
                    ])->preload(),
                SelectFilter::make('year')
                    ->options(generateYearOptions())->preload(),
                SelectFilter::make('model')
                    ->options(
                        function () {
                            $models = Car::query()
                                ->distinct()
                                ->pluck('model')
                                ->sort()
                                ->values();

                            return $models->combine($models);
                        }
                    )->preload(),
                SelectFilter::make('variant')
                    ->options(
                        function () {
                            $variants = Car::query()
                                ->distinct()
                                ->pluck('variant')
                                ->sort()
                                ->values();

                            return $variants->combine($variants);
                        }
                    )->preload(),
            ], layout: FiltersLayout::AboveContent)
            ->searchable()
            ->selectCurrentPageOnly(true);
    }

    public function mount()
    {
        $this->brands = Car::query()
            ->distinct()
            ->pluck('brand');
        $this->years = Car::query()
            ->distinct()
            ->pluck('year');
        $this->models = Car::query()
            ->distinct()
            ->pluck('model');
        $this->variants = Car::query()
            ->distinct()
            ->pluck('variant');
    }

    public function filterPrice()
    {
        $car = Car::where([
            'brand' => $this->brand,
            'year' => $this->year,
            'model' => $this->model,
            'variant' => $this->variant,
        ])->pluck('price')->first();

        $this->price = $car ? $car : 'Not found';
    }

    public function render()
    {
        return view('livewire.mobee-car');
    }
}
