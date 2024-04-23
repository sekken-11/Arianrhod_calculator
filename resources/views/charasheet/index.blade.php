<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            キャラクター 一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
        <div x-data="{ show: true }">

            <div class="flex justify-between">
                <a href="{{ route('charasheet.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded fucus:outline-none focus:shadow-outline mt-3 block text-center">
                    新規作成
                </a>
                <button @click="show = !show"  class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded fucus:outline-none focus:shadow-outline mt-3">
                    <span x-show="show">削除モード</span>
                    <span x-show="!show">削除モード中</span>
                </button>
            </div>

            <div>
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 text-xs leading-normal">
                                <th class="py-3 px-1 text-center">キャラクター名</th>
                                <th class="py-3 px-1 text-center">Lv</th>
                                <th class="py-3 px-1 text-center">プレイヤー名</th>
                                <th class="py-3 px-1 text-center">種族</th>
                                <th class="py-3 px-1 text-center">メインクラス</th>
                                <th class="py-3 px-1 text-center">サポートクラス</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-xs font-light">
                        @foreach($characters as $character)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td x-show="show" class="font-bold text-blue-500 hover:text-blue-700 py-3 px-1 text-center whitespace-nowrap">
                                    <a href="{{ route('charasheet.show', $character->id) }}">{{ $character->name }}</a>
                                </td>
                                <td x-show="!show" class="font-bold text-blue-500 hover:text-blue-700 py-3 px-1 text-center whitespace-nowrap">
                                    <form action="{{ route('charasheet.destroy', $character->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" onclick="return confirm('削除してもよろしいですか？')" class="text-red-500 hover:text-red-700">{{ $character->name }}(削除)</button>
                                    </form>
                                </td>
                                <td class="py-3 px-1 text-center whitespace-nowrap">{{ $character->level }}</td>
                                <td class="py-3 px-1 text-center whitespace-nowrap">{{ $character->player_name }}</td>
                                <td class="py-3 px-1 text-center whitespace-nowrap">{{ $character->tribe->name }}</td>
                                <td class="py-3 px-1 text-center whitespace-nowrap">{{ $character->main_class->name }}</td>
                                <td class="py-3 px-1 text-center whitespace-nowrap">{{ $character->support_class->name }}</td>
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