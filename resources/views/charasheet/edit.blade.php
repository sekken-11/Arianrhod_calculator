<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('キャラクター編集') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">

                    <div>
                        <form id="charasheet_form" action="{{ route('charasheet.update', $character->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <fieldset>
                                <div class="form-group">

                                    <!-- 初期値 -->
                                    <div class="bg-white shadow-md rounded my-6">
                                        <table class="min-w-max w-full table-auto">
                                            <thead>
                                                <tr class="bg-gray-200 text-gray-600 leading-normal">
                                                    <th class="py-2 text-center">レベル</th>
                                                    <th class="py-2 text-center">成長点</th>
                                                    <th class="py-2 text-center">初期メインクラス</th>
                                                    <th class="py-2 text-center">初期サポートクラス</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-gray-600 text-xs font-light">
                                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                                    <td class="py-2 text-center">{{ $character->level }}</td>
                                                    <td class="py-2 text-center">
                                                        <input type="number"
                                                            class="form-control bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                            name="exp_point" id="exp_point"
                                                            value="{{ $character->exp_point }}">
                                                    </td>
                                                    <td class="py-2 text-center" id="initial_main_class">-</td>
                                                    <td class="py-2 text-center" id="initial_support_class">-</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- キャラクター情報 -->
                                    @include('charasheet.parts.information')

                                    <!-- 種族・クラス -->
                                    <!-- ステータス -->
                                    <!-- ステータス2 -->
                                    @include('charasheet.parts.status')

                                    <!-- スキル -->
                                    @include('charasheet.parts.skill')

                                    <!-- 装備品 -->
                                    @include('charasheet.parts.equipping')

                                    <!-- キャラクターについて -->
                                    @include('charasheet.parts.remarks')

                                    <div class="d-flex justify-content-between pt-3">
                                        <div class="flex justify-center">
                                            <button type="submit"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded fucus:outline-none focus:shadow-outline mt-3">
                                                {{ __('登録') }}
                                            </button>
                                        </div>
                                    </div>
                            </fieldset>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    label {
        font-size: 0.75rem;
        line-height: 1.25rem;
    }

    select {
        font-size: 12px;
        height: 30px;
        padding: 0.2rem 0.5rem;
    }

    .num-input {
        height: 30px;
        width: 45px;
        padding: 0.2rem 0.1rem 0.2rem 0.5rem !important;
    }

    input {
        font-size: 13px !important;
        height: 30px;
        padding: 0.2rem 0.1rem 0.2rem 0.5rem !important;
    }

    textarea {
        font-size: 13px !important;
        padding: 0.2rem 0.5rem 0.2rem 0.5rem !important;
    }

    th {
        font-size: 10px;
    }

    .key-data {
        font-size: 15px;
        font-weight: bold;
    }

    #exp_point {
        width: 80px;
        background-color: white;
    }
</style>

<script>
    // ページ読み込み時のアクション
    window.onload = function() {
        updateStatusValues(null, {!! json_encode($tribes) !!}, 'tribe');
        updateStatusValues(null, {!! json_encode($main_classes) !!}, 'main_class');
        updateStatusValues(null, {!! json_encode($support_classes) !!}, 'support_class');
        calculateAndSetMainValues();
        setOtherTextToTwo();
        // parts.equippingsファイルに記述
        calculateTotals();
    };
</script>