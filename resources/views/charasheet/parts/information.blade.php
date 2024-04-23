<div class="flex flex-wrap">

    <!-- キャラクター名・プレイヤー名 -->
    <div class="w-full w-1/2 px-2">
        <div class="my-2">
            <label for="name" class="font-bold mb-1">{{ __('キャラクター名') }}<span class="text-red-500">（必須項目）</span></label>
            <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
             name="name" id="name" value="{{ $character->name ?? '' }}">
        </div>
    </div>
    <div class="w-full w-1/2 px-2">
        <div class="my-2">
            <label for="player_name" class="font-bold mb-1">{{ __('プレイヤー名') }}</label>
            <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
             name="player_name" id="player_name" value="{{ $character->player_name ?? '' }}">
        </div>
    </div>

    <!-- キャラクター情報 -->
    <div class="w-full w-1/3 xl:w-1/5 px-2">
        <div class="my-2">
            <label for="age" class="font-bold mb-1">{{ __('年齢') }}</label>
            <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
             name="age" id="age" value="{{ $character->age ?? '' }}">
        </div>
    </div>
    <div class="w-full w-1/3 xl:w-1/5  px-2">
        <div class="my-2">
            <label for="gender" class="font-bold mb-1">{{ __('性別') }}</label>
            <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
             name="gender" id="gender" value="{{ $character->gender ?? '' }}">
        </div>
    </div>
    <div class="w-full w-1/3 xl:w-1/5  px-2">
        <div class="my-2">
            <label for="height" class="font-bold mb-1">{{ __('身長') }}(cm)</label>
            <input type="number" min="0" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
             name="height" id="height" value="{{ $character->height ?? '' }}">
        </div>
    </div>
    <div class="w-full w-1/3 xl:w-1/5  px-2">
        <div class="my-2">
            <label for="hair_color" class="font-bold mb-1">{{ __('髪の色') }}</label>
            <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
             name="hair_color" id="hair_color" value="{{ $character->hair_color ?? '' }}">
        </div>
    </div>
    <div class="w-full w-1/3 xl:w-1/5  px-2">
        <div class="my-2">
            <label for="eye_color" class="font-bold mb-1">{{ __('瞳の色') }}</label>
            <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
             name="eye_color" id="eye_color" value="{{ $character->eye_color ?? '' }}">
        </div>
    </div>
    <div class="w-full w-1/3 xl:w-1/5  px-2">
        <div class="my-2">
            <label for="skin_color" class="font-bold mb-1">{{ __('肌の色') }}</label>
            <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
             name="skin_color" id="skin_color" value="{{ $character->skin_color ?? '' }}">
        </div>
    </div>

    <!-- ライフパス -->
    <div class="w-full w-1/3 xl:w-1/5  px-2">
        <div class="mt-2 mb-1">
            <label for="origins" class="font-bold mb-1">{{ __('出自') }}</label>
            <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
             name="origins" id="origins" value="{{ $character->origins ?? '' }}">
        </div>
        <div class="mb-2" id="origins_remarks_container">
            <textarea rows="2" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
             name="origins_remarks" id="origins_remarks" placeholder="備考">{{ $character->origins_remarks ?? '' }}</textarea>
        </div>
    </div>
    <div class="w-full w-1/3 xl:w-1/5  px-2">
        <div class="mt-2 mb-1">
            <label for="environment" class="font-bold mb-1">{{ __('境遇') }}</label>
            <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
             name="environment" id="environment" value="{{ $character->environment ?? '' }}">
        </div>
        <div class="mb-2" id="environment_remarks_container">
            <textarea rows="2" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
             name="environment_remarks" id="environment_remarks" placeholder="備考">{{ $character->environment_remarks ?? '' }}</textarea>
        </div>
    </div>
    <div class="w-full w-1/3 xl:w-1/5  px-2">
        <div class="mt-2 mb-1">
            <label for="purpose" class="font-bold mb-1">{{ __('目的') }}</label>
            <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
             name="purpose" id="purpose" value="{{ $character->purpose ?? '' }}">
        </div>
        <div class="mb-2" id="purpose_remarks_container">
            <textarea rows="2" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
             name="purpose_remarks" id="purpose_remarks" placeholder="備考">{{ $character->purpose_remarks ?? '' }}</textarea>
        </div>
    </div>
    <div class="w-full w-1/3 xl:w-1/5  px-2">
        <div class="mt-2 mb-1">
            <label for="hometown" class="font-bold mb-1">{{ __('出身地') }}</label>
            <input type="text" class="form-control block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white"
             name="hometown" id="hometown" value="{{ $character->hometown ?? '' }}">
        </div>
    </div>

</div>