<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            サポートクラス 編集
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="container small">
                        <h1 class="py-3 text-xl font-bold">編集</h1>
                        <form action="{{ route('admin.support_class.update', ['support_class' => $support_class->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                            <fieldset>
                                <div class="form-group">
                                    <div class="flex flex-wrap">
                                        <div class="w-full sm:w-1/2 px-2 mb-4">
                                            <div class="my-2">
                                                <label for="name" class="font-bold mb-1">{{ __('サポートクラス名') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="name" id="name" value="{{ $support_class->name }}">
                                            </div>
                                        </div>
                                        <div class="w-full sm:w-1/2 px-2 mb-4">
                                            <div class="my-2">
                                                <label for="strength_correction" class="font-bold mb-1">{{ __('筋力') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="strength_correction" id="strength_correction" value="{{ $support_class->strength_correction }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap">
                                        <div class="w-full sm:w-1/2 px-2 mb-4">
                                            <div class="my-2">
                                                <label for="dexterity_correction" class="font-bold mb-1">{{ __('器用') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="dexterity_correction" id="dexterity_correction" value="{{ $support_class->dexterity_correction }}">
                                            </div>
                                        </div>
                                        <div class="w-full sm:w-1/2 px-2 mb-4">
                                            <div class="my-2">
                                                <label for="agility_correction" class="font-bold mb-1">{{ __('敏捷') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="agility_correction" id="agility_correction" value="{{ $support_class->agility_correction }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap">
                                        <div class="w-full sm:w-1/2 px-2 mb-4">
                                            <div class="my-2">
                                                <label for="intelligence_correction" class="font-bold mb-1">{{ __('知力') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="intelligence_correction" id="intelligence_correction" value="{{ $support_class->intelligence_correction }}">
                                            </div>
                                        </div>
                                        <div class="w-full sm:w-1/2 px-2 mb-4">
                                            <div class="my-2">
                                                <label for="sense_correction" class="font-bold mb-1">{{ __('感知') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="sense_correction" id="sense_correction" value="{{ $support_class->sense_correction }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap">
                                        <div class="w-full sm:w-1/2 px-2 mb-4">
                                            <div class="my-2">
                                                <label for="mental_correction" class="font-bold mb-1">{{ __('精神') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="mental_correction" id="mental_correction" value="{{ $support_class->mental_correction }}">
                                            </div>
                                        </div>
                                        <div class="w-full sm:w-1/2 px-2 mb-4">
                                            <div class="my-2">
                                                <label for="luck_correction" class="font-bold mb-1">{{ __('幸運') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="luck_correction" id="luck_correction" value="{{ $support_class->luck_correction }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap">
                                        <div class="w-full sm:w-1/2 px-2 mb-4">
                                            <div class="my-2">
                                                <label for="hp_correction" class="font-bold mb-1">{{ __('基礎HP') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="hp_correction" id="hp_correction" value="{{ $support_class->hp_correction }}">
                                            </div>
                                        </div>
                                        <div class="w-full sm:w-1/2 px-2 mb-4">
                                            <div class="my-2">
                                                <label for="mp_correction" class="font-bold mb-1">{{ __('基礎MP') }}</label>
                                                <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
                                                 name="mp_correction" id="mp_correction" value="{{ $support_class->mp_correction }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-center">
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-3">
                                            {{ __('更新') }}
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