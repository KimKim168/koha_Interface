<div>
    @if (session('success'))
        <div class="fixed top-[5rem] right-4 z-[999999] " wire:key="{{ rand() }}" x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 5000)">
            <div x-show="show" id="alert-2"
                class="flex items-center p-4 mb-4 text-green-800 border border-green-500 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ml-2">
                    {{ session('success') }}
                </div>
                <button type="button" @click="show = false"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        </div>
    @endif
    <div
        class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
        <div class="w-full md:w-1/2">
            <form class="flex items-center gap-4">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" id="simple-search" wire:model.live.debounce.300ms='search'
                        class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Search Items">
                </div>

            </form>
        </div>

    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-3">{{ __('messages.no') }}</th>
                    <th scope="col" class="px-4 py-3">{{ __('messages.name') }}</th>
                    <th scope="col" class="px-4 py-3">{{ __('messages.gender') }}</th>
                    <th scope="col" class="px-4 py-3">{{ __('messages.phone') }}</th>
                    <th scope="col" class="px-4 py-3">{{ __('messages.location') }}</th>
                    <th scope="col" class="py-3 text-center">{{ __('messages.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr wire:key='{{ $item->id }}'
                        class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <td class="w-4 px-4 py-3">
                            <div class="flex items-center">
                                {{ $loop->iteration }}
                            </div>
                        </td>

                        <x-table-data value="{{ $item->full_name ? $item->full_name : 'N/A' }}" />
                        <x-table-data value="{{ $item->gender ? $item->gender : 'N/A' }}" />
                        <x-table-data value="{{ $item->phone_number ? $item->phone_number : 'N/A' }}" />
                        <x-table-data value="{{ $item->location ? $item->location : 'N/A' }}" />


                        <td class="px-6 py-4">
                            <div class="flex items-start justify-center gap-3" x-data="{ open: false }">
                                @can('view customer')
                                    <div x-data="{ showPopup: false }">
                                        <a @click.prevent="showPopup = !showPopup">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                                <circle cx="12" cy="12" r="3" />
                                            </svg>
                                        </a>
                                        <div x-show="showPopup" x-cloak
                                            class="z-[999999] maxw--full fixed top-0 bottom-0 left-0 right-0 bg-black/60">
                                            <div x-show="showPopup" id="profileFrame{{ $item->id }}"
                                                class="absolute p-8 mx-auto transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-lg shadow-md top-1/2 left-1/2 dark:bg-gray-800"
                                                @click.away="showPopup = false">
                                                <div class="max-w-screen-xl px-2 mx-auto lg:px-0">
                                                    <div class="min-[1000px]:flex">
                                                        <div class="flex flex-col items-center mb-6">
                                                            {{-- <div
                                                                class="max-w-[200px] w-full lg:w-auto flex flex-col gap-2 px-2 lg:px-0 border rounded-lg overflow-hidden shardow-md">
                                                                @if ($item->image)
                                                                    <img class="max-w-[200px] text-center h-auto aspect-square object-cover rounded-md cursor-pointer"
                                                                        src="{{ asset('assets/images/users/thumb/' . $item->image) }}"
                                                                        alt="User photo">
                                                                @else
                                                                    <img class="max-w-[200px] text-center h-auto aspect-square object-cover rounded-md cursor-pointer"
                                                                        src="{{ asset('assets/icons/profile.png') }}"
                                                                        alt="User photo">
                                                                @endif
                                                            </div> --}}
                                                        </div>
                                                        <div class="lg:ml-4">
                                                            <div
                                                                class="mb-4 text-sm font-semibold tracking-wide text-blue-600 uppercase">
                                                                {{ __('messages.userInfomation') }}
                                                            </div>
                                                            <div class="flex flex-col gap-2">
                                                                <div class="flex nowrap">
                                                                    <p
                                                                        class="w-[123px] uppercase tracking-wide text-sm text-gray-500 dark:text-gray-300 font-semibold border-r border-gray-600 dark:border-gray-300 pr-5 mr-5">
                                                                        {{ __('messages.name') }}
                                                                    </p>
                                                                    <p class="text-sm text-gray-600 dark:text-gray-200">
                                                                        {{ $item->full_name }}
                                                                    </p>
                                                                </div>
                                                                <div class="flex nowrap">
                                                                    <p
                                                                        class="w-[123px] uppercase tracking-wide text-sm text-gray-500 dark:text-gray-300 font-semibold border-r border-gray-600 dark:border-gray-300 pr-5 mr-5">
                                                                        {{ __('messages.gender') }}
                                                                    </p>
                                                                    <p class="text-sm text-gray-600 dark:text-gray-200">
                                                                        {{ $item->gender ? $item->gender : 'N/A' }}
                                                                    </p>
                                                                </div>
                                                                <div class="flex nowrap">
                                                                    <p
                                                                        class="w-[123px] uppercase tracking-wide text-sm text-gray-500 dark:text-gray-300 font-semibold border-r border-gray-600 dark:border-gray-300 pr-5 mr-5">
                                                                        {{ __('messages.phone') }}
                                                                    </p>
                                                                    <p class="text-sm text-gray-600 dark:text-gray-200">
                                                                        {{ $item->phone_number ? $item->phone_number : 'N/A' }}
                                                                    </p>
                                                                </div>
                                                                <div class="flex nowrap">
                                                                    <p
                                                                        class="w-[123px] uppercase tracking-wide text-sm text-gray-500 dark:text-gray-300 font-semibold border-r border-gray-600 dark:border-gray-300 pr-5 mr-5">
                                                                        {{ __('messages.location') }}
                                                                    </p>
                                                                    <p class="text-sm text-gray-600 dark:text-gray-200">
                                                                        {{ $item->location ? $item->location : 'N/A' }}
                                                                    </p>
                                                                </div>

                                                                <div class="flex nowrap">
                                                                    <p
                                                                        class="w-[123px] uppercase tracking-wide text-sm text-gray-500 dark:text-gray-300 font-semibold border-r border-gray-600 dark:border-gray-300 pr-5 mr-5">
                                                                        {{ __('messages.createdAt') }}
                                                                    </p>
                                                                    <p class="text-sm text-gray-600 dark:text-gray-200">
                                                                        {{ $item->created_at ? $item->created_at : 'N/A' }}
                                                                    </p>
                                                                </div>
                                                                <div class="flex nowrap">
                                                                    <p
                                                                        class="w-[123px] uppercase tracking-wide text-sm text-gray-500 dark:text-gray-300 font-semibold border-r border-gray-600 dark:border-gray-300 pr-5 mr-5">
                                                                        {{ __('messages.updatedAt') }}
                                                                    </p>
                                                                    <p class="text-sm text-gray-600 dark:text-gray-200">
                                                                        {{ $item->updated_at ? $item->updated_at : 'N/A' }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endcan

                                @can('delete customer')
                                    <div class="pb-1" x-data="{ tooltip: false }">
                                        <!-- Modal toggle -->
                                        <a wire:confirm='Are you sure? you want to delete customer : {{ $item->name }}'
                                            wire:click='delete({{ $item->id }})' @mouseenter="tooltip = true"
                                            @mouseleave="tooltip = false">
                                            <span class="text-red-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-trash">
                                                    <path d="M3 6h18" />
                                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                                </svg>
                                            </span>
                                        </a>

                                        <!-- View tooltip -->
                                        <div x-show="tooltip" x-transition:enter="transition ease-out duration-200"
                                            x-transition:enter-start="opacity-0 transform scale-90"
                                            x-transition:enter-end="opacity-100 transform scale-100"
                                            x-transition:leave="transition ease-in duration-75"
                                            x-transition:leave-start="opacity-100 transform scale-100"
                                            x-transition:leave-end="opacity-0 transform scale-90"
                                            class="absolute z-30 inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm dark:bg-gray-700 whitespace-nowrap"
                                            style="display: none;">
                                            Delete
                                        </div>
                                    </div>
                                @endcan

                                {{-- @can('update user')
                                    <x-edit-button identifier="{{ $item->id }}" 
                                        editUrl="{{ url('admin/users/' . $item->id . '/edit') }}"
                                        tooltipText="Edit User" />
                                @endcan --}}

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="p-4">
            <div class="max-w-[200px] my-2 flex gap-2 items-center">
                <label for="countries"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white whitespace-nowrap">Record per
                    page : </label>
                <select id="countries" wire:model.live='perPage'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="70">70</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div>{{ $items->links() }}</div>
        </div>
    </div>
</div>

@script
    <script>
        $wire.on('livewire:updated', function(event) {
            console.log('updatedPage');
            // console.log('updated');
        });
    </script>
@endscript
