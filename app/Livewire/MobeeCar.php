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
                TextColumn::make('brand')->searchable(),
                TextColumn::make('year')->searchable(),
                TextColumn::make('model')->searchable(),
                TextColumn::make('variant')->searchable(),
                TextColumn::make('price')->searchable()
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
            ], layout: FiltersLayout::AboveContent);
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

        $this->price = $car ? 'RM '.$car : 'Not found';
    }

    public function filterCar()
    {
        $this->brands = Car::query()
            ->when($this->year, function ($query) {
                $query->where('year', $this->year);
            })
            ->when($this->variant, function ($query) {
                $query->where('variant', $this->variant);
            })
            ->when($this->model, function ($query) {
                $query->where('model', $this->model);
            })
            ->distinct()
            ->pluck('brand');

        $this->variants = Car::query()
            ->when($this->year, function ($query) {
                $query->where('year', $this->year);
            })
            ->when($this->brand, function ($query) {
                $query->where('brand', $this->brand);
            })
            ->when($this->model, function ($query) {
                $query->where('model', $this->model);
            })
            ->distinct()
            ->pluck('variant');

        $this->years = Car::query()
            ->when($this->brand, function ($query) {
                $query->where('brand', $this->brand);
            })
            ->when($this->variant, function ($query) {
                $query->where('variant', $this->variant);
            })
            ->when($this->model, function ($query) {
                $query->where('model', $this->model);
            })
            ->distinct()
            ->pluck('year');

        $this->models = Car::query()
            ->when($this->year, function ($query) {
                $query->where('year', $this->year);
            })
            ->when($this->variant, function ($query) {
                $query->where('variant', $this->variant);
            })
            ->when($this->brand, function ($query) {
                $query->where('brand', $this->brand);
            })
            ->distinct()
            ->pluck('model');
    }

    public function render()
    {
        return view('livewire.mobee-car');
    }
}
