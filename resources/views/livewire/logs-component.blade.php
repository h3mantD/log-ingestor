<div>


    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-40">
                            <select wire:model='searchColumn' name="column" id="column" class="w-full text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-half p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                @foreach ($searchableColumns as $key => $column)
                                    <option value="{{ $key }}">{{ $column }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="relative w-40 left-2">
                            <select wire:model.lazy='searchType' name="search_type" id="search_type" class="w-full text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-half p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                @foreach($searchTypes as $key => $type)
                                    <option value="{{ $key }}">{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="relative w-full md:w-1/2 left-4">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input wire:model='searchValue' type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                            <x-input-error :messages="$errors->get('searchValue')" class="mt-2" />
                        </div>
                        <div class="relative left-8">
                            <button wire:click='search()' type="button" class="h-full inline-flex w-full justify-center gap-x-1.5 rounded-md bg-gray-50 border border-gray-300 px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" id="menu-button">
                                Search
                            </button>
                        </div>
                        <div class="relative left-10">
                            <button wire:click='clear()' type="button" class="h-full inline-flex w-full justify-center gap-x-1.5 rounded-md bg-gray-50 border border-gray-300 px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" id="menu-button">
                                Clear
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @livewire("layout.date-filter")
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Level</th>
                            <th scope="col" class="px-4 py-3">Message</th>
                            <th scope="col" class="px-4 py-3">ResourceId</th>
                            <th scope="col" class="px-4 py-3">TraceId</th>
                            <th scope="col" class="px-4 py-3">SpanId</th>
                            <th scope="col" class="px-4 py-3">Commit</th>
                            <th scope="col" class="px-4 py-3">ParentResourceId</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $log)
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{  str($log->level)->upper() }}</th>
                                <td class="px-4 py-3">{{ $log->message }}</td>
                                <td class="px-4 py-3">{{ $log->resourceId }}</td>
                                <td class="px-4 py-3">{{ $log->traceId }}</td>
                                <td class="px-4 py-3">{{ $log->spanId }}</td>
                                <td class="px-4 py-3">{{ str($log->commit)->substr(0,7) }}</td>
                                <td class="px-4 py-3">{{ $log->metadata["parentResourceId"] }}</td>
                                <td class="px-4 py-3 flex items-center justify-end">
                                    <button id="apple-imac-27-dropdown-button" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                        View
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{ $logs->links() }}

        </div>
    </div>

</div>
