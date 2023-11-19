<div>
    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
        <div class="w-full">
            <form class="flex items-center">
                <div class="relative w-40">
                    <input wire:model.lazy='startDate' placeholder="Start Date" name="start_date" id="start_date" class="w-full text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-half p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <x-input-error :messages="$errors->get('startDate')" class="mt-2" />
                </div>
                <div class="relative w-40 left-2">
                    <input wire:model.lazy='endDate' placeholder="End Date" name="end_date" id="end_date" class="w-full text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-half p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <x-input-error :messages="$errors->get('endDate')" class="mt-2" />
                </div>
                <div class="relative left-8">
                    <button wire:click='filterByDate()' type="button" class="h-full inline-flex w-full justify-center gap-x-1.5 rounded-md bg-gray-50 border border-gray-300 px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" id="menu-button">
                        Filter by date
                    </button>
                </div>
                <div class="relative left-10">
                    <button type="button" class="h-full inline-flex w-full justify-center gap-x-1.5 rounded-md bg-gray-50 border border-gray-300 px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" id="menu-button">
                        Clear
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
