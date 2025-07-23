@extends('layouts.app')

@section('content')
    <config-provider>
        <div class="max-w-screen-lg mx-auto p-4 ">
            <h1 class="text-2xl font-semibold mb-4">Hesabım</h1>

            <div class="flex row max-lg:flex-col">
                <div class="w-full lg:w-xs mb-2 max-lg:flex max-lg:row max-lg:justify-between">
                    <div>
                        <n-avatar round size="large" class="mb-4"
                            src="https://07akioni.oss-cn-beijing.aliyuncs.com/07akioni.jpeg"></n-avatar>

                        <p class="text-gray-800 font-semibold">{{ auth()->user()->name }}</p>
                        <p class="text-gray-600 mb-6">{{ auth()->user()->email }}</p>
                    </div>

                    <div class="space-y-4">
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <n-button type="error" attr-type="submit">
                                Çıkış Yap
                            </n-button>
                        </form>
                    </div>
                </div>

                <div class="w-full">
                    <n-tabs type="line" animated>
                        <n-tab-pane name="orders" tab="Siparişlerim">
                            Wonderwall
                        </n-tab-pane>
                        <n-tab-pane name="favorites" tab="Favorilerim">
                            Wonderwall
                        </n-tab-pane>
                        <n-tab-pane name="addresses" tab="Adreslerim">
                            Wonderwall
                        </n-tab-pane>
                        <n-tab-pane name="account" tab="Kullanıcı Bilgilerim">
                            Hey Jude
                        </n-tab-pane>
                    </n-tabs>
                </div>
            </div>
        </div>
    </config-provider>
@endsection
