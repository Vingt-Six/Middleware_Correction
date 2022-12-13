<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Backoffice') }}
        </h2>
    </x-slot>

    <!-- component -->
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-white border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    #
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Title
                                </th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $item)
                                <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-white' : 'bg-gray-100' }} border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $item->id }}</td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $item->titre }}
                                    </td>
                                    <td class="text-sm text-emerald-500 font-light px-6 py-4 whitespace-nowrap">
                                        <a href="/article/{{ $item->id }}">Show</a>
                                    </td>
                                    @can('redac-access', $item)
                                        <td class="text-sm text-indigo-500 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="/article/{{ $item->id }}/edit">Edit</a>
                                        </td>
                                        <td class="text-sm text-red-600 font-light px-6 py-4 whitespace-nowrap">
                                            <form action="/article/{{ $item->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">Delete</button>
                                            </form>
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
