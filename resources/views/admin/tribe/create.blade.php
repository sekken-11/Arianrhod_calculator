<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            種族 作成
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="container small">
                        <h1 class="py-3 text-xl font-bold">種族を登録</h1>
                        <form action="{{ route('admin.tribe.store') }}" method="POST">
                        @csrf
                            <fieldset>
                                <div class="form-group">
                                    <div class="flex flex-wrap">
                                        <div class="w-full sm:w-1/2 px-2 mb-4">
                                            <div class="my-2">
                                                <label for="name" class="font-bold mb-1">{{ __('種族名') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white" name="name" id="name">
                                            </div>
                                        </div>
                                        <div class="w-full sm:w-1/2 px-2 mb-4">
                                            <div class="my-2">
                                                <label for="strength_base" class="font-bold mb-1">{{ __('筋力') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white" name="strength_base" id="strength_base">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap">
                                        <div class="w-full sm:w-1/2 px-2 mb-4">
                                            <div class="my-2">
                                                <label for="dexterity_base" class="font-bold mb-1">{{ __('器用') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white" name="dexterity_base" id="dexterity_base">
                                            </div>
                                        </div>
                                        <div class="w-full sm:w-1/2 px-2 mb-4">
                                            <div class="my-2">
                                                <label for="agility_base" class="font-bold mb-1">{{ __('敏捷') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white" name="agility_base" id="agility_base">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap">
                                        <div class="w-full sm:w-1/2 px-2 mb-4">
                                            <div class="my-2">
                                                <label for="intelligence_base" class="font-bold mb-1">{{ __('知力') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white" name="intelligence_base" id="intelligence_base">
                                            </div>
                                        </div>
                                        <div class="w-full sm:w-1/2 px-2 mb-4">
                                            <div class="my-2">
                                                <label for="sense_base" class="font-bold mb-1">{{ __('感知') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white" name="sense_base" id="sense_base">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap">
                                        <div class="w-full sm:w-1/2 px-2 mb-4">
                                            <div class="my-2">
                                                <label for="namental_base" class="font-bold mb-1">{{ __('精神') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white" name="mental_base" id="mental_base">
                                            </div>
                                        </div>
                                        <div class="w-full sm:w-1/2 px-2 mb-4">
                                            <div class="my-2">
                                                <label for="luck_base" class="font-bold mb-1">{{ __('幸運') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white" name="luck_base" id="luck_base">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap">
                                        <div class="w-full sm:w-1/2 px-2 mb-4">
                                            <div class="my-2">
                                                <label for="hp_base" class="font-bold mb-1">{{ __('基礎HP') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white" name="hp_base" id="hp_base">
                                            </div>
                                        </div>
                                        <div class="w-full sm:w-1/2 px-2 mb-4">
                                            <div class="my-2">
                                                <label for="mp_base" class="font-bold mb-1">{{ __('基礎MP') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white" name="mp_base" id="mp_base">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap">
                                        <div class="w-full sm:w-1/2 px-2 mb-4">
                                            <div class="my-2">
                                                <label for="fate_base" class="font-bold mb-1">{{ __('基礎フェイト') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white" name="fate_base" id="fate_base">
                                            </div>
                                        </div>
                                        <div class="w-full sm:w-1/2 px-2 mb-4">
                                            <div class="my-2">
                                                <label for="weight_limit" class="font-bold mb-1">{{ __('重量制限') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white" name="weight_limit" id="weight_limit">
                                            </div>
                                        </div>
                                    </div>
                                <div class="d-flex justify-content-between pt-3">
                                    <div class="flex justify-center">
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded fucus:outline-none focus:shadow-outline mt-3">
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