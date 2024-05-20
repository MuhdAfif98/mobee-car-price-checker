<div class="mt-6">
    <div class="w-full bg-whiteborder-2">
        <h5 class="block p-6 text-xl font-bold text-neutral-800">
            List of Cars</h5>
        <hr class="w-full">
        <div class="p-6">
            <div class="w-full">
                {{ $this->table }}
            </div>
        </div>
    </div>

    <div class="items-center justify-center w-1/2 mt-6 bg-whiteborder-2">
        <h5 class="block p-6 text-xl font-bold text-neutral-800">
            Search Car : </h5>
        <hr class="w-full">
        <div class="p-6">
            <form wire:submit='filterPrice'>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    {{-- Brand --}}
                    <div>
                        <label for="brand"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand:</label>
                        <select id="brand" name="brand" wire:model="brand" wire:change='filterCar' required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Select brand</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand }}">{{ $brand }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Year --}}
                    <div>
                        <label for="year"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year:</label>
                        <select id="year" name="year" wire:model='year' wire:change='filterCar' required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Select year</option>
                            @foreach ($years as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Model --}}
                    <div>
                        <label for="model"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model:</label>
                        <select id="model" name="model" wire:model='model' wire:change='filterCar' required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Select model</option>
                            @foreach ($models as $model)
                                <option value="{{ $model }}">{{ $model }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Variant --}}
                    <div>
                        <label for="variant"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Variant:</label>
                        <select id="variant" name="variant" wire:model='variant' wire:change='filterCar' required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Select variant</option>
                            @foreach ($variants as $variant)
                                <option value="{{ $variant }}">{{ $variant }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
            {{-- Price --}}
            <div class="mt-6">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price
                    :</label>
                <input type="text" id="price" wire:model="price"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            </div>
        </div>
    </div>
</div>
