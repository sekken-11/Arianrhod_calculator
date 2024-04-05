<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            種族 一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div x-data="{ show: true }">

            <div class="flex justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded fucus:outline-none focus:shadow-outline mt-3">
                    <a href="{{ route('admin.tribe.create') }}">新規作成</a>
                </button>
                <button @click="show = !show"  class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded fucus:outline-none focus:shadow-outline mt-3">
                    <span x-show="show">削除モード</span>
                    <span x-show="!show">削除モード中</span>
                </button>
            </div>

            <div class="container">
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 text-xs leading-normal">
                                <th class="py-3 px-1 text-center">種族名</th>
                                <th class="py-3 px-1 text-center">筋力</th>
                                <th class="py-3 px-1 text-center">器用</th>
                                <th class="py-3 px-1 text-center">敏捷</th>
                                <th class="py-3 px-1 text-center">知力</th>
                                <th class="py-3 px-1 text-center">感知</th>
                                <th class="py-3 px-1 text-center">精神</th>
                                <th class="py-3 px-1 text-center">幸運</th>
                                <th class="py-3 px-1 text-center">HP</th>
                                <th class="py-3 px-1 text-center">MP</th>
                                <th class="py-3 px-1 text-center">フェイト</th>
                                <th class="py-3 px-1 text-center">重量</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-xs font-light">
                        @foreach($tribes as $tribe)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td x-show="show" class="font-bold text-blue-500 hover:text-blue-700 py-3 px-1 text-center whitespace-nowrap">
                                    <a href="{{ route('admin.tribe.edit', $tribe->id) }}">{{ $tribe->name }}</a>
                                </td>
                                <td x-show="!show" class="font-bold text-blue-500 hover:text-blue-700 py-3 px-1 text-center whitespace-nowrap">
                                    <form action="{{ route('admin.tribe.destroy', $tribe->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" onclick="return confirm('削除してもよろしいですか？')" class="text-red-500 hover:text-red-700">{{ $tribe->name }}(削除)</button>
                                    </form>
                                </td>
                                <td class="py-3 px-1 text-center whitespace-nowrap">{{ $tribe->strength_base }}</td>
                                <td class="py-3 px-1 text-center whitespace-nowrap">{{ $tribe->dexterity_base }}</td>
                                <td class="py-3 px-1 text-center whitespace-nowrap">{{ $tribe->agility_base }}</td>
                                <td class="py-3 px-1 text-center whitespace-nowrap">{{ $tribe->intelligence_base }}</td>
                                <td class="py-3 px-1 text-center whitespace-nowrap">{{ $tribe->sense_base }}</td>
                                <td class="py-3 px-1 text-center whitespace-nowrap">{{ $tribe->mental_base }}</td>
                                <td class="py-3 px-1 text-center whitespace-nowrap">{{ $tribe->luck_base }}</td>
                                <td class="py-3 px-1 text-center whitespace-nowrap">{{ $tribe->hp_base }}</td>
                                <td class="py-3 px-1 text-center whitespace-nowrap">{{ $tribe->mp_base }}</td>
                                <td class="py-3 px-1 text-center whitespace-nowrap">{{ $tribe->fate_base }}</td>
                                <td class="py-3 px-1 text-center whitespace-nowrap">{{ $tribe->weight_limit }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        </div>
    </div>
</x-app-layout>