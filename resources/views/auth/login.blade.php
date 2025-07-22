@extends('layouts.auth')

@section('content')
    <config-provider>
        <div class="container mx-auto flex row px-4 gap-6 h-screen items-center justify-center">
            <div
                class="w-full flex flex-col justify-center items-center max-w-md mx-auto shadow-lg rounded-2xl border-2 border-zinc-200 bg-white p-6">
                <img src="https://i.ibb.co/fYdTLd9x/image.png" alt="Wavedijital Logo"
                    class="w-28 h-20 object-contain group-hover:brightness-100 group-hover:invert transition-all duration-300 brightness-75 mb-2 invert" />

                <n-tabs class="card-tabs " default-value="signin" size="large" type="segment" animated
                    pane-wrapper-style="margin: 0 -4px"
                    pane-style="padding-left: 4px; padding-right: 4px; box-sizing: border-box;">
                    <n-tab-pane name="signin" tab="Giriş Yap">
                        <form method="POST" action="/login" class="mb-4 ">
                            @csrf
                            <div class="relative mt-3 w-full">
                                <input name="email" type="email" required
                                    class="peer w-full  p-3 rounded-lg border-zinc-100 border-3 ring-zinc-300 focus:border-red-700 transition duration-400 outline-none focus:shadow-md"
                                    placeholder="E-Posta" />
                            </div>
                            <div class="relative mt-3 w-full mb-5">
                                <input name="password" type="password" required
                                    class="peer w-full  p-3 rounded-lg border-zinc-100 !border-3 ring-zinc-300 focus:border-red-700 transition duration-400 outline-none focus:shadow-md"
                                    placeholder="Şifre" />
                            </div>

                            <n-checkbox class="mb-4">
                                Beni Hatırla
                            </n-checkbox>

                            <n-button type="primary" attr-type="submit" block strong size="large"
                                class="!rounded-lg !h-12">
                                Giriş Yap
                            </n-button>

                            <div class="mt-5 text-center">
                                <a href="" class="text-zinc-500 hover:underline">
                                    Şifremi Unuttum
                                </a>
                            </div>
                        </form>
                    </n-tab-pane>
                    <n-tab-pane name="signup" tab="Kayıt Ol">

                        <form action="" class="mb-4">
                            <div class="relative mt-3 w-full">
                                <input name="fullname" type="text" required
                                    class="peer w-full  p-3 rounded-lg border-zinc-100 !border-3 ring-zinc-300 focus:border-red-700 transition duration-400 outline-none focus:shadow-md"
                                    placeholder="Ad Soyad" />
                            </div>

                            <div class="relative mt-3 w-full">
                                <input name="email" type="email" required
                                    class="peer w-full  p-3 rounded-lg border-zinc-100 !border-3 ring-zinc-300 focus:border-red-700 transition duration-400 outline-none focus:shadow-md"
                                    placeholder="E-Posta" />
                            </div>

                            <div class="relative mt-3 w-full">
                                <input name="password" type="password" required
                                    class="peer w-full  p-3 rounded-lg border-zinc-100 !border-3 ring-zinc-300 focus:border-red-700 transition duration-400 outline-none focus:shadow-md"
                                    placeholder="Şifre" />
                            </div>

                            <div class="relative mt-3 w-full mb-5">
                                <input name="passwordAgain" type="password" required
                                    class="peer w-full  p-3 rounded-lg border-zinc-100 !border-3 ring-zinc-300 focus:border-red-700 transition duration-400 outline-none focus:shadow-md"
                                    placeholder="Şifre (Tekrar)" />
                            </div>

                            <n-checkbox class="mb-4">
                                Kullanım Şartlarını Okudum ve Kabul Ediyorum
                                <span class="text-red-500">*</span>
                            </n-checkbox>

                            <n-button type="primary" attr-type="submit" block strong size="large" class="!rounded-lg">
                                Kayıt Ol
                            </n-button>
                        </form>

                    </n-tab-pane>
                </n-tabs>
            </div>

        </div>
    </config-provider>
@endsection
