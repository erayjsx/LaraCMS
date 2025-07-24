@extends('layouts.app')

@section('content')
    <config-provider>
        <div class="max-w-screen-lg mx-auto p-4 ">
            <h1 class="text-2xl font-semibold mb-4">Hesabım</h1>

            <div class="flex row flex-col gap-4">
                <div class="w-full h-20 items-center bg-zinc-100 rounded-2xl p-4 flex row justify-between">
                    <div class="flex row gap-4 items-center">
                        <n-avatar round size="large"
                            src="https://07akioni.oss-cn-beijing.aliyuncs.com/07akioni.jpeg"></n-avatar>
                        <div class="flex flex-col justify-center ">
                            <p class="text-gray-800 font-bold ">{{ auth()->user()->name }}</p>
                            <p class="text-gray-600">{{ auth()->user()->email }}</p>
                        </div>
                    </div>

                    <div class="">
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <n-button type="error" attr-type="submit" class="!w-full">
                                Çıkış Yap
                            </n-button>
                        </form>
                    </div>
                </div>

                <div class="w-full ">
                    <n-tabs type="line" animated>
                        <n-tab-pane name="orders" tab="Siparişlerim" class="min-h-96">
                            <n-empty description="Sipariş bulunamadı"></n-empty>
                        </n-tab-pane>
                        <n-tab-pane name="favorites" tab="Favorilerim">
                            <n-empty description="Sipariş bulunamadı">
                                <template #extra>
                                    <n-button size="small" class="!w-full">
                                        Ana Sayfaya Git
                                    </n-button>
                                </template>
                            </n-empty>
                        </n-tab-pane>
                        <n-tab-pane name="addresses" tab="Adreslerim">
                            <n-empty description="Sipariş bulunamadı">
                                <template #extra>
                                    <n-button size="small" class="!w-full">
                                        Yeni Adres Ekle
                                    </n-button>
                                </template>
                            </n-empty>
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
